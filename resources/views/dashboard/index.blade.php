@extends('layout.navbar')
@section('content')
<?php
$session_id = session('session_id');
$session_name = session('session_name');
$session_tipo = session('session_tipo');
?>
<title>UIPPE</title>
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
        <div class="col-xl-6 col-md-12 mb-4 py-2">
            <div class="card text-bg-light border-left-primary shadow h-100 rounded-4">
                <div class="card-body">
                    <a href="registros">
                        <div class="row no-gutters align-items-center" style="color: crimson;">
                            <div class="col-12 text-center py-5">
                                <i class='bx bx-signal-4 bx-lg'></i>
                            </div>
                            <div class="col-12 text-center">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">
                                    <h3>Gráficas</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-6 mb-4 py-2">
            <div class="card text-bg-light border-left-primary shadow h-100 rounded-4">
                <div class="card-body">
                    <a href="#">
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