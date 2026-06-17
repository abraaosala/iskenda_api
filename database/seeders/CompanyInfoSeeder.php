<?php

namespace Database\Seeders;

use App\Models\CompanyInfo;
use Illuminate\Database\Seeder;

class CompanyInfoSeeder extends Seeder
{
    public function run(): void
    {
        $infos = [
            [
                'name' => 'IS KENDA',
                'full_name' => 'IS KENDA CONSULTORIA & ACADEMIA',
                'slogan' => 'Transformando Conhecimento em Competência e Competência em Resultados',
                'founded_year' => 2022,
                'years_experience' => 4,
                'active_clients_count' => 20,
                'phone' => '+244 938 198 551',
                'email' => 'geral@iskenda.com',
                'working_hours' => 'Segunda a Sexta-feira, 08h00 às 17h00',
                'address' => 'Luanda, Angola',
                'copyright' => '© 2026 IS KENDA CONSULTORIA & ACADEMIA. Todos os Direitos Reservados.',
                'logo' => 'uploads/company/iVfusEmivKcrXCgKTVgiQxWCOoh9Pe0ExSZf2Lzq.png',
                'social_links' => json_encode([
                    ['platform' => 'Instagram', 'icon' => 'Instagram', 'url' => 'https://www.instagram.com/geraliskenda/'],
                    ['platform' => 'Facebook', 'icon' => 'Facebook', 'url' => 'https://www.facebook.com/geraliskenda/'],
                    ['platform' => 'LinkedIn', 'icon' => 'Linkedin', 'url' => 'https://ao.linkedin.com/in/academia-is-kenda-71a309370'],
                ]),
            ],
        ];

        foreach ($infos as $info) {
            CompanyInfo::create($info);
        }
    }
}
