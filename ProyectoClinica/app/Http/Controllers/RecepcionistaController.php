<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
use App\Models\Recepcionista;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        $recepciontas = Recepcionista::with('user');
        return view('admin.recepcionistas.index')->with('recepcionistas',$recepciontas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $recepcionista = Recepcionista::all();
        return view("admin.recepcionistas.create",compact('recepcionista'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ci'=>'required',
            'nombre'=>'required',
            'apellido'=>'required',
            'email' => 'required|unique:users,email',
            'sexo'=>'required',
            'telefono'=>'required',
            'turno'=>'required',
        ]);

        // Crear un nuevo usuario
        $usuario = new User();
        $usuario->name = $request->nombre;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->save();

        $recepcionista = new Recepcionista();

        $recepcionista->ci = $request->ci;
        $recepcionista->nombre = $request->nombre;
        $recepcionista->apellido = $request->apellido;
        $recepcionista->email = $request->email;
        $recepcionista->sexo = $request->sexo;
        $recepcionista->telefono = $request->telefono;
        $recepcionista->turno = $request->turno;
        $recepcionista->sueldo = $request->sueldo;
        $recepcionista->id_user = $usuario->id;

        $recepcionista->save();

        return redirect()->route('admin.recepcionistas.index')->with('success', 'Recepcionista creado exitosamente');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $recepcionista = Recepcionista::with('user')->findOrFail($id);
        return view('admin.recepcionistas.show', compact('recepcionista'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $recepcionistas = recepcionista::find($id);
        return view('admin.recepcionistas.editar', compact("recepcionistas"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $recepcionista = Recepcionista::find($id);

        $request->validate([
            'ci'=>'required',
            'nombre'=>'required',
            'apellido'=>'required',
            'email' => 'required|email|unique:users,email',
            'sexo'=>'required',
            'telefono'=>'required',
            'turno'=>'required',
        ]);

        // Actualizar datos del usuario
        $usuario = $recepcionista->user;
        $usuario->name = $request->nombre;
        $usuario->email = $request->email;
        if ($request->filled('password')) {
            $usuario->password = Hash::make($request->password);
        }
        $usuario->save();

        //actualizar datos del usuario
        $recepcionista->update($request->only('ci','nombre','apellido','email','sexo','telefono','turno'));

        return redirect()->route('admin.recepcionistas.index')->with('success', 'Recepcionista actualizado exitosamente');
    }

    public function confirmDelete($id)
    {
        $recepcionista = Recepcionista::with('user')->findOrFail($id);
        return view('admin.recepcionistas.delete', compact('recepcionista'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $recepcionista = Recepcionista::findOrFail($id);
        $user = $recepcionista->user;
        $recepcionista->delete();
        $user->delete();

        return redirect()->route('admin.recepcionistas.index')->with('success', 'Recepcionista eliminado exitosamente');

    }
}
