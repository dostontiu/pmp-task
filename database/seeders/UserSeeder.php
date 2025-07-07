<?php

namespace Database\Seeders;

use Modules\User\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Ivan Ivanov',
            'email' => 'ivan@example.com',
            'password' => bcrypt('pmp2025'),
        ]);

        User::factory()->create([
            'name' => 'Aleksey Ivanov',
            'email' => 'aleksey@example.com',
            'password' => bcrypt('pmp2025'),
        ]);

        User::factory()->create([
            'name' => 'Andrey Ivanov',
            'email' => 'andrey@example.com',
            'password' => bcrypt('pmp2025'),
        ]);

        User::factory()->create([
            'name' => 'Sergey Ivanov',
            'email' => 'sergey@example.com',
            'password' => bcrypt('pmp2025'),
        ]);
    }
}
