<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .image-right {
            float: right;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF</title>
    <link href="{{ public_path('/css/app.css') }}" rel="stylesheet" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js" integrity="sha512-OD9Gn6cAUQezuljS6411uRFr84pkrCtw23Hl5TYzmGyD0YcunJIPSBDzrV8EeCiFxGWWvtJOfVo5pOgB++Jsag==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <img src="data:image/png;base64,{{base64_encode(file_get_contents(public_path('/logos/uippelogo.png'))) }}" width="200" height="100">
    <img src="data:image/png;base64,{{base64_encode(file_get_contents(public_path('/logos/logotipoutvt.png'))) }}" width="300px" height="100px" class="image-right">
    <br>
    <br>
    <br>
    <br>
    <table>
        <thead>
            <center>
                <h1>Areas|Usuarios registradas en el sistema</h1>
            </center>
            <br>
            <b>Fecha: {{ date('d/m/Y') }}</b>
        </thead>
    </table>
    <br>
    <table>
        <thead>
            <tr>
                <td>ID</td>
                <td>Areas</td>
                <td>Usuarios</td>
                <td>Correo</td>
            </tr>
        </thead>
        <tbody>
            @foreach($areausuario as $a)
            <tr>
                <td>{{ $a->id_areasusuarios }}</td>
                <td>{{ $a->nombreA }}</td>
                <td>{{ $a->nombreU.' '.$a->app.' '.$a->apm }}</td>
                <td>{{ $a->correo }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
