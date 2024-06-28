<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Odontologo extends Model
{
    use HasFactory;

    protected $fillable = [
        'ci',
        'nombre',
        'apellido',
        'sexo',
        'telefono',
        'matricula',
        'id_user',
        'id_especialidad'
    ];

    //metods
    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
    
    public function especialidades(){
        return $this->belongsToMany(Especialidad::class, 'ejerces');
    }

    public function citas(){
        return $this->hasMany(Cita::class, 'ci_odontologo');
    }

    public function reservas(){
        return $this->hasMany(Reserva::class, 'id_odontologo');
    }
}
