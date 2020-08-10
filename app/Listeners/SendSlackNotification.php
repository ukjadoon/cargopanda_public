<?php

namespace App\Listeners;

use App\Contracts\Slack\Message;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notifiable;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\{
    DocumentUploaded
};
use App\Notifications\{
    SlackDocumentUploaded
};
use Exception;

class SendSlackNotification implements ShouldQueue
{
    use Notifiable;

    private const PATH = 'App\Listeners\SendSlackNotification@';

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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
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
            DocumentUploaded::class,
            self::PATH . 'documentUploaded'
        );
    }

    /**
     * Route notifications for the Slack channel.
     *
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return string
     */
    public function routeNotificationForSlack($notification)
    {
        return config('app.slack_url');
    }

    public function documentUploaded($event)
    {
        if (! $event->payload instanceof Message) {

            throw new Exception('The payload should implement the Slack\Message contract');
        }
        $this->notify(new SlackDocumentUploaded($event->payload));
    }
}
