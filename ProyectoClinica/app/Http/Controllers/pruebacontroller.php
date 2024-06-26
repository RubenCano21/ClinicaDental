<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
use Illuminate\Http\Request;

class pruebaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grupo = Especialidad::all();
        return view("myspace", compact('grupo'));
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
  
}
