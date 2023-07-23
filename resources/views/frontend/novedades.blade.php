@extends('frontend.layouts.app')

@section('titulo', 'Novedades')

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
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Novedades</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="container">
            <div class="mb-8 position-relative">
                <dv class="d-flex justify-content-between border-bottom border-color-1 flex-md-nowrap flex-wrap border-sm-bottom-0">
                    <h3 class="section-title section-title__full mb-0 pb-2 font-size-22">Últimas Novedades</h3>
                </dv>
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
                                                    @if ($novedad->precio_descuento)
                                                        <span class="font-size-12 tex-gray-6" style='display: inline-block'>
                                                            <del>${{ number_format($novedad->precio, 0, ',', '.') }}</del>
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

        </div>
    </main>
@endsection