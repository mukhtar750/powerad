<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Billboard;
use App\Models\Payment;
use App\Models\User;
use App\Services\NotificationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    private $paystackSecretKey;
    private $paystackPublicKey;
    private $paystackBaseUrl;
    private $providerSubaccountCode;
    private $flutterSecretKey;
    private $flutterPublicKey;
    private $flutterBaseUrl;
    private $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->paystackSecretKey = config('services.paystack.secret_key');
        $this->paystackPublicKey = config('services.paystack.public_key');
        $this->paystackBaseUrl = config('services.paystack.base_url');
        $this->providerSubaccountCode = config('services.paystack.provider_subaccount_code');
        $this->flutterSecretKey = config('services.flutterwave.secret_key');
        $this->flutterPublicKey = config('services.flutterwave.public_key');
        $this->flutterBaseUrl = config('services.flutterwave.base_url');
        $this->notificationService = $notificationService;
    }

    public function advertiserPayments()
    {
        $userId = Auth::id();
        $payments = Payment::with(['billboard', 'booking'])
            ->where('user_id', $userId)
            ->orderByDesc('created_at')
            ->paginate(20);

        $paid = Payment::where('user_id', $userId)->where('status', 'success')->sum('amount');
        $pending = Payment::where('user_id', $userId)->whereIn('status', ['pending', 'initialized'])->sum('amount');
        $total = Payment::where('user_id', $userId)->sum('amount');

        $summary = [
            'total' => $total,
            'paid' => $paid,
            'pending' => $pending,
        ];

        return view('dashboards.advertiser.payments', compact('payments', 'summary'));
    }

    public function downloadInvoice(Payment $payment)
    {
        abort_unless(Auth::id() === $payment->user_id, 403);
        $booking = $payment->booking;
        $billboard = $payment->billboard;
        $date = now()->format('Y-m-d');
        $amount = number_format((float)$payment->amount);
        $companyCommission = $booking ? number_format((float)$booking->company_commission) : '0';
        $loapAmount = $booking ? number_format((float)$booking->loap_amount) : '0';
        $duration = $booking ? $booking->duration_days : null;
        $start = $booking ? 
            (is_string($booking->start_date) ? $booking->start_date : optional($booking->start_date)->format('Y-m-d')) : null;
        $end = $booking ? 
            (is_string($booking->end_date) ? $booking->end_date : optional($booking->end_date)->format('Y-m-d')) : null;
        $title = $billboard ? $billboard->title : 'Billboard';
        $ref = $payment->reference;
        $gdAvailable = extension_loaded('gd');
        $pdf = Pdf::loadView('invoices.payment', compact('payment','booking','billboard','date','amount','companyCommission','loapAmount','duration','start','end','title','ref','gdAvailable'));
        return $pdf->download('invoice-'.$ref.'.pdf');
    }

    /**
     * Fetch list of banks from Paystack (Bonus helper)
     */
    public function fetchBanks()
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->paystackSecretKey,
            ])->get($this->paystackBaseUrl . '/bank');

            if ($response->successful() && data_get($response->json(), 'status') === true) {
                return response()->json([
                    'success' => true,
                    'banks' => data_get($response->json(), 'data', []),
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch banks',
                'error' => $response->body(),
            ], 400);
        } catch (\Exception $e) {
            Log::error('Paystack bank list error', ['error' => $e->getMessage()]);
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while fetching banks',
            ], 500);
        }
    }

    /**
     * Add bank details: verify via Paystack and create subaccount automatically
     */
    public function addBankDetails(Request $request)
    {
        try {
            $user = Auth::user();

            $validator = Validator::make($request->all(), [
                'bank_name' => 'required|string|max:255',
                'bank_code' => 'required|string|max:20',
                'account_number' => 'required|string|max:20',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors(),
                ], 422);
            }

            // Step 1: Resolve account number with Paystack
            $resolveUrl = $this->paystackBaseUrl . '/bank/resolve';
            $resolveResponse = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->paystackSecretKey,
            ])->get($resolveUrl, [
                'account_number' => $request->account_number,
                'bank_code' => $request->bank_code,
            ]);

            if (!$resolveResponse->successful() || data_get($resolveResponse->json(), 'status') !== true) {
                return response()->json([
                    'success' => false,
                    'message' => 'Bank account verification failed',
                    'error' => $resolveResponse->body(),
                ], 400);
            }

            $accountName = data_get($resolveResponse->json(), 'data.account_name');

            // Step 2: Create Paystack subaccount for the user
            $subaccountPayload = [
                'business_name' => $user->company ?: $user->name,
                'settlement_bank' => $request->bank_code,
                'account_number' => $request->account_number,
                'percentage_charge' => 10, // Platform commission: 10%
                'primary_contact_email' => $user->email,
                'primary_contact_name' => $user->name,
                'metadata' => [
                    'user_id' => $user->id,
                    'user_type' => $user->role ?? 'loap',
                ],
            ];

            $subResponse = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->paystackSecretKey,
                'Content-Type' => 'application/json',
            ])->post($this->paystackBaseUrl . '/subaccount', $subaccountPayload);

            if (!$subResponse->successful() || data_get($subResponse->json(), 'status') !== true) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to create subaccount',
                    'error' => $subResponse->body(),
                ], 400);
            }

            $subData = data_get($subResponse->json(), 'data');

            // Step 3: Persist bank details and subaccount in users table
            $user = User::find($user->id);
            $user->update([
                'bank_name' => $request->bank_name,
                'bank_code' => $request->bank_code,
                'account_number' => $request->account_number,
                'account_name' => $accountName,
                'paystack_subaccount_code' => data_get($subData, 'subaccount_code'),
                'paystack_subaccount_id' => data_get($subData, 'id'),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Bank details verified and subaccount created',
                'subaccount_code' => data_get($subData, 'subaccount_code'),
                'account_name' => $accountName,
            ]);
        } catch (\Exception $e) {
            Log::error('Add bank details error', [
                'user_id' => Auth::id(),
                'error' => $e->getMessage(),
            ]);
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while adding bank details',
            ], 500);
        }
    }

    public function initializePayment(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'billboard_id' => 'required|exists:billboards,id',
                'email' => 'required|email|max:255',
                'start_date' => 'required|date|after:today',
                'end_date' => 'required|date|after:start_date',
                'campaign_details' => 'nullable|string|max:1000',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

        $billboard = Billboard::findOrFail($request->billboard_id);
        $advertiser = Auth::user();
            $loap = $billboard->user;

            // Check if billboard is available
            if ($billboard->status !== 'available' || !$billboard->is_active) {
                return response()->json([
                    'success' => false,
                    'message' => 'This billboard is not available for booking'
                ], 400);
            }

        // Calculate duration and amount
        $startDate = \Carbon\Carbon::parse($request->start_date);
        $endDate = \Carbon\Carbon::parse($request->end_date);
        $durationDays = $startDate->diffInDays($endDate) + 1;
        
        $totalAmount = $billboard->price_per_day * $durationDays;
        $companyCommission = $totalAmount * 0.10; // 10%
        $loapAmount = $totalAmount * 0.90; // 90%

            // Generate unique reference
            $reference = 'BILLBOARD_' . $billboard->id . '_' . $advertiser->id . '_' . time();

        // Create booking
        $booking = Booking::create([
            'billboard_id' => $billboard->id,
            'advertiser_id' => $advertiser->id,
                'loap_id' => $loap->id,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'duration_days' => $durationDays,
            'total_amount' => $totalAmount,
            'company_commission' => $companyCommission,
            'loap_amount' => $loapAmount,
            'campaign_details' => $request->campaign_details,
            'status' => 'pending',
                'payment_reference' => $reference,
            'payment_status' => 'pending',
        ]);

            // Record initial payment in payments ledger
            Payment::create([
                'user_id' => $advertiser->id,
                'billboard_id' => $billboard->id,
                'booking_id' => $booking->id,
                'amount' => $totalAmount,
                'currency' => 'NGN',
                'reference' => $reference,
                'split_data' => [
                    'company_commission' => $companyCommission,
                    'loap_amount' => $loapAmount,
                ],
                'status' => 'initialized',
                'gateway_response' => null,
                'transaction_date' => null,
            ]);

            return response()->json([
                'success' => true,
                'reference' => $reference,
                'email' => $request->email,
                'booking_id' => $booking->id,
                'amount' => $totalAmount,
                'company_commission' => $companyCommission,
                'loap_amount' => $loapAmount,
            ]);

        } catch (\Exception $e) {
            Log::error('Payment initialization error', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

        return response()->json([
            'success' => false,
                'message' => 'An error occurred while processing your request'
            ], 500);
        }
    }

    /**
     * Initialize transaction (alias) to align with deliverables
     */
    public function initializeTransaction(Request $request)
    {
        return $this->initializePayment($request);
    }

    public function handleCallback(Request $request)
    {
        try {
        $reference = $request->query('reference');
        $transactionId = $request->query('transaction_id');
        
        if (!$reference) {
            return redirect()->route('dashboard.advertiser')->with('error', 'Payment reference not found');
        }

        if (!$transactionId) {
            return redirect()->route('dashboard.advertiser')->with('error', 'Transaction ID not provided');
        }

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->flutterSecretKey,
            ])->get($this->flutterBaseUrl . "/transactions/{$transactionId}/verify");

        if ($response->successful()) {
            $paymentData = $response->json();
            
                if (data_get($paymentData, 'status') === 'success' && data_get($paymentData, 'data.status') === 'successful') {
                $booking = Booking::where('payment_reference', $reference)->first();
                
                    if ($booking && $booking->payment_status === 'pending') {
                        $this->processSuccessfulPayment($booking, data_get($paymentData, 'data'));
                        
                        return redirect()->route('dashboard.advertiser')->with('success', 'Payment successful! Your booking is now active.');
                    }
                }
            }

            Log::warning('Payment verification failed', [
                'reference' => $reference,
                'response' => $response->body()
            ]);

            return redirect()->route('dashboard.advertiser')->with('error', 'Payment verification failed');

        } catch (\Exception $e) {
            Log::error('Payment callback error', [
                'error' => $e->getMessage(),
                'reference' => $request->query('reference')
            ]);

            return redirect()->route('dashboard.advertiser')->with('error', 'An error occurred while processing your payment');
        }
    }

    /**
     * Handle Paystack webhook
     */
    public function handleWebhook(Request $request)
    {
        try {
            $payload = $request->all();
            $signature = $request->header('X-Paystack-Signature');

            // Verify webhook signature
            if (!$this->verifyWebhookSignature($payload, $signature)) {
                Log::warning('Invalid webhook signature', ['payload' => $payload]);
                return response()->json(['status' => 'error'], 400);
            }

            $event = $payload['event'];
            $data = $payload['data'];

            switch ($event) {
                case 'charge.success':
                    $this->handleSuccessfulCharge($data);
                    break;
                case 'charge.failed':
                    $this->handleFailedCharge($data);
                    break;
                case 'transfer.success':
                    $this->handleSuccessfulTransfer($data);
                    break;
                case 'transfer.failed':
                    $this->handleFailedTransfer($data);
                    break;
                default:
                    Log::info('Unhandled webhook event', ['event' => $event]);
            }

            return response()->json(['status' => 'success']);

        } catch (\Exception $e) {
            Log::error('Webhook processing error', [
                'error' => $e->getMessage(),
                'payload' => $request->all()
            ]);

            return response()->json(['status' => 'error'], 500);
        }
    }

    /**
     * Process successful payment
     */
    private function processSuccessfulPayment($booking, $paymentData)
    {
        $booking->update([
            'payment_status' => 'paid',
            'status' => 'active',
            'payment_details' => $paymentData,
            'paid_at' => now(),
        ]);

        // Update Payment ledger
        Payment::where('reference', $booking->payment_reference)->update([
            'status' => 'success',
            'amount' => $booking->total_amount,
            'currency' => data_get($paymentData, 'currency', 'NGN'),
            'gateway_response' => data_get($paymentData, 'gateway_response'),
            'transaction_date' => data_get($paymentData, 'paid_at') ?: data_get($paymentData, 'transaction_date'),
            'split_data' => array_merge(
                is_array($booking->payment_details) ? $booking->payment_details : [],
                ['processed_at' => now()->toISOString()]
            ),
        ]);

        // Update billboard status
        $booking->billboard->update(['status' => 'booked']);

        // Send notifications using the notification service
        $this->notificationService->notifyPaymentSuccess($booking);

        Log::info('Payment processed successfully', [
            'booking_id' => $booking->id,
            'amount' => $booking->total_amount,
            'reference' => $booking->payment_reference
        ]);
    }

    /**
     * Handle successful charge from webhook
     */
    private function handleSuccessfulCharge($data)
    {
        $reference = $data['reference'];
        $booking = Booking::where('payment_reference', $reference)->first();

        if ($booking && $booking->payment_status === 'pending') {
            $this->processSuccessfulPayment($booking, $data);
        }
    }

    /**
     * Handle failed charge from webhook
     */
    private function handleFailedCharge($data)
    {
        $reference = $data['reference'];
        $booking = Booking::where('payment_reference', $reference)->first();

        if ($booking) {
            $booking->update([
                'payment_status' => 'failed',
                'status' => 'cancelled',
                'payment_details' => $data,
            ]);

            Payment::where('reference', $reference)->update([
                'status' => 'failed',
                'currency' => data_get($data, 'currency', 'NGN'),
                'gateway_response' => data_get($data, 'gateway_response'),
                'transaction_date' => data_get($data, 'paid_at') ?: data_get($data, 'transaction_date'),
                'split_data' => $data,
            ]);

            Log::info('Payment failed', [
                'booking_id' => $booking->id,
                'reference' => $reference,
                'reason' => $data['gateway_response'] ?? 'Unknown'
            ]);
        }
    }

    /**
     * Handle successful transfer from webhook
     */
    private function handleSuccessfulTransfer($data)
    {
        Log::info('Transfer successful', ['transfer_data' => $data]);
    }

    /**
     * Handle failed transfer from webhook
     */
    private function handleFailedTransfer($data)
    {
        Log::warning('Transfer failed', ['transfer_data' => $data]);
    }

    /**
     * Verify webhook signature
     */
    private function verifyWebhookSignature($payload, $signature)
    {
        $computedSignature = hash_hmac('sha512', json_encode($payload), $this->paystackSecretKey);
        return hash_equals($signature, $computedSignature);
    }

    /**
     * Verify payment by reference and update ledger
     */
    public function verifyPayment(string $reference)
    {
        try {
            $transactionId = request()->query('transaction_id');
            if (!$transactionId) {
                return response()->json(['success' => false, 'message' => 'Transaction ID required'], 400);
            }
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->flutterSecretKey,
            ])->get($this->flutterBaseUrl . "/transactions/{$transactionId}/verify");

            if ($response->successful()) {
                $paymentData = $response->json();
                $booking = Booking::where('payment_reference', $reference)->first();

                if (data_get($paymentData, 'status') === 'success' && data_get($paymentData, 'data.status') === 'successful') {
                    if ($booking && $booking->payment_status === 'pending') {
                        $this->processSuccessfulPayment($booking, data_get($paymentData, 'data'));
                    }
                    Payment::where('reference', $reference)->update([
                        'status' => 'success',
                        'currency' => data_get($paymentData, 'data.currency', 'NGN'),
                        'gateway_response' => data_get($paymentData, 'data.processor_response'),
                        'transaction_date' => data_get($paymentData, 'data.created_at'),
                        'split_data' => data_get($paymentData, 'data'),
                    ]);

                    return response()->json(['success' => true, 'status' => 'success']);
                }

                // mark failed if present
                Payment::where('reference', $reference)->update([
                    'status' => 'failed',
                    'currency' => data_get($paymentData, 'data.currency', 'NGN'),
                    'gateway_response' => data_get($paymentData, 'data.processor_response'),
                    'transaction_date' => data_get($paymentData, 'data.created_at'),
                    'split_data' => data_get($paymentData, 'data'),
                ]);
            }

            Log::warning('Payment verification failed (manual)', [
                'reference' => $reference,
                'response' => $response->body(),
            ]);

            return response()->json(['success' => false, 'status' => 'failed'], 400);
        } catch (\Exception $e) {
            Log::error('verifyPayment error', [
                'reference' => $reference,
                'error' => $e->getMessage(),
            ]);
            return response()->json(['success' => false, 'message' => 'Verification error'], 500);
        }
    }

    /**
     * Send payment notifications
     */
    private function sendPaymentNotifications($booking)
    {
        try {
            // Send notification to advertiser
            Mail::to($booking->advertiser->email)->send(new \App\Mail\PaymentSuccessMail($booking, 'advertiser'));
            
            // Send notification to LOAP
            Mail::to($booking->loap->email)->send(new \App\Mail\PaymentSuccessMail($booking, 'loap'));
            
        } catch (\Exception $e) {
            Log::error('Failed to send payment notifications', [
                'booking_id' => $booking->id,
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * Create Paystack subaccount for LOAP
     */
    public function createSubaccount(Request $request)
    {
        try {
            $user = Auth::user();
            
            if ($user->role !== 'loap') {
                return response()->json([
                    'success' => false,
                    'message' => 'Only LOAP users can create subaccounts'
                ], 403);
            }

            $validator = Validator::make($request->all(), [
                'business_name' => 'required|string|max:255',
                'settlement_bank' => 'required|string|max:100',
                'account_number' => 'required|string|max:20',
                'percentage_charge' => 'required|numeric|min:0|max:100',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            $subaccountData = [
                'business_name' => $request->business_name,
                'settlement_bank' => $request->settlement_bank,
                'account_number' => $request->account_number,
                'percentage_charge' => $request->percentage_charge,
                'primary_contact_email' => $user->email,
                'primary_contact_name' => $user->name,
                'primary_contact_phone' => $user->phone,
                'metadata' => [
                    'user_id' => $user->id,
                    'user_type' => 'loap'
                ]
            ];

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->paystackSecretKey,
                'Content-Type' => 'application/json',
            ])->post($this->paystackBaseUrl . '/subaccount', $subaccountData);

            if ($response->successful()) {
                $responseData = $response->json();
                
                if ($responseData['status']) {
                    $user = User::find($user->id);
                    $user->update([
                        'paystack_subaccount_code' => $responseData['data']['subaccount_code'],
                        'paystack_subaccount_id' => $responseData['data']['id'],
                    ]);

                    return response()->json([
                        'success' => true,
                        'message' => 'Subaccount created successfully',
                        'subaccount_code' => $responseData['data']['subaccount_code']
                    ]);
                }
            }

            return response()->json([
                'success' => false,
                'message' => 'Failed to create subaccount'
            ], 400);

        } catch (\Exception $e) {
            Log::error('Subaccount creation error', [
                'user_id' => Auth::id(),
                'error' => $e->getMessage()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while creating subaccount'
            ], 500);
        }
    }

    /**
     * Get subaccount details
     */
    public function getSubaccount(Request $request)
    {
        try {
            $user = Auth::user();
            
            if (!$user->paystack_subaccount_code) {
                return response()->json([
                    'success' => false,
                    'message' => 'No subaccount found'
                ], 404);
            }

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->paystackSecretKey,
            ])->get($this->paystackBaseUrl . "/subaccount/{$user->paystack_subaccount_code}");

            if ($response->successful()) {
                $responseData = $response->json();
                
                if ($responseData['status']) {
                    return response()->json([
                        'success' => true,
                        'subaccount' => $responseData['data']
                    ]);
                }
            }

            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch subaccount details'
            ], 400);

        } catch (\Exception $e) {
            Log::error('Subaccount fetch error', [
                'user_id' => Auth::id(),
                'error' => $e->getMessage()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while fetching subaccount'
            ], 500);
        }
    }

    /**
     * Initiate transfer to LOAP
     */
    public function initiateTransfer(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'booking_id' => 'required|exists:bookings,id',
                'amount' => 'required|numeric|min:0',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            $booking = Booking::findOrFail($request->booking_id);
            
            if ($booking->payment_status !== 'paid') {
                return response()->json([
                    'success' => false,
                    'message' => 'Booking payment is not completed'
                ], 400);
            }

            $loap = $booking->loap;
            
            if (!$loap->paystack_subaccount_code) {
                return response()->json([
                    'success' => false,
                    'message' => 'LOAP does not have a Paystack subaccount'
                ], 400);
            }

            $transferData = [
                'source' => 'balance',
                'amount' => $booking->loap_amount * 100, // Convert to kobo
                'recipient' => $loap->paystack_subaccount_code,
                'reason' => "Payment for billboard booking #{$booking->id}",
                'reference' => "TRANSFER_{$booking->id}_" . time(),
            ];

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->paystackSecretKey,
                'Content-Type' => 'application/json',
            ])->post($this->paystackBaseUrl . '/transfer', $transferData);

            if ($response->successful()) {
                $responseData = $response->json();
                
                if ($responseData['status']) {
                    $booking->update([
                        'transfer_reference' => $responseData['data']['reference'],
                        'transfer_status' => 'initiated',
                    ]);

                    return response()->json([
                        'success' => true,
                        'message' => 'Transfer initiated successfully',
                        'transfer_reference' => $responseData['data']['reference']
                    ]);
                }
            }

            return response()->json([
                'success' => false,
                'message' => 'Failed to initiate transfer'
            ], 400);

        } catch (\Exception $e) {
            Log::error('Transfer initiation error', [
                'booking_id' => $request->booking_id,
                'error' => $e->getMessage()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while initiating transfer'
            ], 500);
        }
    }

    /**
     * Get payment statistics
     */
    public function getPaymentStats()
    {
        $totalBookings = Booking::count();
        $totalRevenue = Booking::where('payment_status', 'paid')->sum('total_amount');
        $totalCommission = Booking::where('payment_status', 'paid')->sum('company_commission');
        $totalLoapEarnings = Booking::where('payment_status', 'paid')->sum('loap_amount');
        $pendingTransfers = Booking::where('payment_status', 'paid')
            ->where('transfer_status', '!=', 'completed')
            ->count();

        return [
            'total_bookings' => $totalBookings,
            'total_revenue' => $totalRevenue,
            'total_commission' => $totalCommission,
            'total_loap_earnings' => $totalLoapEarnings,
            'pending_transfers' => $pendingTransfers,
        ];
    }
}
