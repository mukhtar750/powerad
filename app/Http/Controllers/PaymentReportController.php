<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Billboard;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PaymentReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Route alias: /dashboard/admin/payments/dashboard
     */
    public function dashboard()
    {
        return $this->adminDashboard();
    }

    /**
     * Display payment dashboard for admin
     */
    public function adminDashboard()
    {
        $this->authorizeAdmin();

        // Get date range from request or default to last 30 days
        $dateFrom = request('date_from', Carbon::now()->subDays(30)->format('Y-m-d'));
        $dateTo = request('date_to', Carbon::now()->format('Y-m-d'));

        // Overall statistics
        $stats = $this->getPaymentStats($dateFrom, $dateTo);

        // Monthly revenue trends
        $monthlyTrends = $this->getMonthlyTrends();

        // Top performing billboards
        $topBillboards = $this->getTopPerformingBillboards($dateFrom, $dateTo);

        // Recent transactions
        $recentTransactions = $this->getRecentTransactions(10);

        // Payment status breakdown
        $paymentStatusBreakdown = $this->getPaymentStatusBreakdown($dateFrom, $dateTo);

        // Transfer status breakdown
        $transferStatusBreakdown = $this->getTransferStatusBreakdown($dateFrom, $dateTo);

        return view('dashboards.admin.payment-dashboard', compact(
            'stats',
            'monthlyTrends',
            'topBillboards',
            'recentTransactions',
            'paymentStatusBreakdown',
            'transferStatusBreakdown',
            'dateFrom',
            'dateTo'
        ));
    }

    /**
     * Route alias: /dashboard/admin/payments/analytics
     */
    public function analytics(Request $request)
    {
        $this->authorizeAdmin();

        $dateFrom = $request->input('date_from', Carbon::now()->subDays(90)->format('Y-m-d'));
        $dateTo = $request->input('date_to', Carbon::now()->format('Y-m-d'));

        $stats = $this->getPaymentStats($dateFrom, $dateTo);
        $monthlyTrends = $this->getMonthlyTrends();

        return view('dashboards.admin.payment-analytics', compact(
            'stats',
            'monthlyTrends',
            'dateFrom',
            'dateTo'
        ));
    }

    /**
     * Display detailed payment reports
     */
    public function reports(Request $request)
    {
        $this->authorizeAdmin();
        // Resolve date range with safe defaults
        $dateFrom = $request->input('date_from', Carbon::now()->subDays(30)->format('Y-m-d'));
        $dateTo = $request->input('date_to', Carbon::now()->format('Y-m-d'));

        // Build base query with relationships
        $query = Booking::with(['billboard.user', 'advertiser'])
            ->whereDate('created_at', '>=', $dateFrom)
            ->whereDate('created_at', '<=', $dateTo);

        // Apply optional filters
        $paymentStatus = $request->input('payment_status');
        if (!empty($paymentStatus)) {
            $query->where('payment_status', $paymentStatus);
        }
        if ($request->filled('transfer_status')) {
            $query->where('transfer_status', $request->input('transfer_status'));
        }
        if ($request->filled('billboard_id')) {
            $query->where('billboard_id', $request->input('billboard_id'));
        }
        if ($request->filled('loap_id')) {
            $query->whereHas('billboard', function($q) use ($request) {
                $q->where('user_id', $request->input('loap_id'));
            });
        }

        // Paginated transactions for the table
        $transactions = $query->orderBy('created_at', 'desc')->paginate(20);

        // Summary metrics for the header cards
        $stats = $this->getPaymentStats($dateFrom, $dateTo);
        $summary = [
            'total_revenue' => $stats['total_revenue'] ?? 0,
            'platform_commission' => $stats['platform_commission'] ?? 0,
            'loap_earnings' => $stats['loap_earnings'] ?? 0,
            'total_transactions' => $transactions->total(),
        ];

        // Monthly trend data
        $monthlyData = $this->getMonthlyTrends();

        return view('dashboards.admin.payment-reports', compact(
            'transactions',
            'summary',
            'monthlyData',
            'dateFrom',
            'dateTo',
            'paymentStatus'
        ));
    }

    /**
     * Export payment data to CSV
     */
    public function exportCsv(Request $request)
    {
        $this->authorizeAdmin();

        $query = Booking::with(['billboard.user', 'advertiser']);

        // Apply same filters as reports
        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }
        if ($request->filled('payment_status')) {
            $query->where('payment_status', $request->payment_status);
        }
        if ($request->filled('transfer_status')) {
            $query->where('transfer_status', $request->transfer_status);
        }

        $bookings = $query->orderBy('created_at', 'desc')->get();

        $filename = 'payment_report_' . now()->format('Y-m-d_H-i-s') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $callback = function() use ($bookings) {
            $file = fopen('php://output', 'w');

            // CSV headers
            fputcsv($file, [
                'Booking ID',
                'Date',
                'Advertiser',
                'Advertiser Email',
                'Billboard Title',
                'LOAP Name',
                'LOAP Email',
                'Location',
                'Start Date',
                'End Date',
                'Duration (Days)',
                'Total Amount',
                'Platform Commission (10%)',
                'LOAP Earnings (90%)',
                'Payment Status',
                'Transfer Status',
                'Payment Reference',
                'Transfer Reference',
                'Paid At',
                'Transferred At'
            ]);

            // CSV data
            foreach ($bookings as $booking) {
                fputcsv($file, [
                    $booking->id,
                    $booking->created_at->format('Y-m-d H:i:s'),
                    $booking->advertiser->name,
                    $booking->advertiser->email,
                    $booking->billboard->title,
                    $booking->billboard->user->name,
                    $booking->billboard->user->email,
                    $booking->billboard->city . ', ' . $booking->billboard->state,
                    $booking->start_date,
                    $booking->end_date,
                    Carbon::parse($booking->start_date)->diffInDays($booking->end_date) + 1,
                    $booking->total_amount,
                    $booking->total_amount * 0.1,
                    $booking->total_amount * 0.9,
                    $booking->payment_status,
                    $booking->transfer_status,
                    $booking->payment_reference,
                    $booking->transfer_reference,
                    $booking->paid_at ? $booking->paid_at->format('Y-m-d H:i:s') : '',
                    $booking->transferred_at ? $booking->transferred_at->format('Y-m-d H:i:s') : ''
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * Route alias: /dashboard/admin/payments/export
     */
    public function export(Request $request)
    {
        return $this->exportCsv($request);
    }

    /**
     * Get payment statistics
     */
    private function getPaymentStats($dateFrom, $dateTo)
    {
        $query = Booking::whereBetween('created_at', [$dateFrom, $dateTo]);

        return [
            'total_bookings' => $query->count(),
            'total_revenue' => $query->where('payment_status', 'paid')->sum('total_amount'),
            'platform_commission' => $query->where('payment_status', 'paid')->sum('total_amount') * 0.1,
            'loap_earnings' => $query->where('payment_status', 'paid')->sum('total_amount') * 0.9,
            'paid_bookings' => $query->where('payment_status', 'paid')->count(),
            'pending_payments' => $query->where('payment_status', 'pending')->count(),
            'failed_payments' => $query->where('payment_status', 'failed')->count(),
            'completed_transfers' => $query->where('transfer_status', 'completed')->count(),
            'pending_transfers' => $query->where('transfer_status', 'pending')->count(),
            'failed_transfers' => $query->where('transfer_status', 'failed')->count(),
        ];
    }

    /**
     * Get monthly revenue trends
     */
    private function getMonthlyTrends()
    {
        return Booking::where('payment_status', 'paid')
            ->where('created_at', '>=', Carbon::now()->subMonths(12))
            ->select(
                DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'),
                DB::raw('COUNT(*) as bookings_count'),
                DB::raw('SUM(total_amount) as total_revenue'),
                DB::raw('SUM(total_amount * 0.1) as platform_commission'),
                DB::raw('SUM(total_amount * 0.9) as loap_earnings')
            )
            ->groupBy('month')
            ->orderBy('month')
            ->get();
    }

    /**
     * Get top performing billboards
     */
    private function getTopPerformingBillboards($dateFrom, $dateTo)
    {
        return Billboard::with('user')
            ->whereHas('bookings', function($query) use ($dateFrom, $dateTo) {
                $query->where('payment_status', 'paid')
                      ->whereBetween('created_at', [$dateFrom, $dateTo]);
            })
            ->withCount(['bookings as paid_bookings_count' => function($query) use ($dateFrom, $dateTo) {
                $query->where('payment_status', 'paid')
                      ->whereBetween('created_at', [$dateFrom, $dateTo]);
            }])
            ->withSum(['bookings as total_earnings' => function($query) use ($dateFrom, $dateTo) {
                $query->where('payment_status', 'paid')
                      ->whereBetween('created_at', [$dateFrom, $dateTo]);
            }], 'total_amount')
            ->orderBy('total_earnings', 'desc')
            ->limit(10)
            ->get()
            ->map(function($billboard) {
                $billboard->loap_earnings = $billboard->total_earnings * 0.9;
                $billboard->platform_commission = $billboard->total_earnings * 0.1;
                return $billboard;
            });
    }

    /**
     * Get recent transactions
     */
    private function getRecentTransactions($limit = 10)
    {
        return Booking::with(['billboard.user', 'advertiser'])
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();
    }

    /**
     * Get payment status breakdown
     */
    private function getPaymentStatusBreakdown($dateFrom, $dateTo)
    {
        return Booking::whereBetween('created_at', [$dateFrom, $dateTo])
            ->select('payment_status', DB::raw('COUNT(*) as count'), DB::raw('SUM(total_amount) as total'))
            ->groupBy('payment_status')
            ->get();
    }

    /**
     * Get transfer status breakdown
     */
    private function getTransferStatusBreakdown($dateFrom, $dateTo)
    {
        return Booking::whereBetween('created_at', [$dateFrom, $dateTo])
            ->where('payment_status', 'paid')
            ->select('transfer_status', DB::raw('COUNT(*) as count'), DB::raw('SUM(total_amount * 0.9) as total'))
            ->groupBy('transfer_status')
            ->get();
    }

    /**
     * Authorize admin access
     */
    private function authorizeAdmin()
    {
        $user = Auth::user();
        if (!$user || strtolower($user->role) !== 'admin') {
            abort(403, 'Unauthorized');
        }
    }
}
