<?php

namespace App\Notifications;

use App\Contracts\Slack\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\SlackMessage;

class SlackDocumentUploaded extends Notification implements ShouldQueue
{
    use Queueable;

    private $payload;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Message $payload)
    {
        $this->payload = $payload;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['slack'];
    }

    /**
     * Get the Slack representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return SlackMessage
     */
    public function toSlack($notifiable)
    {
        return (new SlackMessage)
                    ->success()
                    ->from($this->payload->getFromName(), $this->payload->getFromEmoji())
                    ->content($this->payload->getContent())
                    ->attachment(function ($attachment) {
                        $attachment->title(
                            $this->payload->getTitle(),
                            $this->payload->getUrl()
                        )
                        ->fields($this->payload->getFields());
                    });
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
