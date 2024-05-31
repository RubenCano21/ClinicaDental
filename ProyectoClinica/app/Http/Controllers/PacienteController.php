<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;

class PacienteController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pacientes = Paciente::all();
        return view("paciente.index")->with("pacientes", $pacientes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("paciente.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pacientes = new Paciente();

        $pacientes->ci = $request->get('ci');
        $pacientes->nombre = $request->get('nombre');
        $pacientes->apellido = $request->get('apellido');
        $pacientes->email = $request->get('email');
        $pacientes->sexo = $request->get('sexo');
        $pacientes->telefono = $request->get('telefono');
        $pacientes->fechaNacimiento = $request->get('fechaNacimiento');
        $pacientes->direccion = $request->get('direccion');

        $pacientes->save();

        return redirect('/pacientes');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pacientes = Paciente::find($id);
        return view('paciente.editar')->with('pacientes', $pacientes);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $paciente = Paciente::find($id);

        $paciente->ci = $request->get('ci');
        $paciente->nombre = $request->get('nombre');
        $paciente->apellido = $request->get('apellido');
        $paciente->email = $request->get('email');
        $paciente->sexo = $request->get('sexo');
        $paciente->telefono = $request->get('telefono');
        $paciente->fechaNacimiento = $request->get('fechaNacimiento');
        $paciente->direccion = $request->get('direccion');

        $paciente->save();
        return redirect('/pacientes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $paciente = Paciente::find($id);
        $paciente->delete();
        
        return redirect('/pacientes');
    }
}
