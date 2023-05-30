@extends('layout.navbar')
@section('dataTablesCss')
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
@endsection
@section('content')
<?php
$session_id = session('session_id');
$session_name = session('session_name');
$session_tipo = session('session_tipo');
$session_area = session('session_area');
?>
<title>Calendario</title>
@if($session_id)
@if($session_area != "")

<div class="container p-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard">Inicio</a></li>
            <li class="breadcrumb-item" aria-current="page">Calendario</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-12 p-4">
            <h3>Calendario Meta</h3>
        </div>
            <div class="col-xs-4 col-md-4 col-xl-4 d-flex">
                <i class='bx bxs-rectangle mx-3 my-1' style="color: #8b67cc;"></i>
                <p>Registro en meses mayor a la cantidad</p>
            </div>
            <div class="col-xs-4 col-md-4 col-xl-4 d-flex">
                <i class='bx bxs-rectangle text-success mx-3 my-1'></i>
                <p>Meta completada</p>
            </div>
        <!-- Tabla de metas completadas -->
        <div class="table-responsive my-4">
            <table class="table" id="metasComp">
                <thead class="table-light">
                    <!-- Campos en tabla metas -->
                    <tr>
                        <th class="text-center">Clave</th>
                        <th>Programa</th>
                        <th>Meta</th>
                        <th class="text-center">Cantidad Alcanzada</th>
                        <th class="text-center">Cantidad Establecida</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Regitros en tabla metas -->
                    @foreach($areasconMeses as $meta)
                        @if($session_area == $meta->area_id)
                            @if($meta->meses_c >= $meta->cantidad_c)
                            <tr id="tr{{ $meta -> id_areasmetas }}" style="background-color: #dc3545; color: white;">
                                <td class="text-center">{{ $meta -> id_areasmetas }}</td>
                                <td>{{ $meta -> nombrePA }}</td>
                                <td>{{$meta->nombreM}}</td>
                                <td>
                                <div class="text-center" id="cantAlcanzada{{ $meta->id_areasmetas }}">0</div>
                                </td>
                                <td>
                                    <input type="number" onkeyup="mostrar{{ $meta->id_areasmetas }}(this.value)" class="form-control" id="cantEntrega{{ $meta->id_areasmetas }}" placeholder="Cantidad a entregar:" value="50">
                                </td>
                                <!-- Button calendar modal -->
                                <td class="text-center">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalshow{{ $meta->id_areasmetas }}"><i class="fa-solid fa-calendar"></i></button>
                                </td>
                            </tr>
                            @endif
                        @elseif($session_area == 0)
                            @if($meta->meses_c >= $meta->cantidad_c)
                            <tr id="tr{{ $meta -> id_areasmetas }}" style="background-color: #dc3545; color: white;">
                                <td class="text-center">{{ $meta -> id_areasmetas }}</td>
                                <td>{{ $meta -> nombrePA }}</td>
                                <td>{{$meta->nombreM}}</td>
                                <td>
                                <div class="text-center" id="cantAlcanzada{{ $meta->id_areasmetas }}">0</div>
                                </td>
                                <td>
                                    <input type="number" onkeyup="mostrar{{ $meta->id_areasmetas }}(this.value)" class="form-control" id="cantEntrega{{ $meta->id_areasmetas }}" placeholder="Cantidad a entregar:" value="50">
                                </td>
                                <!-- Button calendar modal -->
                                <td class="text-center">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalshow{{ $meta->id_areasmetas }}"><i class="fa-solid fa-calendar"></i></button>
                                </td>
                            </tr>
                            @endif
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-xs-4 col-md-4 col-xl-4 d-flex">
            <i class='bx bxs-rectangle text-warning mx-3 my-1'></i>
            <p>Meta por completar</p>
        </div>
        <div class="col-xs-4 col-md-4 col-xl-4 d-flex">
            <i class='bx bxs-rectangle text-danger mx-3 my-1'></i>
            <p>Meta sin registro eficiente</p>
        </div>
        <!-- Tabla de metas por completar -->
        <div class="table-responsive my-4">
            <table class="table" id="metasSin">
                <thead class="table-light">
                    <!-- Campos en tabla metas -->
                    <tr>
                        <th class="text-center">Clave</th>
                        <th>Programa</th>
                        <th>Meta</th>
                        <th class="text-center">Cantidad Alcanzada</th>
                        <th class="text-center">Cantidad Establecida</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Regitros en tabla metas -->
                    @foreach($areasmetas as $meta)
                        @if($session_area == $meta->area_id)
                        <tr id="tr{{ $meta -> id_areasmetas }}" style="background-color: #dc3545; color: white;">
                            <td class="text-center">{{ $meta -> id_areasmetas }}</td>
                            <td>{{ $meta -> nombrePA }}</td>
                            <td>{{$meta->nombreM}}</td>
                            <td>
                                <div class="text-center" id="cantAlcanzada{{ $meta->id_areasmetas }}">0</div>
                            </td>
                            <td>
                                <input type="number" onkeyup="mostrar{{ $meta->id_areasmetas }}(this.value)" class="form-control" id="cantEntrega{{ $meta->id_areasmetas }}" placeholder="Cantidad a entregar:" value="50">
                            </td>
                            <!-- Button calendar modal -->
                            <td class="text-center">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalshow{{ $meta->id_areasmetas }}"><i class="fa-solid fa-calendar"></i></button>
                            </td>
                        </tr>
                        @elseif($session_area == 0)
                        <tr id="tr{{ $meta -> id_areasmetas }}" style="background-color: #dc3545; color: white;">
                            <td class="text-center">{{ $meta -> id_areasmetas }}</td>
                            <td>{{ $meta -> nombrePA }}</td>
                            <td>{{$meta->nombreM}}</td>
                            <td>
                                <div class="text-center" id="cantAlcanzada{{ $meta->id_areasmetas }}">0</div>
                            </td>
                            <td>
                                <input type="number" onkeyup="mostrar{{ $meta->id_areasmetas }}(this.value)" class="form-control" id="cantEntrega{{ $meta->id_areasmetas }}" placeholder="Cantidad a entregar:" value="50">
                            </td>
                            <!-- Button calendar modal -->
                            <td class="text-center">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalshow{{ $meta->id_areasmetas }}"><i class="fa-solid fa-calendar"></i></button>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@else
