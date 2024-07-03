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
use Illuminate\Support\Facades\Auth;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->hasRole("Recepcionista") || $user->hasRole("Administrador")){
            $citas = Cita::where('estado', 'pendiente')->get();
            $bandera = "true";
        }else{
            $odontologo = Odontologo::where('id_user', $user->id)->first();
            $citas = Cita::where('ci_odontologo', $odontologo->id)->where('estado', 'pendiente')->get();
            $bandera = "false";
        }
        return view('admin.citas.index', compact('citas','bandera'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //$pacientes = Paciente::all();

        $reserva = Reserva::find($request->reserva);
        // $odontologos = Odontologo::all();
        // $servicios = Servicio::all();
        // $reservas = Reserva::where('estado', 'pendiente')->get();
        return view('admin.citas.create', compact('reserva'));
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
        $fecha = $reserva->fecha;
        $fechaEs = Carbon::parse($fecha);
        $nombreDia = $fechaEs->locale('es')->dayName;
        $horario = Horario::where('odontologo_id', $reserva->id_odontologo)
        ->where('dia', $nombreDia)->first();
        if ($horario!=null){
            if ($horario->horaInicio<=$reserva->hora && $horario->horaFin>=$reserva->hora && $horario!=null){                
                $reserva->estado = 'aceptada';
                $reserva->save();
        
                $cita = new Cita();
                $cita->fecha = $reserva->fecha;
                $cita->hora = $reserva->hora;
                $cita->ci_odontologo = $reserva->id_odontologo;
                $cita->id_reserva = $reserva->id;
                $cita->id_servicio = $reserva->servicio->id;
                $cita->id_historialclinico = 1;//$reserva->paciente->historial_clinico->id;
                $cita->save();
        
                $bitacora = new Bitacora();
                $bitacora->accion = 'Creacion de cita';
                $bitacora->fecha_hora = now();
                $bitacora->fecha = now()->format('Y-m-d');
                $bitacora->user_id = auth()->id();
                $bitacora->save();
    
                return redirect()->route('admin.reservas.index')->with('success', 'Cita creada correctamente');
            }
            return redirect()->route('admin.reservas.create')->withErrors(['mensaje' => 'El horario seleccionado no existe']);
        }
        $bitacora = new Bitacora();
        $bitacora->accion = 'Error de reserva';
        $bitacora->fecha_hora = now();
        $bitacora->fecha = now()->format('Y-m-d');
        $bitacora->user_id = auth()->id();
        $bitacora->save();

        return redirect()->route('admin.reservas.create')->withErrors(['mensaje' => 'Reserva no valida']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cita = Cita::findOrFail($id);
        return view('admin.citas.show', compact('cita'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,$id)
    {
        $cita = Cita::findOrFail($id);

        $bitacora = new Bitacora();
        $bitacora->accion = 'Editar de Cita';
        $bitacora->fecha_hora = now();
        $bitacora->fecha = now()->format('Y-m-d');
        $bitacora->user_id = auth()->id();
        $bitacora->save();

        return view('admin.citas.edit', compact('cita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
                // Buscar la especialidad por su ID
                $cita = Cita::findOrFail($id);
        
                // Actualizar los datos de la especialidad
                $cita->descripcion = $request->input('descripcion');
                $cita->estado = 'atendido';
                $cita->save();
        
                // Redirigir con un mensaje de éxito
                return redirect()->route('admin.citas.index')->with('success', 'Especialidad actualizada exitosamente.');
    }

    public function confirmDelete($id){
        $cita = Cita::findOrFail($id);
        return view('admin.citas.delete', compact('cita'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cita = Cita::find($id);
        $cita->delete();

        $bitacora = new Bitacora();
        $bitacora->accion = 'Cancelar cita';
        $bitacora->fecha_hora = now();
        $bitacora->fecha = now()->format('Y-m-d');
        $bitacora->user_id = auth()->id();
        $bitacora->save();

        return redirect()->route('admin.citas.index')
            ->with('mensaje', 'Cita Cancelada.')
            ->with('icono', 'success');
    }
}
