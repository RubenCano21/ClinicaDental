<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ejerce extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_especialidad',
        'ci_odontologo'
    ];
}
