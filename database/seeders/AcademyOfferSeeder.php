<?php

namespace Database\Seeders;

use App\Models\AcademyOffer;
use Illuminate\Database\Seeder;

class AcademyOfferSeeder extends Seeder
{
    public function run(): void
    {
        $offers = [
            [
                'title' => 'Formação Presencial',
                'description' => 'Salas de aula climatizadas com postos de computador dedicados para exercícios práticos em softwares reais.',
                'icon' => 'School',
                'sort_order' => 1,
            ],
            [
                'title' => 'Formação Online',
                'description' => 'Aulas dinâmicas ao vivo integrando suporte remoto interativo, permitindo-lhe estudar a partir de qualquer província de Angola.',
                'icon' => 'Laptop',
                'sort_order' => 2,
            ],
            [
                'title' => 'Estágio Profissional',
                'description' => 'Oportunidade estrita dos alunos de destaque ingressarem no departamento de consultoria empresarial da IS KENDA para uma imersão prática.',
                'icon' => 'Briefcase',
                'sort_order' => 3,
            ],
            [
                'title' => 'Acompanhamento Prático',
                'description' => 'Mentoria personalizada com consultores seniores em atividade continuada no mercado de negócios angolano.',
                'icon' => 'TrendingUp',
                'sort_order' => 4,
            ],
            [
                'title' => 'Certificado Homologado',
                'description' => 'Certificado formal de participação profissional, impulsionando decisivamente o seu currículo nas plataformas e processos de seleção.',
                'icon' => 'Award',
                'sort_order' => 5,
            ],
        ];

        foreach ($offers as $offer) {
            AcademyOffer::create($offer);
        }
    }
}
