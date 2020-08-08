<?php

namespace App\Http\Livewire;

use App\Document;
use Livewire\Component;

class AdminOrganizationDocs extends Component
{
    public $organizationDocs;

    public $newOrganizationDocs;

    public function mount()
    {
        $this->organizationDocs = Document::where('type', 'organization_doc')->get()->toArray();
        $this->newOrganizationDocs = [];
    }

    public function addNewOrganizationDoc()
    {
        array_push($this->newOrganizationDocs, 1);
    }

    public function render()
    {
        return view('livewire.admin-organization-docs');
    }
}
