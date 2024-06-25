<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\bitacora;
use Illuminate\Support\Facades\Hash;

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
        $pacientes = Paciente::with('user')->get();
        return view("admin.pacientes.index", compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.pacientes.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ci'=>'required|unique:pacientes',
            'nombre'=>'required|max:250',
            'apellido'=>'required|max:250',
            'email' => 'required|unique:users,email',
            'sexo'=>'required|max:20',
            'telefono'=>'required',
            'fechaNacimiento'=>'required',
            'direccion'=>'required',
            'password'=>'required|confirmed'
        ]);

        $usuario = new User();
        $usuario->name = $request->nombre;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->save();

        $paciente = new Paciente();
        $paciente->ci = $request->ci;
        $paciente->nombre = $request->nombre;
        $paciente->apellido = $request->apellido;
        $paciente->email = $request->email;
        $paciente->sexo = $request->sexo;
        $paciente->telefono = $request->telefono;
        $paciente->fechaNacimiento = $request->fechaNacimiento;
        $paciente->direccion = $request->direccion;
        $paciente->id_user = $usuario->id; // Asignar el id del usuario al paciente
        $paciente->save();

        $bitacora = new Bitacora();
        $bitacora->accion = 'Creacion de paciente';
        $bitacora->fecha_hora = now();
        $bitacora->fecha = now()->format('Y-m-d');
        $bitacora->user_id =auth()->id();
        $bitacora->save();

        return redirect()->route('admin.pacientes.index')
            ->with('mensaje', 'Se ha registrado un nuevo paciente.')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $paciente = Paciente::with('user')->findOrFail($id);
        return view("admin.pacientes.show", compact('paciente'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $paciente = Paciente::with('user')->findOrFail($id);
        return view('admin.pacientes.edit', compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $paciente = Paciente::find($id);
        $request->validate([
            'ci'=>'required|unique:pacientes',
            'nombre'=>'required|max:250',
            'apellido'=>'required|max:250',
            'email' => 'required|unique:users,email,'.$paciente->id_user,
            'sexo'=>'required|max:20',
            'telefono'=>'required',
            'fechaNacimiento'=>'required',
            'direccion'=>'required',
            'password'=>'required|confirmed'
        ]);

        // Actualizar datos del usuario
        $usuario = $paciente->user;
        $usuario->name = $request->nombre;
        $usuario->email = $request->email;
        if ($request->filled('password')) {
            $usuario->password = Hash::make($request->password);
        }
        $usuario->save();


        $paciente->ci = $request->ci;
        $paciente->nombre = $request->nombre;
        $paciente->apellido = $request->apellido;
        $paciente->email = $request->email;
        $paciente->sexo = $request->sexo;
        $paciente->telefono = $request->telefono;
        $paciente->fechaNacimiento = $request->fechaNacimiento;
        $paciente->direccion = $request->direccion;

        $bitacora = new Bitacora();
        $bitacora->accion = 'Actualizacion de paciente';
        $bitacora->fecha_hora = now();
        $bitacora->fecha = now()->format('Y-m-d');
        $bitacora->user_id =auth()->id();
        $bitacora->save();

        $paciente->save();
        return redirect()->route('admin.pacientes.index');
    }

    public function confirmDelete($id)
    {
        $paciente = Paciente::with('user')->findOrFail($id);
        return view('admin.pacientes.delete', compact('paciente'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $paciente = Paciente::findOrFail($id);
        $paciente->delete();

        $user = $paciente->user;
        $user->delete();

        return redirect()->route('admin.pacientes.index')->with('success', 'Paciente eliminado exitosamente');
    }
}
