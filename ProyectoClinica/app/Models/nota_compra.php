<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nota_compra extends Model
{
    use HasFactory;

    protected $fillable = [
        'costo',
        'cantidad',
        'importe',
        'fechaentrada',
        'id_proveedor',
        'id_producto',
        'id_inventario'
    ];

    public function producto(){
        return $this->belongsTo(producto::class);
    }

    public function proveedor(){
        return $this->belongsTo(proveedor::class);
    }

    public function inventario(){
        return $this->belongsTo(inventario::class);
    }
}
