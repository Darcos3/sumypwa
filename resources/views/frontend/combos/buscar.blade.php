@extends('frontend.layouts.app')

@section('titulo', 'Resultado de la búsqueda ')

@section('styles')

@endsection

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
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Búsqueda</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="container">
            <div class="row">
                <div class="d-none d-xl-block col-xl-3 col-wd-2gdot5">
                    <div class="mb-8 border border-width-2 border-color-3 borders-radius-6">
                        <!-- List -->
                        <ul id="sidebarNav" class="list-unstyled mb-0 sidebar-navbar">
                            <li>
                                <a class="dropdown-toggle dropdown-toggle-collapse dropdown-title" href="javascript:;" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="sidebarNav1Collapse" data-target="#sidebarNav1Collapse">
                                    Ver todas las categorías
                                </a>

                                <div id="sidebarNav1Collapse" class="collapse" data-parent="#sidebarNav">
                                    <ul id="sidebarNav1" class="list-unstyled dropdown-list">
                                        <!-- Menu List -->
                                        @foreach ($categoriasPrincipales as $catPrin)
                                            <li><a class="dropdown-item" href="{{ route('categorias.show', App\Models\Categoria::generarUrl($catPrin) ) }}">{{ $catPrin->nombre }}</a></li>
                                            {{-- <li><a class="dropdown-item" href="{{ route('categorias.show', App\Models\Categoria::generarUrl($catPrin) ) }}">{{ $catPrin->nombre }}<span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></a></li> --}}
                                        @endforeach
                                        <!-- End Menu List -->
                                    </ul>
                                </div>
                            </li>
                            {{-- @if ($categoria->categoria_id)
                                <li>
                                    <a class="dropdown-current active" href="#">{{ $categoria->parent->nombre }}</a>

                                    <ul class="list-unstyled dropdown-list">
                                        <!-- Menu List -->
                                        @foreach ($categoria->parent->subcategorias as $subCat)
                                            <li>
                                                @if ($subCat->id == $categoria->id)
                                                    <a class="dropdown-item font-weight-bold" href="#">{{ $subCat->nombre }}<span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></a>
                                                @else
                                                    <a class="dropdown-item" href="{{ route('categorias.show', App\Models\Categoria::generarUrl($subCat) ) }}">{{ $subCat->nombre }}<span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></a>
                                                @endif
                                            </li>
                                        @endforeach
                                        <!-- End Menu List -->
                                    </ul>
                                </li>
                            @endif --}}
                        </ul>
                        <!-- End List -->
                    </div>

                    <div class="mb-6">
                        <div class="border-bottom border-color-1 mb-5">
                            <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Filtros</h3>
                        </div>
                        <form class="js-focus-state" action="{{ route('productos.buscar') }}" role="form" enctype='multipart/form-data'>
                            {{-- @csrf --}}
                            <input type="hidden" name="buscarproductos" value="{{ $_GET['buscarproductos'] }}">
                            <input type="hidden" name="categoria" value="{{ $_GET['categoria'] }}">

                            @foreach ($atributos as $atr)
                                <div class="border-bottom pb-4 mb-4">
                                    <h4 class="font-size-14 mb-3 font-weight-bold">{{ $atr->nombre }}</h4>

                                    @foreach ($atr->terminos as $term)
                                        @if (in_array($term->id, $terminos))
                                            <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="termino_{{ $term->id }}" name="terminos[{{ $term->id }}]">
                                                    <label class="custom-control-label" for="termino_{{ $term->id }}">{{ $term->nombre }}
                                                        {{-- <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span> --}}
                                                    </label>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @endforeach

                            <div class="range-slider">
                                <h4 class="font-size-14 mb-3 font-weight-bold">Precio</h4>
                                <!-- Range Slider -->
                                <input class="js-range-slider" type="text"
                                data-extra-classes="u-range-slider u-range-slider-indicator u-range-slider-grid"
                                data-type="double"
                                data-grid="false"
                                data-hide-from-to="true"
                                data-prefix="$"
                                data-min="0"
                                data-max="500000"
                                data-from="{{ $_GET['precio_minimo'] ?? 0 }}"
                                data-to="{{ $_GET['precio_maximo'] ?? 2000000 }}"
                                data-result-min=".precio_minimo"
                                data-result-max=".precio_maximo">
                                <!-- End Range Slider -->
                                <div class="mt-1 text-gray-111 d-flex mb-4">

                                    <span class="mr-0dot5">Precio: </span>
                                    <span>$</span>
                                    <input class="precio_minimo" type="number" name="precio_minimo" value="" style="width:90px;">
                                    {{-- <span id="precio_minimo" name="precio_minimo" class=""></span> --}}
                                    <span class="mx-0dot5"> — </span>
                                    <span>$</span>
                                    <input class="precio_maximo" type="number" name="precio_maximo" value="" style="width:90px;">
                                    {{-- <span id="precio_maximo" name="precio_maximo" class=""></span> --}}
                                </div>
                                <button type="submit" class="btn px-4 btn-primary-dark-w py-2 rounded-lg">Filtrar</button>
                            </div>
                        </form>
                    </div>


                    <div class="mb-8">
                        <div class="border-bottom border-color-1 mb-5">
                            <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Últimos productos</h3>
                        </div>
                        <ul class="list-unstyled">
                            <li class="mb-4">
                                <div class="row">
                                    <div class="col-auto">
                                        <a href="#" class="d-block width-75">
                                            <img class="img-fluid" src="assets/images/productos/ducha.jpg" alt="Image Description">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <h3 class="text-lh-1dot2 font-size-14 mb-0"><a href="#">Ducha Electrica Dirigible 1 Temperatura 220v K-003</a></h3>
                                        <div class="text-warning text-ls-n2 font-size-16 mb-1" style="width: 80px;">
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="far fa-star text-muted"></small>
                                        </div>
                                        <div class="font-weight-bold">
                                            <ins class="font-size-15 text-red text-decoration-none d-block">$98.000</ins>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="mb-4">
                                <div class="row">
                                    <div class="col-auto">
                                        <a href="#" class="d-block width-75">
                                            <img class="img-fluid" src="assets/images/productos/base.jpg" alt="Image Description">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <h3 class="text-lh-1dot2 font-size-14 mb-0"><a href="#">Base para pulidora ht (HT90306)</a></h3>
                                        <div class="text-warning text-ls-n2 font-size-16 mb-1" style="width: 80px;">
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="far fa-star text-muted"></small>
                                        </div>
                                        <div class="font-weight-bold font-size-15">
                                            <ins class="font-size-15 text-red text-decoration-none d-block">$87.500</ins>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="mb-4">
                                <div class="row">
                                    <div class="col-auto">
                                        <a href="#" class="d-block width-75">
                                            <img class="img-fluid" src="assets/images/productos/taladro.jpg" alt="Image Description">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <h3 class="text-lh-1dot2 font-size-14 mb-0"><a href="#">Taladro dewalt 1/2 710 w vvr-percutor t-profesional (0-2800 RPM)</a></h3>
                                        <div class="text-warning text-ls-n2 font-size-16 mb-1" style="width: 80px;">
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="far fa-star text-muted"></small>
                                        </div>
                                        <div class="font-weight-bold font-size-15">
                                            <ins class="font-size-15 text-red text-decoration-none d-block">$281.200</ins>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="mb-4">
                                <div class="row">
                                    <div class="col-auto">
                                        <a href="#" class="d-block width-75">
                                            <img class="img-fluid" src="assets/images/productos/aerografo.jpg" alt="Image Description">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <h3 class="text-lh-1dot2 font-size-14 mb-0"><a href="#">Aerografo ranger/hopex alta f75 g (400 ml) f-75 g-40</a></h3>
                                        <div class="text-warning text-ls-n2 font-size-16 mb-1" style="width: 80px;">
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="far fa-star text-muted"></small>
                                        </div>
                                        <div class="font-weight-bold">
                                            <del class="font-size-11 text-gray-9 d-block">$60.000</del>
                                            <ins class="font-size-15 text-red text-decoration-none d-block">$68.000</ins>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-9 col-wd-9gdot5">
                    <!-- Shop-control-bar Title -->
                    <div class="flex-center-between mb-3">
                        <h3 class="font-size-25 mb-0">Resultados de: <strong>{{$termino}}</strong></h3>
                        {{-- <p class="font-size-14 text-gray-90 mb-0">Showing 1–25 of 56 results</p> --}}
                    </div>
                    <!-- End shop-control-bar Title -->
                    <!-- Shop-control-bar -->
                    <div class="bg-gray-1 flex-center-between borders-radius-9 py-1">
                        <div class="d-xl-none">
                            <!-- Account Sidebar Toggle Button -->
                            <a id="sidebarNavToggler1" class="btn btn-sm py-1 font-weight-normal" href="javascript:;" role="button"
                                aria-controls="sidebarContent1"
                                aria-haspopup="true"
                                aria-expanded="false"
                                data-unfold-event="click"
                                data-unfold-hide-on-scroll="false"
                                data-unfold-target="#sidebarContent1"
                                data-unfold-type="css-animation"
                                data-unfold-animation-in="fadeInLeft"
                                data-unfold-animation-out="fadeOutLeft"
                                data-unfold-duration="500">
                                <i class="fas fa-sliders-h"></i> <span class="ml-1">Filters</span>
                            </a>
                            <!-- End Account Sidebar Toggle Button -->
                        </div>
                        <div class="px-3 d-none d-xl-block">
                            <ul class="nav nav-tab-shop" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-one-example1-tab" data-toggle="pill" href="#pills-one-example1" role="tab" aria-controls="pills-one-example1" aria-selected="false">
                                        <div class="d-md-flex justify-content-md-center align-items-md-center">
                                            <i class="fa fa-th"></i>
                                        </div>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="pills-three-example1-tab" data-toggle="pill" href="#pills-three-example1" role="tab" aria-controls="pills-three-example1" aria-selected="true">
                                        <div class="d-md-flex justify-content-md-center align-items-md-center">
                                            <i class="fa fa-list"></i>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="d-flex">
                            <form method="get">
                                <!-- Select -->
                                <select class="js-select selectpicker dropdown-select max-width-200 max-width-160-sm right-dropdown-0 px-2 px-xl-0"
                                    data-style="btn-sm bg-white font-weight-normal py-2 border text-gray-20 bg-lg-down-transparent border-lg-down-0">
                                    <option value="" selected>Defecto</option>
                                    <option value="">Más vendidos</option>
                                    <option value="">Mejor valorados</option>
                                    <option value="">Por precio: más bajo</option>
                                    <option value="">Por precio: más alto</option>
                                </select>
                                <!-- End Select -->
                            </form>
                            <form method="POST" class="ml-2 d-none d-xl-block">
                                <!-- Select -->
                                <select class="js-select selectpicker dropdown-select max-width-150"
                                    data-style="btn-sm bg-white font-weight-normal py-2 border text-gray-20 bg-lg-down-transparent border-lg-down-0">
                                    <option value="" selected>Mostrar 20</option>
                                    <option value="">Mostrar 40</option>
                                </select>
                                <!-- End Select -->
                            </form>
                        </div>
                    </div>
                    <!-- End Shop-control-bar -->
                    <!-- Shop Body -->
                    <!-- Tab Content -->
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade pt-2 show active" id="pills-one-example1" role="tabpanel" aria-labelledby="pills-one-example1-tab" data-target-group="groups">
                            <ul class="row list-unstyled products-group no-gutters">

                                @foreach ($productos as $producto)
                                    <li class="col-6 col-md-3 col-wd-2gdot4 product-item remove-divider">
                                        <div class="product-item__outer h-100">
                                            <div class="product-item__inner px-xl-4 p-3">
                                                <div class="product-item__body pb-xl-2">
                                                    {{-- <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div> --}}
                                                    <h5 class="mb-1 product-item__title"><a href="{{ route('productos.show',$producto->slug)}}" class="text-blue font-weight-bold">{{$producto->nombre}}</a></h5>
                                                    <div class="mb-2">
                                                        <a href="{{ route('productos.show',$producto->slug)}}" class="d-block text-center"><img class="img-fluid" src="{{ asset('storage/imagenes_producto/212x212/'.$producto->imagen) }}" alt="{{ $producto->nombre}}"></a>
                                                    </div>
                                                    <div class="flex-center-between mb-1">
                                                        <div class="prodcut-price">
                                                            <div class="text-gray-100">${{ number_format($producto->precio, 0, ',', '.')}}</div>
                                                        </div>
                                                        <div class="d-none d-xl-block prodcut-add-cart">
                                                            <a href="#" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-item__footer">
                                                    <div class="border-top pt-2 flex-center-between flex-wrap">
                                                        <a href="#" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Favorito</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="tab-pane fade pt-2" id="pills-three-example1" role="tabpanel" aria-labelledby="pills-three-example1-tab" data-target-group="groups">
                            <ul class="d-block list-unstyled products-group prodcut-list-view">
                                @foreach ($productos as $producto)
                                    <li class="product-item remove-divider">
                                        <div class="product-item__outer w-100">
                                            <div class="product-item__inner remove-prodcut-hover py-4 row">
                                                <div class="product-item__header col-6 col-md-4">
                                                    <div class="mb-2">
                                                        <a href="{{ route('productos.show',$producto->slug)}}" class="d-block text-center"><img class="img-fluid" src="{{ asset('storage/imagenes_producto/212x212/'.$producto->imagen) }}" alt="{{ $producto->nombre}}"></a>
                                                    </div>
                                                </div>
                                                <div class="product-item__body col-6 col-md-5">
                                                    <div class="pr-lg-10">
                                                        {{-- <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div> --}}
                                                        <h5 class="mb-2 product-item__title"><a href="{{ route('productos.show',$producto->slug)}}" class="text-blue font-weight-bold">{{$producto->nombre}}asdfaf</a></h5>
                                                        {{-- <div class="prodcut-price mb-2 d-md-none">
                                                            <div class="text-gray-100">$685asdfsdf,00</div>
                                                        </div> --}}
                                                        <div class="mb-3 d-none d-md-block">
                                                            <a class="d-inline-flex align-items-center small font-size-14" href="#">
                                                                <div class="text-warning mr-2">
                                                                    <small class="fas fa-star"></small>
                                                                    <small class="fas fa-star"></small>
                                                                    <small class="fas fa-star"></small>
                                                                    <small class="fas fa-star"></small>
                                                                    <small class="far fa-star text-muted"></small>
                                                                </div>
                                                                <span class="text-secondary">(40)</span>
                                                            </a>
                                                        </div>
                                                        <p class="font-size-12 p-0 text-gray-110 mb-4 d-none d-md-block">
                                                            {!! $producto->descripcion_corta !!}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="product-item__footer col-md-3 d-md-block">
                                                    <div class="mb-3">
                                                        <div class="prodcut-price mb-2">
                                                            <div class="text-gray-100">${{$producto->precio}}</div>
                                                        </div>
                                                        <div class="prodcut-add-cart">
                                                            <a href="#" class="btn btn-sm btn-block btn-primary-dark btn-wide transition-3d-hover">Añadir al carrito</a>
                                                        </div>
                                                    </div>
                                                    <div class="flex-horizontal-center justify-content-between justify-content-wd-center flex-wrap">
                                                        <a href="#" class="text-gray-6 font-size-13 mx-wd-3"><i class="ec ec-favorites mr-1 font-size-15"></i> Favorito</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- End Tab Content -->
                    <!-- End Shop Body -->
                    <!-- Shop Pagination -->
                    <nav class="d-md-flex justify-content-between align-items-center border-top pt-3" aria-label="Page navigation example">
                        <div class="text-center text-md-left mb-3 mb-md-0">Mostrando {{$productos->firstItem()}}–{{$productos->count()}} de {{$productos->total()}}</div>
                        {{ $productos->withQueryString()->links() }}
                        {{-- <ul class="pagination mb-0 pagination-shop justify-content-center justify-content-md-start">
                            <li class="page-item"><a class="page-link current" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                        </ul> --}}
                    </nav>
                    <!-- End Shop Pagination -->
                </div>
            </div>
            <!-- Brand Carousel -->
            <div class="mb-6">
                <div class="py-2 border-top border-bottom">
                    <div class="js-slick-carousel u-slick my-1"
                        data-slides-show="5"
                        data-slides-scroll="1"
                        data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-normal u-slick__arrow-centered--y"
                        data-arrow-left-classes="fa fa-angle-left u-slick__arrow-classic-inner--left z-index-9"
                        data-arrow-right-classes="fa fa-angle-right u-slick__arrow-classic-inner--right"
                        data-responsive='[{
                            "breakpoint": 992,
                            "settings": {
                                "slidesToShow": 2
                            }
                        }, {
                            "breakpoint": 768,
                            "settings": {
                                "slidesToShow": 1
                            }
                        }, {
                            "breakpoint": 554,
                            "settings": {
                                "slidesToShow": 1
                            }
                        }]'>
                        <div class="js-slide">
                            <a href="#" class="link-hover__brand">
                                <img class="img-fluid m-auto max-height-50" src="../../assets/img/200X60/img1.png" alt="Image Description">
                            </a>
                        </div>
                        <div class="js-slide">
                            <a href="#" class="link-hover__brand">
                                <img class="img-fluid m-auto max-height-50" src="../../assets/img/200X60/img2.png" alt="Image Description">
                            </a>
                        </div>
                        <div class="js-slide">
                            <a href="#" class="link-hover__brand">
                                <img class="img-fluid m-auto max-height-50" src="../../assets/img/200X60/img3.png" alt="Image Description">
                            </a>
                        </div>
                        <div class="js-slide">
                            <a href="#" class="link-hover__brand">
                                <img class="img-fluid m-auto max-height-50" src="../../assets/img/200X60/img4.png" alt="Image Description">
                            </a>
                        </div>
                        <div class="js-slide">
                            <a href="#" class="link-hover__brand">
                                <img class="img-fluid m-auto max-height-50" src="../../assets/img/200X60/img5.png" alt="Image Description">
                            </a>
                        </div>
                        <div class="js-slide">
                            <a href="#" class="link-hover__brand">
                                <img class="img-fluid m-auto max-height-50" src="../../assets/img/200X60/img6.png" alt="Image Description">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Brand Carousel -->
        </div>
    </main>
@endsection
