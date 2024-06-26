<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\bitacora;
use App\Models\Historial_clinico;

class UserController extends Controller
{
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
        $bitacora->accion = 'Creacion de usuario';
        $bitacora->fecha_hora = now();
        $bitacora->fecha = now()->format('Y-m-d');
        $bitacora->user_id = auth()->id();
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
        $bitacora->accion = 'Actualizacion de usuario';
        $bitacora->fecha_hora = now();
        $bitacora->fecha = now()->format('Y-m-d');
        $bitacora->user_id = auth()->id();
        $bitacora->save();

        return redirect()->route('admin.usuarios.index')->with('success', 'Usuario actualizado exitosamente');



    }

    public function confirmDelete($id){
        $usuario = User::findOrFail($id);
        return view('admin.usuarios.delete', compact('usuario'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bitacora = new Bitacora();
        $bitacora->accion = 'Eliminacion de usuario';
        $bitacora->fecha_hora = now();
        $bitacora->fecha = now()->format('Y-m-d');
        $bitacora->user_id = auth()->id();
        $bitacora->save();

        User::destroy($id);
        
        return redirect()->route('admin.usuarios.index')->with('success', 'Usuario eliminado exitosamente');
    }
}
