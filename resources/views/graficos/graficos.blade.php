@extends('layout.navbar')
@section('content')
<?php
$session_id = session('session_id');
$session_name = session('session_name');
$session_tipo = session('session_tipo');
?>
<title>Gráficos</title>
<div class="container p-4">
    <div class="row">
        <div class="col p-4">
            <h3>Reportes</h3>
        </div>
        <div class="col p-4 d-flex justify-content-end">
            <button type="button" class="btn btn-danger" id="btn_alta" data-bs-toggle="modal" data-bs-target="#modalalta"><i class="fa-regular fa-file-pdf"></i></button>&nbsp;&nbsp;
            <button type="button" class="btn btn-success" id="btn_alta" data-bs-toggle="modal" data-bs-target="#modalalta"><i class="fa-regular fa-file-excel"></i></button>
        </div>
    </div>
    <div class="row">
        @if($session_id)
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 py-3">
            <div class="card">
                <div class="card-body">
                    <canvas id="GraficaBecas" width="600" height="400"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 py-3">
            <div class="card">
                <div class="card-body">
                    <canvas id="GraficaPastel" width="600" height="400"></canvas>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 py-3">
            <div class="card">
                <div class="card-body">
                    <canvas id="Graficavertical" width="600" height="400"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 py-3">
            <div class="card">
                <div class="card-body">
                    <canvas id="Graficapuntos" width="600" height="400"></canvas>
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
        @endif
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js" integrity="sha512-OD9Gn6cAUQezuljS6411uRFr84pkrCtw23Hl5TYzmGyD0YcunJIPSBDzrV8EeCiFxGWWvtJOfVo5pOgB++Jsag==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        var ctx = document.getElementById("GraficaBecas").getContext("2d");
        var Grafica = new Chart(ctx, {
            type: "bar",
            data: {
                labels: ['col1', 'col2', 'col3'],
                datasets: [{
                    label: 'Becas Mes de Enero',
                    data: [10, 9, 15],
                    backgroundColor: [
                        'rgb(66, 134, 124)',
                        'rgb(74, 135, 72)',
                        'rgb(229, 89, 50)'
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
                }
            }
        });
    </script>
    <script>
        var ctx = document.getElementById("GraficaPastel").getContext("2d");
        var Grafica = new Chart(ctx, {
            type: "pie",
            data: {
                labels: ['col1', 'col2', 'col3'],
                datasets: [{
                    label: 'Becas Mes de Enero',
                    data: [10, 9, 15],
                    backgroundColor: [
                        'rgb(66, 134, 124)',
                        'rgb(74, 135, 72)',
                        'rgb(229, 89, 50)'
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
                }
            }
        });
    </script>
    <script>
        var ctx = document.getElementById("Graficavertical").getContext("2d");
        var Grafica = new Chart(ctx, {
            type: "horizontalBar",
            data: {
                labels: ['col1', 'col2', 'col3'],
                datasets: [{
                    label: 'Becas Mes de Enero',
                    data: [10, 9, 15, 1],
                    backgroundColor: [
                        'rgb(66, 134, 124)',
                        'rgb(74, 135, 72)',
                        'rgb(229, 89, 50)',
                        'rgb(2, 80, 54)',

                    ],
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
    <script>
        var ctx = document.getElementById("Graficapuntos").getContext("2d");
        var Grafica = new Chart(ctx, {
            type: "line",
            data: {
                labels: ['Enero', 'Febrero', 'Marzo',
                    'Abril', 'Mayo', 'Junio',
                    'Julio', 'Agosto', 'Septiembre',
                ],
                datasets: [{
                    label: 'Becas Mes de Enero',
                    data: [{
                            x: 10,
                            y: 20
                        },
                        {
                            x: 20,
                            y: 30
                        },
                        {
                            x: 30,
                            y: 40
                        },
                        {
                            x: 40,
                            y: 50
                        },
                        {
                            x: 50,
                            y: 60
                        },
                        {
                            x: 60,
                            y: 70
                        },
                        {
                            x: 30,
                            y: 40
                        },
                        {
                            x: 0,
                            y: 0
                        },
                        {
                            x: 10,
                            y: 20
                        }
                    ],
                    borderColor: 'blue',
                    borderWidth: 2,
                    borderDash: [5, 5]

                }]
            },
            options: {
                scales: {
                    xAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
    @endsection