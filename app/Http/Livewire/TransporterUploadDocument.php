<?php

namespace App\Http\Livewire;

use App\Document;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class TransporterUploadDocument extends Component
{
    use WithFileUploads;

    public $logo;
    public $type;
    public $document;
    public $documentModel;
    public $pivot;
    public $truckId;

    public function mount($document, $type, $truckId = '')
    {
        $this->document = $document;
        $this->documentModel = Document::find($document['id']);
        $this->type = $type;
        $pivotModel = $this->type == 'organization_doc' ? 'organizations' : 'trucks';
        $pivotIdentifier = $this->type == 'organization_doc' ? 'organization_id' : 'truck_id';
        $pivotId = $this->type == 'organization_doc' ? Auth::user()->organization_id : $truckId;
        $this->pivot = $this->documentModel->{$pivotModel}()->wherePivot($pivotIdentifier, $pivotId)->get()->toArray();
        $this->truckId = $truckId;
    }

    public function updatedLogo()
    {
        $this->validate([
            'logo' => 'image|max:10240|nullable'
        ]);
        $path = $this->saveImage($this->document['id'], $this->type);
        if ($this->type == 'organization_doc') {
            $this->documentModel->organizations()->sync([
                Auth::user()->organization_id => [
                    'url' => $path,
                    'status' => 'pending',
                    'file_type' => pathinfo($path)['extension']
                ]
            ]);
        } else {
            $this->documentModel->trucks()->sync([
                $this->truckId => [
                    'url' => $path,
                    'status' => 'pending',
                    'file_type' => pathinfo($path)['extension']
                ]
            ]);
        }
        $this->documentModel = Document::find($this->document['id']);
        $model = $this->type == 'organization_doc' ? 'organizations' : 'trucks';
        $this->pivot = $this->documentModel->{$model}->toArray();
        $this->emit('reloadDocument', $this->document['id']);
    }

    protected function saveImage($id, $type = 'organization_doc')
    {
        $driver = $type == 'organization_doc' ? 'organizationDocuments' : 'truckDocuments';
        $path = $this->logo->store($id, $driver);
        $image = Image::make(Storage::disk($driver)->get($path));
        if ($image->height() > 2000) {
                $image->resize(null, 2000, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode(pathinfo($path)['extension'], 90);
            Storage::disk($driver)->put($path, $image);
        }
        if ($image->width() > 2000) {
                $image->resize(2000, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode(pathinfo($path)['extension'], 90);
            Storage::disk($driver)->put($path, $image);
        }
        

        return $path;
    }

    public function render()
    {
        return view('livewire.transporter-upload-document');
    }
}
