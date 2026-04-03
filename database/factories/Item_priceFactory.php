<?php

namespace Database\Factories;

use App\Models\Item_price;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Item_price>
 */
class Item_priceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'item_id' => fake()->numberBetween(1, 205),
            'sponsor_id' => fake()->numberBetween(1, 3),
            'price' => fake()->numberBetween(10, 20000),
            'employee_id' => fake()->numberBetween(1, 20)

        ];
    }
}
