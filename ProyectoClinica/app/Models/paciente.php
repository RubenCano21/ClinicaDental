<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'ci',
        'nombre',
        'apellido',
        'correo',
        'sexo',
        'telefono',
        'fechanacimiento',
        'direccion',
        'id_user'
    ];

    //metods
}
