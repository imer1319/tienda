<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DriverFactory extends Factory
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
            'direccion' => $this->faker->address(),
            'fecha_nacimiento' => $this->faker->date(),
            'placa' => strtoupper($this->faker->regexify('[A-Z]{3}-[0-9]{3,4}')),
            'categoria_licencia' => $this->faker->randomElement(['A', 'B', 'C', 'P']),
            'genero' => $this->faker->randomElement(['MASCULINO', 'FEMENINO']),
            'modelo_movil' => $this->faker->randomElement(['Motocicleta', 'Automovil', 'Bicicleta', 'Triciclo']),
        ];
        
    }
}
