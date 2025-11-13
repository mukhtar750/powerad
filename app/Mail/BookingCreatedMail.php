<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookingCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;
    public $recipientType;

    /**
     * Create a new message instance.
     */
    public function __construct(Booking $booking, string $recipientType = 'advertiser')
    {
        $this->booking = $booking;
        $this->recipientType = $recipientType;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $subject = $this->recipientType === 'loap' 
            ? 'New Booking Received - ' . $this->booking->billboard->title
            : 'Booking Created Successfully - ' . $this->booking->billboard->title;

        return new Envelope(
            subject: $subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $view = $this->recipientType === 'loap' 
            ? 'emails.booking-created-loap'
            : 'emails.booking-created-advertiser';

        return new Content(
            view: $view,
            with: [
                'booking' => $this->booking,
                'billboard' => $this->booking->billboard,
                'advertiser' => $this->booking->advertiser,
                'loap' => $this->booking->billboard->user,
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
