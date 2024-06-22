<?php

namespace App\Http\Controllers;

use App\Models\Factura;
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
        return view('factura.show');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
