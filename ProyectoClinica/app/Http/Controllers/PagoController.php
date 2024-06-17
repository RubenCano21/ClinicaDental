<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pagos = Pago::with('user')->get();
        return view('pagos.index', compact('pagos'));
    }

    public function create()
    {
        return view('pagos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'payment_methods' => 'required|array',
            'payment_methods.*.method' => 'required|string',
            'payment_methods.*.details' => 'nullable|array',
            'payment_date' => 'required|date',
            'status' => 'required|string',
        ]);

        Pago::create([
            'user_id' => auth()->id(),
            'amount' => $request->amount,
            'payment_methods' => $request->payment_methods,
            'payment_date' => $request->payment_date,
            'status' => $request->status,
        ]);

        return redirect()->route('pagos.index')->with('success', 'Pago registrado exitosamente');
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
            'amount' => 'required|numeric',
            'payment_methods' => 'required|array',
            'payment_methods.*.method' => 'required|string',
            'payment_methods.*.details' => 'nullable|array',
            'payment_date' => 'required|date',
            'status' => 'required|string',
        ]);

        $pago = Pago::findOrFail($id);
        $pago->update($request->all());

        return redirect()->route('pagos.index')->with('success', 'Pago actualizado exitosamente');
    }

    public function destroy($id)
    {
        $pago = Pago::findOrFail($id);
        $pago->delete();

        return redirect()->route('pagos.index')->with('success', 'Pago eliminado exitosamente');
    }
}
