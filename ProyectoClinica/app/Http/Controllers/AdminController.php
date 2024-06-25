<?php

namespace App\Http\Controllers;

use App\Models\Odontologo;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        /*$totalUsuarios = User::count();
        $totalSecretarias = Odontologo::count();
        $totalPacientes = Paciente::count();
        $totalConsultorios = Consultorio::count();
        return view('admin.index', compact('totalUsuarios',
            'totalSecretarias', 'totalPacientes', 'totalConsultorios'));*/
    }
}
