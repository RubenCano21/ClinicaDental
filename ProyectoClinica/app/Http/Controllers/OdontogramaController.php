<?php

namespace App\Http\Controllers;

use App\Models\Odontograma;
use Illuminate\Http\Request;

class OdontogramaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:ver odontograma')->only('index');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.odontograma.index');
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
    public function show(Odontograma $odontograma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Odontograma $odontograma)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Odontograma $odontograma)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Odontograma $odontograma)
    {
        //
    }
}
