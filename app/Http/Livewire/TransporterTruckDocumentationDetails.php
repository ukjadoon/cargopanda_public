<?php

namespace App\Http\Livewire;

use App\Document;
use Livewire\Component;

class TransporterTruckDocumentationDetails extends Component
{
    public $truckDocs;

    public $truckId;

    public function mount($truckId)
    {
        $this->truckDocs = Document::where('type', 'truck_doc')->get()->toArray();
        $this->truckId = $truckId;
    }

    public function render()
    {
        return view('livewire.transporter-truck-documentation-details');
    }
}
