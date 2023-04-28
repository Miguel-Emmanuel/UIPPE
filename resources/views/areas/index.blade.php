@extends('layout.navbar')
@section('content')

<?php
$session_id = session('session_id');
?>
@if($session_id)
<div class="container p-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard">Inicio</a></li>
            <li class="breadcrumb-item"><a href="registros">Registros</a></li>
            <li class="breadcrumb-item" aria-current="page">Áreas</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col p-4">
            <h3>Áreas</h3>
        </div>

        <div class="col p-4 d-flex justify-content-end">
            <button type="button" class="btn btn-success" id="btn_alta" data-bs-toggle="modal" data-bs-target="#modalalta"><i class="fa-solid fa-plus"></i></button>
        </div>

        <div class="table-responsive" id="resultado">
            <table class="table" id="lista">
                <thead>
                    <tr>
                        <th class="text-center">Foto</th>
                        <th>Clave</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Activo</th>
                        <th colspan="3">Operaciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($areas as $info)
                    @if($session_id != 3)
                    <tr>
                        <td class="text-center"><img src="{{ asset('img/post/'.$info-> foto) }}" alt="{{ $info->foto }}" style="width: 50px; border-radius: 15px;"></td>
                        <td>{{ $info->clave}}</td>
                        <td>{{ $info->nombre}}</td>
                        <td>{{ $info->descripcion}}</td>
                        <td>
                            @if($info -> activo > 0)
                            <p style="color: green;">Activo</p>
                            @else
                            <p style="color: red;">Inactivo</p>
                            @endif
                        </td>
                        <td>
                            <!-- Button show modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalshow{{ $info->id_area }}"><i class="fa-solid fa-eye"></i></button>
                        </td>
                        <td>
                            <!-- Button modif modal -->
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $info->id_area }}"><i class="fa-solid fa-pen-to-square"></i></button>
                        </td>
                        <td>
                            <!-- Button delete modal -->
                            @if($info -> activo > 0)
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $info->id_area }}"><i class="fa-solid fa-trash"></i></button>
                            @else
                            <button type="button" class="btn btn-dark" disabled data-bs-toggle="modal" data-bs-target="#deleteModal{{ $info->id_area }}"><i class="fa-solid fa-trash"></i></button>
                            @endif
                        </td>
                    </tr>
                    @elseif($info -> activo > 0)
                    <tr>
                        <td class="text-center"><img src="{{ asset('img/post/'.$info-> foto) }}" alt="{{ $info->foto }}" style="width: 50px; border-radius: 15px;"></td>
                        <td>{{ $info->clave}}</td>
                        <td>{{ $info->nombre}}</td>
                        <td>{{ $info->descripcion}}</td>
                        <td>
                            @if($info -> activo > 0)
                            <p style="color: green;">Activo</p>
                            @else
                            <p style="color: red;">Inactivo</p>
                            @endif
                        </td>
                        <td>
                            <!-- Button show modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalshow{{ $info->id_area }}"><i class="fa-solid fa-eye"></i></button>
                        </td>
                        <td>
                            <!-- Button modif modal -->
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $info->id_area }}"><i class="fa-solid fa-pen-to-square"></i></button>
                        </td>
                        <td>
                            <!-- Button delete modal -->
                            @if($info -> activo > 0)
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $info->id_area }}"><i class="fa-solid fa-trash"></i></button>
                            @else
                            <button type="button" class="btn btn-dark" disabled data-bs-toggle="modal" data-bs-target="#deleteModal{{ $info->id_area }}"><i class="fa-solid fa-trash"></i></button>
                            @endif
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

@else
<div class="container p-4">
    <div class="row">
        <div class="col p-4">
            <h3>Áreas</h3>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 py-3 text-center">
            <img src="{{ asset('img/login.png') }}" alt="Inicie Sesión para poder ver el contenido" class="img-fluid" style="width: 800px;">
            <p>Para ver el contenido <a href="/login">Iniciar Sesión</a></p>
        </div>
    </div>
</div>
@endif
@include('areas.modales')
@endsection
