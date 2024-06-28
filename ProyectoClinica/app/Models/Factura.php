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
        'fecha',
        'paciente_id'
        // otros campos relevantes
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class,'paciente_id');
    }

    public function pagos(){
        return $this->hasMany(Pago::class,'factura_id');
    }
}
