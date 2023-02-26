<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/sesiones.css') }}">
	<title></title>
</head>
<body>
	<div class="container w-50 pb-3 rounded shadow"> 
        <div class="log row m-2 align-items-strech"><!-Fila Contenedora>
            <!-Columnas>
            <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded"><!-Imagen></div>

            <div class="col bg-white pd-5"><!-Sesion>
                <div class="text-end"><img src="{{asset('logos/logotipoutvt.png')}}" width="200px" alt=""></div><!-Logo>
                <h2 class="fw-bold text-center pb-3">LogIn</h2>
                <!-Form de Inicio de Sesion>
                <form action="#">
                    <div class="mb-4">

                    <div class="mb-4">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" name="email" placeholder="correo@proveedor.dominio">
                    </div>

                    <div class="mb-4">
                        <label for="pass" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" name="pass" placeholder="Contraseña">
                    </div>

                    <div class="my-3"><span>Te hace falta una cuenta?</span><a href="">Registrate</a></div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Iniciar Sesion</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>