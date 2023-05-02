@extends('layout.navbar')
@section('content')
<?php
$session_id = session('session_id');
$session_name = session('session_name');
$session_tipo = session('session_tipo');
$session_area = session('session_area');
?>
<title>Calendario</title>
@if($session_id)

<div class="container p-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard">Inicio</a></li>
            <li class="breadcrumb-item" aria-current="page">Calendario</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col p-4">
            <h3>Calendario Meta</h3>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <!-- Campos en tabla metas -->
                    <tr>
                        <th class="text-center">Clave</th>
                        <th>Programa</th>
                        <th>Meta</th>
                        <th class="text-center">Cantidad</th>
                        <th class="text-center" colspan="3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Regitros en tabla metas -->
                    @foreach($areasmetas as $meta)
                    @if($session_id != 3 && $meta->area == $session_area)
                    <tr>
                        <td class="text-center">{{ $meta -> id_areasmetas }}</td>
                        <td>{{ $meta -> nombrePA }}</td>
                        <td>{{$meta->nombreM}}</td>
                        <td>
                            <input type="number" onkeyup="mostrar{{ $meta->id_areasmetas }}(this.value)" class="form-control" id="cantEntrega{{ $meta->id_areasmetas }}" placeholder="Cantidad a entregar:">
                        </td>
                        <td class="text-center">
                            <!-- Button calendar modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalshow{{ $meta->id_areasmetas }}"><i class="fa-solid fa-calendar"></i></button>
                        </td>
                        <td class="text-center">
                            <!-- Button delete modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $meta->id_areasmetas }}"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                    @elseif($meta->area == $session_area)
                    <tr>
                        <td class="text-center">{{ $meta -> id_areasmetas }}</td>
                        <td>{{ $meta -> nombrePA }}</td>
                        <td>{{$meta->nombreM}}</td>
                        <td>
                            <input type="number" onkeyup="mostrar{{ $meta->id_areasmetas }}(this.value)" class="form-control" id="cantEntrega{{ $meta->id_areasmetas }}" placeholder="Cantidad a entregar:">
                        </td>
                        <td class="text-center">
                            <!-- Button calendar modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalshow{{ $meta->id_areasmetas }}"><i class="fa-solid fa-calendar"></i></button>
                        </td>
                        <td class="text-center">
                            <!-- Button delete modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $meta->id_areasmetas }}"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                    @else
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('calendario.modales')
@else
<div class="container p-4">
    <div class="row">
        <div class="col p-4">
            <h3>Calendario</h3>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 py-3 text-center">
            <img src="{{ asset('img/login.png') }}" alt="Inicie Sesión para poder ver el contenido" class="img-fluid" style="width: 800px;">
            <p>Para ver el contenido <a href="/login">Iniciar Sesión</a></p>
        </div>
    </div>
</div>
@endif



@endsection
