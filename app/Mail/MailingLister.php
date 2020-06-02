<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailingLister extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $information;

    public function __construct($information)
    {
        $this->information = $information;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->information->senderEmail, $this->information->senderName)
                    ->replyTo($this->information->replyToEmail)
                    ->subject($this->information->subjectEmail)
                    ->view('emails.mailinglist')
                    ->with([
                        'information' => $this->information
                    ]);
    }
}
