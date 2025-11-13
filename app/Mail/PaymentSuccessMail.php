<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PaymentSuccessMail extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;
    public $recipientType;

    /**
     * Create a new message instance.
     */
    public function __construct(Booking $booking, string $recipientType)
    {
        $this->booking = $booking;
        $this->recipientType = $recipientType; // 'advertiser' or 'loap'
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $subject = $this->recipientType === 'advertiser' 
            ? 'Payment Successful - Billboard Booking Confirmed'
            : 'Payment Received - Billboard Booking Payment';

        return new Envelope(
            subject: $subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $view = $this->recipientType === 'advertiser' 
            ? 'emails.payment-success-advertiser'
            : 'emails.payment-success-loap';

        return new Content(
            view: $view,
            with: [
                'booking' => $this->booking,
                'billboard' => $this->booking->billboard,
                'advertiser' => $this->booking->advertiser,
                'loap' => $this->booking->loap,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
