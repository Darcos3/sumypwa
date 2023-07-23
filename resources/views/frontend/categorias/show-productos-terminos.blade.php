@extends('frontend.layouts.app')

@section('titulo', 'Categoria '.$categoria->nombre)

@section('styles')
    <style>
        .u-slick__arrow-centered--y {
            top: 150px !important;
        }
    </style>
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
                            @if ($categoria->parent)
                                @include('frontend.categorias.parcial.breadcrumb-li', ['categoria' => $categoria->parent])
                            @endif
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">{{ $categoria->nombre }}</li>
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
                    {{-- <div class="mb-8 border border-width-2 border-color-3 borders-radius-6">
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
                                        @endforeach 
                                        <!-- End Menu List -->
                                    </ul>
                                </div>
                            </li>
                            @if ($categoria->categoria_id)
                                <li>
                                    <a class="dropdown-current active" href="#">{{ $categoria->parent->nombre }}</a>

                                    <ul class="list-unstyled dropdown-list">
                                        <!-- Menu List -->
                                        @foreach ($categoria->parent->subcategorias as $subCat)
                                            <li>
                                                @if ($subCat->id == $categoria->id)
                                                    <a class="dropdown-item font-weight-bold" href="#">{{ $subCat->nombre }}</a>
                                                @else
                                                    <a class="dropdown-item" href="{{ route('categorias.show', App\Models\Categoria::generarUrl($subCat) ) }}">{{ $subCat->nombre }}</a>
                                                @endif
                                            </li>
                                        @endforeach
                                        <!-- End Menu List -->
                                    </ul>
                                </li>
                            @endif
                        </ul>
                        <!-- End List -->
                    </div> --}}

                    <div class="mb-6">
                        <div class="border-bottom border-color-1 mb-5">
                            <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Filtros</h3>
                        </div>
                        <form action="/categorias/filtrar/{{ $categoria->slug }}">
                            @foreach ($atributos as $atr)
                                <div class="border-bottom pb-4 mb-4">
                                    <h4 class="font-size-14 mb-3 font-weight-bold">{{ $atr->nombre }}</h4>

                                    @foreach ($atr->terminos as $term)
                                        @if (in_array($term->id, $terminos))
                                            @if($term->id == $termino)
                                                <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="radio" class="custom-control-input" id="termino_{{ $term->id }}" name="termino[]" value="{{ $term->id }}" checked="true">
                                                        <label class="custom-control-label" for="termino_{{ $term->id }}">{{ $term->nombre }}
                                                            {{-- <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span> --}}
                                                        </label>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="radio" class="custom-control-input" id="termino_{{ $term->id }}" name="termino[]" value="{{ $term->id }}">
                                                        <label class="custom-control-label" for="termino_{{ $term->id }}">{{ $term->nombre }}
                                                            {{-- <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span> --}}
                                                        </label>
                                                    </div>
                                                </div>
                                            @endif
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
                                data-max="2000000"
                                data-from="{{ $_GET['precio_minimo'] ?? 0 }}"
                                data-to="{{ $_GET['precio_maximo'] ?? 3000000 }}"
                                data-result-min=".precio_minimo"
                                data-result-max=".precio_maximo">
                                <!-- End Range Slider -->
                                <div class="mt-1 text-gray-111 d-flex mb-4">
                                    <span class="mr-0dot5">Precio: </span>
                                    <span>$</span>
                                    <input class="precio_minimo" type="number" name="precio_minimo" value="" style="width:90px;">
                                    <span class="mx-0dot5"> — </span>
                                    <span>$</span>
                                    <input class="precio_maximo" type="number" name="precio_maximo" value="" style="width:90px;">
                                </div>
                                <button type="submit" class="btn px-4 btn-primary-dark-w py-2 rounded-lg text-light">Filtrar</button>
                            </div>
                        </form>
                    </div>
                </div>

                

                <div class="col-xl-9 col-wd-9gdot5">
                    <div class="d-flex justify-content-between align-items-center border-bottom border-color-1 flex-lg-nowrap flex-wrap mb-4">
                        <h3 class="section-title section-title__full mb-0 pb-2 font-size-22">Categorías de {{ $categoria->nombre }}</h3>
                    </div>
                    {{-- <ul class="row list-unstyled products-group no-gutters mb-6">
                        @foreach ($categoria->subcategorias as $subcat)
                            <li class="col-6 col-md-2 product-item">
                                <div class="product-item__outer h-100 w-100">
                                    <div class="product-item__inner px-xl-4 p-3">
                                        <div class="product-item__body pb-xl-2">
                                            <div class="mb-2">
                                                <a href="{{ route('categorias.show', App\Models\Categoria::generarUrl($subcat) ) }}" class="d-block text-center"><img class="img-fluid" src="{{ asset('storage/imagenes_categoria/300x300/'.$subcat->imagen) }}" alt="{{ $subcat->nombre }}"></a>
                                            </div>
                                            <h5 class="text-center mb-1 product-item__title"><a href="{{ route('categorias.show', App\Models\Categoria::generarUrl($subcat) ) }}" class="font-size-15 text-gray-90">{{ $subcat->nombre }}</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul> --}}
                    <div class="js-slick-carousel u-slick position-static overflow-hidden u-slick-overflow-visble pb-7 pt-2 px-1"
                        data-slides-show="7"
                        data-slides-scroll="1"
                        data-arrows-classes="d-none d-xl-block u-slick__arrow-normal u-slick__arrow-centered--y rounded-circle text-black font-size-30 z-index-2"
                        data-arrow-left-classes="fa fa-angle-left u-slick__arrow-inner--left left-n16"
                        data-arrow-right-classes="fa fa-angle-right u-slick__arrow-inner--right right-n20"
                        data-pagi-classes="text-center right-0 bottom-1 left-0 u-slick__pagination u-slick__pagination--long mb-0 z-index-n1 mt-4"
                        data-responsive='[{
                          "breakpoint": 1400,
                          "settings": {
                            "slidesToShow": 4
                          }
                        }, {
                            "breakpoint": 1200,
                            "settings": {
                              "slidesToShow": 3
                            }
                        }, {
                          "breakpoint": 992,
                          "settings": {
                            "slidesToShow": 3
                          }
                        }, {
                          "breakpoint": 768,
                          "settings": {
                            "slidesToShow": 2
                          }
                        }, {
                          "breakpoint": 554,
                          "settings": {
                            "slidesToShow": 2
                          }
                        }]'>
                        @foreach ($categoria->subcategorias as $subcat)
                            <div class="js-slide">
                                <div class="product-item__outer ">
                                    <div class="product-item__inner px-xl-4 p-3">
                                        <div class="product-item__body pb-xl-2">
                                            <div class="mb-2">
                                                <a href="{{ route('categorias.show', App\Models\Categoria::generarUrl($subcat) ) }}" class="d-block text-center"><img class="img-fluid" src="{{ asset('storage/imagenes_categoria/300x300/'.$subcat->imagen) }}" alt="{{ $subcat->nombre }}"></a>
                                            </div>
                                            <h5 class="text-center mb-1 product-item__title"><a href="{{ route('categorias.show', App\Models\Categoria::generarUrl($subcat) ) }}" class="font-size-15 text-gray-90">{{ $subcat->nombre }}</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        @endforeach
                    </div>
                    <!-- Recommended Products -->
                    <div class="mb-6 d-none d-xl-block">
                        <div class="position-relative">
                            <div class="border-bottom border-color-1 mb-2">
                                <h3 class="d-inline-block section-title section-title__full mb-0 pb-2 font-size-22">Destacados</h3>
                            </div>
                            <div 
                                style="height: 230px"
                                class="js-slick-carousel u-slick position-static overflow-hidden u-slick-overflow-visble pb-7 pt-2 px-1"
                                data-pagi-classes="text-left right-0 bottom-1 left-0 u-slick__pagination u-slick__pagination--long mb-0 z-index-n1 mt-3 mt-md-0"
                                data-slides-show="5"
                                data-slides-scroll="1"
                                data-arrows-classes="position-absolute top-0 font-size-17 u-slick__arrow-normal top-10"
                                data-arrow-left-classes="fa fa-angle-left right-1"
                                data-arrow-right-classes="fa fa-angle-right right-0"
                                data-responsive='[{
                                  "breakpoint": 1400,
                                  "settings": {
                                    "slidesToShow": 4
                                  }
                                }, {
                                    "breakpoint": 1200,
                                    "settings": {
                                      "slidesToShow": 4
                                    }
                                }, {
                                  "breakpoint": 992,
                                  "settings": {
                                    "slidesToShow": 3
                                  }
                                }, {
                                  "breakpoint": 768,
                                  "settings": {
                                    "slidesToShow": 2
                                  }
                                }, {
                                  "breakpoint": 554,
                                  "settings": {
                                    "slidesToShow": 2
                                  }
                                }]'>
                                @foreach ($destacados as $producto)
                                    {{-- @for ($i=0; $i < 7; $i++) --}}
                                        <div class="js-slide products-group" style="margin-left: 1px; margin-right: 1px">
                                            <div class="product-item">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            {{-- <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div> --}}
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route('productos.show', $producto->slug) }}" class="text-blue font-weight-bold">{{ $producto->nombre}}</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route('productos.show', $producto->slug) }}" class="d-block text-center"><img class="img-fluid" src="{{ asset('storage/imagenes_producto/212x212/'.$producto->imagen) }}" alt="{{ $producto->nombre}}"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">${{ number_format($producto->precio, 0, ',', '.')}}</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="../shop/single-product-fullwidth.html" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
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
                                            </div>
                                        </div>
                                    {{-- @endfor --}}
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- End Recommended Products -->
                    <!-- Shop-control-bar Title -->
                    <div class="flex-center-between mb-3">
                        <h3 class="font-size-25 mb-0">Productos Filtrados con Referencia - {{ $referencia }}</h3>
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
                            <form  id="form_orden" action="/categorias/filtrar/{{ $categoria->slug }}">
                                <input type="hidden" name="termino[]" value="{{ $termino }}">
                                <input type="hidden" name="precio_minimo" value="{{ $precioMinimo}}">
                                <input type="hidden" name="precio_maximo" value="{{ $precioMaximo}}">

                                <!-- Select -->
                                <select class="js-select selectpicker dropdown-select max-width-200 max-width-160-sm right-dropdown-0 px-2 px-xl-0"
                                    data-style="btn-sm bg-white font-weight-normal py-2 border text-gray-20 bg-lg-down-transparent border-lg-down-0" name="orden" id="selectororden">
                                    <option value="defecto" {{ $orden == 'defecto'? 'selected' : '' }}>Defecto</option>
                                    <option value="mas_vendidos" {{ $orden == 'mas_vendidos'? 'selected' : '' }}>Más vendidos</option>
                                    <option value="mejor_valorados" {{ $orden == 'mejor_valorados'? 'selected' : '' }}>Mejor valorados</option>
                                    <option value="menor_precio" {{ $orden == 'menor_precio'? 'selected' : '' }}>Por precio: más bajo</option>
                                    <option value="mayor_precio" {{ $orden == 'mayor_precio'? 'selected' : '' }}>Por precio: más alto</option>
                                </select>
                                <!-- End Select -->
                            </form>
                            <form class="ml-2 d-none d-xl-block" id="form_selectorresultados" action="/categorias/filtrar/{{ $categoria->slug }}">
                                <input type="hidden" name="termino[]" value="{{ $termino }}">
                                <input type="hidden" name="precio_minimo" value="{{ $precioMinimo}}">
                                <input type="hidden" name="precio_maximo" value="{{ $precioMaximo}}">
                                <!-- Select -->
                                <select class="js-select selectpicker dropdown-select max-width-150"
                                    data-style="btn-sm bg-white font-weight-normal py-2 border text-gray-20 bg-lg-down-transparent border-lg-down-0" name="resultados"  id="selectorresultados">
                                    <option value="20" {{ $resultados == 20? 'selected' : '' }}>Mostrar 20</option>
                                    <option value="40" {{ $resultados == 40? 'selected' : '' }}>Mostrar 40</option>
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
                                    @foreach($producto->terminos as $term)
                                        @if( $term->id == $termino )
                                            <li class="col-6 col-md-3 col-wd-2gdot4 product-item remove-divider">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-xl-4 p-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <h5 class="mb-1 product-item__title">
                                                                <a href="{{ route('productos.show',$producto->slug)}}" class="text-blue font-weight-bold">{{$producto->nombre}}</a>
                                                            </h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route('productos.show',$producto->slug)}}" class="d-block text-center"><img class="img-fluid" src="{{ asset('storage/imagenes_producto/212x212/'.$producto->imagen) }}" alt="{{ $producto->nombre}}"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price d-flex align-items-center position-relative">
                                                                    <ins class="font-size-20 text-red text-decoration-none">${{ number_format($producto->precio_descuento, 0, ',', '.') }}</ins>
                                                                    <del class="font-size-12 tex-gray-6 position-absolute bottom-100">${{ number_format($producto->precio, 0, ',', '.') }}</del>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    @auth
                                                                        <a href="#" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                    @endauth
                                                                    @guest
                                                                        <a href="{{ route('login') }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                    @endguest
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <small class="text-decoration-none">Vendidos {{ $producto->vendidos }}</small><br>
                                                            <small class="text-decoration-none">Valoracion {{ $producto->valoracion }}</small><br>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                @auth
                                                                    <a href="#" data-combo="0" data-id="{{$producto->id}}" class="text-gray-6 font-size-13 anadir-favorito"><i class="fas fa-heart" style="{{auth()->user()->productos->find($producto->id) ? 'color:red;' : '' }}"></i> Favoritos</a>
                                                                @endauth
                                                                @guest
                                                                    <a href="{{ route('login') }}" data-combo="0" data-id="{{$producto->id}}" class="text-gray-6 font-size-13 anadir-favorito"><i class="fas fa-heart"></i> Favoritos</a>
                                                                @endguest
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                    @endforeach
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
                                                            <ins class="font-size-20 text-red text-decoration-none">${{ number_format($producto->precio_descuento, 0, ',', '.') }}</ins>
                                                            <div class="text-gray-100">${{$producto->precio}}</div>
                                                        </div>
                                                        <div class="prodcut-add-cart">
                                                            @auth
                                                                <a href="#" class="btn btn-sm btn-block btn-primary-dark btn-wide transition-3d-hover">Añadir al carrito</a>
                                                            @endauth
                                                            @guest
                                                                <a href="{{ route('login') }}" class="btn btn-sm btn-block btn-primary-dark btn-wide transition-3d-hover">Añadir al carrito</a>
                                                            @endguest
                                                        </div>
                                                    </div>
                                                    <div class="flex-horizontal-center justify-content-between justify-content-wd-center flex-wrap">
                                                        @auth
                                                            <a href="#" class="text-gray-6 font-size-13 mx-wd-3"><i class="ec ec-favorites mr-1 font-size-15"></i> Favorito</a>
                                                        @endauth
                                                        @guest
                                                            <a href="{{ route('login') }}" class="text-gray-6 font-size-13 mx-wd-3"><i class="ec ec-favorites mr-1 font-size-15"></i> Favorito</a>
                                                        @endguest
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
                        {{-- <div class="text-center text-md-left mb-3 mb-md-0">Mostrando {{$productos->firstItem()}}–{{$productos->count()}} de {{$productos->total()}}</div> --}}
                        {{ $productos->links() }}
                        {{-- <ul class="pagination mb-0 pagination-shop justify-content-center justify-content-md-start">
                            <li class="page-item"><a class="page-link current" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                        </ul> --}}
                    </nav>
                    <!-- End Shop Pagination -->
                </div>
            </div>
        </div>
    </main>
@endsection

@section('scripts')

    <script type="text/javascript">

        $("#selectorresultados").change(function(){
            let resultados = $("#selectorresultados option:selected").val();
            console.log(resultados);
            $( "#form_selectorresultados" ).submit();
        });

        $("#selectororden").change(function(){
            let orden = $("#selectororden option:selected").val();
            console.log(orden);
            $( "#form_orden" ).submit();
        });
    </script>
@endsection