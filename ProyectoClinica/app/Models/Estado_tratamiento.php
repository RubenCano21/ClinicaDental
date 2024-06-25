<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado_tratamiento extends Model
{
    use HasFactory;

    protected $fillable = [
        'descripcion',
        'ci_paciente',
        'id_servicio'
    ];
}
