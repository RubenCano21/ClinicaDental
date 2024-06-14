<?php

namespace App\Http\Controllers;

use App\Models\Odontologo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OdontologoController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }
    /**
     * Display a listing of the resource.
     */
    public function index(){

        $odontologos = Odontologo::all();
        return view('admin.odontologos.index', compact('odontologos'));
    }

    /**
 * Show the form for creating a new resource.
 */
    public function create()
    {
        return view('admin.odontologos.create');
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
            'email'=>'required|unique:users',
            'password'=>'required|confirmed'
        ]);

        $usuario = new User();
        $usuario->name = $request->nombre;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request['password']);
        $usuario->save();

        $odontologo = new Odontologo();
        $odontologo->ci = $request->ci;
        $odontologo->nombre = $request->nombre;
        $odontologo->apellido = $request->apellido;
        $odontologo->sexo = $request->sexo;
        $odontologo->telefono = $request->telefono;
        $odontologo->matricula = $request->matricula;
        $odontologo->save();

        return redirect()->route('admin.odontologos.index',$odontologo)->with('success', 'Odontologo creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Odontologo $odontologo)
    {
        return view('admin.odontologos.show',compact('odontologo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Odontologo $odontologo)
    {
        return view('admin.odontologos.edit',compact('odontologo'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Odontologo $odontologo)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $odontologo->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $odontologo->name = $validatedData['name'];
        $odontologo->email = $validatedData['email'];
        if ($request->filled('password')) {
            $odontologo->password = bcrypt($validatedData['password']);
        }
        $odontologo->save();

        return redirect()->route('admin.odontologos.index')->with('success', 'Odontologo actualizado exitosamente');



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Odontologo $odontologo)
    {
        $odontologo->delete();
        return redirect()->route('admin.odontologos.index')->with('success', 'Odontologo eliminado exitosamente');
    }
}
