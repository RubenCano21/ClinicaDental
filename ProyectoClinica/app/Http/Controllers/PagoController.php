<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Factura;
use App\Models\Pago;
use App\Models\PlanPago;
use App\Models\Servicio;
use App\Models\TipoPago;
use App\Models\Paciente;
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
        $pagos = Pago::with(['paciente','tipoPago','planPago','citas', 'citas.servicio'])->get();
        return view('pagos.index', compact('pagos'));
    }

    public function generarPDF($id){
        $boletaPago = Pago::with(['pacientes','tipoPago','planPagos', 'citas.servicio'])->find($id);

        $pdf = PDF::loadView('pagos.pdf', compact('boletaPago'));

        $filename = 'Boleta '.$boletaPago->id.'.pdf';
        return $pdf->download($filename);
    }

    public function create()
    {
        $pacientes = Paciente::all();
        $servicios = Servicio::all();
        $tipoPagos = TipoPago::all();
        $planPagos = PlanPago::all();
        $citas = Cita::all();
        $facturas = Factura::all();


        return view('pagos.create', compact('pacientes','servicios','tipoPagos','planPagos','citas', 'facturas'));
    }

    public function store(Request $request)
    {
        // Validar la solicitud
        $validated = $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'tipoPago_id' => 'required|exists:tipo_pagos,id',
            'planPagos_id' => 'required|exists:plan_pagos,id',
            'cita_id' => 'exists:citas,id|nullable', // Si 'cita_id' no es obligatorio
            'fecha' => 'required|date',
            'monto' => 'required|numeric',
            'estado' => 'required|string',
            'factura_id' => 'exists:facturas,id|nullable', // Asegúrate de validar 'factura_id'
        ]);

        // Crear el pago
        $pago = Pago::create($validated);

        // Actualizar el monto total de la factura
        $factura = Factura::find($validated['factura_id']);
        $factura->monto += $validated['monto'];
        $factura->save();

        $bitacora = new Bitacora();
        $bitacora->accion = 'Creacion de pago';
        $bitacora->fecha_hora = now();
        $bitacora->fecha = now()->format('Y-m-d');
        $bitacora->user_id = auth()->id();
        $bitacora->save();

        return redirect()->route('pagos.index', compact('pago'))->with('success', 'Pago creado correctamente');
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
            'paciente_id' => 'required|exists:pacientes,id',
            'tipoPago_id' => 'required|exists:tipoPago,id',
            'planPagos_id' => 'required|exists:planPago,id',
            'cita_id' => 'exists:citas,id',
            'fecha' => 'required|date',
            'monto' => 'required|numeric',
            'estado' => 'string'
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

    public function generarReporte(Request $request){
        $desde = $request->desde;
        $hasta = $request->hasta;
        $paciente = $request->paciente;

        $query = Pago::query();

        if (!empty($paciente)) {
            $query = $query->where('paciente_id', $paciente);
        }
        if (!empty($desde)) {
            $query = $query->whereDate('fecha', '>=', $desde);
        }
        if (!empty($hasta)) {
            $query = $query->whereDate('fecha', '<=', $hasta);
        }

        $pagos = $query->orderBy('id','DESC')->get();

        $pdf = PDF::loadView('pagos.pdf',['pago' => $pagos]);
        return $pdf->download('pagosReporte.pdf');
    }
}
