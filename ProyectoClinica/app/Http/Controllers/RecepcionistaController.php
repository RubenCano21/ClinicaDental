<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
use App\Models\Recepcionista;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\bitacora;
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
        $recepcionistas = Recepcionista::with('user')->get();
        return view('admin.recepcionistas.index')->with('recepcionistas',$recepcionistas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $usuarios = User::all();
        return view("admin.recepcionistas.create",compact('usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return redirect('/recepcionistas');
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
        $usuario->assignRole("Recepcionista");
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

       // Recepcionista::create(request()->all());

       $bitacora = new Bitacora();
       $bitacora->accion = 'Creacion de recepcionista';
       $bitacora->fecha_hora = now();
       $bitacora->fecha = now()->format('Y-m-d');
       $bitacora->user_id =auth()->id();
       $bitacora->save();

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
        $recepcionista = recepcionista::find($id);
        return view('admin.recepcionistas.edit', compact("recepcionista"));
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

        $bitacora = new Bitacora();
        $bitacora->accion = 'Actualizacion de recepcionista';
        $bitacora->fecha_hora = now();
        $bitacora->fecha = now()->format('Y-m-d');
        $bitacora->user_id =auth()->id();
        $bitacora->save();

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

        $bitacora = new Bitacora();
        $bitacora->accion = 'Eliminacion de recepcionista';
        $bitacora->fecha_hora = now();
        $bitacora->fecha = now()->format('Y-m-d');
        $bitacora->user_id =auth()->id();
        $bitacora->save();
        
        $user->delete();

        return redirect()->route('admin.recepcionistas.index')->with('success', 'Recepcionista eliminado exitosamente');

    }
}
