@extends('frontend.layouts.app')

@section('titulo', 'Mas Vendido')

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
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Mas Vendido</li>
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
                    <h3 class="section-title section-title__full mb-0 pb-2 font-size-22">Productos Mas Vendidos</h3>
                </dv>
                <div class="js-slick-carousel position-static u-slick u-slick--gutters-1 overflow-hidden u-slick-overflow-visble pt-3 pb-3"
                    data-arrows-classes="position-absolute top-0 font-size-28 u-slick__arrow-normal top-10"
                    data-arrow-left-classes="fa fa-angle-left right-2"
                    data-arrow-right-classes="fa fa-angle-right right-0"
                    data-pagi-classes="text-center right-0 bottom-1 left-0 u-slick__pagination u-slick__pagination--long mb-0 z-index-n1 mt-4">

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
                                                            @if ($item->precio_descuento)
                                                                <span class="font-size-12 tex-gray-6" style='display: inline-block'>
                                                                    <del>${{ number_format($item->precio, 0, ',', '.') }}</del>
                                                                    <?php
                                                                        $descuento = 100 - ($item->precio_descuento * 100 / $item->precio);
                                                                        echo "<small class='text-red' style=''>".number_format($descuento, 0, ',', '.')."% de dcto incluído </small>";
                                                                    ?>    
                                                                </span>
                                                                <br>
                                                                <ins class="font-size-20 text-red text-decoration-none">${{ number_format($item->precio_descuento, 0, ',', '.') }}</ins>
                                                                
                                                                {{-- <del class="font-size-12 tex-gray-6 position-absolute bottom-100">${{ number_format($item->precio, 0, ',', '.') }}</del> --}}
                                                            @else
                                                                <div class="text-gray-100">${{ number_format($item->precio, 0, ',', '.') }}</div>
                                                            @endif

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

        </div>
    </main>
@endsection