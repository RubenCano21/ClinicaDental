<?php

namespace App\Http\Controllers;

use App\Models\Historial_clinico;
use App\Models\Odontologo;
use App\Models\Paciente;
use App\Models\Bitacora;
use Illuminate\Http\Request;


class HistorialClinicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $historial_clinicos = Historial_clinico::with(['odontologo', 'paciente'])->get();
        return view('historial_clinico.index', compact('historial_clinicos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pacientes = Paciente::all();
        $odontologos = Odontologo::all();
        return view('historial_clinico.create', compact('pacientes', 'odontologos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_paciente' => 'required|exists:pacientes,id',
            'id_odontologo' => 'required|exists:odontologos,id',
            'Fecha_Cita' => 'required|date',
            'Diagnostico' => 'required|string',
            'Tratamiento' => 'required|string',
            'odontograma' => 'required|json',
        ]);
    
        $historial_clinico = Historial_Clinico::create([
            'id_paciente' => $validatedData['id_paciente'],
            'id_odontologo' => $validatedData['id_odontologo'],
            'Fecha_Cita' => $validatedData['Fecha_Cita'],
            'Diagnostico' => $validatedData['Diagnostico'],
            'Tratamiento' => $validatedData['Tratamiento'],
            'odontograma' => $validatedData['odontograma'],
        ]);

        $bitacora = new Bitacora();
        $bitacora->accion = 'Historial Clinico Creado exitosamente';
        $bitacora->fecha_hora = now();
        $bitacora->fecha = now()->format('Y-m-d');
        $bitacora->user_id =auth()->id();
        $bitacora->save();

        $historial_clinico->save();

        return redirect()->route('historial_clinico.index')->with('success', 'Historial clínico creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Historial_clinico $historial_clinico)
    {
     
        return view('historial_clinico.show', compact('historial_clinico'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Historial_clinico $historial_clinico)
    {
        $odontologos = Odontologo::all();
        $pacientes = Paciente::all();
        return view('historial_clinico.edit', compact('historial_clinico', 'odontologos', 'pacientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Historial_clinico $historial_clinico)
    {
        $validatedData = $request->validate([
            'id_paciente' => 'required|exists:pacientes,id',
            'id_odontologo' => 'required|exists:odontologos,id',
            'Fecha_Cita' => 'required|date',
            'Diagnostico' => 'required|string',
            'Tratamiento' => 'required|string',
            'odontograma' => 'required|json',
        ]);
    
        $historial_clinico->update([
            'id_paciente' => $validatedData['id_paciente'],
            'id_odontologo' => $validatedData['id_odontologo'],
            'Fecha_Cita' => $validatedData['Fecha_Cita'],
            'Diagnostico' => $validatedData['Diagnostico'],
            'Tratamiento' => $validatedData['Tratamiento'],
            'odontograma' => $validatedData['odontograma'],
        ]);
        
        $bitacora = new Bitacora();
        $bitacora->accion = 'Historial Clinico Actualizado';
        $bitacora->fecha_hora = now();
        $bitacora->fecha = now()->format('Y-m-d');
        $bitacora->user_id =auth()->id();
        $bitacora->save();

        return redirect()->route('historial_clinico.index')->with('success', 'Historial clínico actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Historial_clinico $historial_clinico)
    {   
        $bitacora = new Bitacora();
        $bitacora->accion = 'Historial Clinico Eliminado';
        $bitacora->fecha_hora = now();
        $bitacora->fecha = now()->format('Y-m-d');
        $bitacora->user_id =auth()->id();
        $bitacora->save();

        $historial_clinico->delete();
        return redirect()->route('historial_clinico.index',$historial_clinico)->with('success', 'Historial clínico eliminado exitosamente.');
    }
}
