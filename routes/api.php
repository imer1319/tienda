<?php

use App\Http\Controllers\Api\PedidoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\Api\DebtController;
use App\Http\Controllers\Api\AuthController;

Route::get('products-all', [WebController::class,'products']);
Route::get('products/{category}', [WebController::class,'productsByCategory']);
Route::get('products/{product}', [WebController::class,'productShow']);

Route::get('orders/{user_id}',  [PedidoController::class, 'index']);
Route::post('orders',  [PedidoController::class, 'store']);
Route::put('orders/{order}',  [PedidoController::class, 'update']);
Route::delete('orders/{order}',  [PedidoController::class, 'destroy']);

Route::get('debts',  [DebtController::class, 'index']);
Route::post('debts/{sale}',  [DebtController::class, 'store']);


Route::post('/actualizar-password', [AuthController::class, 'actualizarPassword']);
Route::post('/actualizar-datos-usuario', [AuthController::class, 'actualizarDatosUsuario']);
