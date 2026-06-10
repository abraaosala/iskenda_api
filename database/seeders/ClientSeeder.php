<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clients = [
            ['name' => 'MPC', 'logo_letter' => 'M', 'color_class' => 'bg-blue-600 text-white', 'sort_order' => 1],
            ['name' => 'FMR', 'logo_letter' => 'F', 'color_class' => 'bg-amber-600 text-white', 'sort_order' => 2],
            ['name' => 'Rebentos', 'logo_letter' => 'R', 'color_class' => 'bg-emerald-600 text-white', 'sort_order' => 3],
            ['name' => 'Naynat', 'logo_letter' => 'N', 'color_class' => 'bg-indigo-600 text-white', 'sort_order' => 4],
            ['name' => 'Ghebrezghi Haila', 'logo_letter' => 'G', 'color_class' => 'bg-rose-600 text-white', 'sort_order' => 5],
            ['name' => 'Hedanto', 'logo_letter' => 'H', 'color_class' => 'bg-sky-600 text-white', 'sort_order' => 6],
            ['name' => 'Barba', 'logo_letter' => 'B', 'color_class' => 'bg-violet-600 text-white', 'sort_order' => 7],
            ['name' => 'Ambrocent', 'logo_letter' => 'A', 'color_class' => 'bg-teal-600 text-white', 'sort_order' => 8],
            ['name' => 'Svete', 'logo_letter' => 'S', 'color_class' => 'bg-cyan-600 text-white', 'sort_order' => 9],
            ['name' => 'Cambuzina', 'logo_letter' => 'C', 'color_class' => 'bg-orange-600 text-white', 'sort_order' => 10],
            ['name' => 'AT Gebremuse', 'logo_letter' => 'A', 'color_class' => 'bg-fuchsia-600 text-white', 'sort_order' => 11],
            ['name' => 'Asmeron', 'logo_letter' => 'A', 'color_class' => 'bg-purple-600 text-white', 'sort_order' => 12],
            ['name' => 'Hagos', 'logo_letter' => 'H', 'color_class' => 'bg-lime-600 text-white', 'sort_order' => 13],
            ['name' => 'Kizz', 'logo_letter' => 'K', 'color_class' => 'bg-pink-600 text-white', 'sort_order' => 14],
            ['name' => 'Anicab', 'logo_letter' => 'A', 'color_class' => 'bg-red-600 text-white', 'sort_order' => 15],
            ['name' => 'Afri Hind', 'logo_letter' => 'A', 'color_class' => 'bg-emerald-700 text-white', 'sort_order' => 16],
        ];

        foreach ($clients as $client) {
            Client::create($client);
        }
    }
}
