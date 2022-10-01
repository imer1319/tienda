<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug','stock','price','category_id','image'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function sales()
    {
        return $this->belongsToMany(Sale::class, 'product_sale')
        ->withPivot('quantity');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
