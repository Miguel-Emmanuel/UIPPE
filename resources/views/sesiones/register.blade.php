<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/sesiones.css') }}">
	<script src="{{ asset('js/Campos.js') }}"></script>
	<title></title>
</head>
<body>
	<h2>Contactanos</h2>
<form action="{{route('pcorreo')}}" method="GET">
	@csrf
	<label for="">Correo</label><input type="text" name="destinatario"><br>
	<label for="">Asunto</label><input type="text" name="asunto"><br>
	<label for="">Mensaje</label><input type="text" name="mensaje"><br>
	<button type="submit">Enviar correo</button>
</form>
	

</body>
</html>