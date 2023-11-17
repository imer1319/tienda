<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'pedido_id',
        'conductor_id',
        'secretaria_id',
        'debt_id',
        'status',
        'total',
        'cantidad_restante'
    ];

    protected $appends = ['published_date'];


    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'secretaria_id');
    }

    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }

    public function conductor()
    {
        return $this->belongsTo(Driver::class);
    }

    public function debts()
    {
        return $this->hasMany(Debt::class);
    }

    public function getPublishedDateAttribute()
    {
        return optional($this->created_at)->format('M d Y g:i A');
    }
}
