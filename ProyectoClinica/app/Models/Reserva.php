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
        'id_user',
        'id_servicio',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, foreignKey: 'id_user');
    }
    public function servicios()
    {
        return $this->belongsTo(Servicio::class, 'id_servicio');
    }

    public function citas(){
        return $this->belongsTo(Cita::class, 'id_cita');
    }
}

