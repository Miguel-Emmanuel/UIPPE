@extends('layout.navbar')
@section('content')
<?php
$session_id = session('session_id');
$session_name = session('session_name');
$session_tipo = session('session_tipo');
?>
<title>Home</title>
<div class="container p-4">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 py-3">
            <h1>Inicio</h1>
            @if($session_id)
            <?php
            echo '¡Bienvenido! <b>    ' . $session_name . '</b><br>';
            ?>
            @else
            @endif
        </div>
        @if($session_id) <!-- Contenido para verificar sesión iniciada -->
        @if($session_tipo == 1 || $session_tipo == 2 || $session_tipo == 3) <!-- Contenido dependiendo del tipo de usuario -->
        <div class="col-md-12">
            <nav>
                <div class="nav nav-pills nav-fill" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true" style="background-color: #0097A7; color: white;">#1 Áreas</button>
                    <button class="nav-link" id="nav-registroUsuarios-tab" data-bs-toggle="tab" data-bs-target="#nav-registroUsuarios" type="button" role="tab" aria-controls="nav-contact" aria-selected="false" style="background-color: #fd7e14; color: white;">#2 Usuarios</button>
                    <button class="nav-link" id="nav-Metas-tab" data-bs-toggle="tab" data-bs-target="#nav-Metas" type="button" role="tab" aria-controls="nav-contact" aria-selected="false" style="background-color: #027333; color: white;">#3 Metas</button>
                    <!-- <button class="nav-link" id="nav-disabled-tab" data-bs-toggle="tab" data-bs-target="#nav-disabled" type="button" role="tab" aria-controls="nav-disabled" aria-selected="false" disabled>Disabled</button> -->
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                    <div class="container">
                        <div class="row justify-content-md-center mb-5">
                            <div class="col-12 text-center">
                                <br><br>
                                <h3 style="color: black;">Registro Áreas</h3>
                            </div>
                            <div class="col-12 py-2 text-center">
                                <p style="color: black;">Se requiere tener registros en "Áreas" para poder continuar con los demas registros de datos.</p>
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
                                <p style="color: black;">Se requiere tener registros en "Tipos Usuarios" para poder realizar registros en "Usuarios" y poder continuar con los demas registros de datos.</p>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card text-bg-light border-left-primary shadow h-100 py-2 rounded-4">
                                    <div class="card-body">
                                        <a href="tipos">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #fd7e14;">
                                                        Tipos Usuarios
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
                                <p style="color: black;">Se requiere tener registros en "Programas" para poder realizar registros en "Metas" y poder continuar con los demas registros de datos.</p>
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
                                        <a href="areas">
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
                    <p style="color: black;">Se requiere tener registros en "Programas" para poder realizar registros en "Metas" y poder continuar con los demas registros de datos.</p>
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
            <p>Para ver el contenido <a href="/login">Iniciar Sesión</a></p>
        </div>
        @endif
    </div>
</div>
@endsection
