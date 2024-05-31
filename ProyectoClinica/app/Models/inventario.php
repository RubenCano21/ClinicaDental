<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'cantidad',
        'fechaentrada',
        'fechasalida',
        'id_user'
    ];
}
