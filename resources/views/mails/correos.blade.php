@extends('layout.navbar')
@section('content')
<?php
$session_id = session('session_id');
$session_name = session('session_name');
$session_tipo = session('session_tipo');
$session_area = session('session_area');
?>
<link rel="stylesheet" href="{{ asset('css/correos.css') }}">
@if($session_tipo >= 3)
<script>
    window.location.replace("{{ route('dashboard')}}");
</script>
@endif
<title>Correo</title>
@if($session_id)
@if($session_area != "")

<div class="container p-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard">Inicio</a></li>
            <li class="breadcrumb-item" aria-current="page">Correo</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-12 p-4">
            <h3>Correo</h3>
        </div>
        <div class="contenedor">
            <form action="{{route('pcorreo')}}" method="GET">
                @csrf
                <div class="form-group">
                    <label for="">Correo:</label>
                    <select class="form-control" aria-label="Default select example" name="destinatario" required>
                        <option value="0">--Selecciona un Destinatario--</option>
                        @foreach ($usuarios as $usuarios)
                        <option value="{{$usuarios->id_usuario}}">{{$usuarios->nombre}} {{$usuarios->app}}</option>
                        @endforeach
                    </select>
                </div>
            
                <div class="form-group my-2">
                    <label for="">Asunto:</label>
                    <input class="form-control" type="text" placeholder="Asunto del Correo" name="asunto" required>
                </div>
            
                <div class="form-group my-2">
                    <label for="floatingTextarea">Mensaje:</label>
                    <textarea class="form-control" name="mensaje" placeholder="Mensaje" id="floatingTextarea"></textarea>
                </div>

                <input type="hidden" name="id" value="{{$session_id}}">
            
                <button type="submit" class="btn btn-outline-success">Enviar correo</button>
            </form>
            
        <br>
        <div class="table-responsive my-3">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Destinatario</th>
                        <th scope="col">Asunto</th>
                        <th scope="col">Fecha Envío</th>
                        <th scope="col">Remitente id</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($correos as $correo)
                    <tr>
                        <th scope="row">{{$correo->id_correo}}</th>
                        <td>{{$correo->destinatario}}</td>
                        <td>{{$correo->asunto}}</td>
                        <td>{{$correo->fecha_envio}}</td>
                        <td>{{$correo->remitente}}</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$correo->id_correo}}">
                                <i class="fa-solid fa-eye"></i>Ver
                            </button>
                        </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{$correo->id_correo}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Correo Enviado a: {{$correo->destinatario}}</h1>
                                </div>
                                <div class="modal-body">
                                    Asunto: {{$correo->asunto}} <br><br>
                                    Mensaje:<br>
                                    {{$correo->contenido}}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
@else
<div class="container p-4">
    <div class="row">
        <div class="col p-4">
            <h3>Calendario</h3>
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
            <h3>Inicio</h3>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 py-3 text-center">
            <img src="{{ asset('img/login.png') }}" alt="Inicie Sesión para poder ver el contenido" class="img-fluid" style="width: 800px;">
            <p>Para ver el contenido <a href="{{ route('login') }}">Iniciar Sesión</a></p>
        </div>
    </div>
</div>
@endif
@endsection

