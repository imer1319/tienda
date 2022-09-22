<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;

Route::get('products-all', [WebController::class,'products']);
Route::get('products/{product}', [WebController::class,'productShow']);