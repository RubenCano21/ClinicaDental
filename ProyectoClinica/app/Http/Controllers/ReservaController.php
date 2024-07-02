<?php

namespace App\Http\Controllers;

use App\Models\Odontologo;
use App\Models\Paciente;
use App\Models\Reserva;
use Illuminate\Http\Request;
use App\Models\Servicio;
use App\Models\Bitacora;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use App\Models\Horario;
use DateTime;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservas = Reserva::all();
        return view('admin.reservas.index', compact('reservas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    protected $horasDeTrabajo = [
        '08:00', '09:00', '10:00', '11:00', '12:00', '14:00', '15:00', '16:00', '17:00'
    ];

     public function create()
    {
        $odontologo = Odontologo::all();
        $servicios = Servicio::all();
        $pacientes = Paciente::all();

        $user = Auth::user();
        if ($user->hasRole('Recepcionista') || $user->hasRole('Administrador') || $user->hasRole('Odontologo')){
            $bandera = true;
        }else{
            $bandera = false;
        }

        return view('admin.reservas.create', [
            'servicios' => $servicios,
            'horasDeTrabajo' => $this->horasDeTrabajo,
            'odontologos' => $odontologo,
            'bandera' => $bandera,
            'pacientes' => $pacientes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fechaHoy = now()->addDay()->format('Y-m-d');
        // Valida los datos del formulario
        $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required|in:' . implode(',', $this->horasDeTrabajo),
            'id_servicio' => 'required|exists:servicios,id',
            'id_odontologo' => 'required|exists:odontologos,id',
        ]);

        $validarFecha = Validator::make($request->all(),[
            'fecha' => ['required','date', 'after:' . $fechaHoy]
        ]);

        if ($validarFecha->fails()){
            return redirect()->back()->withErrors($validarFecha)->withInput();
        }

        if ($request->id_paciente == "null"){
            $paciente = Paciente::where('id_user', auth()->id())->first();
        }else{
            $paciente = Paciente::find($request->id_paciente);
        }
        
        $fecha = $request->fecha;
        $fechaEs = Carbon::parse($fecha);
        $nombreDia = $fechaEs->locale('es')->dayName;
        $horario = Horario::where('odontologo_id', $request->id_odontologo)
        ->where('dia', $nombreDia)->first();
        if ($horario!=null){
            if ($horario->horaInicio<=$request->hora && $horario->horaFin>$request->hora){                
                $ultimaReservaOcupada = Reserva::whereHas('odontologo.horarios', function ($query) use ($fecha){
                    $query->whereRaw('reservas.fecha = ? AND reservas.hora BETWEEN horarios.horaInicio AND horarios.horaFin', [$fecha]);
                })
                ->orderBy('id', 'desc')
                ->first();
                if ($ultimaReservaOcupada == null){
                    $reserva = new Reserva();
                    $reserva->fecha = $request->fecha;
                    $reserva->hora = $horario->horaInicio;
                    $reserva->estado = 'pendiente';
                    $reserva->id_paciente = $paciente->id;
                    $reserva->id_odontologo = $request->id_odontologo;
                    $reserva->id_servicio = $request->id_servicio;
                    $reserva->save();

                    $bitacora = new Bitacora();
                    $bitacora->accion = 'Creacion de Reserva';
                    $bitacora->fecha_hora = now();
                    $bitacora->fecha = now()->format('Y-m-d');
                    $bitacora->user_id = auth()->id();
                    $bitacora->save();

                    return redirect()->route('admin.reservas.index')->with('success', 'Cita creada correctamente');
                }else{
                    $hora = $ultimaReservaOcupada->hora;
                    $horaAux = DateTime::createFromFormat('H:i:s', $hora);
                    //dd($horaAux);
                    $horaAux->modify('+1 hour');
                    //dd($ultimaReservaOcupada);
                    if ($horaAux->format('H:i:s')>=$horario->horaFin){
                        $bitacora = new Bitacora();
                        $bitacora->accion = 'Error de Reserva';
                        $bitacora->fecha_hora = now();
                        $bitacora->fecha = now()->format('Y-m-d');
                        $bitacora->user_id = auth()->id();
                        $bitacora->save();

                        return redirect()->route('admin.reservas.create')->with('mensaje', 'La hora y fecha seleccionada ya esta llena!');
                    }else{  
                        $reserva = new Reserva();
                        $reserva->fecha = $request->fecha;
                        $reserva->hora = $horaAux;
                        $reserva->estado = 'pendiente';
                        $reserva->id_paciente = $paciente->id;
                        $reserva->id_odontologo = $request->id_odontologo;
                        $reserva->id_servicio = $request->id_servicio;
                        $reserva->save();

                        $bitacora = new Bitacora();
                        $bitacora->accion = 'Creacion de Reserva';
                        $bitacora->fecha_hora = now();
                        $bitacora->fecha = now()->format('Y-m-d');
                        $bitacora->user_id = auth()->id();
                        $bitacora->save();
                    }

                }
                return redirect()->route('admin.reservas.index')->with('success', 'Cita creada correctamente');
            }
            return redirect()->route('admin.reservas.create')->withErrors(['mensaje' => 'La hora y fecha seleccionada no trabaja el odontologo']);
        }
        $bitacora = new Bitacora();
        $bitacora->accion = 'Error de reserva';
        $bitacora->fecha_hora = now();
        $bitacora->fecha = now()->format('Y-m-d');
        $bitacora->user_id = auth()->id();
        $bitacora->save();

        // Redirecciona con un mensaje de éxito
        return redirect()->route('admin.reservas.create', compact('reserva'))->with('success', 'El odontologo no tiene ningun horario');
    }


    /**
     * Display the specified resource.
     */
    public function show(Reserva $reserva)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reserva $reserva)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reserva $reserva)
    {
        $reserva->delete();

        $bitacora = new Bitacora();
        $bitacora->accion = 'Eliminacion de reserva';
        $bitacora->fecha_hora = now();
        $bitacora->fecha = now()->format('Y-m-d');
        $bitacora->user_id = auth()->id();
        $bitacora->save();

        return redirect()->route('admin.reservas.index')->with('success', '¡Reserva eliminada con éxito!');
    }
}
