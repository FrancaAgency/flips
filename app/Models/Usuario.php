<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $primaryKey = 'doc';
    protected $fillable = [
        'doc',
        'nombres',
        'apellidos',
        'telefono',
        'correo',
        'cuidad',
        'direccion',
        'password',
    ];
}
