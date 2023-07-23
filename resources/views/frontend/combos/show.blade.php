@extends('frontend.layouts.app')

@section('titulo', $combo->nombre)

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
                                @if ($combo->categoria->parent)
                                    @include('frontend.categorias.parcial.breadcrumb-li', ['categoria' => $combo->categoria->parent])
                                @endif
                                <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{ route('categorias.show', App\Models\Categoria::generarUrl($combo->categoria) ) }}">{{ $combo->categoria->nombre }}</a></li>
                                <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">{{ $combo->nombre }}</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- End breadcrumb -->
                </div>
            </div>
            <!-- End breadcrumb -->
            <div class="container">
                <!-- Single Product Body -->
                <div class="mb-xl-14 mb-6">
                    <div class="row">
                        <div class="col-md-5 mb-4 mb-md-0">
                            <div id="sliderSyncingNav" class="js-slick-carousel u-slick mb-2"
                                data-infinite="true"
                                data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic u-slick__arrow-centered--y rounded-circle"
                                data-arrow-left-classes="fas fa-arrow-left u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left ml-lg-2 ml-xl-4"
                                data-arrow-right-classes="fas fa-arrow-right u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right mr-lg-2 mr-xl-4"
                                data-nav-for="#sliderSyncingThumb">
                                <div class="js-slide">
                                    <img class="img-fluid" src="{{ asset('storage/imagenes_producto/700x700/'.$combo->imagen) }}" alt="Image Description">
                                </div>
                                @foreach ($combo->productos as $producto)
                                    <div class="js-slide">
                                        <img class="img-fluid" src="{{ asset('storage/imagenes_producto/700x700/'.$producto->imagen) }}" alt="Image Description">
                                    </div>
                                @endforeach
                            </div>

                            <div id="sliderSyncingThumb" class="js-slick-carousel u-slick u-slick--slider-syncing u-slick--slider-syncing-size u-slick--gutters-1 u-slick--transform-off"
                                data-infinite="true"
                                data-slides-show="5"
                                data-is-thumbs="true"
                                data-nav-for="#sliderSyncingNav">
                                <div class="js-slide" style="cursor: pointer;">
                                    <img class="img-fluid" src="{{ asset('storage/imagenes_producto/700x700/'.$combo->imagen) }}" alt="Image Description">
                                </div>
                                @foreach ($combo->productos as $producto)
                                    <div class="js-slide" style="cursor: pointer;">
                                        <img class="img-fluid" src="{{ asset('storage/imagenes_producto/700x700/'.$producto->imagen) }}" alt="Image Description">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-7 mb-md-6 mb-lg-0">
                            <div class="mb-2">
                                <div class="border-bottom mb-3 pb-md-1 pb-3">
                                    <a href="{{ route('categorias.show', App\Models\Categoria::generarUrl($combo->categoria) ) }}" class="font-size-12 text-gray-5 mb-2 d-inline-block">{{ $combo->categoria->nombre }}</a>
                                    <h2 class="font-size-25 text-lh-1dot2">{{ $combo->nombre }}</h2>
                                    <div class="mb-2">
                                        <a class="d-inline-flex align-items-center small font-size-15 text-lh-1" href="#">
                                            <div class="text-warning mr-2">
                                                <small class="fas fa-star"></small>
                                                <small class="fas fa-star"></small>
                                                <small class="fas fa-star"></small>
                                                <small class="fas fa-star"></small>
                                                <small class="far fa-star text-muted"></small>
                                            </div>
                                            <span class="text-secondary font-size-13">(3 opiniones)</span>
                                        </a>
                                    </div>
                                    <div class="d-md-flex align-items-center">
                                        {{-- <a href="#" class="max-width-150 ml-n2 mb-2 mb-md-0 d-block"><img class="img-fluid" src="assets/images/marcas/marca7.jpg" alt="Image Description"></a> --}}
                                        <div class="ml-md-3 text-gray-9 font-size-14">Disponibilidad: <span class="text-green font-weight-bold">26 en stock</span></div>
                                    </div>
                                </div>
                                <div class="flex-horizontal-center flex-wrap mb-4">
                                    {{-- @auth
                                        <a href="#" data-combo="0" data-id="{{$producto->id}}" id="anadir-favorito" class="text-gray-6 font-size-13"><i class="fas fa-heart" style="{{auth()->user()->productos->find($producto->id) ? 'color:red;' : '' }}"></i> Favoritos</a>
                                    @endauth
                                    @guest
                                        <a href="#" data-combo="0" data-id="{{$producto->id}}" id="anadir-favorito" class="text-gray-6 font-size-13"><i class="fas fa-heart"></i> Favoritos</a>
                                    @endguest --}}
                                    {{-- <a href="#" class="text-gray-6 font-size-13 mr-2"><i class="ec ec-favorites mr-1 font-size-15"></i> Favorito</a> --}}
                                </div>
                                <div class="mb-2 font-size-14 pl-3 ml-1 text-gray-110">
                                    {!! $combo->descripcion_corta !!}
                                </div>
                                <p><strong>SKU</strong>: {{ $combo->sku }}</p>


                                <div class="mb-4">
                                    <div class="d-flex align-items-baseline">
                                        @if ($combo->tieneDescuento())
                                            <ins class="font-size-36 text-decoration-none">${{ number_format($combo->menorPrecio(), 0, ',', '.')}}</ins>
                                            <del class="font-size-20 ml-2 text-gray-6">${{ number_format($combo->precio,0,'.','.')}}</del>
                                        @else
                                            <ins class="font-size-36 text-decoration-none">${{ number_format($combo->precio,0,'.','.')}}</ins>
                                        @endif
                                        {{-- <ins class="font-size-36 text-decoration-none">$119.900</ins>
                                        <del class="font-size-20 ml-2 text-gray-6">$139.900</del> --}}
                                    </div>
                                </div>

                                <!-- CONTENIDO COMBO -->

                                <div class="seccion-cont-combo py-3">
                                    <h3>CONTENIDO DEL COMBO: </h3>

                                    @foreach ($combo->productos as $producto)

                                        <div class="item-combo d-flex align-items-center border-bottom mb-4">
                                            <div class="img-prod-combo">
                                                <div class="product-thumbnail product-item__thumbnail">
                                                    <img class="img-fluid" src="{{ asset('storage/imagenes_producto/212x212/'.$producto->imagen) }}" alt="Image Description">
                                                </div>
                                            </div>
                                            <div class="inf-prod-combo">
                                                <h2><a href="{{ route('productos.show', $producto->slug) }}">{{ $producto->nombre}}</a></h2>
                                                <p class="font-size-14 pl-3 ml-1 text-gray-110">
                                                    {!! $producto->descripcion_corta !!}
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <!-- FIN CONTENIDO COMBO -->


                                <div class="d-md-flex align-items-end mb-3">
                                    <div class="max-width-150 mb-4 mb-md-0">
                                        <h6 class="font-size-14">Cantidad</h6>
                                        <!-- Quantity -->
                                        <div class="border rounded-pill py-2 px-3 border-color-1">
                                            <div class="js-quantity row align-items-center">
                                                <div class="col">
                                                    <input id="cantidad" class="js-result form-control h-auto border-0 rounded p-0 shadow-none" type="number" value="1" min="1" max="1">
                                                </div>
                                                {{-- <div class="col-auto pr-1">
                                                    <a class="js-minus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0" href="javascript:;">
                                                        <small class="fas fa-minus btn-icon__inner"></small>
                                                    </a>
                                                    <a class="js-plus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0" href="javascript:;">
                                                        <small class="fas fa-plus btn-icon__inner"></small>
                                                    </a>
                                                </div> --}}
                                            </div>
                                        </div>
                                        <!-- End Quantity -->
                                    </div>
                                    <div class="ml-md-3">
                                        <a id="boton-anadir" href="#" class="btn px-5 btn-primary-dark transition-3d-hover"><i class="ec ec-add-to-cart mr-2 font-size-20"></i> Añadir al carrito</a>
                                    </div>
                                </div>
                                <div  class="mt-3">
                                    <ul class="nav flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                                        <li class="nav-item text-gray-111 flex-shrink-0 flex-xl-shrink-1"><strong>SKU:</strong> <span class="sku">{{ $combo->sku }}</span></li>
                                        <li class="nav-item text-gray-111 mx-3 flex-shrink-0 flex-xl-shrink-1">/</li>
                                        <li class="nav-item text-gray-111 flex-shrink-0 flex-xl-shrink-1"><strong>Categoría:</strong> <a href="{{ route('categorias.show', App\Models\Categoria::generarUrl($combo->categoria) ) }}" class="text-blue">{{ $combo->categoria->nombre }}</a></li>
                                        <li class="nav-item text-gray-111 mx-3 flex-shrink-0 flex-xl-shrink-1">/</li>
                                        <li class="nav-item text-gray-111 flex-shrink-0 flex-xl-shrink-1"><strong>Etiquetas:</strong>
                                            @foreach ($combo->etiquetas as $etiqueta)
                                                @if ($loop->last)
                                                    <a href="{{ route('etiquetas.show', $etiqueta->slug) }}" class="text-blue">{{$etiqueta->nombre}}</a>.
                                                @else
                                                    <a href="{{ route('etiquetas.show', $etiqueta->slug) }}" class="text-blue">{{$etiqueta->nombre}}</a>,
                                                @endif
                                            @endforeach
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Product Body -->
                <!-- Single Product Tab -->
                <div class="mb-8">
                    <div class="position-relative position-md-static px-md-6">
                        <ul class="nav nav-classic nav-tab nav-tab-lg justify-content-xl-center flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble border-0 pb-1 pb-xl-0 mb-n1 mb-xl-0" id="pills-tab-8" role="tablist">
                            <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                                <a class="nav-link active" id="Jpills-two-example1-tab" data-toggle="pill" href="#Jpills-two-example1" role="tab" aria-controls="Jpills-two-example1" aria-selected="true">Descripción</a>
                            </li>
                            <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                                <a class="nav-link" id="Jpills-three-example1-tab" data-toggle="pill" href="#Jpills-three-example1" role="tab" aria-controls="Jpills-three-example1" aria-selected="false">Especificaciones</a>
                            </li>
                            <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                                <a class="nav-link" id="Jpills-four-example1-tab" data-toggle="pill" href="#Jpills-four-example1" role="tab" aria-controls="Jpills-four-example1" aria-selected="false">Opiniones</a>
                            </li>
                        </ul>
                    </div>
                    <!-- Tab Content -->
                    <div class="borders-radius-17 border p-4 mt-4 mt-md-0 px-lg-10 py-lg-9">
                        <div class="tab-content" id="Jpills-tabContent">
                            <div class="tab-pane fade active show" id="Jpills-two-example1" role="tabpanel" aria-labelledby="Jpills-two-example1-tab">
                                <h3 class="font-size-24 mb-3">Trabajo de precisión</h3>
                                <p>Praesent ornare, ex a interdum consectetur, lectus diam sodales elit, vitae egestas est enim ornare nisl. Nullam in lectus nec sem semper viverra. In lobortis egestas massa. Nam nec massa nisi. Suspendisse potenti. Quisque suscipit vulputate dui quis volutpat. Ut id elit facilisis, feugiat est in, tempus lacus. Ut ultrices dictum metus, a ultricies ex vulputate ac. Ut id cursus tellus, non tempor quam. Morbi porta diam nisi, id finibus nunc tincidunt eu.</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="pt-lg-8 pt-xl-10">
                                            <h3 class="font-size-24 mb-3">Motor</h3>
                                            <p class="mb-6">Fusce vitae nibh mi. Integer posuere, libero et ullamcorper facilisis, enim eros tincidunt orci, eget vestibulum sapien nisi ut leo. Cras finibus vel est ut mollis. Donec luctus condimentum ante et euismod.</p>
                                            <h3 class="font-size-24 mb-3">Potencia</h3>
                                            <p class="mb-6">Integer bibendum aliquet ipsum, in ultrices enim sodales sed. Quisque ut urna vitae lacus laoreet malesuada eu at massa. Pellentesque nibh augue, pellentesque nec dictum vel, pretium a arcu. Duis eu urna suscipit, lobortis elit quis, ullamcorper massa.</p>
                                            <h3 class="font-size-24 mb-3">Calidad</h3>
                                            <p class="mb-6">Cras rutrum, nibh a sodales accumsan, elit sapien ultrices sapien, eget semper lectus ex congue elit. Nullam dui elit, fermentum a varius at, iaculis non dolor. In hac habitasse platea dictumst.</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <img class="img-fluid mr-n4 mr-lg-n10" src="assets/images/producto/taladro3.jpg" alt="Image Description">
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <img class="img-fluid ml-n4 ml-lg-n10" src="assets/images/producto/sierra1.jpg" alt="Image Description">
                                    </div>
                                    <div class="col-md-6 align-self-center">
                                        <div class="pt-lg-8 pt-xl-10 text-right">
                                            <h3 class="font-size-24 mb-3">Consumo mínimo</h3>
                                            <p class="mb-6">Fusce vitae nibh mi. Integer posuere, libero et ullamcorper facilisis, enim eros tincidunt orci, eget vestibulum sapien nisi ut leo. Cras finibus vel est ut mollis. Donec luctus condimentum ante et euismod.</p>
                                            <h3 class="font-size-24 mb-3">Garantía</h3>
                                            <p class="mb-6">Integer bibendum aliquet ipsum, in ultrices enim sodales sed. Quisque ut urna vitae lacus laoreet malesuada eu at massa. Pellentesque nibh augue, pellentesque nec dictum vel, pretium a arcu. Duis eu urna suscipit, lobortis elit quis, ullamcorper massa.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="Jpills-three-example1" role="tabpanel" aria-labelledby="Jpills-three-example1-tab">
                                <div class="mx-md-5 pt-1">
                                    <div class="table-responsive mb-4">
                                        <table class="table table-hover">
                                            <tbody>
                                                <tr>
                                                    <th class="px-4 px-xl-5 border-top-0">Peso</th>
                                                    <td class="border-top-0">7.25kg</td>
                                                </tr>
                                                <tr>
                                                    <th class="px-4 px-xl-5">Dimensiones</th>
                                                    <td>90 x 60 x 90 cm</td>
                                                </tr>
                                                <tr>
                                                    <th class="px-4 px-xl-5">Tamaño</th>
                                                    <td>One Size Fits all</td>
                                                </tr>
                                                <tr>
                                                    <th class="px-4 px-xl-5">Color</th>
                                                    <td>Black with Red, White with Gold</td>
                                                </tr>
                                                <tr>
                                                    <th class="px-4 px-xl-5">Garantía</th>
                                                    <td>5 years</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="Jpills-four-example1" role="tabpanel" aria-labelledby="Jpills-four-example1-tab">
                                <div class="row mb-8">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <h3 class="font-size-18 mb-6">Basado en 3 opiniones</h3>
                                            <h2 class="font-size-30 font-weight-bold text-lh-1 mb-0">4.3</h2>
                                            <div class="text-lh-1">en general</div>
                                        </div>

                                        <!-- Ratings -->
                                        <ul class="list-unstyled">
                                            <li class="py-1">
                                                <a class="row align-items-center mx-gutters-2 font-size-1" href="javascript:;">
                                                    <div class="col-auto mb-2 mb-md-0">
                                                        <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                                            <small class="fas fa-star"></small>
                                                            <small class="fas fa-star"></small>
                                                            <small class="fas fa-star"></small>
                                                            <small class="fas fa-star"></small>
                                                            <small class="far fa-star text-muted"></small>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto mb-2 mb-md-0">
                                                        <div class="progress ml-xl-5" style="height: 10px; width: 200px;">
                                                            <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto text-right">
                                                        <span class="text-gray-90">205</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="py-1">
                                                <a class="row align-items-center mx-gutters-2 font-size-1" href="javascript:;">
                                                    <div class="col-auto mb-2 mb-md-0">
                                                        <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                                            <small class="fas fa-star"></small>
                                                            <small class="fas fa-star"></small>
                                                            <small class="fas fa-star"></small>
                                                            <small class="far fa-star text-muted"></small>
                                                            <small class="far fa-star text-muted"></small>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto mb-2 mb-md-0">
                                                        <div class="progress ml-xl-5" style="height: 10px; width: 200px;">
                                                            <div class="progress-bar" role="progressbar" style="width: 53%;" aria-valuenow="53" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto text-right">
                                                        <span class="text-gray-90">55</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="py-1">
                                                <a class="row align-items-center mx-gutters-2 font-size-1" href="javascript:;">
                                                    <div class="col-auto mb-2 mb-md-0">
                                                        <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                                            <small class="fas fa-star"></small>
                                                            <small class="fas fa-star"></small>
                                                            <small class="far fa-star text-muted"></small>
                                                            <small class="far fa-star text-muted"></small>
                                                            <small class="far fa-star text-muted"></small>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto mb-2 mb-md-0">
                                                        <div class="progress ml-xl-5" style="height: 10px; width: 200px;">
                                                            <div class="progress-bar" role="progressbar" style="width: 20%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto text-right">
                                                        <span class="text-gray-90">23</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="py-1">
                                                <a class="row align-items-center mx-gutters-2 font-size-1" href="javascript:;">
                                                    <div class="col-auto mb-2 mb-md-0">
                                                        <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                                            <small class="fas fa-star"></small>
                                                            <small class="far fa-star text-muted"></small>
                                                            <small class="far fa-star text-muted"></small>
                                                            <small class="far fa-star text-muted"></small>
                                                            <small class="far fa-star text-muted"></small>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto mb-2 mb-md-0">
                                                        <div class="progress ml-xl-5" style="height: 10px; width: 200px;">
                                                            <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto text-right">
                                                        <span class="text-muted">0</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="py-1">
                                                <a class="row align-items-center mx-gutters-2 font-size-1" href="javascript:;">
                                                    <div class="col-auto mb-2 mb-md-0">
                                                        <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                                            <small class="fas fa-star"></small>
                                                            <small class="far fa-star text-muted"></small>
                                                            <small class="far fa-star text-muted"></small>
                                                            <small class="far fa-star text-muted"></small>
                                                            <small class="far fa-star text-muted"></small>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto mb-2 mb-md-0">
                                                        <div class="progress ml-xl-5" style="height: 10px; width: 200px;">
                                                            <div class="progress-bar" role="progressbar" style="width: 1%;" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto text-right">
                                                        <span class="text-gray-90">4</span>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                        <!-- End Ratings -->
                                    </div>
                                    <div class="col-md-6">
                                        <h3 class="font-size-18 mb-5">Agregar opinión</h3>
                                        <!-- Form -->
                                        <form class="js-validate">
                                            <div class="row align-items-center mb-4">
                                                <div class="col-md-4 col-lg-3">
                                                    <label for="rating" class="form-label mb-0">Tu calificación</label>
                                                </div>
                                                <div class="col-md-8 col-lg-9">
                                                    <a href="#" class="d-block">
                                                        <div class="text-warning text-ls-n2 font-size-16">
                                                            <small class="far fa-star text-muted"></small>
                                                            <small class="far fa-star text-muted"></small>
                                                            <small class="far fa-star text-muted"></small>
                                                            <small class="far fa-star text-muted"></small>
                                                            <small class="far fa-star text-muted"></small>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="js-form-message form-group mb-3 row">
                                                <div class="col-md-4 col-lg-3">
                                                    <label for="descriptionTextarea" class="form-label">Tu comentario</label>
                                                </div>
                                                <div class="col-md-8 col-lg-9">
                                                    <textarea class="form-control" rows="3" id="descriptionTextarea"
                                                    data-msg="Please enter your message."
                                                    data-error-class="u-has-error"
                                                    data-success-class="u-has-success"></textarea>
                                                </div>
                                            </div>
                                            <div class="js-form-message form-group mb-3 row">
                                                <div class="col-md-4 col-lg-3">
                                                    <label for="inputName" class="form-label">Nombre <span class="text-danger">*</span></label>
                                                </div>
                                                <div class="col-md-8 col-lg-9">
                                                    <input type="text" class="form-control" name="name" id="inputName" aria-label="Alex Hecker" required
                                                    data-msg="Please enter your name."
                                                    data-error-class="u-has-error"
                                                    data-success-class="u-has-success">
                                                </div>
                                            </div>
                                            <div class="js-form-message form-group mb-3 row">
                                                <div class="col-md-4 col-lg-3">
                                                    <label for="emailAddress" class="form-label">Email <span class="text-danger">*</span></label>
                                                </div>
                                                <div class="col-md-8 col-lg-9">
                                                    <input type="email" class="form-control" name="emailAddress" id="emailAddress" aria-label="email@email.com" required
                                                    data-msg="Please enter a valid email address."
                                                    data-error-class="u-has-error"
                                                    data-success-class="u-has-success">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="offset-md-4 offset-lg-3 col-auto">
                                                    <button type="submit" class="btn btn-primary-dark btn-wide transition-3d-hover">Enviar</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- End Form -->
                                    </div>
                                </div>
                                <!-- Review -->
                                <div class="border-bottom border-color-1 pb-4 mb-4">
                                    <!-- Review Rating -->
                                    <div class="d-flex justify-content-between align-items-center text-secondary font-size-1 mb-2">
                                        <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="far fa-star text-muted"></small>
                                            <small class="far fa-star text-muted"></small>
                                        </div>
                                    </div>
                                    <!-- End Review Rating -->

                                    <p class="text-gray-90">Fusce vitae nibh mi. Integer posuere, libero et ullamcorper facilisis, enim eros tincidunt orci, eget vestibulum sapien nisi ut leo. Cras finibus vel est ut mollis. Donec luctus condimentum ante et euismod.</p>

                                    <!-- Reviewer -->
                                    <div class="mb-2">
                                        <strong>John Trujillo</strong>
                                        <span class="font-size-13 text-gray-23">- Septiembre 9, 2021</span>
                                    </div>
                                    <!-- End Reviewer -->
                                </div>
                                <!-- End Review -->
                                <!-- Review -->
                                <div class="border-bottom border-color-1 pb-4 mb-4">
                                    <!-- Review Rating -->
                                    <div class="d-flex justify-content-between align-items-center text-secondary font-size-1 mb-2">
                                        <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                        </div>
                                    </div>
                                    <!-- End Review Rating -->

                                    <p class="text-gray-90">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Suspendisse eget facilisis odio. Duis sodales augue eu tincidunt faucibus. Etiam justo ligula, placerat ac augue id, volutpat porta dui.</p>

                                    <!-- Reviewer -->
                                    <div class="mb-2">
                                        <strong>Ana Lorena</strong>
                                        <span class="font-size-13 text-gray-23">- Agosto 3, 2021</span>
                                    </div>
                                    <!-- End Reviewer -->
                                </div>
                                <!-- End Review -->
                                <!-- Review -->
                                <div class="pb-4">
                                    <!-- Review Rating -->
                                    <div class="d-flex justify-content-between align-items-center text-secondary font-size-1 mb-2">
                                        <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="far fa-star text-muted"></small>
                                        </div>
                                    </div>
                                    <!-- End Review Rating -->

                                    <p class="text-gray-90">Sed id tincidunt sapien. Pellentesque cursus accumsan tellus, nec ultricies nulla sollicitudin eget. Donec feugiat orci vestibulum porttitor sagittis.</p>

                                    <!-- Reviewer -->
                                    <div class="mb-2">
                                        <strong>Pedro Wegner</strong>
                                        <span class="font-size-13 text-gray-23">- Junio 13, 2021</span>
                                    </div>
                                    <!-- End Reviewer -->
                                </div>
                                <!-- End Review -->
                            </div>
                        </div>
                    </div>
                    <!-- End Tab Content -->
                </div>
                <!-- End Single Product Tab -->
                <!-- Related products -->
                <div class="mb-6">
                    <div class="d-flex justify-content-between align-items-center border-bottom border-color-1 flex-lg-nowrap flex-wrap mb-4">
                        <h3 class="section-title mb-0 pb-2 font-size-22">Productos relacionados</h3>
                    </div>
                    <ul class="row list-unstyled products-group no-gutters">
                        <li class="col-6 col-md-4 col-xl product-item">
                            <div class="product-item__outer h-100 w-100">
                                <div class="product-item__inner px-xl-4 p-3">
                                    <div class="product-item__body pb-xl-2">
                                        <div class="mb-2">
                                            <a href="#" class="d-block text-center"><img class="img-fluid" src="assets/images/productos/sierra.jpg" alt="Image Description"></a>
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
                                            <a href="#" class="d-block text-center"><img class="img-fluid" src="assets/images/productos/carretilla2.jpg" alt="Image Description"></a>
                                        </div>
                                        <div class="mb-2"><a href="#" class="font-size-12 text-gray-5">Construcción</a></div>
                                        <h5 class="mb-4 product-item__title"><a href="#" class="text-blue font-weight-bold">Carretilla Tolva Metalica Llanta Antipinchazo</a></h5>
                                        <div class="flex-center-between mb-1">
                                            <div class="prodcut-price d-flex align-items-center position-relative">
                                                <ins class="font-size-20 text-red text-decoration-none">$230.000</ins>
                                                <del class="font-size-12 tex-gray-6 position-absolute bottom-100">$245.800</del>
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
                        <li class="col-6 col-md-4 col-xl product-item remove-divider-md-lg">
                            <div class="product-item__outer h-100 w-100">
                                <div class="product-item__inner px-xl-4 p-3">
                                    <div class="product-item__body pb-xl-2">
                                        <div class="mb-2">
                                            <a href="#" class="d-block text-center"><img class="img-fluid" src="assets/images/productos/taladro.jpg" alt="Image Description"></a>
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
                                            <a href="#" class="d-block text-center"><img class="img-fluid" src="assets/images/productos/ducha.jpg" alt="Image Description"></a>
                                        </div>
                                        <div class="mb-2"><a href="#" class="font-size-12 text-gray-5">Grifería</a></div>
                                        <h5 class="mb-4 product-item__title"><a href="#" class="text-blue font-weight-bold">Ducha Electrica Dirigible 1 Temperatura 220v K-003</a></h5>
                                        <div class="flex-center-between mb-1">
                                            <div class="prodcut-price">
                                                <div class="text-gray-100">$98.000</div>
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
                        <li class="col-6 col-md-4 col-xl product-item d-xl-none d-wd-block">
                            <div class="product-item__outer h-100 w-100">
                                <div class="product-item__inner px-xl-4 p-3">
                                    <div class="product-item__body pb-xl-2">
                                        <div class="mb-2">
                                            <a href="#" class="d-block text-center"><img class="img-fluid" src="assets/images/productos/base.jpg" alt="Image Description"></a>
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
                                            <a href="#" class="d-block text-center"><img class="img-fluid" src="assets/images/productos/carretilla2.jpg" alt="Image Description"></a>
                                        </div>
                                        <div class="mb-2"><a href="#" class="font-size-12 text-gray-5">Construcción</a></div>
                                        <h5 class="mb-4 product-item__title"><a href="#" class="text-blue font-weight-bold">Carretilla Tolva Metalica Llanta Antipinchazo</a></h5>
                                        <div class="flex-center-between mb-1">
                                            <div class="prodcut-price d-flex align-items-center position-relative">
                                                <ins class="font-size-20 text-red text-decoration-none">$230.000</ins>
                                                <del class="font-size-12 tex-gray-6 position-absolute bottom-100">$281.200</del>
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
                    </ul>
                </div>
                <!-- End Related products -->
                <!-- Brand Carousel -->
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
                                    <img class="img-fluid m-auto max-height-50" src="assets/images/marcas/marca1.jpg" alt="Image Description">
                                </a>
                            </div>
                            <div class="js-slide">
                                <a href="#" class="link-hover__brand">
                                    <img class="img-fluid m-auto max-height-50" src="assets/images/marcas/marca2.jpg" alt="Image Description">
                                </a>
                            </div>
                            <div class="js-slide">
                                <a href="#" class="link-hover__brand">
                                    <img class="img-fluid m-auto max-height-50" src="assets/images/marcas/marca3.jpg" alt="Image Description">
                                </a>
                            </div>
                            <div class="js-slide">
                                <a href="#" class="link-hover__brand">
                                    <img class="img-fluid m-auto max-height-50" src="assets/images/marcas/marca4.jpg" alt="Image Description">
                                </a>
                            </div>
                            <div class="js-slide">
                                <a href="#" class="link-hover__brand">
                                    <img class="img-fluid m-auto max-height-50" src="assets/images/marcas/marca5.jpg" alt="Image Description">
                                </a>
                            </div>
                            <div class="js-slide">
                                <a href="#" class="link-hover__brand">
                                    <img class="img-fluid m-auto max-height-50" src="assets/images/marcas/marca6.jpg" alt="Image Description">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Brand Carousel -->
            </div>
        </main>
