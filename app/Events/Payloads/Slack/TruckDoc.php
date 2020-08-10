<?php

namespace App\Events\Payloads\Slack;

use App\Contracts\Slack\Message;
use App\Document;
use App\Organization;
use App\Truck;

class TruckDoc implements Message
{
    private $document;
    private $truck;
    private $organization;

    public function __construct(Document $document, $truckId, $organizationId)
    {
        $this->document = $document;
        $this->truck = Truck::findOrFail($truckId);
        $this->organization = Organization::findOrFail($organizationId);
    }

    public function getFromName():string
    {
        return 'Cargo Panda Server';
    }

    public function getFromEmoji():string
    {
        return ':panda_face:';
    }

    public function getTitle():string
    {
        return $this->document->name;
    }
    
    public function getContent():string
    {
        return 'A :truck: document was uploaded';
    }

    public function getFields():array
    {
        return [
            'Document' => $this->document->name,
            'Truck name' => $this->truck->name,
            'Organization Id' => $this->organization->id,
            'Organization name' => $this->organization->name,
        ];
    }

    public function getUrl():string
    {
        return route('admin-show-truck-doc', ['documentId' => $this->document->id, 'truckId' => $this->truck->id]);
    }
}