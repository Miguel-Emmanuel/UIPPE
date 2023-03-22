<!Doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="{{ asset('css/menu.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/virtual-select.min.css">

</head>
<?php
$session_id = session('session_id');
$session_name = session('session_name');
$session_apellido = session('session_apellido');
$session_tipo = session('session_tipo');
$session_foto = session('session_foto');
?>
<header class="header" id="header">
    <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    <div class="header_text">
        @if($session_id)
        <?php
        echo  $session_name;
        ?>
        @endif
    </div>
    &nbsp;&nbsp;
    <div class="header_img"> <img src="{{ asset('img/post/'.$session_foto) }}" alt=""> </div>
    <!-- @auth {{ auth()->user()->name ?? auth()->user()->username }} @endauth -->
</header>

<body id="body-pd">
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="/dashboard" class="nav_logo"><i class='bx bxs-calendar nav_logo-icon'></i><span class="nav_logo-name">UIPPE</span></a>
                <!-- <a href="#" class="nav_logo"><img src="{{ asset('logos/uippelogo.png') }}" alt="UIPPE" style="height: 70px;"></a> -->
                <div class="nav_list">
                    @if($session_id)
                    <a href="dashboard" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Panel</span> </a>
                    @if($session_tipo == 4)
                    <a href="metas" class="nav_link"> <i class='bx bx-check nav_icon'></i> <span class="nav_name">Metas</span> </a>
                    @else
                    @endif
                    @else
                    @endif
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
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.js"></script>
    <script>
        (function($) {
            "use strict"; // Start of use strict

            // Toggle the side navigation
            $("#l-navbarToggle, #l-navbarToggleTop").on('click', function(e) {
                $("body").toggleClass("l-navbar-toggled");
                $(".l-navbar").toggleClass("toggled");
                if ($(".l-navbar").hasClass("toggled")) {
                    $('.l-navbar .collapse').collapse('hide');
                };
            });

            // Close any open menu accordions when window is resized below 768px
            $(window).resize(function() {
                if ($(window).width() < 768) {
                    $('.l-navbar .collapse').collapse('hide');
                };

                // Toggle the side navigation when window is resized below 480px
                if ($(window).width() < 480 && !$(".l-navbar").hasClass("toggled")) {
                    $("body").addClass("l-navbar-toggled");
                    $(".l-navbar").addClass("toggled");
                    $('.l-navbar .collapse').collapse('hide');
                };
            });

            // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
            $('body.fixed-nav .l-navbar').on('mousewheel DOMMouseScroll wheel', function(e) {
                if ($(window).width() > 768) {
                    var e0 = e.originalEvent,
                        delta = e0.wheelDelta || -e0.detail;
                    this.scrollTop += (delta < 0 ? 1 : -1) * 30;
                    e.preventDefault();
                }
            });

            // Scroll to top button appear
            $(document).on('scroll', function() {
                var scrollDistance = $(this).scrollTop();
                if (scrollDistance > 100) {
                    $('.scroll-to-top').fadeIn();
                } else {
                    $('.scroll-to-top').fadeOut();
                }
            });

            // Smooth scrolling using jQuery easing
            $(document).on('click', 'a.scroll-to-top', function(e) {
                var $anchor = $(this);
                $('html, body').stop().animate({
                    scrollTop: ($($anchor.attr('href')).offset().top)
                }, 1000, 'easeInOutExpo');
                e.preventDefault();
            });

        })(jQuery); // End of use strict
    </script>
</body>

</html>