</div>
<!-- End Single Product Body -->
<!-- Single Product Tab -->
<div class="mb-8">
    <div class="position-relative position-md-static px-md-6">
        <ul class="nav nav-classic nav-tab nav-tab-lg justify-content-xl-center flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble border-0 pb-1 pb-xl-0 mb-n1 mb-xl-0" id="pills-tab-8" role="tablist">
            <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                <a class="nav-link active" id="descripcion-tab" data-toggle="pill" href="#descripcion" role="tab" aria-controls="descripcion" aria-selected="true">Descripción</a>
            </li>
            <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                <a class="nav-link" id="especificaciones-tab" data-toggle="pill" href="#especificaciones" role="tab" aria-controls="especificaciones" aria-selected="false">Especificaciones</a>
            </li>
            <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                <a class="nav-link" id="opiniones-tab" data-toggle="pill" href="#opiniones" role="tab" aria-controls="opiniones" aria-selected="false">Opiniones</a>
            </li>
        </ul>
    </div>
    <!-- Tab Content -->
    <div class="borders-radius-17 border p-4 mt-4 mt-md-0 px-lg-10 py-lg-9">
        <div class="tab-content" id="Jpills-tabContent">
            <div class="tab-pane fade active show" id="descripcion" role="tabpanel" aria-labelledby="descripcion-tab">
                {!! $combo->descripcion!!}

                <table class="table">
                    <tr>
                        <th>SKU</th>
                        <th>Productos</th>
                        <th>Precio</th>
                    </tr>
                    @foreach ($combo->productos as $producto)
                        <tr>
                            <td> {{$producto->sku}} </td>
                            <td> {{$producto->nombre}} </td>
                            <td> ${{ number_format($producto->menorPrecio(),0,'.','.')}} </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="tab-pane fade" id="especificaciones" role="tabpanel" aria-labelledby="especificaciones-tab">
                <div class="mx-md-5 pt-1">
                    <div class="table-responsive mb-4">
                        <table class="table table-hover">
                            <tbody>
                                {{-- <tr>
                                    <th class="px-4 px-xl-5 border-top-0">Peso</th>
                                    <td class="border-top-0">{{$producto->peso}}</td>
                                </tr>
                                <tr>
                                    <th class="px-4 px-xl-5">Dimensiones</th>
                                    <td>{{$producto->ancho}} x {{$producto->alto}} x {{$producto->largo}} cm</td>
                                </tr> --}}
                                {{-- <tr>
                                    <th class="px-4 px-xl-5">Tamaño</th>
                                    <td>One Size Fits all</td>
                                </tr> --}}
                            </tbody>
                        </table>
                    </div>
                </div>
                {!! $producto->especificaciones !!}
            </div>
            <div class="tab-pane fade" id="opiniones" role="tabpanel" aria-labelledby="opiniones-tab">
                <div class="row mb-8">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <h3 class="font-size-18 mb-6">Basado en 3 opiniones</h3>
                            <h2 class="font-size-30 font-weight-bold text-lh-1 mb-0">4.3</h2>
                            <div class="text-lh-1">en general</div>
                        </div>

                        <!-- Ratings -->
                        <ul class="list-unstyled">
                            <li class="py-1">
                                <a class="row align-items-center mx-gutters-2 font-size-1" href="javascript:;">
                                    <div class="col-auto mb-2 mb-md-0">
                                        <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="far fa-star text-muted"></small>
                                        </div>
                                    </div>
                                    <div class="col-auto mb-2 mb-md-0">
                                        <div class="progress ml-xl-5" style="height: 10px; width: 200px;">
                                            <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-auto text-right">
                                        <span class="text-gray-90">205</span>
                                    </div>
                                </a>
                            </li>
                            <li class="py-1">
                                <a class="row align-items-center mx-gutters-2 font-size-1" href="javascript:;">
                                    <div class="col-auto mb-2 mb-md-0">
                                        <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="far fa-star text-muted"></small>
                                            <small class="far fa-star text-muted"></small>
                                        </div>
                                    </div>
                                    <div class="col-auto mb-2 mb-md-0">
                                        <div class="progress ml-xl-5" style="height: 10px; width: 200px;">
                                            <div class="progress-bar" role="progressbar" style="width: 53%;" aria-valuenow="53" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-auto text-right">
                                        <span class="text-gray-90">55</span>
                                    </div>
                                </a>
                            </li>
                            <li class="py-1">
                                <a class="row align-items-center mx-gutters-2 font-size-1" href="javascript:;">
                                    <div class="col-auto mb-2 mb-md-0">
                                        <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="far fa-star text-muted"></small>
                                            <small class="far fa-star text-muted"></small>
                                            <small class="far fa-star text-muted"></small>
                                        </div>
                                    </div>
                                    <div class="col-auto mb-2 mb-md-0">
                                        <div class="progress ml-xl-5" style="height: 10px; width: 200px;">
                                            <div class="progress-bar" role="progressbar" style="width: 20%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-auto text-right">
                                        <span class="text-gray-90">23</span>
                                    </div>
                                </a>
                            </li>
                            <li class="py-1">
                                <a class="row align-items-center mx-gutters-2 font-size-1" href="javascript:;">
                                    <div class="col-auto mb-2 mb-md-0">
                                        <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                            <small class="fas fa-star"></small>
                                            <small class="far fa-star text-muted"></small>
                                            <small class="far fa-star text-muted"></small>
                                            <small class="far fa-star text-muted"></small>
                                            <small class="far fa-star text-muted"></small>
                                        </div>
                                    </div>
                                    <div class="col-auto mb-2 mb-md-0">
                                        <div class="progress ml-xl-5" style="height: 10px; width: 200px;">
                                            <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-auto text-right">
                                        <span class="text-muted">0</span>
                                    </div>
                                </a>
                            </li>
                            <li class="py-1">
                                <a class="row align-items-center mx-gutters-2 font-size-1" href="javascript:;">
                                    <div class="col-auto mb-2 mb-md-0">
                                        <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                            <small class="fas fa-star"></small>
                                            <small class="far fa-star text-muted"></small>
                                            <small class="far fa-star text-muted"></small>
                                            <small class="far fa-star text-muted"></small>
                                            <small class="far fa-star text-muted"></small>
                                        </div>
                                    </div>
                                    <div class="col-auto mb-2 mb-md-0">
                                        <div class="progress ml-xl-5" style="height: 10px; width: 200px;">
                                            <div class="progress-bar" role="progressbar" style="width: 1%;" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-auto text-right">
                                        <span class="text-gray-90">4</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <!-- End Ratings -->
                    </div>
                    <div class="col-md-6">
                        <h3 class="font-size-18 mb-5">Agregar opinión</h3>
                        <!-- Form -->
                        <form class="js-validate">
                            <div class="row align-items-center mb-4">
                                <div class="col-md-4 col-lg-3">
                                    <label for="rating" class="form-label mb-0">Tu calificación</label>
                                </div>
                                <div class="col-md-8 col-lg-9">
                                    <a href="#" class="d-block">
                                        <div class="text-warning text-ls-n2 font-size-16">
                                            <small class="far fa-star text-muted"></small>
                                            <small class="far fa-star text-muted"></small>
                                            <small class="far fa-star text-muted"></small>
                                            <small class="far fa-star text-muted"></small>
                                            <small class="far fa-star text-muted"></small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="js-form-message form-group mb-3 row">
                                <div class="col-md-4 col-lg-3">
                                    <label for="descriptionTextarea" class="form-label">Tu comentario</label>
                                </div>
                                <div class="col-md-8 col-lg-9">
                                    <textarea class="form-control" rows="3" id="descriptionTextarea"
                                    data-msg="Please enter your message."
                                    data-error-class="u-has-error"
                                    data-success-class="u-has-success"></textarea>
                                </div>
                            </div>
                            <div class="js-form-message form-group mb-3 row">
                                <div class="col-md-4 col-lg-3">
                                    <label for="inputName" class="form-label">Nombre <span class="text-danger">*</span></label>
                                </div>
                                <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control" name="name" id="inputName" aria-label="Alex Hecker" required
                                    data-msg="Please enter your name."
                                    data-error-class="u-has-error"
                                    data-success-class="u-has-success">
                                </div>
                            </div>
                            <div class="js-form-message form-group mb-3 row">
                                <div class="col-md-4 col-lg-3">
                                    <label for="emailAddress" class="form-label">Email <span class="text-danger">*</span></label>
                                </div>
                                <div class="col-md-8 col-lg-9">
                                    <input type="email" class="form-control" name="emailAddress" id="emailAddress" aria-label="email@email.com" required
                                    data-msg="Please enter a valid email address."
                                    data-error-class="u-has-error"
                                    data-success-class="u-has-success">
                                </div>
                            </div>
                            <div class="row">
                                <div class="offset-md-4 offset-lg-3 col-auto">
                                    <button type="submit" class="btn btn-primary-dark btn-wide transition-3d-hover">Enviar</button>
                                </div>
                            </div>
                        </form>
                        <!-- End Form -->
                    </div>
                </div>
                <!-- Review -->
                <div class="border-bottom border-color-1 pb-4 mb-4">
                    <!-- Review Rating -->
                    <div class="d-flex justify-content-between align-items-center text-secondary font-size-1 mb-2">
                        <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="far fa-star text-muted"></small>
                            <small class="far fa-star text-muted"></small>
                        </div>
                    </div>
                    <!-- End Review Rating -->

                    <p class="text-gray-90">Fusce vitae nibh mi. Integer posuere, libero et ullamcorper facilisis, enim eros tincidunt orci, eget vestibulum sapien nisi ut leo. Cras finibus vel est ut mollis. Donec luctus condimentum ante et euismod.</p>

                    <!-- Reviewer -->
                    <div class="mb-2">
                        <strong>John Trujillo</strong>
                        <span class="font-size-13 text-gray-23">- Septiembre 9, 2021</span>
                    </div>
                    <!-- End Reviewer -->
                </div>
                <!-- End Review -->
                <!-- Review -->
                <div class="border-bottom border-color-1 pb-4 mb-4">
                    <!-- Review Rating -->
                    <div class="d-flex justify-content-between align-items-center text-secondary font-size-1 mb-2">
                        <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                        </div>
                    </div>
                    <!-- End Review Rating -->

                    <p class="text-gray-90">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Suspendisse eget facilisis odio. Duis sodales augue eu tincidunt faucibus. Etiam justo ligula, placerat ac augue id, volutpat porta dui.</p>

                    <!-- Reviewer -->
                    <div class="mb-2">
                        <strong>Ana Lorena</strong>
                        <span class="font-size-13 text-gray-23">- Agosto 3, 2021</span>
                    </div>
                    <!-- End Reviewer -->
                </div>
                <!-- End Review -->
                <!-- Review -->
                <div class="pb-4">
                    <!-- Review Rating -->
                    <div class="d-flex justify-content-between align-items-center text-secondary font-size-1 mb-2">
                        <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="far fa-star text-muted"></small>
                        </div>
                    </div>
                    <!-- End Review Rating -->

                    <p class="text-gray-90">Sed id tincidunt sapien. Pellentesque cursus accumsan tellus, nec ultricies nulla sollicitudin eget. Donec feugiat orci vestibulum porttitor sagittis.</p>

                    <!-- Reviewer -->
                    <div class="mb-2">
                        <strong>Pedro Wegner</strong>
                        <span class="font-size-13 text-gray-23">- Junio 13, 2021</span>
                    </div>
                    <!-- End Reviewer -->
                </div>
                <!-- End Review -->
            </div>
        </div>
    </div>
    <!-- End Tab Content -->
