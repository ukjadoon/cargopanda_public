<?php

namespace Tests\Feature;

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
