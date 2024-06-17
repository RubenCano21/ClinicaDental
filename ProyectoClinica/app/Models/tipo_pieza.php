<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo_pieza extends Model
{
    use HasFactory;

    protected $fillable = [
        'descripcion'
    ];

    public function pieza_dentals(){
        return $this->hasMany(pieza_dental::class);
    }
}
