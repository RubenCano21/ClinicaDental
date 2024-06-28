<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\Paciente;
use Barryvdh\DomPDF\Facade\Pdf;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   /* public function index()
    {
        $userId = Auth::id();

        $facturas = Factura::whereHas('paciente', function ($query) use ($userId){
            $query->where('id_user', $userId);
        })->with('paciente', 'pagos')->get();
        return view('facturas.index', compact('facturas'));
    }

    public function show($id)
    {
        $factura = Factura::with('paciente', 'pagos')->findOrFail($id);
        return view('facturas.show', compact('factura'));
    }

    public function download($id)
    {
        $factura = Factura::with('paciente', 'pagos')->findOrFail($id);
        $pdf = PDF::loadView('facturas.pdf', compact('factura'));
        return $pdf->download('factura_'.$factura->id.'.pdf');
    }*/

    public function index()
    {
        $pacientes = Paciente::all();
        $facturas = Factura::with(['paciente', 'pagos'])->get();
        return view('facturas.index', compact('facturas', 'pacientes'));
    }

    public function create()
    {
        $facturas = Factura::all();
        $pacientes = Paciente::all();
        return view('facturas.create', compact('pacientes', 'facturas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nit' => 'required|string|max:255',
            'detalle' => 'required|string',
            'monto' => 'required|numeric',
            'fecha' => 'required|date',
            'paciente_id' => 'required|exists:pacientes,id',
        ]);

        $ultimoNumero = Factura::max('numero');
        $nuevoNumero = str_pad((int) $ultimoNumero + 1, 6, '0', STR_PAD_LEFT);

        $factura = new Factura();
        $factura->numero = $nuevoNumero;
        $factura->nit = $request->nit;
        $factura->detalle = $request->detalle;
        $factura->monto = $request->monto;
        $factura->fecha = $request->fecha;
        $factura->paciente_id = $request->paciente_id;
        $factura->save();

        //generar archivo de la factura
        $this->generateFacturaFile($factura);

        return redirect()->route('facturas.index')->with('success', 'Factura creada exitosamente.');
    }

    private function generateFacturaFile($factura)
    {
        $filePath = storage_path('app/public/factura/' . $factura->id . '.png');

        // Aquí puedes generar la imagen o PDF de la factura.
        // Como ejemplo, vamos a crear una imagen PNG en blanco.
        $img = imagecreate(200, 100);
        $bgColor = imagecolorallocate($img, 255, 255, 255);
        $textColor = imagecolorallocate($img, 0, 0, 0);
        imagestring($img, 5, 10, 10, "Factura #{$factura->numero}", $textColor);
        imagestring($img, 5, 10, 30, "Monto: {$factura->monto}", $textColor);
        imagepng($img, $filePath);
        imagedestroy($img);
    }

    public function show($id)
    {
        $factura = Factura::with(['paciente', 'pagos'])->findOrFail($id);

        $descargarURL = route('facturas.download', ['id' => $id]);

        $qrCode = new QrCode($descargarURL);
        $qrCode->setSize(150);

        $writer = new PngWriter();
        $qrCodeDataUri = $writer->writeDataUri($qrCode);

        return view('facturas.show', ['factura' => $factura, 'qrCodeDataUri' => $qrCodeDataUri]);
    }

    public function download($id)
    {
        $factura = Factura::findOrFail($id);
        $filePath = storage_path('app/public/factura/' . $factura->id . '.png');

        if (!file_exists($filePath)) {
            return redirect()->route('facturas.index')->with('error', 'El archivo de la factura no existe.');
        }

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

    public function showInvoice()
    {
        $items = [
            ['name' => 'Producto 1', 'quantity' => 2, 'price' => 10.00, 'total' => 20.00],
            ['name' => 'Producto 2', 'quantity' => 1, 'price' => 15.00, 'total' => 15.00],
            // Agrega más productos según sea necesario
        ];

        $facturas = Factura::with('paciente')->get();
        $total = array_sum(array_column($items, 'total'));

        return view('facturas.invoice', compact('items', 'total','facturas'));
    }

    public function downloadInvoice()
    {
        $items = [
            ['name' => 'Producto 1', 'quantity' => 2, 'price' => 10.00, 'total' => 20.00],
            ['name' => 'Producto 2', 'quantity' => 1, 'price' => 15.00, 'total' => 15.00],
            // Agrega más productos según sea necesario
        ];

        $total = array_sum(array_column($items, 'total'));

        $pdf = Pdf::loadView('facturas.invoice', compact('items', 'total'));
        return $pdf->download('factura.pdf');

    }
}
