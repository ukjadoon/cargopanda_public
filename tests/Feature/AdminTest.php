<?php

namespace Tests\Feature;

use App\Document;

test('it should have a dashboard for the admin', function () {
    $response = $this->get('/admin/dashboard');
    $response->assertOk();
    $response->assertViewIs('admin.dashboard');
});

test('it should have a checklist admin page', function () {
    $response = $this->get('/admin/checklist');
    $response->assertOk();
    $response->assertViewIs('admin.checklist');
});

test('it should have an admin truck documentation page', function () {
    $response = $this->get('/admin/truck-documentation');
    $response->assertOk();
    $response->assertViewIs('admin.truck-documentation');
});

test('it should have an admin organization documentation page', function () {
    $response = $this->get('/admin/organization-documentation');
    $response->assertOk();
    $response->assertViewIs('admin.organization-documentation');
});

test('it should have a show organization route for the admin', function () {
    $model = Document::where('type', 'organization_doc')->first();
    $model = $model->organizations->first()->pivot;
    $response = $this->get('/admin/organization-doc/' . $model->document_id . '/' . $model->organization_id);
    $response->assertOk();
    $response->assertViewIs('admin.show-organization-doc');
    $response->assertSeeLivewire('admin-show-organization-doc');
});
