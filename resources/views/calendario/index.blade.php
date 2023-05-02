@extends('layout.navbar')
@section('content')
<?php
$session_id = session('session_id');
$session_name = session('session_name');
$session_tipo = session('session_tipo');
$session_area = session('session_area');
?>
<title>Calendario</title>
@if($session_id && $session_area != "")

<div class="container p-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard">Inicio</a></li>
            <li class="breadcrumb-item" aria-current="page">Calendario</li>
        </ol>
    </nav>
    
    <div class="row">
        <div class="col p-4">
            <h3>Calendario Meta</h3>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <!-- Campos en tabla metas -->
                    <tr>
                        <th class="text-center">Clave</th>
                        <th>Programa</th>
                        <th>Meta</th>
                        <th class="text-center">Cantidad</th>
                        <th class="text-center" colspan="3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Regitros en tabla metas -->
                    @foreach($areasmetas as $meta)
                    <tr>
                        @if($session_area == $meta->area_id)
                            <td class="text-center">{{ $meta -> id_areasmetas }}</td>
                            <td>{{ $meta -> nombrePA }}</td>
                            <td>{{$meta->nombreM}}</td>
                            <td>
                                <input type="number" onkeyup="mostrar{{ $meta->id_areasmetas }}(this.value)" class="form-control" id="cantEntrega{{ $meta->id_areasmetas }}" placeholder="Cantidad a entregar:">
                            </td>
                            <td class="text-center">
                                <!-- Button calendar modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalshow{{ $meta->id_areasmetas }}"><i class="fa-solid fa-calendar"></i></button>
                            </td>
                            <td class="text-center">
                                <!-- Button delete modal -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $meta->id_areasmetas }}"><i class="fa-solid fa-trash"></i></button>
                            </td>
                        @elseif($session_area == 0)
                        <td class="text-center">{{ $meta -> id_areasmetas }}</td>
                            <td>{{ $meta -> nombrePA }}</td>
                            <td>{{$meta->nombreM}}</td>
                            <td>
                                <input type="number" onkeyup="mostrar{{ $meta->id_areasmetas }}(this.value)" class="form-control" id="cantEntrega{{ $meta->id_areasmetas }}" placeholder="Cantidad a entregar:" value="50">
                            </td>
                            <td class="text-center">
                                <!-- Button calendar modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalshow{{ $meta->id_areasmetas }}"><i class="fa-solid fa-calendar"></i></button>
                            </td>
                            <td class="text-center">
                                <!-- Button delete modal -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $meta->id_areasmetas }}"><i class="fa-solid fa-trash"></i></button>
                            </td>
                        @else
                        @endif
                    </tr>
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
            <p>Para ver el contenido debe tener un área asignada</p>
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
                <form action="{{ route('calendarizars.store') }}" method="POST" enctype="multipart/form-data" id="meses{{ $meta->id_areasmetas }}" onsubmit="return true;"> 
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
                        <label for="colFormLabel" class="col-sm-6 col-md-3 col-form-label">Junio:</label>
                        <div class="col-sm-6 col-md-9">
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
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>

    window.addEventListener('load', () => {
        var canti = document.querySelector("#cantEntrega{{ $meta->id_areasmetas }}").value;
        document.querySelector("#cantidad{{ $meta->id_areasmetas }}").value = canti;
        document.getElementById("res{{ $meta->id_areasmetas }}").innerHTML = "/ "+canti;
    });

    mostrar{{ $meta->id_areasmetas }} = (valor) => {
        document.getElementById("res{{ $meta->id_areasmetas }}").innerHTML = "/ "+valor;
        document.querySelector("#cantidad{{ $meta->id_areasmetas }}").value = valor;
    };

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
