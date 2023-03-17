<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/sesiones.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="{{ asset('js/sesiones.js') }}"></script>
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
    
    <div class="contenedor rounded shadow">
        <div class="text-end"><img src="{{asset('logos/logotipoutvt.png')}}" width="200px" alt=""></div><!-Logo>
            <!-Columna central>
            <h2 class="text-center pb-3">Restablece tu Contraseña</h2>
            <div class="in">

                <form id="recuperar" action="{{route('resetpass')}}" method="GET">
                    @csrf

                    <label for="pass" class="form-label">&nbsp; <i class="fa-sharp fa-solid fa-key"></i> Rellena los campos:</label>
                    <ul>
                        <li>Ingresa la nueva contraseña.</li>
                        <div class="input-group mb-3">
                            <input type="password" name="pass1" id="password" class="form-control" placeholder="Nueva Contraseña" >
                            <button class="btn btn-secondary" onclick="mostrarContrasena()" type="button" id="button-addon2"><i class="fa-solid fa-eye"></i></button>
                          </div>
                          
                    <li>Verifica la contraseña.</li>
                    <div class="input-group mb-3">
                        <input type="password" name="pass2" id="password2" class="form-control" placeholder="Nueva Contraseña">
                        <button class="btn btn-secondary" onclick="mostrarContrasena2()" type="button" id="button-addon2"><i class="fa-solid fa-eye"></i></button>
                      </div>
                </ul>
                <div class="boton mb-3 pt-6"><button class="btn btn-success" type="submit"> Reestablecer</button></div>
                </div>
                
                
            </form>
            </div>
    </div>
</body>
</html>