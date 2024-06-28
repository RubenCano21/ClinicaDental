<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\PlanPago;
use Illuminate\Http\Request;

class PlanPagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $planPagos = PlanPago::all();
        return view('planPagos.index', compact('planPagos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('planPagos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
        ]);

        PlanPago::create($request->all());

        return redirect()->route('planPagos.index')
            ->with('success', 'Plan de pago creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $planPago = PlanPago::find($id);
        return view('planPagos.show', compact('planPago'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $planPago = PlanPago::find($id);
        return view('planPagos.edit', compact('planPago'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
        ]);

        $planPago = PlanPago::find($id);
        $planPago->update($request->all());

        return redirect()->route('planPagos.index')
            ->with('success', 'Plan de pago actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        PlanPago::find($id)->delete();

        return redirect()->route('planPagos.index')
            ->with('success', 'Plan de pago eliminado exitosamente.');
    }

    /**
     * Confirm delete the specified resource from storage.
     */
    public function confirmDelete($id)
    {
        $planPago = PlanPago::find($id);
        return view('planPagos.confirmDelete', compact('planPago'));
    }
}
