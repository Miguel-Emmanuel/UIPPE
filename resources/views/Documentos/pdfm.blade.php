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
    <title>Metas PDF</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!--<link href="{{ public_path('/css/app.css') }}" rel="stylesheet" type="text/css">-->
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <img src="data:image/png;base64,{{base64_encode(file_get_contents(public_path('/logos/uippelogo.png'))) }}" height="60px">
    <img src="data:image/png;base64,{{base64_encode(file_get_contents(public_path('/logos/logotipoutvt.png'))) }}" height="60px" class="image-right">
</head>

<body>
    <section class="container my-4">
        <section class="row">
            <section class="col my-3">
                <h3 class="text-center">Metas registradas en el sistema</h3>
            </section>
        </section>
        <b>Fecha: @php echo date('d/m/Y'); @endphp</b>
    </section>
    <br>
    <table class="table table-bordered table-sm">
        <thead>
            <tr class="table-success">
                <td>Clave</td>
                <td>Nombre</td>
                <td>Unidad de Medida</td>
            </tr>
        </thead>
        @foreach($metas as $m )
        <tr>
            <td>{{ $m->clave}}</td>
            <td>{{ $m->nombre}}</td>
            <td>{{ $m->unidadmedida }}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>