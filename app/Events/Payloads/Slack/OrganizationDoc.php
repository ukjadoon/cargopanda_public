<?php

namespace App\Events\Payloads\Slack;

use App\Contracts\Slack\Message;
use App\Document;
use App\Organization;

class OrganizationDoc implements Message
{
    private $document;
    private $organization;

    public function __construct(Document $document, $organizationId)
    {
        $this->document = $document;
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
        return 'A :office: document was uploaded';
    }

    public function getFields():array
    {
        return [
            'Document' => $this->document->name,
            'Organization Id' => $this->organization->id,
            'Organization name' => $this->organization->name,
        ];
    }

    public function getUrl():string
    {
        return route('admin-show-organization-doc', ['documentId' => $this->document->id, 'organizationId' => $this->organization->id]);
    }
}