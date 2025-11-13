<?php

namespace App\Mail;

use App\Models\Billboard;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BillboardVerifiedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $billboard;

    /**
     * Create a new message instance.
     */
    public function __construct(Billboard $billboard)
    {
        $this->billboard = $billboard;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Billboard Verified - ' . $this->billboard->title,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.billboard-verified',
            with: [
                'billboard' => $this->billboard,
                'loap' => $this->billboard->user,
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
