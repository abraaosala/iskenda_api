<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@iskenda.com',
                'password' => '$2y$12$rX1Vc2tfLAZHgzJlAXq5qO8JBx3V1BQO81GglWzf3JzBxL2TEy4h.',
                'is_admin' => 1,
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
