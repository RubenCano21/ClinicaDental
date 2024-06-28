<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'hora',
        'estado',
        'id_paciente',
        'id_servicio',
        'id_odontologo'
    ];
    // public function user()
    // {
    //     return $this->belongsTo(User::class, foreignKey: 'id_user');
    // }
    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'id_servicio');
    }

    public function cita(){
        return $this->hasMany(Cita::class, 'id_reserva');
    }

    public function paciente(){
        return $this->belongsTo(Paciente::class, 'id_paciente');
    }

    public function odontologo(){
        return $this->belongsTo(Odontologo::class, 'id_odontologo');
    }
}

