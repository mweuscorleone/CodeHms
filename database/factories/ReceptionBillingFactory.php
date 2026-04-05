<?php

namespace Database\Factories;

use App\Models\ReceptionBilling;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ReceptionBilling>
 */
class ReceptionBillingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $sponsor_id = \App\Models\Sponsor::pluck('id')->random();
        $billingType = $sponsor_id == 1? 'cash': 'credit';
        return [
            'patient_id' => \App\Models\Patient::pluck('id')->random(),
            'billing_type' => $billingType,
            'sponsor_id' => $sponsor_id,
            'clinic_id' => \App\Models\Clinic::pluck('id')->random(),
            'check_in_id' => \App\Models\CheckIn::pluck('id')->random(),
            'item_id' => \App\Models\Item::pluck('id')->random(),
            'amount' => fake()->numberBetween(10, 10000),
            'employee_id' => \App\Models\Employee::pluck('id')->random()
        ];
    }
}
