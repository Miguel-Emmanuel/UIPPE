@extends('layout.navbar')
@section('dataTablesCss')
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
@endsection
@section('content')
<?php
$session_id = session('session_id');
$session_area = session('session_area');
?>
@if($session_id)
<title>Metas</title>
<div class="container p-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard">Inicio</a></li>
            <li class="breadcrumb-item"><a href="registros">Registros</a></li>
            <li class="breadcrumb-item" aria-current="page">Metas</li>
        </ol>
    </nav>
    @if($session_area == 0)
    <div class="row">
        <div class="col p-4">
            <h3>Metas</h3>
        </div>
        <div class="col p-4 d-flex justify-content-end">
            <a href="{{ route('pdfmetas') }}"><button type="button" class="btn btn-danger mx-1 my-1"><i class="fa-solid fa-file-pdf"></i></button></a>
            <a class="btn btn-success float-end mx-1 my-1" href="{{ route('metas.export') }}"><i class="fa-sharp fa-solid fa-file-excel"></i></a>
           
            <button type="button" class="btn btn-success mx-1 my-1" id="btn_alta" data-bs-toggle="modal" data-bs-target="#modalalta"><i class="fa-solid fa-plus"></i></button>
        </div>
        <div class="table-responsive">
            <table class="table" id="metasTable">
                <thead>
                    <!-- Campos en tabla metas -->
                    <tr>
                        <th class="text-center">Clave</th>
                        <th>Nombre</th>
                        <th>Programa</th>
                        <th class="text-center">Activo</th>
                        <th>Registro</th>
                        <th class="text-center">Acciones</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Regitros en tabla metas -->
                    @foreach($metas as $meta)
                    @if($session_id != 3)
                    <tr>
                        <td class="text-center">{{ $meta -> clave }}</td>
                        <td>{{ $meta -> nombreM }}</td>
                        <td>{{$meta->nombrePA}}</td>
                        <td class="text-center">
                            @if($meta -> activo > 0)
                            <p style="color: green;">Activo</p>
                            @else
                            <p style="color: red;">Inactivo</p>
                            @endif
                        </td>
                        <td>{{ $meta -> id_registro }}</td>
                        <td class="text-center">
                            <!-- Button show modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalshow{{ $meta->id_meta }}"><i class="fa-solid fa-eye"></i></button>
                        </td>
                        <td class="text-center">
                            <!-- Button edit modal -->
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $meta->id_meta }}"><i class="fa-solid fa-pen-to-square"></i></button>
                        </td>
                        <td class="text-center">
                            <!-- Button delete modal -->
                            @if($meta -> activo > 0)
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $meta->id_meta }}"><i class="fa-solid fa-trash"></i></button>
                            @else
                            <button type="button" class="btn btn-dark" disabled data-bs-toggle="modal" data-bs-target="#deleteModal{{ $meta->id_meta }}"><i class="fa-solid fa-trash"></i></button>
                            @endif
                        </td>
                    </tr>
                    @elseif($meta->activo > 0)
                    <tr>
                        <td class="text-center">{{ $meta -> clave }}</td>
                        <td>{{ $meta -> nombre }}</td>
                        <td>{{ $meta -> descripcion }}</td>
                        <td class="text-center">
                            @if($meta -> activo > 0)
                            <p style="color: green;">Activo</p>
                            @else
                            <p style="color: red;">Inactivo</p>
                            @endif
                        </td>
                        <td>{{ $meta -> id_registro }}</td>
                        <td class="text-center">
                            <!-- Button show modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalshow{{ $meta->id_meta }}"><i class="fa-solid fa-eye"></i></button>
                        </td>
                        <td class="text-center">
                            <!-- Button edit modal -->
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $meta->id_meta }}"><i class="fa-solid fa-pen-to-square"></i></button>
                        </td>
                        <td class="text-center">
                            <!-- Button delete modal -->
                            @if($meta -> activo > 0)
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $meta->id_meta }}"><i class="fa-solid fa-trash"></i></button>
                            @else
                            <button type="button" class="btn btn-dark" disabled data-bs-toggle="modal" data-bs-target="#deleteModal{{ $meta->id_meta }}"><i class="fa-solid fa-trash"></i></button>
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
    @else
    <script>
        window.location.replace("{{ route('registrosA', ['id' => $session_area]) }}");
    </script>
    @endif
</div>

@else
<div class="container p-4">
    <div class="row">
        <div class="col p-4">
            <h3>Metas</h3>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 py-3 text-center">
            <img src="{{ asset('img/login.png') }}" alt="Inicie Sesión para poder ver el contenido" class="img-fluid" style="width: 800px;">
            <p>Para ver el contenido <a href="/login">Iniciar Sesión</a></p>
        </div>
    </div>
</div>
@endif
@include('metas.modales')
@section('dataTablesJs')
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#metasTable').DataTable({
            "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todo"]],
            ordering: false,
            info: false,
            language:{
                "search": "Buscar:",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "zeroRecords": "Sin resultados encontrados",
            }
        });
    });
</script>
@endsection
@endsection
