<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function authorizeAdmin()
    {
        $user = Auth::user();
        if (!$user || strtolower($user->role) !== 'admin') {
            abort(403, 'Unauthorized');
        }
    }

    public function index(Request $request)
    {
        $this->authorizeAdmin();

        $query = Booking::with(['billboard', 'advertiser', 'loap']);

        if ($request->filled('status')) {
            $query->where('status', $request->string('status'));
        }

        if ($request->filled('payment_status')) {
            $query->where('payment_status', $request->string('payment_status'));
        }

        $bookings = $query->latest()->paginate(15)->appends($request->query());

        // Calculate totals
        $stats = [
            'total_revenue' => Booking::where('payment_status', 'paid')->sum('total_amount'),
            'total_commission' => Booking::where('payment_status', 'paid')->sum('company_commission'),
            'total_loap_earnings' => Booking::where('payment_status', 'paid')->sum('loap_amount'),
            'pending_payments' => Booking::where('payment_status', 'pending')->count(),
        ];

        return view('dashboards.admin.payments', compact('bookings', 'stats'));
    }

    public function loapEarnings(Request $request)
    {
        $this->authorizeAdmin();

        $query = User::where('role', 'loap')->withCount('billboards');

        if ($request->filled('search')) {
            $search = $request->string('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $loaps = $query->get()->map(function ($loap) {
            $earnings = Booking::where('loap_id', $loap->id)
                ->where('payment_status', 'paid')
                ->sum('loap_amount');
            
            $pending = Booking::where('loap_id', $loap->id)
                ->where('payment_status', 'pending')
                ->sum('loap_amount');

            $loap->total_earnings = $earnings;
            $loap->pending_earnings = $pending;
            return $loap;
        });

        return view('dashboards.admin.loap-earnings', compact('loaps'));
    }

    public function markAsPaid(Booking $booking)
    {
        $this->authorizeAdmin();
        
        $booking->update([
            'payment_status' => 'paid',
            'status' => 'active',
        ]);

        return back()->with('status', 'Booking marked as paid');
    }

    public function markAsCompleted(Booking $booking)
    {
        $this->authorizeAdmin();
        
        $booking->update(['status' => 'completed']);
        
        // Make billboard available again
        $booking->billboard->update(['status' => 'available']);

        return back()->with('status', 'Booking marked as completed');
    }
}