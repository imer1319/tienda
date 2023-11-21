<?php

namespace App\Http\Controllers\Api;

use App\Models\Sale;
use App\Http\Controllers\Controller;
use App\Http\Resources\SaleResource;
use App\Http\Requests\Sale\StoreRequest;
use App\Http\Requests\Sale\UpdateRequest;
use App\Models\Pedido;

class SaleController extends Controller
{
    public function index()
    {
        return SaleResource::collection(Pedido::query()
            ->orderBy('created_at','desc')
            ->get()
        );
    }

    public function store(StoreRequest $request)
    {
        $sale = Pedido::create($request->validated());

        $sale->products()->sync($request->get('products'));

        foreach ($sale->products as $product) {
            $product->stock -= $product->pivot->quantity;
            $product->save();
        }

        if($request->get('amount'))
        {
            $sale->debts()->create([
                'amount' => $request->get('amount')
            ]);
        }

        return;
    }

    public function update(UpdateRequest $request, Pedido $sale)
    {
        $sale->update($request->validated());

        if($request->get('amount'))
        {
            $sale->debts()->create([
                'amount' => $request->get('amount')
            ]);
        }

        return;
    }

    public function destroy(Pedido $sale)
    {
        foreach ($sale->products as $product) {
            $product->stock += $product->pivot->quantity;
            $product->save();
        }

        $sale->products()->detach();
        return $sale->delete();
    }
}
