<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Welcomemail extends Mailable
{
    public $mailMessage;
    public $subjectText;

    public function __construct($mailMessage, $subjectText)
    {
        $this->mailMessage = $mailMessage;
        $this->subjectText = $subjectText;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subjectText,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.welcomemail',
            with: [
                'mailMessage' => $this->mailMessage,
                'subjectText' => $this->subjectText,
            ],
        );
    }
}
