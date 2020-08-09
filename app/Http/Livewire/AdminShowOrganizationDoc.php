<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\DocumentOrganization;
use Illuminate\Support\Facades\Storage;

class AdminShowOrganizationDoc extends Component
{
    public $documentId;

    public $documentModel;

    public $organizationId;

    public $pivot;

    public function mount($documentId, $organizationId)
    {
        $this->documentId = $documentId;
        $this->organizationId = $organizationId;
        /*$this->pivotModel = DocumentOrganization::where('document_id', $documentId)
            ->where('organization_id', $organizationId)->first();*/
    }

    public function render()
    {
        return view('livewire.admin-show-organization-doc');
    }
}
