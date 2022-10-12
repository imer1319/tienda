<?php

namespace App\Http\Controllers\Api;

use App\Models\Sale;
use App\Http\Controllers\Controller;
use App\Http\Requests\Debt\StoreRequest;
use App\Http\Requests\Debt\UpdateRequest;
use App\Http\Resources\SaleResource;

class DebtController extends Controller
{
    public function index()
    {
        return  SaleResource::collection(Sale::where('status','PENDIENTE')
            ->orderBy('created_at','desc')
            ->get()
        );
    }

    public function store(StoreRequest $request, Sale $sale)
    {
        $sale->debts()->create($request->validated());
        return;
    }
}
