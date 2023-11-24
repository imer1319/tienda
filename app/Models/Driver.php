<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
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
        'placa',
        'modelo_movil',
        'categoria_licencia',
        'genero',
    ];

    public function ventas()
    {
        return $this->hasMany(Pedido::class);
    }

    public function getFullNameAttribute()
    {
        return $this->name . ' ' . $this->apellido_paterno . ' ' . $this->apellido_materno;
    }
}
