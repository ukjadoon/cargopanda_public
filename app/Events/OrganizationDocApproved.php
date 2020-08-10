<?php

namespace App\Events;

use App\Document;
use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrganizationDocApproved
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $document;
    public $user;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($organizationId, Document $document)
    {
        $user = User::where('organization_id', $organizationId)->firstOrFail();
        $this->document = $document;
        $this->user = $user;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        //return new PrivateChannel('channel-name');
    }
}
