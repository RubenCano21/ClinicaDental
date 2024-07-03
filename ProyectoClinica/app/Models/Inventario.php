<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'cantidad',
        'fechaentrada',
        'fechasalida',
        'id_user'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function productos(){
        return $this->belongsToMany(Producto::class);
    }

    public function notasCompra(){
        return $this->hasMany(Nota_compra::class);
    }


}
