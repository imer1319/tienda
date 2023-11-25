<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Abarrotes',
            'slug' => Str::slug('Abarrotes'),
            'descripcion' => 'Descripción de la categoría Abarrotes.',
        ]);

        Category::create([
            'name' => 'Productos de limpieza',
            'slug' => Str::slug('Productos de limpieza'),
            'descripcion' => 'Descripción de la categoría Productos de limpieza.',
        ]);

        Category::create([
            'name' => 'Productos comestibles',
            'slug' => Str::slug('Productos comestibles'),
            'descripcion' => 'Descripción de la categoría Productos comestibles.',
        ]);
    }
}