<div class="container p-4">
    <div class="row">
        <div class="col p-4">
            <h3>Calendario</h3>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 py-3 text-center">
            <img src="{{ asset('img/login.png') }}" alt="Inicie Sesión para poder ver el contenido" class="img-fluid" style="width: 800px;">
            <p>Para ver el contenido <a href="/login">Iniciar Sesión</a></p>
        </div>
    </div>
</div>
@endif


<!-- MODAL MESES START -->
@foreach ($areasmetas as $meta)
<div class="modal fade" id="modalshow{{ $meta->id_areasmetas }}" tabindex="-1" aria-labelledby="modalshowLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalshowLabel">Asignar entrega por Mes</h1>
                <div style="margin-left: 180px;" id="sumaTotal{{ $meta->id_areasmetas }}"></div><div id="res{{ $meta->id_areasmetas }}"></div>
            </div>
            <div class="modal-body">
                <form action="" method="" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Enero:</label>
                        <div class="col-sm-9">
                            <input type="number" id="sum0{{ $meta->id_areasmetas }}" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control" placeholder="Asignar la cantidad de Enero">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Febrero:</label>
                        <div class="col-sm-9">
                            <input type="number" id="sum1{{ $meta->id_areasmetas }}" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control" placeholder="Asignar la cantidad de Febrero">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Marzo:</label>
                        <div class="col-sm-9">
                            <input type="number" id="sum2{{ $meta->id_areasmetas }}" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control" placeholder="Asignar la cantidad de Marzo">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Abril:</label>
                        <div class="col-sm-9">
                            <input type="number" id="sum3{{ $meta->id_areasmetas }}" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control" placeholder="Asignar la cantidad de Abril">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Mayo:</label>
                        <div class="col-sm-9">
                            <input type="number" id="sum4{{ $meta->id_areasmetas }}" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control" placeholder="Asignar la cantidad de Mayo">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-6 col-md-3 col-form-label">Junio:</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="number" id="sum5{{ $meta->id_areasmetas }}" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control" placeholder="Asignar la cantidad de Junio">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Julio:</label>
                        <div class="col-sm-9">
                            <input type="number" id="sum6{{ $meta->id_areasmetas }}" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control" placeholder="Asignar la cantidad de Julio">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Agosto:</label>
                        <div class="col-sm-9">
                            <input type="number" id="sum7{{ $meta->id_areasmetas }}" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control" placeholder="Asignar la cantidad de Agosto">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Septiembre:</label>
                        <div class="col-sm-9">
                            <input type="number" id="sum8{{ $meta->id_areasmetas }}" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control" placeholder="Asignar la cantidad de Septiembre">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Octubre:</label>
                        <div class="col-sm-9">
                            <input type="number" id="sum9{{ $meta->id_areasmetas }}" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control" placeholder="Asignar la cantidad de Octubre">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Noviembre:</label>
                        <div class="col-sm-9">
                            <input type="number" id="sum10{{ $meta->id_areasmetas }}" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control" placeholder="Asignar la cantidad de Noviembre">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Diciembre:</label>
                        <div class="col-sm-9">
                            <input type="number" id="sum11{{ $meta->id_areasmetas }}" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control" placeholder="Asignar la cantidad de Diciembre">
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <input class="form-control" type="text" name="registro" value="<?php echo $session_id ?>" style="display: none;">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    mostrar{{ $meta->id_areasmetas }} = (valor) => {
        document.getElementById("res{{ $meta->id_areasmetas }}").innerHTML = "/ "+valor;
    };

    var sumaT = 0;
    suma{{ $meta->id_areasmetas }} = () => {
        sumaT = 0;
        var input = new Array;
        for(var i=0; i<12; i++){
            input.push(document.getElementById("sum"+i+"{{ $meta->id_areasmetas }}").value || 0);
            sumaT = parseInt(sumaT)+parseInt(input[i]);

        }
        console.log(sumaT);
        document.getElementById("sumaTotal{{ $meta->id_areasmetas }}").innerHTML = "";
        document.getElementById("sumaTotal{{ $meta->id_areasmetas }}").innerHTML = sumaT;
    };
</script>
@endforeach
<!-- MODAL MESES START -->

<!-- MODAL DELETE START -->
@foreach ($areasmetas as $meta)
<div class="modal fade" id="deleteModal{{ $meta->id_areasmetas }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel">Eliminar registro | {{ $meta->id_areasmetas }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                ¿Realmente desea eliminar el registro?
                <p><strong>{{ $meta->nombreM }}</strong></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form action="{{ route('deleteMeta', ['id' => $meta->id_areasmetas]) }}" method="POST" enctype="multipart/form-data">
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
<!-- MODAL DELETE END -->

@endsection

