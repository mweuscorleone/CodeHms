<?php

namespace Database\Factories;

use App\Models\Clinic;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Clinic>
 */
class ClinicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'clinic_name' => fake()->randomElement(['OPD', 'Emergency', 'Paediatriac', 'ENT', 'Orthopaedic']),
            'clinic_nature' => fake()->randomElement(['opd_nature', 'emergency_nature', 'paediatric_nature', 'ent_nature', 'orthopaedic_nature'])
        ];
    }
}
