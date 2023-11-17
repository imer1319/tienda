<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Roles
        Role::create(['name' => 'Admin', 'display_name' => 'Administrador']);
        Role::create(['name' => 'Cliente', 'display_name' => 'Cliente']);
        Role::create(['name' => 'Secre', 'display_name' => 'Secretaria']);
    }
}
