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
        'id_user'
    ];

    //metods
    public function user(){
        return $this->belongsTo(User::class);
    }
}
