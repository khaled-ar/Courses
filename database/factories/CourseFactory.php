<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->unique()->name(),
            'description' => fake()->sentence(),
            'start_date' => now(),
            'end_date' => now()->addDays(fake()->randomNumber(0)),
            'cost' => fake()->randomFloat()
        ];
    }
}
