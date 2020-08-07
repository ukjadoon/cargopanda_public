<?php

namespace App\Http\Livewire;

use App\DocumentDefinition;
use Livewire\Component;

class TransporterOrganizationDocs extends Component
{
    public $organizationDocs;

    public function mount()
    {
        $this->organizationDocs = DocumentDefinition::where('type', 'organization_doc')->get()->toArray();
    }

    public function render()
    {
        return view('livewire.transporter-organization-docs');
    }
}
