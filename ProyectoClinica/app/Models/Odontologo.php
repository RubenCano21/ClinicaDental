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
        'email',
        'sexo',
        'telefono',
        'matricula',
        'id_user'
    ];

    public function user(){
        return $this->belongsTo(user::class);
    }
}
