<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DeudaController;
use App\Http\Controllers\Admin\DriverController;
use App\Http\Controllers\Admin\PedidoController;
use App\Http\Controllers\Admin\ProcesoController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ProviderController;
use App\Http\Controllers\Admin\UsersRolesController;
use App\Http\Controllers\Admin\UsersPermissionsController;
use App\Http\Controllers\Admin\VentaController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::name('admin.')->middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class)->except(['create', 'edit', 'destroy']);
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('providers', ProviderController::class);
    Route::resource('drivers', DriverController::class);
    Route::resource('profiles', ProfileController::class)->except(['create', 'edit', 'index']);
    Route::resource('pedidos', PedidoController::class)->except(['create', 'edit']);
    Route::resource('ventas', VentaController::class)->except('destroy');
    Route::resource('procesos', ProcesoController::class)->except('destroy');
    Route::get('ventas/generar/{venta}', [VentaController::class, 'edit'])->name('ventas.vender');
    Route::get('clients', [ProfileController::class, 'index'])->name('clients.index');
    Route::get('clients/{client}', [ProfileController::class, 'show'])->name('clients.show');
    Route::post('ventas/deudas/{pedido}', [DeudaController::class, 'store'])->name('deudas.store');
    Route::middleware('role:Admin')
        ->put('users/{user}/roles', [UsersRolesController::class, 'update'])
        ->name('users.roles.update');

    Route::put('users/{user}/permissions', [UsersPermissionsController::class, 'update'])
        ->name('users.permissions.update');

    // Datatables
    Route::get('api/users', [UserController::class, 'datatables']);
    Route::get('api/clients', [ProfileController::class, 'datatables']);
    Route::get('api/providers', [ProviderController::class, 'datatables']);
    Route::get('api/roles', [RoleController::class, 'datatables']);
    Route::get('api/categories', [CategoryController::class, 'datatables']);
    Route::get('api/products', [ProductController::class, 'datatables']);
    Route::get('api/pedidos', [PedidoController::class, 'datatables']);
    Route::get('api/ventas', [VentaController::class, 'datatables']);
    Route::get('api/procesos', [ProcesoController::class, 'datatables']);
    Route::get('api/drivers', [DriverController::class, 'datatables']);

    // PDF
    Route::get('/venta/{venta}/pdf/export', [VentaController::class, 'downloadPdf'])->name('ventas.download.pdf');

    // SEARCH
    Route::get('venta/search', [VentaController::class, 'search'])->name('ventas.search');

    // EXCEL
    Route::get('/venta/excel/export', [VentaController::class, 'downloadExcel'])->name('ventas.download.excel');

    // IMPRIMIR
    Route::get('venta/print', [VentaController::class, 'print'])->name('ventas.download.print');
});

Route::get('/{any?}', function () {
    return view('welcome');
})->name('pages.home')->where('any', '.*');
