<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Document;
use Illuminate\Support\Facades\Storage;

class AdminShowOrganizationDoc extends Component
{
    public $documentId;

    public $organizationId;

    public $pivot;

    public $expireDate;

    public $showApproveButton;

    public function mount($documentId, $organizationId)
    {
        $this->documentId = $documentId;
        $this->organizationId = $organizationId;
        $this->showApproveButton = false;
    }

    public function render()
    {
        return view('livewire.admin-show-organization-doc');
    }

    public function updateExpireDate($expireDate)
    {
        $this->expireDate = $expireDate;
        $this->showApproveButton = true;
    }

    public function updatePivot()
    {

        $model = Document::find($this->documentId);
        $model->organizations()->sync([
            $this->organizationId => [
                'status' => 'approved',
                'expires_on' => $this->expireDate
            ]
        ]);
        $this->showApproveButton = false;
        $this->emit('success', 'Document expiry date added successfully');
    }
}
