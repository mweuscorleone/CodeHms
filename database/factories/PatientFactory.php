<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'middle_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'gender' => fake()->randomElement(['male', 'female']),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->streetAddress(),
            'relative_name' => fake()->name(),
            'relative_phone' => fake()->phoneNumber(),
            'relationship' => fake()->randomElement(['father', 'brother', 'mother', 'sisiter', 'wife', 'husband', 'neighbour','other']),
            'relative_address' => fake()->streetAddress(),
            'sponsor_id' => fake()->randomElement([1, 2, 3])
        ];
    }
}
