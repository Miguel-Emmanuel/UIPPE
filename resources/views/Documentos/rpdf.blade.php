<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js" integrity="sha512-OD9Gn6cAUQezuljS6411uRFr84pkrCtw23Hl5TYzmGyD0YcunJIPSBDzrV8EeCiFxGWWvtJOfVo5pOgB++Jsag==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<body>
    
    Reporte Graficos
    <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card" style="width: 35rem;">
                                <div class="card-body">
                                    <canvas id="GraficaBecas" width="400" height="400"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card" style="width: 35rem;">
                                <div class="card-body">
                                    <canvas id="GraficaPastel" width="400" height="400"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card" style="width: 35rem;">
                                <div class="card-body">
                                    <canvas id="Graficavertical" width="400" height="400"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card" style="width: 35rem;">
                                <div class="card-body">
                                    <canvas id="Graficapuntos" width="400" height="400"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


</body>

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
                        type: "scatter",
                        data: {
                            labels: ['col1', 'col2', 'col3'],
                            datasets: [{
                                label: 'Becas Mes de Enero',
                                data: [{
                                        x: 10,
                                        y: 10
                                    },
                                    {
                                        x: 20,
                                        y: 20
                                    },
                                    {
                                        x: 30,
                                        y: 30
                                    },
                                    {
                                        x: 40,
                                        y: 40
                                    },
                                    {
                                        x: 50,
                                        y: 50
                                    }
                                ],
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
                                        min: 0,
                                        max: 50,
                                        stepSize: 10
                                    }
                                }],
                                xAxes: [{
                                    ticks: {
                                        min: 0,
                                        max: 50,
                                        stepSize: 10
                                    }
                                }]
                            }
                        }
                    });
                </script>
                <script>
                    var chartConfig = {
                        type: 'scatter',
                        data: {
                            datasets: [{
                                label: 'Mi gráfica de puntos',
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
                                    }
                                ],
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
                                xAxes: [{
                                    type: 'linear',
                                    position: 'bottom'
                                }],
                                yAxes: [{
                                    type: 'linear',
                                    position: 'left'
                                }]
                            }
                        }
                    };
                    var myChart = new Chart(document.getElementById('myChart'), chartConfig);
                </script>



  
</html>