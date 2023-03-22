@extends('layout.navbar')
@section('content')

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
                    } else {
                        $("#metas").load('js_metas?id_programa=' + id_programa);


                    }
                });

                // -------- Metas - > Areas---------------------------------------------------
                $("#metas").on('change', function() {
                    // VirtualSelect.init({ ele: '#areas' });
                    var id_meta = $(this).find(":selected").val();

                    console.log(id_meta);
                    if (id_meta == 0) {
                        $("#areas").html('<option value="0">-- Seleccione una meta antes  --</option>');
                    } else {
                        var id_programa2 = $("#programa").find(":selected").val();
                        $(".areas").load('js_areas?id_meta=' + id_meta + '&&id_programa=' + id_programa2);
                        console.log("progrma" + id_programa2);

                    }
                });

            });
        </script>

    </head>


    <div class="container">
        <div class="row">
            <div class="col p-4">
                <h3>AREAS | METAS</h3>
            </div>
            <div class="col p-4 d-flex justify-content-end">
                <button type="button" class="btn btn-success" id="btn_alta" data-bs-toggle="modal"
                    data-bs-target="#modalalta"><i class="fa-solid fa-plus"></i></button>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">

                <body>
                    <table class="table table-striped mt-3">
                        <thead class="table-success table-striped">

                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"> AREA</th>
                                <th scope="col"> PROGRAMA</th>
                                <th scope="col"> META</th>
                                <th scope="col">OBJETIVO</th>
                                <th scope="col" colspan="3">ACCIONES</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($areasmetas as $info)
                                    <td>{{ $info->id_areasmetas }}</td>
                                    <td>{{ $info->area }}</td>
                                    <td>{{ $info->pnombre }}</td>
                                    <td>{{ $info->nmeta }}</td>
                                    <td>{{ $info->objetivo }}</td>
                                    <td>
                                        <!-- Button show modal -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#modalshow{{ $info->id_areasmetas }}"><i
                                                class="fa-solid fa-eye"></i></button>
                                    </td>
                                    <td>
                                        <!-- Button edit modal -->
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal{{ $info->id_areasmetas }}"><i
                                                class="fa-solid fa-pen-to-square"></i></button>

                                        <!-- Button delete modal -->
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $info->id_areasmetas }}"><i
                                                class="fa-solid fa-trash"></i></button>
                                    </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>


            </div>
        </div>
        <!-- MODAL DELETE START -->
        @foreach ($areasmetasd as $areasmeta)
            <div class="modal fade" id="deleteModal{{ $areasmeta->id_areasmetas }}" tabindex="-1"
                aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="deleteModalLabel">Eliminar registro |
                                {{ $areasmeta->id_areasmetas }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                            <form action="{{ route('areasmetas.destroy', $areasmeta) }}" method="post">
                                @csrf @method('DELETE')



                                <p><strong>{{ $areasmeta->id_areasmetas }}</strong></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary">Cancelar</button>


                            <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">BORRAR</button>

                        </div>


                        </form>
                    </div>

                </div>
            </div>
    </div>
    </div>
    @endforeach
    <!-- MODAL DELETE END -->


    <!-- MODAL SHOW START -->
    @foreach ($areasmetas as $info)
        <div class="modal fade" id="modalshow{{ $info->id_areasmetas }}" tabindex="-1" aria-labelledby="modalshowLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalshowLabel">AREAS METAS | {{ $info->id_areasmetas }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 p-3 text-center">
                                <p><strong>Nombre: </strong>{{ $info->id_areasmetas }}</p>
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
    @foreach ($areasmetas as $info)
        <div class="modal fade" id="exampleModal{{ $info->id_areasmetas }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">MODIFICAR RELACION</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('areasmetas.update', $info->id_areasmetas) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <select multiple placeholder="METAS" data-search="true" data-silent-initial-value-set="true"
                                name="id_meta[]">

                                @foreach ($metas as $info)
                                    <option value="{{ $info->id_meta }}">
                                        {{ $info->nombre }}
                                    </option>
                                @endforeach

                            </select>
                            <select multiple placeholder="PROGRAMAS" data-search="true"
                                data-silent-initial-value-set="true" name="id_programa[]">

                                @foreach ($programas as $info)
                                    <option value=" {{ $info->id_programa }}">
                                        {{ $info->nombre }}
                                    </option>
                                @endforeach

                            </select>
                            <select multiple placeholder="AREAS" data-search="true" data-silent-initial-value-set="true"
                                name="id_area[]">

                                @foreach ($areas as $info)
                                    <option value="{{ $info->id_area }}">
                                        {{ $info->nombre }}
                                    </option>
                                @endforeach

                            </select>

                            <div class="form-floating mb-3">


                                <input type="text" class="form-control" id="floatingInput" name="objetivo"
                                    value="{{ $info->objetivo }}">
                                <label for="floatingInput">OBJETIVO: {{ $info->objetivo }} </label>

                            </div>

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
                    <h5 class="modal-title" id="modalalta">Alta de areas metas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('areasmetas.store') }}" method="POST" class="row g-3"
                        enctype="multipart/form-data">
                        @csrf

                        <select placeholder="PROGRAMAS" name="id_programa" id="programa">
                            <option value="0" selected>--- Selecciona un Programa ---</option>
                            @foreach ($programas as $info)
                                <option value="{{ $info->id_programa }}">
                                    {{ $info->abreviatura }}
                                </option>
                            @endforeach

                        </select>
                        <select name="id_meta" id="metas">
                            <option selected>--- Selecciona un Programa antes ---</option>

                        </select>
                        <div class="areas">
                            <select name="id_area[]" id="areas">
                                <option selected>--- Selecciona un Programa antes ---</option>

                            </select>
                        </div>


                        <div class="py-3">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="objetivo"
                                    placeholder="name@example.com">
                                <label for="floatingInput">OBJETIVO: </label>
                            </div>

                            <small class="form-text text-danger"></small>

                        </div>

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


    <!-- SCRIPT MODAL END -->
@endsection
