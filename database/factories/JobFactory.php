<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employer_id' => fn () => Employer::all()->random()->id,
            'title' => fake()->jobTitle(),
            'salary' => '$'.number_format(fake()->numberBetween(10000, 100000), 2),
        ];
    }
}
