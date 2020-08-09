<?php

namespace App\Http\Livewire;

use App\Checklist;
use Livewire\Component;

class TransporterChecklist extends Component
{
    public $checklistItems;

    public function mount()
    {
        $this->checklistItems = Checklist::all()->toArray();
    }

    public function render()
    {
        return view('livewire.transporter-checklist');
    }
}
