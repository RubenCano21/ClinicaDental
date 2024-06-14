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
}
