<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $fillable = [
        'paciente_id',
        'fecha',
        'monto',
        'estado',
        'factura_id',
        'planPagos_id',
        'tipoPago_id',
        'cita_id'
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }


    public function planPago()  // Un Pago pertenece a un PlanPago
    {
        return $this->belongsTo(PlanPago::class, 'planPagos_id');
    }


    public function tipoPago() // Un Pago pertenece a un TipoPago
    {
        return $this->belongsTo(TipoPago::class, 'tipoPago_id');
    }

    public function citas(){
        return $this->belongsTo(Cita::class);
    }

    public function factura(){
        return $this->belongsTo(Factura::class, 'factura_id');
    }
}
