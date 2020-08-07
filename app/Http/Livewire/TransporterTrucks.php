<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Truck;

class TransporterTrucks extends Component
{
    public $trucks;

    public function mount()
    {
        $this->trucks = Truck::where('organization_id', Auth::user()->organization_id)->select('id')->get()->toArray();
    }

    public function render()
    {
        return view('livewire.transporter-trucks');
    }
}
