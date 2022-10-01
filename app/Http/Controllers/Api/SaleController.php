<?php

namespace App\Http\Controllers\Api;

use App\Models\Sale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SaleResource;
use App\Http\Requests\Sale\StoreRequest;
use App\Http\Requests\Sale\UpdateRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class SaleController extends Controller
{
    public function index()
    {
        return  SaleResource::collection(Sale::all());
    }
    
    public function store(StoreRequest $request)
    {
        $sale = Sale::create($request->validated());

        $sale->products()->sync($request->get('products'));
        
        return;
    }

    public function makeimage(Request $request, Sale $sale)  
    {
        $image = $request->input('image');
        @list($type, $image_64) = explode(';', $image);
        @list(, $image_64) = explode(',', $image_64);
        $sale->image = 'public/images/'.Str::random(40).'.'.'png';
        Storage::put($sale->image, base64_decode($image_64));
        $sale->update($request->only('image'));
        return;
    }
}