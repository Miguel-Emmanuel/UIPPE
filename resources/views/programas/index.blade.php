@extends('layout.navbar')

@section('content')

<!-- Variables de Sesiones del usuario START -->
<?php
$session_id = session('session_id');
$session_area = session('session_area');
?>
<!-- Variables de Sesiones del usuario END -->
@if($session_id)    <!-- Condición de acceso al contenido LOGGEADO IF -->
<div class="container p-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard">Inicio</a></li>
            <li class="breadcrumb-item"><a href="registros">Registros</a></li>
            <li class="breadcrumb-item" aria-current="page">Programas</li>
        </ol>
    </nav>
    @if($session_area == 0)     <!-- Condición de acceso al contenido - por AREA IF -->
    <div class="row">
        <div class="col p-4">
            <h3>Programas</h3>
        </div>
        <div class="col p-4 d-flex justify-content-end">
            <a href="{{route('pdfp')}}"><button type="button" class="btn btn-danger mx-1 my-1"><i class="fa-solid fa-file-pdf"></i></button></a>
            <a class="btn btn-success float-end mx-1 my-1" href="{{ route('programas.export') }}"><i class="fa-sharp fa-solid fa-file-excel"></i></a>
            <button type="button" class="btn btn-success mx-1 my-1" id="btn_alta" data-bs-toggle="modal" data-bs-target="#modalalta"><i class="fa-solid fa-plus"></i></button>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" class="text-center">Abreviatura</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Estado</th>
                        <!-- <th scope="col">Registro</th> -->
                        <th scope="col" class="text-center" colspan="3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($programas as $info)
                    @if($session_id != 3)
                    <tr>
                        <td class="text-center">{{ $info->id_programa }}</td>
                        <td class="text-center">{{ $info->abreviatura }}</td>
                        <td>{{ $info->nombre }}</td>
                        <td>{{ $info->descripcion }}</td>
                        <td class="text-center">
                            @if($info->activo > 0)
                            <p style="color: green;">Activo</p>
                            @else
                            <p style="color: red;">Inactivo</p>
                            @endif
                        </td>
                        <!-- <td class="text-center">{{ $info->id_registro }}</td> -->
                        <td>
                            <!-- Button show modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalshow{{ $info->id_programa }}"><i class="fa-solid fa-eye"></i></button>
                        </td>
                        <td>
                            <!-- Button edit modal -->
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $info->id_programa }}"><i class="fa-solid fa-pen-to-square"></i></button>
                        </td>
                        <td>
                            <!-- Button delete modal -->
                            @if($info -> activo > 0)
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $info->id_programa }}"><i class="fa-solid fa-trash"></i></button>
                            @else
                            <button type="button" class="btn btn-dark" disabled data-bs-toggle="modal" data-bs-target="#deleteModal{{ $info->id_programa }}"><i class="fa-solid fa-trash"></i></button>
                            @endif
                        </td>
                    </tr>
                    @elseif($info->activo > 0)
                    <tr>
                        <td class="text-center">{{ $info->id_programa }}</td>
                        <td class="text-center">{{ $info->abreviatura }}</td>
                        <td>{{ $info->nombre }}</td>
                        <td>{{ $info->descripcion }}</td>
                        <td class="text-center">
                            @if($info->activo > 0)
                            <p style="color: green;">Activo</p>
                            @else
                            <p style="color: red;">Inactivo</p>
                            @endif
                        </td>
                        <!-- <td class="text-center">{{ $info->id_registro }}</td> -->
                        <td>
                            <!-- Button show modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalshow{{ $info->id_programa }}"><i class="fa-solid fa-eye"></i></button>
                        </td>
                        <td>
                            <!-- Button edit modal -->
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $info->id_programa }}"><i class="fa-solid fa-pen-to-square"></i></button>
                        </td>
                        <td>
                            <!-- Button delete modal -->
                            @if($info -> activo > 0)
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $info->id_programa }}"><i class="fa-solid fa-trash"></i></button>
                            @else
                            <button type="button" class="btn btn-dark" disabled data-bs-toggle="modal" data-bs-target="#deleteModal{{ $info->id_programa }}"><i class="fa-solid fa-trash"></i></button>
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
    @else   <!-- Condición de acceso al contenido - por AREA ELSE -->
    <script>
        window.location.replace("{{ route('registrosA', ['id' => $session_area]) }}");
    </script>
    @endif
</div>

@include('programas.modales')

@else       <!-- Condición de acceso al contenido LOGGEADO ELSE -->
<div class="container p-4">
    <div class="row">
        <div class="col p-4">
            <h3>Programas</h3>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 py-3 text-center">
            <img src="{{ asset('img/login.png') }}" alt="Inicie Sesión para poder ver el contenido" class="img-fluid" style="width: 800px;">
            <p>Para ver el contenido <a href="{{ route('login') }}">Iniciar Sesión</a></p>
        </div>
    </div>
</div>
@endif

@endsection     <!-- ENDSECTION DE CONTENIDO = @section('content') -->
