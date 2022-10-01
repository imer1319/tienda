<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Client;
use App\Models\Provider;

class WebController extends Controller
{
    public function products()
    {
        return Product::with('category')->get();
    }

    public function clients()
    {
        return Client::all();
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
