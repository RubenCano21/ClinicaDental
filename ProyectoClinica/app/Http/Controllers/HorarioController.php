<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use App\Models\Odontologo;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $horarios = Horario::with('odontologo')->get();
        return view('admin.horarios.index', compact('horarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $odontologos = Odontologo::all();
        return view('admin.horarios.create', compact('odontologos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'dia' => 'required',
            'horaInicio' => 'required',
            'horaFin' => 'required',
        ]);

        Horario::create($request->all());

        return redirect()->route('admin.horarios.index')->with('success', 'Horario creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $horario = Horario::find($id);
        return view('admin.horarios.show', compact('horario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $horario = Horario::with('odontologo')->findOrFail($id);
        $odontologos = Odontologo::all();
        return view('admin.horarios.edit', compact('horario', 'odontologos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $horario = Horario::findOrFail($id);

        $request->validate([
            'dia' => 'required',
            'horaInicio' => 'required',
            'horaFin' => 'required',
        ]);

        $horario->update($request->only('odontologo_id', 'dia', 'horaInicio', 'horaFin'));
        $horario->odontologo()->associate($horario->odontologo_id);
        return redirect()->route('admin.horarios.index')->with('success', 'Horario actualizado satisfactoriamente');
    }

    public function confirmDelete($id)
    {
        $horario = Horario::with('odontologo')->findOrFail($id);
        return view('admin.horarios.delete', compact('horario'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Horario::destroy($id);
        return redirect()->route('admin.horarios.index')->with('success', 'Horario eliminado satisfactoriamente');
    }
}
