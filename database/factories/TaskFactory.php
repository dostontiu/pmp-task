<?php

namespace Database\Factories;

use Modules\User\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Project\Models\Project;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Modules\Task\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->randomElement(User::get()->pluck('id')->toArray()),
            'assigned_user_id' => fake()->randomElement(User::get()->pluck('id')->toArray()),
            'project_id' => fake()->randomElement(Project::get()->pluck('id')->toArray()),
            'name' => fake()->name(),
            'description' => fake()->text(),
            'status' => fake()->randomElement(\Modules\Task\Enums\TaskStatus::class)->value,
        ];
    }
}
