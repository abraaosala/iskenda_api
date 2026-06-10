<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $this->call([
            AcademyOfferSeeder::class,
            ClientSeeder::class,
            CompanyInfoSeeder::class,
            CompanyValueSeeder::class,
            CourseSeeder::class,
            GalleryItemSeeder::class,
            ServiceSeeder::class,
            TeamMemberSeeder::class,
            UserSeeder::class,
        ]);
    }
}
