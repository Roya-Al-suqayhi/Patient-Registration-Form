<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Patient;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Insurance>
 */
class InsuranceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'patient_id' => Patient::inRandomOrder()->first()->id,
            'insurance_company' => $this->faker->randomElement([0, 1]),
            'network' => $this->faker->optional()->company,
            'member_policy_number' => $this->faker->optional()->bothify('??###'),
            'status' => null,
            'class_type' => $this->faker->randomElement([0, 1]),
            'name' => $this->faker->randomElement([0, 1]),
            'co_pay' => $this->faker->randomFloat(2, 0, 1000),
            'co_ins' => $this->faker->optional()->randomFloat(2, 0, 1000),
            'coverage_start_date' => $this->faker->date(),
            'coverage_end_date' => $this->faker->dateTimeBetween('+1 month', '+1 year')->format('Y-m-d'),
        ];
    }
}
