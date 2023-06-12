@extends('layout.navbar')
@section('dataTablesCss')
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
<style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
    }
    input[type=number] { -moz-appearance:textfield; }
</style>
@endsection
@section('content')
<?php
$session_id = session('session_id');
$session_name = session('session_name');
$session_tipo = session('session_tipo');
$session_area = session('session_area');
?>
<title>Entrega Metas</title>
@if($session_id)
@if($session_tipo == 1 || $session_tipo == 2 || $session_tipo == 3 || $session_tipo == 4)

<div class="container p-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ route('calendario') }}">Calendario</a></li>
            <li class="breadcrumb-item" aria-current="page">Entrega Metas</li>
        </ol>
    </nav>
    
    <div class="row">
        <div class="col-12 p-4">
            <h3>Entrega Metas</h3>
        </div>
            <div class="col-xs-4 col-md-4 col-xl-4 d-flex">
                <i class='bx bxs-rectangle mx-3 my-1' style="color: #8b67cc;"></i>
                <p>Registro en meses mayor a la cantidad propuesta</p>
            </div>
            <div class="col-xs-4 col-md-4 col-xl-4 d-flex">
                <i class='bx bxs-rectangle text-success mx-3 my-1'></i>
                <p>Meta completada</p>
            </div>
        <!-- Tabla de metas completadas -->
        <div class="table-responsive my-4">
            <table class="table" id="entregasComp">
                <thead>
                    <th class="text-center">Clave</th>
                    <th>Programa</th>
                    <th>Meta</th>
                    <th class="text-center">Cantidad Propuesta</th>
                    <th class="text-center">Cantidad Alcanzada</th>
                    <th class="text-center">Acciones</th>
                </thead>
                <!-- Registros de metas completadas -->
                <tbody>
                    @foreach($metasCompT as $meta)
                    @if($session_area == $meta->area_id)
                    <tr style="background-color: #dc3545; color: white;" id="tr{{ $meta->id_areasmetas }}">
                        <td class="text-center">{{ $meta -> id_areasmetas }}</td>
                        <td>{{ $meta -> nombrePA }}</td>
                        <td>{{ $meta -> nombreM }}</td>
                        <td class="text-center">{{ $meta -> cantidad_c }}</td>
                        <td class="text-center" id="sumaT{{ $meta->id_areasmetas }}">{{ $meta->cantidad_e }}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modalshow{{ $meta->id_areasmetas }}"><i class="fa-solid fa-calendar"></i></button>
                        </td>
                    </tr>
                    @elseif($session_area == 0)
                    <tr style="background-color: #dc3545; color: white;" id="tr{{ $meta->id_areasmetas }}">
                        <td class="text-center">{{ $meta -> id_areasmetas }}</td>
                        <td>{{ $meta -> nombrePA }}</td>
                        <td>{{ $meta -> nombreM }}</td>
                        <td class="text-center">{{ $meta -> cantidad_c }}</td>
                        <td class="text-center" id="sumaT{{ $meta->id_areasmetas }}">{{ $meta -> cantidad_e }}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modalshow{{ $meta->id_areasmetas }}"><i class="fa-solid fa-calendar"></i></button>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
<script>
    window.addEventListener('load', ()=>{
        @foreach($metasCompM as $meta)
            document.querySelector("#sumaT{{ $meta->id_areasmetas }}").innerHTML = {{ $meta->cantidad_e }};

            if({{ $meta->cantidad_e }} > {{ $meta->cantidad_c }}){
                $("#tr{{$meta -> id_areasmetas}}").css("background-color","#8b67cc");
            }else if({{ $meta -> cantidad_c }} == {{ $meta->cantidad_e }}){
                $("#tr{{$meta -> id_areasmetas}}").css("background-color","#198754");
            }else if({{ $meta->cantidad_c }} >= Math.floor({{ $meta -> cantidad_c }}/2)){
                $("#tr{{$meta -> id_areasmetas}}").css("background-color","#ffc107");
                $("#tr{{$meta -> id_areasmetas}}").css("color","black");
            }else{

        }
        @endforeach
    });
