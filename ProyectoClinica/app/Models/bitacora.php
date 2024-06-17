<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bitacora extends Model
{
    use HasFactory;

    protected $fillable = [
        'accion',
        'fecha_hora',
        'fecha',
        'id_user'
    ];

    public function user(){
        return $this->belongsTo(user::class);
    }
}
