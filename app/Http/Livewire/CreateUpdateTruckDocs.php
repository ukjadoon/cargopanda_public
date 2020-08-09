<?php

namespace App\Http\Livewire;

use App\Document;
use Livewire\Component;

class CreateUpdateTruckDocs extends Component
{
    public $truckDocId;

    public $truckDoc;

    public function mount($truckDocId = '')
    {
        $this->truckDocId = $truckDocId;
        $this->truckDoc = [];
        if ($truckDocId) {
            $this->truckDoc = Document::find($truckDocId)->toArray();
        }
    }

    public function resetModel()
    {
        if (! $this->truckDocId) {
            $this->truckDoc = [
                'name' => '',
                'description' => '',
            ];
        } else {
            $this->truckDoc = Document::find($this->truckDocId)->toArray();
        }
    }

    public function render()
    {
        return view('livewire.create-update-truck-docs');
    }

    public function createOrUpdateTruckDoc()
    {
        $this->validate([
            'truckDoc.name' => 'required|min:5',
            'truckDoc.description' => 'min:5',
        ]);
        if (! $this->truckDocId) {
            $this->truckDocId = Document::create(['name' => $this->truckDoc['name'], 'description' => $this->truckDoc['description'], 'type' => 'truck_doc'])->id;
        } else {
            Document::find($this->truckDocId)->update([
                'name' => $this->truckDoc['name'],
                'description' => $this->truckDoc['description']
            ]);
        }
        $this->emit('success', 'Truck document updated successfully');
    }
}
