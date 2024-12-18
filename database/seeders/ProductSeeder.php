<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'Jabón en barra omo',
                'slug' => Str::slug('Jabón en barra omo'),
                'stock' => rand(20, 40) * 10,
                'price' => rand(4, 7),
                'stock_minimo' => rand(10, 20),
                'fecha_vencimiento' => Carbon::now()->addMonths(rand(1, 10))->format('Y-m-d'),
                'image' => 'productos/jabon-omo.png',
                'category_id' => 2,
                'provider_id' => rand(1, 10),
            ],
            [
                'name' => 'Jabón en barra bolivar',
                'slug' => Str::slug('Jabón en barra bolivar'),
                'stock' => rand(20, 40) * 10,
                'price' => rand(2, 4),
                'stock_minimo' => rand(10, 20),
                'fecha_vencimiento' => Carbon::now()->addMonths(rand(1, 10))->format('Y-m-d'),
                'image' => 'productos/jabon-bolivar.png',
                'category_id' => 2,
                'provider_id' => rand(1, 10),
            ],
            [
                'name' => 'Detergente ariel',
                'slug' => Str::slug('Detergente ariel'),
                'stock' => rand(15, 35) * 10,
                'price' => rand(10, 15),
                'stock_minimo' => rand(10, 20),
                'fecha_vencimiento' => Carbon::now()->addMonths(rand(1, 10))->format('Y-m-d'),
                'image' => 'productos/ace-ariel.png',
                'category_id' => 2,
                'provider_id' => rand(1, 10),
            ],
            [
                'name' => 'Detergente omo',
                'slug' => Str::slug('Detergente omo'),
                'stock' => rand(15, 35) * 10,
                'price' => rand(8, 12),
                'stock_minimo' => rand(10, 20),
                'image' => 'productos/ace-omo.png',
                'fecha_vencimiento' => Carbon::now()->addMonths(rand(1, 10))->format('Y-m-d'),
                'category_id' => 2,
                'provider_id' => rand(1, 10),
            ],
            [
                'name' => 'Detergente Bolivar',
                'slug' => Str::slug('Detergente Bolivar'),
                'stock' => rand(40, 60),
                'price' => rand(5, 8),
                'stock_minimo' => rand(10, 20),
                'image' => 'productos/ace-bolivar.png',
                'fecha_vencimiento' => Carbon::now()->addMonths(rand(1, 10))->format('Y-m-d'),
                'category_id' => 2,
                'provider_id' => rand(1, 10),
            ],
            [
                'name' => 'Papel higienico nacional',
                'slug' => Str::slug('Papel higienico nacional'),
                'stock' => rand(20, 40) * 10,
                'price' => rand(2, 4),
                'stock_minimo' => rand(10, 20),
                'image' => 'productos/papel-higienico.png',
                'fecha_vencimiento' => Carbon::now()->addMonths(rand(1, 10))->format('Y-m-d'),
                'category_id' => 2,
                'provider_id' => rand(1, 10),
            ],
            [
                'name' => 'Papel higienico scott',
                'slug' => Str::slug('Papel higienico scott'),
                'stock' => rand(10, 30) * 10,
                'price' => rand(6, 10),
                'stock_minimo' => rand(10, 20),
                'image' => 'productos/papel-scott.png',
                'fecha_vencimiento' => Carbon::now()->addMonths(rand(1, 10))->format('Y-m-d'),
                'category_id' => 2,
                'provider_id' => rand(1, 10),
            ],
            [
                'name' => 'Limpiador muebles pledge',
                'slug' => Str::slug('Limpiador muebles pledge'),
                'stock' => rand(15, 35),
                'price' => rand(4, 7),
                'stock_minimo' => rand(10, 20),
                'image' => 'productos/limpiador-muebles.png',
                'fecha_vencimiento' => Carbon::now()->addMonths(rand(1, 10))->format('Y-m-d'),
                'category_id' => 2,
                'provider_id' => rand(1, 10),
            ],
            [
                'name' => 'Arroz grano de oro',
                'slug' => Str::slug('Arroz grano de oro'),
                'stock' => rand(20, 40),
                'price' => rand(2, 5),
                'stock_minimo' => rand(10, 20),
                'image' => 'productos/arroz.png',
                'fecha_vencimiento' => Carbon::now()->addMonths(rand(1, 10))->format('Y-m-d'),
                'category_id' => 1,
                'provider_id' => rand(1, 10),
            ],
            [
                'name' => 'Fideos famosa',
                'slug' => Str::slug('Fideos famosa'),
                'stock' => rand(30, 50) * 10,
                'price' => rand(3, 6),
                'stock_minimo' => rand(10, 20),
                'image' => 'productos/fideos-famosa.png',
                'fecha_vencimiento' => Carbon::now()->addMonths(rand(1, 10))->format('Y-m-d'),
                'category_id' => 1,
                'provider_id' => rand(1, 10),
            ],
            [
                'name' => 'Fideos nutregal',
                'slug' => Str::slug('Fideos nutregal'),
                'stock' => rand(20, 40) * 10,
                'price' => rand(2, 4),
                'stock_minimo' => rand(10, 20),
                'image' => 'productos/fideos-nutregal.png',
                'fecha_vencimiento' => Carbon::now()->addMonths(rand(1, 10))->format('Y-m-d'),
                'category_id' => 1,
                'provider_id' => rand(1, 10),
            ],
            [
                'name' => 'Frijoles',
                'slug' => Str::slug('Frijoles'),
                'stock' => rand(35, 55),
                'price' => rand(3, 6),
                'stock_minimo' => rand(10, 20),
                'image' => 'productos/frijoles.png',
                'fecha_vencimiento' => Carbon::now()->addMonths(rand(1, 10))->format('Y-m-d'),
                'category_id' => 1,
                'provider_id' => rand(1, 10),
            ],
            [
                'name' => 'Lentejas secas',
                'slug' => Str::slug('Lentejas secas'),
                'stock' => rand(20, 40) * 10,
                'price' => rand(2, 5),
                'stock_minimo' => rand(10, 20),
                'image' => 'productos/lentejas.png',
                'fecha_vencimiento' => Carbon::now()->addMonths(rand(1, 10))->format('Y-m-d'),
                'category_id' => 1,
                'provider_id' => rand(1, 10),
            ],
            [
                'name' => 'Harina de trigo',
                'slug' => Str::slug('Harina de trigo'),
                'stock' => rand(30, 50),
                'price' => rand(4, 7),
                'stock_minimo' => rand(10, 20),
                'image' => 'productos/harina-trigo.png',
                'fecha_vencimiento' => Carbon::now()->addMonths(rand(1, 10))->format('Y-m-d'),
                'category_id' => 1,
                'provider_id' => rand(1, 10),
            ],
            [
                'name' => 'Atun en lata',
                'slug' => Str::slug('Atun en lata'),
                'stock' => rand(15, 35),
                'price' => rand(3, 6),
                'stock_minimo' => rand(10, 20),
                'image' => 'productos/atun.png',
                'fecha_vencimiento' => Carbon::now()->addMonths(rand(1, 10))->format('Y-m-d'),
                'category_id' => 3,
                'provider_id' => rand(1, 10),
            ],
            [
                'name' => 'Galletas oreo',
                'slug' => Str::slug('Galletas oreo'),
                'stock' => rand(25, 45) * 10,
                'price' => rand(5, 8),
                'stock_minimo' => rand(10, 20),
                'image' => 'productos/galletas-oreo.png',
                'fecha_vencimiento' => Carbon::now()->addMonths(rand(1, 10))->format('Y-m-d'),
                'category_id' => 3,
                'provider_id' => rand(1, 10),
            ],
        ];


        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
