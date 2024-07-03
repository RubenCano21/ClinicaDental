<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial_clinico extends Model
{
    use HasFactory;
    protected $table = 'historial_clinicos';
    protected $fillable = [
        'Diagnostico',
        'Fecha_Cita',
        'Tratamiento',
        'id_paciente',
        'id_odontologo',
        'odontograma',
    ];

   

    public function odontologo()
    {
        return $this->belongsTo(Odontologo::class, 'id_odontologo');
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente');
    }

    

}