<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
	<title></title>
</head>
<body>
	<div class="container w-75 mt-5 pb-3 rounded shadow"> 
        <div class="row m-2 align-items-strech"><!-Fila Contenedora>
            <!-Columnas>
            <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded"><!-Imagen></div>

            <div class="col bg-white pd-5"><!-Register>
                <div class="text-end"><img src="{{asset('logos/logotipoutvt.png')}}" width="200px" alt=""></div><!-Logo>
                <h2 class="fw-bold text-center pb-3">Registro</h2>
                <!-Registro>
                <form action="{{ route('register') }}" method="post">
                    {!! csrf_field() !!}
                    <div class="mb-4">
                        <label for="nombre" class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre(s)">
                    </div>

                    <div class="mb-4">
                        <label for="apellidos" class="form-label">Apellidos:</label>
                        <input type="text" class="form-control" name="apellido" placeholder="Apellido Paterno, Materno">
                    </div>

                    <div class="mb-4">
                        <label for="email" class="form-label">E-mail: </label>
                        <input type="email" class="form-control" name="email" placeholder="correo@proveedor.dominio">
                    </div>

                    <div class="mb-4">
                        <label for="pass" class="form-label">Contraseña: </label>
                        <input type="password" class="form-control" name="password" placeholder="Contraseña">
                    </div>

                    <div class="my-3"><span>Ya tienes una cuenta? </span><a href="login">Inicia Sesión</a></div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Registrame</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>