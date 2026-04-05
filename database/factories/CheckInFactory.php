<?php

namespace Database\Factories;

use App\Models\CheckIn;
use Illuminate\Database\Eloquent\Factories\Factory;
;

/**
 * @extends Factory<CheckIn>
 */
class CheckInFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {  $fakeDate = now()->subDays(3);
        return [
            'patient_id' => fake()->randomNumber(1, 50),
            'visit_date' => fake()->date,
            'employee_id' => fake()->randomNumber(1, 20),
            'visit_type_id' => \App\Models\Visit::pluck('id')->random(),
            'check_in_datetime'=> $fakeDate
        ];
    }
}
