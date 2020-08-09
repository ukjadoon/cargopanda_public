<?php

namespace App\Http\Livewire;

use App\Truck;
use Livewire\Component;

class CreateUpdateTruck extends Component
{
    public $truck;

    public $truckId;

    public function mount($truckId = '')
    {
        $this->truckId = $truckId;
        $this->truck = [];

        if ($this->truckId) {
            $this->truck = Truck::find($truckId)->toArray();
        }
    }

    public function createOrUpdateTruck()
    {
        $this->validate([
            'truck.name' => 'required|min:3',
        ]);
        if (! $this->truckId) {
            $this->truckId = Truck::create(['name' => $this->truck['name']])->id;
        } else {
            Truck::find($this->truckId)->update([
                'name' => $this->truck['name']
            ]);
        }
        $this->emit('success', 'Truck information updated successfully');
    }

    public function resetModel()
    {
        $this->truck = [];
        if ($this->truckId) {
            $this->truck = Truck::find($this->truckId)->toArray();
        }
    }

    public function render()
    {
        return view('livewire.create-update-truck');
    }
}
