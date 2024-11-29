@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Consultorio: {{$consultorio->nombre}}</h1>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-danger">
                  <div class="card-header">
                    <h3 class="card-title">Quiere Eliminar este consultorio?</h3>
                  </div>
                  <div class="card-body" style="display: block;">
                    <form action="{{url('/admin/consultorios', $consultorio->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Nombre del consultorio</label>
                                    <p>{{$consultorio->nombre}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Ubicacion</label>
                                    <p>{{$consultorio->ubicacion}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Capacidad</label>
                                    <p>{{$consultorio->capacidad}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Telefono</label>
                                    <p>{{$consultorio->telefono}}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Especialidad</label> <b>*</b>
                                    <p>{{$consultorio->telefono}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Estado</label>
                                    <p>{{$consultorio->estado}}</p>
                                </div>
                            </div>
                            
                        </div>
                        

                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('admin/consultorios')}}" class="btn btn-secondary">Volver</a>
                                    <button type="submit" class="btn btn-danger">Eliminar consultorio</button>
                                </div>
                            </div>
                        </div>
                    </form>
                  </div>
            </div>
        </div>
    </div>
    
@endsection