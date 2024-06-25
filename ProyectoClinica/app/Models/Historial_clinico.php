<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial_clinico extends Model
{
    use HasFactory;

    protected $fillable = [
        'descripcion',
        'ci_paciente'
    ];
}