<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    { 
        $type = fake()->randomElement(['service', 'pharmacetical', 'other']);
        $pharmacetical = ($type === 'pharmacetical');
        $service = ($type === 'service');

        return [
            'name' => $pharmacetical ? fake()->randomElement(['paracetamol', 
            'amoxyline', 'ampiciline', 'amlodepine', 'quinin','pentaplazo',
            'ampicloxy', 'pilitone', 'ceftriaxone', 'azthromithine']):fake()->randomElement(['General consultation',
            'urinalysis', 'ct scan', 'wound dressing', 'full blood picture', 'ultrasound']),
            'item_type' => $type,
            'is_stock_item' => $pharmacetical ?  true : false

    ];
              
        
    }
}