</script>
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
            <table class="table" id="metasTableS">
                <!-- Campos en tablas metas  -->
                <thead>
                    <th class="text-center">Clave</th>
                    <th>Programa</th>
                    <th>Meta</th>
                    <th class="text-center">Cantidad Propuesta</th>
                    <th class="text-center">Cantidad Alcanzada</th>
                    <th class="text-center">Acciones</th>
                </thead>
                <!-- Registros de metas sin completar -->
                <tbody>
                    @foreach($metasTableS as $meta)
                    @if($session_area == $meta->area_id)
                    <tr style="background-color: #dc3545; color: white;" id="tr{{ $meta->id_areasmetas }}">
                        <td class="text-center">{{ $meta -> id_areasmetas }}</td>
                        <td>{{ $meta -> nombrePA }}</td>
                        <td>{{ $meta -> nombreM }}</td>
                        <td class="text-center">{{ $meta -> cantidad_c }}</td>
                        <td class="text-center" id="sumaT{{ $meta->id_areasmetas }}">0</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modalshow{{ $meta->id_areasmetas }}"><i class="fa-solid fa-calendar"></i></button>
                        </td>
                    </tr>
                    @elseif($session_area == 0)
                    <tr style="background-color: #dc3545; color: white;" id="tr{{ $meta->id_areasmetas }}">
                        <td class="text-center">{{ $meta -> id_areasmetas }}</td>
                        <td>{{ $meta -> nombrePA }}</td>
                        <td>{{ $meta -> nombreM }}</td>
                        <td class="text-center">{{ $meta -> cantidad_c }}</td>
                        <td class="text-center" id="sumaT{{ $meta->id_areasmetas }}">0</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modalshow{{ $meta->id_areasmetas }}"><i class="fa-solid fa-calendar"></i></button>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modales SIN registros de entrega START -->
