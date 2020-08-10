<?php

namespace App\Events;

use App\Document;
use App\Truck;
use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TruckDocApproved
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $document;
    public $user;
    public $truck;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Document $document, $truckId)
    {
        $this->document = $document;
        $this->truck = Truck::findOrFail($truckId);
        $this->user = User::where('organization_id', $this->truck->organization_id)->firstOrFail();
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
