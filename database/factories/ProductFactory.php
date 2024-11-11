<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(3);
        return [
            'name' => $title,
            'slug' => Str::slug($title),
            'stock' => rand(10, 99) * 10,
            'stock_minimo' => rand(10, 20),
            'fecha_vencimiento' => Carbon::now()->addMonths(rand(1, 10))->format('Y-m-d'),
            'price' => rand(40, 100),
            'image' => $this->faker->imageUrl(640, 480, 'animals', true),
            'category_id' => rand(1, 5),
            'provider_id' => rand(1, 10),
        ];
    }
}
