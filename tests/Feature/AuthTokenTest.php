<?php

namespace Tests\Feature;

use App\Events\TokenRequested;
use App\Mail\LoginRequested;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;

test('it should send an email during a successful auth request', function () {
    Mail::fake();
    $email = 'abc@gmail.com';
    $this->post('/login', ['email' => $email])->assertSee('success');
    Mail::assertSent(LoginRequested::class);
});

test('it should fire an event during a successful auth request', function () {
    Event::fake();
    $email = 'abc@gmail.com';
    $this->post('/login', ['email' => $email])->assertSee('success');
    Event::assertDispatched(TokenRequested::class);
});

test('it should have a logout route that redirect to the homepage', function () {
    $response = $this->get('/logout');
    $response->assertRedirect('/');
});