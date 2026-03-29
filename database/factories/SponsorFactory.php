<?php

namespace Database\Factories;

use App\Models\Sponsor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Sponsor>
 */
class SponsorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sponsor_name' => fake()->randomElement(['CASH', 'NHIF', 'JUBILEE']),
            'sponsor_type' => fake()->randomElement(['cash', 'credit'])
            
        ];
    }
}
