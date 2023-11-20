<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\Api\SaleController;
use App\Http\Controllers\Api\DebtController;

Route::get('products-all', [WebController::class,'products']);
Route::get('providers-all', [WebController::class,'providers']);
Route::get('products/{product}', [WebController::class,'productShow']);

Route::get('sales',  [SaleController::class, 'index']);
Route::post('sales',  [SaleController::class, 'store']);
Route::put('sales/{sale}',  [SaleController::class, 'update']);
Route::delete('sales/{sale}',  [SaleController::class, 'destroy']);

Route::get('debts',  [DebtController::class, 'index']);
Route::post('debts/{sale}',  [DebtController::class, 'store']);
