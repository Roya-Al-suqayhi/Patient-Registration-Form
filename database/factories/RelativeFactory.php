<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Patient;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Relative>
 */
class RelativeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $documentType = $this->faker->randomElement(['id', 'passport']);
        
        return [
            'patient_id' => Patient::inRandomOrder()->first()->id,
            'r_first_name' => $this->faker->firstName,
            'r_middle_name' => $this->faker->firstName,
            'r_last_name' => $this->faker->lastName,
            'r_identification_type' => $documentType,
            'r_identification_number' => $documentType === 'id'
                ? $this->faker->numerify('#########') // 9 numeric digits for ID
                : $this->faker->bothify('????###'),   // Alphanumeric, 6-9 characters for passport
            'r_phone_number' => $this->faker->numerify('########'), // Adjust to fit length 7-15 as needed
            'r_gender' => $this->faker->randomElement([0, 1]),
            'r_date_of_birth' => $this->faker->date(),
            'r_age' => $this->faker->optional()->numberBetween(0, 100),
            'r_active' => $this->faker->boolean,
        ];
    }
}
