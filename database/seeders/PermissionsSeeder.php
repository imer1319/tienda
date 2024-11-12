<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Permisos
        Permission::create([
            'name' => 'users_index',
            'display_name' => 'Listar usuarios'
        ]);
        Permission::create([
            'name' => 'users_show',
            'display_name' => 'Ver usuario'
        ]);
        Permission::create([
            'name' => 'users_create',
            'display_name' => 'Crear usuarios'
        ]);
        Permission::create([
            'name' => 'users_edit',
            'display_name' => 'Actualizar usuarios'
        ]);
        Permission::create([
            'name' => 'users_destroy',
            'display_name' => 'Eliminar usuarios'
        ]);
        Permission::create([
            'name' => 'users_profile',
            'display_name' => 'Editar perfil'
        ]);

        // roles
        Permission::create([
            'name' => 'roles_index',
            'display_name' => 'Listar roles'
        ]);
        Permission::create([
            'name' => 'roles_create',
            'display_name' => 'Crear roles'
        ]);
        Permission::create([
            'name' => 'roles_show',
            'display_name' => 'Ver rol'
        ]);
        Permission::create([
            'name' => 'roles_edit',
            'display_name' => 'Actualizar roles'
        ]);
        Permission::create([
            'name' => 'roles_destroy',
            'display_name' => 'Eliminar roles'
        ]);
        Permission::create([
            'name' => 'permissions_index',
            'display_name' => 'Listar permisos'
        ]);
        Permission::create([
            'name' => 'permissions_edit',
            'display_name' => 'Actualizar permisos'
        ]);

        // categorias
        Permission::create([
            'name' => 'categories_index',
            'display_name' => 'Listar categorias'
        ]);
        Permission::create([
            'name' => 'categories_create',
            'display_name' => 'Crear categorias'
        ]);
        Permission::create([
            'name' => 'categories_edit',
            'display_name' => 'Actualizar categorias'
        ]);
        Permission::create([
            'name' => 'categories_show',
            'display_name' => 'Ver categorias'
        ]);
        Permission::create([
            'name' => 'categories_destroy',
            'display_name' => 'Eliminar categorias'
        ]);

        // productos
        Permission::create([
            'name' => 'products_index',
            'display_name' => 'Listar productos'
        ]);
        Permission::create([
            'name' => 'products_show',
            'display_name' => 'Ver producto'
        ]);
        Permission::create([
            'name' => 'products_create',
            'display_name' => 'Crear productos'
        ]);
        Permission::create([
            'name' => 'products_edit',
            'display_name' => 'Actualizar productos'
        ]);
        Permission::create([
            'name' => 'products_destroy',
            'display_name' => 'Eliminar productos'
        ]);

        // Proveedores
        Permission::create([
            'name' => 'providers_index',
            'display_name' => 'Listar proveedores'
        ]);
        Permission::create([
            'name' => 'providers_show',
            'display_name' => 'Ver proveedor'
        ]);
        Permission::create([
            'name' => 'providers_create',
            'display_name' => 'Crear proveedores'
        ]);
        Permission::create([
            'name' => 'providers_edit',
            'display_name' => 'Actualizar proveedores'
        ]);
        Permission::create([
            'name' => 'providers_destroy',
            'display_name' => 'Eliminar proveedores'
        ]);

        //perfiles
        Permission::create([
            'name' => 'profiles_index',
            'display_name' => 'Listar perfiles'
        ]);
        Permission::create([
            'name' => 'profiles_show',
            'display_name' => 'Ver perfil'
        ]);
        Permission::create([
            'name' => 'profiles_create',
            'display_name' => 'Crear perfiles'
        ]);
        Permission::create([
            'name' => 'profiles_edit',
            'display_name' => 'Actualizar perfiles'
        ]);
        Permission::create([
            'name' => 'profiles_destroy',
            'display_name' => 'Eliminar perfiles'
        ]);

        //choferes
        Permission::create([
            'name' => 'drivers_index',
            'display_name' => 'Listar choferes'
        ]);
        Permission::create([
            'name' => 'drivers_show',
            'display_name' => 'Ver chofer'
        ]);
        Permission::create([
            'name' => 'drivers_create',
            'display_name' => 'Crear chofer'
        ]);
        Permission::create([
            'name' => 'drivers_edit',
            'display_name' => 'Actualizar chofer'
        ]);
        Permission::create([
            'name' => 'drivers_destroy',
            'display_name' => 'Eliminar chofer'
        ]);

        // Asignar todos los permisos al admin
        $role = Role::findByName('Admin');
        $role->syncPermissions(Permission::all());
    }
}
