<?php

namespace App\Http\Livewire;

use App\Document;
use Livewire\Component;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class TransporterDocHandler extends Component
{
    public $organizationDocId;

    public $organizationDoc;

    public $organizationDocModel;

    public $type;

    public $pivot;

    protected $listeners = ['reloadDocument' => 'reloadDocument'];

    public function mount($organizationDocId, $type)
    {
        $this->organizationDocId = $organizationDocId;
        $this->type = $type;
        $this->loadInitialData();
    }

    public function reloadDocument($id)
    {
        if ($id == $this->organizationDocId) {
            $this->loadInitialData();
        }
    }

    public function loadInitialData()
    {
        $this->organizationDocModel = Document::find($this->organizationDocId);
        $this->organizationDoc = $this->organizationDocModel->toArray();
        $this->pivot = $this->organizationDocModel->organizations->toArray();
    }

    public function render()
    {
        return view('livewire.transporter-doc-handler');
    }
}
