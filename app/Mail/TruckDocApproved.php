<?php

namespace App\Mail;

use App\Document;
use App\Truck;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TruckDocApproved extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public $document;

    public $truck;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Document $document, Truck $truck)
    {
        $this->user = $user;
        $this->document = $document;
        $this->truck = $truck;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.truck-doc-approved');
    }
}
