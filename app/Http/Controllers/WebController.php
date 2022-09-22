<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class WebController extends Controller
{
    public function products()
    {
        return Product::with('category')->get();
    }

    public function productShow(Product $product)
    {
        return $product;
    }
}