@foreach($metasModalS as $meta)
<div class="modal fade" id="modalshow{{ $meta->id_areasmetas }}" tabindex="-1" aria-labelledby="modalshowLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalshowLabel">Entrega por Mes</h1>
            <div id="sumaTotal{{ $meta->id_areasmetas }}">/ {{ $meta->cantidadProp_c }}</div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 my-1 mx-2">
                        <strong><p>Clave: </strong>{{ $meta->id_areasmetas }}</p>
                    </div>
                    <div class=" col-6 my-1 mx-2">
                        <strong><p>Nombre de la Meta: </strong>{{ $meta->nombreM }}</p>
                    </div>
                    <div class="col-auto my-1 mx-2">
                        <strong><p>Unidad de Medida: </strong>{{ $meta->medida }}</p>
                    </div>
                </div>
                <form action="{{ route('entregasNew') }}" method="POST" enctype="multipart/form-data"> 
                {!! csrf_field() !!}
                <div class="table-responsive table-responsive-sm my-4">
                    <table class="table align-middle table-sm table-bordered border-dark">
                        
                        <thead class="table-success table-bordered border-dark">
                            <!-- Campos en tabla metas -->
                            <tr>
                                <th class="text-center" colspan="2">Enero</th>
                                <th class="text-center" colspan="2">Febrero</th>
                                <th class="text-center" colspan="2">Marzo</th>
                                <th class="text-center" colspan="2">Abril</th>
                                <th class="text-center" colspan="2">Mayo</th>
                                <th class="text-center" colspan="2">Junio</th>
                                <th class="text-center" colspan="2">Julio</th>
                                <th class="text-center" colspan="2">Agosto</th>
                                <th class="text-center" colspan="2">Septiembre</th>
                                <th class="text-center" colspan="2">Octubre</th>
                                <th class="text-center" colspan="2">Noviembre</th>
                                <th class="text-center" colspan="2">Diciembre</th>
                            </tr>
                        </thead>
                        <thead class="table-bordered border-dark">
                        <tr>
                                <th class="text-center"><p class="mx-2 my-1">P</p></th>
                                <th class="text-center table-success">A</th>
                                <th class="text-center"><p class="mx-3 my-1">P</p></th>
                                <th class="text-center table-success">A</th>
                                <th class="text-center"><p class="mx-3 my-1">P</p></th>
                                <th class="text-center table-success">A</th>
                                <th class="text-center"><p class="mx-3 my-1">P</p></th>
                                <th class="text-center table-success">A</th>
                                <th class="text-center"><p class="mx-3 my-1">P</p></th>
                                <th class="text-center table-success">A</th>
                                <th class="text-center"><p class="mx-3 my-1">P</p></th>
                                <th class="text-center table-success">A</th>
                                <th class="text-center"><p class="mx-3 my-1">P</p></th>
                                <th class="text-center table-success">A</th>
                                <th class="text-center"><p class="mx-3 my-1">P</p></th>
                                <th class="text-center table-success">A</th>
                                <th class="text-center"><p class="mx-3 my-1">P</p></th>
                                <th class="text-center table-success">A</th>
                                <th class="text-center"><p class="mx-3 my-1">P</p></th>
                                <th class="text-center table-success">A</th>
                                <th class="text-center"><p class="mx-3 my-1">P</p></th>
                                <th class="text-center table-success">A</th>
                                <th class="text-center"><p class="mx-3 my-1">P</p></th>
                                <th class="text-center table-success">A</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">{{ $meta->m_enero }}</td>
                                <td class="text-center table-success"><input type="number" style="background-color:transparent;" name="enero" onkeyup="suma{{ $meta->id_areasmetas }}(this.value || 0)" onfocus="input{{ $meta->id_areasmetas }}(this.value)" onblur="desfoc{{$meta->id_areasmetas}}()" class="form-control sum0{{ $meta->id_areasmetas }} border-0" value=""></td>
                                <td class="text-center">{{ $meta->m_febrero }}</td>
                                <td class="table-success"><input type="number" style="background-color:transparent;" name="febrero" onkeyup="suma{{ $meta->id_areasmetas }}(this.value)" onfocus="input{{ $meta->id_areasmetas }}(this.value)" onblur="desfoc{{$meta->id_areasmetas}}()" class="form-control sum1{{ $meta->id_areasmetas }} border-0"></td>
                                <td class="text-center">{{ $meta->m_marzo }}</td>
                                <td class="table-success"><input type="number" style="background-color:transparent;" name="marzo" onkeyup="suma{{ $meta->id_areasmetas }}(this.value)" onfocus="input{{ $meta->id_areasmetas }}(this.value)" onblur="desfoc{{$meta->id_areasmetas}}()" class="form-control sum2{{ $meta->id_areasmetas }} border-0"></td>
                                <td class="text-center">{{ $meta->m_abril }}</td>
                                <td class="table-success"><input type="number" style="background-color:transparent;" name="abril" onkeyup="suma{{ $meta->id_areasmetas }}(this.value)" onfocus="input{{ $meta->id_areasmetas }}(this.value)" onblur="desfoc{{$meta->id_areasmetas}}()" class="form-control sum3{{ $meta->id_areasmetas }} border-0"></td>
                                <td class="text-center">{{ $meta->m_mayo }}</td>
                                <td class="table-success"><input type="number" style="background-color:transparent;" name="mayo" onkeyup="suma{{ $meta->id_areasmetas }}(this.value)" onfocus="input{{ $meta->id_areasmetas }}(this.value)" onblur="desfoc{{$meta->id_areasmetas}}()" class="form-control sum4{{ $meta->id_areasmetas }} border-0"</td>
                                <td class="text-center">{{ $meta -> m_junio }}</td>
                                <td class="table-success"><input type="number" style="background-color:transparent;" name="junio" onkeyup="suma{{ $meta->id_areasmetas }}(this.value)" onfocus="input{{ $meta->id_areasmetas }}(this.value)" onblur="desfoc{{$meta->id_areasmetas}}()" class="form-control sum5{{ $meta->id_areasmetas }} border-0"></td>
                                <td class="text-center">{{ $meta -> m_julio }}</td>
                                <td class="table-success"><input type="number" style="background-color:transparent;" name="julio" onkeyup="suma{{ $meta->id_areasmetas }}(this.value)" onfocus="input{{ $meta->id_areasmetas }}(this.value)" onblur="desfoc{{$meta->id_areasmetas}}()" class="form-control sum6{{ $meta->id_areasmetas }} border-0"></td>
                                <td class="text-center">{{ $meta -> m_agosto }}</td>
                                <td class="table-success"><input type="number" style="background-color:transparent;" name="agosto" onkeyup="suma{{ $meta->id_areasmetas }}(this.value)" onfocus="input{{ $meta->id_areasmetas }}(this.value)" onblur="desfoc{{$meta->id_areasmetas}}()" class="form-control sum7{{ $meta->id_areasmetas }} border-0"></td>
                                <td class="text-center">{{ $meta -> m_septiembre }}</td>
                                <td class="table-success"><input type="number" style="background-color:transparent;" name="septiembre" onkeyup="suma{{ $meta->id_areasmetas }}(this.value)" onfocus="input{{ $meta->id_areasmetas }}(this.value)" onblur="desfoc{{$meta->id_areasmetas}}()" class="form-control sum8{{ $meta->id_areasmetas }} border-0"></td>
                                <td class="text-center">{{ $meta -> m_octubre }}</td>
                                <td class="table-success"><input type="number" style="background-color:transparent;" name="octubre" onkeyup="suma{{ $meta->id_areasmetas }}(this.value)" onfocus="input{{ $meta->id_areasmetas }}(this.value)" onblur="desfoc{{$meta->id_areasmetas}}()" class="form-control sum9{{ $meta->id_areasmetas }} border-0"</td>
                                <td class="text-center">{{ $meta -> m_noviembre }}</td>
                                <td class=""><input type="number" style="background-color:transparent;" name="noviembre" onkeyup="suma{{ $meta->id_areasmetas }}(this.value)" onfocus="input{{ $meta->id_areasmetas }}(this.value)" onblur="desfoc{{$meta->id_areasmetas}}()" class="form-control sum10{{ $meta->id_areasmetas }} border-0"></td>
                                <td class="text-center">{{ $meta -> m_diciembre }}</td>
                                <td class="table-success"><input type="number" style="background-color:transparent;" name="diciembre" onkeyup="suma{{ $meta->id_areasmetas }}(this.value)" onfocus="input{{ $meta->id_areasmetas }}(this.value)" onblur="desfoc{{$meta->id_areasmetas}}()" class="form-control sum11{{ $meta->id_areasmetas }} border-0"></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="24"><div id="valor{{ $meta->id_areasmetas }}"></div></td>
                            </tr>
                        </tfoot>
                    </table>
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

    var cantidad = 0;
    input{{ $meta->id_areasmetas }} = (valor) => {
        if(typeof valor != 'number'){
            cantidad = parseInt(valor);
            document.querySelector("#valor{{ $meta->id_areasmetas }}").innerHTML = "";
            document.querySelector("#valor{{ $meta->id_areasmetas }}").innerHTML = cantidad;
        }else{
            document.querySelector("#valor{{ $meta->id_areasmetas }}").innerHTML = "0";
        }
    }

    desfoc{{ $meta->id_areasmetas }} = () => {
        document.querySelector("#valor{{ $meta->id_areasmetas }}").innerHTML = "Valor";
    }

    var sumaT = 0;
    suma{{ $meta->id_areasmetas }} = (valor) => {
        sumaT = 0;
        var input = new Array;
        for(var i=0; i<12; i++){
            input.push(document.querySelector(".sum"+i+"{{ $meta->id_areasmetas }}").value || 0);
            sumaT = parseInt(sumaT)+parseInt(input[i]);
        }
        document.querySelector("#sumaTotal{{ $meta->id_areasmetas }}").innerHTML = "";
        document.querySelector("#sumaTotal{{ $meta->id_areasmetas }}").innerHTML = sumaT+" / "+{{ $meta -> cantidadProp_c }};
        document.querySelector("#sumaT{{ $meta->id_areasmetas }}").innerHTML = "";
        document.querySelector("#sumaT{{ $meta->id_areasmetas }}").innerHTML = sumaT;
        document.querySelector("#cantidad{{ $meta->id_areasmetas }}").value = sumaT;
        cantidad = parseInt(valor);
        input{{$meta->id_areasmetas}}(valor);
    };
