<?php

namespace App\Http\Controllers;

use App\DocumentOrganization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

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

    public function showOrganizationDoc($documentId, $organizationId)
    {
        return view('admin.show-organization-doc')->with(compact('documentId', 'organizationId'));
    }

    public function showOrganizationDocSource($documentId, $organizationId)
    {
        $result = DocumentOrganization::where('document_id', $documentId)
            ->where('organization_id', $organizationId)->firstOrFail();
            
        return response()->file(Storage::disk('organizationDocuments')->path($result->url));
    }
}
