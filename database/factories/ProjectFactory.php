<?php

namespace Database\Factories;

use Modules\User\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Project\Models\Project;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Modules\Project\Models\Project>
 */
class ProjectFactory extends Factory
{
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'description' => fake()->text(),
            'user_id' => fake()->randomElement(User::get()->pluck('id')->toArray()),
        ];
    }
}
