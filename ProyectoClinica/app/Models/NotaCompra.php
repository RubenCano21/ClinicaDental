<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaCompra extends Model
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

    public function proveedor(){
        return $this->belongsTo(Proveedor::class);
    }

    public function producto(){
        return $this->belongsTo(Producto::class);
    }
    public function inventario(){
        return $this->belongsTo(Inventario::class);
    }
}
