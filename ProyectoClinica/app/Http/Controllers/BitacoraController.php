<?php

namespace App\Http\Controllers;

use App\Models\bitacora;
use App\Models\Odontologo;
use App\Models\Paciente;
use App\Models\Recepcionista;
use Illuminate\Http\Request;

class BitacoraController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:ver bitacora')->only('index');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bitacoras = Bitacora::with('user')->get();
        $pacientes = Paciente::all();
        $odontologos = Odontologo::all();
        $recepcionistas = Recepcionista::all();
        return view('admin.bitacora.index', compact('bitacoras', 'pacientes', 'odontologos', 'recepcionistas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

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
    public function show(bitacora $bitacora)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(bitacora $bitacora)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, bitacora $bitacora)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(bitacora $bitacora)
    {
        //
    }
}
