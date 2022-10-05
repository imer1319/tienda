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
use Twilio\Rest\Client;

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

    public function twilio(Request $request, Sale $sale)
    {
        $sid = env('TWILIO_ACCOUNT_SID');
        $token = env('TWILIO_AUTH_TOKEN');

        $twilio = new Client($sid, $token);
        // $path = env('APP_URL')."/storage/".substr($sale->image,7);
        
        $path = "https://images.unsplash.com/photo-1431250620804-78b175d2fada?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1600&h=900&fit=crop&ixid=eyJhcHBfaWQiOjF9";

        $message = $twilio->messages
        ->create("whatsapp:+59170239101",
            [
              "mediaUrl" => [$path],
              "from" => "whatsapp:+14155238886",
              "body" => "Snacks maybe?"
          ]
      );
    }
}
