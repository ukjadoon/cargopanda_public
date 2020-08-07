<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Checklist;
use Illuminate\Support\Str;

class CreateUpdateChecklist extends Component
{
    public $checklistId;

    public $checklist;

    public function mount($checklistId = '')
    {
        $this->checklistId = $checklistId;
        $this->checklist = [];
        if ($checklistId) {
            $this->checklist = Checklist::find($checklistId)->toArray();
        }
    }

    public function resetModel()
    {
        $this->checklist = [
            'name' => '',
            'description' => '',
        ];
        if ($this->checklistId) {
            $this->checklist = Checklist::find($this->checklistId)->toArray();
        }
    }

    public function render()
    {
        return view('livewire.create-update-checklist');
    }

    public function createOrUpdateChecklist()
    {
        $this->validate([
            'checklist.name' => 'required|min:5',
            'checklist.description' => 'min:5'
        ]);
        if (! $this->checklistId) {
            $this->checklistId = Checklist::create(['name' => $this->checklist['name'], 'description' => $this->checklist['description']])->id;
        } else {
            Checklist::find($this->checklistId)->update([
                'name' => $this->checklist['name'],
                'description' => $this->checklist['description']
            ]);
        }
    }
}
