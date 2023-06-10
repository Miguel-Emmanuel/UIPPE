<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="stylesheet" href="{{ asset('css/tabla.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Document</title>
</head>
<body>
  <div class="contenedor">
    <h2>Envia una Notificacion</h2>
<form action="{{route('pcorreo')}}" method="GET">
	@csrf
	<label for="">Correo</label><input type="text" name="destinatario" required><br>
	<label for="">Asunto</label><input type="text" name="asunto" required><br>
	<label for="">Mensaje</label><input type="text" name="mensaje" required><br>
	<button type="submit">Enviar correo</button>
</form>
<br>
  <table class="table">
    <thead class="table-dark">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Destinario</th>
        <th scope="col">Asunto</th>
        <th scope="col">Fecha de Enviado</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($correos as $correos)
      <tr>
        <th scope="row">{{$correos->id_correo}}</th>
        <td>{{$correos->Destinatario}}</td>
        <td>{{$correos->Asunto}}</td>
        <td>{{$correos->fecha_envio}}</td>
        <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$correos->id_correo}}"><i class="fa-solid fa-eye"></i>Ver</td>
      </tr>

      <!-- Modal -->
<div class="modal fade" id="exampleModal{{$correos->id_correo}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Correo Enviado a: {{$correos->Destinatario}}</h1>
      </div>
      <div class="modal-body">
        Asunto: {{$correos->Asunto}} <br><br>
        Mensaje:<br>
        {{$correos->Contenido}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


      @endforeach
    </tbody>
  </table>
</div>
</body>
</html>