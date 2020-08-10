<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notifiable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Events\{
    OrganizationDocApproved,
    TokenRequested,
    TruckDocApproved
};
use App\Mail\{
    LoginRequested,
    OrganizationDocApproved as OrganizationDocApprovedMailable,
    TruckDocApproved as TruckDocApprovedMailable,
};

class SendEmailNotification implements ShouldQueue
{
    use Notifiable;

    private const PATH = 'App\Listeners\SendEmailNotification@';

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
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            TokenRequested::class,
            self::PATH . 'tokenRequested'
        );

        $events->listen(
            OrganizationDocApproved::class,
            self::PATH . 'organizationDocApproved'
        );

        $events->listen(
            TruckDocApproved::class,
            self::PATH . 'truckDocApproved'
        );
    }

    public function tokenRequested($event)
    {
        Mail::to($event->authToken->email)->send(new LoginRequested($event->authToken));
    }

    public function organizationDocApproved($event)
    {
        Mail::to($event->user->email)->send(new OrganizationDocApprovedMailable($event->user, $event->document));
    }

    public function truckDocApproved($event)
    {
        Mail::to($event->user->email)->send(new TruckDocApprovedMailable($event->user, $event->document, $event->truck));
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        //
    }
}
