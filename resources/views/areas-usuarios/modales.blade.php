@yield('modales')

<!-- ELIMINAR START MODAL -->
@foreach ($areausuario as $info )
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
                <a href="#">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Borrar</button>
                </a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- ELIMINAR END MODAL -->

<!-- SHOW MODAL START -->
@foreach ($areausuario as $info)
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
@foreach ($areausuario as $info)
<div class="modal fade" id="exampleModal{{ $info->id_area }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Registro</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" enctype="multipart/form-data">
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Área-usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('areausuario.store')}}" method="POST" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div>
                        <label for="floatingInput">Selecciona un area:</label>
                        <select name="area_id" id="area_id" aria-label="floating label selext example" data-search="true" data-silent-initial-value-set="true" >
                            @foreach ($areas as $info)
                            <option value="{{$info->id_area}}">{{$info->nombre}}</option>
                            @endforeach
                        </select>
                    </div>

                    <hr class="sidebar-divider">

                    <div>
                        <label for="floatingInput">Selecciona uno o varios usuarios:</label>
                        <select multiple data-search="true" data-silent-initial-value-set="true"  name="usuario_id[]">
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

<script type="text/javascript" src="js/virtual-select.min.js"></script>

    <script type="text/javascript">
        VirtualSelect.init({
            ele: 'select'
        });
    </script>
