<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reserva extends Model
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
        return $this->belongsTo(Odontologo::class, 'id_user', 'id');
    }
    
    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'id_servicio');
    }

    public function cita(){
        return $this->belongsTo(cita::class);
    }
}

