<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\tipoPago;
use Illuminate\Http\Request;

class TipoPagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipoPagos = TipoPago::all();
        return view('tipoPagos.index', compact('tipoPagos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tipoPagos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
        ]);

        TipoPago::create($request->all());

        return redirect()->route('tipoPagos.index')
            ->with('success', 'Tipo de pago creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $tipoPago = TipoPago::find($id);
        return view('tipoPagos.show', compact('tipoPago'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tipoPago = TipoPago::find($id);
        return view('tipoPagos.edit', compact('tipoPago'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
        ]);

        $tipoPago = TipoPago::find($id);
        $tipoPago->update($request->all());

        return redirect()->route('tipoPagos.index')
            ->with('success', 'Tipo de pago actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        TipoPago::find($id)->delete();

        return redirect()->route('tipoPagos.index')
            ->with('success', 'Tipo de pago eliminado exitosamente.');
    }
    /**
     * Confirm delete the specified resource from storage.
     */
    public function confirmDelete($id)
    {
        $tipoPago = TipoPago::find($id);
        return view('tipoPagos.confirmDelete', compact('tipoPago'));
    }
}
