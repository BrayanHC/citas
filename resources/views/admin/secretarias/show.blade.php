@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Secretaria: {{$secretaria->nombres}} {{$secretaria->apellidos}}</h1>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-info">
                  <div class="card-header">
                    <h3 class="card-title">Datos registrados</h3>
                  </div>
                  <div class="card-body" style="display: block;">
                
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Nombres del Secretario/a</label>
                                    <p>{{$secretaria->nombres}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Apellidos del Secretario/a</label>
                                    <p>{{$secretaria->apellidos}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Telefono</label>
                                    <p>{{$secretaria->celular}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">CI</label>
                                    <p>{{$secretaria->ci}}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Fecha de Nacimiento</label>
                                    <p>{{$secretaria->fecha_nacimiento}}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Direccion</label>
                                    <p>{{$secretaria->direccion}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Email</label>
                                    <p>{{$secretaria->user->email}}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
            
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('admin/secretarias')}}" class="btn btn-secondary">Volver</a>
                                </div>
                            </div>
                        </div>
                  </div>
            </div>
        </div>
    </div>
    
@endsection