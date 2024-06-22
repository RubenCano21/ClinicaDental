<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'ci',
        'nombre',
        'apellido',
        'sexo',
        'telefono',
        'fechaNacimiento',
        'direccion',
        'id_user'
    ];

    //metods
    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }

    public function facturas(){
        return $this->hasMany(Factura::class, 'id_paciente');
    }

    public function servicios(){
        return $this->hasMany(Servicio::class, 'id_paciente');
    }
}
