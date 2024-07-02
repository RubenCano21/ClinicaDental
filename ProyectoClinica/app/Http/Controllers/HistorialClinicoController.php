<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Historial_clinico;
use Illuminate\Http\Request;

class HistorialClinicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $historiales = Historial_clinico::all();
        $citas = Cita::all();
        return view('historiales.index', compact('historiales', 'citas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $historial = Historial_clinico::find($id);
        $citas = Cita::where('id_historialclinico', $id)->get();
        return view('historiales.show', compact('historial','citas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Historial_clinico $historial_clinico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Historial_clinico $historial_clinico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Historial_clinico $historial_clinico)
    {
        //
    }
}
