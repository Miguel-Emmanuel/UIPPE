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
        <!-- -----------------------------------------Grafica Muestra----------------------------------- -->
        <h5>Graficas de Muestra </h5>
        <div class="container p-1">
            <div id="my-div">
                <button onclick="mostrarContenido('contenido4')">Areas Activas o Inactivas</button>
                <button onclick="mostrarContenido('contenido5')">Programas Metas</button>
                <button onclick="mostrarContenido('contenido6')">Usuarios Tipos</button>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 py-3">
                <div class="card border-light mb-3" style="max-width: 34rem;">
                    <div id="contenido4" style="display:none;">
                        <!-- Aquí va el contenido 1 -->
                        <canvas id="GraficoAreas" width="600" height="400"></canvas>
                        <div id="my-cerrar">
                            <button onclick="location.reload()">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 py-3">
                <div class="card border-light mb-3" style="max-width: 34rem;">
                    <div id="contenido5" style="display:none;">
                        <!-- Aquí va el contenido 1 -->
                        <canvas id="GraficaProgamasMetas" width="600" height="400"></canvas>
                        <div id="my-cerrar">
                            <button onclick="location.reload()">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 py-3">
                <div class="card border-light mb-3" style="max-width: 34rem;">
                    <div id="contenido6" style="display:none;">
                        <!-- Aquí va el contenido 1 -->
                        <canvas id="GraficaUsuarioTipo" width="600" height="400"></canvas>
                        <div id="my-cerrar">
                            <button onclick="location.reload()">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- -----------------------------------------Grafica de prueba por meses Enero-Marzo ----------------------------------- -->
            <h5>Graficas de las metas por Meses y Trimestral </h5>
            <div class="container p-1">
                <div id="my-div">
                    <button onclick="mostrarContenido('contenido0')">Enero</button>
                    <button onclick="mostrarContenido('contenido1')">Febrero</button>
                    <button onclick="mostrarContenido('contenido2')">Marzo</button>
                    <button onclick="mostrarContenido('contenido3')">Trimestral</button>
                </div>

                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 py-3">
                    <div class="card border-light mb-3" style="max-width: 34rem;">
                        <div id="contenido0" style="display:none;">
                            <!-- Aquí va el contenido 1 -->
                            <canvas id="bar-chart-enero" width="600" height="400"></canvas>
                            <div id="my-cerrar">
                                <button onclick="location.reload()">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 py-3">
                    <div class="card border-light mb-3" style="max-width: 34rem;">
                        <div id="contenido1" style="display:none;">
                            <!-- Aquí va el contenido 1 -->
                            <canvas id="bar-chart-febrero" width="600" height="400"></canvas>
                            <div id="my-cerrar">
                                <button onclick="location.reload()">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 py-3">
                    <div class="card border-light mb-3" style="max-width: 34rem;">
                        <div id="contenido2" style="display:none;">
                            <!-- Aquí va el contenido 1 -->
                            <canvas id="bar-chart-Marzo" width="600" height="400"></canvas>
                            <div id="my-cerrar">
                                <button onclick="location.reload()">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 py-3">
                    <div class="card border-light mb-3" style="max-width: 34rem;">
                        <div id="contenido3" style="display:none;">
                            <!-- Aquí va el contenido 1 -->
                            <canvas id="bar-chart-trimestral" width="600" height="400"></canvas>
                            <div id="my-cerrar">
                                <button onclick="location.reload()">Cerrar</button>
                              </div>
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

            -------------------------------------------------Graficas de


            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js" integrity="sha512-OD9Gn6cAUQezuljS6411uRFr84pkrCtw23Hl5TYzmGyD0YcunJIPSBDzrV8EeCiFxGWWvtJOfVo5pOgB++Jsag==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


            <!-- ------------------------Mostar el contenido de las tablas Enero,Febrero,Marzo y Trimestral-------------------------- -->
            <script>
                function mostrarContenido(id) {
                    // Ocultar todos los contenidos
                    document.getElementById('contenido0').style.display = 'none';
                    document.getElementById('contenido1').style.display = 'none';
                    document.getElementById('contenido2').style.display = 'none';
                    document.getElementById('contenido3').style.display = 'none';

                    // Mostrar el contenido correspondiente al botón presionado
                    document.getElementById(id).style.display = 'block';
                }
            </script>
            <!-- -----------------------------------------------------Mostrar contenido de graficas Muestra------------------- -->
            <script>
                function mostrarContenido(id) {
                    // Ocultar todos los contenidos
                    document.getElementById('contenido4').style.display = 'none';
                    document.getElementById('contenido5').style.display = 'none';
                    document.getElementById('contenido6').style.display = 'none';

                    // Mostrar el contenido correspondiente al botón presionado
                    document.getElementById(id).style.display = 'block';
                }
            </script>





            <!-- -----------------------------------------------Script para modificar la grafica de trimestral------------------------------------------------ -->
            <script>
                new Chart(document.getElementById("bar-chart-trimestral"), {
                    type: 'bar',
                    data: {
                        labels: [
                            @foreach($meses as $meses)
                            "{{ $meses  -> mes }}",
                            @endforeach
                        ],
                        datasets: [{
                            label: "Mes de el año",
                            backgroundColor: [
                                @foreach($programas as $programa)
                                '#' + Math.floor(Math.random() * 16777215).toString(16),
                                @endforeach
                            ],
                            data: [
                                @foreach($trimestral as $trimestral)
                                "{{ $trimestral  -> total }}",
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
                            text: 'Metas registradas por mes'
                        }

                    }

                });
            </script>

            <!-- ------------------------------------------------Script para la grafica de el mes de enero----------------------------------------------------------- -->
            <script>
                new Chart(document.getElementById("bar-chart-enero"), {
                    type: 'bar',
                    data: {
                        labels: [
                            @foreach($eneroDias as $dias)
                            "{{ $dias  -> dia }}",
                            @endforeach
                        ],
                        datasets: [{
                            label: "Programas registrados",
                            backgroundColor: [
                                @foreach($eneroDias as $dias)
                                '#' + Math.floor(Math.random() * 16777215).toString(16),
                                @endforeach
                            ],
                            data: [
                                @foreach($eneroactivos as $activo)
                                "{{ $activo -> total}}",
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
                            text: 'Programas registrados en Enero (Por Dia)'
                        }

                    }

                });
            </script>
            <!-- ------------------------------------------------Script para la grafica de el mes de febrero----------------------------------------------------------- -->
            <script>
                new Chart(document.getElementById("bar-chart-febrero"), {
                    type: 'bar',
                    data: {
                        labels: [
                            @foreach($febreroDias as $dias)
                            "{{ $dias  -> dia }}",
                            @endforeach
                        ],
                        datasets: [{
                            label: "Programas registrados",
                            backgroundColor: [
                                @foreach($febreroDias as $dias)
                                '#' + Math.floor(Math.random() * 16777215).toString(16),
                                @endforeach
                            ],
                            data: [
                                @foreach($febreroactivos as $activo)
                                "{{ $activo -> total}}",
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
                            text: 'Programas registrados en Febrero (Por Dia)'
                        }

                    }

                });
            </script>
            <!-- ------------------------------------------------Script para la grafica de el mes de Marzo----------------------------------------------------------- -->
            <script>
                new Chart(document.getElementById("bar-chart-Marzo"), {
                    type: 'bar',
                    data: {
                        labels: [
                            @foreach($marzoDias as $dias)
                            "{{ $dias  -> dia }}",
                            @endforeach
                        ],
                        datasets: [{
                            label: "Programas registrados",
                            backgroundColor: [
                                @foreach($marzoDias as $dias)
                                '#' + Math.floor(Math.random() * 16777215).toString(16),
                                @endforeach
                            ],
                            data: [
                                @foreach($marzoactivos as $activo)
                                "{{ $activo -> total}}",
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
                            text: 'Programas registrados en Marzo (Por Dia)'
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
                    type: 'line',
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