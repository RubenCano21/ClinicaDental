<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'precio',
        'duracion'
    ];

    public function citas(){
        return $this->hasMany(Cita::class);
    }

    public function pacientes(){
        return $this->belongsToMany(Paciente::class);
    }

    public function reservas(){
        return $this->hasMany(Reserva::class);
    }
}
