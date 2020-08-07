<?php

namespace Tests;

/**
 * A basic assert example.
 */
function assertExample(): void
{
    test()->assertTrue(true);
}

function assertBackend(array $options): void
{
    $response = test()->get($options['route']);
    $response->assertOk();
    if (isset($options['view'])) {
        $response->assertViewIs($options['view']);
    }
    if (isset($options['see'])) {
        $response->assertSee($options['see']);
    }
    if (isset($options['livewire'])) {
        $response->assertSeeLivewire($options['livewire']);
    }
}
