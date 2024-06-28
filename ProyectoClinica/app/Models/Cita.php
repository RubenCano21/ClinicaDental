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
        'id_historialclinico'
    ];

    public function odontologo(){
        return $this->belongsTo(Odontologo::class, 'ci_odontologo');
    }

    public function reserva(){
        return $this->belongsTo(Reserva::class, 'id_reserva');
    }

    public function servicio(){
        return $this->belongsTo(Servicio::class, 'id_servicio');
    }
}
