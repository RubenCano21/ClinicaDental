<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'descripcion',
        'modelo'
    ];

    public function nota_compra(){
        return $this->hasMany(nota_compra::class);
    }
}
