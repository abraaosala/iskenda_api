<?php

use App\Models\SiteSection;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;

use function Pest\Laravel\getJson;
use function Pest\Laravel\putJson;

uses(RefreshDatabase::class);

it('returns the sections visibility map on the public site data endpoint', function () {
    SiteSection::create(['key' => 'servicos', 'label' => 'Serviços', 'is_visible' => false, 'sort_order' => 5]);

    getJson('/api/site-data')
        ->assertOk()
        ->assertJsonPath('sections.inicio', true)
        ->assertJsonPath('sections.servicos', false)
        ->assertJsonPath('sections.contactos', true);
});

it('defaults every section to visible when none are stored', function () {
    getJson('/api/site-data')
        ->assertOk()
        ->assertJsonPath('sections.servicos', true)
        ->assertJsonPath('sections.academia', true);
});

it('lists all site sections ordered for an authenticated admin', function () {
    Sanctum::actingAs(User::factory()->create());

    getJson('/api/admin/site-sections')
        ->assertOk()
        ->assertJsonCount(10, 'data')
        ->assertJsonPath('data.0.key', 'inicio')
        ->assertJsonPath('data.0.isVisible', true)
        ->assertJsonPath('data.9.key', 'contactos');
});

it('creates the default sections on first access', function () {
    Sanctum::actingAs(User::factory()->create());

    getJson('/api/admin/site-sections')
        ->assertOk()
        ->assertJsonCount(10, 'data');

    $this->assertDatabaseCount('site_sections', 10);
});

it('updates the visibility of sections via bulk update', function () {
    Sanctum::actingAs(User::factory()->create());

    getJson('/api/admin/site-sections');

    putJson('/api/admin/site-sections', [
        'sections' => [
            ['key' => 'servicos', 'is_visible' => false],
            ['key' => 'academia', 'is_visible' => false],
        ],
    ])
        ->assertOk()
        ->assertJsonCount(10, 'data')
        ->assertJsonPath('data.4.key', 'servicos')
        ->assertJsonPath('data.4.isVisible', false)
        ->assertJsonPath('data.5.key', 'academia')
        ->assertJsonPath('data.5.isVisible', false);

    $this->assertDatabaseHas('site_sections', ['key' => 'servicos', 'is_visible' => false]);
    $this->assertDatabaseHas('site_sections', ['key' => 'academia', 'is_visible' => false]);
});

it('rejects an invalid section key in the bulk update', function () {
    Sanctum::actingAs(User::factory()->create());

    putJson('/api/admin/site-sections', [
        'sections' => [
            ['key' => 'nao-existe', 'is_visible' => true],
        ],
    ])->assertStatus(422);
});
