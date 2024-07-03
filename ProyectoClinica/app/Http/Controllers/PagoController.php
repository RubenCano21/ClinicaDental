<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Pago;
use App\Models\PlanPago;
use App\Models\Servicio;
use App\Models\TipoPago;
use App\Models\User;
use App\Models\Bitacora;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pagos = Pago::with(['user','tipoPago','planPago', 'citas.servicio'])->get();
        return view('pagos.index', compact('pagos'));
    }

    public function generarPDF($id){
        $boletaPago = Pago::with(['user','tipoPago','planPago', 'citas.servicio'])->find($id);

        $pdf = PDF::loadView('pagos.pdf', compact('boletaPago'));

        $filename = 'Boleta '.$boletaPago->id.'.pdf';
        return $pdf->download($filename);
    }

    public function create()
    {
        $users = User::all();
        $servicios = Servicio::all();
        $tipoPagos = TipoPago::all();
        $planPagos = PlanPago::all();
        $citas = Cita::all();
        return view('pagos.create', compact('users','servicios','tipoPagos','planPagos','citas'));
    }

    public function store(Request $request)
    {
        // Validar la solicitud
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'tipo_pago_id' => 'required|exists:tipo_pagos,id',
            'plan_pago_id' => 'required|exists:plan_pagos,id',
            'cita_id' => 'required|exists:citas,id',
            'fecha' => 'required|date',
            'monto' => 'required|numeric',
            'estado' => 'required|string'
        ]);

        // Crear el pago
        $pago = new Pago();
        $pago->user_id = $validated['user_id'];
        $pago->tipo_pago_id = $validated['tipo_pago_id'];
        $pago->plan_pago_id = $validated['plan_pago_id'];
        $pago->cita_id = $validated['cita_id'];
        $pago->fecha = $validated['fecha'];
        $pago->monto = $validated['monto'];
        $pago->estado = $validated['estado'];
        $pago->save();

        $bitacora = new Bitacora();
        $bitacora->accion = 'Creacion de pago';
        $bitacora->fecha_hora = now();
        $bitacora->fecha = now()->format('Y-m-d');
        $bitacora->user_id = auth()->id();
        $bitacora->save();

        return redirect()->route('pagos.index')->with('success', 'Pago creado correctamente');
    }

    public function show($id)
    {
        $pago = Pago::findOrFail($id);
        return view('pagos.show', compact('pago'));
    }

    public function edit($id)
    {
        $pago = Pago::findOrFail($id);
        return view('pagos.edit', compact('pago'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'tipo_pago_id' => 'required|exists:tipo_pagos,id',
            'plan_pago_id' => 'required|exists:plan_pagos,id',
            'cita_id' => 'required|exists:citas,id',
            'fecha' => 'required|date',
            'monto' => 'required|numeric',
            'estado' => 'required|string'
        ]);

        $pago = Pago::findOrFail($id);
        $pago->update($request->all());

        $bitacora = new Bitacora();
        $bitacora->accion = 'Actualizacion de pago';
        $bitacora->fecha_hora = now();
        $bitacora->fecha = now()->format('Y-m-d');
        $bitacora->user_id = auth()->id();
        $bitacora->save();

        return redirect()->route('pagos.index')->with('success', 'Pago actualizado exitosamente');
    }

    public function destroy($id)
    {
        $pago = Pago::findOrFail($id);
        $pago->delete();

        $bitacora = new Bitacora();
        $bitacora->accion = 'Eliminacion de pago';
        $bitacora->fecha_hora = now();
        $bitacora->fecha = now()->format('Y-m-d');
        $bitacora->user_id = auth()->id();
        $bitacora->save();

        return redirect()->route('pagos.index')->with('success', 'Pago eliminado exitosamente');
    }
}
