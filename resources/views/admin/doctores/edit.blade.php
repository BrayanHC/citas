@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Doctor/a: {{$doctor->nombres." ".$doctor->apellidos}}</h1>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-success">
                  <div class="card-header">
                    <h3 class="card-title">Llenar los datos</h3>
                  </div>
                  <div class="card-body" style="display: block;">
                    <form action="{{url('/admin/doctores',$doctor->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Nombres del Doctor/a</label> <b>*</b>
                                    <input type="text" value="{{$doctor->nombres}}" name="nombres" class="form-control" required>
                                    @error('nombres')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Apellidos del Doctor/a</label> <b>*</b>
                                    <input type="text" value="{{$doctor->apellidos}}" name="apellidos" class="form-control" required>
                                    @error('apellidos')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Telefono</label> <b>*</b>
                                    <input type="number" value="{{$doctor->telefono}}" name="telefono" class="form-control" required>
                                    @error('telefono')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Licencia medica</label> <b>*</b>
                                    <input type="text" value="{{$doctor->licencia_medica}}" name="licencia_medica" class="form-control" required>
                                    @error('licencia_medica')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Especialidad</label> <b>*</b>
                                    <input type="text" value="{{$doctor->especialidad}}" name="especialidad" class="form-control" required>
                                    @error('especialidad')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Email</label> <b>*</b>
                                    <input type="email" value="{{$doctor->user->email}}" name="email" class="form-control" required>
                                    @error('email')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Contraseña</label> <b>*</b>
                                    <input type="password" value="{{old('password')}}" name="password" class="form-control" required>
                                    @error('password')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Verificacion de Contraseña</label>
                                    <input type="password" name="password_confirmation" class="form-control" required>
                                    @error('password_confirmation')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
            
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('admin/doctores')}}" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-success">Actualizar datos</button>
                                </div>
                            </div>
                        </div>
                    </form>
                  </div>
            </div>
        </div>
    </div>
    
@endsection