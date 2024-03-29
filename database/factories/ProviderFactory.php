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
            'apellido_paterno' => $this->faker->lastName,
            'apellido_materno' => $this->faker->lastName,
            'phone' => $this->faker->phoneNumber,
            'ci' => $this->faker->randomNumber($nbDigits = 9, $strict = false),
            'genero' => $this->faker->randomElement($array = array ('MASCULINO','FEMENINO')),
            'direccion' => $this->faker->address(),
            'fecha_nacimiento' => $this->faker->date()
        ];
    }
}
