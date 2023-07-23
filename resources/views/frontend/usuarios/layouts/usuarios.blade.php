@extends('frontend.layouts.app')

@section('titulo', 'Cuenta')

@section('content')
<main id="content" role="main">
    <!-- breadcrumb -->
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <!-- breadcrumb -->
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="/">Inicio</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Mi cuenta</li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <aside class="mb-6 border border-width-2 border-color-3 borders-radius-6">
                    <ul id="sidebarNav" class="list-unstyled mb-0 sidebar-navbar menu-cuenta">
                        <li class="cat-item">
                            <a class="dropdown-title" href="{{route('mi-cuenta')}}"><i class="fa fa-thumbtack"></i> Resumen</a>
                        </li>
                        <li class="cat-item current-cat">
                            <a class="dropdown-title" href="{{ route('usuarios.detalles')}}"><i class="fa fa-user"></i> Detalles de la cuenta</a>
                        </li>
                        <li class="cat-item">
                            <a class="dropdown-title" href="{{ route('usuarios.cambiocontrasena') }}"><i class="fa fa-lock"></i> Cambiar contraseña </a>
                        </li>
                        <li class="cat-item">
                            <a class="dropdown-title" href="{{ route('usuarios.direcciones')}}"><i class="fa fa-map-marker"></i> Mis direcciones</a>
                        </li>
                        <li class="cat-item">
                            <a class="dropdown-title" href="{{ route('usuarios.pedidos') }}"><i class="fa fa-shopping-bag"></i> Historial de Pedidos </a>
                        </li>
                        <li class="cat-item">
                            <a class="dropdown-title"  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-window-close"></i> Cerrar Sesión
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                        @if (auth()->user()->rol_id == 3)
                            <li class="cat-item">
                                <a class="dropdown-toggle dropdown-toggle-collapse dropdown-title collapsed font-weight-bold" href="javascript:;" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="sidebarNav1Collapse" data-target="#sidebarNav1Collapse">
                                    <i class="fa fa-tools text-dark"></i> OPCIONES PERFIL FERRETERO
                                </a>

                                <div id="sidebarNav1Collapse" class="collapse" data-parent="#sidebarNav">
                                    <ul id="sidebarNav1" class="list-unstyled dropdown-list">
                                        <!-- Menu List -->
                                        <li><a class="dropdown-item" href="#">Datos Ferretero<span class="text-gray-25 font-size-12 font-weight-normal"></span></a></li>
                                        <li><a class="dropdown-item" href="#">Nivel de usuario<span class="text-gray-25 font-size-12 font-weight-normal"></span></a></li>
                                        <li><a class="dropdown-item" href="#">Línea de Crédito<span class="text-gray-25 font-size-12 font-weight-normal"></span></a></li>
                                        <!-- End Menu List -->
                                    </ul>
                                </div>
                            </li>
                        @endif
                        {{-- <li class="cat-item">
                            <a class="dropdown-toggle dropdown-toggle-collapse dropdown-title collapsed font-weight-bold" href="javascript:;" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="sidebarNav2Collapse" data-target="#sidebarNav2Collapse">
                                <i class="fa fa-shipping-fast text-dark"></i> OPCIONES PERFIL DOMICILIARIO
                            </a>

                            <div id="sidebarNav2Collapse" class="collapse" data-parent="#sidebarNav">
                                <ul id="sidebarNav2" class="list-unstyled dropdown-list">
                                    <!-- Menu List -->
                                    <li><a class="dropdown-item" href="#">Datos domiciliario<span class="text-gray-25 font-size-12 font-weight-normal"></span></a></li>
                                    <li><a class="dropdown-item" href="#">Envíos<span class="text-gray-25 font-size-12 font-weight-normal"></span></a></li>
                                    <li><a class="dropdown-item" href="#">Pagos<span class="text-gray-25 font-size-12 font-weight-normal"></span></a></li>
                                    <!-- End Menu List -->
                                </ul>
                            </div>
                        </li> --}}
                    </ul>

                </aside>

            </div>
            <div class="col-md-8">
                @yield('contenido')
            </div>
        </div>
    </div>
</main>
@endsection
