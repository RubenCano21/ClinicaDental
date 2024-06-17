<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class servicio extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'precio',
        'duracion'
    ];

    public function reservas(){
        return $this->hasMany(reserva::class);
    }

    public function citas(){
        return $this->hasMany(cita::class);
    }
}
