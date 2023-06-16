@extends('layout.navbar')
@section('content')

<?php
$session_id = session('session_id');
$session_area = session('session_area');
?>
@if($session_id)
@if($session_area == 0)
<div class="container p-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ route('registrosA', ['id' => $session_area]) }}">Registros</a></li>
            <li class="breadcrumb-item" aria-current="page">Áreas</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col p-4">
            <h3>Áreas</h3>
        </div>

        <div class="col p-4 d-flex justify-content-end">
            <a href="{{route('pdf')}}" class="mx-1 my-1"><button type="button" class="btn btn-danger"><i class="fa-solid fa-file-pdf"></i></button>
            <a class="btn btn-success float-end mx-1 my-1" href="{{ route('areas.export') }}"><i class="fa-sharp fa-solid fa-file-excel"></i></a>
            <button type="button" class="btn btn-success mx-1 my-1" id="btn_alta" data-bs-toggle="modal" data-bs-target="#modalalta"><i class="fa-solid fa-plus"></i></button>
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
                    @if($session_area === 0)
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
                    @elseif($session_area === $info->id_area)
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
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@else
<script>
    window.location.replace("{{ route('registrosA', ['id' => $session_area]) }}");
</script>
@endif
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

<!-- ELIMINAR START MODAL -->
@foreach ($areas as $info )
<div class="modal fade" id="deleteModal{{ $info->id_area }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel">Eliminar Área</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                ¿Realmente desea eliminar el registro?
                <strong>
                    <p>{{$info -> clave .' | '. $info -> nombre}}</p>
                </strong>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form action="{{ route('deleteArea', ['id' => $info->id_area]) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field('PATCH') }}
                    {{ method_field('PUT') }}
                    <input class="form-control" type="text" name="registro" value="<?php echo $session_id ?>" style="display: none;">
                    <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Borrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- ELIMINAR END MODAL -->

<!-- SHOW MODAL START -->
@foreach ($areas as $info)
<div class="modal fade" id="modalshow{{ $info->id_area }}" tabindex="-1" aria-labelledby="modalshowLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalshowLabel">Detalles | {{ $info -> clave }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center py-3">
                    <img src="{{ asset('img/post/'.$info->foto) }}" alt="{{ $info -> foto }}">
                </div>
                <p>Nombre: {{$info -> nombre }}</p>
                <p>Descripción: {{$info -> descripcion}}</p>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- SHOW MODAL END -->


<!-- EDIT MODAL START -->
@foreach ($areas as $info)
<div class="modal fade" id="exampleModal{{ $info->id_area }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Registro</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('editArea', ['id' => $info->id_area]) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field('PATCH') }}
                    {{ method_field('PUT') }}
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="clave" placeholder="name@example.com" value="{{ $info -> clave }}">
                        <label for="floatingInput">Clave:</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="nombre" placeholder="name@example.com" value="{{ $info -> nombre }}">
                        <label for="floatingInput">Nombre:</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="descripcion" placeholder="name@example.com" value="{{ $info -> descripcion }}">
                        <label for="floatingInput">Descripción:</label>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Seleccione una foto de perfil:</label>
                        <input class="form-control" type="file" name="foto" id="formFile" value="{{ $info->foto}}">
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-switch">
                            @if($info -> activo > 0)
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
<!-- EDIT MODAL END -->


<!-- ADD MODAL START -->
<div class="modal fade" id="modalalta" tabindex="-1" aria-labelledby="modalaltaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Área</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('areas.store') }}" method="POST" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    @include('components.flash_alerts')
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="clave" placeholder="name@example.com">
                        <label for="floatingInput">Clave:</label>
                        @error('clave')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="nombre" placeholder="name@example.com">
                        <label for="floatingInput">Nombre:</label>
                        @error('nombre')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="descripcion" placeholder="name@example.com">
                        <label for="floatingInput">Descripción:</label>
                        @error('descripcion')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Seleccione una foto de perfil:</label>
                        <input class="form-control" type="file" id="formFile" name="foto">
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                            <label class="form-check-label" for="flexSwitchCheckChecked">Activo</label>
                        </div>
                    </div>
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
@endsection