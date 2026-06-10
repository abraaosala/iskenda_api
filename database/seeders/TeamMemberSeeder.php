<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        $members = [
            [
                'name' => 'Israel Kuakenda',
                'role' => 'Director Geral',
                'description' => 'Fundador',
                'initials' => 'Is',
                'color_class' => 'bg-blue-500',
                'gradient' => 'from-sky-500 to-blue-600',
                'icon' => 'FaUser',
                'sort_order' => 0,
                'photo' => 'uploads/team-members/F19eGXMBQBB4QqtCj3iaTm2n13j7OzWlb8P1Mbgs.jpg',
            ],
            [
                'name' => 'Cliton Vubo',
                'role' => 'Gestor Comercial',
                'description' => 'gi',
                'initials' => 'CV',
                'gradient' => 'from-violet-500 to-purple-600',
                'icon' => 'TrendingUp',
                'sort_order' => 0,
                'photo' => 'uploads/team-members/5t4wpmClal5KliEtQri83mcA5OAvUX2GLXLGpvwZ.jpg',
            ],
            [
                'name' => 'Alfredo Paulo',
                'role' => 'Diretor Administrativo',
                'description' => 'Lidera a estratégia corporativa da IS KENDA com mais de 10 anos de experiência em consultoria empresarial e gestão financeira em Angola.',
                'initials' => 'AP',
                'color_class' => 'bg-brand-navy text-white',
                'gradient' => 'from-brand-navy to-blue-900',
                'icon' => 'UserCircle',
                'sort_order' => 1,
                'photo' => 'uploads/team-members/wPaDBMr4swU7zHFZu9vv7uiBVqvq1ffNJgWRu4qj.jpg',
            ],
            [
                'name' => 'Cessarina Pinto',
                'role' => 'Gestora de Recursos Humanos',
                'description' => 'Teste',
                'initials' => 'CP',
                'color_class' => 'bg-brand-blue text-white',
                'gradient' => 'from-brand-blue to-cyan-700',
                'icon' => 'Calculator',
                'sort_order' => 2,
                'photo' => 'uploads/team-members/HbwcWVgUYoUrX43hgQCSf6YAi7Cq7XrSVIWWhp3X.jpg',
            ],
            [
                'name' => 'Victor Kinó',
                'role' => 'Designer & Gestor de Marketing',
                'description' => 'Design',
                'initials' => 'CF',
                'color_class' => 'bg-brand-orange text-brand-dark',
                'gradient' => 'from-emerald-500 to-teal-600',
                'icon' => 'FileText',
                'sort_order' => 3,
                'photo' => 'uploads/team-members/squYorySPipHzZmj79URKXKYE5kq5upvHWLAPuID.jpg',
            ],
            [
                'name' => 'Leão Luemba',
                'role' => 'Contabilista Sénior',
                'description' => 'Cantabil',
                'initials' => 'AC',
                'color_class' => 'bg-emerald-600 text-white',
                'gradient' => 'from-amber-500 to-orange-600',
                'icon' => 'Calculator',
                'sort_order' => 4,
                'photo' => 'uploads/team-members/M4BkbQZ0p29VCoODz82SSfhLHDPnmbaAQ22UU0ia.jpg',
            ],
            [
                'name' => 'José Bonga',
                'role' => 'Assistente de Fiscalidade',
                'description' => 'Ass',
                'initials' => 'JB',
                'color_class' => 'bg-violet-600 text-white',
                'gradient' => 'from-violet-500 to-purple-900',
                'icon' => 'Handshake',
                'sort_order' => 5,
                'photo' => 'uploads/team-members/Lub8lHZdByhAgmSX7F4ZWTGrUgs05kmvi7IYC5tv.jpg',
            ],
            [
                'name' => 'Patricia Pena',
                'role' => 'Secretária Administrativa',
                'description' => 'h',
                'initials' => 'PA',
                'color_class' => 'bg-rose-600 text-white',
                'gradient' => 'from-rose-500 to-pink-800',
                'icon' => 'GraduationCap',
                'sort_order' => 6,
                'photo' => 'uploads/team-members/z02fnZA8Ygl4vlMpnEthWGUpxYJQIOah72x8KH4n.jpg',
            ],
        ];

        foreach ($members as $member) {
            TeamMember::create($member);
        }
    }
}
