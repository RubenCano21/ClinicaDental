<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Odontologo;
use App\Models\Paciente;
use App\Models\Reserva;
use App\Models\Servicio;
use App\Models\bitacora;
use App\Models\Horario;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $citas = Cita::with('odontologo', 'servicio','reserva')->get();
        return view('admin.citas.index', compact('citas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //$pacientes = Paciente::all();
        $odontologos = Odontologo::all();
        $servicios = Servicio::all();
        $reservas = Reserva::where('estado', 'pendiente')->get();
        return view('admin.citas.create', compact( 'odontologos', 'servicios','reservas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'reserva_id' => 'required|exists:reservas,id'
        ]);
        
        $reserva = Reserva::find($request->input('reserva_id'));
        // $fecha = $reserva->fecha;
        // $fechaEs = Carbon::parse($fecha);
        // $nombreDia = $fechaEs->locale('es')->dayName;
        // $horario = Horario::where('odontologo_id', $reserva->id_odontologo);
        // $dia = Horario::where('dia', $nombreDia)
        // ->where('id', $horario);
        
        $reserva->estado = $request->estado;
        $reserva->save();

        $cita = new Cita();
        $cita->fecha = $reserva->fecha;
        $cita->hora = $reserva->hora;
        $cita->ci_odontologo = $reserva->id_odontologo;
        $cita->id_reserva = $reserva->id;
        $cita->id_servicio = $reserva->servicio->id;
        $cita->id_historialclinico = 1;//$request->reserva->paciente->historial_clinico->id;
        $cita->save();


        $bitacora = new Bitacora();
        $bitacora->accion = 'Creacion de cita';
        $bitacora->fecha_hora = now();
        $bitacora->fecha = now()->format('Y-m-d');
        $bitacora->user_id = auth()->id();
        $bitacora->save();

        return redirect()->route('admin.citas.index')->with('success', 'Cita creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cita $cita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cita $cita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cita $cita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cita $cita)
    {
        //
    }
}
