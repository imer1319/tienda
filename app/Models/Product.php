<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'stock',
        'price',
        'category_id',
        'image',
        'provider_id',
        'estado',
        'fecha_vencimiento',
        'stock_minimo'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
