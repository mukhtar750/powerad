<?php

namespace App\Http\Controllers;

use App\Models\Billboard;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LoapDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:loap');
    }

    /**
     * Display the LOAP dashboard overview
     */
    public function index()
    {
        $user = Auth::user();
        
        // Get LOAP's billboards with statistics
        $billboards = Billboard::where('user_id', $user->id)
            ->with(['bookings' => function($query) {
                $query->where('status', '!=', 'cancelled');
            }])
            ->get();

        // Calculate statistics
        $stats = [
            'total_billboards' => $billboards->count(),
            'verified_billboards' => $billboards->where('is_verified', true)->count(),
            'active_billboards' => $billboards->where('is_active', true)->count(),
            'total_bookings' => $billboards->sum(function($billboard) {
                return $billboard->bookings->count();
            }),
            'active_bookings' => $billboards->sum(function($billboard) {
                return $billboard->bookings->where('status', 'active')->count();
            }),
            'total_earnings' => $billboards->sum(function($billboard) {
                return $billboard->bookings->where('payment_status', 'paid')->sum('total_amount') * 0.9; // 90% for LOAP
            }),
            'pending_earnings' => $billboards->sum(function($billboard) {
                return $billboard->bookings->where('payment_status', 'paid')
                    ->where('transfer_status', 'pending')->sum('total_amount') * 0.9;
            }),
            'transferred_earnings' => $billboards->sum(function($billboard) {
                return $billboard->bookings->where('transfer_status', 'completed')->sum('total_amount') * 0.9;
            })
        ];

        // Recent bookings
        $recentBookings = Booking::whereHas('billboard', function($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->with(['billboard', 'advertiser'])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Monthly earnings chart data
        $monthlyEarnings = Booking::whereHas('billboard', function($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->where('payment_status', 'paid')
            ->where('created_at', '>=', Carbon::now()->subMonths(12))
            ->select(
                DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'),
                DB::raw('SUM(total_amount * 0.9) as earnings')
            )
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Top performing billboards
        $topBillboards = $billboards->sortByDesc(function($billboard) {
            return $billboard->bookings->where('payment_status', 'paid')->sum('total_amount') * 0.9;
        })->take(5);

        return view('dashboards.loap.index', compact(
            'stats', 
            'recentBookings', 
            'monthlyEarnings', 
            'topBillboards'
        ));
    }

    /**
     * Display LOAP's billboards management page
     */
    public function billboards(Request $request)
    {
        $user = Auth::user();
        $query = Billboard::where('user_id', $user->id)
            ->with(['bookings' => function($q) {
                $q->where('status', '!=', 'cancelled');
            }]);

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%")
                  ->orWhere('city', 'like', "%{$search}%");
            });
        }

        // Filter by status
        if ($request->filled('status')) {
            switch ($request->status) {
                case 'verified':
                    $query->where('is_verified', true);
                    break;
                case 'unverified':
                    $query->where('is_verified', false);
                    break;
                case 'active':
                    $query->where('is_active', true);
                    break;
                case 'inactive':
                    $query->where('is_active', false);
                    break;
            }
        }

        // Sort options
        $sortBy = $request->get('sort', 'newest');
        switch ($sortBy) {
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            case 'oldest':
                $query->orderBy('created_at', 'asc');
                break;
            case 'price_high':
                $query->orderBy('price_per_day', 'desc');
                break;
            case 'price_low':
                $query->orderBy('price_per_day', 'asc');
                break;
            case 'most_booked':
                $query->withCount('bookings')->orderBy('bookings_count', 'desc');
                break;
        }

        $billboards = $query->paginate(12);

        return view('dashboards.loap.billboards', compact('billboards'));
    }

    /**
     * Display earnings and payments page
     */
    public function earnings(Request $request)
    {
        $user = Auth::user();
        
        // Get all bookings for LOAP's billboards
        $query = Booking::whereHas('billboard', function($q) use ($user) {
                $q->where('user_id', $user->id);
            })
            ->with(['billboard', 'advertiser']);

        // Filter by payment status
        if ($request->filled('payment_status')) {
            $query->where('payment_status', $request->payment_status);
        }

        // Filter by transfer status
        if ($request->filled('transfer_status')) {
            $query->where('transfer_status', $request->transfer_status);
        }

        // Date range filter
        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $bookings = $query->orderBy('created_at', 'desc')->paginate(15);

        // Calculate earnings summary
        $earningsSummary = [
            'total_earnings' => $bookings->where('payment_status', 'paid')->sum('total_amount') * 0.9,
            'pending_transfers' => $bookings->where('payment_status', 'paid')
                ->where('transfer_status', 'pending')->sum('total_amount') * 0.9,
            'completed_transfers' => $bookings->where('transfer_status', 'completed')->sum('total_amount') * 0.9,
            'this_month' => $bookings->where('payment_status', 'paid')
                ->where('created_at', '>=', Carbon::now()->startOfMonth())
                ->sum('total_amount') * 0.9,
            'last_month' => $bookings->where('payment_status', 'paid')
                ->whereBetween('created_at', [
                    Carbon::now()->subMonth()->startOfMonth(),
                    Carbon::now()->subMonth()->endOfMonth()
                ])
                ->sum('total_amount') * 0.9
        ];

        return view('dashboards.loap.earnings', compact('bookings', 'earningsSummary'));
    }

    /**
     * Display analytics and insights page
     */
    public function analytics()
    {
        $user = Auth::user();
        
        // Performance metrics
        $metrics = [
            'total_views' => rand(1000, 5000), // This would come from analytics tracking
            'conversion_rate' => rand(5, 15), // Percentage
            'average_booking_value' => Booking::whereHas('billboard', function($q) use ($user) {
                $q->where('user_id', $user->id);
            })->where('payment_status', 'paid')->avg('total_amount') * 0.9,
            'peak_booking_hours' => $this->getPeakBookingHours($user),
            'popular_locations' => $this->getPopularLocations($user),
            'seasonal_trends' => $this->getSeasonalTrends($user)
        ];

        // Revenue trends
        $revenueTrends = Booking::whereHas('billboard', function($q) use ($user) {
                $q->where('user_id', $user->id);
            })
            ->where('payment_status', 'paid')
            ->where('created_at', '>=', Carbon::now()->subMonths(12))
            ->select(
                DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'),
                DB::raw('COUNT(*) as bookings_count'),
                DB::raw('SUM(total_amount * 0.9) as revenue')
            )
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        return view('dashboards.loap.analytics', compact('metrics', 'revenueTrends'));
    }

    /**
     * Display profile and settings page
     */
    public function profile()
    {
        $user = Auth::user();
        
        // Get LOAP's Paystack subaccount info
        $subaccountInfo = null;
        if ($user->paystack_subaccount_code) {
            // This would typically fetch from Paystack API
            $subaccountInfo = [
                'subaccount_code' => $user->paystack_subaccount_code,
                'subaccount_id' => $user->paystack_subaccount_id,
                'bank_name' => $user->bank_name,
                'account_number' => $user->account_number ? '****' . substr($user->account_number, -4) : null,
                'account_name' => $user->account_name
            ];
        }

        return view('dashboards.loap.profile', compact('user', 'subaccountInfo'));
    }

    /**
     * Update LOAP profile
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'bank_name' => 'nullable|string|max:255',
            'account_number' => 'nullable|string|max:20',
            'account_name' => 'nullable|string|max:255',
            'avatar' => 'nullable|image|max:4096'
        ]);

        $user->update($request->only([
            'name', 'email', 'phone', 'company', 
            'bank_name', 'account_number', 'account_name'
        ]));

        // Handle optional avatar upload
        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('users/avatars', 'public');
            $user->avatar_path = $path;
            $user->save();
        }

        return redirect()->route('loap.profile')
            ->with('success', 'Profile updated successfully!');
    }

    /**
     * Get peak booking hours for analytics
     */
    private function getPeakBookingHours($user)
    {
        return Booking::whereHas('billboard', function($q) use ($user) {
                $q->where('user_id', $user->id);
            })
            ->select(DB::raw('HOUR(created_at) as hour'), DB::raw('COUNT(*) as count'))
            ->groupBy('hour')
            ->orderBy('count', 'desc')
            ->limit(5)
            ->get();
    }

    /**
     * Get popular locations for analytics
     */
    private function getPopularLocations($user)
    {
        return Billboard::where('user_id', $user->id)
            ->withCount('bookings')
            ->orderBy('bookings_count', 'desc')
            ->limit(5)
            ->get(['city', 'location', 'bookings_count']);
    }

    /**
     * Get seasonal trends for analytics
     */
    private function getSeasonalTrends($user)
    {
        return Booking::whereHas('billboard', function($q) use ($user) {
                $q->where('user_id', $user->id);
            })
            ->where('payment_status', 'paid')
            ->select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('SUM(total_amount * 0.9) as revenue')
            )
            ->groupBy('month')
            ->orderBy('month')
            ->get();
    }
}
