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
        'id_user'.
        'id_especialidad'
    ];

    //metods
    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
    public function especialidades(){
        return $this->belongsToMany(Especialidad::class, 'ejerces');
    }

    public function cita(){
        return $this->hasMany(Cita::class, 'id_odontologo');
    }
}
