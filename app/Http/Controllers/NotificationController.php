<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Services\NotificationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    protected $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->middleware('auth');
        $this->notificationService = $notificationService;
    }

    /**
     * Get notifications for the authenticated user
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $perPage = $request->get('per_page', 15);
        
        $notifications = Notification::where('notifiable_type', 'App\Models\User')
            ->where('notifiable_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);

        if ($request->expectsJson()) {
            return response()->json([
                'notifications' => $notifications,
                'unread_count' => $this->notificationService->getUnreadCount($user)
            ]);
        }

        return view('notifications.index', compact('notifications'));
    }

    /**
     * Get unread notifications count
     */
    public function unreadCount()
    {
        $user = Auth::user();
        $count = $this->notificationService->getUnreadCount($user);
        
        return response()->json(['count' => $count]);
    }

    /**
     * Get recent notifications
     */
    public function recent(Request $request)
    {
        $user = Auth::user();
        $limit = $request->get('limit', 10);
        
        $notifications = $this->notificationService->getRecentNotifications($user, $limit);
        
        return response()->json([
            'notifications' => $notifications,
            'unread_count' => $this->notificationService->getUnreadCount($user)
        ]);
    }

    /**
     * Mark a notification as read
     */
    public function markAsRead(Notification $notification)
    {
        $user = Auth::user();
        
        // Ensure the notification belongs to the authenticated user
        if ($notification->notifiable_type !== 'App\Models\User' || 
            $notification->notifiable_id !== $user->id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $notification->markAsRead();
        
        return response()->json([
            'success' => true,
            'unread_count' => $this->notificationService->getUnreadCount($user)
        ]);
    }

    /**
     * Mark a notification as unread
     */
    public function markAsUnread(Notification $notification)
    {
        $user = Auth::user();
        
        // Ensure the notification belongs to the authenticated user
        if ($notification->notifiable_type !== 'App\Models\User' || 
            $notification->notifiable_id !== $user->id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $notification->markAsUnread();
        
        return response()->json([
            'success' => true,
            'unread_count' => $this->notificationService->getUnreadCount($user)
        ]);
    }

    /**
     * Mark all notifications as read
     */
    public function markAllAsRead()
    {
        $user = Auth::user();
        $this->notificationService->markAllAsRead($user);
        
        return response()->json([
            'success' => true,
            'unread_count' => 0
        ]);
    }

    /**
     * Delete a notification
     */
    public function destroy(Notification $notification)
    {
        $user = Auth::user();
        
        // Ensure the notification belongs to the authenticated user
        if ($notification->notifiable_type !== 'App\Models\User' || 
            $notification->notifiable_id !== $user->id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $notification->delete();
        
        return response()->json([
            'success' => true,
            'unread_count' => $this->notificationService->getUnreadCount($user)
        ]);
    }
}
