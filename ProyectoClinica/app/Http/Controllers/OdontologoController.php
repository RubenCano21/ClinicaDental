<?php

namespace App\Http\Controllers;

use App\Models\Odontologo;
use App\Models\Especialidad;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Bitacora;

class OdontologoController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }

    /**
     * Display a listing of the resource.
     */
    public function index(){
        $odontologos = Odontologo::with('user', 'especialidades')->get();
        return view('admin.odontologos.index', compact('odontologos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $especialidades = Especialidad::all();
        return view('admin.odontologos.create', compact('especialidades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ci' => 'required',
            'nombre' => 'required|string|max:40',
            'apellido' => 'required|string|max:40',
            'sexo' => 'required|string|max:10',
            'telefono' => 'required|integer',
            'matricula' => 'required|string',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed',
            'especialidades' => 'required|array',
            'especialidades.*' => 'exists:especialidads,id'
        ]);

        // Crear un nuevo usuario
        $usuario = new User();
        $usuario->name = $request->nombre;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->assignRole("Odontologo");
        $usuario->save();

        // Crear un nuevo odontólogo
        $odontologo = new Odontologo();
        $odontologo->ci = $request->ci;
        $odontologo->nombre = $request->nombre;
        $odontologo->apellido = $request->apellido;
        $odontologo->email = $request->email;
        $odontologo->sexo = $request->sexo;
        $odontologo->telefono = $request->telefono;
        $odontologo->matricula = $request->matricula;
        $odontologo->id_user = $usuario->id;
        $odontologo->save();

        // Asignar especialidades
        $odontologo->especialidades()->sync($request->especialidades);

        $bitacora = new Bitacora();
        $bitacora->accion = 'Creacion de odontologo';
        $bitacora->fecha_hora = now();
        $bitacora->fecha = now()->format('Y-m-d');
        $bitacora->user_id =auth()->id();
        $bitacora->save();

        return redirect()->route('admin.odontologos.index')->with('success', 'Odontólogo creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $odontologo = Odontologo::with('user', 'especialidades')->findOrFail($id);
        return view('admin.odontologos.show', compact('odontologo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $odontologo = Odontologo::with('especialidades')->findOrFail($id);
        $especialidades = Especialidad::all();
        return view('admin.odontologos.edit', compact('odontologo', 'especialidades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $odontologo = Odontologo::findOrFail($id);

        $request->validate([
            'ci' => 'required',
            'nombre' => 'required|string|max:40',
            'apellido' => 'required|string|max:40',
            'sexo' => 'required|string|max:10',
            'telefono' => 'required|integer',
            'matricula' => 'required|string',
            'email' => 'required|unique:users,email,' . $odontologo->id_user,
            'password' => 'nullable|confirmed',
            'especialidades' => 'required|array',
            'especialidades.*' => 'exists:Especialidades,id'
        ]);

        // Actualizar datos del usuario
        $usuario = $odontologo->user;
        $usuario->name = $request->nombre;
        $usuario->email = $request->email;
        if ($request->filled('password')) {
            $usuario->password = Hash::make($request->password);
        }
        $usuario->save();

        // Actualizar datos del odontólogo
        $odontologo->update($request->only('ci', 'nombre', 'apellido','email', 'sexo', 'telefono', 'matricula'));

        // Actualizar especialidades
        $odontologo->especialidades()->sync($request->especialidades);

        $bitacora = new Bitacora();
        $bitacora->accion = 'Actualizacion de odontologo';
        $bitacora->fecha_hora = now();
        $bitacora->fecha = now()->format('Y-m-d');
        $bitacora->user_id =auth()->id();
        $bitacora->save();

        return redirect()->route('admin.odontologos.index')->with('success', 'Odontólogo actualizado exitosamente');
    }

    public function confirmDelete($id)
    {
        $odontologo = Odontologo::with('user')->findOrFail($id);
        return view('admin.odontologos.delete', compact('odontologo'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $odontologo = Odontologo::findOrFail($id);
        $user = $odontologo->user;
        $odontologo->delete();
        $user->delete();

        $bitacora = new Bitacora();
        $bitacora->accion = 'Eliminacion de odontologo';
        $bitacora->fecha_hora = now();
        $bitacora->fecha = now()->format('Y-m-d');
        $bitacora->user_id =auth()->id();
        $bitacora->save();

        return redirect()->route('admin.odontologos.index')->with('success', 'Odontólogo eliminado exitosamente');
    }
}
