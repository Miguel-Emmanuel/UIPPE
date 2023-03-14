@extends('layout.navbar')
@section('content')
<?php
$session_id = session('session_id');
?>
<div class="container">
    <div class="row">
        <div class="col p-4">
            <h3>Programas</h3>
        </div>
        <div class="col p-4 d-flex justify-content-end">
            <button type="button" class="btn btn-success" id="btn_alta" data-bs-toggle="modal" data-bs-target="#modalalta"><i class="fa-solid fa-plus"></i></button>
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
</div>

<!-- MODAL DELETE START -->
@foreach ($programas as $info)
<div class="modal fade" id="deleteModal{{ $info->id_programa }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel">Eliminar registro | {{ $info->abreviatura }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                ¿Realmente desea eliminar el registro?
                <p><strong>{{ $info->nombre }}</strong></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary">Cancelar</button>
                <form action="{{ route('deleteProgram', ['id' => $info->id_programa]) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field('PATCH') }}
                    {{ method_field('PUT') }}
                    <!-- Id Registro -->
                    <input class="form-control" type="text" name="registro" value="<?php echo $session_id ?>" style="display: none;">
                    <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Borrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- MODAL DELETE END -->

<!-- MODAL SHOW START -->
@foreach ($programas as $info)
<div class="modal fade" id="modalshow{{ $info->id_programa }}" tabindex="-1" aria-labelledby="modalshowLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalshowLabel">Programa | {{ $info->abreviatura }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 p-3 text-center">
                        <p><strong>Nombre: </strong>{{ $info->nombre }}</p>
                    </div>
                    <div class="col-12">
                        <p><strong>Descripción</strong><br>{{ $info->descripcion }}</p>
                    </div>
                    <div class="col-6 text-center">
                        @if ($info->activo > 0)
                        <strong>Estado: </strong>
                        <p style="color: green;">Activo</p>
                        @else
                        <strong>Estado: </strong>
                        <p style="color: red;">Inactivo</p>
                        @endif
                    </div>
                    <div class="col-6 text-center">
                        <p><strong>Registro: </strong><br>{{ $info->id_registro }}</p>
                    </div>
                </div>
            </div>
            <!-- Id Registro -->
            <input class="form-control" type="text" name="registro" value="<?php echo $session_id ?>" style="display: none;">
        </div>
        <br><br>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Editar</button>
        </div>
        </form>
    </div>
</div>
@endforeach
<!-- MODAL SHOW END -->

<!-- MODAL EDIT START -->
@foreach ($programas as $info)
<div class="modal fade" id="exampleModal{{ $info->id_programa }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">MODIFICAR PROGRAMA</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('editProgram', ['id' => $info->id_programa]) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field('PATCH') }}
                    {{ method_field('PUT') }}
                    <div class="py-2">
                        <label for="exampleFormControlInput1" class="form-label">Siglas del programa:</label>
                        <input type="text" class="form-control" name="abreviatura" value="{{ $info->abreviatura }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nombre del programa:</label>
                        <textarea type="text" class="form-control" name="nombre">{{ $info->nombre }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Descripción del programa:</label>
                        <textarea type="text" class="form-control" name="descripcion" rows="7">{{ $info->descripcion }}</textarea>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            @if ($info->activo > 0)
                            <input class="form-check-input" type="checkbox" name="activo" checked>
                            @else
                            <input class="form-check-input" type="checkbox" name="activo">
                            @endif
                            <label class="form-check-label" for="flexSwitchCheckChecked">Activo</label>
                        </div>
                    </div>
                    <input class="form-control" type="text" name="registro" value="<?php echo $session_id ?>" style="display: none;">
            </div>
            <br><br>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Editar</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach
<!-- MODAL EDIT START -->

<!-- MODAL ADD START -->
<div class="modal fade" id="modalalta" tabindex="-1" aria-labelledby="modalaltaLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalalta">Alta de programas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('programas.store') }}" method="POST" class="row g-3" enctype="multipart/form-data">
                    @csrf
                    @include('components.flash_alerts')
                    <div>
                        <label for="exampleFormControlInput1" class="form-label">Siglas del programa:</label>
                        <input type="text" class="form-control" name="abreviatura" placeholder="UIPPE">
                        @error('abreviatura')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div>
                        <label for="exampleFormControlInput1" class="form-label">Nombre del programa:</label>
                        <textarea type="text" class="form-control" name="nombre"></textarea>
                        @error('nombre')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div>
                        <label for="exampleFormControlInput1" class="form-label">Descripción del programa:</label>
                        <textarea type="text" class="form-control" name="descripcion" rows="7"></textarea>
                        @error('descripcion')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="activo" checked>
                            <label class="form-check-label" for="flexSwitchCheckChecked">Activo</label>
                        </div>
                    </div>
                    <!-- id de registro -->
                    <input class="form-control" type="text" name="registro" value="<?php echo $session_id ?>" style="display: none;">
            </div>
        </div>
    </div>
    <!-- MODAL ADD END -->
</div>


<!-- SCRIPT MODAL START -->
<script>
    // Para que la alerta desparezca despues de dos segunditos papu
    window.setTimeout(function() {
        $(".alert").fadeTo(1000, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 2000);
</script>

<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>


<script>
    $(document).ready(function() {
        $('#dts').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json'
            }
        });
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
@endsection