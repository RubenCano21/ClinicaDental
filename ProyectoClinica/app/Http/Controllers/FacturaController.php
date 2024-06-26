<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\Paciente;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $facturas = Factura::with('pacientes')->get();
        return view('facturas.index', compact('facturas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pacientes = Paciente::all();
        return view('facturas.create', compact('pacientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nit' => 'required',
            'detalle' => 'required',
            'monto' => 'required|numeric',
            'fecha' => 'required|date',
        ]);

        // Generar número de factura autoincrementable
        $ultimoNumero = Factura::max('numero'); // Obtener el último número de factura
        $nuevoNumero = str_pad((int) $ultimoNumero + 1, 6, '0', STR_PAD_LEFT); // Generar el nuevo número

        // Guardar la factura en la base de datos
        $factura = new Factura();
        $factura->numero = $nuevoNumero;
        $factura->nit = $request->nit;
        $factura->detalle = $request->detalle;
        $factura->monto = $request->monto;
        $factura->fecha = $request->fecha;
        $factura->save();

        return redirect()->route('facturas.index')->with('success', 'Factura creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $factura = Factura::findOrFail($id);

        //generar la url de descarga de la factura
        $descargarURL = route('factura.download',['id'=> $id]);

        //crear codigo QR
        $qrCode = new QrCode($descargarURL);
        $qrCode->setSize(150);

        //confirmar opciones adicionales
        $writer = new PngWriter();
        $qrCodeDataUri = $writer->writeDatauri($qrCode);

        return view('factura.show', ['factura' => $factura, 'qrCodeDataUri' => $qrCodeDataUri]);

    }

    public function download($id){

        $factura = Factura::findOrFail($id);
        $filePath = storage_path('app/public/factura/'.$factura->id.'.png');

        return response()->download($filePath);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Factura $factura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Factura $factura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Factura $factura)
    {
        //
    }
}
