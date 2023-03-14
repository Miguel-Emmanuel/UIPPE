@extends('layout.navbar')
@section('content')
<?php
$session_id = session('session_id');
$session_name = session('session_name');
$session_tipo = session('session_tipo');
?>
<title>Home</title>
<div class="container p-4">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 py-3">
            <h1>Inicio</h1>
            @if($session_id)
            <?php
            echo '¡Bienvenido! <b>    ' . $session_name . '</b><br>';
            ?>
            @else
            @endif
        </div>
        @if($session_id) <!-- Contenido para verificar sesión iniciada -->
        @if($session_tipo == 1 || $session_tipo == 2 || $session_tipo == 3) <!-- Contenido dependiendo del tipo de usuario -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card text-bg-light border-left-primary shadow h-100 py-2 rounded-4">
                <div class="card-body">
                    <a href="usuarios">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Usuarios
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    5
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-circle fa-2x text-gray-300" style="color: #027333;"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card text-bg-light border-left-primary shadow h-100 py-2 rounded-4">
                <div class="card-body">
                    <a href="areas">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Áreas
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    21
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="bx bxs-grid-alt fa-2x text-gray-300" style="color: #027333;"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card text-bg-light border-left-primary shadow h-100 py-2 rounded-4">
                <div class="card-body">
                    <a href="metas">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Metas
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    5
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-check fa-2x text-gray-300" style="color: #027333;"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card text-bg-light border-left-primary shadow h-100 py-2 rounded-4">
                <div class="card-body">
                    <a href="programas">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Programas
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    4
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="bx bxs-objects-horizontal-left fa-2x text-gray-300" style="color: #027333;"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card text-bg-light border-left-primary shadow h-100 py-2 rounded-4">
                <div class="card-body">
                    <a href="tipos">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Tipos Usuarios
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    5
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="bx bx-male-female fa-3x text-gray-300" style="color: #027333;"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card text-bg-light border-left-primary shadow h-100 py-2 rounded-4">
                <div class="card-body">
                    <a href="areasmetas">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Áreas | Metas
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    5
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="bx bx-male-female fa-3x text-gray-300" style="color: #027333;"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        @elseif($session_tipo == 4)
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card text-bg-light border-left-primary shadow h-100 py-2 rounded-4">
                <div class="card-body">
                    <a href="metas">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Metas
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    5
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-check fa-2x text-gray-300" style="color: #027333;"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        @else
        @endif
        @else
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 py-3 text-center">
            <img src="{{ asset('img/login.png') }}" alt="Inicie Sesión para poder ver el contenido" class="img-fluid" style="width: 800px;">
            <p>Para ver el contenido <a href="/login">Iniciar Sesión</a></p>
        </div>
        @endif
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
        @else
        @endif
    </div>
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