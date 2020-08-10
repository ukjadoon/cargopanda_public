<?php

namespace App\Http\Livewire;

use App\Document;
use App\Events\TruckDocApproved;
use Livewire\Component;

class AdminShowTruckDoc extends Component
{
    public $documentId;

    public $truckId;

    public $pivot;

    public $expireDate;

    public $showApproveButton;

    public function mount($documentId, $truckId)
    {
        $this->documentId = $documentId;
        $this->truckId = $truckId;
        $this->showApproveButton = false;
    }
    public function render()
    {
        return view('livewire.admin-show-truck-doc');
    }

    public function updateExpireDate($expireDate)
    {
        $this->expireDate = $expireDate;
        $this->showApproveButton = true;
    }

    public function updatePivot()
    {

        $model = Document::find($this->documentId);
        $model->trucks()->sync([
            $this->truckId => [
                'status' => 'approved',
                'expires_on' => $this->expireDate
            ]
        ]);
        $this->showApproveButton = false;
        $this->emit('success', 'Document expiry date added successfully');
        event(new TruckDocApproved($model, $this->truckId));
    }
}
