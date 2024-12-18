
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema de reserva de citas</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
<script data-cfasync="false" nonce="d20dd05d-4b89-450c-874f-936fca07e168">try{(function(w,d){!function(df,dg,dh,di){if(df.zaraz)console.error("zaraz is loaded twice");else{df[dh]=df[dh]||{};df[dh].executed=[];df.zaraz={deferred:[],listeners:[]};df.zaraz._v="5847";df.zaraz._n="d20dd05d-4b89-450c-874f-936fca07e168";df.zaraz.q=[];df.zaraz._f=function(dj){return async function(){var dk=Array.prototype.slice.call(arguments);df.zaraz.q.push({m:dj,a:dk})}};for(const dl of["track","set","debug"])df.zaraz[dl]=df.zaraz._f(dl);df.zaraz.init=()=>{var dm=dg.getElementsByTagName(di)[0],dn=dg.createElement(di),dp=dg.getElementsByTagName("title")[0];dp&&(df[dh].t=dg.getElementsByTagName("title")[0].text);df[dh].x=Math.random();df[dh].w=df.screen.width;df[dh].h=df.screen.height;df[dh].j=df.innerHeight;df[dh].e=df.innerWidth;df[dh].l=df.location.href;df[dh].r=dg.referrer;df[dh].k=df.screen.colorDepth;df[dh].n=dg.characterSet;df[dh].o=(new Date).getTimezoneOffset();if(df.dataLayer)for(const dq of Object.entries(Object.entries(dataLayer).reduce(((dr,ds)=>({...dr[1],...ds[1]})),{})))zaraz.set(dq[0],dq[1],{scope:"page"});df[dh].q=[];for(;df.zaraz.q.length;){const dt=df.zaraz.q.shift();df[dh].q.push(dt)}dn.defer=!0;for(const du of[localStorage,sessionStorage])Object.keys(du||{}).filter((dw=>dw.startsWith("_zaraz_"))).forEach((dv=>{try{df[dh]["z_"+dv.slice(7)]=JSON.parse(du.getItem(dv))}catch{df[dh]["z_"+dv.slice(7)]=du.getItem(dv)}}));dn.referrerPolicy="origin";dn.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(df[dh])));dm.parentNode.insertBefore(dn,dm)};["complete","interactive"].includes(dg.readyState)?zaraz.init():df.addEventListener("DOMContentLoaded",zaraz.init)}}(w,d,"zarazData","script");window.zaraz._p=async cY=>new Promise((cZ=>{if(cY){cY.e&&cY.e.forEach((c$=>{try{const da=d.querySelector("script[nonce]"),db=da?.nonce||da?.getAttribute("nonce"),dc=d.createElement("script");db&&(dc.nonce=db);dc.innerHTML=c$;dc.onload=()=>{d.head.removeChild(dc)};d.head.appendChild(dc)}catch(dd){console.error(`Error executing script: ${c$}\n`,dd)}}));Promise.allSettled((cY.f||[]).map((de=>fetch(de[0],de[1]))))}cZ()}));zaraz._p({"e":["(function(w,d){})(window,document)"]});})(window,document)}catch(e){throw fetch("/cdn-cgi/zaraz/t"),e;};</script></head>
<body class="hold-transition login-page" style="background-image: url('{{url('assets/img/hero-bg.jpg')}}');
background-repeat: no-repeat;
background-size: 100vw 100vh;
background-attachment: fixed">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="" class="h1"><b>Tu cita Profesional</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Inicio de Sesion</p>

      <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Correo: </label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>

      <!-- /.social-auth-links -->
      <p class="mb-0">
        <a href="{{url('/register')}}" class="text-center">No tienes una cuenta?</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
</body>
</html>
