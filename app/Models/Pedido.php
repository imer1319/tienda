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
        'pago_faltante',
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

    public function scopeByClienteId($query, $cliente_id = null)
    {
        if ($cliente_id) {
            return $query->where('cliente_id', $cliente_id);
        }
        return $query;
    }

    public function scopeByChoferId($query, $choferId = null)
    {
        if ($choferId) {
            return $query->where('driver_id', $choferId);
        }
        return $query;
    }

    public function scopeByTipoPedido($query, $tipo_pedido = null)
    {
        if ($tipo_pedido === '1') {
            return $query->where('sale_type', 'CONTADO');
        } elseif ($tipo_pedido === '0') {
            return $query->where('sale_type', 'DEUDA');
        }
        return $query;
    }

    public function scopeByDesde($query, $desde = null)
    {
        if ($desde) {
            return $query->where('created_at', '>=', $desde);
        }
        return $query;
    }

    public function scopeByHasta($query, $hasta = null)
    {
        if ($hasta) {
            return $query->where('created_at', '<=', $hasta);
        }
        return $query;
    }
}
