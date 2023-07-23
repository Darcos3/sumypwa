@extends('frontend.layouts.app')

@section('titulo', 'Venta telefónica')

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
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">VENTA TELEFÓNICA</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="container">
            <div class="mb-4">
                <h1 class="text-center">VENTA TELEFÓNICA</h1>
                <p class="text-center"><img src="{{ asset('frontend/assets/images/vt-img1.png') }}" style="max-width: 469px; width: 100%" ></p>
                <p class="text-center">Cuando hacemos una compra para remodelar o reparar pueden surgir dudas.<br>Por eso tenemos a tu disposición un asesor para que te atienda por teléfono, listo para guiarte y acompañarte en todo el proceso</p>
            </div>
            <div class="my-4 my-xl-8">

                <div class="row mb-10 datos-vt">
                    <div class="col-lg-5 col-xl-6">
                        <div class="border-bottom border-color-1 mb-5">
                            <h3 class="section-title mb-0 pb-2 font-size-25">Permítenos atenderte</h3>
                        </div>
                        <address class="mb-6 text-lh-23">
                            <div class=""><strong>Fijo:</strong> <i class="fa fa-phone"></i> <a href="tel:6023359971">(602) 335 9971</a> </div>
                            <div class=""><strong>Celular 1:</strong> <i class="fa fa-mobile"></i> <a href="tel:6023359971">311 809 9969</a> </div>
                            <div class=""><strong>Celular 2:</strong> <i class="fa fa-mobile"></i> <a href="tel:6023359971">302 868 3818</a> </div>
                        </address>
                        <div class="border-bottom border-color-1 mb-5">
                            <h3 class="section-title mb-0 pb-2 font-size-25">Horarios de atención</h3>
                        </div>
                        <div class=""><strong>Lunes a Viernes:</strong> 7:30am a 6:00pm</div>
                        <div class="mb-6"><strong>Sabados:</strong> 7:30am a 4:00pm</div>
                    </div>

                    <div class="col-lg-7 col-xl-6 mb-8 mb-lg-0">
                        <img src="{{ asset('frontend/assets/images/img-venta-telefonica.jpg') }}" class="img-fluid img-thumbnail">
                    </div>
                </div>
            </div>

            <!-- NUEVA SECCIÓN 040423 -->

                <div class="my-4 my-xl-8" id="mediospago">
                    <div class="border-bottom border-color-1 mb-5">
                        <h3 class="section-title mb-0 pb-2 font-size-25">Medios de Pago</h3>
                    </div>
                    <div class="row mb-10 pagos-vt">
                        <div class="col-lg-6 col-xl-6">                           
                            <div class="tipo-pago mb-5">
                                <div class="logo-pago">
                                    <img src="{{ asset('frontend/assets/images/mp1.png') }}" class="img-fluid">
                                </div>
                                <div class="txt-pago">
                                    <h3>Tarjetas de crédito y débito Visa, MasterCard y Amex.</h3>
                                     Pago con tus tarjetas de crédito y débito Visa, Mastercard y American Express de manera segura y rápida.       
                                </div>
                            </div>

                            <div class="tipo-pago mb-5">
                                <div class="logo-pago">
                                    <img src="{{ asset('frontend/assets/images/mp2.png') }}" class="img-fluid">
                                </div>
                                <div class="txt-pago">
                                    <h3>Cuentas de Bancolombia</h3>
                                     Si tienes cuenta en Bancolombia puedes realizar el pago directamente en la plataforma de wompi mas fácil y seguro.       
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6 col-xl-6">

                            <div class="tipo-pago mb-5">
                                <div class="logo-pago">
                                    <img src="{{ asset('frontend/assets/images/mp3.png')}}" class="img-fluid">
                                </div>
                                <div class="txt-pago">
                                    <h3>Pagos con Nequi</h3>
                                     Paga con la aplicación de Nequi desde tu celular en pocos pasos con tu dinero digital de tu cuenta de Nequi.       
                                </div>
                            </div>

                            <div class="tipo-pago mb-5">
                                <div class="logo-pago">
                                    <img src="{{ asset('frontend/assets/images/mp4.png') }}" class="img-fluid">
                                </div>
                                <div class="txt-pago">
                                    <h3>Pagos PSE</h3>
                                     Paga con cualquier cuenta habilitada para realizar pagos por PSE. Debes tener la cuenta inscrita para poder pagar con el botón de PSE.       
                                </div>
                            </div>

                        </div> 
                    </div>
                </div>
 
                <!-- FIN NUEVA SECCIÓN 040423 -->

            <div class="mb-8 position-relative">
                <dv class="d-flex justify-content-between border-bottom border-color-1 flex-md-nowrap flex-wrap border-sm-bottom-0">
                    <h3 class="section-title section-title__full mb-0 pb-2 font-size-22">Productos en Oferta</h3>
                </dv>
                <div class="js-slick-carousel position-static u-slick u-slick--gutters-1 overflow-hidden u-slick-overflow-visble pt-3 pb-3"
                    data-arrows-classes="position-absolute top-0 font-size-28 u-slick__arrow-normal top-10"
                    data-arrow-left-classes="fa fa-angle-left right-2"
                    data-arrow-right-classes="fa fa-angle-right right-0"
                    data-pagi-classes="text-center right-0 bottom-1 left-0 u-slick__pagination u-slick__pagination--long mb-0 z-index-n1 mt-4">
                    {{-- <div class="js-slide">
                        <ul class="row list-unstyled products-group no-gutters mb-0 overflow-visible">
                            <li class="col-wd-3 col-md-3 product-item product-item__card pb-2 mb-2 pb-md-0 mb-md-0 border-bottom border-md-bottom-0">
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
                            <li class="col-wd-3 col-md-3 product-item product-item__card pb-2 mb-2 pb-md-0 mb-md-0 border-bottom border-md-bottom-0">
                                <div class="product-item__outer h-100 w-100">
                                    <div class="product-item__inner p-md-3 row no-gutters">
                                        <div class="col col-lg-auto product-media-left">
                                            <a href="#" class="max-width-150 d-block"><img class="img-fluid" src="{{ }}" alt="Image Description"></a>
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
                            <li class="col-wd-3 col-md-3 product-item product-item__card d-none d-md-block pb-2 mb-2 pb-md-0 mb-md-0 border-bottom border-md-bottom-0">
                                <div class="product-item__outer h-100 w-100">
                                    <div class="product-item__inner p-md-3 row no-gutters">
                                        <div class="col col-lg-auto product-media-left">
                                            <a href="#" class="max-width-150 d-block"><img class="img-fluid" src="assets/images/productos/base2.jpg" alt="Image Description"></a>
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
                            <li class="col-wd-3 col-md-3 product-item product-item__card pb-2 mb-2 pb-md-0 mb-md-0 remove-divider">
                                <div class="product-item__outer h-100 w-100">
                                    <div class="product-item__inner p-md-3 row no-gutters">
                                        <div class="col col-lg-auto product-media-left">
                                            <a href="#" class="max-width-150 d-block"><img class="img-fluid" src="assets/images/productos/breker.jpg" alt="Image Description"></a>
                                        </div>
                                        <div class="col product-item__body pl-2 pl-lg-3 mr-xl-2 mr-wd-1">
                                            <div class="mb-4">
                                                <div class="mb-2"><a href="#" class="font-size-12 text-gray-5">Eléctricos</a></div>
                                                <h5 class="product-item__title"><a href="#" class="text-blue font-weight-bold">Breaker Termomagnetico 40apm - 110v Pow40011</a></h5>
                                            </div>
                                            <div class="flex-center-between mb-3">
                                                <div class="prodcut-price d-flex align-items-center position-relative">
                                                    <ins class="font-size-20 text-red text-decoration-none">$30.00</ins>
                                                    <del class="font-size-12 tex-gray-6 position-absolute bottom-100">$45.000</del>
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
                            <li class="col-wd-3 col-md-3 product-item product-item__card pb-2 mb-2 pb-md-0 mb-md-0 border-bottom border-md-bottom-0">
                                <div class="product-item__outer h-100 w-100">
                                    <div class="product-item__inner p-md-3 row no-gutters">
                                        <div class="col col-lg-auto product-media-left">
                                            <a href="#" class="max-width-150 d-block"><img class="img-fluid" src="assets/images/productos/aerografo.jpg" alt="Image Description"></a>
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
                            <li class="col-wd-3 col-md-3 product-item product-item__card pb-2 mb-2 pb-md-0 mb-md-0 border-bottom border-md-bottom-0">
                                <div class="product-item__outer h-100 w-100">
                                    <div class="product-item__inner p-md-3 row no-gutters">
                                        <div class="col col-lg-auto product-media-left">
                                            <a href="#" class="max-width-150 d-block"><img class="img-fluid" src="assets/images/productos/cerradura.jpg" alt="Image Description"></a>
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
                            <li class="col-wd-3 col-md-3 product-item product-item__card d-none d-md-block pb-2 mb-2 pb-md-0 mb-md-0 border-bottom border-md-bottom-0">
                                <div class="product-item__outer h-100 w-100">
                                    <div class="product-item__inner p-md-3 row no-gutters">
                                        <div class="col col-lg-auto product-media-left">
                                            <a href="#" class="max-width-150 d-block"><img class="img-fluid" src="assets/images/productos/base.jpg" alt="Image Description"></a>
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
                            <li class="col-wd-3 col-md-3 product-item product-item__card pb-2 mb-2 pb-md-0 mb-md-0 remove-divider">
                                <div class="product-item__outer h-100 w-100">
                                    <div class="product-item__inner p-md-3 row no-gutters">
                                        <div class="col col-lg-auto product-media-left">
                                            <a href="#" class="max-width-150 d-block"><img class="img-fluid" src="assets/images/productos/breker.jpg" alt="Image Description"></a>
                                        </div>
                                        <div class="col product-item__body pl-2 pl-lg-3 mr-xl-2 mr-wd-1">
                                            <div class="mb-4">
                                                <div class="mb-2"><a href="#" class="font-size-12 text-gray-5">Eléctricos</a></div>
                                                <h5 class="product-item__title"><a href="#" class="text-blue font-weight-bold">Breaker Termomagnetico 40apm - 110v Pow40011</a></h5>
                                            </div>
                                            <div class="flex-center-between mb-3">
                                                <div class="prodcut-price d-flex align-items-center position-relative">
                                                    <ins class="font-size-20 text-red text-decoration-none">$30.00</ins>
                                                    <del class="font-size-12 tex-gray-6 position-absolute bottom-100">$45.000</del>
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
                    </div> --}}

                    @foreach($oferta->chunk(3) as $chunk)
                        <div class="js-slide">
                            <ul class="row list-unstyled products-group no-gutters mb-0 overflow-visible">
                                @foreach($chunk as $item)
                                    <li class="col-wd-3 col-md-4 product-item product-item__card pb-2 mb-2 pb-md-0 mb-md-0 remove-divider">
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

@section('scripts')
    <script>
        if ($(window).width() > 1200) {

            $(window).scroll(function(event) {
                var scrollTop = $(window).scrollTop();
                console.log(scrollTop);
                if(scrollTop == 1012){
                    let top = scrollTop - 200;
                    window.scroll(0, top);
                }
            });
        }
    </script>
@endsection