<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/Sesiones.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title></title>
</head>

<body onload="nobackbutton();">

    <div class="mb5 alert">
        @if($Alerta = Session::get('Exito'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Alerta!</strong> {{$Alerta}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>

    <div class="contenedor rounded shadow">
        <div class="row m-2 align-items-strech"><!-Fila Contenedora>
                <!--Columnas-->
                    <div class="col bg d-none d-lg-block col-md-6 col-lg-6 col-xl-6 rounded"><!-Imagen></div>

                    <div class="col"><!-Sesion>
                            <div class="text-end"><img src="{{asset('logos/logotipoutvt.png')}}" width="200px" alt=""></div><!-Logo>
                                <h2 class="fw-bold text-center pb-3">Inicia Sesión</h2>
                                <!-Form de Inicio de Sesion>
                                    <form action="{{ route('valida') }}" method="POST">
                                        @csrf
                                        <div class="mb-4">
                                            <div class="mb-4">
                                                <label for="email" class="form-label">&nbsp;<i class="fa-solid fa-envelope"></i>Correo Electrónico:</label>
                                                <input type="email" class="form-control" name="email" placeholder="correo@proveedor.dominio" required>
                                            </div>

                                            <div class="mb-4">
                                                <label for="pass" class="form-label">&nbsp;<i class="fa-sharp fa-solid fa-key"></i>Contraseña:</label>
                                                <input type="password" class="form-control" name="pass" placeholder="Contraseña" required>
                                            </div>

                                            <div class="my-3">
                                                <span><a href="{{ route('recuperacion') }}">Recuperar Contraseña</a></span>
                                            </div>
                                            <br>
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-outline-success">Iniciar Sesión</button>
                                            </div>
                                    </form>
                    </div>
        </div>
    </div>
</body>

<script>
    function nobackbutton() {
        window.location.hash = "uippe";
        window.location.hash = "Again-uippe"
        window.onhashchange = function() {
            window.location.hash = "uippe";
        }
    }
</script>

</html>
