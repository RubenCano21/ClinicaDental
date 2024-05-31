<?php

namespace App\Http\Controllers;

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
        return view('home');
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
