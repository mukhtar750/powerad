<?php

namespace App\Services;

use App\Models\Notification;
use App\Models\User;
use App\Models\Booking;
use App\Models\Billboard;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentSuccessMail;
use App\Mail\BookingCreatedMail;
use App\Mail\BillboardVerifiedMail;
use App\Mail\BillboardUnverifiedMail;
use App\Mail\TransferCompletedMail;
use App\Mail\TransferFailedMail;

class NotificationService
{
    /**
     * Send a notification to a user
     */
    public function sendNotification(User $user, string $type, array $data = []): Notification
    {
        return Notification::create([
            'type' => $type,
            'notifiable_type' => User::class,
            'notifiable_id' => $user->id,
            'data' => $data,
        ]);
    }

    /**
     * Send booking created notifications
     */
    public function notifyBookingCreated(Booking $booking): void
    {
        $billboard = $booking->billboard;
        $advertiser = $booking->advertiser;
        $loap = $billboard->user;

        // Notify advertiser
        $this->sendNotification($advertiser, 'booking_created', [
            'title' => 'Booking Created Successfully',
            'message' => "Your booking for '{$billboard->title}' has been created and is pending payment.",
            'booking_id' => $booking->id,
            'billboard_title' => $billboard->title,
            'amount' => $booking->total_amount,
            'start_date' => $booking->start_date,
            'end_date' => $booking->end_date,
        ]);

        // Notify LOAP
        $this->sendNotification($loap, 'booking_received', [
            'title' => 'New Booking Received',
            'message' => "You have received a new booking for '{$billboard->title}' from {$advertiser->name}.",
            'booking_id' => $booking->id,
            'billboard_title' => $billboard->title,
            'advertiser_name' => $advertiser->name,
            'amount' => $booking->total_amount,
            'start_date' => $booking->start_date,
            'end_date' => $booking->end_date,
        ]);

        // Send email notifications
        try {
            Mail::to($advertiser->email)->send(new BookingCreatedMail($booking));
            Mail::to($loap->email)->send(new BookingCreatedMail($booking, 'loap'));
        } catch (\Exception $e) {
            \Log::error('Failed to send booking created emails: ' . $e->getMessage());
        }
    }

    /**
     * Send payment success notifications
     */
    public function notifyPaymentSuccess(Booking $booking): void
    {
        $billboard = $booking->billboard;
        $advertiser = $booking->advertiser;
        $loap = $billboard->user;

        // Notify advertiser
        $this->sendNotification($advertiser, 'payment_success', [
            'title' => 'Payment Successful',
            'message' => "Your payment for '{$billboard->title}' has been processed successfully.",
            'booking_id' => $booking->id,
            'billboard_title' => $billboard->title,
            'amount' => $booking->total_amount,
            'start_date' => $booking->start_date,
            'end_date' => $booking->end_date,
        ]);

        // Notify LOAP
        $this->sendNotification($loap, 'payment_received', [
            'title' => 'Payment Received',
            'message' => "Payment has been received for your billboard '{$billboard->title}'. Your earnings will be transferred within 24-48 hours.",
            'booking_id' => $booking->id,
            'billboard_title' => $billboard->title,
            'advertiser_name' => $advertiser->name,
            'total_amount' => $booking->total_amount,
            'your_earnings' => $booking->total_amount * 0.9,
            'start_date' => $booking->start_date,
            'end_date' => $booking->end_date,
        ]);

        // Send email notifications
        try {
            Mail::to($advertiser->email)->send(new PaymentSuccessMail($booking, 'advertiser'));
            Mail::to($loap->email)->send(new PaymentSuccessMail($booking, 'loap'));
        } catch (\Exception $e) {
            \Log::error('Failed to send payment success emails: ' . $e->getMessage());
        }
    }

    /**
     * Send billboard verification notifications
     */
    public function notifyBillboardVerified(Billboard $billboard): void
    {
        $loap = $billboard->user;

        $this->sendNotification($loap, 'billboard_verified', [
            'title' => 'Billboard Verified',
            'message' => "Your billboard '{$billboard->title}' has been verified and is now live on the platform.",
            'billboard_id' => $billboard->id,
            'billboard_title' => $billboard->title,
            'location' => "{$billboard->city}, {$billboard->state}",
        ]);

        // Send email notification
        try {
            Mail::to($loap->email)->send(new BillboardVerifiedMail($billboard));
        } catch (\Exception $e) {
            \Log::error('Failed to send billboard verified email: ' . $e->getMessage());
        }
    }

    /**
     * Send billboard unverification notifications
     */
    public function notifyBillboardUnverified(Billboard $billboard, string $reason = null): void
    {
        $loap = $billboard->user;

        $this->sendNotification($loap, 'billboard_unverified', [
            'title' => 'Billboard Unverified',
            'message' => "Your billboard '{$billboard->title}' has been unverified. " . ($reason ? "Reason: {$reason}" : "Please contact support for more information."),
            'billboard_id' => $billboard->id,
            'billboard_title' => $billboard->title,
            'location' => "{$billboard->city}, {$billboard->state}",
            'reason' => $reason,
        ]);

        // Send email notification
        try {
            Mail::to($loap->email)->send(new BillboardUnverifiedMail($billboard, $reason));
        } catch (\Exception $e) {
            \Log::error('Failed to send billboard unverified email: ' . $e->getMessage());
        }
    }

