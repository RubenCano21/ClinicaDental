<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    // Definir las propiedades y relaciones según tu esquema de base de datos
    protected $fillable = [
        'numero',
        'nit',
        'detalle',
        'monto',
        'fecha'
        // otros campos relevantes
    ];

    public function pacientes()
    {
        return $this->belongsToMany(Paciente::class);
    }
}
