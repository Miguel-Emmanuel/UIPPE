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
@if($session_tipo == 1 || $session_tipo == 2 || $session_tipo == 3 || $session_tipo == 4)

<div class="container p-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard">Inicio</a></li>
            <li class="breadcrumb-item" aria-current="page">Calendario</li>
        </ol>
    </nav>
    
    <div class="row">
        <div class="col-12 p-4">
            <h3>Calendario Metas</h3>
        </div>
            <div class="col-xs-4 col-md-4 col-xl-4 d-flex">
                <i class='bx bxs-rectangle mx-3 my-1' style="color: #8b67cc;"></i>
                <p>Cantidad alcanzada mayor a la cantidad establecida</p>
            </div>
            <div class="col-xs-4 col-md-4 col-xl-4 d-flex">
                <i class='bx bxs-rectangle text-success mx-3 my-1'></i>
                <p>Cantidad Propuesta</p>
            </div>
            <div class="col p-4 d-flex justify-content-end">
                <a class="btn btn-success" href="{{ route('entregaMetas') }}">Entrega Metas</a>
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
                        <th class="text-center">Registro</th>
                        <th class="text-center">Cantidad Propuesta Anual</th>
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
                                <td class="text-center">{{ $meta -> cantidad_c }}</td>
                                <td>
                                    <p class="text-center" id="cantEntrega{{ $meta->id_areasmetas }}">0</p>
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
                                <td class="text-center">{{ $meta -> cantidad_c }}</td>
                                <td>
                                    <p class="text-center" id="cantEntrega{{ $meta->id_areasmetas }}">0</p>
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
            <p>Cantidad por establecer</p>
        </div>
        <div class="col-xs-4 col-md-4 col-xl-4 d-flex">
            <i class='bx bxs-rectangle text-danger mx-3 my-1'></i>
            <p>Cantidad sin registro eficiente</p>
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
                        <th class="text-center">Cantidad Propuesta Anual</th>
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
                                <p class="text-center" id="cantEntrega{{ $meta->id_areasmetas }}">0</p>
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
                                <p class="text-center" id="cantEntrega{{ $meta->id_areasmetas }}">0</p>
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
<script>
        window.location.replace("{{ route('dashboard')}}");
</script>
@endif
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


