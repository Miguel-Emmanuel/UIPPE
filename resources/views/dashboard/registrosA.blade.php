@extends('layout.navbar')
@section('dataTablesCss')
<link rel="stylesheet" href="{{ asset('css/virtual-select.min.css') }}">
@endsection
@section('content')
<?php
$session_id = session('session_id');
$session_name = session('session_name');
$session_tipo = session('session_tipo');
$session_area = session('session_area');

?>
@if($session_tipo == 5)
<script>
    window.location.replace("{{ route('dashboard')}}");
</script>
@endif
@if($session_area != 0)
<title>Registros</title>
<div class="container p-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
            <li class="breadcrumb-item">Registros</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 py-3">
            <h3 class="text-bold">Registros</h3>
            <p>En este apartado se muestra la cantidad de registros de datos.</p>
        </div>
        @if($session_id) <!-- Contenido para verificar sesión iniciada -->
        <div class="col-md-12">
            <ul class="nav nav-pills nav-fill gap-2 p-1 small rounded-5 shadow-sm" id="pillNav2" role="tablist" style="--bs-nav-link-color: var(--bs-white); --bs-nav-pills-link-active-color: var(--bs-black); --bs-nav-pills-link-active-bg: var(--bs-white); background-color: cadetblue;">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active rounded-5" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">#1 Área</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link rounded-5" id="nav-registroUsuarios-tab" data-bs-toggle="tab" data-bs-target="#nav-registroUsuarios" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">#2 Usuarios</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link rounded-5" id="nav-Metas-tab" data-bs-toggle="tab" data-bs-target="#nav-Metas" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">3# Metas</button>
                </li>
            </ul>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                    <div class="container">
                        <div class="row justify-content-md-center mb-5">
                            <div class="col-12 text-center">
                                <br><br>
                                <h3 style="color: black;">{{ $areas -> clave. ' | ' .$areas -> nombre }}</h3>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4 text-center align-items-center">
                                <p style="color: black;">{{ $areas -> descripcion }}</p>
                            </div>
                            <div class="col-xl-12 col-md-12 text-center align-items-center">
                                <img src="{{ asset('/img/post/'.$areas->foto) }}" alt="{{ $areas->foto }}" class="img-fluid">
                            </div>
                            <div class="col-xl-12 col-md-12 text-center align-items-center my-5">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $session_area }}">Editar datos del área</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-registroUsuarios" role="tabpanel" aria-labelledby="nav-registroUsuarios-tab" tabindex="0">
                    <div class="row my-5">
                        <div class="col-12 text-center" style="color: black;">
                            <h3>Usuarios</h3>
                            <p>Usuarios que pertenecen al área</p>
                        </div>
                        @if($session_tipo == 4 || $session_tipo == 5)
                        @else
                        <div class="col p-4 d-flex justify-content-end">
                            <button type="button" class="btn btn-success mx-1 my-1" id="btn_alta" data-bs-toggle="modal" data-bs-target="#modalalta"><i class="fa-solid fa-plus"></i></button>
                        </div>
                        @endif
                        <div class="col-12 my-2">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th class="text-center">Foto</th>
                                            <th>Nombre</th>
                                            <th>Correo</th>
                                            <th>Area</th>
                                            <th>Activo</th>
                                            @if($session_tipo == 4 || $session_tipo == 5)
                                            <th class="text-center">Acciones</th>
                                            @else
                                            <th colspan="2" class="text-center">Acciones</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($asig as $info)
                                        <tr>
                                            <td>{{ $info->id_area}}</td>
                                            <td class="text-center"><img src="{{ asset('img/post/'.$info-> foto) }}" alt="{{ $info->foto }}" style="width: 45px; border-radius: 15px;"></td>
                                            <td>{{ $info->nombreU .' '. $info->app .' '. $info->apm}}</td>
                                            <td>{{ $info->email }}</td>
                                            <td>{{ $info->nombre}}</td>
                                            <td>
                                                @if($info -> activo > 0)
                                                <p style="color: green;">Activo</p>
                                                @else
                                                <p style="color: red;">Inactivo</p>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <!-- Button show modal -->
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalshow{{ $info->id_usuario }}"><i class="fa-solid fa-eye"></i></button>
                                            </td>
                                            @if($session_tipo == 4 || $session_tipo == 5)
                                            @else
                                            <td>
                                                <!-- Button edit modal -->
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $info->id_usuario }}"><i class="fa-solid fa-pen-to-square"></i></button>
                                            </td>
                                            @endif
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-Metas" role="tabpanel" aria-labelledby="nav-metas-tab" tabindex="0">
                    <div class="row my-5">
                        <div class="col-12 text-center" style="color: black;">
                            <h3>Metas</h3>
                            <p>Metas que pertenecen al área</p>
                        </div>
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <!-- Campos en tabla metas -->
                                        <tr>
                                            <th class="text-center">Clave</th>
                                            <th>Nombre</th>
                                            <th>Programa</th>
                                            <th class="text-center">Activo</th>

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
                                        </tr>
                                        @elseif($meta->activo > 0)
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
                                        </tr>
                                        @else
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 py-3 text-center">
            <img src="{{ asset('img/login.png') }}" alt="Inicie Sesión para poder ver el contenido" class="img-fluid" style="width: 800px;">
            <p>Para ver el contenido <a href="/login">Iniciar Sesión</a></p>
        </div>
        @endif
    </div>
    @else
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            var url = window.location.href;
            url = url.split("A/");
            var id = "{{ $session_area }}";

            if (url[1] == id) {

            } else {
                window.location.replace("{{ route('registrosA', ['id' => $session_area]) }}");
            }
        });
    </script>
    @endif
