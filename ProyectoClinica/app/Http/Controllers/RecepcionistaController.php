<?php

namespace App\Http\Controllers;

use App\Models\Recepcionista;
use Illuminate\Http\Request;
use App\Models\bitacora;
use App\Models\User;

class RecepcionistaController extends Controller
{

    public function __construct(){
        $this->middleware("auth");
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recepciontas = Recepcionista::all();
        return view('recepcionista.index')->with('recepcionistas',$recepciontas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("recepcionista.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $usuarios = new User();
        $usuarios->name = $request->get('nombre');
        $usuarios->email = $request->get('email');
        $usuarios->password = bcrypt($request->get('ci'));
        $usuarios->save();

        $recepcionistas = new recepcionista();
        $recepcionistas->ci = $request->get('ci');
        $recepcionistas->nombre = $request->get('nombre');
        $recepcionistas->apellido = $request->get('apellido');
        $recepcionistas->email = $request->get('email');
        $recepcionistas->sexo = $request->get('sexo');
        $recepcionistas->telefono = $request->get('telefono');
        $recepcionistas->turno = $request->get('turno');
        $recepcionistas->sueldo = $request->get('sueldo');
        $recepcionistas->id_user = $usuarios->id;
        $recepcionistas->save();

        $bitacora = new Bitacora();
        $bitacora->accion = 'Creacion de recepcionista';
        $bitacora->fecha_hora = now();
        $bitacora->fecha = now()->format('Y-m-d');
        $bitacora->user_id =auth()->id();
        $bitacora->save();

        return redirect('/recepcionistas');
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
        $recepcionistas = recepcionista::find($id);
        return view('recepcionista.editar')->with('recepcionistas', $recepcionistas);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $recepcionista = recepcionista::find($id);

        $recepcionista->ci = $request->get('ci');
        $recepcionista->nombre = $request->get('nombre');
        $recepcionista->apellido = $request->get('apellido');
        $recepcionista->email = $request->get('email');
        $recepcionista->sexo = $request->get('sexo');
        $recepcionista->telefono = $request->get('telefono');
        $recepcionista->turno = $request->get('turno');
        $recepcionista->sueldo = $request->get('sueldo');

        $recepcionista->save();

        $bitacora = new Bitacora();
        $bitacora->accion = 'Actualizacion de recepcionista';
        $bitacora->fecha_hora = now();
        $bitacora->fecha = now()->format('Y-m-d');
        $bitacora->user_id =auth()->id();
        $bitacora->save();

        return redirect('/recepcionistas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $recepcionista = recepcionista::find($id);
        $recepcionista->delete();

        $bitacora = new Bitacora();
        $bitacora->accion = 'Eliminacion de recepcionista';
        $bitacora->fecha_hora = now();
        $bitacora->fecha = now()->format('Y-m-d');
        $bitacora->user_id =auth()->id();
        $bitacora->save();
        
        return redirect('/recepcionistas');
    }
}
