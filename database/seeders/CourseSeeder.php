<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            [
                'title' => 'Contabilidade Prática',
                'duration' => '40 Horas (Teórico-Prático)',
                'description' => 'Formação intensa focada no quotidiano real de uma contabilidade empresarial, desde a inserção de documentos até à elaboração de relatórios.',
                'icon' => 'Calculator',
                'modules' => [
                    'Introdução ao Sistema Contabilístico Angolano (PGC)',
                    'Lançamentos Contabilísticos e Classificação Documental',
                    'Processamento de Faturas e Reconciliação Bancária',
                    'Balanço de Encerramento e Demonstração de Resultados',
                ],
                'sort_order' => 1,
            ],
            [
                'title' => 'Fiscalidade Aplicada (Legislação Angolana)',
                'duration' => '32 Horas',
                'description' => 'Domine todos os impostos vitais exigidos pela AGT. Submeta declarações de impostos sem margem de erro legal e aprenda a otimização fiscal preventiva.',
                'icon' => 'FileSpreadsheet',
                'modules' => [
                    'Procedimentos Práticos do IVA Angolano',
                    'IRT - Imposto sobre o Rendimento do Trabalho',
                    'Imposto Industrial e Liquidação Provisória',
                    'Imposto Predial e Tratamento do Imposto de Selo',
                ],
                'sort_order' => 2,
            ],
            [
                'title' => 'Gestão Prática de Recursos Humanos',
                'duration' => '30 Horas',
                'description' => 'Aprenda a processar salários e a gerir as obrigações com a Segurança Social angolana, além de elaborar contratos alinhados com a LGT.',
                'icon' => 'Users',
                'modules' => [
                    'Admissão de Colaboradores e Lei Geral do Trabalho',
                    'Folha de Salários e Cálculo de Descontos (IRT, INSS)',
                    'Processos de Inspeção e Auditoria Governamental',
                    'Avaliação de Competências e Organização de Pastas de Pessoal',
                ],
                'sort_order' => 3,
            ],
            [
                'title' => 'Atendimento ao Cliente e Vendas',
                'duration' => '20 Horas',
                'description' => 'Estratégias de fidelização e técnicas modernas de comunicação interpessoal essenciais para conquistar e reter clientes corporativos e individuais.',
                'icon' => 'MessageSquare',
                'modules' => [
                    'Psicologia de Atendimento de Alta Performance',
                    'Tratamento de Reclamações e Gestão de Conflitos',
                    'Técnicas Ativas de Negociação e Fecho de Clientes',
                    'Ética e Comunicação Corporativa Angolana',
                ],
                'sort_order' => 4,
            ],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}
