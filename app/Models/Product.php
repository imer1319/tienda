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

    public function scopeByName($query, $name)
    {
        if ($name != null) {
            return $query->where('name', 'like', '%' . $name . '%');
        }
    }

    public function scopeByCategoryId($query, $category_id = null)
    {
        if ($category_id) {
            return $query->where('category_id', $category_id);
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
