<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // User
        $admin = User::create([
            'name' => 'Admin',
            'username' => 'Administrador',
            'email' => 'admin@admin.com', 
            'password' => '123123'
        ]);
        $user = User::create([
            'name' => 'Secre', 
            'username' => 'Secretaria',
            'email' => 'secre@secre.com',
            'password' => '123123'
        ]);
        $cliente = User::create([
            'name' => 'Cliente', 
            'username' => 'Cliente',
            'email' => 'cliente@cliente.com',
            'password' => '123123'
        ]);
        
        $cliente->profile()->create([
            'apellido_paterno' => 'apellido paterno',
            'apellido_materno' => 'apellido materno',
            'ci' => '3442432',
            'fecha_nacimiento' => '1990-12-12',
            'genero' => 'MASCULINO',
        ]);


        //Asignar roles a los usuarios
        $admin->assignRole(Role::findByName('Admin'));
        $user->assignRole(Role::findByName('Secre'));
        $cliente->assignRole(Role::findByName('Cliente'));
    }
}
