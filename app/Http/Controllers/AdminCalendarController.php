<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class AdminCalendarController extends Controller
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

        $bookings = Booking::with(['billboard', 'advertiser'])
            ->orderBy('start_date', 'desc')
            ->get();

        $events = $bookings->map(function ($b) {
            $status = strtolower($b->status ?? '');
            // Simple status -> color mapping
            $color = match ($status) {
                'active' => '#10B981', // green-500
                'pending' => '#F59E0B', // yellow-500
                'completed' => '#3B82F6', // blue-500
                'cancelled' => '#6B7280', // gray-500
                default => '#6B7280',
            };

            return [
                'id' => $b->id,
                'title' => trim(($b->billboard->title ?? 'Billboard') . ' - ' . ($b->advertiser->name ?? 'Advertiser')),
                'start' => optional($b->start_date)->format('Y-m-d'),
                'end' => optional($b->end_date)->format('Y-m-d'),
                'color' => $color,
                'status' => $status,
            ];
        });

        return view('dashboards.admin.calendar', [
            'events' => $events,
        ]);
    }
}