</div>
<!-- End Single Product Tab -->
<!-- Related products -->
<div class="mb-6">
    <div class="d-flex justify-content-between align-items-center border-bottom border-color-1 flex-lg-nowrap flex-wrap mb-4">
        <h3 class="section-title mb-0 pb-2 font-size-22">Productos relacionados</h3>
    </div>
    <ul class="row list-unstyled products-group no-gutters">
        @for ($i=0; $i < 6; $i++)
            <li class="col-6 col-md-4 col-xl product-item">
                <div class="product-item__outer h-100 w-100">
                    <div class="product-item__inner px-xl-4 p-3">
                        <div class="product-item__body pb-xl-2">
                            <div class="mb-2">
                                <a href="#" class="d-block text-center"><img class="img-fluid" src="assets/images/productos/sierra.jpg" alt="Image Description"></a>
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
        @endfor
        {{-- <li class="col-6 col-md-4 col-xl product-item">
            <div class="product-item__outer h-100 w-100">
                <div class="product-item__inner px-xl-4 p-3">
                    <div class="product-item__body pb-xl-2">
                        <div class="mb-2">
                            <a href="#" class="d-block text-center"><img class="img-fluid" src="assets/images/productos/carretilla2.jpg" alt="Image Description"></a>
                        </div>
                        <div class="mb-2"><a href="#" class="font-size-12 text-gray-5">Construcción</a></div>
                        <h5 class="mb-4 product-item__title"><a href="#" class="text-blue font-weight-bold">Carretilla Tolva Metalica Llanta Antipinchazo</a></h5>
                        <div class="flex-center-between mb-1">
                            <div class="prodcut-price d-flex align-items-center position-relative">
                                <ins class="font-size-20 text-red text-decoration-none">$230.000</ins>
                                <del class="font-size-12 tex-gray-6 position-absolute bottom-100">$245.800</del>
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
        <li class="col-6 col-md-4 col-xl product-item remove-divider-md-lg">
            <div class="product-item__outer h-100 w-100">
                <div class="product-item__inner px-xl-4 p-3">
                    <div class="product-item__body pb-xl-2">
                        <div class="mb-2">
                            <a href="#" class="d-block text-center"><img class="img-fluid" src="assets/images/productos/taladro.jpg" alt="Image Description"></a>
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
                            <a href="#" class="d-block text-center"><img class="img-fluid" src="assets/images/productos/ducha.jpg" alt="Image Description"></a>
                        </div>
                        <div class="mb-2"><a href="#" class="font-size-12 text-gray-5">Grifería</a></div>
                        <h5 class="mb-4 product-item__title"><a href="#" class="text-blue font-weight-bold">Ducha Electrica Dirigible 1 Temperatura 220v K-003</a></h5>
                        <div class="flex-center-between mb-1">
                            <div class="prodcut-price">
                                <div class="text-gray-100">$98.000</div>
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
        <li class="col-6 col-md-4 col-xl product-item d-xl-none d-wd-block">
            <div class="product-item__outer h-100 w-100">
                <div class="product-item__inner px-xl-4 p-3">
                    <div class="product-item__body pb-xl-2">
                        <div class="mb-2">
                            <a href="#" class="d-block text-center"><img class="img-fluid" src="assets/images/productos/base.jpg" alt="Image Description"></a>
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
                            <a href="#" class="d-block text-center"><img class="img-fluid" src="assets/images/productos/carretilla2.jpg" alt="Image Description"></a>
                        </div>
                        <div class="mb-2"><a href="#" class="font-size-12 text-gray-5">Construcción</a></div>
                        <h5 class="mb-4 product-item__title"><a href="#" class="text-blue font-weight-bold">Carretilla Tolva Metalica Llanta Antipinchazo</a></h5>
                        <div class="flex-center-between mb-1">
                            <div class="prodcut-price d-flex align-items-center position-relative">
                                <ins class="font-size-20 text-red text-decoration-none">$230.000</ins>
                                <del class="font-size-12 tex-gray-6 position-absolute bottom-100">$281.200</del>
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
        </li> --}}
    </ul>
</div>
<!-- End Related products -->
<!-- Brand Carousel -->
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
<!-- End Brand Carousel -->
</div>
</main>
@endsection


@section('scripts')
    <script type="text/javascript">
        $( "#anadir-favorito" ).click(function(e) {
            var id = $(this).attr('data-id');
            var element = $(this);
            e.preventDefault();
            $.ajax({
                type:"GET",
                url:"/productos/favorito/"+id,
                success: function(data) {
                    $("#icono-favorito").html(data.cantidad);
                    if (data.estado === 0 ) {
                        element.closest('div').find('.fas').css('color', '#848484');
                    }
                    if (data.estado === 1) {
                        element.children("i").css("color", "red");
                    }
                }
            });
        });

        $( "#boton-anadir" ).click(function(e) {
            e.preventDefault();

            var cantidad = $("#cantidad").val();
            $.ajax({
                type:"GET",
                url:"/anadircarrito?id="+{{$combo->id}}+"&cantidad="+cantidad+"&combo=1",
                success: function(data) {
                    $("#icono-carrito").html(data.cantidad);
                    $("#total-carrito").html('$'+data.total.toLocaleString('es-CO',{maximumFractionDigits:0}));
                }
            });
        });
    </script>

@endsection
