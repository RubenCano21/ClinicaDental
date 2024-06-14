<?php

namespace App\Http\Controllers;

use App\Models\Odontologo;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalUsuarios = User::count();
        $totalOdontologos = Odontologo::count();
        return view('home', compact('totalUsuarios', 'totalOdontologos'));
    }

   /* public function servicio(){
        return view('home.servicio');
    }

    public function contacto(){
        return view('home.contacto');
    }

    public function acercaDe(){
        return view('home.acercaDe');
    }*/
}
