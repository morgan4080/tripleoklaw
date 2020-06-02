<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ApplicationJobApplicant extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $application;

    public function __construct($application)
    {
        $this->appointment = $application;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('applications@mg.tripleoklaw.com', 'Job Application Form')
                    ->replyTo($this->application->email)
                    ->subject('Application Response')
                    ->view('emails.applicant');
    }
}
