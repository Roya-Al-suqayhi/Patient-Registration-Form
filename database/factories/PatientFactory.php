<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    protected $model = Patient::class;

    public function definition()
    {
        $documentType = $this->faker->randomElement(['id', 'passport']);
        
        return [
            'hospital_name' => $this->faker->company,
            'first_name' => $this->faker->firstName,
            'middle_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'identification_type' => $documentType === 'id' ? 0 : 1, // 0 for ID, 1 for passport
            'identification_number' => $documentType === 'id'
                ? $this->faker->numerify('#########') // 9 numeric digits for ID
                : $this->faker->bothify('????###'),   // Alphanumeric, 6-9 characters for passport
            'phone_number' => $this->faker->numerify('########'), 
            'gender' => $this->faker->randomElement([0, 1]),
            'date_of_birth' => $this->faker->date(),
            'age' => $this->faker->optional()->numberBetween(0, 100),
            'relation' => $this->faker->randomElement([0, 1]),
            'active' => $this->faker->optional()->boolean,
        ];
    }
}

