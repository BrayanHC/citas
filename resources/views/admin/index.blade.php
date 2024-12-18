@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1><b>Bienvenido</b> {{Auth::user()->email}} / <b>Rol:</b> {{Auth::user()->roles->pluck('name')->first()}}</h1>
    </div>
    <hr>
    <div class="row">

        @can('admin.usuarios.index')
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$total_usuarios}}</h3>

              <p>Usuarios</p>
            </div>
            <div class="icon">
              <i class="fas bi bi-file-person"></i>
            </div>
            <a href="{{url('admin/usuarios')}}" class="small-box-footer">Mas informacion<i class="fas bi bi-file-person"></i></a>
          </div>
        </div>
        @endcan

        @can('admin.secretarias.index')
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
              <h3>{{$total_secretarias}}</h3>

              <p>Secretarias</p>
            </div>
            <div class="icon">
              <i class="fas bi bi-person-circle"></i>
            </div>
            <a href="{{url('admin/secretarias')}}" class="small-box-footer">Mas informacion<i class="fas bi bi-file-person"></i></a>
          </div>
        </div>    
        @endcan
        
        @can('admin.pacientes.index')
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{$total_pacientes}}</h3>

              <p>Pacientes</p>
            </div>
            <div class="icon">
              <i class="fas bi bi-person-fill-check"></i>
            </div>
            <a href="{{url('admin/pacientes')}}" class="small-box-footer">Mas informacion<i class="fas bi bi-file-person"></i></a>
          </div>
        </div>
        @endcan
          
        @can('admin.consultorios.index')
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{$total_consultorios}}</h3>

              <p>Consultorios</p>
            </div>
            <div class="icon">
              <i class="fas bi bi-building-fill-add"></i>
            </div>
            <a href="{{url('admin/consultorios')}}" class="small-box-footer">Mas informacion<i class="fas bi bi-file-person"></i></a>
          </div>
        </div>
        @endcan
          
        @can('admin.doctores.index')
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-white">
            <div class="inner">
              <h3>{{$total_doctores}}</h3>
              <p>Doctores</p>
            </div>
            <div class="icon">
              <i class="fas bi bi-heart-pulse-fill"></i>
            </div>
            <a href="{{url('admin/doctores')}}" class="small-box-footer">Mas informacion<i class="fas bi bi-file-person"></i></a>
          </div>
        </div>
        @endcan
          
        @can('admin.horarios.index',)
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-secondary">
            <div class="inner">
              <h3>{{$total_horarios}}</h3>

              <p>Horarios</p>
            </div>
            <div class="icon">
              <i class="fas bi bi-calendar2-week"></i>
            </div>
            <a href="{{url('admin/horarios')}}" class="small-box-footer">Mas informacion<i class="fas bi bi-file-person"></i></a>
          </div>
        </div>
        @endcan

        
          
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Calendario de atencion</h3>
                
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form group">
                        <label for="">Consultorios</label>
                        <select name="consultorio_id" id="consultorio_select" class="form-control">
                            @foreach ($consultorios as $consultorio)
                                <option value="{{$consultorio->id}}">{{$consultorio->nombre." - ".$consultorio->ubicacion}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <script>
                    $('#consultorio_select').on('change',function(){
                        var consultorio_id =  $('#consultorio_select').val();
                        //alert(consultorio_id);
                        /*var url = "{{route('admin.horarios.cargar_datos_consultorios',':id')}}";
                        url = url.replace(':id', consultorio_id);*/
                        if(consultorio_id){
                            $.ajax({
                                url: "{{url('/consultorios/')}}" + '/' + consultorio_id,
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
                <div id="consultorio_info">

                </div>
                <hr>
                
            </div>
        </div>
    </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="card card-outline card-warning">
            <div class="card-header">
                <h3 class="card-title">Calendario de Reserva de citas</h3>
                
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form group">
                        <label for="">Consultorios</label>
                        <select name="consultorio_id" id="consultorio_select" class="form-control">
                            @foreach ($consultorios as $consultorio)
                                <option value="{{$consultorio->id}}">{{$consultorio->nombre." - ".$consultorio->ubicacion}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
            </div>
            <div class="card-body">
              <div class="row">
                <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Registrar cita medica
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reserva de cita medica</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="forn-grop">
              <label for="">Doctor</label>
              <select name="" id="" class="form-control">
                @foreach ($doctores as $doctore)
                    <option value="{{$doctore->id}}">{{$doctore->nombres." ".$doctore->apellidos." - ".$doctore->especialidad}}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="col-md-12">
            <div class="forn-grop">
              <label for="">Fecha de reserva</label>
              <input type="date" class="form-control">
            </div>
          </div>

          <div class="col-md-12">
            <div class="forn-grop">
              <label for="">Hora de reserva</label>
              <input type="time" class="form-control">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Registrar</button>
      </div>
    </div>
  </div>
</div>
              </div>
              <div id='calendar'></div>
            </div>
        </div>
    </div>
    </div>

    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          locale: 'es',
          events: [{
            title: 'Consultorio Odontologia',
            start: '2024-12-18',
            end: '2024-12-20',
            color: '#a9200e',
          }]
        });
        calendar.render();
      });

    </script>
@endsection