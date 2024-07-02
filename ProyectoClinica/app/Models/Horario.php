<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $fillable = [
        'dia',
        'horaInicio',
        'horaFin',
        'odontologo_id',
    ];

    public function odontologo(){
        return $this->belongsTo(Odontologo::class, 'odontologo_id');
    }
}
