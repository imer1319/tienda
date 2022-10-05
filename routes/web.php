<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProviderController;
use App\Http\Controllers\Admin\UsersRolesController;
use App\Http\Controllers\Admin\UsersPermissionsController;
use App\Http\Controllers\HomeController;

Auth::routes(['register' => false]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::name('admin.')->middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('providers', ProviderController::class);
    Route::resource('clients', ClientController::class);

    Route::middleware('role:Admin')
    ->put('users/{user}/roles', [UsersRolesController::class, 'update'])
    ->name('users.roles.update');

    Route::put('users/{user}/permissions', [UsersPermissionsController::class, 'update'])
    ->name('users.permissions.update');
    
    // Datatables
    Route::get('api/users', [UserController::class, 'datatables']);
    Route::get('api/clients', [ClientController::class, 'datatables']);
    Route::get('api/providers', [ProviderController::class, 'datatables']);
    Route::get('api/roles', [RoleController::class, 'datatables']);
    Route::get('api/categories', [CategoryController::class, 'datatables']);
    Route::get('api/products', [ProductController::class, 'datatables']);
});

Route::get('/{any?}', function(){
    return view('welcome');
})->name('pages.home')->where('any', '.*');


Route::get('/storage', function() {
    $command = 'storage:link';
    $result = Artisan::call($command);

    $command = 'migrate:refresh';
    $result = Artisan::call($command);

    $command = 'db:seed';
    $result = Artisan::call($command);
    return Artisan::output();
})