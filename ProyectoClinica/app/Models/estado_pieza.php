<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estado_pieza extends Model
{
    use HasFactory;

    protected $fillable = [
        'descripcion'
    ];

    public function pieza_dental(){
        return $this->hasMany(pieza_dental::class);
    }
}
