<?php

namespace Database\Seeders;

use App\Models\GalleryItem;
use Illuminate\Database\Seeder;

class GalleryItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'title' => 'Nosso Escritório',
                'category' => 'Instalações',
                'gradient' => 'from-slate-800 to-brand-navy',
                'icon' => 'Building2',
                'src' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=800&h=600&fit=crop',
                'sort_order' => 1,
            ],
            [
                'title' => 'Sessão de Formação',
                'category' => 'Academia',
                'gradient' => 'from-brand-navy to-brand-blue',
                'icon' => 'GraduationCap',
                'src' => 'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=800&h=600&fit=crop',
                'sort_order' => 2,
            ],
            [
                'title' => 'Workshop de Fiscalidade',
                'category' => 'Eventos',
                'gradient' => 'from-brand-blue to-emerald-500',
                'icon' => 'Presentation',
                'src' => 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?w=800&h=600&fit=crop',
                'sort_order' => 3,
            ],
            [
                'title' => 'Atendimento Personalizado',
                'category' => 'Serviços',
                'gradient' => 'from-amber-500 to-orange-600',
                'icon' => 'Headphones',
                'src' => 'https://images.unsplash.com/photo-1559136555-9303baea8ebd?w=800&h=600&fit=crop',
                'sort_order' => 4,
            ],
            [
                'title' => 'Equipa IS KENDA',
                'category' => 'Equipa',
                'gradient' => 'from-violet-600 to-purple-800',
                'icon' => 'Users',
                'src' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=800&h=600&fit=crop',
                'sort_order' => 5,
            ],
            [
                'title' => 'Conferência Anual',
                'category' => 'Eventos',
                'gradient' => 'from-rose-600 to-red-800',
                'icon' => 'Megaphone',
                'src' => 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=800&h=600&fit=crop',
                'sort_order' => 6,
            ],
            [
                'title' => 'Transformação Digital',
                'category' => 'Inovação',
                'gradient' => 'from-sky-500 to-cyan-600',
                'icon' => 'Monitor',
                'src' => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=800&h=600&fit=crop',
                'sort_order' => 7,
            ],
            [
                'title' => 'Parcerias Estratégicas',
                'category' => 'Rede',
                'gradient' => 'from-emerald-600 to-teal-700',
                'icon' => 'Handshake',
                'src' => 'https://images.unsplash.com/photo-1521791136064-7986c2920216?w=800&h=600&fit=crop',
                'sort_order' => 8,
            ],
        ];

        foreach ($items as $item) {
            GalleryItem::create($item);
        }
    }
}
