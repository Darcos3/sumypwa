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
                                        @endforeach
                                        <!-- End Menu List -->
                                    </ul>
                                </div>
                            </li>
                                <li>
                                    <a class="dropdown-current active" href="#">{{ $categoria->nombre }}</a>

                                    <ul class="list-unstyled dropdown-list">
                                        <!-- Menu List -->
                                        @foreach ($categoria->subcategorias as $subCat)
                                            <li><a class="dropdown-item" href="{{ route('categorias.show', App\Models\Categoria::generarUrl($subCat) ) }}">{{ $subCat->nombre }}</a></li>
                                        @endforeach
                                        <!-- End Menu List -->
                                    </ul>
                                </li>
                        </ul>
                        <!-- End List -->
                    </div>

                    <div class="mb-6">
                        <div class="border-bottom border-color-1 mb-5">
                            <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Filtros</h3>
                        </div>
                        <div class="border-bottom pb-4 mb-4">
                            <h4 class="font-size-14 mb-3 font-weight-bold">Marcas</h4>

                            <!-- Checkboxes -->
                            <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="brandAdidas">
                                    <label class="custom-control-label" for="brandAdidas">Stanley
                                        <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="brandNewBalance">
                                    <label class="custom-control-label" for="brandNewBalance">Black & Decker
                                        <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="brandNike">
                                    <label class="custom-control-label" for="brandNike">Dewalt
                                        <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="brandFredPerry">
                                    <label class="custom-control-label" for="brandFredPerry">Irwin
                                        <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="brandTnf">
                                    <label class="custom-control-label" for="brandTnf">Grival
                                        <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span>
                                    </label>
                                </div>
                            </div>
                            <!-- End Checkboxes -->

                            <!-- View More - Collapse -->
                            <div class="collapse" id="collapseBrand">
                                <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="brandGucci">
                                        <label class="custom-control-label" for="brandGucci">Forte
                                            <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="brandMango">
                                        <label class="custom-control-label" for="brandMango">Mahindra
                                            <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- End View More - Collapse -->

                            <!-- Link -->
                            <a class="link link-collapse small font-size-13 text-gray-27 d-inline-flex mt-2" data-toggle="collapse" href="#collapseBrand" role="button" aria-expanded="false" aria-controls="collapseBrand">
                                <span class="link__icon text-gray-27 bg-white">
                                    <span class="link__icon-inner">+</span>
                                </span>
                                <span class="link-collapse__default">Mostrar más</span>
                                <span class="link-collapse__active">Mostrar menos</span>
                            </a>
                            <!-- End Link -->
                        </div>
                        <div class="border-bottom pb-4 mb-4">
                            <h4 class="font-size-14 mb-3 font-weight-bold">Color</h4>

                            <!-- Checkboxes -->
                            <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="categoryTshirt">
                                    <label class="custom-control-label" for="categoryTshirt">Negro <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                                </div>
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="categoryShoes">
                                    <label class="custom-control-label" for="categoryShoes">Blancoi <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                                </div>
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="categoryAccessories">
                                    <label class="custom-control-label" for="categoryAccessories">Negro y rojo <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                                </div>
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="categoryTops">
                                    <label class="custom-control-label" for="categoryTops">Dorado <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                                </div>
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="categoryBottom">
                                    <label class="custom-control-label" for="categoryBottom">Gris <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                                </div>
                            </div>
                            <!-- End Checkboxes -->

                            <!-- View More - Collapse -->
                            <div class="collapse" id="collapseColor">
                                <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="categoryShorts">
                                        <label class="custom-control-label" for="categoryShorts">Verde <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                                    </div>
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="categoryHats">
                                        <label class="custom-control-label" for="categoryHats">Plateado <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                                    </div>
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="categorySocks">
                                        <label class="custom-control-label" for="categorySocks">Negro con dorado <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                                    </div>
                                </div>
                            </div>
                            <!-- End View More - Collapse -->

                            <!-- Link -->
                            <a class="link link-collapse small font-size-13 text-gray-27 d-inline-flex mt-2" data-toggle="collapse" href="#collapseColor" role="button" aria-expanded="false" aria-controls="collapseColor">
                                <span class="link__icon text-gray-27 bg-white">
                                    <span class="link__icon-inner">+</span>
                                </span>
                                <span class="link-collapse__default">Mostrar más</span>
                                <span class="link-collapse__active">Mostrar menos</span>
                            </a>
                            <!-- End Link -->
                        </div>
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
                            data-max="3000000"
                            data-from="0"
                            data-to="3000000"
                            data-result-min="#rangeSliderExample3MinResult"
                            data-result-max="#rangeSliderExample3MaxResult">
                            <!-- End Range Slider -->
                            <div class="mt-1 text-gray-111 d-flex mb-4">
                                <span class="mr-0dot5">Precio: </span>
                                <span>$</span>
                                <span id="rangeSliderExample3MinResult" class=""></span>
                                <span class="mx-0dot5"> — </span>
                                <span>$</span>
                                <span id="rangeSliderExample3MaxResult" class=""></span>
                            </div>
                            <button type="submit" class="btn px-4 btn-primary-dark-w py-2 rounded-lg">Filtrar</button>
                        </div>
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
                <div class="col-xl-9">
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
                    <!-- End People buying in this category -->
                    <div class="mb-6 d-none d-xl-block">
                        <div class="position-relative">
                            <div class="border-bottom border-color-1 mb-2">
                                <h3 class="d-inline-block section-title section-title__full mb-0 pb-2 font-size-22">Destacados</h3>
                            </div>
                            <div class="js-slick-carousel u-slick position-static overflow-hidden u-slick-overflow-visble pb-7 pt-2 px-1"
                            data-pagi-classes="text-center right-0 bottom-1 left-0 u-slick__pagination u-slick__pagination--long mb-0 z-index-n1 mt-3 mt-md-0"
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
                                <div class="js-slide products-group">
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
                                                            <div class="text-gray-100">${{$producto->precio}}</div>
                                                        </div>
                                                        <div class="d-none d-xl-block prodcut-add-cart">
                                                            <a href="#" class="btn-add-cart btn-primary transition-3d-hover"  data-toggle="modal" data-target="#ModalQuantity"><i class="ec ec-add-to-cart"></i></a>
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
                            @endforeach
                        </div>
                    </div>
                    <div class="mb-6 position-relative">
                        <dv class="d-flex justify-content-between border-bottom border-color-1 flex-md-nowrap flex-wrap border-sm-bottom-0">
                            <h3 class="section-title section-title__full mb-0 pb-2 font-size-22">Lo más vendido</h3>
                        </dv>
                        <div class="js-slick-carousel position-static u-slick u-slick--gutters-1 overflow-hidden u-slick-overflow-visble pt-3 pb-3"
                    data-arrows-classes="position-absolute top-0 font-size-28 u-slick__arrow-normal top-10"
                    data-arrow-left-classes="fa fa-angle-left right-2"
                    data-arrow-right-classes="fa fa-angle-right right-0"
                    data-pagi-classes="text-center right-0 bottom-1 left-0 u-slick__pagination u-slick__pagination--long mb-0 z-index-n1 mt-4">
                    <div class="js-slide">
                        <ul class="row list-unstyled products-group no-gutters mb-0 overflow-visible">
                            <li class="col-md-4 product-item product-item__card pb-2 mb-2 pb-md-0 mb-md-0 border-bottom border-md-bottom-0">
                                <div class="product-item__outer h-100 w-100">
                                    <div class="product-item__inner p-md-3 row no-gutters">
                                        <div class="col col-lg-auto product-media-left">
                                            <a href="#" class="max-width-150 d-block"><img class="img-fluid" src="{{ asset('frontend/assets/images/productos/llaves.jpg') }}" alt="Image Description"></a>
                                        </div>
                                        <div class="col product-item__body pl-2 pl-lg-3 mr-xl-2 mr-wd-1">
                                            <div class="mb-4">
                                                <div class="mb-2"><a href="#" class="font-size-12 text-gray-5">Herramienta manual</a></div>
                                                <h5 class="product-item__title"><a href="#" class="text-blue font-weight-bold">Alem blister uduke juego x 10 pcs mm (llm010)(ht20248)</a></h5>
                                            </div>
                                            <div class="flex-center-between mb-3">
                                                <div class="prodcut-price d-flex align-items-center position-relative">
                                                    <ins class="font-size-20 text-red text-decoration-none">$5.000</ins>
                                                    <del class="font-size-12 tex-gray-6 position-absolute bottom-100">$8.000</del>
                                                </div>
                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                    <a href="#" class="btn-add-cart btn-primary transition-3d-hover"  data-toggle="modal" data-target="#ModalQuantity"><i class="ec ec-add-to-cart"></i></a>
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
                            </li>
                            <li class="col-md-4 product-item product-item__card pb-2 mb-2 pb-md-0 mb-md-0 border-bottom border-md-bottom-0">
                                <div class="product-item__outer h-100 w-100">
                                    <div class="product-item__inner p-md-3 row no-gutters">
                                        <div class="col col-lg-auto product-media-left">
                                            <a href="#" class="max-width-150 d-block"><img class="img-fluid" src="{{ asset('frontend/assets/images/productos/cerradura2.jpg') }}" alt="Image Description"></a>
                                        </div>
                                        <div class="col product-item__body pl-2 pl-lg-3 mr-xl-2 mr-wd-1">
                                            <div class="mb-4">
                                                <div class="mb-2"><a href="#" class="font-size-12 text-gray-5">Cerrajeria</a></div>
                                                <h5 class="product-item__title"><a href="#" class="text-blue font-weight-bold">Cerradura Sobre Poner Reja Beige Derecha Vera</a></h5>
                                            </div>
                                            <div class="flex-center-between mb-3">
                                                <div class="prodcut-price d-flex align-items-center position-relative">
                                                    <ins class="font-size-20 text-red text-decoration-none">$125.000</ins>
                                                    <del class="font-size-12 tex-gray-6 position-absolute bottom-100">$230.000</del>
                                                </div>
                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                    <a href="#" class="btn-add-cart btn-primary transition-3d-hover"  data-toggle="modal" data-target="#ModalQuantity"><i class="ec ec-add-to-cart"></i></a>
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
                            </li>
                            <li class="col-md-4 product-item product-item__card pb-2 mb-2 pb-md-0 mb-md-0 border-bottom border-md-bottom-0 remove-divider">
                                <div class="product-item__outer h-100 w-100">
                                    <div class="product-item__inner p-md-3 row no-gutters">
                                        <div class="col col-lg-auto product-media-left">
                                            <a href="#" class="max-width-150 d-block"><img class="img-fluid" src="{{ asset('frontend/assets/images/productos/base2.jpg') }}" alt="Image Description"></a>
                                        </div>
                                        <div class="col product-item__body pl-2 pl-lg-3 mr-xl-2 mr-wd-1">
                                            <div class="mb-4">
                                                <div class="mb-2"><a href="#" class="font-size-12 text-gray-5">Herramientas eléctricas</a></div>
                                                <h5 class="product-item__title"><a href="#" class="text-blue font-weight-bold">Llave para pulidora ht (HT90306)</a></h5>
                                            </div>
                                            <div class="flex-center-between mb-3">
                                                <div class="prodcut-price d-flex align-items-center position-relative">
                                                    <ins class="font-size-20 text-red text-decoration-none">$87.500</ins>
                                                    <del class="font-size-12 tex-gray-6 position-absolute bottom-100">$110.000</del>
                                                </div>
                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                    <a href="#" class="btn-add-cart btn-primary transition-3d-hover"  data-toggle="modal" data-target="#ModalQuantity"><i class="ec ec-add-to-cart"></i></a>
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
                            </li>
                        </ul>
                    </div>
                    <div class="js-slide">
                        <ul class="row list-unstyled products-group no-gutters mb-0 overflow-visible">
                            <li class="col-md-4 product-item product-item__card pb-2 mb-2 pb-md-0 mb-md-0 border-bottom border-md-bottom-0">
                                <div class="product-item__outer h-100 w-100">
                                    <div class="product-item__inner p-md-3 row no-gutters">
                                        <div class="col col-lg-auto product-media-left">
                                            <a href="#" class="max-width-150 d-block"><img class="img-fluid" src="{{ asset('frontend/assets/images/productos/aerografo.jpg') }}" alt="Image Description"></a>
                                        </div>
                                        <div class="col product-item__body pl-2 pl-lg-3 mr-xl-2 mr-wd-1">
                                            <div class="mb-4">
                                                <div class="mb-2"><a href="#" class="font-size-12 text-gray-5">Herramienta manual</a></div>
                                                <h5 class="product-item__title"><a href="#" class="text-blue font-weight-bold">Aerografo ranger/hopex alta f75 g (400 ml) f-75 g-40</a></h5>
                                            </div>
                                            <div class="flex-center-between mb-3">
                                                <div class="prodcut-price d-flex align-items-center position-relative">
                                                    <ins class="font-size-20 text-red text-decoration-none">$60.000</ins>
                                                    <del class="font-size-12 tex-gray-6 position-absolute bottom-100">$80.000</del>
                                                </div>
                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                    <a href="#" class="btn-add-cart btn-primary transition-3d-hover"  data-toggle="modal" data-target="#ModalQuantity"><i class="ec ec-add-to-cart"></i></a>
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
                            </li>
                            <li class="col-md-4 product-item product-item__card pb-2 mb-2 pb-md-0 mb-md-0 border-bottom border-md-bottom-0">
                                <div class="product-item__outer h-100 w-100">
                                    <div class="product-item__inner p-md-3 row no-gutters">
                                        <div class="col col-lg-auto product-media-left">
                                            <a href="#" class="max-width-150 d-block"><img class="img-fluid" src="{{ asset('frontend/assets/images/productos/cerradura.jpg') }}" alt="Image Description"></a>
                                        </div>
                                        <div class="col product-item__body pl-2 pl-lg-3 mr-xl-2 mr-wd-1">
                                            <div class="mb-4">
                                                <div class="mb-2"><a href="#" class="font-size-12 text-gray-5">Cerrajeria</a></div>
                                                <h5 class="product-item__title"><a href="#" class="text-blue font-weight-bold">Cerradura Sobre Poner Reja Beige Derecha Vera</a></h5>
                                            </div>
                                            <div class="flex-center-between mb-3">
                                                <div class="prodcut-price d-flex align-items-center position-relative">
                                                    <ins class="font-size-20 text-red text-decoration-none">$125.000</ins>
                                                    <del class="font-size-12 tex-gray-6 position-absolute bottom-100">$230.000</del>
                                                </div>
                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                    <a href="#" class="btn-add-cart btn-primary transition-3d-hover"  data-toggle="modal" data-target="#ModalQuantity"><i class="ec ec-add-to-cart"></i></a>
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
                            </li>
                            <li class="col-md-4 product-item product-item__card pb-2 mb-2 pb-md-0 mb-md-0 border-bottom border-md-bottom-0 remove-divider">
                                <div class="product-item__outer h-100 w-100">
                                    <div class="product-item__inner p-md-3 row no-gutters">
                                        <div class="col col-lg-auto product-media-left">
                                            <a href="#" class="max-width-150 d-block"><img class="img-fluid" src="{{ asset('frontend/assets/images/productos/base.jpg') }}" alt="Image Description"></a>
                                        </div>
                                        <div class="col product-item__body pl-2 pl-lg-3 mr-xl-2 mr-wd-1">
                                            <div class="mb-4">
                                                <div class="mb-2"><a href="#" class="font-size-12 text-gray-5">Herramientas eléctricas</a></div>
                                                <h5 class="product-item__title"><a href="#" class="text-blue font-weight-bold">Base para pulidora ht (HT90306)</a></h5>
                                            </div>
                                            <div class="flex-center-between mb-3">
                                                <div class="prodcut-price d-flex align-items-center position-relative">
                                                    <ins class="font-size-20 text-red text-decoration-none">$87.500</ins>
                                                    <del class="font-size-12 tex-gray-6 position-absolute bottom-100">$110.000</del>
                                                </div>
                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                    <a href="#" class="btn-add-cart btn-primary transition-3d-hover"  data-toggle="modal" data-target="#ModalQuantity"><i class="ec ec-add-to-cart"></i></a>
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
                            </li>
                        </ul>
                    </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="col-xl-9 col-wd-9gdot5">
                    <!-- Recommended Products -->
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
