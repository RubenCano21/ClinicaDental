<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proveedor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'direccion'
    ];

    public function nota_compra(){
        return $this->hasMany(nota_compra::class);
    }
}
