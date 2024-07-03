<?php

namespace App\Http\Controllers;

use App\Models\NotaCompra;
use Illuminate\Http\Request;

class NotaCompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('nota-compra.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('nota-compra.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'costo' => 'required|numeric',
            'cantidad' => 'required|integer',
            'importe' => 'required|numeric',
            'fechaentrada' =>'required|date',
            'id_proveedor' => 'required|exists:proveedores,id',
            'id_producto' => 'required|exists:productos,id',
            'id_inventario' => 'required|exists:inventarios,id',
        ]);

        $notaCompra = new Nota_compra();
        $notaCompra->costo = $request->costo;
        $notaCompra->cantidad = $request->cantidad;
        $notaCompra->importe = $request->importe;
        $notaCompra->fechaentrada = $request->fechaentrada;
        $notaCompra->id_proveedor = $request->id_proveedor;
        $notaCompra->id_producto = $request->id_producto;
        $notaCompra->id_inventario = $request->id_inventario;
        $notaCompra->save();

        return redirect()->route('nota-compra.index')->with('info', 'Nota compra guardada');
    }

    /**
     * Display the specified resource.
     */
    public function show(NotaCompra $nota_compra)
    {
        return view('nota-compra.show', compact('nota_compra'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NotaCompra $nota_compra)
    {
        return view('nota-compra.edit', compact('nota_compra'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NotaCompra $nota_compra)
    {
        request()->validate([
            'costo' => 'required|numeric',
            'cantidad' => 'required|integer',
            'importe' => 'required|numeric',
            'fechaentrada' =>'required|date',
            'id_proveedor' => 'required|exists:proveedores,id',
            'id_producto' => 'required|exists:productos,id',
            'id_inventario' => 'required|exists:inventarios,id',
        ]);

        Nota_compra::update($request->all());

        return redirect()->route('nota-compra.index')->with('info', 'Nota compra actualizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NotaCompra $nota_compra)
    {
        $nota_compra->delete();
        return redirect()->route('nota-compra.index')->with('info', 'Nota compra eliminada');
    }
}
