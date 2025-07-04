<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
//        dd(fake()->randomElement(User::get()->pluck('id')->toArray()));
        return [
            'name' => fake()->name(),
            'description' => fake()->text(),
            'user_id' => fake()->randomElement(User::get()->pluck('id')->toArray()),
        ];
    }
}
