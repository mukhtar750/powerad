<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Billboard;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        if (!$user || strtolower($user->role) !== 'admin') {
            abort(403, 'Unauthorized');
        }

        // User stats
        $totalUsers = User::count();
        $roleCounts = [
            'admins' => User::where('role', 'admin')->count(),
            'loaps' => User::where('role', 'loap')->count(),
            'advertisers' => User::where('role', 'advertiser')->count(),
            'regulators' => User::where('role', 'regulator')->count(),
            'serviceProviders' => User::where('role', 'service_provider')->count(),
        ];

        // Billboard stats
        $totalBillboards = Billboard::count();
        $billboardCounts = [
            'available' => Billboard::where('status', 'available')->where('is_active', true)->count(),
            'booked' => Billboard::where('status', 'booked')->count(),
            'maintenance' => Billboard::where('status', 'maintenance')->count(),
            'inactive' => Billboard::where('is_active', false)->count(),
            'verified' => Billboard::where('is_verified', true)->count(),
            'unverified' => Billboard::where('is_verified', false)->count(),
        ];

        // Recent data
        $recentUsers = User::latest()->limit(5)->get();
        $recentBillboards = Billboard::withCount('bookings')
            ->latest()
            ->limit(5)
            ->get();
        $recentBookings = Booking::with(['billboard', 'advertiser'])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Activity Log (derived from recent verifications and creations)
        $billboardVerifications = Billboard::where('is_verified', true)
            ->orderByDesc('updated_at')
            ->limit(5)
            ->get()
            ->map(function ($b) {
                return [
                    'time' => $b->updated_at,
                    'text' => 'Billboard verified: ' . $b->title,
                    'bg' => 'bg-green-500',
                ];
            });

        $billboardCreations = Billboard::orderByDesc('created_at')
            ->limit(5)
            ->get()
            ->map(function ($b) {
                return [
                    'time' => $b->created_at,
                    'text' => 'Billboard created: ' . $b->title,
                    'bg' => 'bg-blue-500',
                ];
            });

        $userVerifications = User::where('is_verified', true)
            ->orderByDesc('updated_at')
            ->limit(5)
            ->get()
            ->map(function ($u) {
                return [
                    'time' => $u->updated_at,
                    'text' => 'User verified: ' . $u->name,
                    'bg' => 'bg-green-500',
                ];
            });

        $activityLog = collect()
            ->concat($billboardVerifications)
            ->concat($billboardCreations)
            ->concat($userVerifications)
            ->sortByDesc('time')
            ->values()
            ->take(8);

        return view('dashboards.admin.admin', [
            'totalUsers' => $totalUsers,
            'roleCounts' => $roleCounts,
            'totalBillboards' => $totalBillboards,
            'billboardCounts' => $billboardCounts,
            'recentUsers' => $recentUsers,
            'recentBillboards' => $recentBillboards,
            'recentBookings' => $recentBookings,
            'activityLog' => $activityLog,
        ]);
    }
}


