<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Profile;
use App\Models\Provider;

class WebController extends Controller
{
    public function products()
    {
        return Product::with('category')->where('stock','>',0)->paginate(12);
    }

    public function providers()
    {
        return Provider::all();
    }

    public function productShow(Product $product)
    {
        return $product;
    }
}
