<?php

namespace App\Mail;

use App\Organization;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DocExpiresOnReminder extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $organization;
    public $expiringDocs;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Organization $organization, array $expiringDocs)
    {
        $this->user = $user;
        $this->organization = $organization;
        $this->expiringDocs = $expiringDocs;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.doc-expires-on-reminder');
    }
}
