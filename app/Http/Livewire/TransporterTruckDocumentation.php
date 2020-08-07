<?php

namespace App\Http\Livewire;

use App\Truck;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TransporterTruckDocumentation extends Component
{
    public $trucks;

    public function mount()
    {
        $this->trucks = Truck::where('organization_id', Auth::user()->organization_id)->get()->toArray();
    }

    public function render()
    {
        return view('livewire.transporter-truck-documentation');
    }
}
