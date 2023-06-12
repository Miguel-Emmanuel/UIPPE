@extends('layout.navbar')
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
        <a href="{{route('pdfm')}}"><button type="button" class="btn btn-danger"><i class="fa-solid fa-file-pdf"></i></button>
            <a class="btn btn-success float-end" href="{{ route('metas.export') }}"><i class="fa-sharp fa-solid fa-file-excel"></i></a>
           
            <button type="button" class="btn btn-success" id="btn_alta" data-bs-toggle="modal" data-bs-target="#modalalta"><i class="fa-solid fa-plus"></i></button>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <!-- Campos en tabla metas -->
                    <tr>
                        <th class="text-center">Clave</th>
                        <th>Nombre</th>
                        <th>Programa</th>
                        <th class="text-center">Activo</th>
                        <th>Registro</th>
                        <th class="text-center" colspan="3">Acciones</th>
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

<!-- ADD MODAL START -->
<div class="modal fade" id="modalalta" tabindex="-1" aria-labelledby="modalaltaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Meta</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('metas.store') }}" method="POST" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    @include('components.flash_alerts')
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="clave" placeholder="name@example.com">
                        <label for="floatingInput">Clave:</label>
                        @error('clave')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-12">
                        <div>
                            <label for="exampleFormControlInput1" class="form-label">Nombre:</label>
                            <textarea type="text" class="form-control" name="nombre" rows="3"></textarea>
                        </div>
                        @error('nombre')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-12">
                        <br>
                        <label for="exampleFormControlInput1" class="form-label">Descripción:</label>
                        <textarea type="text" class="form-control" name="descripcion" rows="7"></textarea>
                        @error('descripcion')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <hr>
                    <div class="col-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="unidadmedida" placeholder="name@example.com">
                            <label for="floatingInput">Unidad de Medida:</label>
                        </div>
                        @error('unidadmedida')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <hr>
                        <label for=""> Programa:</label>
                        <select class="form-control form-select" aria-label="Default select example" name="programa_id">
                            <option value="">Elige el programa</option>
                            @foreach($Programas as $info)
                            <option value={{$info->id_programa}}>{{$info->abreviatura}}</option>
                            @endforeach
                        </select>
                        <hr>
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" name="activo" checked>
                            <label class="form-check-label" for="flexSwitchCheckChecked">Activo</label>
                        </div>
                    </div>
                    <input class="form-control" type="text" name="registro" value="<?php echo $session_id ?>" style="display: none;">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" href="metas/store" class="btn btn-success" value="Enviar" />
            </div>
            </form>
        </div>
    </div>
</div>
<!-- ADD MODAL END -->

<!-- MODAL SHOW START -->
@foreach ($metas as $meta)
<div class="modal fade" id="modalshow{{ $meta->id_meta }}" tabindex="-1" aria-labelledby="modalshowLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalshowLabel">Meta | {{ $meta -> clave }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <p><strong>Nombre: </strong>{{ $meta->nombreM }}</p>
                    </div>
                    <div class="col-12">
                        <p><strong>Unidad de Medida: </strong>{{ $meta->unidadmedida }}</p>
                    </div>
                    <div class="col-6 text-center">
                        @if($meta->activo > 0) <strong>Estado: </strong>
                        <p style="color: green;">Activo</p>@else <strong>Estado: </strong>
                        <p style="color: red;">Inactivo</p>@endif
                    </div>
                    <div class="col-6 text-center">
                        <p><strong>Registro: </strong><br>{{ $meta->id_registro }}</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- MODAL SHOW END -->

<!-- MODAL EDIT START -->
@foreach ($metas as $meta)
<div class="modal fade" id="exampleModal{{ $meta->id_meta }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar Meta</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('editMeta', ['id' => $meta->id_meta]) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field('PATCH') }}
                    {{ method_field('PUT') }}
                    <div class="py-2">
                        <label for="exampleFormControlInput1" class="form-label">Clave de la meta:</label>
                        <input type="text" class="form-control" name="clave" value="{{ $meta -> clave }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nombre de la meta:</label>
                        <textarea type="text" class="form-control" name="nombre">{{ $meta -> nombreM }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Descripción de la meta:</label>
                        <textarea type="text" class="form-control" name="descripcion" rows="7">{{ $meta -> descripcion }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Unidad de Medida:</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" name="unidadmedida" value="{{ $meta -> unidadmedida }}">
                    </div>
                    <div class="mb-3">
                        <hr>
                        <label for=""> Programa:</label>
                        <select class="form-control form-select" aria-label="Default select example" name="programa_id" value="{{$meta->programa_id}}">
                            @foreach($Programas as $info)
                            <option value={{$info->id_programa}} {{ $info->id_programa == $meta->programa_id ?'selected':''; }}>{{$info->abreviatura}}</option>
                            @endforeach
                        </select>
                        <hr>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            @if($meta -> activo > 0)
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
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach
<!-- MODAL EDIT START -->

<!-- MODAL DELETE START -->
@foreach ($metas as $meta)
<div class="modal fade" id="deleteModal{{ $meta->id_meta }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel">Eliminar registro | {{ $meta->clave }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                ¿Realmente desea eliminar el registro?
                <p><strong>{{ $meta->nombreM }}</strong></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form action="{{ route('deleteMeta', ['id' => $meta->id_meta]) }}" method="POST" enctype="multipart/form-data">
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
<!-- MODAL DELETE END -->

@endsection