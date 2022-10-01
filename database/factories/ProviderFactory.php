<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProviderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber,
            'document_type' => $this->faker->randomElement($array = array ('NIT','CI','OTRO')),
            'document' => $this->faker->randomNumber($nbDigits = 9, $strict = false),
            'comment' => $this->faker->sentence()
        ];
    }
}