    /**
     * Send transfer completed notifications
     */
    public function notifyTransferCompleted(Booking $booking): void
    {
        $loap = $booking->billboard->user;

        $this->sendNotification($loap, 'transfer_completed', [
            'title' => 'Transfer Completed',
            'message' => "Your earnings of ₦" . number_format($booking->total_amount * 0.9) . " for '{$booking->billboard->title}' have been transferred to your account.",
            'booking_id' => $booking->id,
            'billboard_title' => $booking->billboard->title,
            'amount' => $booking->total_amount * 0.9,
            'transfer_reference' => $booking->transfer_reference,
        ]);

        // Send email notification
        try {
            Mail::to($loap->email)->send(new TransferCompletedMail($booking));
        } catch (\Exception $e) {
            \Log::error('Failed to send transfer completed email: ' . $e->getMessage());
        }
    }

    /**
     * Send transfer failed notifications
     */
    public function notifyTransferFailed(Booking $booking, string $reason = null): void
    {
        $loap = $booking->billboard->user;

        $this->sendNotification($loap, 'transfer_failed', [
            'title' => 'Transfer Failed',
            'message' => "Transfer of your earnings for '{$booking->billboard->title}' has failed. " . ($reason ? "Reason: {$reason}" : "Please contact support."),
            'booking_id' => $booking->id,
            'billboard_title' => $booking->billboard->title,
            'amount' => $booking->total_amount * 0.9,
            'reason' => $reason,
        ]);

        // Send email notification
        try {
            Mail::to($loap->email)->send(new TransferFailedMail($booking, $reason));
        } catch (\Exception $e) {
            \Log::error('Failed to send transfer failed email: ' . $e->getMessage());
        }
    }

    /**
     * Send booking cancelled notifications
     */
    public function notifyBookingCancelled(Booking $booking, string $reason = null): void
    {
        $billboard = $booking->billboard;
        $advertiser = $booking->advertiser;
        $loap = $billboard->user;

        // Notify advertiser
        $this->sendNotification($advertiser, 'booking_cancelled', [
            'title' => 'Booking Cancelled',
            'message' => "Your booking for '{$billboard->title}' has been cancelled." . ($reason ? " Reason: {$reason}" : ""),
            'booking_id' => $booking->id,
            'billboard_title' => $billboard->title,
            'reason' => $reason,
        ]);

        // Notify LOAP
        $this->sendNotification($loap, 'booking_cancelled', [
            'title' => 'Booking Cancelled',
            'message' => "A booking for '{$billboard->title}' by {$advertiser->name} has been cancelled." . ($reason ? " Reason: {$reason}" : ""),
            'booking_id' => $booking->id,
            'billboard_title' => $billboard->title,
            'advertiser_name' => $advertiser->name,
            'reason' => $reason,
        ]);
    }

    /**
     * Send booking completed notifications
     */
    public function notifyBookingCompleted(Booking $booking): void
    {
        $billboard = $booking->billboard;
        $advertiser = $booking->advertiser;
        $loap = $billboard->user;

        // Notify advertiser
        $this->sendNotification($advertiser, 'booking_completed', [
            'title' => 'Campaign Completed',
            'message' => "Your advertising campaign for '{$billboard->title}' has been completed successfully.",
            'booking_id' => $booking->id,
            'billboard_title' => $billboard->title,
            'start_date' => $booking->start_date,
            'end_date' => $booking->end_date,
        ]);

        // Notify LOAP
        $this->sendNotification($loap, 'booking_completed', [
            'title' => 'Campaign Completed',
            'message' => "The advertising campaign for '{$billboard->title}' by {$advertiser->name} has been completed.",
            'booking_id' => $booking->id,
            'billboard_title' => $billboard->title,
            'advertiser_name' => $advertiser->name,
            'start_date' => $booking->start_date,
            'end_date' => $booking->end_date,
        ]);
    }

    /**
     * Get unread notifications count for a user
     */
    public function getUnreadCount(User $user): int
    {
        return Notification::where('notifiable_type', User::class)
            ->where('notifiable_id', $user->id)
            ->unread()
            ->count();
    }

    /**
     * Get recent notifications for a user
     */
    public function getRecentNotifications(User $user, int $limit = 10)
    {
        return Notification::where('notifiable_type', User::class)
            ->where('notifiable_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();
    }

    /**
     * Mark all notifications as read for a user
     */
    public function markAllAsRead(User $user): void
    {
        Notification::where('notifiable_type', User::class)
            ->where('notifiable_id', $user->id)
            ->whereNull('read_at')
            ->update(['read_at' => now()]);
    }
}
