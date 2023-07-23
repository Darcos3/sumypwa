@extends('frontend.layouts.app')

@section('titulo', $atributo->nombre)

@section('styles')
    <style>
        
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
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="#">Atributo</a></li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">{{ $atributo->nombre }}</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="container">
            <div class="mb-4 text-center" >
                <img src="{{ asset('storage/terminos/'.$atributo->imagen )  }}" class="img-fluid rounded" style="width: auto; height: 250px;"><br>
            </div>
            <div class="my-4 my-xl-8"  >
                <div class="row">
                    {{-- @foreach ($atributo->terminos as $termino)
                        <div class="col-sm-6 col-md-4 col-lg-2 mr-md-auto mr-xl-0 mb-5">
                            <a class="lnk-marca" href="#">
                                <img src="{{ asset('storage/terminos/'.$termino->imagen )  }}" alt="marca" class="img-thumbnail">
                                <h5>{{ $termino->nombre}}</h5>
                            </a>
                        </div>
                    @endforeach --}}

                    <div class="container">
                        <div class="position-relative row-mas-vendido">
                            <div class="border-bottom border-color-1 mb-2">
                                <h3 class="section-title section-title__full d-inline-block mb-0 pb-2 font-size-22">Productos por 
                                    @if( $tipoatributo->nombre == 'Marcas' )
                                    Marca
                                    @else 
                                    {{ $tipoatributo->nombre }}
                                    @endif
                                {{ $atributo->nombre }}
                                </h3>
                            </div>
                            <div class="js-slick-carousel u-slick position-static overflow-hidden u-slick-overflow-visble pb-7 pt-2 px-1"
                        data-pagi-classes="text-center right-0 bottom-1 left-0 u-slick__pagination u-slick__pagination--long mt-5 mb-0 z-index-n1 mt-3 mt-md-0"
                        data-slides-show="7"
                        data-slides-scroll="1"
                        data-arrows-classes="position-absolute top-0 font-size-28 u-slick__arrow-normal top-10"
                        data-arrow-left-classes="fa fa-angle-left right-2"
                        data-arrow-right-classes="fa fa-angle-right right-0"
                        data-responsive='[{
                          "breakpoint": 1400,
                          "settings": {
                            "slidesToShow": 6
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
                        @foreach ($atributo->productos as $producto)
                            <div class="js-slide products-group">
                                <div class="product-item">
                                    <div class="product-item__outer h-100 w-100">
                                        <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                            <div class="product-item__body pb-xl-2">
                                                <div class="mb-2">
                                                    <a href="{{ route('productos.show', $producto->slug) }}" class="d-block text-center"><img class="img-fluid" src="{{ asset('storage/imagenes_producto/original/'.$producto->imagen) }}" alt="Image Description"></a>
                                                </div>
                                                <div class="mb-2"><a href="{{ route('categorias.show', App\Models\Categoria::generarUrl($producto->categoria) ) }}" class="font-size-12 text-gray-5">{{ $producto->categoria->nombre}}</a></div>
                                                <h5 class="mb-4 product-item__title"><a href="{{ route('productos.show', $producto->slug) }}" class="text-blue font-weight-bold">{{ $producto->nombre }}</a></h5>
                                                <div class="flex-center-between mb-1">
                                                    <div class="prodcut-price">
                                                        @if ($producto->precio_descuento)
                                                            <del class="font-size-12 tex-gray-6 position-absolute">${{ number_format($producto->precio, 0, ',', '.') }}</del><br>
                                                            <ins class="font-size-20 text-red text-decoration-none">${{ number_format($producto->precio_descuento, 0, ',', '.') }}</ins>
                                                        @else
                                                            <div class="text-gray-100">${{ number_format($producto->precio, 0, ',', '.') }}</div>
                                                        @endif
                                                    </div>
                                                    <div class="d-none d-xl-block prodcut-add-cart">
                                                        @auth
                                                            <a href="#" data-combo="0" data-id="{{$producto->id}}" class="btn-add-cart btn-primary transition-3d-hover" data-toggle="modal" data-target="#ModalQuantity"><i class="ec ec-add-to-cart"></i></a>
                                                        @endauth
                                                        @guest
                                                            <a href="{{ route('login') }}" data-combo="0" data-id="{{$producto->id}}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                        @endguest
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-item__footer">
                                                <div class="border-top pt-2 flex-center-between flex-wrap">
                                                    @auth
                                                        <a href="#" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Favoritos</a>
                                                    @endauth
                                                    @guest
                                                        <a href="{{ route('login') }}" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Favoritos</a>
                                                    @endguest
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
