@yield('modales')
<!-- MODAL DELETE START -->
@foreach ($areasmetasd as $areasmeta)
<div class="modal fade" id="deleteModal{{ $areasmeta->areasmeta }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel">
                    Eliminar registro | Área - Meta
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('areasmetas.destroy', ['areasmeta' => $areasmeta->areasmeta ])  }}" method="post">
                    @csrf @method('DELETE')
                    <p><strong>Datos del Área - Meta</strong></p>
                    <p class="text-center"><strong>Programa:</strong> {{ $areasmeta->pnombre }} </p>
                    <p class="text-center"><strong>Meta:</strong> {{ $areasmeta->nmeta }} </p>
                    <p class="text-center"><strong>Área:</strong> {{ $areasmeta->area }} </p>
                    <p><strong>Objetivos:</strong></p>
                    <p>{{ $areasmeta->objetivo }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Eliminar</button>
            </div>
            </form>
        </div>

    </div>
</div>
@endforeach
<!-- MODAL DELETE END -->

<!-- MODAL ADD START -->
<div class="modal fade" id="modalalta" tabindex="-1" aria-labelledby="modalaltaLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalalta">Alta de areas metas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('areasmetas.store') }}" method="POST" class="row g-3" enctype="multipart/form-data">
                    @csrf
                    @include('components.flash_alerts')
                    <div>
                        <label for="floatingInput">Selecciona un programa:</label>
                        <select class="form-select" name="id_programa" id="programa" data-search="true" data-silent-initial-value-set="true">
                            <option value="null" selected>--- Selecciona un Programa ---</option>
                            @foreach ($programas as $info)
                            <option value="{{$info->id_programa}}">{{$info->abreviatura}}</option>
                            @endforeach
                        </select>
                        @error('id_programa')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div>
                        <label for="floatingInput">Selecciona una meta:</label>
                        <select class="form-select" name="id_meta" id="metas" data-search="true" data-silent-initial-value-set="true">
                            <option value="null" selected>--- Selecciona un Programa antes ---</option>
                        </select>
                        @error('meta_id')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div>
                        <label for="floatingInput">Selecciona una área:</label>
                        <select multiple data-search="true" data-silent-initial-value-set="true" name="id_area[]" id="multimetas">
                        </select>
                        @error('area_id')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div multiple data-search="true" data-silent-initial-value-set="true" class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" name="objetivo" style="height: 100px"></textarea>
                        <label for="floatingTextarea2">Objetivo:</label>
                    </div>
                    <input class="form-control" type="text" name="registro" value="<?php echo $session_id ?>" style="display: none;">
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
        ele: '#multimetas'
    });
</script>

<!-- SCRIPT MODAL END -->

