<?php

namespace App\Http\Controllers;

use App\Models\Billboard;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdvertiserBillboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display available billboards for advertisers to browse.
     */
    public function index(Request $request)
    {
        $query = Billboard::where('is_active', true)
                         ->where('is_verified', true)
                         ->where('status', 'available')
                         ->with(['user', 'bookings' => function($q) {
                             $q->where('status', 'active')
                               ->where('end_date', '>=', now());
                         }]);

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%")
                  ->orWhere('city', 'like', "%{$search}%")
                  ->orWhere('state', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Filter by type
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        // Filter by city
        if ($request->filled('city')) {
            $query->where('city', $request->city);
        }

        // Filter by state
        if ($request->filled('state')) {
            $query->where('state', $request->state);
        }

        // Filter by price range
        if ($request->filled('min_price')) {
            $query->where('price_per_day', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price_per_day', '<=', $request->max_price);
        }

        // Filter by size
        if ($request->filled('size')) {
            $query->where('size', 'like', "%{$request->size}%");
        }

        // Filter by orientation
        if ($request->filled('orientation')) {
            $query->where('orientation', $request->orientation);
        }

        // Sort options
        $sortBy = $request->get('sort', 'created_at');
        $sortOrder = $request->get('order', 'desc');
        
        switch ($sortBy) {
            case 'price_asc':
                $query->orderBy('price_per_day', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price_per_day', 'desc');
                break;
            case 'location':
                $query->orderBy('city', 'asc')->orderBy('location', 'asc');
                break;
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            case 'popular':
                $query->withCount('bookings')->orderBy('bookings_count', 'desc');
                break;
            default:
                $query->orderBy('created_at', $sortOrder);
        }

        $billboards = $query->paginate(12);

        // Get filter options for dropdowns
        $cities = Billboard::where('is_active', true)
                          ->where('is_verified', true)
                          ->where('status', 'available')
                          ->distinct()
                          ->pluck('city')
                          ->sort()
                          ->values();

        $states = Billboard::where('is_active', true)
                          ->where('is_verified', true)
                          ->where('status', 'available')
                          ->distinct()
                          ->pluck('state')
                          ->sort()
                          ->values();

        $types = Billboard::where('is_active', true)
                         ->where('is_verified', true)
                         ->where('status', 'available')
                         ->distinct()
                         ->pluck('type')
                         ->sort()
                         ->values();

        $sizes = Billboard::where('is_active', true)
                         ->where('is_verified', true)
                         ->where('status', 'available')
                         ->distinct()
                         ->pluck('size')
                         ->sort()
                         ->values();

        $orientations = Billboard::where('is_active', true)
                               ->where('is_verified', true)
                               ->where('status', 'available')
                               ->distinct()
                               ->pluck('orientation')
                               ->sort()
                               ->values();

        // Price range for slider
        $priceRange = Billboard::where('is_active', true)
                             ->where('is_verified', true)
                             ->where('status', 'available')
                             ->selectRaw('MIN(price_per_day) as min_price, MAX(price_per_day) as max_price')
                             ->first();

        return view('dashboards.advertiser.discover', compact(
            'billboards', 'cities', 'states', 'types', 'sizes', 'orientations', 'priceRange'
        ));
    }

    /**
     * Show detailed view of a specific billboard.
     */
    public function show(Billboard $billboard)
    {
        // Ensure billboard is available and active
        if (!$billboard->is_active || !$billboard->is_verified || $billboard->status !== 'available') {
            abort(404, 'Billboard not available');
        }

        $billboard->load(['user', 'bookings' => function($q) {
            $q->where('status', 'active')
              ->where('end_date', '>=', now())
              ->orderBy('start_date');
        }]);

        // Get similar billboards
        $similarBillboards = Billboard::where('is_active', true)
                                    ->where('is_verified', true)
                                    ->where('status', 'available')
                                    ->where('id', '!=', $billboard->id)
                                    ->where(function($q) use ($billboard) {
                                        $q->where('city', $billboard->city)
                                          ->orWhere('type', $billboard->type)
                                          ->orWhere('state', $billboard->state);
                                    })
                                    ->with('user')
                                    ->limit(4)
                                    ->get();
        
        return view('dashboards.advertiser.billboard-detail', compact('billboard', 'similarBillboards'));
    }

    /**
     * Get billboard availability for date range
     */
    public function checkAvailability(Request $request, Billboard $billboard)
    {
        $request->validate([
            'start_date' => 'required|date|after:today',
            'end_date' => 'required|date|after:start_date',
        ]);

        $startDate = $request->start_date;
        $endDate = $request->end_date;

        // Check for conflicting bookings
        $conflicts = Booking::where('billboard_id', $billboard->id)
                           ->where('status', 'active')
                           ->where(function($q) use ($startDate, $endDate) {
                               $q->whereBetween('start_date', [$startDate, $endDate])
                                 ->orWhereBetween('end_date', [$startDate, $endDate])
                                 ->orWhere(function($q2) use ($startDate, $endDate) {
                                     $q2->where('start_date', '<=', $startDate)
                                        ->where('end_date', '>=', $endDate);
                                 });
                           })
                           ->exists();

        $isAvailable = !$conflicts;

        // Calculate pricing
        $durationDays = \Carbon\Carbon::parse($startDate)->diffInDays(\Carbon\Carbon::parse($endDate)) + 1;
        $totalAmount = $billboard->price_per_day * $durationDays;
        $companyCommission = $totalAmount * 0.10;
        $loapAmount = $totalAmount * 0.90;

        return response()->json([
            'available' => $isAvailable,
            'duration_days' => $durationDays,
            'total_amount' => $totalAmount,
            'company_commission' => $companyCommission,
            'loap_amount' => $loapAmount,
            'daily_rate' => $billboard->price_per_day,
        ]);
    }

    /**
     * Get user's booking history
     */
    public function myBookings(Request $request)
    {
        $query = Booking::where('advertiser_id', Auth::id())
                       ->with(['billboard', 'loap']);

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by payment status
        if ($request->filled('payment_status')) {
            $query->where('payment_status', $request->payment_status);
        }

        $bookings = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('dashboards.advertiser.my-bookings', compact('bookings'));
    }

    /**
     * Cancel a booking
     */
    public function cancelBooking(Request $request, Booking $booking)
    {
        // Ensure user owns this booking
        if ($booking->advertiser_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        // Only allow cancellation of pending bookings
        if ($booking->status !== 'pending') {
            return response()->json([
                'success' => false,
                'message' => 'Only pending bookings can be cancelled'
            ], 400);
        }

        $booking->update([
            'status' => 'cancelled',
            'payment_status' => 'cancelled'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Booking cancelled successfully'
        ]);
    }
}
