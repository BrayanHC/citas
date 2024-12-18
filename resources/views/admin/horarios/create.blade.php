@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Registro de nuevo Horario</h1>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Llenar los datos</h3>
                  </div>
                  <div class="card-body row">
                    <div class="col-md-3">
                        <form action="{{url('/admin/horarios/create')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form group">
                                        <label for="">Doctores</label> <b>*</b>
                                        <select name="doctor_id" id="" class="form-control">
                                            @foreach($doctores as $doctore)
                                            <option value="{{$doctore->id}}">{{$doctore->nombres." ". $doctore->apellidos."-".$doctore->especialidad}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form group">
                                        <label for="">Consultorios</label> <b>*</b>
                                        <select name="consultorio_id" id="consultorio_select" class="form-control">
                                            <option value="" >Seleccionar consultorio</option>
                                            @foreach($consultorios as $consultorio)
                                            <option value="{{$consultorio->id}}">{{$consultorio->nombre." - ". $consultorio->ubicacion}}</option>
                                            @endforeach
                                        </select>
                                        <script>
                                            $('#consultorio_select').on('change',function(){
                                                var consultorio_id =  $('#consultorio_select').val();
                                                //alert(consultorio_id);
                                                var url = "{{route('admin.horarios.cargar_datos_consultorios',':id')}}";
                                                url = url.replace(':id', consultorio_id);
                                                if(consultorio_id){
                                                    $.ajax({
                                                        url: url,
                                                        type: 'GET',
                                                        success:function (data){
                                                            $('#consultorio_info').html(data);
                                                        },
                                                        error: function (){
                                                            alert('Error al obtener los datos del consultorio');
                                                        }
                                                    });
                                                }else{
                                                    $('#consultorio_info').html('');
                                                }
                                            });
                                        </script>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form group">
                                        <label for="">Dia</label> <b>*</b>
                                        <select name="dia" id="" class="form-control">
                                            <option value="LUNES">LUNES</option>
                                            <option value="MARTES">MARTES</option>
                                            <option value="MIERCOLES">MIERCOLES</option>
                                            <option value="JUEVES">JUEVES</option>
                                            <option value="VIERNES">VIERNES</option>
                                            <option value="SABADO">SABADO</option>
                                            <option value="DOMINGO">DOMINGO</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form group">
                                        <label for="">Hora inicio</label> <b>*</b>
                                        <input type="time" value="{{old('hora_inicio')}}" name="hora_inicio" class="form-control" required>
                                        @error('hora_inicio')
                                        <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form group">
                                        <label for="">Hora Final</label> <b>*</b>
                                        <input type="time" value="{{old('hora_fin')}}" name="hora_fin" class="form-control" required>
                                        @error('hora_fin')
                                        <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                
                            </div>
                            <hr>
                            
                            
                            <hr>
                
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form group">
                                        <a href="{{url('admin/horarios')}}" class="btn btn-secondary">Cancelar</a>
                                        <button type="submit" class="btn btn-primary">Registrar nuevo</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-9">
                        <div id="consultorio_info">

                        </div>
                    </div>
                  </div>
                  <div class="card-body row" style="display: block;">
                    

                  </div>
            </div>
        </div>
        
    </div>
    
@endsection