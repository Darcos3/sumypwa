<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Title -->
        <title>@yield('titulo') | SUMY - Mayorista Digital Ferretero</title>

        <!-- Required Meta Tags Always Come First -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('frontend/assets/images/favicon.png') }}">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">

        <!-- CSS Implementing Plugins -->
        <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/font-awesome/css/fontawesome-all.min.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/font-electro.css')}}">

        <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/ion-rangeslider/css/ion.rangeSlider.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/animate.css/animate.min.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/hs-megamenu/src/hs.megamenu.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/fancybox/jquery.fancybox.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/slick-carousel/slick/slick.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/estilos_propios.css')}}">

        <!-- CSS Electro Template -->
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/theme.css')}}">
        @yield('styles')
    </head>

    <body data-spy="scroll" data-target=".navbar" data-offset="90" data-bs-smooth-scroll="true">

        <!-- ========== HEADER ========== -->
        <header id="header" class="u-header u-header-left-aligned-nav">
            <div class="u-header__section">
                <!-- Topbar -->
                <div class="u-header-topbar py-2 d-none d-xl-block">
                    <div class="container">
                        <div class="d-flex align-items-center">
                            <div class="topbar-left">
                                <a href="#" class="text-gray-110 font-size-13 u-header-topbar__nav-link">MAYORISTA DIGITAL</a>
                                <a href="https://wa.me/573118099969" target="_blank"><i class="fab fa-whatsapp-square" style="color:#10B418"></i> 311 809 99 69</a>
                            </div>
                            <div class="topbar-right ml-auto">
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border">
                                        <a href="/como-comprar" class="u-header-topbar__nav-link"><i class="far fa-question-circle"></i> Cómo comprar</a>
                                    </li>
                                    {{-- <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border">
                                        <a href="#" class="u-header-topbar__nav-link"><i class="ec ec-transport"></i> Seguir pedido</a>
                                    </li> --}}
                                    <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border">
                                        <a href="{{ route('contacto') }}" class="u-header-topbar__nav-link"><i class="far fa-envelope"></i> Contacto</a>
                                    </li>
                                    {{-- <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border">
                                        <!-- Account Sidebar Toggle Button -->
                                        <a id="sidebarNavToggler" href="javascript:;" role="button" class="u-header-topbar__nav-link"
                                            aria-controls="sidebarContent"
                                            aria-haspopup="true"
                                            aria-expanded="false"
                                            data-unfold-event="click"
                                            data-unfold-hide-on-scroll="false"
                                            data-unfold-target="#sidebarContent"
                                            data-unfold-type="css-animation"
                                            data-unfold-animation-in="fadeInRight"
                                            data-unfold-animation-out="fadeOutRight"
                                            data-unfold-duration="500">
                                            <i class="far fa-user"></i> Cuenta
                                        </a>
                                        <!-- End Account Sidebar Toggle Button -->
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Topbar -->

                <!-- Logo-Search-header-icons -->
                <div class="py-2 py-xl-5 row-logo">
                    <div class="container my-0dot5 my-xl-0">
                        <div class="row align-items-center">
                            <!-- Logo-offcanvas-menu -->
                            <div class="col-auto">
                                <!-- Nav -->
                                <nav class="navbar navbar-expand u-header__navbar py-0 justify-content-xl-between max-width-270 min-width-270">
                                    <!-- Logo -->
                                    <a class="order-1 order-xl-0 navbar-brand u-header__navbar-brand u-header__navbar-brand-center" href="/" aria-label="Electro">
                                        <img src="{{ asset('frontend/assets/images/logo-sumy@2x.png') }}" alt="Sumy">
                                    </a>
                                    <!-- End Logo -->

                                    <!-- Fullscreen Toggle Button -->
                                    <button id="sidebarHeaderInvokerMenu" type="button" class="navbar-toggler d-block btn u-hamburger mr-3 mr-xl-0"
                                        aria-controls="sidebarHeader"
                                        aria-haspopup="true"
                                        aria-expanded="false"
                                        data-unfold-event="click"
                                        data-unfold-hide-on-scroll="false"
                                        data-unfold-target="#sidebarHeader1"
                                        data-unfold-type="css-animation"
                                        data-unfold-animation-in="fadeInLeft"
                                        data-unfold-animation-out="fadeOutLeft"
                                        data-unfold-duration="500">
                                        <span id="hamburgerTriggerMenu" class="u-hamburger__box">
                                            <span class="u-hamburger__inner"></span>
                                        </span>
                                    </button>
                                    <!-- End Fullscreen Toggle Button -->
                                </nav>
                                <!-- End Nav -->

                                <!-- ========== HEADER SIDEBAR ========== -->
                                <aside id="sidebarHeader1" class="u-sidebar u-sidebar--left" aria-labelledby="sidebarHeaderInvokerMenu">
                                    <div class="u-sidebar__scroller">
                                        <div class="u-sidebar__container">
                                            <div class="u-header-sidebar__footer-offset pb-0">
                                                <!-- Toggle Button -->
                                                <div class="position-absolute top-0 right-0 z-index-2 pt-4 pr-7">
                                                    <button type="button" class="close ml-auto"
                                                        aria-controls="sidebarHeader"
                                                        aria-haspopup="true"
                                                        aria-expanded="false"
                                                        data-unfold-event="click"
                                                        data-unfold-hide-on-scroll="false"
                                                        data-unfold-target="#sidebarHeader1"
                                                        data-unfold-type="css-animation"
                                                        data-unfold-animation-in="fadeInLeft"
                                                        data-unfold-animation-out="fadeOutLeft"
                                                        data-unfold-duration="500">
                                                        <span aria-hidden="true"><i class="ec ec-close-remove text-gray-90 font-size-20"></i></span>
                                                    </button>
                                                </div>
                                                <!-- End Toggle Button -->

                                                <!-- Content -->
                                                <div class="js-scrollbar u-sidebar__body">
                                                    <div id="headerSidebarContent" class="u-sidebar__content u-header-sidebar__content">
                                                        <!-- Logo -->
                                                        <a class="d-flex ml-0 navbar-brand u-header__navbar-brand u-header__navbar-brand-vertical" href="/" aria-label="Electro">
                                                            <img src="{{ asset('frontend/assets/images/logo-sumy@2x.png') }}" alt="Sumy">
                                                        </a>
                                                        <!-- End Logo -->

                                                        <!-- List -->
                                                        <ul id="headerSidebarList" class="u-header-collapse__nav">
                                                            <!-- Home Section -->
                                                            <li class="u-has-submenu u-header-collapse__submenu">
                                                                <a class="u-header-collapse__nav-link u-header-collapse__nav-pointer"   href="javascript:;" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="headerSidebarHomeCollapse" data-target="#headerSidebarHomeCollapse">
                                                                    Productos
                                                                </a>

                                                                <div id="headerSidebarHomeCollapse" class="collapse" data-parent="#headerSidebarContent">
                                                                    <ul id="headerSidebarHomeMenu" class="u-header-collapse__nav-list">
                                                                        @foreach($categoriasPrincipales as $cp)
                                                                            <li><a class="u-header-collapse__submenu-nav-link" href="{{ route('categorias.show', App\Models\Categoria::generarUrl($cp) ) }}">{{ $cp->nombre}}</a></li>
                                                                            {{-- <span class="u-header__sub-menu-title"><a href="{{ route('categorias.show', App\Models\Categoria::generarUrl($cp) ) }}"></a></span> --}}
                                                                            {{-- </div>  --}}
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                            <!-- End Home Section -->


                                                            <li class="u-header-collapse__submenu">
                                                                <a class="u-header-collapse__submenu-nav-link" href="/">Inicio</a>
                                                            </li>
                                                            <li class="u-header-collapse__submenu">
                                                                <a class="u-header-collapse__submenu-nav-link" href="/quienes-somos">Quiénes somos</a>
                                                            </li>
                                                            <li class="u-header-collapse__submenu">
                                                                <a class="u-header-collapse__submenu-nav-link" href="{{ route('atributos.marcas') }}">Marcas</a>
                                                            </li>
                                                            <li class="u-header-collapse__submenu">
                                                                <a class="u-header-collapse__submenu-nav-link" href="/ofertas">Ofertas</a>
                                                            </li>
                                                            <li class="u-header-collapse__submenu">
                                                                <a class="u-header-collapse__submenu-nav-link" href="/sumy">Sumy</a>
                                                            </li>
                                                            <li class="u-header-collapse__submenu">
                                                                <a class="u-header-collapse__submenu-nav-link" href="/venta-telefonica">Venta telefónica</a>
                                                            </li>
                                                            <li class="u-header-collapse__submenu">
                                                                <a class="u-header-collapse__submenu-nav-link" href="/ayuda">Ayuda</a>
                                                            </li>
                                                        </ul>
                                                        <!-- End List -->
                                                    </div>
                                                </div>
                                                <!-- End Content -->
                                            </div>
                                        </div>
                                    </div>
                                </aside>
                                <!-- ========== END HEADER SIDEBAR ========== -->
                            </div>
                            <!-- End Logo-offcanvas-menu -->
                            <!-- Search Bar -->
                            <div class="col d-none d-xl-block">
                                <form class="js-focus-state" action="{{ route('productos.buscar') }}" role="form" enctype='multipart/form-data'>
                                    {{-- @csrf --}}
                                    <label class="sr-only" for="searchproduct">Buscar</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control py-2 pl-5 font-size-15 border-right-0 height-40 border-width-2 rounded-left-pill border-primary" name="buscarproductos" id="searchproduct-item" placeholder="Buscar productos" aria-label="Buscar productos" aria-describedby="searchProduct1" required>
                                        <div class="input-group-append">
                                            <!-- Select -->
                                            <select name="categoria" class="js-select selectpicker dropdown-select custom-search-categories-select"
                                                data-style="btn height-40 text-gray-60 font-weight-normal border-top border-bottom border-left-0 rounded-0 border-primary border-width-2 pl-0 pr-5 py-2">
                                                <option value="0" selected>Todas las categorías</option>
                                                @foreach ($categoriasPrincipales as $catPrincipal)
                                                    <option value="{{$catPrincipal->id}}">{{$catPrincipal->nombre}}</option>
                                                    {{-- <li><a class="list-group-item list-group-item-action" href="{{ route('categorias.show', App\Models\Categoria::generarUrl($catPrincipal) ) }}">{{$catPrincipal->nombre}}</a></li> --}}
                                                @endforeach
                                            </select>
                                            <input type="hidden" name="resultados" value="20">
                                            <input type="hidden" name="orden" value="defecto">
                                            <input type="hidden" name="precio_minimo" value="0">
                                            <input type="hidden" name="precio_maximo" value="2000000">
                                            <!-- End Select -->
                                            <button class="btn btn-primary height-40 py-2 px-3 rounded-right-pill" type="submit" id="searchProduct1">
                                                <span class="ec ec-search font-size-24"></span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- End Search Bar -->
                            <!-- Header Icons -->
                            <div class="col col-xl-auto text-right text-xl-left pl-0 pl-xl-3 position-static">
                                <div class="d-inline-flex">
                                    <ul class="d-flex list-unstyled mb-0 align-items-center">
                                        <!-- Search -->
                                        <li class="col d-xl-none px-2 px-sm-3 position-static">
                                            <a id="searchClassicInvoker" class="font-size-22 text-gray-90 text-lh-1 btn-text-secondary" href="javascript:;" role="button"
                                                data-toggle="tooltip"
                                                data-placement="top"
                                                title="Search"
                                                aria-controls="searchClassic"
                                                aria-haspopup="true"
                                                aria-expanded="false"
                                                data-unfold-target="#searchClassic"
                                                data-unfold-type="css-animation"
                                                data-unfold-duration="300"
                                                data-unfold-delay="300"
                                                data-unfold-hide-on-scroll="true"
                                                data-unfold-animation-in="slideInUp"
                                                data-unfold-animation-out="fadeOut">
                                                <span class="ec ec-search"></span>
                                            </a>

                                            <!-- Input -->
                                            <div id="searchClassic" class="dropdown-menu dropdown-unfold dropdown-menu-right left-0 mx-2" aria-labelledby="searchClassicInvoker">
                                                <form class="js-focus-state input-group px-3">
                                                    <input class="form-control" type="search" placeholder="Search Product">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary px-3" type="button"><i class="font-size-18 ec ec-search"></i></button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- End Input -->
                                        </li>
                                        <!-- End Search -->

                                        {{-- BOTON DE FAVORITOS --}}
                                        {{-- <li class="col d-none d-xl-block">

                                            @auth
                                                <a href="{{ route('usuarios.favoritos') }}" class="text-gray-90" data-toggle="tooltip" data-placement="top" title="Favoritos">
                                            @endauth
                                            @guest
                                            <a href="{{ route('login') }}" class="text-gray-90" data-toggle="tooltip" data-placement="top" title="Favoritos">
                                            @endguest
                                                <i class="font-size-22 ec ec-favorites"></i>
                                                @auth
                                                    <span id="icono-favorito" class="bg-lg-down-black width-22 height-22 bg-primary position-absolute d-flex align-items-center justify-content-center rounded-circle left-12 top-8 font-weight-bold font-size-12">{{auth()->user()->productos->count()}}</span>
                                                @endauth
                                            </a>
                                        </li> --}}
                                        <li class="col d-none d-xl-block">

                                            @auth
                                                <a href="{{ route('usuarios.favoritos') }}" class="text-gray-90" data-toggle="tooltip" data-placement="top" title="Favoritos">
                                            @endauth
                                            @guest
                                            <a href="{{ route('login') }}" class="text-gray-90" data-toggle="tooltip" data-placement="top" title="Favoritos">
                                            @endguest 
                                                <i class="font-size-22 ec ec-favorites"></i>
                                                @auth
                                                    <span id="icono-favorito" class="bg-lg-down-black width-22 height-22 bg-primary position-absolute d-flex align-items-center justify-content-center rounded-circle left-12 top-8 font-weight-bold font-size-12">{{auth()->user()->productos->count()}}</span>
                                                @endauth
                                            </a>
                                        </li>

                                        {{-- /BOTON DE FAVORITOS --}}
                                        @auth
                                            <li class="col px-2 px-sm-3"><a href="{{ auth()->user()->rol_id == 1 ? route('dashboard.index') : route('mi-cuenta')}}" class="text-gray-90" style="color: #f1592a;" data-toggle="tooltip" data-placement="top" title="Bienvenid@ {{auth()->user()->email}}"><i class="font-size-22 ec ec-user"></i></a></li>
                                        @endauth
                                        @guest
                                            <li class="col px-2 px-sm-3"><a href="{{ route('login')}}" class="text-gray-90" data-toggle="tooltip" data-placement="top" title="Registrarse o Iniciar sesión"><i class="font-size-22 ec ec-user"></i></a></li>
                                        @endguest

                                        <li class="col pr-xl-0 px-2 px-sm-3">
                                            <a href="{{ auth()->check() ? route('usuarios.carrito') : '#' }}" class="text-gray-90 position-relative d-flex " data-toggle="tooltip" data-placement="top" title="Carrito">
                                                <i class="font-size-22 ec ec-shopping-bag"></i>
                                                <span id="icono-carrito" class="bg-lg-down-black width-22 height-22 bg-primary position-absolute d-flex align-items-center justify-content-center rounded-circle left-12 top-8 font-weight-bold font-size-12">{{ $carritoTotal['cantidad'] }}</span>
                                                <span id="total-carrito" class="d-none d-xl-block font-weight-bold font-size-16 text-gray-90 ml-3">${{ number_format($carritoTotal['total'],0,',','.') }}</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End Header Icons -->
                        </div>
                    </div>
                </div>
                <!-- End Logo-Search-header-icons -->

                <!-- Primary-menu-wide -->
                <div class="d-none d-xl-block bg-primary" id="lg_desktop">
                    <div class="container">
                        <div class="min-height-45">
                            <!-- Nav -->
                            <nav class="js-mega-menu navbar navbar-expand-md u-header__navbar u-header__navbar--wide u-header__navbar--no-space">
                                <!-- Navigation -->
                                <div id="navBar" class="collapse navbar-collapse u-header__navbar-collapse">
                                    <ul class="navbar-nav u-header__navbar-nav">

                                        <!-- TV & Audio -->
                                        <li class="nav-item hs-has-mega-menu u-header__nav-item"
                                            data-event="hover"
                                            data-animation-in="slideInUp"
                                            data-animation-out="fadeOut">
                                            <a id="ProductosMegamenu" class="nav-link u-header__nav-link u-header__nav-link-toggle" href="javascript:;" style="background-color: #000"  aria-haspopup="true" aria-expanded="false"><span>Productos</span></a>

                                            <!-- TV & Audio - Mega Menu -->
                                            <div class="hs-mega-menu w-100 u-header__sub-menu" aria-labelledby="TVMegaMenu">
                                                <div class="row u-header__mega-menu-wrapper">
                                                    @foreach($categoriasPrincipales->chunk(6) as $chunk)
                                                        <div class="col-md-3">
                                                            @foreach($chunk as $item)
                                                                <span class="u-header__sub-menu-title"><a href="{{ route('categorias.show', App\Models\Categoria::generarUrl($item) ) }}">{{ $item->nombre}}</a></span>
                                                            @endforeach
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <!-- End TV & Audio - Mega Menu -->
                                        </li>
                                        <!-- End Pages -->

                                        <!-- Home -->
                                        <li class="nav-item hs-has-mega-menu u-header__nav-item"
                                            data-event="hover"
                                            data-animation-in="slideInUp"
                                            data-animation-out="fadeOut"
                                            data-position="left">
                                            <a id="homeMegaMenu" class="nav-link u-header__nav-link" href="/" aria-haspopup="true" aria-expanded="false">Inicio</a>
                                        </li>
                                        <!-- End Home -->

                                        <!-- Quienes somos -->
                                        {{-- <li class="nav-item hs-has-mega-menu u-header__nav-item"
                                            data-event="hover"
                                            data-animation-in="slideInUp"
                                            data-animation-out="fadeOut"
                                            data-position="left">
                                            <a id="homeMegaMenu" class="nav-link u-header__nav-link" href="/quienes-somos" aria-haspopup="true" aria-expanded="false">Quiénes somos</a>
                                        </li> --}}
                                        <!-- End Quienes somos -->

                                        <!-- MARCAS -->

                                        <li class="nav-item hs-has-mega-menu u-header_ _nav-item" data-event="hover" data-animation-in="slideInUp" data-animation-out="fadeOut">
                                            <a id="MarcasMegaMenu" class="nav-link u-header__nav-link u-header__nav-link-toggle" href="javascript:;" aria-haspopup="true" aria-expanded="false">Marcas</a>

                                            <!-- Marca - Mega Menu -->
                                            <div class="hs-mega-menu w-100 u-header__sub-menu animated fadeOut mega-menu-marcas" aria-labelledby="MenuMarcas" style="display: none;">
                                                <div class="row u-header__mega-menu-wrapper menu-contenedor-marcas">
                                                    @foreach ($marcas->terminos as $marca)
                                                        <div class="col-md-2 mb-5 text-center">
                                                            <a class="lnk-marca" href="/marcas/marca/{{ $marca->nombre }}">
                                                                <div class="wrap-img-marca">
                                                                    @if($marca->imagen != '')
                                                                    <img class="img-thumbnail img-rounded" src="{{ asset('storage/terminos/'.$marca->imagen )  }}" alt="Image Description" style="width: 100px; height: 100px">
                                                                    @else
                                                                    <img src="{{ asset('frontend/assets/images/marca_none.png' )  }}" class="img-thumbnail img-rounded" style="width: 100px; height: 100px" title="Marca sin imagen">
                                                                    @endif 
                                                                </div>
                                                                <br> <div class="n_marca">{{ $marca->nombre }}</div>
                                                            </a>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <!-- End Movies & Games - Mega Menu -->
                                        </li>
                                        <!-- End Marcas -->

                                        

                                        <!-- OFERTAS -->
                                        <li class="nav-item hs-has-mega-menu u-header__nav-item"
                                        data-event="hover"
                                        data-animation-in="slideInUp"
                                        data-animation-out="fadeOut"
                                        data-position="left">
                                        <a id="homeMegaMenu" class="nav-link u-header__nav-link" href="/ofertas" aria-haspopup="true" aria-expanded="false">Ofertas</a>
                                        </li>
                                        <!-- End Ofertas -->
                                        
                                        <!-- Sumy -->
                                        <li class="nav-item hs-has-mega-menu u-header_ _nav-item" data-event="hover" data-animation-in="slideInUp" data-animation-out="fadeOut">
                                            <a id="SumyMegaMenu" class="nav-link u-header__nav-link u-header__nav-link-toggle" href="javascript:;" aria-haspopup="true" aria-expanded="false">Sumy</a>

                                            <!-- Sumy - Mega Menu -->
                                            <div class="hs-mega-menu w-100 u-header__sub-menu animated fadeOut mega-menu-sumy" aria-labelledby="MenuSumy" style="display: none;">
                                                <div class="row mb-2 mt-5">
                                                    <div class="col-md-12 text-center">
                                                        <h2 class="fw-bold mb-2"> Somos <span class="text-primary">SUMY</span>, mayorista digital </h2>
                                                        <p>Iniciamos operación en Cali, desde el año 2017 en nuestra sede física en el barrio Jorge Sadwasky,<br>
                                                            y desde el año 2023, migramos operaciones a nuestra plataforma digital <a href="#">www.sumy.com</a></p>
                                                    </div>
                                                </div> 
                                                <div class="row mb-3 d-flex">        
                                                    <div class="col-md-4 text-center">
                                                        <h6>Venta Telefónica</h6>
                                                        <p>Cel. 311 809 9969 / 302 868 3818<br>
                                                        Fijo. 335 9971 <br>
                                                        o comunícate con nuestra asistente virtual</p>
                                                        <a href="https://wa.me/573118099969" target="_blank"><img src="{{ asset('frontend/assets/images/suly-ws.png') }}" width="180"></a>
                                                    </div>
                                                    <div class="col-md-4 text-center">
                                                        <h6>Horarios de atención</h6>
                                                        <p>Lunes a Viernes 7:30am a 6:00 pm<br>
                                                        Sábados 7:30am a 4:00</p>
                                                        <img src="{{ asset('frontend/assets/images/soon-app2.png') }}" width="180">
                                                    </div>
                                                    <div class="col-md-4 text-center">
                                                        <h6>Compra seguro</h6>
                                                        <p>Pagos en línea<br> 100% fáciles y rápidos</p>
                                                        <img src="{{ asset('frontend/assets/images/wompi.png') }}" width="180">
                                                    </div>
                                                
                                                </div>
                                            </div>
                                            <!-- End Mega Menu -->
                                        </li>
                                        <!-- End Sumy -->

                                        <!-- GARANTIA -->
                                        {{-- <li class="nav-item hs-has-mega-menu u-header__nav-item"
                                        data-event="hover"
                                        data-animation-in="slideInUp"
                                        data-animation-out="fadeOut"
                                        data-position="left">
                                        <a id="homeMegaMenu" class="nav-link u-header__nav-link" href="{{ route('garantia-sumy') }}" aria-haspopup="true" aria-expanded="false">Garantía SUMY</a>
                                        </li> --}}
                                        <!-- End Garantias -->

                                        <!-- Venta Telefonica -->

                                        <li class="nav-item hs-has-mega-menu u-header__nav-item"
                                        data-event="hover"
                                        data-animation-in="slideInUp"
                                        data-animation-out="fadeOut"
                                        data-position="left">
                                        <a id="homeMegaMenu" class="nav-link u-header__nav-link" href="/venta-telefonica" aria-haspopup="true" aria-expanded="false">Venta telefónica</a>
                                        </li>
                                        <!-- End Venta Telefonica -->


                                        <!-- CONTACTENOS -->
                                        <li class="nav-item hs-has-mega-menu u-header__nav-item"
                                        data-event="hover"
                                        data-animation-in="slideInUp"
                                        data-animation-out="fadeOut"
                                        data-position="left">
                                        <a id="homeMegaMenu" class="nav-link u-header__nav-link" href="/ayuda" aria-haspopup="true" aria-expanded="false">Ayuda</a>
                                        </li>
                                        <!-- End Contactenos -->
                                    </ul>
                                </div>
                                <!-- End Navigation -->
                            </nav>
                            <!-- End Nav -->
                        </div>
                    </div>
                </div>
                <!-- End Primary-menu-wide -->
            </div>
        </header>
        <!-- ========== END HEADER ========== -->

        <!-- ========== MAIN CONTENT ========== -->
        @yield('content')
        <!-- ========== END MAIN CONTENT ========== -->
        <!-- ========== FOOTER ========== -->
        <footer>

            <!-- Footer-newsletter -->
            <div class="bg-primary py-3">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-7 mb-md-3 mb-lg-0">
                            <div class="row align-items-center">
                                {{-- <div class="col-auto flex-horizontal-center">
                                    <i class="ec ec-newsletter font-size-40 text-white"></i>
                                    <h2 class="font-size-20 mb-0 ml-3 text-white">Boletín de Noticias</h2>
                                </div> --}}
                                <div class="col my-4 my-md-0">
                                    {{-- <h5 class="font-size-15 ml-4 mb-0 text-white">Recibe <strong>descuentos, ofertas y novedades.</strong></h5> --}}
                                    <h5 class="font-size-15 ml-4 mb-0 text-white text-boletin">
                                    <i class="fa fa-paper-plane fa-1x"></i> 
                                    Obtén gratis el manual con los 3 secretos para destapar cañerias que si funcionan</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <!-- Subscribe Form -->
                            <form class="js-validate js-form-message" method="POST" action="{{ route('subscribe.index') }}">
                                @csrf
                                <label class="sr-only" for="subscribeSrEmail">Correo electrónico</label>
                                <div class="input-group input-group-pill">
                                    <input type="email" class="form-control border-0 height-40" name="email" id="subscribeSrEmail" placeholder="Correo electrónico" aria-label="Email address" aria-describedby="subscribeButton" required
                                    data-msg="Ingrese un correo electrónico valido.">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-dark btn-sm-wide height-40 py-2" id="subscribeButton" style="background: #000">Enviar</button>
                                    </div>
                                </div>
                            </form>
                            <!-- End Subscribe Form -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Footer-newsletter -->
            <!-- Footer-bottom-widgets -->
            <div class="pt-8 pb-4 bg-gray-13">
                <div class="container mt-1">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-6">
                                <a href="#" class="d-inline-block">
                                    <img src="{{ asset('frontend/assets/images/logo-sumy@2x.png') }}" alt="Sumy" width="180px">
                                </a>
                            </div>
                            <div class="mb-4">
                                <div class="row no-gutters">
                                    <div class="col-auto">
                                        <i class="ec ec-support text-primary font-size-56"></i>
                                    </div>
                                    <div class="col pl-3">
                                        <div class="font-size-13 font-weight-light">Tiene preguntas? Llámenos!</div>
                                        <a href="tel:+573118099969" class="font-size-20 text-gray-90">+57 311 809 99 69 </a>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <h6 class="mb-1 font-weight-bold">Datos de Contacto</h6>
                                <address class="">
                                    Calle 13 # 49-07, Cali - Valle<br>
                                    servicioalcliente@sumy.com.co
                                </address>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 col-md mb-4 mb-md-0">
                                    <h6 class="mb-3 font-weight-bold">Servicio al cliente</h6>
                                    <!-- List Group -->
                                    <ul class="list-group list-group-flush list-group-borderless mb-0 list-group-transparent">
                                        <li>
                                            <a class="list-group-item list-group-item-action" href="/venta-empresas">Venta a empresas</a>
                                        </li>
                                        <li>
                                            <a class="list-group-item list-group-item-action" href="/venta-telefonica#mediospago">Medios de pago</a>
                                        </li>
                                        {{-- <li>
                                            <a class="list-group-item list-group-item-action" href="#">Cambio y devoluciones</a>
                                        </li> --}}
                                        {{-- <li>
                                            <a class="list-group-item list-group-item-action" href="/garantia-sumy">Garantía SUMY</a>
                                        </li> --}}
                                        <li>
                                            <a class="list-group-item list-group-item-action" href="/politica-privacidad#cargosporenvio">Envíos y garantías</a>
                                        </li>
                                        <li>
                                            <a class="list-group-item list-group-item-action" href="/politica-privacidad#politicasprivacidad">Políticas de privacidad</a>
                                        </li>
                                        <li>
                                            <a class="list-group-item list-group-item-action" href="/politica-privacidad#terminos">Términos y condiciones</a>
                                        </li>
                                    </ul>
                                    <!-- End List Group -->
                                </div>

                                <div class="col-12 col-md mb-4 mb-md-0">
                                    <h6 class="mb-3 font-weight-bold">Links de Interés</h6>

                                    <!-- List Group -->
                                    <ul class="list-group list-group-flush list-group-borderless mb-0 list-group-transparent">
                                        <li>
                                            <a class="list-group-item list-group-item-action" href="{{ route('usuarios.pedidos') }}">Seguimiento de pedido</a>
                                        </li>
                                        <li>
                                            <a class="list-group-item list-group-item-action" href="/novedades">Novedades</a>
                                        </li>
                                        <li>
                                            <a class="list-group-item list-group-item-action" href="/mas-vendido">Lo mas vendido</a>
                                        </li>
                                        <li>
                                            <a class="list-group-item list-group-item-action" href="/como-comprar">¿Cómo comprar?</a>
                                        </li>
                                        <li>
                                            <a class="list-group-item list-group-item-action" href="/insuperables">Productos insuperables</a>
                                        </li>
                                    </ul>
                                    <!-- End List Group -->
                                </div>

                                <div class="col-12 col-md mb-4 mb-md-0">
                                    <h6 class="mb-3 font-weight-bold">Descarga la App SUMY</h6>

                                    <img src="{{ asset('frontend/assets/images/soon-app2.png') }}" width="180">

                                    {{-- <h6 class="mb-3 font-weight-bold">Síguenos en nuestras redes</h6> --}}

                                    <ul class="list-inline mb-0 opacity-7">
                                        <li class="list-inline-item mr-0">
                                            <a class="btn font-size-20 btn-icon btn-soft-dark btn-bg-transparent rounded-circle" href="https://www.facebook.com" target="_blank">
                                                <span class="fab fa-facebook-f btn-icon__inner"></span>
                                            </a>
                                        </li>
                                        <li class="list-inline-item mr-0">
                                            <a class="btn font-size-20 btn-icon btn-soft-dark btn-bg-transparent rounded-circle" href="https://www.instagram.com" target="_blank">
                                                <span class="fab fa-instagram btn-icon__inner"></span>
                                            </a>
                                        </li>
                                        <li class="list-inline-item mr-0">
                                            <a class="btn font-size-20 btn-icon btn-soft-dark btn-bg-transparent rounded-circle" href="https://www.youtube.com" target="_blank">
                                                <span class="fab fa-youtube btn-icon__inner"></span>
                                            </a>
                                        </li>
                                        <li class="list-inline-item mr-0">
                                            <a class="btn font-size-20 btn-icon btn-soft-dark btn-bg-transparent rounded-circle" href="https://wa.me/573118099969" target="_blank">
                                                <span class="fab fa-whatsapp btn-icon__inner"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Footer-bottom-widgets -->
            <!-- Footer-copy-right -->
            <div class="bg-gray-14 py-2">
                <div class="container">
                    <div class="flex-center-between d-block d-md-flex">
                        <div class="mb-3 mb-md-0">© <a href="#" class="font-weight-bold text-gray-90">SUMY</a> - Todos los derechos reservados</div>
                        <div class="text-md-right">
                            Desarrollado por <a href="#">Altosentido.net</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Footer-copy-right -->
        </footer>
        <!-- ========== END FOOTER ========== -->

        <!-- ========== SECONDARY CONTENTS ========== -->
        <!-- Account Sidebar Navigation -->
        <aside id="sidebarContent" class="u-sidebar u-sidebar__lg" aria-labelledby="sidebarNavToggler">
            <div class="u-sidebar__scroller">
                <div class="u-sidebar__container">
                    <div class="js-scrollbar u-header-sidebar__footer-offset pb-3">
                        <!-- Toggle Button -->
                        <div class="d-flex align-items-center pt-4 px-7">
                            <button type="button" class="close ml-auto"
                                aria-controls="sidebarContent"
                                aria-haspopup="true"
                                aria-expanded="false"
                                data-unfold-event="click"
                                data-unfold-hide-on-scroll="false"
                                data-unfold-target="#sidebarContent"
                                data-unfold-type="css-animation"
                                data-unfold-animation-in="fadeInRight"
                                data-unfold-animation-out="fadeOutRight"
                                data-unfold-duration="500">
                                <i class="ec ec-close-remove"></i>
                            </button>
                        </div>
                        <!-- End Toggle Button -->

                        <!-- Content -->
                        <div class="js-scrollbar u-sidebar__body">
                            <div class="u-sidebar__content u-header-sidebar__content">
                                <form class="js-validate">
                                    <!-- Login -->
                                    <div id="login" data-target-group="idForm">
                                        <!-- Title -->
                                        <header class="text-center mb-7">
                                            <h2 class="h4 mb-0">Bienvenid@ a SUMY</h2>
                                            <p>Ingresa para administrar tu cuenta.</p>
                                        </header>
                                        <!-- End Title -->

                                        <!-- Form Group -->
                                        <div class="form-group">
                                            <div class="js-form-message js-focus-state">
                                                <label class="sr-only" for="signinEmail">Email</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="signinEmailLabel">
                                                            <span class="fas fa-user"></span>
                                                        </span>
                                                    </div>
                                                    <input type="email" class="form-control" name="email" id="signinEmail" placeholder="Email" aria-label="Email" aria-describedby="signinEmailLabel" required
                                                    data-msg="Por favor ingrese un email válido."
                                                    data-error-class="u-has-error"
                                                    data-success-class="u-has-success">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Form Group -->

                                        <!-- Form Group -->
                                        <div class="form-group">
                                            <div class="js-form-message js-focus-state">
                                              <label class="sr-only" for="signinPassword">Password</label>
                                              <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="signinPasswordLabel">
                                                        <span class="fas fa-lock"></span>
                                                    </span>
                                                </div>
                                                <input type="password" class="form-control" name="password" id="signinPassword" placeholder="Password" aria-label="Password" aria-describedby="signinPasswordLabel" required
                                                   data-msg="Su contraseña es inválida. Intente de nuevo."
                                                   data-error-class="u-has-error"
                                                   data-success-class="u-has-success">
                                              </div>
                                            </div>
                                        </div>
                                        <!-- End Form Group -->

                                        <div class="d-flex justify-content-end mb-4">
                                            <a class="js-animation-link small link-muted" href="javascript:;"
                                               data-target="#forgotPassword"
                                               data-link-group="idForm"
                                               data-animation-in="slideInUp">¿Olvidó la contraseña?</a>
                                        </div>

                                        <div class="mb-2">
                                            <button type="submit" class="btn btn-block btn-sm btn-primary transition-3d-hover">Ingresar</button>
                                        </div>

                                        <div class="text-center mb-4">
                                            <span class="small text-muted">¿No tiene una cuenta?</span>
                                            <a class="js-animation-link small text-dark" href="javascript:;"
                                               data-target="#signup"
                                               data-link-group="idForm"
                                               data-animation-in="slideInUp">Registrarse
                                            </a>
                                        </div>

                                        {{-- <div class="text-center">
                                            <span class="u-divider u-divider--xs u-divider--text mb-4">OR</span>
                                        </div>

                                        <!-- Login Buttons -->
                                        <div class="d-flex">
                                            <a class="btn btn-block btn-sm btn-soft-facebook transition-3d-hover mr-1" href="#">
                                              <span class="fab fa-facebook-square mr-1"></span>
                                              Facebook
                                            </a>
                                            <a class="btn btn-block btn-sm btn-soft-google transition-3d-hover ml-1 mt-0" href="#">
                                              <span class="fab fa-google mr-1"></span>
                                              Google
                                            </a>
                                        </div> --}}
                                        <!-- End Login Buttons -->
                                    </div>

                                    <!-- Signup -->
                                    <div id="signup" style="display: none; opacity: 0;" data-target-group="idForm">
                                        <!-- Title -->
                                        <header class="text-center mb-7">
                                        <h2 class="h4 mb-0">Bienvenid@ a SUMY.</h2>
                                        <p>Rellena el formulario para iniciar.</p>
                                        </header>
                                        <!-- End Title -->

                                        <!-- Form Group -->
                                        <div class="form-group">
                                            <div class="js-form-message js-focus-state">
                                                <label class="sr-only" for="signupEmail">Email</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="signupEmailLabel">
                                                            <span class="fas fa-user"></span>
                                                        </span>
                                                    </div>
                                                    <input type="email" class="form-control" name="email" id="signupEmail" placeholder="Email" aria-label="Email" aria-describedby="signupEmailLabel" required
                                                    data-msg="Por favor ingrese un email válido."
                                                    data-error-class="u-has-error"
                                                    data-success-class="u-has-success">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Input -->

                                        <!-- Form Group -->
                                        <div class="form-group">
                                            <div class="js-form-message js-focus-state">
                                                <label class="sr-only" for="signupPassword">Contraseña</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="signupPasswordLabel">
                                                            <span class="fas fa-lock"></span>
                                                        </span>
                                                    </div>
                                                    <input type="password" class="form-control" name="password" id="signupPassword" placeholder="Contraseña" aria-label="Password" aria-describedby="signupPasswordLabel" required
                                                    data-msg="Su contraseña es inválida. Intente de nuevo."
                                                    data-error-class="u-has-error"
                                                    data-success-class="u-has-success">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Input -->

                                        <!-- Form Group -->
                                        <div class="form-group">
                                            <div class="js-form-message js-focus-state">
                                            <label class="sr-only" for="signupConfirmPassword">Confirmar Contraseña</label>
                                                <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="signupConfirmPasswordLabel">
                                                        <span class="fas fa-key"></span>
                                                    </span>
                                                </div>
                                                <input type="password" class="form-control" name="confirmPassword" id="signupConfirmPassword" placeholder="Confirmar Contraseña" aria-label="Confirmar Contraseña" aria-describedby="signupConfirmPasswordLabel" required
                                                data-msg="La contraseña no es igual."
                                                data-error-class="u-has-error"
                                                data-success-class="u-has-success">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Input -->

                                        <div class="mb-2">
                                            <button type="submit" class="btn btn-block btn-sm btn-primary transition-3d-hover">Iniciar</button>
                                        </div>

                                        <div class="text-center mb-4">
                                            <span class="small text-muted">¿Ya tiene una cuenta?</span>
                                            <a class="js-animation-link small text-dark" href="javascript:;"
                                                data-target="#login"
                                                data-link-group="idForm"
                                                data-animation-in="slideInUp">Ingresar
                                            </a>
                                        </div>

                                        {{-- <div class="text-center">
                                            <span class="u-divider u-divider--xs u-divider--text mb-4">OR</span>
                                        </div>

                                        <!-- Login Buttons -->
                                        <div class="d-flex">
                                            <a class="btn btn-block btn-sm btn-soft-facebook transition-3d-hover mr-1" href="#">
                                                <span class="fab fa-facebook-square mr-1"></span>
                                                Facebook
                                            </a>
                                            <a class="btn btn-block btn-sm btn-soft-google transition-3d-hover ml-1 mt-0" href="#">
                                                <span class="fab fa-google mr-1"></span>
                                                Google
                                            </a>
                                        </div> --}}
                                        <!-- End Login Buttons -->
                                    </div>
                                    <!-- End Signup -->

                                    <!-- Forgot Password -->
                                    <div id="forgotPassword" style="display: none; opacity: 0;" data-target-group="idForm">
                                        <!-- Title -->
                                        <header class="text-center mb-7">
                                            <h2 class="h4 mb-0">Recuperar Contraseña.</h2>
                                            <p>Ingrese su email y le enviaremos las instrucciones.</p>
                                        </header>
                                        <!-- End Title -->

                                        <!-- Form Group -->
                                        <div class="form-group">
                                            <div class="js-form-message js-focus-state">
                                                <label class="sr-only" for="recoverEmail">Tu email</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="recoverEmailLabel">
                                                            <span class="fas fa-user"></span>
                                                        </span>
                                                    </div>
                                                    <input type="email" class="form-control" name="email" id="recoverEmail" placeholder="Tu email" aria-label="Your email" aria-describedby="recoverEmailLabel" required
                                                    data-msg="Por favor ingrese un email válido."
                                                    data-error-class="u-has-error"
                                                    data-success-class="u-has-success">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Form Group -->

                                        <div class="mb-2">
                                            <button type="submit" class="btn btn-block btn-sm btn-primary transition-3d-hover">Recuperar</button>
                                        </div>

                                        <div class="text-center mb-4">
                                            <span class="small text-muted">¿Recuerda su contraseña?</span>
                                            <a class="js-animation-link small" href="javascript:;"
                                               data-target="#login"
                                               data-link-group="idForm"
                                               data-animation-in="slideInUp">Ingresar
                                            </a>
                                        </div>
                                    </div>
                                    <!-- End Forgot Password -->
                                </form>
                            </div>
                        </div>
                        <!-- End Content -->
                    </div>
                </div>
            </div>
        </aside>
        <!-- End Account Sidebar Navigation -->
        <!-- ========== END SECONDARY CONTENTS ========== -->

        <div id="ico-ws">
            <a href="https://wa.me/573118099969" target="_blank"><img src="{{ asset('frontend/assets/images/suly-ws.png') }}"></a>
        </div>

        <!-- Go to Top -->
        <a class="js-go-to u-go-to" href="#"
            data-position='{"bottom": 15, "right": 15 }'
            data-type="fixed"
            data-offset-top="400"
            data-compensation="#header"
            data-show-effect="slideInUp"
            data-hide-effect="slideOutDown">
            <span class="fas fa-arrow-up u-go-to__inner"></span>
        </a>
        <!-- End Go to Top -->

        <!-- Modal QUANTITY-->
        <div class="modal fade" id="ModalQuantity" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Añadir al carrito</h5>
                {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> --}}
                </div>
                <div class="modal-body">
                    <span id="producto-modal" style="font-weight:700;"></span>
                    <hr>
                    <p>Ingrese la cantidad de este producto que desea añadir al carrito de compras. 
                        Actualmente tienes agregadas <span id="cantidades"></span> unidades de este producto<br>
                        Deseas llevar <span id="unidades"></span> unidades?
                    <div>
                        <img id="imagen-modal" src="" alt="">
                        <div class="campo_cantidad" style="display: initial">
                            <label>Cantidad: </label> 
                            <input id="input-modal" type="number" name="cantidad-productos" min="1" value="1">
                            <p style="display:none" id="error-cantidades">
                                Lo sentimos, El producto no está disponible en la cantidad
                                solicitada.
                            </p>
                            <p id="error_existencias" style="display:none">
                                Lo sentimos, ya no hay unidades disponibles para la compra.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary transition-3d-hover" data-dismiss="modal" id="boton-modal">Añadir al carrito</button>
                </div>
            </div>
            </div>
        </div>

        <!-- JS Global Compulsory -->
        <script src="{{ asset('frontend/assets/vendor/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/vendor/jquery-migrate/dist/jquery-migrate.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/vendor/popper.js/dist/umd/popper.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/vendor/bootstrap/bootstrap.min.js') }}"></script>

        <!-- JS Implementing Plugins -->
        <script src="{{ asset('frontend/assets/vendor/appear.js') }}"></script>
        <script src="{{ asset('frontend/assets/vendor/jquery.countdown.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/vendor/hs-megamenu/src/hs.megamenu.js') }}"></script>
        <script src="{{ asset('frontend/assets/vendor/svg-injector/dist/svg-injector.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/vendor/jquery-validation/dist/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/vendor/fancybox/jquery.fancybox.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/vendor/typed.js/lib/typed.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/vendor/slick-carousel/slick/slick.js') }}"></script>
        <script src="{{ asset('frontend/assets/vendor/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>

        <!-- JS Electro -->

        <script src="{{ asset('frontend/assets/js/hs.core.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/components/hs.range-slider.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/components/hs.countdown.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/components/hs.header.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/components/hs.hamburgers.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/components/hs.unfold.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/components/hs.focus-state.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/components/hs.malihu-scrollbar.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/components/hs.validation.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/components/hs.fancybox.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/components/hs.onscroll-animation.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/components/hs.slick-carousel.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/components/hs.show-animation.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/components/hs.svg-injector.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/components/hs.go-to.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/components/hs.selectpicker.js') }}"></script>


        <!-- JS Plugins Init. -->
        <script>
            $(".btn-add-cart").click(function(){
                $('#ModalQuantity').modal({backdrop: 'static', keyboard: false})
                $("#error-cantidades").hide();
            });

            $(window).on('load', function () {
                // initialization of HSMegaMenu component
                $('.js-mega-menu').HSMegaMenu({
                    event: 'hover',
                    direction: 'horizontal',
                    pageContainer: $('.container'),
                    breakpoint: 767.98,
                    hideTimeOut: 0
                });
            });

            $(document).on('ready', function () {
                
                
            
                // initialization of header
                $.HSCore.components.HSHeader.init($('#header'));

                // initialization of animation
                $.HSCore.components.HSOnScrollAnimation.init('[data-animation]');

                // initialization of unfold component
                $.HSCore.components.HSUnfold.init($('[data-unfold-target]'), {
                    afterOpen: function () {
                        $(this).find('input[type="search"]').focus();
                    }
                });

                // initialization of popups
                $.HSCore.components.HSFancyBox.init('.js-fancybox');

                // initialization of countdowns
                var countdowns = $.HSCore.components.HSCountdown.init('.js-countdown', {
                    yearsElSelector: '.js-cd-years',
                    monthsElSelector: '.js-cd-months',
                    daysElSelector: '.js-cd-days',
                    hoursElSelector: '.js-cd-hours',
                    minutesElSelector: '.js-cd-minutes',
                    secondsElSelector: '.js-cd-seconds'
                });

                $.HSCore.components.HSRangeSlider.init('.js-range-slider');

                // initialization of malihu scrollbar
                $.HSCore.components.HSMalihuScrollBar.init($('.js-scrollbar'));

                // initialization of forms
                $.HSCore.components.HSFocusState.init();

                // initialization of form validation
                $.HSCore.components.HSValidation.init('.js-validate', {
                    rules: {
                        confirmPassword: {
                            equalTo: '#signupPassword'
                        }
                    }
                });

                // initialization of show animations
                $.HSCore.components.HSShowAnimation.init('.js-animation-link');

                // initialization of fancybox
                $.HSCore.components.HSFancyBox.init('.js-fancybox');

                // initialization of slick carousel
                $.HSCore.components.HSSlickCarousel.init('.js-slick-carousel');

                // initialization of go to
                $.HSCore.components.HSGoTo.init('.js-go-to');

                // initialization of hamburgers
                $.HSCore.components.HSHamburgers.init('#hamburgerTrigger');

                // initialization of unfold component
                $.HSCore.components.HSUnfold.init($('[data-unfold-target]'), {
                    beforeClose: function () {
                        $('#hamburgerTrigger').removeClass('is-active');
                    },
                    afterClose: function() {
                        $('#headerSidebarList .collapse.show').collapse('hide');
                    }
                });

                $('#headerSidebarList [data-toggle="collapse"]').on('click', function (e) {
                    e.preventDefault();

                    var target = $(this).data('target');

                    if($(this).attr('aria-expanded') === "true") {
                        $(target).collapse('hide');
                    } else {
                        $(target).collapse('show');
                    }
                });

                // initialization of unfold component
                $.HSCore.components.HSUnfold.init($('[data-unfold-target]'));

                // initialization of select picker
                $.HSCore.components.HSSelectPicker.init('.js-select');
            });

            $( ".anadir-favorito" ).click(function(e) {
                var id = $(this).attr('data-id');
                var element = $(this);

                e.preventDefault();

                $.ajax({
                    type:"GET",
                    url:"/productos/favorito/"+id,
                    success: function(data) {
                        $("#icono-favorito").html(data.cantidad);
                        if (data.estado === 0 ) {
                            console.log('elimina');
                            element.closest('div').find('.fas').css('color', '#848484');
                        } else {
                            console.log('añade');
                            element.children("i").css("color", "red");
                        }
                    }
                });
            });

            $( ".btn-add-cart" ).click(function(e) {

                console.log($("#input-modal").val());

                

                var id = $(this).attr('data-id');
                var esCombo = $(this).attr('data-combo');
                var url = esCombo == 0 ? "/productos/datos-modal/" : "/combos/datos-modal/" ;
                $.ajax({
                    type:"GET",
                    url:url+id,
                    success: function(data) {
                        console.log(data);
                        console.log(data.b.pivot);
                        
                        $("#input-modal").change(function(){
                            if($("#input-modal").val() > data.a.cantidad){
                                $("#error-cantidades").show();
                                $("#boton-modal").hide();
                            }
                            else {
                                $("#error-cantidades").hide();
                                $("#boton-modal").show();
                            }
                        });
                        
                        $("#producto-modal").html(data.a.nombre);
                        $(".producto-modal").html(data.a.nombre);
                        $("#producto-cantidad").html(data.a.cantidad);
                        $("#input-modal").attr("max", data.a.cantidad);
                        
                        {{-- $("#imagen-modal").attr("src","/storage/imagenes_producto/original/"+data.a.imagen); --}}

                        if( data.b.pivot == undefined ) {
                            $("#input-modal").val(1);
                            $("#cantidades").text(0);
                            $("#unidades").text(1);

                            {{-- $("#input-modal").val(data.b.pivot); --}}
                            $("#unidades").text(data.b.pivot);
                            $("#error_existencias").hide();
                            $("#boton-modal").show();
                        }
                        else{
                            if ( data.b.pivot != undefined ){
                                if( data.b.pivot > data.a.cantidad ){
                                    $("#input-modal").attr("max", 0);
                                    $("#input-modal").attr("min", 0);
                                    $("#input-modal").val(0);
                                    $("#unidades").hide();
                                    $("#error_existencias").show();
                                    $("#boton-modal").hide();
                                }
                                else {
                                    $("#input-modal").val(data.b.pivot);
                                    $("#unidades").show();
                                    $("#unidades").text(data.b.pivot);
                                    $("#error_existencias").hide();
                                    $("#boton-modal").show();
                                }
                            }
                            if(  0 > data.a.cantidad ){
                                $("#input-modal").attr("max", 0);
                                $("#input-modal").attr("min", 0);
                                $("#input-modal").val(0);
                                $("#unidades").hide();
                                $("#error_existencias").show();
                                $("#boton-modal").hide();
                            }
                            $("#cantidades").text(data.b.pivot - 1);
                        }
                        
                        $("#boton-modal").attr('onClick', "anadirCarrito("+id+",1,"+esCombo+");");
                    }
                });
            });

            function anadirCarrito(id, cantidad2, esCombo = 0) {
                var cantidad = $("#input-modal").val();

                console.log('entra con '+cantidad);
                $.ajax({
                    type:"GET",
                    url:"/anadircarrito?id="+id+"&cantidad="+cantidad+"&escombo="+esCombo,
                    success: function(data) {
                        console.log('añade carrito');

                        $("#icono-carrito").html(data.cantidad);
                        $("#total-carrito").html('$'+data.total.toLocaleString('es-CO',{maximumFractionDigits:0}));
                        location.reload();

                    }
                });
            }
        </script>

        @yield('scripts')
    </body>
</html>
