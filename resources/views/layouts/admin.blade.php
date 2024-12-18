<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TuCita Profesional</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{url('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('dist/css/adminlte.min.css?v=3.2.0')}}">
  <!-- Iconos  -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- jQuery -->
<script src="{{url('plugins/jquery/jquery.min.js')}}"></script>

  <!-- Datatables  -->
  <link rel="stylesheet" href="{{url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <!-- Sweet alert 2-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Calendary-->
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
  <script src="{{url('fullcalendar/es.global.js')}}"></script>

<script data-cfasync="false" nonce="760ab26a-1769-4692-9a05-978f72459e00">try{(function(w,d){!function(cJ,cK,cL,cM){if(cJ.zaraz)console.error("zaraz is loaded twice");else{cJ[cL]=cJ[cL]||{};cJ[cL].executed=[];cJ.zaraz={deferred:[],listeners:[]};cJ.zaraz._v="5815";cJ.zaraz._n="760ab26a-1769-4692-9a05-978f72459e00";cJ.zaraz.q=[];cJ.zaraz._f=function(cN){return async function(){var cO=Array.prototype.slice.call(arguments);cJ.zaraz.q.push({m:cN,a:cO})}};for(const cP of["track","set","debug"])cJ.zaraz[cP]=cJ.zaraz._f(cP);cJ.zaraz.init=()=>{var cQ=cK.getElementsByTagName(cM)[0],cR=cK.createElement(cM),cS=cK.getElementsByTagName("title")[0];cS&&(cJ[cL].t=cK.getElementsByTagName("title")[0].text);cJ[cL].x=Math.random();cJ[cL].w=cJ.screen.width;cJ[cL].h=cJ.screen.height;cJ[cL].j=cJ.innerHeight;cJ[cL].e=cJ.innerWidth;cJ[cL].l=cJ.location.href;cJ[cL].r=cK.referrer;cJ[cL].k=cJ.screen.colorDepth;cJ[cL].n=cK.characterSet;cJ[cL].o=(new Date).getTimezoneOffset();if(cJ.dataLayer)for(const cT of Object.entries(Object.entries(dataLayer).reduce(((cU,cV)=>({...cU[1],...cV[1]})),{})))zaraz.set(cT[0],cT[1],{scope:"page"});cJ[cL].q=[];for(;cJ.zaraz.q.length;){const cW=cJ.zaraz.q.shift();cJ[cL].q.push(cW)}cR.defer=!0;for(const cX of[localStorage,sessionStorage])Object.keys(cX||{}).filter((cZ=>cZ.startsWith("_zaraz_"))).forEach((cY=>{try{cJ[cL]["z_"+cY.slice(7)]=JSON.parse(cX.getItem(cY))}catch{cJ[cL]["z_"+cY.slice(7)]=cX.getItem(cY)}}));cR.referrerPolicy="origin";cR.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(cJ[cL])));cQ.parentNode.insertBefore(cR,cQ)};["complete","interactive"].includes(cK.readyState)?zaraz.init():cJ.addEventListener("DOMContentLoaded",zaraz.init)}}(w,d,"zarazData","script");window.zaraz._p=async bb=>new Promise((bc=>{if(bb){bb.e&&bb.e.forEach((bd=>{try{const be=d.querySelector("script[nonce]"),bf=be?.nonce||be?.getAttribute("nonce"),bg=d.createElement("script");bf&&(bg.nonce=bf);bg.innerHTML=bd;bg.onload=()=>{d.head.removeChild(bg)};d.head.appendChild(bg)}catch(bh){console.error(`Error executing script: ${bd}\n`,bh)}}));Promise.allSettled((bb.f||[]).map((bi=>fetch(bi[0],bi[1]))))}bc()}));zaraz._p({"e":["(function(w,d){})(window,document)"]});})(window,document)}catch(e){throw fetch("/cdn-cgi/zaraz/t"),e;};</script></head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('/admin')}}" class="nav-link">Tus Citas</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{url('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Tu Cita Profesional</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @can('admin.usuarios.index')
          <li class="nav-item">
            <a href="#" class="nav-link active">
            <i class="bi bi-people-fill"></i>
              <p>
                 Usuarios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/usuarios/create')}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Creacion de usuarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/usuarios')}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de usuarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Calendario</p>
                </a>
              </li>
            </ul>
          </li>
          @endcan

          @can('admin.secretarias.index')
          <!--Secretarias-->
          <li class="nav-item">
            <a href="#" class="nav-link active">
            <i class="bi bi-person-circle"></i>
              <p>
                 Secretarias
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/secretarias/create')}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Creacion de Secretarias</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/secretarias')}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de Secretarias</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Calendario</p>
                </a>
              </li>
            </ul>
          </li>
          @endcan
          
          @can('admin.pacientes.index')
          <!--Pacientes-->
          <li class="nav-item">
            <a href="#" class="nav-link active">
            <i class="bi bi-person-fill-check"></i>
              <p>
                 Pacientes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/pacientes/create')}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Creacion de Pacientes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/pacientes')}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de Pacientes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Calendario</p>
                </a>
              </li>
            </ul>
          </li>
          @endcan
          
          @can('admin.consultorios.index')
          <!--Consultorios-->
          <li class="nav-item">
            <a href="#" class="nav-link active">
            <i class="bi bi-building-fill-add"></i>
              <p>
                 Consultorios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/consultorios/create')}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Creacion de Consultorio</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/consultorios')}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de Consultorios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Calendario</p>
                </a>
              </li>
            </ul>
          </li>
          @endcan
          
          @can('admin.doctores.index')
          <!--Doctores-->
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="bi bi-heart-pulse-fill"></i>
              <p>
                 Doctores
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/doctores/create')}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Añadir Doctores</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/doctores')}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lista de Doctores</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Calendario</p>
                </a>
              </li>
            </ul>
          </li>
          @endcan

          @can('admin.horarios.index')
          <!--Horarios-->
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="bi bi-calendar2-week"></i>
              <p>
                 Horarios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/horarios/create')}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Añadir Horarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/horarios')}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lista de Horarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Calendario</p>
                </a>
              </li>
            </ul>
          </li>
          @endcan
          

          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link" style="background-color: red;" id=""
              onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
            >
            <i class="bi bi-door-open"></i>
              <p>
                Cerrar sesion
                
              </p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  @if((($message = Session::get('mensaje')) && ($icono = Session::get('icono') )) )
            <script>
            Swal.fire({
                position: "top-end",
                icon: "{{$icono}}",
                title: "{{$message}}",
                showConfirmButton: false,
                timer: 1500
            });
            </script>
        @endif

  <div class="content-wrapper">
    <br>
    <div class="container">
        @yield('content')    
    </div>
  </div>

  <!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <h5>Configuración</h5>
        <div class="mb-4">
            <input id="darkModeToggle" type="checkbox" value="1" class="mr-1">
            <span>Modo Oscuro</span>
        </div>
    </div>
</aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggle = document.getElementById('darkModeToggle');
        const body = document.body;

        // Aplicar modo oscuro si está guardado en localStorage
        if (localStorage.getItem('darkMode') === 'enabled') {
            body.classList.add('dark-mode');
            toggle.checked = true;
        }

        // Escuchar cambios en el checkbox
        toggle.addEventListener('change', function () {
            if (this.checked) {
                body.classList.add('dark-mode');
                localStorage.setItem('darkMode', 'enabled');
            } else {
                body.classList.remove('dark-mode');
                localStorage.setItem('darkMode', 'disabled');
            }
        });
    });
</script>

<!-- Bootstrap 4 -->
<script src="{{url('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Datatables -->
<script src="{{ url('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ url('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ url('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ url('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ url('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ url('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ url('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ url('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ url('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>


<!-- AdminLTE App -->
<script src="{{url('dist/js/adminlte.min.js?v=3.2.0')}}"></script>
</body>
</html>
