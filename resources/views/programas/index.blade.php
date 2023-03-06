@extends('layout.navbar')
@section('content')
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
                        <th scope="col">Registro</th>
                        <th scope="col" class="text-center" colspan="3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($programas as $info)
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
                        <td class="text-center">{{ $info->id_registro }}</td>
                        <td>
                            <!-- Button show modal -->
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalshow{{ $info->id_programa }}"><i class="fa-solid fa-eye"></i></button>
                        </td>
                        <td>
                            <!-- Button edit modal -->
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $info->id_programa }}"><i class="fa-solid fa-pen-to-square"></i></button>
                        </td>
                        <td>
                            <!-- Button delete modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $info->id_programa }}"><i class="fa-solid fa-trash"></i></button>
                        </td>
                </tbody>
                @endforeach
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
                <a href="{{ route('programas.destroy', ['programa' => $info->id_programa]) }}">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">BORRAR</button>
                </a>
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
                <h1 class="modal-title fs-5" id="modalshowLabel">Programa | {{ $info -> abreviatura }}</h1>
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
                        @if($info->activo > 0) <strong>Estado: </strong> <p style="color: green;">Activo</p>@else <strong>Estado: </strong> <p style="color: red;">Inactivo</p>@endif
                    </div>
                    <div class="col-6 text-center">
                        <p><strong>Registro: </strong><br>{{ $info->id_registro }}</p>
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
@foreach ($programas as $info)
<div class="modal fade" id="exampleModal{{ $info->id_programa }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">MODIFICAR PROGRAMA</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="py-2">
                    <label for="exampleFormControlInput1" class="form-label">Siglas del programa:</label>
                    <input type="text" class="form-control" name="siglas" value="{{ $info -> abreviatura }}">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nombre del programa:</label>
                    <textarea type="text" class="form-control" name="nombre">{{ $info -> nombre }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Descripción del programa:</label>
                    <textarea type="text" class="form-control" name="descripcion" rows="7">{{ $info -> descripcion }}</textarea>
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        @if($info -> activo > 0)
                        <input class="form-check-input" type="checkbox" name="activo" checked>
                        @else
                        <input class="form-check-input" type="checkbox" name="activo">
                        @endif
                        <label class="form-check-label" for="flexSwitchCheckChecked">Activo</label>
                    </div>
                </div>
                <!-- id de registro -->
                {{-- <input type="hidden" name="id_registro" value="@foreach($id as $uwu){{ $uwu -> id_empleado + 1}}@endforeach"> --}}
            </div>
            <br><br>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
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
                    <div>
                        <label for="exampleFormControlInput1" class="form-label">Siglas del programa:</label>
                        <input type="text" class="form-control" name="siglas" placeholder="UIPPE">
                    </div>
                    <div>
                        <label for="exampleFormControlInput1" class="form-label">Nombre del programa:</label>
                        <textarea type="text" class="form-control" name="nombre"></textarea>
                    </div>
                    <div>
                        <label for="exampleFormControlInput1" class="form-label">Descripción del programa:</label>
                        <textarea type="text" class="form-control" name="descripcion" rows="7"></textarea>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="activo" checked>
                            <label class="form-check-label" for="flexSwitchCheckChecked">Activo</label>
                        </div>
                    </div>
                    <!-- id de registro -->
                    {{-- <input type="hidden" name="id_registro" value="@foreach($id as $uwu){{ $uwu -> id_empleado + 1}}@endforeach"> --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Agregar</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- MODAL ADD END -->
</div>

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
@endsection