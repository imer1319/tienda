<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'apellido_paterno',
        'apellido_materno',
        'ci',
        'phone',
        'ciudad',
        'direccion',
        'fecha_nacimiento',
        'genero',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
