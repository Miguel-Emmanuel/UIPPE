@extends('layout.navbar')
<!-- Importacion de estilos para el select START -->
@section('dataTablesCss')
<link rel="stylesheet" href="{{ asset('css/virtual-select.min.css') }}">
@endsection
<!-- Importacion de estilos para el select END -->

@section('content')

<!-- Variables de Sesiones del usuario START -->
<?php
$session_id = session('session_id');
$session_area = session('session_area');
?>
<!-- Variables de Sesiones del usuario END -->

@if($session_id)    <!-- Condición de acceso al contenido LOGGEADO IF -->
@if($session_area == 0)     <!-- Condición de acceso al contenido AREA IF -->
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
            <a href="{{route('pdfau')}}"><button type="button" class="btn btn-danger mx-1 my-1"><i class="fa-solid fa-file-pdf"></i></button></a>
            <a class="btn btn-success float-end mx-1 my-1" href="{{ route('areasusuarios.export') }}"><i class="fa-sharp fa-solid fa-file-excel"></i></a>
            <button type="button" class="btn btn-success mx-1 my-1" id="btn_alta" data-bs-toggle="modal" data-bs-target="#modalalta"><i class="fa-solid fa-plus"></i></button>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Area</th>
                        <th>Usuario</th>
                        <th colspan="2" class="text-center">Registro</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($asig as $info)
                    <tr>
                        <td>{{ $info->id_area}}</td>
                        <td>{{ $info->nombre}}</td>
                        <td>{{ $info->nombreU .' '. $info->app .' '. $info->apm}}</td>
                        <td class="text-center">
                            <!-- Button show modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalshow{{ $info->id_areasusuarios }}"><i class="fa-solid fa-eye"></i></button>
                        </td>
                        <td class="text-center">
                            <!-- Button delete modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $info->id_areasusuarios }}"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@else       <!-- Condición de acceso al contenido AREA ELSE -->
<script>
    window.location.replace("{{ route('registrosA', ['id' => $session_area]) }}");
</script>
@endif
@else   <!-- Condición de acceso al contenido LOGGEADO ELSE -->
<div class="container p-4">
    <div class="row">
        <div class="col p-4">
            <h3>Áreas - Usuarios</h3>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 py-3 text-center">
            <img src="{{ asset('img/login.png') }}" alt="Inicie Sesión para poder ver el contenido" class="img-fluid" style="width: 800px;">
            <p>Para ver el contenido <a href="{{ route('login') }}">Iniciar Sesión</a></p>
        </div>
    </div>
</div>
@endif

<!-- ELIMINAR START MODAL -->
@foreach ($asig as $info )
<div class="modal fade" id="deleteModal{{ $info->id_areasusuarios }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel">Eliminar Área | {{ $info->id_areasusuarios }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                ¿Realmente desea eliminar el registro?
                <strong>
                    <p>{{$info -> nombre .' | '. $info->nombreU .' '. $info->app .' '. $info->apm}}</p>
                </strong>
            </div>
            <div class="modal-footer">
            <form action="{{ route('deleteAreaUser', ['id' => $info->id_areasusuarios]) }}" method="POST" enctype="multipart/form-data">
                {!! csrf_field() !!}
                @method("delete")
                <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Borrar</button>
            </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- ELIMINAR END MODAL -->

<!-- SHOW MODAL START -->
@foreach ($modalDetalle as $info)
<div class="modal fade" id="modalshow{{ $info->id_areasusuarios }}" tabindex="-1" aria-labelledby="modalshowLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalshowLabel">Detalles | {{ $info -> clave }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex" style="align-items: center; justify-content: center;">
                <div class="col text-center">
                    <img src="{{ asset('img/post/'.$info->foto) }}" alt="{{ $info -> foto }}" style="width: 150px;">
                </div>
                <div class="col">
                    <p><strong>Nombre: </strong><br>{{$info -> nombre .' '. $info->app .' '. $info->apm}}</p>
                    <p><strong>Correo Electrónico: </strong><br>{{ $info -> email }}</p>
                    <p><strong>Fecha de nacimiento: </strong><br>{{$info -> fn}}</p>
                </div>
            </div>
            <hr>
            <div class="modal-body row">
                <h5 class="text-center"><strong>Área</strong></h5>
                <div class="col-6 text-center">
                    <p><strong>Clave: </strong><br>{{$info -> clave}}</p>
                </div>
                <div class="col-6 text-center">
                    <p><strong>Nombre: </strong><br>{{ $info -> nombreA }}</p>
                </div>
                <div class="col-12">
                    <p><strong>Descripción: </strong><br>{{$info -> descripcion}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- SHOW MODAL END -->

<!-- ADD MODAL START -->
<div class="modal fade" id="modalalta" tabindex="-1" aria-labelledby="modalaltaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Área-usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('areausuario.store')}}" method="POST" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div>
                        <label for="floatingInput">Selecciona un area:</label>
                        <select name="area_id" id="area_id" aria-label="floating label selext example" data-search="true" data-silent-initial-value-set="true">
                            @foreach ($areas as $info)
                            <option value="{{$info->id_area}}">{{$info->nombre}}</option>
                            @endforeach
                        </select>
                    </div>

                    <hr class="sidebar-divider">

                    <div>
                        <label for="floatingInput">Selecciona uno o varios usuarios:</label>
                        <select multiple data-search="true" data-silent-initial-value-set="true" name="usuario_id[]">
                            @foreach ($usuarios as $info)
                            <option value="{{ $info->id_usuario }}">{{ $info->nombre }} {{$info->app}} {{$info->apm}}</option>
                            @endforeach
                        </select>
                    </div>

                    <hr class="sidebar-divider">

                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="activo" role="switch" id="flexSwitchCheckChecked" checked>
                            <label class="form-check-label" for="flexSwitchCheckChecked">Activo</label>
                        </div>
                    </div>
                    <input class="form-control" type="text" name="registro" value="<?php echo $session_id ?>" style="display: none;">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <input type="submit" href="usuarios/store" class="btn btn-success" value="Enviar" />
            </div>
            </form>
        </div>
    </div>
</div>
<!-- ADD MODAL END -->

<!-- SCRIPT MODAL START -->
<script>
    $(function() {
        $('#modalmod').modal('show')
    });
</script>
<script>
    $(function() {
        $('#modalshow').modal('show')
    });
    $(function() {
        $('#modalver').modal('show')
    });
    $(function() {
        $('#eliminarmodal').modal('show')
    });
</script>
<!-- SCRIPT MODAL END -->

<!-- SCRIPT PARA MULTISELECT START -->
<script type="text/javascript" src="js/virtual-select.min.js"></script>
<script type="text/javascript">
    VirtualSelect.init({
        ele: 'select'
    });
</script>
<!-- SCRIPT PARA MULTISELECT END -->

@endsection