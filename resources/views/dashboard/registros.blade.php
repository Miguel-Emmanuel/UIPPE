@extends('layout.navbar')
@section('content')

<!-- Variables de Sesiones del usuario START -->
<?php
$session_id = session('session_id');
$session_name = session('session_name');
$session_tipo = session('session_tipo');
$session_area = session('session_area');
?>
<!-- Variables de Sesiones del usuario END -->

@if($session_area == 0) <!-- Condición de acceso al contenido por AREA IF -->
<title>Registros</title>
<div class="container p-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard">Inicio</a></li>
            <li class="breadcrumb-item">Registros</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 py-3">
            <h3 class="text-bold">Registros</h3>
            <p>En este apartado se realiza el registro de datos.</p>
        </div>
        @if($session_id) <!-- Contenido para verificar sesión iniciada -->
        @if($session_tipo == 1 || $session_tipo == 2 || $session_tipo == 3) <!-- Contenido dependiendo del tipo de usuario -->
        <div class="col-md-12">
            <ul class="nav nav-pills nav-fill gap-2 p-1 small rounded-5 shadow-sm" id="pillNav2" role="tablist" style="--bs-nav-link-color: var(--bs-white); --bs-nav-pills-link-active-color: var(--bs-black); --bs-nav-pills-link-active-bg: var(--bs-white); background-color: cadetblue;">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active rounded-5" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">#1 Áreas</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link rounded-5" id="nav-registroUsuarios-tab" data-bs-toggle="tab" data-bs-target="#nav-registroUsuarios" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">#2 Usuarios</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link rounded-5" id="nav-Metas-tab" data-bs-toggle="tab" data-bs-target="#nav-Metas" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">3# Metas</button>
                </li>
            </ul>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                    <div class="container">
                        <div class="row justify-content-md-center mb-5">
                            <div class="col-12 text-center">
                                <br><br>
                                <h3 style="color: black;">Registro Áreas</h3>
                            </div>
                            <div class="col-12 py-2 text-center">
                                <p style="color: black;">Se requiere tener registros en "Áreas" para continuar con el proceso.</p>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card text-bg-light border-left-primary shadow h-100 py-2 rounded-4">
                                    <div class="card-body">
                                        <a href="areas">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-uppercase mb-1 text-cyan-700" style="color: #0097A7;">
                                                        Áreas
                                                    </div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800" style="color: #0097A7;">
                                                        @foreach($areas as $area)
                                                        {{ $area -> areas }}
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="bx bxs-grid-alt fa-2x text-gray-300" style="color: #0097A7;"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-registroUsuarios" role="tabpanel" aria-labelledby="nav-registroUsuarios-tab" tabindex="0">
                    <div class="container">
                        <div class="row justify-content-md-center mb-5">
                            <div class="col-12 text-center">
                                <br><br>
                                <h3 style="color: black;">Registro Usuarios</h3>
                            </div>
                            <div class="col-12 py-2 text-center">
                                <p style="color: black;">Se requiere tener registros en "Roles" y "Usuarios" para continuar con el proceso.</p>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card text-bg-light border-left-primary shadow h-100 py-2 rounded-4">
                                    <div class="card-body">
                                        <a href="tipos">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #fd7e14;">
                                                        Roles
                                                    </div>
                                                    <div class="h5 mb-0 font-weight-bold" style="color: #fd7e14;">
                                                        @foreach($tUsuarios as $tUsuario)
                                                        {{ $tUsuario -> tUsuarios }}
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fa-solid fa-user-group fa-2x text-gray-300" style="color: #fd7e14;"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card text-bg-light border-left-primary shadow h-100 py-2 rounded-4">
                                    <div class="card-body">
                                        <a href="usuarios">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #fd7e14;">
                                                        Usuarios
                                                    </div>
                                                    <div class="h5 mb-0 font-weight-bold" style="color: #fd7e14;">
                                                        @foreach($usuarios as $usuario)
                                                        {{ $usuario -> usuarios }}
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fa-solid fa-user fa-2x text-gray-300" style="color: #fd7e14;"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card text-bg-light border-left-primary shadow h-100 py-2 rounded-4">
                                    <div class="card-body">
                                        <a href="areas-usuarios">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #fd7e14;">
                                                        Áreas | Usuarios
                                                    </div>
                                                    <div class="h5 mb-0 font-weight-bold" style="color: #fd7e14;">
                                                        @foreach($areasusuarios as $areasusuario)
                                                        {{ $areasusuario -> AreasUsuarios }}
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fa-solid fa-people-roof fa-2x" style="color: #fd7e14;"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-Metas" role="tabpanel" aria-labelledby="nav-metas-tab" tabindex="0">
                    <div class="container">
                        <div class="row justify-content-md-center">
                            <div class="col-12 text-center">
                                <br><br>
                                <h3 style="color: black;">Registro Metas</h3>
                            </div>
                            <div class="col-12 py-2 text-center">
                                <p style="color: black;">Se requiere tener registros en "Programas" y "Metas" para continuar con el proceso.</p>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card text-bg-light border-left-primary shadow h-100 py-2 rounded-4">
                                    <div class="card-body">
                                        <a href="programas">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-uppercase text-success mb-1">
                                                        Programas
                                                    </div>
                                                    <div class="h5 mb-0 font-weight-bold text-success">
                                                        @foreach($programas as $programa)
                                                        {{ $programa -> programas }}
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="bx bxs-objects-horizontal-left fa-2x" style="color: #027333;"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card text-bg-light border-left-primary shadow h-100 py-2 rounded-4">
                                    <div class="card-body">
                                        <a href="metas">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-uppercase text-success mb-1">
                                                        Metas
                                                    </div>
                                                    <div class="h5 mb-0 font-weight-bold text-success">
                                                        @foreach($metas as $meta)
                                                        {{ $meta -> metas }}
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fa-solid fa-list-check fa-2x" style="color: #027333;"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card text-bg-light border-left-primary shadow h-100 py-2 rounded-4">
                                    <div class="card-body">
                                        <a href="areasmetas">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-uppercase text-success mb-1">
                                                        Áreas | Metas
                                                    </div>
                                                    <div class="h5 mb-0 font-weight-bold text-success">
                                                        @foreach($areametas as $areameta)
                                                        {{ $areameta -> areametas }}
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class='bx bx-layer fa-2x text-gray-300' style="color: #027333;"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @elseif($session_tipo == 4)
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-12 text-center">
                    <br><br>
                    <h3 style="color: black;">Registro Metas</h3>
                </div>
                <div class="col-12 py-2 text-center">
                    <p style="color: black;">Se requiere tener registros en "Programas" y "Metas" para continuar con el proceso.</p>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card text-bg-light border-left-primary shadow h-100 py-2 rounded-4">
                        <div class="card-body">
                            <a href="programas">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1">
                                            Programas
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold">
                                            @foreach($programas as $programa)
                                            {{ $programa -> programas }}
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="bx bxs-objects-horizontal-left fa-2x" style="color: #027333;"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card text-bg-light border-left-primary shadow h-100 py-2 rounded-4">
                        <div class="card-body">
                            <a href="metas">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1">
                                            Metas
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold">
                                            @foreach($metas as $meta)
                                            {{ $meta -> metas }}
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa-solid fa-list-check fa-2x" style="color: #027333;"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card text-bg-light border-left-primary shadow h-100 py-2 rounded-4">
                        <div class="card-body">
                            <a href="areas">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1">
                                            Áreas | Metas
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold">
                                            @foreach($areametas as $areameta)
                                            {{ $areameta -> areametas }}
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class='bx bx-layer fa-2x text-gray-300' style="color: #027333;"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        @endif
        @else
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 py-3 text-center">
            <img src="{{ asset('img/login.png') }}" alt="Inicie Sesión para poder ver el contenido" class="img-fluid" style="width: 800px;">
            <p>Para ver el contenido <a href="{{ route('login') }}">Iniciar Sesión</a></p>
        </div>
        @endif
    </div>
    @else   <!-- Condición de acceso al contenido AREA ELSE -->
    <script>
    document.addEventListener("DOMContentLoaded", ()=>{
        var url =  window.location.href;
        url = url.charAt(url.length -1);
        var id = "{{ $session_area }}";
        var tipo = "{{ $session_tipo }}";

        if(tipo == "5"){
            window.location.replace("{{ route('dashboard')}}");
        }else if(url != id){
            window.location.replace("{{ route('registrosA', ['id' => $session_area]) }}");
        }
    });
</script>
    @endif
</div>

@endsection
