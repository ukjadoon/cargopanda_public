<?php

namespace Tests\Feature;

use Tests\TestCase;

test('it should have a login page')
    ->get('/login')
    ->assertOk();

test('it should see email on the login page')
    ->get('/login')
    ->assertSee('Email');

test('it should see Sign in on the login route', function () {
    $this->get('/login')
        ->assertSee('Sign in');
});
