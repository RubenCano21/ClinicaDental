<?php

namespace App\Http\Controllers;

use App\Models\Odontologo;
use Illuminate\Http\Request;

class OdontologoController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $odontologos = Odontologo::all();
        return view("odontologo.index")->with("odontologos", $odontologos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("odontologo.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $odontologos = new Odontologo();

        $odontologos->ci = $request->get('ci');
        $odontologos->nombre = $request->get('nombre');
        $odontologos->apellido = $request->get('apellido');
        $odontologos->email = $request->get('email');
        $odontologos->sexo = $request->get('sexo');
        $odontologos->telefono = $request->get('telefono');
        $odontologos->matricula = $request->get('matricula');

        $odontologos->save();

        return redirect('/odontologos');
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
        $odontologos = Odontologo::find($id);
        return view('odontologo.editar')->with('odontologos', $odontologos);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $odontologo = Odontologo::find($id);

        $odontologo->ci = $request->get('ci');
        $odontologo->nombre = $request->get('nombre');
        $odontologo->apellido = $request->get('apellido');
        $odontologo->email = $request->get('email');
        $odontologo->sexo = $request->get('sexo');
        $odontologo->telefono = $request->get('telefono');
        $odontologo->matricula = $request->get('matricula');

        $odontologo->save();
        return redirect('/odontologos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $odontologo = odontologo::find($id);
        $odontologo->delete();
        
        return redirect('/odontologos');
    }
}