</div>

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
                        <select class="form-control form-select" aria-label="Default select example" name="area_id">
                            @foreach ($areasMulti as $info)
                            @if($session_area == $info->id_area)
                            <option value="{{$info->id_area}}">{{$info->nombre}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>

                    <hr class="sidebar-divider">

                    <div>
                        <label for="floatingInput">Selecciona uno o varios usuarios:</label>
                        <select multiple data-search="true" data-silent-initial-value-set="true" name="usuario_id[]" id="multiUsers">
                        @foreach ($usuarios as $info)
                        @if($info -> id_tipo == 3 || $info -> id_tipo == 4 || $info -> id_tipo == 5)
                            <option value="{{ $info->id_usuario }}">{{ $info->nombre }} {{$info->app}} {{$info->apm}}</option>
                        @endif
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
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" href="usuarios/store" class="btn btn-success" value="Enviar" />
            </div>
            </form>
        </div>
    </div>
</div>
<!-- ADD MODAL END -->

<!-- SHOW MODAL START -->
@foreach ($Usuarios as $usuario)
<div class="modal fade" id="modalshow{{ $usuario->id_usuario }}" tabindex="-1" aria-labelledby="modalshowLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalshowLabel">Detalles | {{ $usuario -> clave }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="text-center py-3">
                        <img src="{{ asset('img/post/'.$usuario->foto) }}" alt="{{ $usuario -> foto }}" style="width: 300px; border-radius: 100px;">
                    </div>
                    <div class="text-center">
                        <h4>
                            @if($usuario->gen == "M" || $usuario->gen == "masculino")
                            <i class="fa-solid fa-mars" style="color: blue;"></i>
                            @elseif($usuario->gen == "F" || $usuario->gen == "femenino")
                            <i class="fa-solid fa-venus" style="color: pink;"></i>
                            @endif
                        </h4>
                    </div>
                    <p><strong>Nombre: </strong><br>{{$usuario -> nombreU .' '. $usuario -> app .' '. $usuario->apm}}</p>
                    <div class="col-6 text-center">
                        <p><strong>Fecha de nacimiento: </strong><br>{{$usuario -> fn}}</p>
                    </div>
                    <div class="col-6 text-center">
                        <strong>Estado: </strong>@if($usuario -> activo > 0) <p style="color: green;">Activo</p> @else <p style="color: red;">Inactivo</p> @endif
                    </div>
                    <p><strong>Academico: </strong>{{$usuario -> academico}}</p>
                    <p><strong>Correo: </strong>{{$usuario -> email}}</p>
                    <p><strong>Tipo: </strong> {{$usuario->nombreT}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- SHOW MODAL END -->


<!-- EDIT MODAL START -->
@foreach ($Usuarios as $usuario)
<div class="modal fade" id="exampleModal{{ $usuario->id_usuario }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Registro</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('editUsuario', ['id' => $usuario->id_usuario]) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field('PATCH') }}
                    {{ method_field('PUT') }}
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="clave" placeholder="name@example.com" value="{{ $usuario -> clave }}">
                        <label for="floatingInput">Clave:</label>
                    </div>
                    <div class="row py-2">
                        <div class="col">
                            <label for="exampleInputEmail1" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" aria-label="First name" name="nombre" value="{{ $usuario -> nombreU }}">
                        </div>
                        <div class="col">
                            <label for="exampleInputEmail1" class="form-label">Apellido Paterno:</label>
                            <input type="text" class="form-control" aria-label="Last name" name="app" value="{{ $usuario -> app }}">
                        </div>
                        <div class="col">
                            <label for="exampleInputEmail1" class="form-label">Apellido Materno:</label>
                            <input type="text" class="form-control" aria-label="Last name" name="apm" value="{{ $usuario -> apm }}">
                        </div>
                    </div>
                    <div class="py-2">
                        <label for="colFormLabelSm" class="form-label">Sexo | Genero :</label>
                        @if($usuario->gen == "F")
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="M" id="flexCheckDefault" name="gen">
                            <label class="form-check-label" for="flexCheckDefault">
                                Masculino
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="F" id="flexCheckChecked" name="gen" checked>
                            <label class="form-check-label" for="flexCheckChecked">
                                Femenino
                            </label>
                        </div>
                        @else
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="M" name="gen" id="flexCheckDefault" checked>
                            <label class="form-check-label" for="flexCheckDefault">
                                Masculino
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="F" name="gen" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Femenino
                            </label>
                        </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Fecha de nacimiento:</label>
                        <input type="date" class="form-control" id="fn" name="fn" value="{{ $usuario -> fn }}">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Académico:</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" name="academico" value="{{ $usuario -> academico }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email:</label>
                        <input type="email" class="form-control" name="email" value="{{$usuario -> email}}" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Seleccione una foto de perfil:</label>
                        <input class="form-control" type="file" name="foto" id="formFile">
                    </div>
                    <div class="mb-3">
                        <hr>
                        <label for=""> Tipo de usuario:</label>
                        <select class="form-control form-select" aria-label="Default select example" name="id_tipo" value="{{$usuario->id_tipo}}">
                        @foreach($Tipos as $info)
                            @if($session_tipo == 3)
                                @if($info -> id != 1 || $info -> id != 1)
                                    <option value={{$info->id}} {{ $info->id == $usuario->id_tipo ?'selected':''; }}>{{$info->nombre}}</option>
                                @endif
                            @else
                                @if($info->id == $usuario->id_tipo)
                                    <option value={{$info->id}} {{ $info->id == $usuario->id_tipo ?'selected':''; }}>{{$info->nombre}}</option>
                                @endif
                            @endif
                        @endforeach
                        </select>
                        <hr>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            @if($usuario -> activo > 0)
                            <input class="form-check-input" type="checkbox" name="activo" checked>
                            @else
                            <input class="form-check-input" type="checkbox" name="activo">
                            @endif
                            <label class="form-check-label" for="flexSwitchCheckChecked">Activo</label>
                        </div>
                    </div>
                    <input class="form-control" type="text" name="registro" value="<?php echo $session_id ?>" style="display: none;">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <input type="submit" class="btn btn-success" value="Enviar" />
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach
<!-- EDIT MODAL END -->

<!-- EDIT ÁREA START -->
@foreach ($areas as $info)
<div class="modal fade" id="exampleModal{{ $session_area }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Registro</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('editArea', ['id' => $session_area]) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field('PATCH') }}
                    {{ method_field('PUT') }}
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="clave" placeholder="name@example.com" value="{{ $areas -> clave }}">
                        <label for="floatingInput">Clave:</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="nombre" placeholder="name@example.com" value="{{ $areas -> nombre }}">
                        <label for="floatingInput">Nombre:</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="descripcion" placeholder="name@example.com" value="{{ $areas -> descripcion }}">
                        <label for="floatingInput">Descripción:</label>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Seleccione una foto de perfil:</label>
                        <input class="form-control" type="file" name="foto" id="formFile" value="{{ $areas -> foto }}">
                    </div>

                    <div class="mb-3">
                        <div class="form-check form-switch">
                            @if($areas -> activo > 0)
                            <input class="form-check-input" type="checkbox" role="switch" name="activo" checked>
                            @else
                            <input class="form-check-input" type="checkbox" role="switch" name="activo">
                            @endif
                            <label class="form-check-label" for="flexSwitchCheckChecked">Activo</label>
                        </div>
                    </div>

                    <input class="form-control" type="text" name="registro" value="<?php echo $session_id ?>" style="display: none;">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Editar</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach
<!-- EDIT ÁREA START -->


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

<script type="text/javascript" src="{{ asset('js/virtual-select.min.js') }}"></script>

    <script type="text/javascript">
        VirtualSelect.init({
            ele: '#multiUsers'
        });
    </script>


@endsection
