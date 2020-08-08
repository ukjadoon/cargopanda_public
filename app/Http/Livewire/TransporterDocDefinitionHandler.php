<?php

namespace App\Http\Livewire;

use App\Document;
use Livewire\Component;

class TransporterDocDefinitionHandler extends Component
{
    public $organizationDoc;

    public $logo;

    public $document;

    public $type;

    public function mount($organizationDocId, $type)
    {
        $this->organizationDoc = Document::find($organizationDocId)->toArray();
        $this->type = $type;
    }

    public function render()
    {
        return view('livewire.transporter-doc-definition-handler');
    }
}
