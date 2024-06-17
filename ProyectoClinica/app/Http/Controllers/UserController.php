<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\bitacora;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:ver usuarios')->only('index');
        $this->middleware('can:actualizar usuario')->only('update');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {   $usuarios = User::all();
        return view('admin.usuarios.index', compact('usuarios'));
    
        }    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $usuarios = new User();
        $usuarios->name = $validatedData['name'];
        $usuarios->email = $validatedData['email'];
        $usuarios->password = bcrypt($validatedData['password']);
        $usuarios->save();

        $bitacora = new Bitacora();
        $bitacora->accion = 'creacion del usuario';
        $bitacora->fecha_hora = now();
        $bitacora->fecha = now()->format('Y-m-d');
        $bitacora->user_id = $usuarios->id;
        $bitacora->save();

        return redirect()->route('admin.usuarios.index',$usuarios)->with('success', 'Usuario creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $usuario)
    {
         return view('admin.usuarios.show',compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $usuario)
    {   
        return view('admin.usuarios.edit',compact('usuario'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $usuario)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $usuario->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $usuario->name = $validatedData['name'];
        $usuario->email = $validatedData['email'];
        if ($request->filled('password')) {
            $usuario->password = bcrypt($validatedData['password']);
        }
        $usuario->save();
        
        $bitacora = new Bitacora();
        $bitacora->accion = 'actualizacion del usuario';
        $bitacora->fecha_hora = now();
        $bitacora->fecha = now()->format('Y-m-d');
        $bitacora->user_id = $usuario->id;
        $bitacora->save();

        return redirect()->route('admin.usuarios.index')->with('success', 'Usuario actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $usuario)
    {
        $bitacora = new Bitacora();
        $bitacora->accion = 'eliminacion del usuario';
        $bitacora->fecha_hora = now();
        $bitacora->fecha = now()->format('Y-m-d');
        $bitacora->user_id = $usuario->id;
        $bitacora->save();

        $usuario->delete();

        return redirect()->route('admin.usuarios.index')->with('success', 'Usuario eliminado exitosamente');
    }
}
