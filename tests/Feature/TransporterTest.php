<?php

namespace Tests\Feature;

use function Tests\assertBackend;

beforeEach(function () {
    $user = app('App\User')->where('role', 'transporter')->first();
    $this->actingAs($user);
});

test('it should have the register company page', function () {
    $options = [
        'route' => '/transporter/register-company',
        'view' => 'transporter.register-company',
        'see' => 'Company name',
    ];
    assertBackend($options);
});

test('it should have a checklist page for the transporter', function () {
    $options = [
        'route' => '/transporter/checklist',
        'view' => 'transporter.checklist',
        'see' => 'Checklist',
        'livewire' => 'transporter-checklist',
    ];
    assertBackend($options);
});

test('it should have a dashboard for the transporter', function () {
    $options = [
        'route' => '/transporter/dashboard',
        'view' => 'transporter.dashboard',
        'see' => 'Dashboard',
    ];
    assertBackend($options);
});

test('it should have a trucks page for the transporter', function () {
    $options = [
        'route' => '/transporter/trucks',
        'view' => 'transporter.trucks',
        'see' => 'Trucks',
    ];
    assertBackend($options);
});

test('it should have an organization documentation page for the transporter', function () {
    $options = [
        'route' => '/transporter/organization/documentation',
        'view' => 'transporter.organization-documentation',
        'see' => 'Organization documentation',
        'livewire' => 'transporter-organization-docs'
    ];
    assertBackend($options);
});

test('it should have a truck documentation index page for the transporter', function () {
    $options = [
        'route' => '/transporter/truck-documentation',
        'view' => 'transporter.truck-documentation-index',
        'see' => 'Truck documentation',
    ];
    assertBackend($options);
});
