<?php

namespace App\Http\Livewire;

use App\Checklist;
use Livewire\Component;

class AdminChecklist extends Component
{
    public $checklists;

    public $newChecklists;

    public function mount()
    {
        $this->checklists = Checklist::all()->toArray();
        $this->newChecklists = [];
    }

    public function addNewChecklist()
    {
        array_push($this->newChecklists, 1);
    }

    public function render()
    {
        return view('livewire.admin-checklist');
    }
}
