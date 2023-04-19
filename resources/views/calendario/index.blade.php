@extends('layout.navbar')
@section('content')
<?php
$session_id = session('session_id');
$session_name = session('session_name');
$session_tipo = session('session_tipo');
?>
<title>Calendario</title>
@if($session_id)

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
                    @foreach($metas as $meta)
                    @if($session_id != 3)
                    <tr>
                        <td class="text-center">{{ $meta -> clave }}</td>
                        <td>{{ $meta -> nombreM }}</td>
                        <td>{{$meta->nombrePA}}</td>
                        <td>
                            <input type="number" onkeyup="mostrar{{ $meta->id_meta }}(this.value)" class="form-control" id="cantEntrega{{ $meta->id_meta }}" placeholder="Cantidad a entregar:">
                        </td>
                        <td class="text-center">
                            <!-- Button calendar modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalshow{{ $meta->id_meta }}"><i class="fa-solid fa-calendar"></i></button>
                        </td>
                        <td class="text-center">
                            <!-- Button delete modal -->
                            @if($meta -> activo > 0)
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $meta->id_meta }}"><i class="fa-solid fa-trash"></i></button>
                            @else
                            <button type="button" class="btn btn-dark" disabled data-bs-toggle="modal" data-bs-target="#deleteModal{{ $meta->id_meta }}"><i class="fa-solid fa-trash"></i></button>
                            @endif
                        </td>
                    </tr>
                    @elseif($meta->activo > 0)
                    <tr>
                        <td class="text-center">{{ $meta -> clave }}</td>
                        <td>{{ $meta -> nombreM }}</td>
                        <td>{{$meta->nombrePA}}</td>
                        <td>
                            <input type="number" onkeyup="mostrar(this.value)" class="form-control" id="cantEntrega{{ $meta->id_meta }}" placeholder="Cantidad a entregar:">
                        </td>
                        <td class="text-center">
                            <!-- Button calendar modal -->
                            <button type="button" id="modalshow" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalshow{{ $meta->id_meta }}"><i class="fa-solid fa-calendar"></i></button>
                        </td>
                        <td class="text-center">
                            <!-- Button delete modal -->
                            @if($meta -> activo > 0)
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $meta->id_meta }}"><i class="fa-solid fa-trash"></i></button>
                            @else
                            <button type="button" class="btn btn-dark" disabled data-bs-toggle="modal" data-bs-target="#deleteModal{{ $meta->id_meta }}"><i class="fa-solid fa-trash"></i></button>
                            @endif
                        </td>
                    </tr>
                    @else
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
@foreach ($metas as $meta)
<div class="modal fade" id="modalshow{{ $meta->id_meta }}" tabindex="-1" aria-labelledby="modalshowLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalshowLabel">Asignar entrega por Mes</h1>
                <div style="margin-left: 180px;" id="sumaTotal{{ $meta->id_meta }}"></div><div id="res{{ $meta->id_meta }}"></div>
            </div>
            <div class="modal-body">
                <form action="" method="" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Enero:</label>
                        <div class="col-sm-9">
                            <input type="number" id="sum0{{ $meta->id_meta }}" onkeyup="suma{{ $meta->id_meta }}()" class="form-control" placeholder="Asignar la cantidad de Enero">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Febrero:</label>
                        <div class="col-sm-9">
                            <input type="number" id="sum1{{ $meta->id_meta }}" onkeyup="suma{{ $meta->id_meta }}()" class="form-control" placeholder="Asignar la cantidad de Febrero">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Marzo:</label>
                        <div class="col-sm-9">
                            <input type="number" id="sum2{{ $meta->id_meta }}" onkeyup="suma{{ $meta->id_meta }}()" class="form-control" placeholder="Asignar la cantidad de Marzo">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Abril:</label>
                        <div class="col-sm-9">
                            <input type="number" id="sum3{{ $meta->id_meta }}" onkeyup="suma{{ $meta->id_meta }}()" class="form-control" placeholder="Asignar la cantidad de Abril">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Mayo:</label>
                        <div class="col-sm-9">
                            <input type="number" id="sum4{{ $meta->id_meta }}" onkeyup="suma{{ $meta->id_meta }}()" class="form-control" placeholder="Asignar la cantidad de Mayo">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-6 col-md-3 col-form-label">Junio:</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="number" id="sum5{{ $meta->id_meta }}" onkeyup="suma{{ $meta->id_meta }}()" class="form-control" placeholder="Asignar la cantidad de Junio">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Julio:</label>
                        <div class="col-sm-9">
                            <input type="number" id="sum6{{ $meta->id_meta }}" onkeyup="suma{{ $meta->id_meta }}()" class="form-control" placeholder="Asignar la cantidad de Julio">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Agosto:</label>
                        <div class="col-sm-9">
                            <input type="number" id="sum7{{ $meta->id_meta }}" onkeyup="suma{{ $meta->id_meta }}()" class="form-control" placeholder="Asignar la cantidad de Agosto">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Septiembre:</label>
                        <div class="col-sm-9">
                            <input type="number" id="sum8{{ $meta->id_meta }}" onkeyup="suma{{ $meta->id_meta }}()" class="form-control" placeholder="Asignar la cantidad de Septiembre">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Octubre:</label>
                        <div class="col-sm-9">
                            <input type="number" id="sum9{{ $meta->id_meta }}" onkeyup="suma{{ $meta->id_meta }}()" class="form-control" placeholder="Asignar la cantidad de Octubre">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Noviembre:</label>
                        <div class="col-sm-9">
                            <input type="number" id="sum10{{ $meta->id_meta }}" onkeyup="suma{{ $meta->id_meta }}()" class="form-control" placeholder="Asignar la cantidad de Noviembre">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Diciembre:</label>
                        <div class="col-sm-9">
                            <input type="number" id="sum11{{ $meta->id_meta }}" onkeyup="suma{{ $meta->id_meta }}()" class="form-control" placeholder="Asignar la cantidad de Diciembre">
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
    mostrar{{ $meta->id_meta }} = (valor) => {
        document.getElementById("res{{ $meta->id_meta }}").innerHTML = "/ "+valor;
    };

    var sumaT = 0;
    suma{{ $meta->id_meta }} = () => {
        sumaT = 0;
        var input = new Array;
        for(var i=0; i<12; i++){
            input.push(document.getElementById("sum"+i+"{{ $meta->id_meta }}").value || 0);
            sumaT = parseInt(sumaT)+parseInt(input[i]);
            
        }
        console.log(sumaT);
        document.getElementById("sumaTotal{{ $meta->id_meta }}").innerHTML = "";
        document.getElementById("sumaTotal{{ $meta->id_meta }}").innerHTML = sumaT;
    };
</script>
@endforeach
<!-- MODAL MESES START -->
<!-- MODAL DELETE START -->
@foreach ($metas as $meta)
<div class="modal fade" id="deleteModal{{ $meta->id_meta }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel">Eliminar registro | {{ $meta->clave }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                ¿Realmente desea eliminar el registro?
                <p><strong>{{ $meta->nombreM }}</strong></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form action="{{ route('deleteMeta', ['id' => $meta->id_meta]) }}" method="POST" enctype="multipart/form-data">
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
