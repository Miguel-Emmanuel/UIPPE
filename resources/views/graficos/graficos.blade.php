@extends('layout.navbar')
@section('content')
<?php
$session_id = session('session_id');
$session_name = session('session_name');
$session_tipo = session('session_tipo');
?>
<title>Gráficos</title>
<div class="container p-4">
    @if($session_id)
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard">Inicio</a></li>
            <li class="breadcrumb-item" aria-current="page">Gráficos</li>
        </ol>
    </nav>
    @else
    @endif
    <div class="row">
        <div class="col p-4">
            <h3>Reportes</h3>
        </div>
        @if($session_id)
        <div class="col p-4 d-flex justify-content-end">
            <button type="button" class="btn btn-danger" id="btn_alta" data-bs-toggle="modal" data-bs-target="#modalalta"><i class="fa-regular fa-file-pdf"></i></button>&nbsp;&nbsp;
            <button type="button" class="btn btn-success" id="btn_alta" data-bs-toggle="modal" data-bs-target="#modalalta"><i class="fa-regular fa-file-excel"></i></button>
        </div>
        @else
        @endif
    </div>
    <div class="row">
        @if($session_id)
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 py-3">
            <div class="card">
                <div class="card-body">
                    <canvas id="bar-chart" width="600" height="400"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 py-3">
            <div class="card">
                <div class="card-body">
                    <canvas id="GraficoAreas" width="600" height="400"></canvas>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 py-3">
            <div class="card">
                <div class="card-body">
                    <canvas id="GraficaProgamasMetas" width="600" height="400"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 py-3">
            <div class="card">
                <div class="card-body">
                    <canvas id="GraficaUsuarioTipo" width="600" height="400"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 py-3">
            <h3>Titulo</h3>
            <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar bg-danger" style="width: 25%">25%</div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 py-3">
            <h3>Titulo</h3>
            <div class="progress" role="progressbar" aria-label="Info example" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar" style="width: 50%; background-color: #FD7E14;">50%</div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 py-3">
            <h3>Titulo</h3>
            <div class="progress" role="progressbar" aria-label="Warning example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar bg-warning" style="width: 75%">75%</div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 py-3">
            <h3>Titulo</h3>
            <div class="progress" role="progressbar" aria-label="Danger example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar bg-success" style="width: 100%">100%</div>
            </div>
        </div>
        @else
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 py-3 text-center">
            <img src="{{ asset('img/login.png') }}" alt="Inicie Sesión para poder ver el contenido" class="img-fluid" style="width: 800px;">
            <p>Para ver el contenido <a href="/login">Iniciar Sesión</a></p>
        </div>
        @endif
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js" integrity="sha512-OD9Gn6cAUQezuljS6411uRFr84pkrCtw23Hl5TYzmGyD0YcunJIPSBDzrV8EeCiFxGWWvtJOfVo5pOgB++Jsag==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <!-- -----------------------------------------------Script para modificar la grafica de usuarios------------------------------------------------ -->
    <script>
        new Chart(document.getElementById("bar-chart"), {
            type: 'pie',
            data: {
                labels: [

                    @foreach($usuarios as $usuario)
                    "{{ $usuario  -> gen }}",
                    @endforeach
                ],
                datasets: [{
                    label: "Genero de los empleados",
                    backgroundColor: [
                        @foreach($usuarios as $usuario)
                        "#" + Math.floor(Math.random() * 16777215).toString(16),
                        @endforeach
                    ],
                    data: [
                        @foreach($usuarios_a as $usuario)
                        "{{ $usuario -> cantidad}}",
                        @endforeach
                    ]
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: 'Generos de los empleados'
                }

            }

        });
    </script>



    <!-- -----------------------------------------------Script para modificar la grafica de areas------------------------------------------------ -->

    <script>
        new Chart(document.getElementById("GraficoAreas"), {
            type: 'pie',
            data: {
                labels: [

                    @foreach($areas_a as $area)
                       
                    "{{ $area  -> activo }}",
                   
                    @endforeach
                ],
                datasets: [{
                    label: "El area se encuentra activa o inactiva",
                    backgroundColor: [
                        @foreach($areas as $area)
                        "#" + Math.floor(Math.random() * 16777215).toString(16),
                        @endforeach
                    ],
                    data: [
                        @foreach($areas as $area)
                        "{{ $area -> cantidad}}",
 
                        @endforeach
                    ]
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: 'Areas activas o inactivas'
                }

            }

        });
    </script>

<!-- -----------------------------------------------Script para modificar la grafica de programas|metas------------------------------------------------ -->
<script>
        new Chart(document.getElementById("GraficaProgamasMetas"), {
            type: 'bar',
            data: {
                labels: [

                    @foreach($programas as $programa)
                        "{{ $programa -> abreviatura}}",
                   
                    @endforeach
                ],
                datasets: [{
                    label: "Numero de metas que tiene el programa",
                    backgroundColor: [
                        @foreach($programas as $programa)
                        "#" + Math.floor(Math.random() * 16777215).toString(16),
                        @endforeach
                    ],
                    data: [
                        @foreach($metas as $metas)
                        "{{ $metas -> conteo}}",
 
                        @endforeach
                    ]
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: 'Programas y sus metas'
                }

            }

        });
    </script>

    <!-- -----------------------------------------------Script para modificar la grafica de programas|metas------------------------------------------------ -->
<script>
        new Chart(document.getElementById("GraficaUsuarioTipo"), {
            type: 'bar',
            data: {
                labels: [

                    @foreach($usuarios_b as $usu)
                        "{{ $usu -> usuarios}}",
                   
                    @endforeach
                ],
                datasets: [{
                    label: "Tipo de usuario",
                    backgroundColor: [
                        @foreach($usuarios_b as $usu)
                        "#" + Math.floor(Math.random() * 16777215).toString(16),
                        @endforeach
                    ],
                    data: [
                        @foreach($tipos as $tipos)
                        "{{ $tipos -> id}}",
 
                        @endforeach
                    ]
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: 'Programas y sus metas'
                }

            }

        });
    </script>
   
    @endsection