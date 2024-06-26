<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function showInvoice()
    {
        $items = [
            ['name' => 'Producto 1', 'quantity' => 2, 'price' => 10.00, 'total' => 20.00],
            ['name' => 'Producto 2', 'quantity' => 1, 'price' => 15.00, 'total' => 15.00],
            // Agrega más productos según sea necesario
        ];

        $total = array_sum(array_column($items, 'total'));

        return view('invoices.invoice', compact('items', 'total'));
    }

    public function downloadInvoice()
    {
        $items = [
            ['name' => 'Producto 1', 'quantity' => 2, 'price' => 10.00, 'total' => 20.00],
            ['name' => 'Producto 2', 'quantity' => 1, 'price' => 15.00, 'total' => 15.00],
            // Agrega más productos según sea necesario
        ];

        $total = array_sum(array_column($items, 'total'));

        $pdf = Pdf::loadView('invoices.invoice', compact('items', 'total'));
        return $pdf->download('factura.pdf');
    }
}
