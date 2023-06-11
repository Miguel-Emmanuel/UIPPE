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
                <button onclick="mostrarContenido('contenido4')">Metas asignadas por areas</button>
                <button onclick="mostrarContenido('contenido5')">Programas Metas</button>
                <button onclick="mostrarContenido('contenido6')">Usuarios Puestos</button>
                <button onclick="location.reload()">Cerrar</button>
            </div>


            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 py-3">
                <div class="card border-light mb-3" style="max-width: 34rem;">
                    <div id="contenido4" style="display:none;">
                        <!-- Aquí va el contenido 1 -->
                        <canvas id="GraficoMetasAreas" width="600" height="400"></canvas>
                        <div id="my-cerrar">
                            <center><button onclick="generatePDF()">Generar PDF</button></center>
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
                        <center><button onclick="generatePMPDF()">Generar PDF</button></center>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 py-3">
                <div class="card border-light mb-3" style="max-width: 34rem;">
                    <div id="contenido6" style="display:none;">
                        <!-- Aquí va el contenido 1 -->
                        <canvas id="GraficaUsuarioPuesto" width="600" height="400"></canvas>
                        <div id="my-cerrar">
                        <center><button onclick="generateUPPDF()">Generar PDF</button></center>

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
                    <button onclick="location.reload()">Cerrar</button>

                </div>

                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 py-3">
                    <div class="card border-light mb-3" style="max-width: 34rem;">
                        <div id="contenido0" style="display:none;">
                            <!-- Aquí va el contenido 1 -->
                            <canvas id="Enero" width="600" height="400"></canvas>
                            <div id="my-cerrar">
                            <center><button onclick="generateEPDF()">Generar PDF</button></center>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 py-3">
                    <div class="card border-light mb-3" style="max-width: 34rem;">
                        <div id="contenido1" style="display:none;">
                            <!-- Aquí va el contenido 1 -->
                            <canvas id="Febrero" width="600" height="400"></canvas>
                            <div id="my-cerrar">
                            <center><button onclick="generateFPDF()">Generar PDF</button></center>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 py-3">
                    <div class="card border-light mb-3" style="max-width: 34rem;">
                        <div id="contenido2" style="display:none;">
                            <!-- Aquí va el contenido 1 -->
                            <canvas id="Marzo" width="600" height="400"></canvas>
                            <div id="my-cerrar">
                            <center><button onclick="generateMPDF()">Generar PDF</button></center>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 py-3">
                    <div class="card border-light mb-3" style="max-width: 34rem;">
                        <div id="contenido3" style="display:none;">
                            <!-- Aquí va el contenido 1 -->
                            <canvas id="Trimestral" width="600" height="400"></canvas>
                            <div id="my-cerrar">
                            <center><button onclick="generateTPDF()">Generar PDF</button></center>
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


            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js" integrity="sha512-OD9Gn6cAUQezuljS6411uRFr84pkrCtw23Hl5TYzmGyD0YcunJIPSBDzrV8EeCiFxGWWvtJOfVo5pOgB++Jsag==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>


            <!-- ------------------------Mostar el contenido de las tablas Enero,Febrero,Marzo y Trimestral-------------------------- -->
            <script>
                function mostrarContenido(id) {
                    // Ocultar todos los contenidos
                    document.getElementById('contenido0').style.display = 'none';
                    document.getElementById('contenido1').style.display = 'none';
                    document.getElementById('contenido2').style.display = 'none';
                    document.getElementById('contenido3').style.display = 'none';
                    document.getElementById('contenido4').style.display = 'none';
                    document.getElementById('contenido5').style.display = 'none';
                    document.getElementById('contenido6').style.display = 'none';

                    // Mostrar el contenido correspondiente al botón presionado
                    document.getElementById(id).style.display = 'block';
                }
            </script>
            <!-- -----------------------------------------------------Mostrar contenido de graficas Muestra------------------- -->






            <!-- -----------------------------------------------Script para modificar la grafica de trimestral------------------------------------------------ -->
            <script> 
            const bgTColor = {
                    id: 'bgTColor',
                    beforeDraw: (chart, options) => {
                        const {
                            ctx,
                            width,
                            height
                        } = chart;
                        ctx.fillStyle = 'white';
                        ctx.fillRect(0, 0, width, height)
                        ctx.restore();
                    }
                }
                
                new Chart(document.getElementById("Trimestral"), {
                    type: 'line',
                    data: {
                        labels: [
                           "Enero" , 
                           "Febrero", 
                           "Marzo"
                        ],
                        datasets: [{
                         
                            borderColor: [
                                'rgb(0,99,0)',
                            ],
                            data: [
                                @foreach($trimestral as $trimestral)
                                "{{ $trimestral  -> total }}",
                                @endforeach
                            ],
                            tension: 0.1,
                            fill:false
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

                    },
                    plugins: [bgTColor],

                });

                const GraficoTrimestral = new Chart(
                    document.getElementById('Trimestral'),
                    config
                );

                function generateTPDF() {
                    const canvas = document.getElementById('Trimestral');

                    const canvasImage = canvas.toDataURL('image/jpeg', 1.0);

                    let pdf = new jsPDF('landscape');

                    pdf.setFontSize(20);
                    pdf.addImage(canvasImage, 'JPEG', 15, 15, 280, 150);

                    pdf.save("GraficoTrimestral.pdf")

                }
            </script>

            <!-- ------------------------------------------------Script para la grafica de el mes de enero----------------------------------------------------------- -->
            <script>
                const bgsColor = {
                    id: 'bgsColor',
                    beforeDraw: (chart, options) => {
                        const {
                            ctx,
                            width,
                            height
                        } = chart;
                        ctx.fillStyle = 'white';
                        ctx.fillRect(0, 0, width, height)
                        ctx.restore();
                    }
                }
                new Chart(document.getElementById("Enero"), {
                    type: 'bar',
                    data: {
                        labels: [   
                            @foreach($eneroDias as $dias)
                            "{{ "Dia: " .$dias  -> dia  }}",
                            @endforeach
                        ],
                        datasets: [{
                           
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

                    },  
                    plugins: [bgsColor],

                });

                const GraficoEnero = new Chart(
                    document.getElementById('Enero'),
                    config
                );

                function generateEPDF() {
                    const canvas = document.getElementById('Enero');

                    const canvasImage = canvas.toDataURL('image/jpeg', 1.0);

                    let pdf = new jsPDF('landscape');

                    pdf.setFontSize(20);
                    pdf.addImage(canvasImage, 'JPEG', 15, 15, 280, 150);

                    pdf.save("GraficoEnero.pdf")

                }
            </script>
            <!-- ------------------------------------------------Script para la grafica de el mes de febrero----------------------------------------------------------- -->
            <script>
              const bgFColor = {
                    id: 'bgFColor',
                    beforeDraw: (chart, options) => {
                        const {
                            ctx,
                            width,
                            height
                        } = chart;
                        ctx.fillStyle = 'white';
                        ctx.fillRect(0, 0, width, height)
                        ctx.restore();
                    }
                }
                new Chart(document.getElementById("Febrero"), {
                    type: 'bar',
                    data: {
                        labels: [
                            @foreach($febreroDias as $dias)
                            "{{ "Dia: ". $dias  -> dia }}",
                            @endforeach
                        ],
                        datasets: [{
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

                    },
                    plugins: [bgFColor],
                 
                });
                const GraficoFebrero = new Chart(
                    document.getElementById('Febrero'),
                    config
                );

                function generateFPDF() {
                    const canvas = document.getElementById('Febrero');

                    const canvasImage = canvas.toDataURL('image/jpeg', 1.0);

                    let pdf = new jsPDF('landscape');

                    pdf.setFontSize(20);
                    pdf.addImage(canvasImage, 'JPEG', 15, 15, 280, 150);

                    pdf.save("GraficoFebrero.pdf")

                }
               
            </script>
            <!-- ------------------------------------------------Script para la grafica de el mes de Marzo----------------------------------------------------------- -->
            <script>
                const bgMColor = {
                    id: 'bgMColor',
                    beforeDraw: (chart, options) => {
                        const {
                            ctx,
                            width,
                            height
                        } = chart;
                        ctx.fillStyle = 'white';
                        ctx.fillRect(0, 0, width, height)
                        ctx.restore();
                    }
                }
                new Chart(document.getElementById("Marzo"), {
                    type: 'bar',
                    data: {
                        labels: [
                            @foreach($marzoDias as $dias)
                            "{{ "Dia: " . $dias  -> dia }}",
                            @endforeach
                        ],
                        datasets: [{
                            
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

                    },
                    plugins: [bgMColor],

                });

                const GraficoMarzo = new Chart(
                    document.getElementById('Marzo'),
                    config
                );

                function generateMPDF() {
                    const canvas = document.getElementById('Marzo');

                    const canvasImage = canvas.toDataURL('image/jpeg', 1.0);

                    let pdf = new jsPDF('landscape');

                    pdf.setFontSize(20);
                    pdf.addImage(canvasImage, 'JPEG', 15, 15, 280, 150);

                    pdf.save("GraficoMarzo.pdf")

                }
            </script>


            <!-- -----------------------------------------------Script para modificar la grafica de areas------------------------------------------------ -->

            <script>
                const bgColor = {
                    id: 'bgColor',
                    beforeDraw: (chart, options) => {
                        const {
                            ctx,
                            width,
                            height
                        } = chart;
                        ctx.fillStyle = 'white';
                        ctx.fillRect(0, 0, width, height)
                        ctx.restore();
                    }
                }
                new Chart(document.getElementById("GraficoMetasAreas"), {
                    type: 'pie',
                    data: {
                        labels: [

                            @foreach($areasmetas as $am)

                            "{{ $am -> nombre. " | " .$am ->meta. " Metas " }}",
                            

                            @endforeach
                        ],
                        datasets: [{
                            backgroundColor: [
                                @foreach($areasmetas as $am)
                                "#" + Math.floor(Math.random() * 16777215).toString(16),
                                @endforeach
                            ],
                            data: [
                                @foreach($areasmetas as $am)
                                "{{ $am -> meta }}",

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
                        }
                    },
                    plugins: [bgColor],

                });
                const GraficoMetasAreas = new Chart(
                    document.getElementById('GraficoMetasAreas'),
                    config
                );

                function generatePDF() {
                    const canvas = document.getElementById('GraficoMetasAreas');

                    const canvasImage = canvas.toDataURL('image/jpeg', 1.0);

                    let pdf = new jsPDF('landscape');

                    pdf.setFontSize(20);
                    pdf.addImage(canvasImage, 'JPEG', 15, 15, 280, 150);

                    pdf.save("GraficoMetasAreas.pdf")

                }
            </script>

            <!-- -----------------------------------------------Script para modificar la grafica de programas|metas------------------------------------------------ -->
            <script>
                new Chart(document.getElementById("GraficaProgamasMetas"), {
                    type: 'bar',
                    data: {
                        labels: [
                            @foreach($programas as $programa)
                            "{{ $programa -> abreviatura }}",    
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

            <!-- -----------------------------------------------Script para modificar la grafica de Usuarios|Puestos----------------------------------------------- -->
            <script>
                   const bgUPColor = {
                    id: 'bgUPColor',
                    beforeDraw: (chart, options) => {
                        const {
                            ctx,
                            width,
                            height
                        } = chart;
                        ctx.fillStyle = 'white';
                        ctx.fillRect(0, 0, width, height)
                        ctx.restore();
                    }
                }
                new Chart(document.getElementById("GraficaUsuarioPuesto"), {
                    type: 'pie',
                    data: {
                        labels: [

                            @foreach($puesto as $pue)
                            "{{ $pue -> nombre . "|" . " Total: " .$pue -> id_tipo    }}",

                            @endforeach
                        ],
                        datasets: [{
                          
                            backgroundColor: [
                                @foreach($puesto as $pue)
                                "#" + Math.floor(Math.random() * 16777215).toString(16),
                                @endforeach
                            ],
                            data: [
                                @foreach($puesto as $pue)
                                "{{ $pue -> id_tipo}}",

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
                        }
                    },
                    plugins: [bgTColor],

                });



                const GraficoUsuarioPuesto = new Chart(
                    document.getElementById('GraficaUsuarioPuesto'),
                    config
                );

                function generateUPPDF() {
                    const canvas = document.getElementById('GraficaUsuarioPuesto');

                    const canvasImage = canvas.toDataURL('image/jpeg', 1.0);

                    let pdf = new jsPDF('landscape');

                    pdf.setFontSize(20);
                    pdf.addImage(canvasImage, 'JPEG', 15, 15, 280, 150);

                    pdf.save("GraficaUsuarioPuesto.pdf")

                }
            </script>





            @endsection