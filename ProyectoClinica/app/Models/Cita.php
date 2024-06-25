<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'hora',
        'ci_odontologo',
        'id_reserva',
        'id_servicio',
        'id_servicio',
        'id_historialclinico'
    ];
}
