@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Datos del Horario</h1>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-10">
            <div class="card card-outline card-info">
                  <div class="card-header">
                    <h3 class="card-title">Datos registrados</h3>
                  </div>
                  <div class="card-body" style="display: block;">
                    <form action="{{url('/admin/horarios/create')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Dia</label>
                                    <p>{{$horario->dia}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Hora inicio</label>
                                    <p>{{$horario->hora_inicio}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Hora Final</label>
                                    <p>{{$horario->hora_fin}}</p>
                                </div>
                            </div>
                            
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Doctores</label>
                                    <p>{{$horario->doctor->nombres." ".$horario->doctor->apellidos." - ".$horario->doctor->especialidad}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Consultorios</label>
                                    <p>{{$horario->consultorio->nombre." ".$horario->consultorio->ubicacion}}</p>
                                </div>
                            </div>
                            
                        </div>
                        
                        <hr>
            
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('admin/doctores')}}" class="btn btn-secondary">Volver</a>
                                </div>
                            </div>
                        </div>
                    </form>
                  </div>
            </div>
        </div>
    </div>
    
@endsection