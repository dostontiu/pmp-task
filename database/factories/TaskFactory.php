<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
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
            'status' => fake()->randomNumber(),
        ];
    }
}
