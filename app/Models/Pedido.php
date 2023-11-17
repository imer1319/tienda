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
        'status',
        'total',
        'sale_type',
    ];

    public function venta()
    {
        return $this->hasOne(Sale::class);
    }

    public function detalles()
    {
        return $this->hasMany(DetallePedido::class);
    }
}
