<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cita extends Model
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

    public function odontologo(){
        return $this->belongsTo(odontologo::class);
    }

    public function reserva(){
        return $this->belongsTo(reserva::class);
    }

    public function servicio(){
        return $this->belongsTo(servicio::class);
    }   

    public function historial_clinico(){
        return $this->belongsTo(historial_clinico::class);
    }
}
