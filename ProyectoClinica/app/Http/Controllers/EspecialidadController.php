<?php

namespace App\Http\Controllers;

use App\Models\especialidad;
use Illuminate\Http\Request;
use App\Models\Bitacora;

class EspecialidadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $especialidades = especialidad::all();
        return view('admin.especialidades.index', compact('especialidades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
            
        return view('admin.especialidades.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        Especialidad::create($validatedData);

        $bitacora = new Bitacora();
        $bitacora->accion = 'Crear de especialidad';
        $bitacora->fecha_hora = now();
        $bitacora->fecha = now()->format('Y-m-d');
        $bitacora->user_id = auth()->id();
        $bitacora->save();

        return redirect()->route('admin.especialidades.index')->with('success', 'Especialidad creada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $especialidad = especialidad::findOrFail($id);
        return view('admin.especialidades.show', compact('especialidad'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $especialidad = especialidad::findOrFail($id);
        return view('admin.especialidades.edit', compact('especialidad'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        // Buscar la especialidad por su ID
        $especialidad = Especialidad::findOrFail($id);

        // Actualizar los datos de la especialidad
        $especialidad->nombre = $request->input('nombre');
        $especialidad->save();

        $bitacora = new Bitacora();
        $bitacora->accion = 'Actualizar especialidad';
        $bitacora->fecha_hora = now();
        $bitacora->fecha = now()->format('Y-m-d');
        $bitacora->user_id = auth()->id();
        $bitacora->save();

        // Redirigir con un mensaje de éxito
        return redirect()->route('admin.especialidades.index')->with('success', 'Especialidad actualizada exitosamente.');
    }

    public function confirmDelete($id){
        $especialidad = especialidad::findOrFail($id);
        return view('admin.especialidades.delete', compact('especialidad'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $especialidad = especialidad::find($id);
        $especialidad->delete();

        $bitacora = new Bitacora();
        $bitacora->accion = 'Eliminar especialidad';
        $bitacora->fecha_hora = now();
        $bitacora->fecha = now()->format('Y-m-d');
        $bitacora->user_id = auth()->id();
        $bitacora->save();

        return redirect()->route('admin.especialidades.index')
            ->with('mensaje', 'Consultorio Eliminado.')
            ->with('icono', 'success');
    }
}
