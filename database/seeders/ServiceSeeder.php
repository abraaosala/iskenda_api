<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title' => 'Contabilidade',
                'description' => 'Organização e controle financeiro de excelência para guiar a sua empresa na tomada de decisões estratégicas fundamentadas.',
                'icon' => 'Calculator',
                'features' => [
                    'Organização contabilística completa',
                    'Processamento contabilístico periódico',
                    'Elaboração de demonstrações financeiras detalhadas',
                    'Emissão de balancetes e relatórios financeiros',
                    'Encerramento de contas no fim do exercício',
                ],
                'sort_order' => 1,
            ],
            [
                'title' => 'Fiscalidade Tributária',
                'description' => 'Conformidade integral com toda a legislação tributária angolana, mitigando riscos fiscais e otimizando a carga de impostos legalmente.',
                'icon' => 'FileText',
                'features' => [
                    'Gestão e submissão eletrônica de impostos',
                    'Apuração e submissão de IVA e IRT',
                    'Cálculo de Imposto Industrial e Imposto Predial',
                    'Tratamento de Imposto de Selo',
                    'Consultoria tributária preventiva permanente',
                ],
                'sort_order' => 2,
            ],
            [
                'title' => 'Gestão de Recursos Humanos',
                'description' => 'Gestão completa do seu capital humano, assegurando processos legais, operacionais e motivacionais alinhados à Lei Geral do Trabalho.',
                'icon' => 'Users',
                'features' => [
                    'Processamento de salários de toda a equipa',
                    'Gestão da Segurança Social (INSS)',
                    'Elaboração e manutenção de contratos de trabalho',
                    'Planeamento e controlo de férias presenciais',
                    'Recrutamento e seleção de quadros qualificados',
                    'Sistemas de avaliação de desempenho',
                ],
                'sort_order' => 3,
            ],
            [
                'title' => 'Organização Administrativa',
                'description' => 'Padronização e otimização dos fluxos operacionais internos, eliminando desperdícios de tempo e burocracia desordenada.',
                'icon' => 'Layers',
                'features' => [
                    'Estruturação administrativa de escritórios',
                    'Gestão documental e catalogação analítica',
                    'Organização física e digital de arquivo empresarial',
                    'Modelagem de processos e fluxogramas internos',
                    'Elaboração de manuais administrativos de conduta',
                ],
                'sort_order' => 4,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
