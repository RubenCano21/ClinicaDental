<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'fecha',
        'monto',
        'estado'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function planPago()  // Un Pago pertenece a un PlanPago
    {
        return $this->belongsTo(PlanPago::class);
    }


    public function tipoPago() // Un Pago pertenece a un TipoPago
    {
        return $this->belongsTo(TipoPago::class);
    }

    public function citas(){
        return $this->belongsTo(Cita::class);
    }

    public function factura(){
        return $this->belongsTo(Factura::class);
    }
}
