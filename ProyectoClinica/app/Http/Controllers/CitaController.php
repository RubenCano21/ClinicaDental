<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Odontologo;
use App\Models\Paciente;
use App\Models\Reserva;
use App\Models\Servicio;
use Illuminate\Http\Request;

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
        $reservas = Reserva::all();
        return view('admin.citas.create', compact( 'odontologos', 'servicios','reservas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'odontologo_id' => 'required|exists:odontologos,id',
            'servicio_id' => 'required|exists:servicios,id',
            'reserva_id' => 'required|exists:reservas,id',
            'fecha' => 'required|date',
            'hora' => 'required',
        ]);

        Cita::create(request()->all());

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
