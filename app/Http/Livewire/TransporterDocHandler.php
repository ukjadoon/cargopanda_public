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

    public $truckId;

    protected $listeners = ['reloadDocument' => 'reloadDocument'];

    public function mount($organizationDocId, $type, $truckId = '')
    {
        $this->organizationDocId = $organizationDocId;
        $this->type = $type;
        $this->truckId = $truckId;
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
        if (! $this->truckId) {
            $this->pivot = $this->organizationDocModel->organizations->toArray();
        } else {
            $this->pivot = $this->organizationDocModel->trucks->toArray();
        }
    }

    public function render()
    {
        return view('livewire.transporter-doc-handler');
    }
}
