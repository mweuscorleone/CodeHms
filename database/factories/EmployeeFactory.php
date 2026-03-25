<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            //first_name', 'middle_name', 'last_name', 'username', 'phone', 'title', 'password'

            'first_name' => fake()->firstName(),
            'middle_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'username' => fake()->unique()->userName(),
            'phone' =>fake()->unique()->phoneNumber(),
            'title' => fake()->randomElement(['doctor', 'nurse', 'receptionist', 'pharmacist','laboratory', 'radiology','cashier']),
            'password' =>bcrypt('password')

        ];
    }
}
