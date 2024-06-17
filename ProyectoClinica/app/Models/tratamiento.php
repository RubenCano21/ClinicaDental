<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tratamiento extends Model
{
    use HasFactory;

    protected $fillable = [
        'ci_paciente',
        'id_servicio',
        'fechainicio',
        'fechafin'
    ];

    public function estado_tratamientos(){
        return $this->hasMany(estado_tratamiento::class);
    }
}
