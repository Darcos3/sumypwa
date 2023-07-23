@extends('frontend.layouts.app')

@section('titulo', 'Productos por marca')

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
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Marcas</li>
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
                                            <li><a class="dropdown-item" href="{{ route('categorias.show', $catPrin->slug) }}">{{ $catPrin->nombre }}</a></li>
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

                </div>
                <div class="col-xl-9 col-wd-9gdot5">
                    <!-- Shop-control-bar Title -->
                    <div class="flex-center-between mb-3">
                        @foreach ($nombreMarca as $nombre )
                            @if($nombre->imagen == '')
                            <img src="{{ asset('frontend/assets/images/marca_none.png' )  }}" class="img-fluid rounded" style="width: auto; height: 150px;" title="Marca sin imagen"><br>
                            @else
                            <img src="{{ asset('storage/terminos/'.$nombre->imagen )  }}" class="img-fluid rounded" style="width: auto; height: 150px;"><br>
                            @endif
                            <h3 class="font-size-25 mb-0 text-center">Productos Por Marca {{ $nombre->marca }}</h3>
                        @endforeach
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
                                                    <h5 class="mb-1 product-item__title">
                                                        <a href="{{ route('productos.show',$producto->slug)}}" class="text-blue font-weight-bold">{{$producto->nombre}}</a>
                                                    </h5>
                                                    <div class="mb-2">
                                                        @if( $producto->imagen == '' )
                                                        <a href="{{ route('productos.show',$producto->slug)}}" class="d-block text-center"><img class="img-fluid" src="{{ asset('frontend/assets/images/producto_none.png') }}" alt="{{ $producto->nombre}}"></a>
                                                        @else
                                                        <a href="{{ route('productos.show',$producto->slug)}}" class="d-block text-center"><img class="img-fluid" src="{{ asset('storage/imagenes_producto/212x212/'.$producto->imagen) }}" alt="{{ $producto->nombre}}"></a>
                                                        @endif
                                                    </div>
                                                    <div class="flex-center-between mb-1">
                                                        <div class="prodcut-price d-flex align-items-center position-relative">
                                                            <ins class="font-size-20 text-red text-decoration-none">${{ number_format($producto->precio_descuento, 0, ',', '.') }}</ins>
                                                            <del class="font-size-12 tex-gray-6 position-absolute bottom-100">${{ number_format($producto->precio, 0, ',', '.') }}</del>
                                                        </div>
                                                        <div class="d-none d-xl-block prodcut-add-cart">
                                                            <a href="#" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <small class="text-decoration-none">Vendidos {{ $producto->vendidos }}</small><br>
                                                    <small class="text-decoration-none">Valoracion {{ $producto->valoracion }}</small><br>
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
                                                            <ins class="font-size-20 text-red text-decoration-none">${{ number_format($producto->precio_descuento, 0, ',', '.') }}</ins>
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
        </div>
    </main>

@endsection

@section('scripts')

    <script type="text/javascript">

        console.log('AQUI');

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