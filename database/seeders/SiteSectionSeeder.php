<?php

namespace Database\Seeders;

use App\Models\SiteSection;
use Illuminate\Database\Seeder;

class SiteSectionSeeder extends Seeder
{
    public function run(): void
    {
        $sections = [
            ['key' => 'inicio', 'label' => 'Início (Hero)', 'sort_order' => 1],
            ['key' => 'quem-somos', 'label' => 'Quem Somos', 'sort_order' => 2],
            ['key' => 'equipa', 'label' => 'Equipa', 'sort_order' => 3],
            ['key' => 'valores', 'label' => 'Valores', 'sort_order' => 4],
            ['key' => 'servicos', 'label' => 'Serviços', 'sort_order' => 5],
            ['key' => 'academia', 'label' => 'Academia', 'sort_order' => 6],
            ['key' => 'honorarios', 'label' => 'Honorários', 'sort_order' => 7],
            ['key' => 'clientes', 'label' => 'Clientes', 'sort_order' => 8],
            ['key' => 'galeria', 'label' => 'Galeria', 'sort_order' => 9],
            ['key' => 'contactos', 'label' => 'Contactos', 'sort_order' => 10],
        ];

        foreach ($sections as $section) {
            SiteSection::updateOrCreate(
                ['key' => $section['key']],
                array_merge($section, ['is_visible' => true]),
            );
        }
    }
}
