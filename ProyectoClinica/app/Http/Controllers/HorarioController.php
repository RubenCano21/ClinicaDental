<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use App\Models\Odontologo;
use Illuminate\Http\Request;
use App\Models\Bitacora;

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
        //verificar si el horario ya existe para ese dia y rango de horas
        $horaExistente = Horario::where('dia', $request->dia)
            ->where(function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    $query->where('horaInicio', '>=', $request->horaInicio)
                        ->where('horaInicio', '<', $request->horaFin);
                })
                    ->orWhere(function ($query) use ($request) {
                        $query->where('horaFin', '>', $request->horaInicio)
                            ->where('horaFin', '<=', $request->horaFin);
                    })
                    ->orWhere(function ($query) use ($request) {
                        $query->where('horaInicio', '<', $request->horaInicio)
                            ->where('horaFin', '>', $request->horaFin);
                    });
            })
            ->exists();

        if ($horaExistente) {
            $bitacora = new Bitacora();
            $bitacora->accion = 'Error de horario';
            $bitacora->fecha_hora = now();
            $bitacora->fecha = now()->format('Y-m-d');
            $bitacora->user_id = auth()->id();
            $bitacora->save();

            return redirect()->back()
                ->withInput()
                ->with('mensaje', 'Ya existe un horario con este dia en el sistema')
                ->with('icon', 'danger');
        }

        $bitacora = new Bitacora();
        $bitacora->accion = 'Creacion de horarios';
        $bitacora->fecha_hora = now();
        $bitacora->fecha = now()->format('Y-m-d');
        $bitacora->user_id = auth()->id();
        $bitacora->save();

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

        $bitacora = new Bitacora();
        $bitacora->accion = 'Actualizacion de horario';
        $bitacora->fecha_hora = now();
        $bitacora->fecha = now()->format('Y-m-d');
        $bitacora->user_id = auth()->id();
        $bitacora->save();

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

        $bitacora = new Bitacora();
        $bitacora->accion = 'Elminacion de horario';
        $bitacora->fecha_hora = now();
        $bitacora->fecha = now()->format('Y-m-d');
        $bitacora->user_id = auth()->id();
        $bitacora->save();

        return redirect()->route('admin.horarios.index')->with('success', 'Horario eliminado satisfactoriamente');
    }
}
