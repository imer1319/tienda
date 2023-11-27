<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Provider;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function products(Request $request)
    {
        $query = Product::with('category')->where('stock', '>', 0);

        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->input('search') . '%');
        }

        return $query->paginate(12);
    }


    public function productsByCategory($category)
    {
        return Product::with('category')->where('category_id', $category)->where('stock', '>', 0)->paginate(12);
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
