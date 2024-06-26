<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;
use App\Models\Bitacora;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   $servicios = Servicio::all();
        return view('admin.servicios.index',compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.servicios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $servicio = new Servicio();
        $servicio->nombre = $request->nombre;
        $servicio->precio = $request->precio;
        $servicio->duracion = $request->duracion;

        $servicio->save();

        $bitacora = new Bitacora();
        $bitacora->accion = 'Creacion de servicio';
        $bitacora->fecha_hora = now();
        $bitacora->fecha = now()->format('Y-m-d');
        $bitacora->user_id = auth()->id();
        $bitacora->save();

    return redirect()->route('admin.servicios.index',$servicio)->with('success', 'Servicio creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Servicio $servicio)
    {
        return view('admin.servicios.show', compact('servicio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Servicio $servicio)
    {

        return view('admin.servicios.edit', compact('servicio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Servicio $servicio)
    {
         // Valida los datos del formulario
         $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
        ]);

        // Actualiza el servicio con los datos del formulario
        $servicio->update([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
        ]);

        $bitacora = new Bitacora();
        $bitacora->accion = 'Actualizacion de servicio';
        $bitacora->fecha_hora = now();
        $bitacora->fecha = now()->format('Y-m-d');
        $bitacora->user_id =auth()->id();
        $bitacora->save();

        // Redirecciona de vuelta a la página de detalles del servicio
        return redirect()->route('admin.servicios.show', $servicio)->with('success', 'Servicio actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Servicio $servicio)
    {
        $bitacora = new Bitacora();
        $bitacora->accion = 'Eliminacion de servicio';
        $bitacora->fecha_hora = now();
        $bitacora->fecha = now()->format('Y-m-d');
        $bitacora->user_id =auth()->id();
        $bitacora->save();

        $servicio->delete();
        return redirect()->route('admin.servicios.index',$servicio)->with('success', 'Servicio eliminado exitosamente');
    }
}
