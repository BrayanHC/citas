<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
use App\Models\Paciente;
use App\Models\Secretaria;
use App\Models\User;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $total_usuarios = User::count();
        $total_secretarias = Secretaria::count();
        $total_pacientes = Paciente::count();
        $total_consultorios = Consultorio::count();
        return view('admin.index', compact('total_usuarios', 'total_secretarias', 'total_pacientes','total_consultorios'));
    }
}
