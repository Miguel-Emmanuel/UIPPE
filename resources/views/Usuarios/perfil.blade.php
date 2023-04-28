@extends('layout.navbar')
@section('content')
<?php
$session_id = session('session_id');
$session_name = session('session_name');
$session_tipo = session('session_tipo');
$session_foto = session('session_foto');
$session_gen = session('genero');
$session_email = session('email');
$session_aca = session('academico');
$session_fn = session('fn');
$session_area = session('session_area');

?>
@if($session_id)
<div class="container p-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard">Inicio</a></li>
            <li class="breadcrumb-item" aria-current="page">Perfíl</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-12 col-sm-12 p-4">
            <h2>Información de la cuenta</h2>
        </div>
    </div>
    <div class="row bg-light rounded-3 shadow-lg">
        <div class="col-lg-10 col-sm-12 p-2 m-4 ">
            <h4>Perfíl</h4>
        </div>
        <hr style="margin-top: 0%;">
        <div class="col-lg-3 col-sm-12 d-flex justify-content-center">
            <img src="{{ asset('img/post/'.$session_foto) }}" alt="img" style="width: 150px; height: 150px;">
        </div>
        <div class="col-lg-6 col-sm-12 table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <td class="text-center text-secondary"><strong>
                                <h4>Correo:</h4>
                            </strong></td>
                        <td><strong>{{ $session_email }}</strong></td>
                    </tr>
                    <tr>
                        <td class="text-center text-secondary"><strong>
                                <h4>Nombre:</h4>
                            </strong></td>
                        <td><strong>{{ $session_name }}</strong></td>
                    </tr>
                    <tr>
                        <td class="text-center text-secondary"><strong>
                                <h4>Genero:</h4>
                            </strong></td>
                        <td><strong>@if($session_gen == "F") Femenino @elseif($session_gen == "M") Masculino @else ... @endif</strong></td>
                    </tr>
                    <tr>
                        <td class="text-center text-secondary"><strong>
                                <h5>Fecha de nacimiento:</h5>
                            </strong></td>
                        <td><strong>{{ $session_fn }}</strong></td>
                    </tr>
                    <tr>
                        <td class="text-center text-secondary"><strong>
                                <h4>Academico:</h4>
                            </strong></td>
                        <td><strong>{{ $session_aca }}</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-lg-3 col-sm-12 text-center py-3">
            <a href="EditarPerfil" type="text" class="btn btn-primary">Editar</a>
        </div>
    </div>
</div>
@else
<div class="container p-4">
    <div class="row">
        <div class="col p-4">
            <h3>Perfíl</h3>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 py-3 text-center">
            <img src="{{ asset('img/login.png') }}" alt="Inicie Sesión para poder ver el contenido" class="img-fluid" style="width: 800px;">
            <p>Para ver el contenido <a href="/login">Iniciar Sesión</a></p>
        </div>
    </div>
</div>
@endif