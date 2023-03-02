<!Doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="{{ asset('css/menu.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
</head>
<?php
$session_id = session('session_id');
$session_name = session('session_name');
$session_apellido = session('session_apellido');
?>
<header class="header" id="header">
    <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    <div class="header_text">
        @if($session_id)
        <?php
        echo  $session_name . " " . $session_apellido;
        ?>
        @endif
    </div>
    <!-- @auth {{ auth()->user()->name ?? auth()->user()->username }} @endauth -->
</header>

<body id="body-pd">
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="#" class="nav_logo"><i class='bx bxs-calendar nav_logo-icon'></i><span class="nav_logo-name">UIPPE</span></a>
                <!-- <a href="#" class="nav_logo"><img src="{{ asset('logos/uippelogo.png') }}" alt="UIPPE" style="height: 70px;"></a> -->
                <div class="nav_list">
                    <a href="/dashboard" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Panel Administrativo</span> </a>
                    <a href="{{route('areas.index')}}" class="nav_link"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Áreas</span> </a>
                    <a href="{{ route('metas') }}" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Metas</span> </a>
                    <a href="usuarios" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Usuarios</span> </a>
                    <a href="{{ route('programas.index') }}" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">Programas</span> </a>
                    <a href="#" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Stats</span> </a>
                </div>
            </div>
            @if($session_id)
            <a href="logout" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Cerrar Sesión</span> </a>
            @else
            <a href="login" class="nav_link"> <i class='bx bx-log-in nav_icon'></i> <span class="nav_name">Iniciar Sesión</span> </a>
            @endif
            <!-- @guest
            <a href="#" class="nav_link"> <i class='bx bx-log-in nav_icon'></i> <span class="nav_name">Iniciar Sesión</span> </a>
            @endguest
            @auth
            <a href="#" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
            @endauth -->
        </nav>
    </div>

    <!--Container Main start-->
    <div class="height-100">
        @yield('content')
    </div>
    <!--Container Main end-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('js/menu.js') }}"></script>
</body>

</html>