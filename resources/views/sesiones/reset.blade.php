<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/sesiones.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Recuperacion de Contraseña</title>
</head>
<body>

    <div class="mb5 alert">
        @if($Alerta = Session::get('Correo'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Alerta!</strong> {{$Alerta}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @elseif($Alerta = Session::get('Error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> {{$Alerta}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    </div>
    
    <div class="container w-75 rounded shadow">
        <div class="text-end"><img src="{{asset('logos/logotipoutvt.png')}}" width="200px" alt=""></div><!-Logo>
            <!-Columna central>
            <h2 class="text-center pb-3">Restablece tu Contraseña</h2>
            <div class="in">

                <form id="recuperar" action="{{route('resetpass')}}" method="GET">
                    @csrf

                    <p>Instrucciones.</p>
                    <ol>
                        <li>Ingresa elcorreo electronico.</li>
                        <li>Ingresa la nueva contraseña.</li>
                        <li>Verifica la contraseña.</li>
                    </ol>

                <div class="mb-4">
                    <label for="email" class="form-label mt-3">&nbsp;<i class="fa-solid fa-envelope"></i> Correo Electronico:</label>
                    <input type="email" class="form-control w-11 mb-5" name="email" placeholder="correo@proveedor.dominio">

                    <label for="pass" class="form-label">&nbsp;<i class="fa-sharp fa-solid fa-key"></i> Nueva Contraseña:</label>
                    <input type="password" class="form-control" name="pass1" placeholder="Nueva Contraseña" required>
                    <input type="password" class="form-control" name="pass2" placeholder="Verificar Contraseña" required>

                </div>
                <div class="boton mb-5"><button class="btn btn-outline-success" type="submit"> Reestablecer</button></div>
                
            </form>
            </div>
    </div>
</body>
</html>