</script>
@endforeach
<!-- Modales SIN registros de entrega END -->

<!-- Modales CON registros de entrega START -->
@foreach($metasCompM as $meta)
<div class="modal fade" id="modalshow{{ $meta->id_areasmetas }}" tabindex="-1" aria-labelledby="modalshowLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalshowLabel">Entrega por Mes</h1>
            <div id="sumaTotal{{ $meta->id_areasmetas }}">{{ $meta->cantidad_m }} / {{ $meta->cantidad_c }}</div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 my-1 mx-2">
                        <strong><p>Clave: </strong>{{ $meta->id_areasmetas }}</p>
                    </div>
                    <div class=" col-6 my-1 mx-2">
                        <strong><p>Nombre de la Meta: </strong>{{ $meta->nombreM }}</p>
                    </div>
                    <div class="col-auto my-1 mx-2">
                        <strong><p>Unidad de Medida: </strong>{{ $meta->medida }}</p>
                    </div>
                </div>
                <form action="{{ route('entregasUp', ['id' => $meta->id_areasmetas]) }}" method="POST" enctype="multipart/form-data"> 
                {{ csrf_field('PATCH') }}
                {{ method_field('PUT') }}
                <div class="table-responsive table-responsive-sm my-4">
                    <table class="table align-middle table-sm table-bordered border-dark">
                        
                        <thead class="table-success table-bordered border-dark">
                            <!-- Campos en tabla metas -->
                            <tr>
                                <th class="text-center" colspan="2">Enero</th>
                                <th class="text-center" colspan="2">Febrero</th>
                                <th class="text-center" colspan="2">Marzo</th>
                                <th class="text-center" colspan="2">Abril</th>
                                <th class="text-center" colspan="2">Mayo</th>
                                <th class="text-center" colspan="2">Junio</th>
                                <th class="text-center" colspan="2">Julio</th>
                                <th class="text-center" colspan="2">Agosto</th>
                                <th class="text-center" colspan="2">Septiembre</th>
                                <th class="text-center" colspan="2">Octubre</th>
                                <th class="text-center" colspan="2">Noviembre</th>
                                <th class="text-center" colspan="2">Diciembre</th>
                            </tr>
                        </thead>
                        <thead class="table-bordered border-dark">
                        <tr>
                                <th class="text-center"><p class="mx-2 my-1">P</p></th>
                                <th class="text-center table-success">A</th>
                                <th class="text-center"><p class="mx-3 my-1">P</p></th>
                                <th class="text-center table-success">A</th>
                                <th class="text-center"><p class="mx-3 my-1">P</p></th>
                                <th class="text-center table-success">A</th>
                                <th class="text-center"><p class="mx-3 my-1">P</p></th>
                                <th class="text-center table-success">A</th>
                                <th class="text-center"><p class="mx-3 my-1">P</p></th>
                                <th class="text-center table-success">A</th>
                                <th class="text-center"><p class="mx-3 my-1">P</p></th>
                                <th class="text-center table-success">A</th>
                                <th class="text-center"><p class="mx-3 my-1">P</p></th>
                                <th class="text-center table-success">A</th>
                                <th class="text-center"><p class="mx-3 my-1">P</p></th>
                                <th class="text-center table-success">A</th>
                                <th class="text-center"><p class="mx-3 my-1">P</p></th>
                                <th class="text-center table-success">A</th>
                                <th class="text-center"><p class="mx-3 my-1">P</p></th>
                                <th class="text-center table-success">A</th>
                                <th class="text-center"><p class="mx-3 my-1">P</p></th>
                                <th class="text-center table-success">A</th>
                                <th class="text-center"><p class="mx-3 my-1">P</p></th>
                                <th class="text-center table-success">A</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">{{ $meta->m_enero }}</td>
                                <td class="text-center table-success"><input type="number" style="background-color:transparent;" name="enero" onkeyup="suma{{ $meta->id_areasmetas }}(this.value || 0)" onfocus="input{{ $meta->id_areasmetas }}(this.value)" onblur="desfoc{{$meta->id_areasmetas}}()" class="form-control sum0{{ $meta->id_areasmetas }} border-0" value="{{ $meta->m_enero }}"></td>
                                <td class="text-center">{{ $meta->m_febrero }}</td>
                                <td class="table-success"><input type="number" style="background-color:transparent;"  name="febrero" onkeyup="suma{{ $meta->id_areasmetas }}(this.value)" onfocus="input{{ $meta->id_areasmetas }}(this.value)" onblur="desfoc{{$meta->id_areasmetas}}()" class="form-control sum1{{ $meta->id_areasmetas }} border-0" value="{{ $meta->m_febrero }}"></td>
                                <td class="text-center">{{ $meta->m_marzo }}</td>
                                <td class="table-success"><input type="number" style="background-color:transparent;" name="marzo" onkeyup="suma{{ $meta->id_areasmetas }}(this.value)" onfocus="input{{ $meta->id_areasmetas }}(this.value)" onblur="desfoc{{$meta->id_areasmetas}}()" class="form-control sum2{{ $meta->id_areasmetas }} border-0" value="{{ $meta->m_marzo }}"></td>
                                <td class="text-center">{{ $meta->m_abril }}</td>
                                <td class="table-success"><input type="number" style="background-color:transparent;" name="abril" onkeyup="suma{{ $meta->id_areasmetas }}(this.value)" onfocus="input{{ $meta->id_areasmetas }}(this.value)" onblur="desfoc{{$meta->id_areasmetas}}()" class="form-control sum3{{ $meta->id_areasmetas }} border-0" value="{{ $meta->m_abril }}"></td>
                                <td class="text-center">{{ $meta->m_mayo }}</td>
                                <td class="table-success"><input type="number" style="background-color:transparent;" name="mayo" onkeyup="suma{{ $meta->id_areasmetas }}(this.value)" onfocus="input{{ $meta->id_areasmetas }}(this.value)" onblur="desfoc{{$meta->id_areasmetas}}()" class="form-control sum4{{ $meta->id_areasmetas }} border-0" value="{{ $meta->m_mayo }}"></td>
                                <td class="text-center">{{ $meta -> m_junio }}</td>
                                <td class="table-success"><input type="number" style="background-color:transparent;" name="junio" onkeyup="suma{{ $meta->id_areasmetas }}(this.value)" onfocus="input{{ $meta->id_areasmetas }}(this.value)" onblur="desfoc{{$meta->id_areasmetas}}()" class="form-control sum5{{ $meta->id_areasmetas }} border-0" value="{{ $meta->m_junio }}"></td>
                                <td class="text-center">{{ $meta -> m_julio }}</td>
                                <td class="table-success"><input type="number" style="background-color:transparent;" name="julio" onkeyup="suma{{ $meta->id_areasmetas }}(this.value)" onfocus="input{{ $meta->id_areasmetas }}(this.value)" onblur="desfoc{{$meta->id_areasmetas}}()" class="form-control sum6{{ $meta->id_areasmetas }} border-0" value="{{ $meta->m_julio }}"></td>
                                <td class="text-center">{{ $meta -> m_agosto }}</td>
                                <td class="table-success"><input type="number" style="background-color:transparent;" name="agosto" onkeyup="suma{{ $meta->id_areasmetas }}(this.value)" onfocus="input{{ $meta->id_areasmetas }}(this.value)" onblur="desfoc{{$meta->id_areasmetas}}()" class="form-control sum7{{ $meta->id_areasmetas }} border-0" value="{{ $meta->m_agosto }}"></td>
                                <td class="text-center">{{ $meta -> m_septiembre }}</td>
                                <td class="table-success"><input type="number" style="background-color:transparent;" name="septiembre" onkeyup="suma{{ $meta->id_areasmetas }}(this.value)" onfocus="input{{ $meta->id_areasmetas }}(this.value)" onblur="desfoc{{$meta->id_areasmetas}}()" class="form-control sum8{{ $meta->id_areasmetas }} border-0" value="{{ $meta->m_septiembre }}"></td>
                                <td class="text-center">{{ $meta -> m_octubre }}</td>
                                <td class="table-success"><input type="number" style="background-color:transparent;" name="octubre" onkeyup="suma{{ $meta->id_areasmetas }}(this.value)" onfocus="input{{ $meta->id_areasmetas }}(this.value)" onblur="desfoc{{$meta->id_areasmetas}}()" class="form-control sum9{{ $meta->id_areasmetas }} border-0" value="{{ $meta->m_octubre }}"></td>
                                <td class="text-center">{{ $meta -> m_noviembre }}</td>
                                <td class="table-success"><input type="number" style="background-color:transparent;" name="noviembre" onkeyup="suma{{ $meta->id_areasmetas }}(this.value)" onfocus="input{{ $meta->id_areasmetas }}(this.value)" onblur="desfoc{{$meta->id_areasmetas}}()" class="form-control sum10{{ $meta->id_areasmetas }} border-0" value="{{ $meta->m_noviembre }}"></td>
                                <td class="text-center">{{ $meta -> m_diciembre }}</td>
                                <td class="table-success"><input type="number" style="background-color:transparent;" name="diciembre" onkeyup="suma{{ $meta->id_areasmetas }}(this.value)" onfocus="input{{ $meta->id_areasmetas }}(this.value)" onblur="desfoc{{$meta->id_areasmetas}}()" class="form-control sum11{{ $meta->id_areasmetas }} border-0" value="{{ $meta->m_diciembre }}"></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="24"><div id="valor{{ $meta->id_areasmetas }}"></div></td>
                            </tr>
                        </tfoot>
                    </table>
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

    var cantidad = 0;
    input{{ $meta->id_areasmetas }} = (valor) => {
        if(typeof valor != 'number'){
            cantidad = parseInt(valor);
            document.querySelector("#valor{{ $meta->id_areasmetas }}").innerHTML = "";
            document.querySelector("#valor{{ $meta->id_areasmetas }}").innerHTML = cantidad;
        }else{
            document.querySelector("#valor{{ $meta->id_areasmetas }}").innerHTML = "0";
        }
    }

    desfoc{{ $meta->id_areasmetas }} = () => {
        document.querySelector("#valor{{ $meta->id_areasmetas }}").innerHTML = "Valor";
    }

    var sumaT = 0;
    suma{{ $meta->id_areasmetas }} = (valor) => {
        sumaT = 0;
        var input = new Array;
        for(var i=0; i<12; i++){
            input.push(document.querySelector(".sum"+i+"{{ $meta->id_areasmetas }}").value || 0);
            sumaT = parseInt(sumaT)+parseInt(input[i]);
        }
        document.querySelector("#sumaTotal{{ $meta->id_areasmetas }}").innerHTML = "";
        document.querySelector("#sumaTotal{{ $meta->id_areasmetas }}").innerHTML = sumaT+" / "+{{ $meta -> cantidad_c }};
        document.querySelector("#sumaT{{ $meta->id_areasmetas }}").innerHTML = "";
        document.querySelector("#sumaT{{ $meta->id_areasmetas }}").innerHTML = sumaT;
        document.querySelector("#cantidad{{ $meta->id_areasmetas }}").value = sumaT;
        cantidad = parseInt(valor);
        input{{$meta->id_areasmetas}}(valor);
    };
</script>
@endforeach
<!-- Modales CON registros de entrega END -->

@else
<script>
        window.location.replace("{{ route('dashboard')}}");
</script>
@endif
@else
<div class="container p-4">
    <div class="row">
        <div class="col p-4">
            <h3>Entrega Metas</h3>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 py-3 text-center">
            <img src="{{ asset('img/login.png') }}" alt="Inicie Sesión para poder ver el contenido" class="img-fluid" style="width: 800px;">
            <p>Para ver el contenido <a href="/login">Iniciar Sesión</a></p>
        </div>
    </div>
</div>
@endif

@section('dataTablesJs')
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#metasTableS').DataTable({
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
        $('#entregasComp').DataTable({
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

@endsection