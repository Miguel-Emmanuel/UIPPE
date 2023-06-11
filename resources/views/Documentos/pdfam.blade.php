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
            <center><h1>Areas|Metas registradas en el sistema</h1></center>
            <br>
            <b>Fecha: @php echo date('d/m/Y'); @endphp</b>

        </thead>
    </table>
    <br>
    <table>    
        <thead>
            <tr>
                <td>#</td>
                <td>Area</td>
                <td>Programa</td>
                <td>Meta</td>
                <td>Objetivo</td>

            </tr>
        </thead>
        @foreach($areasmetas as $am )
        <tr>
</td>
            <td>{{ $am->id_areasmetas}}</td>
            <td>{{ $am->area}}</td>
            <td>{{ $am->pnombre}}</td>
            <td>{{ $am->nmeta}}</td>
            <td>{{ $am->objetivo}}</td>

        </tr>
        @endforeach
    </table>
</body>

</html> 