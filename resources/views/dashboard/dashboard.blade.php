@extends('layout.navbar')
@section('content')
<title>Home</title>
<div class="container p-4">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1>Inicio</h1>
            <p>¡Bienvenido! <br>
                @auth 
                    {{ auth()->user()->name ?? auth()->user()->username }}, estas autenticado a la página.
                @endauth 
                @guest 
                    Para ver el contenido <a href="/login">Iniciar Sesión</a> 
                @endguest
            </p>
        </div>
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