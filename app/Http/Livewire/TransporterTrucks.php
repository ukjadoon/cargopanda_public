<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Truck;

class TransporterTrucks extends Component
{
    public $trucks;

    public $newTrucks;

    public function mount()
    {
        $this->trucks = Truck::where('organization_id', Auth::user()->organization_id)->select('id')->get()->toArray();
        $this->newTrucks = [];
    }

    public function render()
    {
        return view('livewire.transporter-trucks');
    }

    public function addNewTruck()
    {
        array_push($this->newTrucks, 1);
    }
}
