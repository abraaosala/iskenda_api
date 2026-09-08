<?php

use App\Models\Client;
use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\getJson;

uses(RefreshDatabase::class);

it('only returns visible content on the public site data endpoint', function () {
    Service::create(['title' => 'Visible Service', 'description' => 'desc', 'icon' => 'icon', 'features' => [], 'is_visible' => true]);
    Service::create(['title' => 'Hidden Service', 'description' => 'desc', 'icon' => 'icon', 'features' => [], 'is_visible' => false]);

    Client::create(['name' => 'Visible Client', 'logo_letter' => 'V', 'color_class' => 'bg-blue-500', 'is_visible' => true]);
    Client::create(['name' => 'Hidden Client', 'logo_letter' => 'H', 'color_class' => 'bg-blue-500', 'is_visible' => false]);

    getJson('/api/site-data')
        ->assertOk()
        ->assertJsonCount(1, 'services')
        ->assertJsonPath('services.0.title', 'Visible Service')
        ->assertJsonCount(1, 'clients')
        ->assertJsonPath('clients.0.name', 'Visible Client')
        ->assertDontSee('Hidden Service');
});
