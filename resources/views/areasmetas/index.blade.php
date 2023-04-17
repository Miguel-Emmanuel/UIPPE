@extends('layout.navbar')
@section('content')
<?php
$session_id = session('session_id');
?>

<head>
    <script src="{{ asset('js\jquery-3.6.4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            // --------Programas =-> Metas---------------------------------------------------
            $("#programa").on('change', function() {
                var id_programa = $(this).find(":selected").val();
                console.log(id_programa);
                if (id_programa == 0) {
                    $("#metas").html('<option value="0">-- Seleccione un programa antes --</option>');
                    $("#multimetas").html('<select multiple data-search="true" data-silent-initial-value-set="true" name="id_area[]" id="multimetas"></select');
                    VirtualSelect.init({
                        ele: '#multimetas'
                    });
                } else {
                    $("#metas").load('js_metas?id_programa=' + id_programa);
                }
            });

            $("#metas").on('change', function() {
                var id_meta = $(this).find(":selected").val();
                console.log(id_meta);
                if (id_meta == 0) {
                    $("#multimetas").html('<select multiple data-search="true" data-silent-initial-value-set="true" name="id_area[]" id="multimetas"></select');
                    VirtualSelect.init({
                        ele: '#multimetas'
                    });
                } else {
                    $("#multimetas").load('js_areas?id_metas=' + id_meta);
                }
            });
        });
    </script>
</head>
<div class="container p-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard">Inicio</a></li>
            <li class="breadcrumb-item"><a href="registros">Registros</a></li>
            <li class="breadcrumb-item" aria-current="page">Áreas-Metas</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col p-4">
            <h3>ÁREAS | METAS</h3>
        </div>
        <div class="col p-4 d-flex justify-content-end">
            <button type="button" class="btn btn-success" id="btn_alta" data-bs-toggle="modal" data-bs-target="#modalalta"><i class="fa-solid fa-plus"></i></button>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
            <table class="table mt-3">
                <thead class="table-striped">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Área</th>
                        <th scope="col">Programa</th>
                        <th scope="col">Meta</th>
                        <th scope="col">Objetivo</th>
                        <th class="text-center" scope="col" colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($areasmetas as $info)
                    <tr>
                        <td>{{ $info->id_areasmetas }}</td>
                        <td>{{ $info->area }}</td>
                        <td>{{ $info->pnombre }}</td>
                        <td>{{ $info->nmeta }}</td>
                        <td>{{ $info->objetivo }}</td>
                        <td>
                            <!-- Button delete modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $info->id_areasmetas }}"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- MODAL DELETE START -->
@foreach ($areasmetasd as $areasmeta)
<div class="modal fade" id="deleteModal{{ $areasmeta->id_areasmetas }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel">
                    Eliminar registro | Área - Meta
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('areasmetas.destroy', $areasmeta) }}" method="post">
                    @csrf @method('DELETE')
                    <p><strong>Datos del Área - Meta</strong></p>
                    <p class="text-center"><strong>Programa:</strong> {{ $areasmeta->id_programa }} </p>
                    <p class="text-center"><strong>Meta:</strong> {{ $areasmeta->meta_id }} </p>
                    <p class="text-center"><strong>Área:</strong> {{ $areasmeta->area_id }} </p>
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
                    <div>
                        <label for="floatingInput">Selecciona un programa:</label>
                        <select class="form-select" name="id_programa" id="programa" data-search="true" data-silent-initial-value-set="true">
                            <option value="0" selected>--- Selecciona un Programa ---</option>
                            @foreach ($programas as $info)
                            <option value="{{$info->id_programa}}">{{$info->abreviatura}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="floatingInput">Selecciona una meta:</label>
                        <select class="form-select" name="id_meta" id="metas" data-search="true" data-silent-initial-value-set="true">
                            <option selected>--- Selecciona un Programa antes ---</option>
                        </select>
                    </div>
                    <div>
                        <label for="floatingInput">Selecciona una área:</label>
                        <select multiple data-search="true" data-silent-initial-value-set="true" name="id_area[]" id="multimetas">
                        </select>
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
@endsection