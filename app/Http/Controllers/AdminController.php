<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
use App\Models\Doctor;
use App\Models\Event;
use App\Models\Horario;
use App\Models\Paciente;
use App\Models\Secretaria;
use App\Models\User;
use Illuminate\Console\Scheduling\Event as SchedulingEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event as FacadesEvent;

class AdminController extends Controller
{
    public function index() {
        $total_usuarios = User::count();
        $total_secretarias = Secretaria::count();
        $total_pacientes = Paciente::count();
        $total_doctores = Doctor::count();
        $total_consultorios = Consultorio::count();
        $total_horarios = Horario::count();

        $consultorios = Consultorio::all();
        $doctores = Doctor::all();
        $eventos = Event::all();

        return view('admin.index', compact('total_usuarios',
         'total_secretarias',
          'total_pacientes',
          'total_doctores',
          'total_consultorios',
          'total_horarios',
          'consultorios',
          'doctores',
          'eventos'
        ));
    }

    public function ver_reservas($id){
        $eventos = Event::where('user_id', $id)->get();
        return view('admin.ver_reservas', compact('eventos'));
    }
}
