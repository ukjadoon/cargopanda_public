<?php

namespace App\Http\Livewire;

use App\Document;
use Livewire\Component;

class TransporterOrganizationDocs extends Component
{
    public $organizationDocs;

    public function mount()
    {
        $this->organizationDocs = Document::where('type', 'organization_doc')->get()->toArray();
    }

    public function render()
    {
        return view('livewire.transporter-organization-docs');
    }
}
