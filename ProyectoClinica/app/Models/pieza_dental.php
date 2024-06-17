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

    public function tipo_pieza(){
        return $this->belongsTo(tipo_pieza::class);
    }

    public function estado_pieza(){
        return $this->belongsTo(estado_pieza::class);
    }
}
