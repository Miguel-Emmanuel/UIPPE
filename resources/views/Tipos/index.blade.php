@extends('layout.navbar')
@section('content')
<div class="container">
    <div class="row">
        <div class="col p-4">
            <h3>Usuarios</h3>
        </div>
        <div class="col p-4 d-flex justify-content-end">
            <button type="button" class="btn btn-success" id="btn_alta" data-bs-toggle="modal" data-bs-target="#modalalta"><i class="fa-solid fa-plus"></i></button>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Clave</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Activo</th>
                        <th colspan="3">Operaciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($Tipos as $tipo)
                    <tr>
                        <td>{{ $tipo->clave}}</td>
                        <td>{{ $tipo->nombre}}</td>
                        <td>{{ $tipo->descripcion}}</td>
                        <td>
                            @if($tipo -> activo > 0)
                            <p style="color: green;">Activo</p>
                            @else
                            <p style="color: red;">Inactivo</p>
                            @endif
                        </td>
                        <td>
                            <!-- Button show modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalshow{{ $tipo->id }}"><i class="fa-solid fa-eye"></i></button>
                        </td>
                        <td>
                            <!-- Button modif modal -->
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $tipo->id }}"><i class="fa-solid fa-pen-to-square"></i></button>
                        </td>
                        <td>
                            <!-- Button delete modal -->
                            @if($tipo -> activo > 0)
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $tipo->id }}"><i class="fa-solid fa-trash"></i></button>
                            @else
                            <button type="button" class="btn btn-danger" disabled data-bs-toggle="modal" data-bs-target="#deleteModal{{ $tipo->id }}"><i class="fa-solid fa-trash"></i></button>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



<!-- ELIMINAR START MODAL -->
@foreach ($Tipos as $tipo )
<div class="modal fade" id="deleteModal{{ $tipo->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel">Eliminar Tipo de Usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                ¿Realmente desea eliminar el registro?
                <strong>
                    <p>{{$tipo -> clave .' | '. $tipo -> nombre }}</p>
                </strong>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger">Eliminar</button>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- ELIMINAR END MODAL -->

<!-- SHOW MODAL START -->
@foreach ($Tipos as $tipo)
<div class="modal fade" id="modalshow{{ $tipo->id }}" tabindex="-1" aria-labelledby="modalshowLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalshowLabel">Detalles | {{ $tipo -> clave }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Nombre: {{$tipo -> nombre }}</p>
                <p>Descripción: {{$tipo -> decripción}}</p>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- SHOW MODAL END -->


<!-- EDIT MODAL START -->
@foreach ($Tipos as $tipo)
<div class="modal fade" id="exampleModal{{ $tipo->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Registro</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="clave" placeholder="name@example.com" value="{{ $tipo -> clave }}">
                        <label for="floatingInput">Clave:</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="descripcion" placeholder="name@example.com" value="{{ $tipo -> nombre }}">
                        <label for="floatingInput">Nombre:</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="descripcion" placeholder="name@example.com" value="{{ $tipo -> descripcion }}">
                        <label for="floatingInput">Descripción:</label>
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-switch">
                            @if($tipo -> activo > 0)
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                            @else
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                            @endif
                            <label class="form-check-label" for="flexSwitchCheckChecked">Activo</label>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" href="#" class="btn btn-success" value="Enviar" />
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('tipos.store') }}" method="POST" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="clave" placeholder="name@example.com">
                        <label for="floatingInput">Clave:</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="nombre" placeholder="name@example.com">
                        <label for="floatingInput">Nombre:</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="descripcion" placeholder="name@example.com">
                        <label for="floatingInput">Descripción:</label>
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
                <input type="submit" href="tipos/store" class="btn btn-success" value="Enviar" />
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