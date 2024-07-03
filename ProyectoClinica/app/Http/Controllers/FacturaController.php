<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\Paciente;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bitacora;
use PDF;


class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $pacientes = Paciente::all();
        $facturas = Factura::with(['paciente',
            'pagos.tipoPago',
            'pagos.planPago',
            'pagos.citas.reserva'])->paginate(10);

        return view('facturas.index', compact('facturas', 'pacientes'));
    }

    public function generarPDF($id){
        $factura = Factura::with([
            'paciente',
            'pagos',
            'pagos.tipoPago',
            'pagos.planPago',
            'pagos.citas'])->findOrFail($id);

        $pdf = PDF::loadView('facturas.reporte', compact('factura'));

        $filename = 'Factura_' . $factura->paciente->nombre .'.pdf';
        return $pdf->download($filename);
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

        $bitacora = new Bitacora();
        $bitacora->accion = 'Creacion de factura';
        $bitacora->fecha_hora = now();
        $bitacora->fecha = now()->format('Y-m-d');
        $bitacora->user_id = auth()->id();
        $bitacora->save();

        //generar archivo de la factura
        //$this->generarReporte($request);

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
        $factura = Factura::with([ 'paciente', 'pagos'])->findOrFail($id);

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

        $bitacora = new Bitacora();
        $bitacora->accion = 'Descarga de factura';
        $bitacora->fecha_hora = now();
        $bitacora->fecha = now()->format('Y-m-d');
        $bitacora->user_id = auth()->id();
        $bitacora->save();

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

    public function generarReporte(Request $request){
        $desde = $request->desde;
        $hasta = $request->hasta;
        $usuario = $request->usuario;
        $paciente = $request->paciente;

        $query = Factura::query();

        if (!empty($usuario)) {
            $query = $query->where('user_id', $usuario);
        }
        if (!empty($paciente)) {
            $query = $query->where('paciente_id', $paciente);
        }
        if (!empty($desde)) {
            $query = $query->whereDate('fecha', '>=', $desde);
        }
        if (!empty($hasta)) {
            $query = $query->whereDate('fecha', '<=', $hasta);
        }

        $factura = $query->orderBy('id','DESC')->get();

        $pdf = PDF::loadView('facturas.pdf',['factura' => $factura]);
        return $pdf->download('facturaReporte.pdf');
    }
}
