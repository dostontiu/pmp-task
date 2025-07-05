<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Task\Models\Task;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::factory(20)->create();
    }
}
