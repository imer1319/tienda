<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Client;
use App\Models\Driver;
use App\Models\Profile;
use App\Models\Provider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // DB::statement("TRUNCATE TABLE users RESTART IDENTITY CASCADE");
        // DB::statement("TRUNCATE TABLE roles RESTART IDENTITY CASCADE");
        // DB::statement("TRUNCATE TABLE permissions RESTART IDENTITY CASCADE");

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        Role::truncate();
        Permission::truncate();
        Category::truncate();
        Product::truncate();
        Profile::truncate();
        Driver::truncate();
        Provider::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Storage::disk('public')->deleteDirectory('images');

        Driver::factory(10)->create();
        Provider::factory(10)->create();
        
        $this->call([
            RolesSeeder::class,
            PermissionsSeeder::class,
            UsersSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
        ]);
    }
}
