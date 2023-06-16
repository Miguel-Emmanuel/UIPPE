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
<div class="container p-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard">Inicio</a></li>
            <li class="breadcrumb-item"><a href="registros">Registros</a></li>
            <li class="breadcrumb-item" aria-current="page">Usuarios</li>
        </ol>
    </nav>
    @if($session_area == 0)
    <div class="row">
        <div class="col p-4">
            <h3>Usuarios</h3>
        </div>
        <div class="col p-4 d-flex justify-content-end">
            <a href="{{route('pdfu')}}"><button type="button" class="btn btn-danger mx-1 my-1"><i class="fa-solid fa-file-pdf"></i></button></a>
            <a class="btn btn-success float-end mx-1 my-1 " href="{{ route('usuarios.export') }}"><i class="fa-sharp fa-solid fa-file-excel"></i></a>
            <button type="button" class="btn btn-success mx-1 my-1" id="btn_alta" data-bs-toggle="modal" data-bs-target="#modalalta"><i class="fa-solid fa-plus"></i></button>
        </div>
        <div class="table-responsive">
            <table class="table display" id="userTable" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">Foto</th>
                        <th>Clave</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Genero</th>
                        <th>Académico</th>
                        <th>Email</th>
                        <th>Activo</th>
                        <th class="text-center">Acciones</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($Usuarios as $usuario)
                    @if($session_id != 3)
                    <tr>
                        <td class="text-center"><img src="{{ asset('img/post/'.$usuario-> foto) }}" alt="{{ $usuario->foto }}" style="width: 45px; border-radius: 15px;"></td>
                        <td>{{ $usuario->clave}}</td>
                        <td>{{ $usuario->nombreU}}</td>
                        <td>{{ $usuario->app .' '. $usuario->apm }}</td>
                        <td>
                            @if($usuario->gen == "M" || $usuario->gen == "masculino")
                            Masculino
                            @elseif($usuario->gen == "F" || $usuario->gen == "femenino")
                            Femenino
                            @else
                            {{ $usuario -> gen }}
                            @endif
                        </td>
                        <td>{{ $usuario -> academico }}</td>
                        <td>{{ $usuario -> email }}</td>
                        <td>
                            @if($usuario -> activo > 0)
                            <p style="color: green;">Activo</p>
                            @else
                            <p style="color: red;">Inactivo</p>
                            @endif
                        </td>
                        <td class="text-center">
                            <!-- Button show modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalshow{{ $usuario->id_usuario }}"><i class="fa-solid fa-eye"></i></button>
                        </td>
                        <td class="text-center">
                            <!-- Button edit modal -->
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $usuario->id_usuario }}"><i class="fa-solid fa-pen-to-square"></i></button>
                        </td>
                        <td class="text-center">
                            <!-- Button delete modal -->
                            @if($usuario -> activo > 0)
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $usuario->id_usuario }}"><i class="fa-solid fa-trash"></i></button>
                            @else
                            <button type="button" class="btn btn-dark" disabled data-bs-toggle="modal" data-bs-target="#deleteModal{{ $usuario->id_usuario }}"><i class="fa-solid fa-trash"></i></button>
                            @endif
                        </td>
                    </tr>
                    @elseif($usuario->activo > 0)
                    <tr>
                        <td class="text-center"><img src="{{ asset('img/post/'.$usuario-> foto) }}" alt="{{ $usuario->foto }}" style="width: 45px; border-radius: 15px;"></td>
                        <td>{{ $usuario->clave}}</td>
                        <td>{{ $usuario->nombreU}}</td>
                        <td>{{ $usuario->app .' '. $usuario->apm }}</td>
                        <td>
                            @if($usuario->gen == "M" || $usuario->gen == "masculino")
                            Masculino
                            @elseif($usuario->gen == "F" || $usuario->gen == "femenino")
                            Femenino
                            @else
                            {{ $usuario -> gen }}
                            @endif
                        </td>
                        <td>{{ $usuario -> academico }}</td>
                        <td>{{ $usuario -> email }}</td>
                        <td>
                            @if($usuario -> activo > 0)
                            <p style="color: green;">Activo</p>
                            @else
                            <p style="color: red;">Inactivo</p>
                            @endif
                        </td>
                        <td>
                            <!-- Button show modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalshow{{ $usuario->id_usuario }}"><i class="fa-solid fa-eye"></i></button>
                        </td>
                        <td>
                            <!-- Button edit modal -->
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $usuario->id_usuario }}"><i class="fa-solid fa-pen-to-square"></i></button>
                        </td>
                        <td>
                            <!-- Button delete modal -->
                            @if($usuario -> activo > 0)
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $usuario->id_usuario }}"><i class="fa-solid fa-trash"></i></button>
                            @else
                            <button type="button" class="btn btn-dark" disabled data-bs-toggle="modal" data-bs-target="#deleteModal{{ $usuario->id_usuario }}"><i class="fa-solid fa-trash"></i></button>
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
            <h3>Usuarios</h3>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 py-3 text-center">
            <img src="{{ asset('img/login.png') }}" alt="Inicie Sesión para poder ver el contenido" class="img-fluid" style="width: 800px;">
            <p>Para ver el contenido <a href="/login">Iniciar Sesión</a></p>
        </div>
    </div>
</div>
@endif
@include('Usuarios.modales')
@section('dataTablesJs')
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#userTable').DataTable({
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