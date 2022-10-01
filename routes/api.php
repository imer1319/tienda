<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\Api\SaleController;

Route::get('products-all', [WebController::class,'products']);
Route::get('clients-all', [WebController::class,'clients']);
Route::get('providers-all', [WebController::class,'providers']);
Route::get('products/{product}', [WebController::class,'productShow']);

Route::get('sales',  [SaleController::class, 'index']);
Route::post('sales',  [SaleController::class, 'store']);

Route::post('makeimage/{sale}', [SaleController::class, 'makeimage']);