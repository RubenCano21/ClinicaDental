<?php

namespace App\Http\Controllers;

use App\Models\especialidad;
use Illuminate\Http\Request;

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

        return redirect()->route('admin.especialidades.index')->with('success', 'Especialidad creada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $especialidade = especialidad::findOrFail($id);
        return view('admin.especialidades.show', compact('especialidade'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $especialidade = especialidad::findOrFail($id);
        return view('admin.especialidades.edit', compact('especialidade'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, especialidad $especialidad)
    {
        //
    }

    public function confirmDelete($id){
        $especialidade = especialidad::findOrFail($id);
        return view('admin.especialidades.delete', compact('especialidade'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $especialidade = especialidad::find($id);
        $especialidade->delete();

        return redirect()->route('admin.especialidades.index')
            ->with('mensaje', 'Consultorio Eliminado.')
            ->with('icono', 'success');
    }
}
