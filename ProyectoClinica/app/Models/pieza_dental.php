<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pieza_dental extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipodiente',
        'id_odontograma',
        'id_estadopieza',
        'id_tipopieza'
    ];
}
