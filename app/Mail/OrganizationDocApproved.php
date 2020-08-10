<?php

namespace App\Mail;

use App\Document;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrganizationDocApproved extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public $document;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Document $document)
    {
        $this->user = $user;
        $this->document = $document;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.organization-doc-approved');
    }
}
