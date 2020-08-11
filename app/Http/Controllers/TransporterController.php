<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;
use App\Http\Requests\PostRegisterCompany;
use App\Organization;
use App\Truck;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TransporterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('check.transporter');
    }

    public function registerCompany()
    {
        return view('transporter.register-company');
    }

    public function postRegisterCompany(PostRegisterCompany $request)
    {
        if ($request->validated()) {
            
            $organization = new Organization;
            $organization->name = $request->name;
            $organization->cif = $request->cif;
            $organization->save();
            $user = Auth::user();
            $user->name = $request->your_name;
            $user->organization_id = $organization->id;
            $user->save();

            return redirect('/transporter/dashboard');
        }
    }

    public function dashboard()
    {
        return view('transporter.dashboard');
    }

    public function checklist()
    {
        return view('transporter.checklist');
    }

    public function trucks()
    {
        return view('transporter.trucks');
    }

    public function organization()
    {
        return view('transporter.organization');
    }

    public function truckDocumentation($slug)
    {
        $truck = Truck::where('slug', $slug)
            ->where('organization_id', Auth::user()->organization_id)
            ->firstOrFail();

        return view('transporter.truck-documentation')->with(compact('truck'));
    }

    public function truckDocumentationIndex()
    {
        return view('transporter.truck-documentation-index');
    }

    public function organizationDocumentation()
    {
        return view('transporter.organization-documentation');
    }

    public function showOrganizationDoc($id)
    {
        $result = Document::find($id)->organizations()->where('id', Auth::user()->organization_id)->first();
        if ($result->pivot) {
            
            return response()->file(Storage::disk('organizationDocuments')->path($result->pivot->url));
        }
    }

    public function showTruckDoc($id, $truckId)
    {
        $result = Document::find($id)->trucks()->where('id', $truckId)->first();
        if ($result->pivot) {
            
            return response()->file(Storage::disk('truckDocuments')->path($result->pivot->url));
        }
    }
}
