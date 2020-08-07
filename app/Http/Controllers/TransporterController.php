<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRegisterCompany;
use App\Organization;
use Illuminate\Support\Facades\Auth;

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

    public function truckDocumentation()
    {

    }

    public function truckDocumentationIndex()
    {
        return view('transporter.truck-documentation-index');
    }

    public function organizationDocumentation()
    {
        return view('transporter.organization-documentation');
    }
}
