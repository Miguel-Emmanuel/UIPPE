@extends('layout.navbar')
@section('dataTablesCss')
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
@endsection
@section('content')
<?php
$session_id = session('session_id');
$session_name = session('session_name');
$session_tipo = session('session_tipo');
$session_area = session('session_area');
?>
<title>Calendario</title>
@if($session_id)
@if($session_area != "")

<div class="container p-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard">Inicio</a></li>
            <li class="breadcrumb-item" aria-current="page">Calendario</li>
        </ol>
    </nav>
    
    <div class="row">
        <div class="col-12 p-4">
            <h3>Calendario Meta</h3>
        </div>
            <div class="col-xs-4 col-md-4 col-xl-4 d-flex">
                <i class='bx bxs-rectangle mx-3 my-1' style="color: #8b67cc;"></i>
                <p>Registro en meses mayor a la cantidad</p>
            </div>
            <div class="col-xs-4 col-md-4 col-xl-4 d-flex">
                <i class='bx bxs-rectangle text-success mx-3 my-1'></i>
                <p>Meta completada</p>
            </div>
        <!-- Tabla de metas completadas -->
        <div class="col-xs-4 col-md-4 col-xl-4 d-flex">
            <i class='bx bxs-rectangle text-warning mx-3 my-1'></i>
            <p>Meta por completar</p>
        </div>
        <div class="col-xs-4 col-md-4 col-xl-4 d-flex">
            <i class='bx bxs-rectangle text-danger mx-3 my-1'></i>
            <p>Meta sin registro eficiente</p>
        </div>
        <!-- Tabla de metas por completar -->
    </div>
</div>

@else
<div class="container p-4">
    <div class="row">
        <div class="col p-4">
            <h3>Entrega Metas</h3>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 py-3 text-center">
            <img src="{{ asset('img/login.png') }}" alt="Inicie Sesión para poder ver el contenido" class="img-fluid" style="width: 800px;">
            <p>Para ver el contenido debe tener un área asignada</p>
        </div>
    </div>
</div>
@endif
@else
<div class="container p-4">
    <div class="row">
        <div class="col p-4">
            <h3>Entrega Metas</h3>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 py-3 text-center">
            <img src="{{ asset('img/login.png') }}" alt="Inicie Sesión para poder ver el contenido" class="img-fluid" style="width: 800px;">
            <p>Para ver el contenido <a href="/login">Iniciar Sesión</a></p>
        </div>
    </div>
</div>
@endif