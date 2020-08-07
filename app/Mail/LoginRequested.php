<?php

namespace App\Mail;

use App\AuthToken;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LoginRequested extends Mailable
{
    use Queueable, SerializesModels;

    public $authToken;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(AuthToken $authToken)
    {
        $this->authToken = $authToken;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.login-requested');
    }
}
