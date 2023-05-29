@extends('layout.navbar')
@section('content')

<?php
$session_id = session('session_id');
$session_name = session('session_name');
$session_tipo = session('session_tipo');
$session_area = session('session_area');
?>
<title>UIPPE</title>
@if($session_id)
<div class="container p-4">
    <div class="row justify-content-md-center">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 py-3">
            <h1>Inicio</h1>
            @if($session_id)
            <?php
            echo '¡Bienvenido! <b>    ' . $session_name . '</b><br>';
            ?>
            @else
            @endif
        </div>
        @if($session_area != "")
        <div class="col-xl-6 col-md-12 mb-4 py-2">
            <div class="card text-bg-light border-left-primary shadow h-100 rounded-4">
                <div class="card-body">
                    <a href="registros">
                        <div class="row no-gutters align-items-center" style="color: yellowgreen;">
                            <div class="col-12 text-center py-5">
                                <i class='bx bxs-note bx-lg'></i>
                            </div>
                            <div class="col-12 text-center">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">
                                    <h3>Registros</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        @else
        @endif
        <div class="col-xl-6 col-md-12 mb-4 py-2">
            <div class="card text-bg-light border-left-primary shadow h-100 rounded-4">
                <div class="card-body">
                    <a href="graficos">
                        <div class="row no-gutters align-items-center" style="color: crimson;">
                            <div class="col-12 text-center py-5">
                                <i class='bx bx-signal-4 bx-lg'></i>
                            </div>
                            <div class="col-12 text-center">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">
                                    <h3>Reportes</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        @if($session_tipo == 1 || $session_tipo == 2)
        <div class="col-xl-6 col-md-6 mb-4 py-2">
                <div class="card text-bg-light border-left-primary shadow h-100 rounded-4">
                    <div class="card-body">
                        <a href="correo">
                            <div class="row no-gutters align-items-center" style="color: cadetblue;">
                                <div class="col-12 text-center py-5">
                                <i class='bx bx-envelope bx-lg'></i>
                                </div>
                                <div class="col-12 text-center">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1">
                                        <h3>Correo</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        @endif
        @if($session_area != "")
            <div class="col-xl-6 col-md-6 mb-4 py-2">
                <div class="card text-bg-light border-left-primary shadow h-100 rounded-4">
                    <div class="card-body">
                        <a href="calendario">
                            <div class="row no-gutters align-items-center" style="color: coral;">
                                <div class="col-12 text-center py-5">
                                    <i class='bx bx-calendar bx-lg'></i>
                                </div>
                                <div class="col-12 text-center">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1">
                                        <h3>Calendario</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        @endif
        <div class="col-xl-6 col-md-6 mb-4 py-2">
            <div class="card text-bg-light border-left-primary shadow h-100 rounded-4">
                <div class="card-body">
                    <a href="perfil">
                        <div class="row no-gutters align-items-center" style="color: cornflowerblue;">
                            <div class="col-12 text-center py-5">
                                <i class='bx bx-user bx-lg'></i>
                            </div>
                            <div class="col-12 text-center">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">
                                    <h3>Perfíl</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="container p-4">
    <div class="row">
        <div class="col p-4">
            <h3>Inicio</h3>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 py-3 text-center">
            <img src="{{ asset('img/login.png') }}" alt="Inicie Sesión para poder ver el contenido" class="img-fluid" style="width: 800px;">
            <p>Para ver el contenido <a href="/login">Iniciar Sesión</a></p>
        </div>
    </div>
</div>
@endif
