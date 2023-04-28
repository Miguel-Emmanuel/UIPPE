@extends('layout.navbar')
@section('content')
<?php
$session_id = session('session_id');
?>
<div class="container p-4">
<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard">Inicio</a></li>
            <li class="breadcrumb-item"><a href="registros">Registros</a></li>
            <li class="breadcrumb-item" aria-current="page">Áreas-Usuarios</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col p-4">
            <h3>Áreas | Usuarios</h3>
        </div>
        <div class="col p-4 d-flex justify-content-end">
            <button type="button" class="btn btn-success" id="btn_alta" data-bs-toggle="modal" data-bs-target="#modalalta"><i class="fa-solid fa-plus"></i></button>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Area</th>
                        <th>Usuario</th>
                        <th>Activo</th>
                        <th colspan="3" class="text-center">Registro</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($areausuario as $info)
                    <tr>
                        <td>{{ $info->id_areasusuarios}}</td>
                        <td>{{ $info->area_id}}</td>
                        <td>{{ $info->usuario_id}}</td>
                        <td>
                            @if($info -> activo > 0)
                            <p style="color: green;">Activo</p>
                            @else
                            <p style="color: red;">Inactivo</p>
                            @endif
                        </td>
                        <td class="text-center">
                            <!-- Button show modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalshow{{ $info->id_area }}"><i class="fa-solid fa-eye"></i></button>
                        </td>
                        <td class="text-center">
                            <!-- Button modif modal -->
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $info->id_area }}"><i class="fa-solid fa-pen-to-square"></i></button>
                        </td>
                        <td class="text-center">
                            <!-- Button delete modal -->
                            @if($info -> activo > 0)
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $info->id_area }}"><i class="fa-solid fa-trash"></i></button>
                            @else
                            <button type="button" class="btn btn-dark" disabled data-bs-toggle="modal" data-bs-target="#deleteModal{{ $info->id_area }}"><i class="fa-solid fa-trash"></i></button>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@include('areas-usuarios.modales')
@endsection