<!-- MODAL MESES CON REGISTROS START -->
@foreach ($areasconMeses as $meta)
<div class="modal fade" id="modalshow{{ $meta->id_areasmetas }}" tabindex="-1" aria-labelledby="modalshowLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalshowLabel">Asignar entrega por Mes</h1>
                <div style="margin-left: 180px;" id="sumaTotal{{ $meta->id_areasmetas }}"></div>
            </div>
            <div class="modal-body">
                <form action="{{ route('calendUpdate', ['id' => $meta->id_areasmetas]) }}" method="POST" enctype="multipart/form-data"> 
                {{ csrf_field('PATCH') }}
                {{ method_field('PUT') }}
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Enero:</label>
                        <div class="col-sm-9">
                            <input type="number" name="enero" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control sum0{{ $meta->id_areasmetas }}" placeholder="Asignar la cantidad de Enero" value="{{ $meta -> m_enero }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Febrero:</label>
                        <div class="col-sm-9">
                            <input type="number" name="febrero" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control sum1{{ $meta->id_areasmetas }}" placeholder="Asignar la cantidad de Febrero" value="{{ $meta -> m_febrero }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Marzo:</label>
                        <div class="col-sm-9">
                            <input type="number" name="marzo" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control sum2{{ $meta->id_areasmetas }}" placeholder="Asignar la cantidad de Marzo" value="{{ $meta -> m_marzo }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Abril:</label>
                        <div class="col-sm-9">
                            <input type="number" name="abril" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control sum3{{ $meta->id_areasmetas }}" placeholder="Asignar la cantidad de Abril" value="{{ $meta -> m_abril }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Mayo:</label>
                        <div class="col-sm-9">
                            <input type="number" name="mayo" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control sum4{{ $meta->id_areasmetas }}" placeholder="Asignar la cantidad de Mayo" value="{{ $meta -> m_mayo }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-6 col-md-3 col-form-label">Junio:</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="number" name="junio" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control sum5{{ $meta->id_areasmetas }}" placeholder="Asignar la cantidad de Junio" value="{{ $meta -> m_junio }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Julio:</label>
                        <div class="col-sm-9">
                            <input type="number" name="julio" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control sum6{{ $meta->id_areasmetas }}" placeholder="Asignar la cantidad de Julio" value="{{ $meta -> m_julio }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Agosto:</label>
                        <div class="col-sm-9">
                            <input type="number" name="agosto" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control sum7{{ $meta->id_areasmetas }}" placeholder="Asignar la cantidad de Agosto" value="{{ $meta -> m_agosto }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Septiembre:</label>
                        <div class="col-sm-9">
                            <input type="number" name="septiembre" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control sum8{{ $meta->id_areasmetas }}" placeholder="Asignar la cantidad de Septiembre" value="{{ $meta -> m_septiembre }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Octubre:</label>
                        <div class="col-sm-9">
                            <input type="number" name="octubre" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control sum9{{ $meta->id_areasmetas }}" placeholder="Asignar la cantidad de Octubre" value="{{ $meta -> m_octubre }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Noviembre:</label>
                        <div class="col-sm-9">
                            <input type="number" name="noviembre" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control sum10{{ $meta->id_areasmetas }}" placeholder="Asignar la cantidad de Noviembre" value="{{ $meta -> m_noviembre }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Diciembre:</label>
                        <div class="col-sm-9">
                            <input type="number" name="diciembre" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control sum11{{ $meta->id_areasmetas }}" placeholder="Asignar la cantidad de Diciembre" value="{{ $meta -> m_diciembre }}">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <input class="form-control" type="hidden" name="registro" value="<?php echo $session_id ?>" style="display: none;">
                <input class="form-control" type="hidden" name="area_meta" value="{{ $meta->id_areasmetas }}" style="display: none;">
                <input class="form-control" type="hidden" name="cantidad" id="cantidad{{ $meta->id_areasmetas }}" value="" style="display: none;">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" id="save{{ $meta->id_areasmetas }}">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>

    var sumaT = 0;
    suma{{ $meta->id_areasmetas }} = () => {
        sumaT = 0;
        var input = new Array;
        for(var i=0; i<12; i++){
            input.push(document.querySelector(".sum"+i+"{{ $meta->id_areasmetas }}").value || 0);
            sumaT = parseInt(sumaT)+parseInt(input[i]);
        }
        if(parseInt(sumaT) < {{ $meta -> cantidad_c }}){
            document.getElementById("save{{ $meta->id_areasmetas }}").className = "btn btn-primary disabled";
        }else if(sumaT >= {{ $meta -> cantidad_c }}){
            document.getElementById("save{{ $meta->id_areasmetas }}").className = "btn btn-primary";
        }else{
            
        }
        document.getElementById("sumaTotal{{ $meta->id_areasmetas }}").innerHTML = "";
        document.querySelector("#cantEntrega{{ $meta->id_areasmetas }}").innerHTML = sumaT;
        document.getElementById("sumaTotal{{ $meta->id_areasmetas }}").innerHTML = sumaT;
    };

</script>
@endforeach
<!-- MODAL MESES CON REGISTRO EN MESES END -->

<!-- MODAL MESES SIN REGISTRO EN MESES START -->
@foreach ($areassinMeses as $meta)
<div class="modal fade" id="modalshow{{ $meta->id_areasmetas }}" tabindex="-1" aria-labelledby="modalshowLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalshowLabel">Asignar entrega por Mes</h1>
                <div style="margin-left: 180px;" id="sumaTotal{{ $meta->id_areasmetas }}"></div>
            </div>
            <div class="modal-body">
                <form action="{{ route('calendarizars.store') }}" method="POST" enctype="multipart/form-data"> 
                {!! csrf_field() !!}
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Enero:</label>
                        <div class="col-sm-9">
                            <input type="number" name="enero" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control sum0{{ $meta->id_areasmetas }}" placeholder="Asignar la cantidad de Enero">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Febrero:</label>
                        <div class="col-sm-9">
                            <input type="number" name="febrero" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control sum1{{ $meta->id_areasmetas }}" placeholder="Asignar la cantidad de Febrero">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Marzo:</label>
                        <div class="col-sm-9">
                            <input type="number" name="marzo" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control sum2{{ $meta->id_areasmetas }}" placeholder="Asignar la cantidad de Marzo">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Abril:</label>
                        <div class="col-sm-9">
                            <input type="number" name="abril" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control sum3{{ $meta->id_areasmetas }}" placeholder="Asignar la cantidad de Abril">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Mayo:</label>
                        <div class="col-sm-9">
                            <input type="number" name="mayo" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control sum4{{ $meta->id_areasmetas }}" placeholder="Asignar la cantidad de Mayo">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Junio:</label>
                        <div class="col-sm-9">
                            <input type="number" name="junio" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control sum5{{ $meta->id_areasmetas }}" placeholder="Asignar la cantidad de Junio">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Julio:</label>
                        <div class="col-sm-9">
                            <input type="number" name="julio" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control sum6{{ $meta->id_areasmetas }}" placeholder="Asignar la cantidad de Julio">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Agosto:</label>
                        <div class="col-sm-9">
                            <input type="number" name="agosto" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control sum7{{ $meta->id_areasmetas }}" placeholder="Asignar la cantidad de Agosto">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Septiembre:</label>
                        <div class="col-sm-9">
                            <input type="number" name="septiembre" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control sum8{{ $meta->id_areasmetas }}" placeholder="Asignar la cantidad de Septiembre">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Octubre:</label>
                        <div class="col-sm-9">
                            <input type="number" name="octubre" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control sum9{{ $meta->id_areasmetas }}" placeholder="Asignar la cantidad de Octubre">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Noviembre:</label>
                        <div class="col-sm-9">
                            <input type="number" name="noviembre" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control sum10{{ $meta->id_areasmetas }}" placeholder="Asignar la cantidad de Noviembre">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Diciembre:</label>
                        <div class="col-sm-9">
                            <input type="number" name="diciembre" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control sum11{{ $meta->id_areasmetas }}" placeholder="Asignar la cantidad de Diciembre">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <input class="form-control" type="text" name="registro" value="<?php echo $session_id ?>" style="display: none;">
                <input class="form-control" type="text" name="area_meta" value="{{ $meta->id_areasmetas }}" style="display: none;">
                <input class="form-control" type="text" name="cantidad" id="cantidad{{ $meta->id_areasmetas }}" value="" style="display: none;">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" id="save{{ $meta->id_areasmetas }}">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    window.addEventListener('load', () => {
        var canti = document.querySelector("#cantEntrega{{ $meta->id_areasmetas }}").value;
        document.querySelector("#cantidad{{ $meta->id_areasmetas }}").value = canti;
    });

    var sumaT = 0;
    suma{{ $meta->id_areasmetas }} = () => {
        sumaT = 0;
        var input = new Array;
        for(var i=0; i<12; i++){
            input.push(document.querySelector(".sum"+i+"{{ $meta->id_areasmetas }}").value || 0);
            sumaT = parseInt(sumaT)+parseInt(input[i]);
        }
        document.getElementById("sumaTotal{{ $meta->id_areasmetas }}").innerHTML = "";
        document.getElementById("sumaTotal{{ $meta->id_areasmetas }}").innerHTML = sumaT;

        if(parseInt(sumaT) < document.querySelector("#cantEntrega{{ $meta->id_areasmetas }}").value){
            document.getElementById("save{{ $meta->id_areasmetas }}").className = "btn btn-primary disabled";
        }else if(sumaT >= document.querySelector("#cantEntrega{{ $meta->id_areasmetas }}").value){
            document.getElementById("save{{ $meta->id_areasmetas }}").className = "btn btn-primary";
        }else{
            
        }

    };

</script>
@endforeach
<!-- MODAL MESES START -->

@section('dataTablesJs')
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#metasSin').DataTable({
            "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todo"]],
            ordering: false,
            info: false,
            language:{
                "search": "Buscar:",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "zeroRecords": "Sin resultados encontrados",
            }
        });
        $('#metasComp').DataTable({
            "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todo"]],
            ordering: false,
            info: false,
            language:{
                "search": "Buscar:",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "zeroRecords": "Sin resultados encontrados",
            }
        });
    });
