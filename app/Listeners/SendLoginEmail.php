<?php

namespace App\Listeners;

use App\Events\TokenRequested;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\LoginRequested;
use Illuminate\Support\Facades\Mail;

class SendLoginEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  TokenRequested  $event
     * @return void
     */
    public function handle(TokenRequested $event)
    {
        Mail::to($event->authToken->email)->send(new LoginRequested($event->authToken));
    }
}
