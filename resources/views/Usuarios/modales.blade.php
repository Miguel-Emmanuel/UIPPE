@yield('modales')
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
                    <p>{{$usuario -> clave .' | '. $usuario -> nombreU .' '. $usuario -> app .' '. $usuario->apm}}</p>
                </strong>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary">Cancelar</button>
                <form action="{{ route('deleteUsers', ['id' => $usuario->id_usuario]) }}" method="POST" enctype="multipart/form-data">
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
                            <option value={{$info->id}} {{ $info->id == $usuario->id_tipo ?'selected':''; }}>{{$info->nombre}}</option>
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
                    @include('components.flash_alerts')
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="clave" placeholder="name@example.com">
                        <label for="floatingInput">Clave:</label>
                        @error('clave')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="row py-2">
                        <div class="col">
                            <label for="exampleInputEmail1" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" aria-label="First name" name="nombre">
                            @error('nombre')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="exampleInputEmail1" class="form-label">Apellido Paterno:</label>
                            <input type="text" class="form-control" aria-label="Last name" name="app">
                            @error('app')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="exampleInputEmail1" class="form-label">Apellido Materno:</label>
                            <input type="text" class="form-control" aria-label="Last name" name="apm">
                            @error('apm')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
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
                        @error('email')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Seleccione una foto de perfil:</label>
                        <input class="form-control" type="file" name="foto">
                    </div>
                    <div class="mb-3">
                        <hr>
                        <label for=""> Tipo de usuario:</label>
                        <select class="form-control form-select" aria-label="Default select example" name="id_tipo">
                            <option value="">Elige al tipo de usuario</option>
                            @foreach($Tipos as $info)
                            <option value={{$info->id}}>{{$info->nombre}}</option>
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
