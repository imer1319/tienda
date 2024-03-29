<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'apellido_paterno',
        'apellido_materno',
        'ci',
        'phone',
        'direccion',
        'fecha_nacimiento',
        'genero',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    
    public function getFullNameAttribute()
    {
        return "{$this->name} {$this->apellido_paterno} {$this->apellido_materno}";
    }
}
