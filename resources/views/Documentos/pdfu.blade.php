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
    <img src="data:image/png;base64,{{base64_encode(file_get_contents(public_path('/logos/uippelogo.png'))) }}"  width="200" height="100">
    <img src="data:image/png;base64,{{base64_encode(file_get_contents(public_path('/logos/logotipoutvt.png'))) }}"  width="300px" height="100px" class="image-right">

</head>
<br>
<br>
<br>
<br>
<body>
   
    <table>
        <thead>
            <center><h1>Usuarios registradas en el sistema</h1></center>
            <br>
            <b>Fecha: @php echo date('d/m/Y'); @endphp</b>

        </thead>
    </table>
    <br>
    <table>    
        <thead>
            <tr>
            <td>Foto</td>
                <td>Clave</td>
                <td>Nombre</td>
                <td>Genero</td>
                <td>Academico</td>
                <td>Email</td>

            </tr>
        </thead>
        @foreach($usuarios as $u )
        <tr>
</td>
<td>    <img src="data:image/png;base64,{{base64_encode(file_get_contents(public_path('img/post/'.$u->foto))) }}"  width="100px" height="50px" >
</td>
            <td>{{ $u->clave}}</td>
            <td>{{ $u->nombre. " ". "$u->app". " " . "$u->apm" }}</td>
            <td>{{ $u->gen}}</td>
            <td>{{ $u->academico}}</td>
            <td>{{ $u->email}}</td>

        </tr>
        @endforeach
    </table>
</body>

</html>