<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $members = [
            [
                'name' => 'João Pedro Miguel',
                'role' => 'Director Executivo',
                'description' => 'Lidera a estratégia corporativa da IS KENDA com mais de 10 anos de experiência em consultoria empresarial e gestão financeira em Angola.',
                'initials' => 'JM',
                'color_class' => 'bg-brand-navy text-white',
                'gradient' => 'from-brand-navy to-blue-900',
                'icon' => 'UserCircle',
                'sort_order' => 1,
            ],
            [
                'name' => 'Maria Luísa dos Santos',
                'role' => 'Contabilista Sénior',
                'description' => 'Especialista em PGC angolano e encerramento de contas, garante a conformidade contabilística de todas as empresas parceiras.',
                'initials' => 'MS',
                'color_class' => 'bg-brand-blue text-white',
                'gradient' => 'from-brand-blue to-cyan-700',
                'icon' => 'Calculator',
                'sort_order' => 2,
            ],
            [
                'name' => 'Carlos Alberto Fernandes',
                'role' => 'Fiscalista Sénior',
                'description' => 'Perito em regime tributário angolano, assegura a submissão correta de IVA, IRT e Imposto Industrial junto à AGT.',
                'initials' => 'CF',
                'color_class' => 'bg-brand-orange text-brand-dark',
                'gradient' => 'from-amber-500 to-yellow-700',
                'icon' => 'FileText',
                'sort_order' => 3,
            ],
            [
                'name' => 'Ana Paula Correia',
                'role' => 'Gestora de Recursos Humanos',
                'description' => 'Responsável pelo processamento salarial, gestão de contratos e conformidade com a Lei Geral do Trabalho de Angola.',
                'initials' => 'AC',
                'color_class' => 'bg-emerald-600 text-white',
                'gradient' => 'from-emerald-500 to-teal-800',
                'icon' => 'Users',
                'sort_order' => 4,
            ],
            [
                'name' => 'Miguel Sebastião Domingos',
                'role' => 'Administrativo Sénior',
                'description' => 'Estrutura e otimiza os fluxos documentais e processos administrativos internos das empresas parceiras.',
                'initials' => 'MD',
                'color_class' => 'bg-violet-600 text-white',
                'gradient' => 'from-violet-500 to-purple-900',
                'icon' => 'Building2',
                'sort_order' => 5,
            ],
            [
                'name' => 'Helena Henda Quissanga',
                'role' => 'Coordenadora Académica',
                'description' => 'Lidera a IS KENDA Academia, desenhando currículos e coordenando formações profissionais alinhadas ao mercado angolano.',
                'initials' => 'HQ',
                'color_class' => 'bg-rose-600 text-white',
                'gradient' => 'from-rose-500 to-pink-800',
                'icon' => 'GraduationCap',
                'sort_order' => 6,
            ],
        ];

        foreach ($members as $member) {
            TeamMember::create($member);
        }
    }
}
