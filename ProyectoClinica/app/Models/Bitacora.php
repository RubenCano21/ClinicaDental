<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    use HasFactory;

    protected $fillable = [
        'accion',
        'fecha_hora',
        'fecha',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(user::class);
    }
}
