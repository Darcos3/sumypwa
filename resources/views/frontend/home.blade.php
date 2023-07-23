@extends('frontend.layouts.app')

@section('titulo', 'Inicio')

@section('content')
    <main id="content" role="main">

            <!-- Slider Section -->
            <div id="slider-home" class="mb-4">
                <div class="bg-img-hero">

                    <div class="js-slick-carousel u-slick"
                        data-pagi-classes="text-center position-absolute right-0 bottom-0 left-0 u-slick__pagination u-slick__pagination--long justify-content-center mb-3 mb-md-4">
                        @foreach ($sliders as $slider)
                            <div class="js-slide"  onclick="location.href='{{ $slider->enlace }}'">
                                <span class="d-none d-md-block" style="background-image: url({{ asset('storage/imagenes_slider/original/'.$slider->imagen )  }});"></span>
                                <span class="d-block d-sm-block d-md-none" style="background-image: url({{ asset('storage/imagenes_slider/original/'.$slider->imagen_movil )  }});"></span>                        
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
            <!-- End Slider Section -->
            <div class="container">
                <!-- Categories Carousel -->
                <div class="row-categorias-ico mb-5">
                    <div class="position-relative">
                        <div 
                            class="js-slick-carousel u-slick u-slick--gutters-0 position-static overflow-hidden u-slick-overflow-visble pb-5 pt-2 px-1"
                            data-arrows-classes="d-none d-xl-block u-slick__arrow-normal u-slick__arrow-centered--y rounded-circle text-black font-size-30 z-index-2"
                            data-arrow-left-classes="fa fa-angle-left u-slick__arrow-inner--left left-n16"
                            data-arrow-right-classes="fa fa-angle-right u-slick__arrow-inner--right right-n20"
                            data-pagi-classes="d-xl-none text-center right-0 bottom-1 left-0 u-slick__pagination u-slick__pagination--long mb-0 z-index-n1 mt-3 pt-1"
                            data-slides-show="10"
                            data-slides-scroll="1"
                            data-responsive='[{
                              "breakpoint": 1400,
                              "settings": {
                                "slidesToShow": 8
                              }
                            }, {
                                "breakpoint": 1200,
                                "settings": {
                                  "slidesToShow": 6
                                }
                            }, {
                              "breakpoint": 992,
                              "settings": {
                                "slidesToShow": 5
                              }
                            }, {
                              "breakpoint": 768,
                              "settings": {
                                "slidesToShow": 3
                              }
                            }, {
                              "breakpoint": 554,
                              "settings": {
                                "slidesToShow": 2
                              }
                            }]'>
                            @foreach ($categoriasdestacadas as $categoria )
                                <div class="js-slide" style="height: inherit !important">
                                    <a href="/categorias/{{ $categoria->slug }}" class="d-block text-center bg-on-hover width-122 mx-auto">
                                        <div class="bg pt-4 rounded-circle-top width-122 height-75">
                                            <img src="{{ asset('storage/imagenes_categoria/original/'.$categoria->imagen) }}">
                                        </div>
                                        <div class="bg-white px-2 pt-2 width-122">
                                            <h6 class="font-weight-semi-bold font-size-14 text-gray-90 mb-0 text-lh-1dot2">{{ $categoria->nombre }}</h6>
                                        </div>
                                    </a>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <!-- End Categories Carousel -->

                <!-- INSUPERABLES -->
                <div class="position-relative row-mas-vendido">
                    <div class="border-bottom border-color-1 mb-2">
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <h3 class="section-title section-title__full d-inline-block mb-0 pb-2 font-size-22">Productos insuperables</h3>
                            </div>
                            <div class="col-md-6 text-right">
                                <small class="text-danger d-inline-block mb-0 pb-2 font-size-14"><b>Ver {{$insuperables->count()}} mas</b></small>
                            </div>
                        </div>
                    </div>
                    <div 
                        class="js-slick-carousel u-slick position-static overflow-hidden u-slick-overflow-visble pb-7 pt-2 px-1"
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
                        @foreach ($insuperables as $insuperable)
                           <div class="js-slide products-group">
                                <div class="product-item">
                                    <div class="product-item__outer h-100 w-100">
                                        <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                            <div class="product-item__body pb-xl-2">
                                                <div class="mb-2">
                                                    <a href="{{ route('productos.show', $insuperable->slug) }}" class="d-block text-center"><img class="img-fluid" src="{{ asset('storage/imagenes_producto/original/'.$insuperable->imagen) }}" alt="Image Description" style="height: 200px"></a>
                                                </div>
                                                <div class="mb-2"><a href="{{ route('categorias.show', App\Models\Categoria::generarUrl($insuperable->categoria) ) }}" class="font-size-12 text-gray-5">{{ $insuperable->categoria->nombre}}</a></div>
                                                <h5 class="mb-4 product-item__title"><a href="{{ route('productos.show', $insuperable->slug) }}" class="text-dark font-weight-bold">{{ $insuperable->nombre }}</a></h5>
                                                <p class="text-dark" style="margin-bottom: 0px">
                                                    Codigo: {{ $insuperable->id }}<br>
                                                    Unidades: {{ $insuperable->cantidad }}
                                                </p>
                                                <div class="flex-center-between mb-1">
                                                    <div class="prodcut-price">
                                                        @guest
                                                            @if ($insuperable->precio_descuento)
                                                                <span class="font-size-12 tex-gray-6" style='display: inline-block'>
                                                                    <del>
                                                                        ${{ number_format($insuperable->precio, 0, ',', '.') }}
                                                                    </del>
                                                                    
                                                                    <?php
                                                                        $descuento = 100 - ($insuperable->precio_descuento * 100 / $insuperable->precio);
                                                                        echo "<small class='text-red' style=''>".number_format($descuento, 2, ',', '.')."% de dcto incluído </small>";
                                                                    ?>
                                                                </span>
                                                                <br>
                                                                <ins class="font-size-20 text-red text-decoration-none">${{ number_format($insuperable->precio_descuento, 0, ',', '.') }}</ins>
                                                                {{-- <del class="font-size-12 tex-gray-6 position-absolute bottom-100">${{ number_format($novedad->precio, 0, ',', '.') }}</del> --}}
                                                            @else
                                                                <div class="text-gray-100">${{ number_format($insuperable->precio, 0, ',', '.') }}</div>
                                                            @endif
                                                        @endguest

                                                        @auth
                                                            @if( auth()->user()->rol_user == null )
                                                                @if ($insuperable->precio_descuento)
                                                                    <span class="font-size-12 tex-gray-6" style='display: inline-block'>
                                                                        <del>
                                                                            ${{ number_format($insuperable->precio, 0, ',', '.') }}
                                                                        </del>
                                                                        
                                                                        <?php
                                                                            $descuento = 100 - ($insuperable->precio_descuento * 100 / $insuperable->precio);

                                                                            echo "<small class='text-red' style=''>".$descuento."% de dcto incluído </small>";
                                                                        ?>
                                                                    </span>
                                                                    <br>
                                                                    @auth
                                                                        <ins class="font-size-20 text-red text-decoration-none">${{ number_format($insuperable->precio_descuento, 0, ',', '.') }}</ins>
                                                                    @endauth
                                                                @else
                                                                    <div class="text-gray-100">${{ number_format($insuperable->precio, 0, ',', '.') }}</div>
                                                                @endif
                                                            @endif

                                                            @if( auth()->user()->rol_user == 3)
                                                                <div class="text-gray-100">${{ number_format($insuperable->precio_ferretero, 0, ',', '.') }}</div>
                                                            @endif
                                                        @endauth

                                                    </div>
                                                    <div class="d-none d-xl-block prodcut-add-cart">
                                                        @auth
                                                            <a href="#" data-combo="0" data-id="{{$insuperable->id}}" class="btn-add-cart btn-primary transition-3d-hover" data-toggle="modal" data-target="#ModalQuantity"><i class="ec ec-add-to-cart"></i></a>
                                                        @endauth
                                                        @guest
                                                            <a href="{{ route('login') }}" data-combo="0" data-id="{{$insuperable->id}}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                        @endguest
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-item__footer">
                                                @auth
                                                    <a href="#" data-combo="0" data-id="{{$insuperable->id}}" class="text-gray-6 font-size-13 anadir-favorito"><i class="fas fa-heart" style="{{auth()->user()->productos->find($insuperable->id) ? 'color:red;' : '' }}"></i> Favoritos</a>
                                                @endauth
                                                @guest
                                                    {{-- <a href="#" data-combo="0" data-id="{{$novedad->id}}" class="text-gray-6 font-size-13 anadir-favorito"><i class="fas fa-heart" style=""></i> Favoritos</a> --}}
                                                    <a href="{{ route('login') }}" data-combo="0" data-id="{{$insuperable->id}}" class="text-gray-6 font-size-13 anadir-favorito"><i class="fas fa-heart"></i> Favoritos</a>
                                                @endguest
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- End Recommendation for you -->

                 <!-- Productos en oferta -->
                 <div class="mb-8">
                    <div class="d-flex justify-content-between border-bottom border-color-1 flex-md-nowrap flex-wrap border-sm-bottom-0">
                        <div class="col-md-6 text-left">
                            <h3 class="section-title section-title__full mb-0 pb-2 font-size-22">Productos en Oferta</h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <small class="text-danger d-inline-block mb-0 pb-2 font-size-14"><b>Ver {{$oferta->count()}} mas</b></small>
                        </div>
                    </div>
                    <div 
                        class="js-slick-carousel u-slick position-static overflow-hidden u-slick-overflow-visble pb-7 pt-2 px-1"
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
                        @foreach ($oferta as $item)
                            <div class="js-slide products-group">
                                <div class="product-item">
                                    <div class="product-item__outer h-100 w-100">
                                        <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                            <div class="product-item__body pb-xl-2">
                                                <div class="mb-2">
                                                    <a href="{{ route('productos.show', $item->slug) }}" class="d-block text-center"><img class="img-fluid" src="{{ asset('storage/imagenes_producto/original/'.$item->imagen) }}" alt="Image Description"></a>
                                                </div>
                                                <div class="mb-2"><a href="{{ route('categorias.show', App\Models\Categoria::generarUrl($item->categoria) ) }}" class="font-size-12 text-gray-5">{{ $item->categoria->nombre}}</a></div>
                                                <h5 class="mb-4 product-item__title"><a href="{{ route('productos.show', $item->slug) }}" class="text-dark font-weight-bold">{{ $item->nombre }}</a></h5>
                                                <p class="text-dark" style="margin-bottom: 0px">
                                                    Codigo: {{ $item->id }}<br>
                                                    Unidades: {{ $item->cantidad }}
                                                </p>
                                                <div class="flex-center-between mb-1">
                                                    <div class="prodcut-price">
                                                        @guest
                                                            @if ($item->precio_descuento)
                                                                <span class="font-size-12 tex-gray-6" style='display: inline-block'>
                                                                    <del>
                                                                        ${{ number_format($item->precio, 0, ',', '.') }}
                                                                    </del>
                                                                    
                                                                    <?php
                                                                        $descuento = 100 - ($item->precio_descuento * 100 / $item->precio);
                                                                        echo "<small class='text-red' style=''>".number_format($descuento, 0, ',', '.')."% de dcto incluído </small>";
                                                                    ?>
                                                                </span>
                                                                <br>
                                                                <ins class="font-size-20 text-red text-decoration-none">${{ number_format($item->precio_descuento, 0, ',', '.') }}</ins>
                                                                {{-- <del class="font-size-12 tex-gray-6 position-absolute bottom-100">${{ number_format($novedad->precio, 0, ',', '.') }}</del> --}}
                                                            @else
                                                                <div class="text-gray-100">${{ number_format($item->precio, 0, ',', '.') }}</div>
                                                            @endif
                                                        @endguest

                                                        @auth
                                                            @if( auth()->user()->rol_user == null)
                                                                @if ($item->precio_descuento)
                                                                    <span class="font-size-12 tex-gray-6" style='display: inline-block'>
                                                                        <del>
                                                                            ${{ number_format($item->precio, 0, ',', '.') }}
                                                                        </del>
                                                                        
                                                                        <?php
                                                                            $descuento = 100 - ($item->precio_descuento * 100 / $item->precio);
                                                                            echo "<small class='text-red' style=''>".number_format($descuento, 0, ',', '.')."% de dcto incluído </small>";
                                                                        ?>
                                                                    </span>
                                                                    <br>
                                                                    @auth
                                                                        <ins class="font-size-20 text-red text-decoration-none">${{ number_format($item->precio_descuento, 0, ',', '.') }}</ins>
                                                                        {{-- <del class="font-size-12 tex-gray-6 position-absolute bottom-100">${{ number_format($novedad->precio, 0, ',', '.') }}</del> --}}
                                                                    @endauth
                                                                @else
                                                                    <div class="text-gray-100">${{ number_format($item->precio, 0, ',', '.') }}</div>
                                                                @endif
                                                            @endif

                                                            @if( auth()->user()->rol_user == 3 )
                                                                <div class="text-gray-100">${{ number_format($item->precio_ferretero, 0, ',', '.') }}</div>
                                                            @endif
                                                        @endauth
                                                    </div>
                                                    <div class="d-none d-xl-block prodcut-add-cart">
                                                        @auth
                                                            <a href="#" data-combo="0" data-id="{{$item->id}}" class="btn-add-cart btn-primary transition-3d-hover" data-toggle="modal" data-target="#ModalQuantity"><i class="ec ec-add-to-cart"></i></a>
                                                        @endauth
                                                        @guest
                                                            <a href="{{ route('login') }}" data-combo="0" data-id="{{$item->id}}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                        @endguest
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-item__footer">
                                                @auth
                                                    <a href="#" data-combo="0" data-id="{{$item->id}}" class="text-gray-6 font-size-13 anadir-favorito"><i class="fas fa-heart" style="{{auth()->user()->productos->find($item->id) ? 'color:red;' : '' }}"></i> Favoritos</a>
                                                @endauth
                                                @guest
                                                    {{-- <a href="#" data-combo="0" data-id="{{$novedad->id}}" class="text-gray-6 font-size-13 anadir-favorito"><i class="fas fa-heart" style=""></i> Favoritos</a> --}}
                                                    <a href="{{ route('login') }}" data-combo="0" data-id="{{$item->id}}" class="text-gray-6 font-size-13 anadir-favorito"><i class="fas fa-heart"></i> Favoritos</a>
                                                @endguest
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- End Productos en oferta -->
            </div>

            @if ($combosHome->count() > 0)
                <!-- Combos -->
                <div class="mb-6 row-combos" style="background-image: url({{ asset('frontend/assets/images/bg-combos.jpg') }});">
                    <div class="container">
                        <div class="row min-height-564 align-items-center">
                            <div class="col-12 col-lg-4 col-xl-5 col-wd-6 d-none d-md-block">
                            </div>
                            <div class="col-12 col-lg-8 col-xl-7 col-wd-6 pt-6 pt-md-0">
                                <div class=" d-flex border-bottom border-color-1 mr-md-2">
                                    <h3 class="section-title section-title__full mb-0 pb-2 font-size-22 encombo">Combos en promo</h3>
                                </div>
                                <div class="js-slick-carousel position-static u-slick u-slick--gutters-2 u-slick overflow-hidden u-slick-overflow-visble py-5"
                                    data-arrows-classes="position-absolute top-0 font-size-28 u-slick__arrow-normal top-10 pt-6 pt-md-0"
                                    data-arrow-left-classes="fa fa-angle-left right-2"
                                    data-arrow-right-classes="fa fa-angle-right right-1"
                                    data-pagi-classes="text-center right-0 bottom-1 left-0 u-slick__pagination u-slick__pagination--long mb-0 z-index-n1 mt-4">
                                    <div class="js-slide">
                                        <ul class="row list-unstyled products-group no-gutters mb-0 overflow-visible">
                                            @foreach ($combosHome as $combo)
                                                <li class="col-md-6 product-item product-item__card mb-2 remove-divider pr-md-2 border-bottom-0">
                                                    <div class="product-item__outer h-100 w-100">
                                                        <div class="product-item__inner p-md-3 row no-gutters bg-white max-width-334">
                                                            <div class="col col-lg-auto product-media-left">
                                                                <a href="{{ route('combos.show', $combo->slug) }}" class="max-width-120 d-block"><img class="img-fluid" src="{{ asset('storage/imagenes_producto/original/'.$combo->imagen) }}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="col product-item__body pl-2 pl-lg-3 mr-xl-2 mr-wd-1 pr-3 pr-md-0 pt-1 pt-md-0">
                                                                <div class="mb-2">
                                                                    <div class="mb-2"><a href="{{ route('categorias.show', App\Models\Categoria::generarUrl($combo->categoria) ) }}" class="font-size-12 text-gray-5">{{ $combo->categoria->nombre }}</a></div>
                                                                    <h5 class="product-item__title"><a href="{{ route('combos.show', $combo->slug) }}" class="text-dark font-weight-bold">{{ $combo->nombre }}</a></h5>
                                                                </div>
                                                                <div class="flex-center-between mb-2">
                                                                    <div class="prodcut-price">
                                                                        <div class="text-gray-100">${{ number_format($combo->menorPrecio(), 0,'.','.') }}</div>
                                                                    </div>
                                                                    <div class="d-none d-xl-block prodcut-add-cart">
                                                                        <a href="#" data-combo="1" data-id="{{$combo->id}}" class="btn-add-cart btn-primary transition-3d-hover"  data-toggle="modal" data-target="#ModalQuantity"><i class="ec ec-add-to-cart"></i></a>
                                                                    </div>
                                                                </div>
                                                                <div class="product-item__footer bg-white">
                                                                    {{-- <div class="border-top pt-2 flex-center-between flex-wrap">

                                                                        <a href="#" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Favoritos</a>
                                                                    </div> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Combos -->
            @endif
            <div class="container">

                {{-- <!-- Ofertas dias Section -->
                <div class="mb-6 row-ofertas-dia">
                    <!-- Nav Classic -->
                    <div class="position-relative bg-white text-center z-index-2">
                        <ul class="nav nav-classic nav-tab justify-content-center" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active js-animation-link" id="pills-one-example1-tab" data-toggle="pill" href="#pills-one-example1" role="tab" aria-controls="pills-one-example1" aria-selected="true"
                                    data-target="#pills-one-example1"
                                    data-link-group="groups"
                                    data-animation-in="slideInUp">
                                    <div class="d-md-flex justify-content-md-center align-items-md-center" style="font-size: 24px;">
                                        Ofertas del día
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Nav Classic -->
                    <!-- Tab Content -->
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade pt-2 show active" id="pills-one-example1" role="tabpanel" aria-labelledby="pills-one-example1-tab" data-target-group="groups">
                            <ul class="row list-unstyled products-group no-gutters">
                                <li class="col-6 col-md-4 col-xl product-item">
                                    <div class="product-item__outer h-100 w-100">
                                        <div class="product-item__inner px-xl-4 p-3">
                                            <div class="product-item__body pb-xl-2">
                                                <div class="mb-2">
                                                    <a href="#" class="d-block text-center"><img class="img-fluid" src="{{ asset('frontend/assets/images/productos/sierra.jpg') }}" alt="Image Description"></a>
                                                </div>
                                                <div class="mb-2"><a href="#" class="font-size-12 text-gray-5">Herramientas eléctricas</a></div>
                                                <h5 class="mb-4 product-item__title"><a href="#" class="text-blue font-weight-bold">Base cadena de motosierra para pulidora ht</a></h5>
                                                <div class="flex-center-between mb-1">
                                                    <div class="prodcut-price">
                                                        <div class="text-gray-100">$87.500</div>
                                                    </div>
                                                    <div class="d-none d-xl-block prodcut-add-cart">
                                                        <a href="#" class="btn-add-cart btn-primary transition-3d-hover"  data-toggle="modal" data-target="#ModalQuantity"><i class="ec ec-add-to-cart"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-item__footer">
                                                <div class="border-top pt-2 flex-center-between flex-wrap">

                                                    <a href="#" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Favoritos</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="col-6 col-md-4 col-xl product-item">
                                    <div class="product-item__outer h-100 w-100">
                                        <div class="product-item__inner px-xl-4 p-3">
                                            <div class="product-item__body pb-xl-2">
                                                <div class="mb-2">
                                                    <a href="#" class="d-block text-center"><img class="img-fluid" src="{{ asset('frontend/assets/images/productos/carretilla2.jpg') }}" alt="Image Description"></a>
                                                </div>
                                                <div class="mb-2"><a href="#" class="font-size-12 text-gray-5">Construcción</a></div>
                                                <h5 class="mb-4 product-item__title"><a href="#" class="text-blue font-weight-bold">Carretilla Tolva Metalica Llanta Antipinchazo</a></h5>
                                                <div class="flex-center-between mb-1">
                                                    <div class="prodcut-price d-flex align-items-center position-relative">
                                                        <ins class="font-size-20 text-red text-decoration-none">$230.000</ins>
                                                        <del class="font-size-12 tex-gray-6 position-absolute bottom-100">$245.800</del>
                                                    </div>
                                                    <div class="d-none d-xl-block prodcut-add-cart">
                                                        <a href="#" data-combo="0" data-id="{{$proIns->id}}" class="btn-add-cart btn-primary transition-3d-hover"  data-toggle="modal" data-target="#ModalQuantity"><i class="ec ec-add-to-cart"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-item__footer">
                                                <div class="border-top pt-2 flex-center-between flex-wrap">

                                                    <a href="#" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Favoritos</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="col-6 col-md-4 col-xl product-item remove-divider-md-lg">
                                    <div class="product-item__outer h-100 w-100">
                                        <div class="product-item__inner px-xl-4 p-3">
                                            <div class="product-item__body pb-xl-2">
                                                <div class="mb-2">
                                                    <a href="#" class="d-block text-center"><img class="img-fluid" src="{{ asset('frontend/assets/images/productos/taladro.jpg') }}" alt="Image Description"></a>
                                                </div>
                                                <div class="mb-2"><a href="#" class="font-size-12 text-gray-5">Herramientas eléctricas</a></div>
                                                <h5 class="mb-4 product-item__title"><a href="#" class="text-blue font-weight-bold">Purple Solo 2 Wireless</a></h5>
                                                <div class="flex-center-between mb-1">
                                                    <div class="prodcut-price">
                                                        <div class="text-gray-100">$281.200</div>
                                                    </div>
                                                    <div class="d-none d-xl-block prodcut-add-cart">
                                                        <a href="#" class="btn-add-cart btn-primary transition-3d-hover"  data-toggle="modal" data-target="#ModalQuantity"><i class="ec ec-add-to-cart"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-item__footer">
                                                <div class="border-top pt-2 flex-center-between flex-wrap">

                                                    <a href="#" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Favoritos</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="col-6 col-md-4 col-xl product-item remove-divider-xl">
                                    <div class="product-item__outer h-100 w-100">
                                        <div class="product-item__inner px-xl-4 p-3">
                                            <div class="product-item__body pb-xl-2">
                                                <div class="mb-2">
                                                    <a href="#" class="d-block text-center"><img class="img-fluid" src="{{ asset('frontend/assets/images/productos/ducha.jpg') }}" alt="Image Description"></a>
                                                </div>
                                                <div class="mb-2"><a href="#" class="font-size-12 text-gray-5">Grifería</a></div>
                                                <h5 class="mb-4 product-item__title"><a href="#" class="text-blue font-weight-bold">Ducha Electrica Dirigible 1 Temperatura 220v K-003</a></h5>
                                                <div class="flex-center-between mb-1">
                                                    <div class="prodcut-price">
                                                        <div class="text-gray-100">$98.000</div>
                                                    </div>
                                                    <div class="d-none d-xl-block prodcut-add-cart">
                                                        <a href="#" data-combo="0" data-id="{{$proIns->id}}" class="btn-add-cart btn-primary transition-3d-hover"  data-toggle="modal" data-target="#ModalQuantity"><i class="ec ec-add-to-cart"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-item__footer">
                                                <div class="border-top pt-2 flex-center-between flex-wrap">

                                                    <a href="#" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Favoritos</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="col-6 col-md-4 col-xl product-item d-xl-none d-wd-block">
                                    <div class="product-item__outer h-100 w-100">
                                        <div class="product-item__inner px-xl-4 p-3">
                                            <div class="product-item__body pb-xl-2">
                                                <div class="mb-2">
                                                    <a href="#" class="d-block text-center"><img class="img-fluid" src="{{ asset('frontend/assets/images/productos/base.jpg') }}" alt="Image Description"></a>
                                                </div>
                                                <div class="mb-2"><a href="#" class="font-size-12 text-gray-5">Herramientas eléctricas</a></div>
                                                <h5 class="mb-4 product-item__title"><a href="#" class="text-blue font-weight-bold">Base para pulidora ht (HT90306)</a></h5>
                                                <div class="flex-center-between mb-1">
                                                    <div class="prodcut-price">
                                                        <div class="text-gray-100">$87.500</div>
                                                    </div>
                                                    <div class="d-none d-xl-block prodcut-add-cart">
                                                        <a href="#" class="btn-add-cart btn-primary transition-3d-hover"  data-toggle="modal" data-target="#ModalQuantity"><i class="ec ec-add-to-cart"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-item__footer">
                                                <div class="border-top pt-2 flex-center-between flex-wrap">

                                                    <a href="#" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Favoritos</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="col-6 col-md-4 col-xl product-item d-xl-none d-wd-block remove-divider-wd remove-divider-md-lg">
                                    <div class="product-item__outer h-100 w-100">
                                        <div class="product-item__inner px-xl-4 p-3">
                                            <div class="product-item__body pb-xl-2">
                                                <div class="mb-2">
                                                    <a href="#" class="d-block text-center"><img class="img-fluid" src="{{ asset('frontend/assets/images/productos/carretilla2.jpg') }}" alt="Image Description"></a>
                                                </div>
                                                <div class="mb-2"><a href="#" class="font-size-12 text-gray-5">Construcción</a></div>
                                                <h5 class="mb-4 product-item__title"><a href="#" class="text-blue font-weight-bold">Carretilla Tolva Metalica Llanta Antipinchazo</a></h5>
                                                <div class="flex-center-between mb-1">
                                                    <div class="prodcut-price d-flex align-items-center position-relative">
                                                        <ins class="font-size-20 text-red text-decoration-none">$230.000</ins>
                                                        <del class="font-size-12 tex-gray-6 position-absolute bottom-100">$281.200</del>
                                                    </div>
                                                    <div class="d-none d-xl-block prodcut-add-cart">
                                                        <a href="#" data-combo="0" data-id="{{$proIns->id}}" class="btn-add-cart btn-primary transition-3d-hover"  data-toggle="modal" data-target="#ModalQuantity"><i class="ec ec-add-to-cart"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-item__footer">
                                                <div class="border-top pt-2 flex-center-between flex-wrap">

                                                    <a href="#" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Favoritos</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Tab Content -->
                </div>
                <!-- End Tab Prodcut Section --> --}}

                <!-- Productos MAS VENDIDO -->
                <div class="mb-8 position-relative">
                    <dv class="d-flex justify-content-between border-bottom border-color-1 flex-md-nowrap flex-wrap border-sm-bottom-0">
                        <div class="col-md-6">
                            <h3 class="section-title section-title__full mb-0 pb-2 font-size-22">Lo más vendido</h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <small class="text-danger d-inline-block mb-0 pb-2 font-size-14"><b>Ver {{$masVendido->count()}} mas</b></small>
                        </div>
                    </dv>
                    <div class="js-slick-carousel position-static u-slick u-slick--gutters-1 overflow-hidden u-slick-overflow-visble pt-3 pb-3"
                        data-arrows-classes="d-none d-xl-block u-slick__arrow-normal u-slick__arrow-centered--y rounded-circle text-black font-size-30 z-index-2"
                        data-arrow-left-classes="fa fa-angle-left u-slick__arrow-inner--left left-n16"
                        data-arrow-right-classes="fa fa-angle-right u-slick__arrow-inner--right right-n20"
                        data-pagi-classes="text-center right-0 bottom-1 left-0 u-slick__pagination u-slick__pagination--long mb-0 z-index-n1 mt-4"
                        >
                        @foreach($masVendido->chunk(4) as $chunk)
                            <div class="js-slide">
                                <ul class="row list-unstyled products-group no-gutters mb-0 overflow-visible">
                                    @foreach($chunk as $item)
                                        <li class="col-wd-3 col-md-3 product-item product-item__card pb-2 mb-2 pb-md-0 mb-md-0 remove-divider">
                                            <div class="product-item__outer h-100 w-100">
                                                <div class="product-item__inner p-md-3 row no-gutters">
                                                    <div class="col col-lg-auto product-media-left">
                                                        <a href="{{ route('productos.show', $item->slug) }}" class="max-width-150 d-block"><img class="img-fluid" src="{{ asset('storage/imagenes_producto/original/'.$item->imagen) }}" alt="Image Description"></a>
                                                    </div>
                                                    <div class="col product-item__body pl-2 pl-lg-3 mr-xl-2 mr-wd-1">
                                                        <div class="mb-4">
                                                            <div class="mb-2"><a href="{{ route('categorias.show', App\Models\Categoria::generarUrl($item->categoria) ) }}" class="font-size-12 text-gray-5">{{ $item->categoria->nombre}}</a></div>
                                                            <h5 class="product-item__title"><a href="{{ route('productos.show', $item->slug) }}" class="text-dark font-weight-bold">{{ $item->nombre }}</a></h5>
                                                        </div>
                                                        <p class="text-dark" style="margin-bottom: 0px">
                                                            Codigo: {{ $item->id }}<br>
                                                            Unidades: {{ $item->cantidad }}
                                                        </p>
                                                        <div class="flex-center-between mb-3">
                                                            <div class="prodcut-price position-relative">
                                                                @guest
                                                            @if ($item->precio_descuento)
                                                                <span class="font-size-12 tex-gray-6" style='display: inline-block'>
                                                                    <del>
                                                                        ${{ number_format($item->precio, 0, ',', '.') }}
                                                                    </del>
                                                                    
                                                                    <?php
                                                                        $descuento = 100 - ($item->precio_descuento * 100 / $item->precio);
                                                                        echo "<small class='text-red' style=''>".number_format($descuento, 0, ',', '.')."% de dcto incluído </small>";
                                                                    ?>
                                                                </span>
                                                                <br>
                                                                <ins class="font-size-20 text-red text-decoration-none">${{ number_format($item->precio_descuento, 0, ',', '.') }}</ins>
                                                                {{-- <del class="font-size-12 tex-gray-6 position-absolute bottom-100">${{ number_format($novedad->precio, 0, ',', '.') }}</del> --}}
                                                            @else
                                                                <div class="text-gray-100">${{ number_format($item->precio, 0, ',', '.') }}</div>
                                                            @endif
                                                        @endguest

                                                        @auth
                                                            @if(auth()->user()->rol_user == null)
                                                                @if ($item->precio_descuento)
                                                                    <span class="font-size-12 tex-gray-6" style='display: inline-block'>
                                                                        <del>
                                                                            ${{ number_format($item->precio, 0, ',', '.') }}
                                                                        </del>
                                                                        
                                                                        <?php
                                                                            $descuento = 100 - ($item->precio_descuento * 100 / $item->precio);
                                                                            echo "<small class='text-red' style=''>".number_format($descuento, 0, ',', '.')."% de dcto incluído </small>";
                                                                        ?>
                                                                    </span>
                                                                    <br>
                                                                    @auth
                                                                        <ins class="font-size-20 text-red text-decoration-none">${{ number_format($item->precio_descuento, 0, ',', '.') }}</ins>
                                                                        {{-- <del class="font-size-12 tex-gray-6 position-absolute bottom-100">${{ number_format($novedad->precio, 0, ',', '.') }}</del> --}}
                                                                    @endauth
                                                                @else
                                                                    <div class="text-gray-100">${{ number_format($item->precio, 0, ',', '.') }}</div>
                                                                @endif
                                                            @endif

                                                            @if( auth()->user()->rol_user == 3 )
                                                                <div class="text-gray-100">${{ number_format($item->precio_ferretero, 0, ',', '.') }}</div>
                                                            @endif
                                                        @endauth

                                                            </div>
                                                            <div class="d-none d-xl-block prodcut-add-cart">
                                                                @auth
                                                                    <a href="#" data-combo="0" data-id="{{$item->id}}" class="btn-add-cart btn-primary transition-3d-hover"  data-toggle="modal" data-target="#ModalQuantity"><i class="ec ec-add-to-cart"></i></a>
                                                                @endauth
                                                                @guest
                                                                    <a href="{{ route('login') }}" data-combo="0" data-id="{{$item->id}}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                @endguest
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                @auth
                                                                    <a href="#" data-combo="0" data-id="{{$item->id}}" class="text-gray-6 font-size-13 anadir-favorito"><i class="fas fa-heart" style="{{auth()->user()->productos->find($item->id) ? 'color:red;' : '' }}"></i> Favoritos</a>
                                                                @endauth
                                                                @guest
                                                                    {{-- <a href="#" data-combo="0" data-id="{{$novedad->id}}" class="text-gray-6 font-size-13 anadir-favorito"><i class="fas fa-heart" style=""></i> Favoritos</a> --}}
                                                                    <a href="{{ route('login') }}" data-combo="0" data-id="{{$item->id}}" class="text-gray-6 font-size-13 anadir-favorito"><i class="fas fa-heart"></i> Favoritos</a>
                                                                @endguest
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- End MAS VENDIDO -->


                <!-- Recommendation for you -->
                <div class="position-relative row-novedades">
                    <div class="border-bottom border-color-1 mb-2">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="section-title section-title__full d-inline-block mb-0 pb-2 font-size-22">Últimas novedades</h3>
                            </div>
                            <div class="col-md-6 text-right">
                                <small class="text-danger d-inline-block mb-0 pb-2 font-size-14"><b>Ver {{$novedades->count()}} mas</b></small>
                            </div>
                        </div>
                    </div>
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
                        @foreach ($novedades as $novedad)
                            <div class="js-slide products-group">
                                <div class="product-item">
                                    <div class="product-item__outer h-100 w-100">
                                        <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                            <div class="product-item__body pb-xl-2">
                                                <div class="mb-2"> 
                                                    <?php 
                                                        $fecha_actual = strtotime(date("Y-m-d"));
                                                        $novedadvencimiento = strtotime($novedad->nuevo_vencimiento)
                                                    ?>
                                                    @if($novedad->nuevo == 1 && $novedadvencimiento >= $fecha_actual)
                                                        <div class="badge badge-danger"><i class="fa fa-star"></i> Nuevo</div>
                                                    @endif
                                                    <a href="{{ route('productos.show', $novedad->slug) }}" class="d-block text-center"><img class="img-fluid" src="{{ asset('storage/imagenes_producto/original/'.$novedad->imagen) }}" alt="Image Description" style="height: 200px"></a>
                                                </div>
                                                <div class="mb-2"><a href="{{ route('categorias.show', App\Models\Categoria::generarUrl($novedad->categoria) ) }}" class="font-size-12 text-gray-5">{{ $novedad->categoria->nombre}}</a></div>
                                                <h5 class="mb-4 product-item__title"><a href="{{ route('productos.show', $novedad->slug) }}" class="text-dark font-weight-bold">{{ $novedad->nombre }}</a></h5>
                                                <p class="text-dark" style="margin-bottom: 0px">
                                                    Codigo: {{ $novedad->id }}<br>
                                                    Unidades: {{ $novedad->cantidad }}
                                                </p>
                                                <div class="flex-center-between mb-1">
                                                    <div class="prodcut-price">
                                                        @guest
                                                            @if ($novedad->precio_descuento)
                                                                <span class="font-size-12 tex-gray-6" style='display: inline-block'>
                                                                    <del>
                                                                        ${{ number_format($novedad->precio, 0, ',', '.') }}
                                                                    </del>
                                                                    
                                                                    <?php
                                                                        $descuento = 100 - ($novedad->precio_descuento * 100 / $novedad->precio);
                                                                        echo "<small class='text-red' style=''>".number_format($descuento, 0, ',', '.')."% de dcto incluído </small>";
                                                                    ?>
                                                                </span>
                                                                <br>
                                                                <ins class="font-size-20 text-red text-decoration-none">${{ number_format($novedad->precio_descuento, 0, ',', '.') }}</ins>
                                                                {{-- <del class="font-size-12 tex-gray-6 position-absolute bottom-100">${{ number_format($novedad->precio, 0, ',', '.') }}</del> --}}
                                                            @else
                                                                <div class="text-gray-100">${{ number_format($novedad->precio, 0, ',', '.') }}</div>
                                                            @endif
                                                        @endguest

                                                        @auth
                                                            @if( auth()->user()->rol_user == null )
                                                                @if ($novedad->precio_descuento)
                                                                    <span class="font-size-12 tex-gray-6" style='display: inline-block'>
                                                                        <del>
                                                                            ${{ number_format($novedad->precio, 0, ',', '.') }}
                                                                        </del>
                                                                        
                                                                        <?php
                                                                            $descuento = 100 - ($novedad->precio_descuento * 100 / $novedad->precio);
                                                                            echo "<small class='text-red' style=''>".number_format($descuento, 0, ',', '.')."% de dcto incluído </small>";
                                                                        ?>
                                                                    </span>
                                                                    <br>
                                                                    @auth
                                                                        <ins class="font-size-20 text-red text-decoration-none">${{ number_format($novedad->precio_descuento, 0, ',', '.') }}</ins>
                                                                        {{-- <del class="font-size-12 tex-gray-6 position-absolute bottom-100">${{ number_format($novedad->precio, 0, ',', '.') }}</del> --}}
                                                                    @endauth
                                                                @else
                                                                    <div class="text-gray-100">${{ number_format($novedad->precio, 0, ',', '.') }}</div>
                                                                @endif
                                                            @endif

                                                            @if( auth()->user()->rol_user == 3 )
                                                                <div class="text-gray-100">${{ number_format($novedad->precio_ferretero, 0, ',', '.') }}</div>
                                                            @endif
                                                        @endauth
                                                    </div>
                                                    <div class="d-none d-xl-block prodcut-add-cart">
                                                        @auth
                                                            <a href="#" data-combo="0" data-id="{{$novedad->id}}" class="btn-add-cart btn-primary transition-3d-hover" data-toggle="modal" data-target="#ModalQuantity"><i class="ec ec-add-to-cart"></i></a>
                                                        @endauth
                                                        @guest
                                                            <a href="{{ route('login') }}" data-combo="0" data-id="{{$novedad->id}}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                        @endguest
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-item__footer">
                                                @auth
                                                    <a href="#" data-combo="0" data-id="{{$novedad->id}}" class="text-gray-6 font-size-13 anadir-favorito"><i class="fas fa-heart" style="{{auth()->user()->productos->find($novedad->id) ? 'color:red;' : '' }}"></i> Favoritos</a>
                                                @endauth
                                                @guest
                                                    {{-- <a href="#" data-combo="0" data-id="{{$novedad->id}}" class="text-gray-6 font-size-13 anadir-favorito"><i class="fas fa-heart" style=""></i> Favoritos</a> --}}
                                                    <a href="{{ route('login') }}" data-combo="0" data-id="{{$novedad->id}}" class="text-gray-6 font-size-13 anadir-favorito"><i class="fas fa-heart"></i> Favoritos</a>
                                                @endguest
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- End Recommendation for you -->

            </div>

            <div class="container">

                <!-- Banner 2 columns -->
                <div class="mb-8">
                    <div class="row">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <a href="#">
                                <img class="img-fluid" src="{{ asset('frontend/assets/images/banners/banner1.jpg') }}" alt="Image Description">
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="#">
                                <img class="img-fluid" src="{{ asset('frontend/assets/images/banners/banner2.jpg') }}" alt="Image Description">
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Banner 2 columns -->

                <!-- Caracteristicas -->
                <div class="mb-6 row border rounded-lg mx-0 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble text-center">

                    <!-- Feature List -->
                    <div class="media col-md-4 px-6 px-xl-4 px-wd-8 flex-shrink-0 flex-xl-shrink-1  py-3">
                        <div class="u-avatar mr-2">
                            <i class="text-primary ec ec-transport font-size-46"></i>
                        </div>
                        <div class="media-body text-center">
                            <span class="d-block font-weight-bold text-dark">Envíos Express</span>
                            <div class=" text-secondary">Entregas hasta en 1 día hábil en tu puerta.</div>
                        </div>
                    </div>                  

                    <!-- Feature List -->
                    <div class="media col-md-4 px-6 px-xl-4 px-wd-8 flex-shrink-0 flex-xl-shrink-1  border-left py-3">
                        <div class="u-avatar mr-2">
                            <i class="text-primary ec ec-add-to-cart font-size-56"></i>
                        </div>
                        <div class="media-body text-center">
                            <span class="d-block font-weight-bold text-dark">Compra Online</span>
                            <div class=" text-secondary">Fácil, rápido y seguro.</div>
                        </div>
                    </div>
                    <!-- End Feature List -->

                    <!-- Feature List -->
                    <div class="media col-md-4 px-6 px-xl-4 px-wd-8 flex-shrink-0 flex-xl-shrink-1  border-left py-3">
                        <div class="u-avatar mr-2">
                            <i class="text-primary ec ec-map-pointer font-size-46"></i>
                        </div>
                        <div class="media-body text-center">
                            <span class="d-block font-weight-bold text-dark">Envío gratis</span>
                            <div class=" text-secondary">En Cali por compras mayores a $150.000</div>
                        </div>
                    </div>
                    <!-- End Feature List -->



                    <!-- Feature List -->
                    
                    <!-- End Feature List -->
                </div>
                <!-- End Caracteristicas -->
            </div>


            {{-- <!-- Brand Carousel -->
            <div class="container mb-8">
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
                                <img class="img-fluid m-auto max-height-50" src="{{ asset('frontend/assets/images/marcas/marca1.jpg') }}" alt="Image Description">
                            </a>
                        </div>
                        <div class="js-slide">
                            <a href="#" class="link-hover__brand">
                                <img class="img-fluid m-auto max-height-50" src="{{ asset('frontend/assets/images/marcas/marca2.jpg') }}" alt="Image Description">
                            </a>
                        </div>
                        <div class="js-slide">
                            <a href="#" class="link-hover__brand">
                                <img class="img-fluid m-auto max-height-50" src="{{ asset('frontend/assets/images/marcas/marca3.jpg') }}" alt="Image Description">
                            </a>
                        </div>
                        <div class="js-slide">
                            <a href="#" class="link-hover__brand">
                                <img class="img-fluid m-auto max-height-50" src="{{ asset('frontend/assets/images/marcas/marca4.jpg') }}" alt="Image Description">
                            </a>
                        </div>
                        <div class="js-slide">
                            <a href="#" class="link-hover__brand">
                                <img class="img-fluid m-auto max-height-50" src="{{ asset('frontend/assets/images/marcas/marca5.jpg') }}" alt="Image Description">
                            </a>
                        </div>
                        <div class="js-slide">
                            <a href="#" class="link-hover__brand">
                                <img class="img-fluid m-auto max-height-50" src="{{ asset('frontend/assets/images/marcas/marca6.jpg') }}" alt="Image Description">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Brand Carousel --> --}}

</main>
@endsection
