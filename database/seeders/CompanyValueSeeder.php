<?php

namespace Database\Seeders;

use App\Models\CompanyValue;
use Illuminate\Database\Seeder;

class CompanyValueSeeder extends Seeder
{
    public function run(): void
    {
        $values = [
            [
                'title' => 'Ética',
                'description' => 'Conduzir todas as ações com ética absoluta, retidão profissional e respeito estrito aos regulamentos do mercado de Angola.',
                'icon' => 'ShieldAlert',
                'sort_order' => 1,
            ],
            [
                'title' => 'Integridade',
                'description' => 'Construir relações de extrema confiança assentes na honestidade e transparência mútua, sem margem para dúvidas.',
                'icon' => 'CheckCircle2',
                'sort_order' => 2,
            ],
            [
                'title' => 'Excelência',
                'description' => 'Prestar serviços de nível internacional com precisão rigorosa e atenção total a cada detalhe das contas da sua empresa.',
                'icon' => 'Award',
                'sort_order' => 3,
            ],
            [
                'title' => 'Responsabilidade',
                'description' => 'Comprometer-se integralmente com o cumprimento dos prazos fiscais e legais, assumindo uma postura ativa e de vanguarda.',
                'icon' => 'UserCheck',
                'sort_order' => 4,
            ],
            [
                'title' => 'Transparência',
                'description' => 'Comunicação claríssima em torno de honorários, termos contratuais e resultados financeiros obtidos para a corporação.',
                'icon' => 'Eye',
                'sort_order' => 5,
            ],
            [
                'title' => 'Inovação',
                'description' => 'Adotar processos modernos inteligentes, automações digitais e ferramentas computacionais inovadoras no tratamento contabilístico.',
                'icon' => 'Lightbulb',
                'sort_order' => 6,
            ],
            [
                'title' => 'Compromisso',
                'description' => 'Foco integral no crescimento e sustentabilidade das empresas parceiras, alinhando objetivos no curto, médio e longo prazo.',
                'icon' => 'Handshake',
                'sort_order' => 7,
            ],
        ];

        foreach ($values as $value) {
            CompanyValue::create($value);
        }
    }
}
