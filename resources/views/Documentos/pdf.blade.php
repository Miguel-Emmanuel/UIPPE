<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ public_path('/css/app.css') }}" rel="stylesheet" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js" integrity="sha512-OD9Gn6cAUQezuljS6411uRFr84pkrCtw23Hl5TYzmGyD0YcunJIPSBDzrV8EeCiFxGWWvtJOfVo5pOgB++Jsag==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body>
    <table>
        <thead>
            <h1>UIPPE</h1>
        </thead>
        <thead>
            <b>Areas</b>
            <br>
            <b>Fecha: @php echo date('d/m/Y'); @endphp</b>
            <br>
            <b>Lugar: </b>
            <br>
        </thead>
    </table>
    <br>
    <table>    
        <thead>
            <tr>
                <td>Clave</td>
                <td>Nombre</td>
                <td>Descripcion</td>

            </tr>
        </thead>
        @foreach($areas as $a )
        <tr>
            <td>{{ $a->clave}}</td>
            <td>{{ $a->nombre}}</td>
            <td>{{ $a->descripcion}}</td>

        </tr>
        @endforeach
    </table>
</body>

</html>