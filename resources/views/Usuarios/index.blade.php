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
                        <th class="text-center">Foto</th>
                        <th>Clave</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Genero</th>
                        <th>Académico</th>
                        <th>Email</th>
                        <th>Activo</th>
                        <th class="text-center" colspan="3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($Usuarios as $usuario)
                    <tr>
                        <td class="text-center"><img src="{{ asset('img/post/'.$usuario-> foto) }}" alt="{{ $usuario->foto }}" style="width: 45px; border-radius: 15px;"></td>
                        <td>{{ $usuario->clave}}</td>
                        <td>{{ $usuario->nombre}}</td>
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
                            <button type="button" class="btn btn-danger" disabled data-bs-toggle="modal" data-bs-target="#deleteModal{{ $usuario->id_usuario }}"><i class="fa-solid fa-trash"></i></button>
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
@foreach ($Usuarios as $usuario )
<div class="modal fade" id="deleteModal{{ $usuario->id_usuario }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel">Eliminar Usuarios</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                ¿Realmente desea eliminar el registro?
                <strong>
                    <p>{{$usuario -> clave .' | '. $usuario -> nombre .' '. $usuario -> app .' '. $usuario->apm}}</p>
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
                    <p><strong>Nombre: </strong><br>{{$usuario -> nombre .' '. $usuario -> app .' '. $usuario->apm}}</p>
                    <div class="col-6 text-center">
                        <p><strong>Fecha de nacimiento: </strong><br>{{$usuario -> fn}}</p>
                    </div>
                    <div class="col-6 text-center">
                    <strong>Estado: </strong>@if($usuario -> activo > 0) <p style="color: green;">Activo</p> @else <p style="color: red;">Inactivo</p> @endif
                    </div>
                    <p><strong>Academico: </strong>{{$usuario -> academico}}</p>
                    <p><strong>Correo: </strong>{{$usuario -> email}}</p>
                    <!-- <p>Tipo: {{$usuario -> id_tipo}}</p> -->
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
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" name="clave" placeholder="name@example.com" value="{{ $usuario -> clave }}">
                    <label for="floatingInput">Clave:</label>
                </div>
                <div class="row py-2">
                    <div class="col">
                        <label for="exampleInputEmail1" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" aria-label="First name" value="{{ $usuario -> nombre }}">
                    </div>
                    <div class="col">
                        <label for="exampleInputEmail1" class="form-label">Apellido Paterno:</label>
                        <input type="text" class="form-control" aria-label="Last name" value="{{ $usuario -> app }}">
                    </div>
                    <div class="col">
                        <label for="exampleInputEmail1" class="form-label">Apellido Materno:</label>
                        <input type="text" class="form-control" aria-label="Last name" value="{{ $usuario -> apm }}">
                    </div>
                </div>
                <div class="py-2">
                    <label for="colFormLabelSm" class="form-label">Sexo | Genero :</label>
                    @if($usuario->gen == "F")
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Masculino
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                            Femenino
                        </label>
                    </div>
                    @else
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                        <label class="form-check-label" for="flexCheckDefault">
                            Masculino
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
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
                    <input type="text" class="form-control" id="formGroupExampleInput" value="{{ $usuario -> academico }}">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Seleccione una foto de perfil:</label>
                    <input class="form-control" type="file" id="formFile">
                </div>
                <div class="mb-3">
                    <hr>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Tipos de usuario</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <hr>
                </div>
                <div class="mb-3">
                    <div class="form-check form-switch">
                        @if($usuario -> activo > 0)
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
                <button type="button" class="btn btn-success">Editar</button>
            </div>
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
                <form action="{{ route('usuarios.store') }}" method="POST" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="clave" placeholder="name@example.com">
                        <label for="floatingInput">Clave:</label>
                    </div>
                    <div class="row py-2">
                        <div class="col">
                            <label for="exampleInputEmail1" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" aria-label="First name" name="nombre">
                        </div>
                        <div class="col">
                            <label for="exampleInputEmail1" class="form-label">Apellido Paterno:</label>
                            <input type="text" class="form-control" aria-label="Last name" name="app">
                        </div>
                        <div class="col">
                            <label for="exampleInputEmail1" class="form-label">Apellido Materno:</label>
                            <input type="text" class="form-control" aria-label="Last name" name="apm">
                        </div>
                    </div>
                    <div class="py-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gen" id="flexRadioDefault1" value="F" checked>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Femenino
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gen" id="flexRadioDefault2" value="M">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Masculino
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Fecha de nacimiento:</label>
                        <input type="date" class="form-control" id="fn" name="fn">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Académico:</label>
                        <input type="text" class="form-control" name="academico">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email:</label>
                        <input type="email" class="form-control" name="email" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Seleccione una foto de perfil:</label>
                        <input class="form-control" type="file" name="foto">
                    </div>
                    <div class="mb-3">
                        <hr>
                        <select class="form-select" aria-label="Default select example" name="id_tipo">
                            <option selected>Tipos de usuario</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        <hr>
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" name="activo" checked>
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