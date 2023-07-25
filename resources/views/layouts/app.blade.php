<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('pwa/css/theme.css') }}">
    <style>
        .logo-menu {
            width: 140px;
            height: auto;
            margin-left: 40px;
            margin-top: 20px;
        }

        .sidebar-nav>.sidebar-brand {
            line-height: 20px;
            margin-left: 20px;
            border: none;
            box-shadow: none;
        }

        .sidebar-nav li:nth-child(2):before {
            background-color: transparent !important;
        }

        .img-bt-1 {
            width: 100% !important;
        }

        .btn-cerrar-sesion {
            display: block;
            width: 100%;
            text-align: left;
            padding-left: 30px;
            background: transparent;
            border: none;
            color: #ddd;
        }
    </style>
    @laravelPWA
</head>

<body>
    <div id="wrapper">
        <div class="overlay"></div>

        <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
            <img src="{{ asset('images/logo-sumy@2xwhite.png') }}" class="img-fluid logo-menu"><br><br>
            <ul class="nav sidebar-nav mt-5">

                <li class="sidebar-brand"> <a href="#"> </a> </li>
                <li class="sidebar-brand">
                    <a href="#">
                        {{ auth()->user()->name }} {{ auth()->user()->apellidos }}<br>
                        <small>Transportador</small>
                    </a>
                </li>

                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="fa fa-fw fa-plus"></i>Detalles de mi Cuenta <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Perfil</a></li>
                        <li><a href="#">Cambiar Contraseña</a></li>
                        <li>
                            <form method="post" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn-block btn-cerrar-sesion">Cerrar Sesión</button>
                            </form>
                        </li>
                    </ul>
                </li>
                <li> <a href="#"><i class="fa fa-fw fa-home"></i> Dashboard</a> </li>
                <li> <a href="#"><i class="fa fa-fw fa-folder"></i> Pedidos</a> </li>
                <li> <a href="#"><i class="fa fa-fw fa-file-o"></i> Entregas Realizadas</a> </li>
                <li> <a href="#"><i class="fa fa-fw fa-cog"></i> Soporte</a> </li>
                <li><img src="{{ asset('images/sumy-img1.png') }}" class="img-fluid img-bt-1"></li>
                <li class="bt-1">
                    <a class="nav-link">&copy; 2023<br>
                        Desarrollado por Alto Sentido<br>
                    </a>
                </li>
                <li><a href="#">www.altosentido.net</a></li>
            </ul>


        </nav>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <button type="button" class="hamburger is-closed animated fadeInLeft" data-toggle="offcanvas"> <span
                    class="hamb-top"></span> <span class="hamb-middle"></span> <span class="hamb-bottom"></span>
            </button>
            <div class="container">
                @yield('contenido')
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            var trigger = $('.hamburger'),
                overlay = $('.overlay'),
                isClosed = false;

            trigger.click(function() {
                hamburger_cross();
            });

            function hamburger_cross() {

                if (isClosed == true) {
                    overlay.hide();
                    trigger.removeClass('is-open');
                    trigger.addClass('is-closed');
                    isClosed = false;
                } else {
                    overlay.show();
                    trigger.removeClass('is-closed');
                    trigger.addClass('is-open');
                    isClosed = true;
                }
            }

            $('[data-toggle="offcanvas"]').click(function() {
                $('#wrapper').toggleClass('toggled');
            });
        });
    </script>
</body>

</html>
