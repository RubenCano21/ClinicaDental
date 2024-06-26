<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\Reserva;
use Illuminate\Http\Request;
use App\Models\Servicio;
use illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   $reservas = Reserva::all();
        $paciente = Paciente::where('id_user', auth()->id())->first();
        $reservas = Reserva::where('id_paciente', $paciente->id)->get();
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
        $servicios = Servicio::all();
        return view('admin.reservas.create', [
            'servicios' => $servicios,
            'horasDeTrabajo' => $this->horasDeTrabajo,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required|in:' . implode(',', $this->horasDeTrabajo),
            'id_servicio' => 'required|exists:servicios,id',
        ]);

            $paciente = Paciente::where('id_user', auth()->id())->first();

        // Crea una nueva instancia de reserva
        Reserva::create([
            'fecha' => $request->input('fecha'),
            'hora' => $request->input('hora'),
            'estado' => 'pendiente', // Estado inicial de la reserva
            'id_paciente' => $paciente->id,
            'id_servicio' => $request->input('id_servicio'),
        ]);

        // Redirecciona con un mensaje de éxito
        return redirect()->route('admin.reservas.create')->with('success', '¡Reserva realizada con éxito!');
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
    public function edit(Reserva $reserva)
    {
        //
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
        return redirect()->route('admin.reservas.index')->with('success', '¡Reserva eliminada con éxito!');
    }
}
