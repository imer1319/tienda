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
        $viewUsersPermission = Permission::create([
            'name' => 'users_index',
            'display_name' => 'Listar usuarios'
        ]);
        $showUsersPermission = Permission::create([
            'name' => 'users_show',
            'display_name' => 'Ver usuario'
        ]);
        $createUsersPermission = Permission::create([
            'name' => 'users_create',
            'display_name' => 'Crear usuarios'
        ]);
        $updateUsersPermission = Permission::create([
            'name' => 'users_edit',
            'display_name' => 'Actualizar usuarios'
        ]);
        $deleteUsersPermission = Permission::create([
            'name' => 'users_destroy',
            'display_name' => 'Eliminar usuarios'
        ]);
        $editProfileUsersPermission = Permission::create([
            'name' => 'users_profile',
            'display_name' => 'Editar perfil'
        ]);

        $viewRolesPermission = Permission::create([
            'name' => 'roles_index',
            'display_name' => 'Listar roles'
        ]);
        $createRolesPermission = Permission::create([
            'name' => 'roles_create',
            'display_name' => 'Crear roles'
        ]);
        $showRolesPermission = Permission::create([
            'name' => 'roles_show',
            'display_name' => 'Ver rol'
        ]);
        $updateRolesPermission = Permission::create([
            'name' => 'roles_edit',
            'display_name' => 'Actualizar roles'
        ]);
        $deleteRolesPermission = Permission::create([
            'name' => 'roles_destroy',
            'display_name' => 'Eliminar roles'
        ]);
        $viewPermissionsPermission = Permission::create([
            'name' => 'permissions_index',
            'display_name' => 'Listar permisos'
        ]);
        $updatePermissionsPermission = Permission::create([
            'name' => 'permissions_edit',
            'display_name' => 'Actualizar permisos'
        ]);

        $viewCategoriesPermission = Permission::create([
            'name' => 'categories_index',
            'display_name' => 'Listar categorias'
        ]);
        $createCategoriesPermission = Permission::create([
            'name' => 'categories_create',
            'display_name' => 'Crear categorias'
        ]);
        $updateCategoriesPermission = Permission::create([
            'name' => 'categories_edit',
            'display_name' => 'Actualizar categorias'
        ]);
        $deleteCategoriesPermission = Permission::create([
            'name' => 'categories_destroy',
            'display_name' => 'Eliminar categorias'
        ]);

        $viewProductsPermission = Permission::create([
            'name' => 'products_index',
            'display_name' => 'Listar productos'
        ]);
        $showProductsPermission = Permission::create([
            'name' => 'products_show',
            'display_name' => 'Ver producto'
        ]);
        $createProductsPermission = Permission::create([
            'name' => 'products_create',
            'display_name' => 'Crear productos'
        ]);
        $updateProductsPermission = Permission::create([
            'name' => 'products_edit',
            'display_name' => 'Actualizar productos'
        ]);
        $deleteProductsPermission = Permission::create([
            'name' => 'products_destroy',
            'display_name' => 'Eliminar productos'
        ]);

        // Asignar todos los permisos al admin
        $role = Role::findByName('Admin');
        $role->syncPermissions(Permission::all());
    }
}
