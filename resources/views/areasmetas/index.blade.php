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
@include('areasmetas.modales')
@endsection