</script>
@endsection
<script>
    //======================================================
    //Para consulta de id_areasmetas con registros en meses
    //======================================================
    
    window.addEventListener('load', () => {
    @foreach($areasconMeses as $areas)
        document.querySelector("#cantEntrega{{ $areas->id_areasmetas }}").setAttribute('value', '{{ $areas -> cantidad_c }}');
        document.getElementById("cantidad{{ $areas->id_areasmetas }}").value = {{ $areas -> cantidad_c }};
        document.querySelector("#cantEntrega{{ $areas->id_areasmetas }}").innerHTML = "{{ $areas -> cantidad_c }}";

        var sumaI{{ $areas->id_areasmetas }} = 0;
        var input{{ $areas->id_areasmetas }} = new Array;

        for(var i=0; i<12; i++){
            input{{ $areas->id_areasmetas }}.push(document.querySelector(".sum"+i+"{{ $areas->id_areasmetas }}").value || 0);
            sumaI{{ $areas->id_areasmetas }} = parseInt(sumaI{{ $areas->id_areasmetas }})+parseInt(input{{ $areas->id_areasmetas }}[i]);
        }

        var tr = document.querySelector("#tr{{$areas -> id_areasmetas}}");

        if({{ $areas->meses_c }} > {{ $areas->cantidad_c }}){
            $("#tr{{$areas -> id_areasmetas}}").css("background-color","#8b67cc");
        }else if({{ $areas -> cantidad_c }} == sumaI{{ $areas->id_areasmetas }}){
            $("#tr{{$areas -> id_areasmetas}}").css("background-color","#198754");
        }else if(sumaI{{ $areas->id_areasmetas }} >= Math.floor({{ $areas -> cantidad_c }}/2)){
            $("#tr{{$areas -> id_areasmetas}}").css("background-color","#ffc107");
            $("#tr{{$areas -> id_areasmetas}}").css("color","black");
        }else{

        }

        document.getElementById("sumaTotal{{ $areas->id_areasmetas }}").innerHTML = "";
        document.getElementById("sumaTotal{{ $areas->id_areasmetas }}").innerHTML = sumaI{{ $areas->id_areasmetas }};
    @endforeach
    });

</script>

@endsection

