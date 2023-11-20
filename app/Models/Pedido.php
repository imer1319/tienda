<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'detalle_pedido_id',
        'cliente_id',
        'driver_id',
        'status',
        'total',
        'sale_type',
        'monto_pagado',
    ];

    public function venta()
    {
        return $this->hasOne(Sale::class);
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function detalles()
    {
        return $this->hasMany(DetallePedido::class);
    }
}
