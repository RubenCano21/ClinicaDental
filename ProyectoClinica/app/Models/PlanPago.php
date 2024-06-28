<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanPago extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    public function pagos(){    // Un PlanPago tiene muchos Pagos
        return $this->hasMany(Pago::class);
    }
}
