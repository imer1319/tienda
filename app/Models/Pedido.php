<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'driver_id',
        'status',
        'total',
        'sale_type',
        'monto_pagado',
    ];

    public function client()
    {
        return $this->belongsTo(User::class, 'cliente_id');
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function detalles()
    {
        return $this->hasMany(DetallePedido::class);
    }

    public function deudas()
    {
        return $this->hasMany(Debt::class, 'pedido_id');
    }
}
