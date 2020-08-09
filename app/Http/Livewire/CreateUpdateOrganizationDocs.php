<?php

namespace App\Http\Livewire;

use App\Document;
use Livewire\Component;

class CreateUpdateOrganizationDocs extends Component
{
    public $organizationDocId;

    public $organizationDoc;

    public function mount($organizationDocId = '')
    {
        $this->organizationDocId = $organizationDocId;
        $this->organizationDoc = [];
        if ($organizationDocId) {
            $this->organizationDoc = Document::find($organizationDocId)->toArray();
        }
    }

    public function resetModel()
    {
        if (! $this->organizationDocId) {
            $this->organizationDoc = [
                'name' => '',
                'description' => '',
            ];
        } else {
            $this->organizationDoc = Document::find($this->organizationDocId)->toArray();
        }
    }

    public function render()
    {
        return view('livewire.create-update-organization-docs');
    }

    public function createOrUpdateOrganizationDoc()
    {
        $this->validate([
            'organizationDoc.name' => 'required|min:5',
            'organizationDoc.description' => 'min:5',
        ]);
        if (! $this->organizationDocId) {
            $this->organizationDocId = Document::create(['name' => $this->organizationDoc['name'], 'description' => $this->organizationDoc['description'], 'type' => 'organization_doc']);
        } else {
            Document::find($this->organizationDocId)->update([
                'name' => $this->organizationDoc['name'],
                'description' => $this->organizationDoc['description']
            ]);
        }
        $this->emit('success', 'Organization doc updated successfully');
    }
}
