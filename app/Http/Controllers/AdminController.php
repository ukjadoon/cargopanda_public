<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function checklist()
    {
        return view('admin.checklist');
    }

    public function truckDocumentation()
    {
        return view('admin.truck-documentation');
    }

    public function organizationDocumentation()
    {
        return view('admin.organization-documentation');
    }
}
