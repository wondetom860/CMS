<?php

namespace App\Mail;

use App\Models\Case_Staff_Assignment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class staffAssignment extends Mailable
{
    use Queueable, SerializesModels;
    public $csa;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($csaa)
    {
        // var_dump($csaa->case->case_number);exit;
        $this->csa = $csaa;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Staff Assignment',
        );
    }

    public function build()
    {
        return $this->view('mail.staff-assignment');
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'mail.staff-assignment',
            with: ['csa' => $this->csa]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
