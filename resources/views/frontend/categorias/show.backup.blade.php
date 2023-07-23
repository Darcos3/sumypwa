@extends('frontend.layouts.app')

@section('titulo', 'Categoria '.$categoria->nombre)

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
            <div class="mb-6">
                <div class="d-flex justify-content-between align-items-center border-bottom border-color-1 flex-lg-nowrap flex-wrap mb-4">
                    <h3 class="section-title section-title__full mb-0 pb-2 font-size-22">Categorías de {{ $categoria->nombre }}</h3>
                </div>
                <ul class="row list-unstyled products-group no-gutters mb-6">
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
                </ul>
                <!-- People buying in this category -->
                @if ($categoria->productos->where('destacado',1)->count() > 0)
                    <div class="position-relative">
                        <div class="border-bottom border-color-1 mb-2">
                            <h3 class="section-title section-title__full d-inline-block mb-0 pb-2 font-size-22">Destacados de la categoría</h3>
                        </div>
                        <div class="js-slick-carousel u-slick position-static overflow-hidden u-slick-overflow-visble pb-7 pt-2 px-1"
                            data-pagi-classes="text-center right-0 bottom-1 left-0 u-slick__pagination u-slick__pagination--long mb-0 z-index-n1 mt-3 mt-md-0"
                            data-slides-show="6"
                            data-slides-scroll="1"
                            data-arrows-classes="position-absolute top-0 font-size-17 u-slick__arrow-normal top-10"
                            data-arrow-left-classes="fa fa-angle-left right-1"
                            data-arrow-right-classes="fa fa-angle-right right-0"
                            data-responsive='[{
                              "breakpoint": 1400,
                              "settings": {
                                "slidesToShow": 5
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
                                @foreach ($categoria->productos->where('destacado',1) as $producto)
                                    @for ($i=0; $i < 7; $i++)
                                        <div class="js-slide products-group">
                                            <div class="product-item">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            {{-- <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">{{$producto->categoria->nombre}}</a></div> --}}
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route('productos.show',$producto->slug) }}" class="text-blue font-weight-bold">{{ $producto->nombre }}</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route('productos.show',$producto->slug) }}" class="d-block text-center"><img class="img-fluid" src="{{ asset('storage/imagenes_producto/212x212/'.$producto->imagen) }}" alt="{{ $producto->nombre }}"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">${{$producto->precio}}</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="#" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
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
                                            </div>
                                        </div>
                                    @endfor
                                @endforeach
                        </div>
                    </div>
                @endif
                <!-- End People buying in this category -->
            </div>
        </div>
    </main>
@endsection
