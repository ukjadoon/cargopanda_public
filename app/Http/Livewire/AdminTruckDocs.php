<?php

namespace App\Http\Livewire;

use App\Document;
use Livewire\Component;

class AdminTruckDocs extends Component
{
    public $truckDocs;

    public $newTruckDocs;

    public function mount()
    {
        $this->truckDocs = Document::where('type', 'truck_doc')->get()->toArray();
        $this->newTruckDocs = [];
    }

    public function addNewTruckDoc()
    {
        array_push($this->newTruckDocs, 1);
    }

    public function render()
    {
        return view('livewire.admin-truck-docs');
    }
}
