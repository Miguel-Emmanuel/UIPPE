@extends('layout.navbar')

@section('content')

<!-- Variables de Sesiones del usuario START -->
<?php
$session_id = session('session_id');
$session_nombre = session('session_nombre');
$session_app = session('session_app');
$session_apm = session('session_apm');
$session_tipo = session('session_tipo');
$session_foto = session('session_foto');
$session_gen = session('genero');
$session_email = session('email');
$session_aca = session('academico');
$session_fn = session('fn');
$session_area = session('session_area');
?>
<!-- Variables de Sesiones del usuario END  -->

@if($session_id)    <!-- Condición de acceso al contenido LOGGEADO IF -->
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
        <div class="col-lg-3 col-sm-12">
            <div class="d-flex justify-content-center">
                <img src="{{ asset('img/post/'.$session_foto) }}" alt="img" style="width: 150px; height: 150px;">
            </div>
            <form action="{{ route('EditPerfil', ['id' => $session_id]) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field('PATCH') }}
                {{ method_field('PUT') }}
                <div class="p-3 d-flex justify-content-center">
                    <input type="file" class="form-control" name="foto">
                </div>
        </div>
        <div class="col-lg-6 col-sm-12 table-responsive">
            <table class="table">
                @include('components.flash_alerts')
                <tbody>
                    <tr>
                        <td class="text-center text-secondary"><strong>
                                <h4>Correo:</h4>
                            </strong></td>
                        <td>
                            <input type="text" class="form-control" value="{{ $session_email }}" name="email">
                            @error('email')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center text-secondary"><strong>
                                <h4 style="margin-top: 25%;">Nombre:</h4>
                            </strong></td>
                        <td class="mb-5">
                            <div class="col">
                                <label for="exampleInputEmail1" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" aria-label="First name" name="nombre" value="{{ $session_nombre }}">
                                @error('nombre')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="exampleInputEmail1" class="form-label">Apellido Paterno:</label>
                                <input type="text" class="form-control" aria-label="Last name" name="app" value="{{ $session_app }}">
                                @error('app')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="exampleInputEmail1" class="form-label">Apellido Materno:</label>
                                <input type="text" class="form-control" aria-label="Last name" name="apm" value="{{ $session_apm }}">
                                @error('apm')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center text-secondary"><strong>
                                <h4>Genero:</h4>
                            </strong></td>
                        <td>
                            @if($session_gen == 'F')
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="genero" id="genero1" value="F" checked>
                                <label class="form-check-label" for="genero1">
                                    Femenino
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="genero" id="genero2" value="M">
                                <label class="form-check-label" for="genero2">
                                    Masculino
                                </label>
                            </div>
                            @elseif($session_gen == 'M')
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="genero" id="genero1" value="F">
                                <label class="form-check-label" for="genero1">
                                    Femenino
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="genero" id="genero2" value="M" checked>
                                <label class="form-check-label" for="genero2">
                                    Masculino
                                </label>
                            </div>
                            @else
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="genero" id="genero1" value="F">
                                <label class="form-check-label" for="genero1">
                                    Femenino
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="genero" id="genero2" value="M">
                                <label class="form-check-label" for="genero2">
                                    Masculino
                                </label>
                            </div>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center text-secondary"><strong>
                                <h5>Fecha de nacimiento:</h5>
                            </strong></td>
                        <td><input type="date" class="form-control" value="{{ $session_fn }}" name="fn"></td>
                    </tr>
                    <tr>
                        <td class="text-center text-secondary"><strong>
                                <h4>Academico:</h4>
                            </strong></td>
                        <td><input type="text" class="form-control" value="{{ $session_aca }}" name="academico">
                            @error('academico')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-lg-3 col-sm-12 text-center py-3">
            <button type="submit" class="btn btn-success">Editar</button>
            <a href="perfil" type="text" class="btn btn-secondary">Cancelar</a>
        </div>
        </form>
    </div>
</div>
@else       <!-- Condición de acceso al contenido LOGGEADO ELSE -->
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