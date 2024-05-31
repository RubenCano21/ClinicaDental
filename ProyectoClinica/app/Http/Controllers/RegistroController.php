<?php

namespace App\Http\Controllers;

use App\Models\cr;
use App\Models\User;
use App\Models\paciente;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('registro');
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
        $usuario = new User();
        $paciente = new paciente();
        
        $usuario->password = $request->ci;
        $usuario->estado = 'activo';

        $paciente->ci = $request->ci;
        $paciente->nombre = $request->nombre;
        $paciente->apellido = $request->apellido;
        $paciente->correo = $request->email;
        if ($request->sexo == 'masculino') {
            $paciente->sexo = 'm';
        }else{
            $paciente->sexo= 'f';
        }
        $paciente->direccion = $request->direccion;
        $paciente->fechanacimiento = $request->fecha_nacimiento;
        $paciente->id_user = $usuario->id;
        $usuario->save();
        $paciente->save();
        
        // return redirect()->route('registro.store');
        return $request->all();
    }

    /**
     * Display the specified resource.
     */
    public function show(cr $cr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cr $cr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cr $cr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cr $cr)
    {
        //
    }
}
