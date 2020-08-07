<?php

namespace App\Http\Livewire;

use App\DocumentDefinition;
use Livewire\Component;

class TransporterDocDefinitionHandler extends Component
{
    public $organizationDoc;

    public $logo;

    public $documentDefinition;

    public $type;

    public function mount($organizationDocId, $type)
    {
        $this->organizationDoc = DocumentDefinition::find($organizationDocId)->toArray();
        $this->type = $type;
    }

    public function render()
    {
        return view('livewire.transporter-doc-definition-handler');
    }
}
