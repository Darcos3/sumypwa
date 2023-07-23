@extends('frontend.layouts.app')

@section('titulo', 'Como Comprar')

@section('content')
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <!-- breadcrumb -->
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="/">Inicio</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">COMO COMPRAR</li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>

    <div class="container">
        <div class="mb-4">
            <h1 class="text-center">¿COMO COMPRAR?</h1>
            <p class="text-center"><img src="{{ asset('frontend/assets/images/como-img6.png') }}" style="max-width: 469px;" ></p>
            <p class="text-center">Comprar en SUMY es muy sencillo, nuestra interfaz esta diseñada para facilitarte el proceso. Además contamos con múltiples opciones de pago que se ajustan a tus necesidades. Puedes usar esta guía para entender mejor como comprar con nosotros.</p>
        </div>
        <div class="my-4 my-xl-8">
            <div class="row">
            
                <div class="col-md-12 ml-xl-auto mr-md-auto mr-xl-0 mb-8 mb-md-0">

                <div class="js-slick-carousel u-slick"
                    data-pagi-classes="text-center position-absolute right-0 bottom-0 left-0 u-slick__pagination u-slick__pagination--long justify-content-start mb-3 mb-md-4 pl-18"  data-slick='{"autoplay": "true", "arrows":"true", "autoplaySpeed":5000,"infinite":"false"}'>
                    <div class="js-slide" style="background:#fff;">
                        <div class="container overflow-hidden">
                            <div class="row pt-7 py-md-0">
                                <div class="d-none d-wd-block offset-1"></div>
                                <div class="col-xl col col-md-6 mt-md-8 mt-lg-10">
                                    <div class="ml-xl-4">
                                        <h6 class="font-size-15 font-weight-bold mb-2 text-orange"
                                            data-scs-animation-in="fadeInUp">
                                            PASO 1
                                        </h6>
                                        <h1 class="font-size-46 text-lh-50 font-weight-light mb-8"
                                            data-scs-animation-in="fadeInUp"
                                            data-scs-animation-delay="200">
                                            Ingresa a SUMY y crea tu <stong class="font-weight-bold">cuenta de usuario</stong>
                                        </h1>

                                    </div>
                                </div>
                                <div class="col-xl-7 col-6 d-flex align-items-end ml-auto ml-md-0" data-scs-animation-in="fadeInRight" data-scs-animation-delay="500">
                                    <img src="{{ asset('frontend/assets/images/como-img1.jpg') }}" style="max-width: 600px;" class="rounded-4 shadow-4" alt="" aria-controls="#picker-editor" draggable="false">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="js-slide" style="background:#fff;">
                        <div class="container overflow-hidden">
                            <div class="row pt-7 py-md-0">
                                <div class="d-none d-wd-block offset-1"></div>
                                <div class="col-xl col col-md-6 mt-md-8 mt-lg-10">
                                    <div class="ml-xl-4">
                                        <h6 class="font-size-15 font-weight-bold mb-2 text-orange"
                                            data-scs-animation-in="fadeInUp">
                                            PASO 2
                                        </h6>
                                        <h1 class="font-size-46 text-lh-50 font-weight-light mb-8"
                                            data-scs-animation-in="fadeInUp"
                                            data-scs-animation-delay="200">
                                            Selecciona los productos que deseas y <stong class="font-weight-bold">agregalos al carrito</stong>
                                        </h1>

                                    </div>
                                </div>
                                <div class="col-xl-7 col-6 d-flex align-items-end ml-auto ml-md-0" data-scs-animation-in="fadeInRight" data-scs-animation-delay="500">
                                <img src="{{ asset('frontend/assets/images/como-img2.jpg') }}"  style="max-width: 600px;" class="rounded-4 shadow-4" alt="" aria-controls="#picker-editor" draggable="false">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="js-slide" style="background:#fff;">
                        <div class="container overflow-hidden">
                            <div class="row pt-7 py-md-0">
                                <div class="d-none d-wd-block offset-1"></div>
                                <div class="col-xl col col-md-6 mt-md-8 mt-lg-10">
                                    <div class="ml-xl-4">
                                        <h6 class="font-size-15 font-weight-bold mb-2 text-orange"
                                            data-scs-animation-in="fadeInUp">
                                            PASO 3
                                        </h6>
                                        <h1 class="font-size-46 text-lh-50 font-weight-light mb-8"
                                            data-scs-animation-in="fadeInUp"
                                            data-scs-animation-delay="200">
                                            Verifica los productos seleccionados y <stong class="font-weight-bold">click en proceder con la compra</stong>
                                        </h1>

                                    </div>
                                </div>
                                <div class="col-xl-7 col-6 d-flex align-items-end ml-auto ml-md-0" data-scs-animation-in="fadeInRight" data-scs-animation-delay="500">
                                <img src="{{ asset('frontend/assets/images/como-img3.jpg') }}"  style="max-width: 600px;" class="rounded-4 shadow-4" alt="" aria-controls="#picker-editor" draggable="false">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="js-slide" style="background:#fff;">
                        <div class="container overflow-hidden">
                            <div class="row pt-7 py-md-0">
                                <div class="d-none d-wd-block offset-1"></div>
                                <div class="col-xl col col-md-6 mt-md-8 mt-lg-10">
                                    <div class="ml-xl-4">
                                        <h6 class="font-size-15 font-weight-bold mb-2 text-orange"
                                            data-scs-animation-in="fadeInUp">
                                            PASO 4
                                        </h6>
                                        <h1 class="font-size-46 text-lh-50 font-weight-light mb-8"
                                            data-scs-animation-in="fadeInUp"
                                            data-scs-animation-delay="200">
                                            Diligencia tus datos, informacion de envío y metodo de pago ... <stong class="font-weight-bold">click en pagar.</stong>
                                        </h1>

                                    </div>
                                </div>
                                <div class="col-xl-7 col-6 d-flex align-items-end ml-auto ml-md-0" data-scs-animation-in="fadeInRight" data-scs-animation-delay="500">
                                <img src="{{ asset('frontend/assets/images/como-img4.jpg') }}"  style="max-width: 600px;" class="rounded-4 shadow-4" alt="" aria-controls="#picker-editor" draggable="false">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="js-slide" style="background:#fff;">
                        <div class="container overflow-hidden">
                            <div class="row pt-7 py-md-0">
                                <div class="d-none d-wd-block offset-1"></div>
                                <div class="col-xl col col-md-6 mt-md-8 mt-lg-10">
                                    <div class="ml-xl-4">
                                        <h6 class="font-size-15 font-weight-bold mb-2 text-orange"
                                            data-scs-animation-in="fadeInUp">
                                            PASO 5
                                        </h6>
                                        <h1 class="font-size-46 text-lh-50 font-weight-light mb-8"
                                            data-scs-animation-in="fadeInUp"
                                            data-scs-animation-delay="200">
                                            Recibiras un correo con la confirmación y el estado de tu <stong class="font-weight-bold">pedido.</stong>
                                        </h1>

                                    </div>
                                </div>
                                <div class="col-xl-7 col-6 d-flex align-items-end ml-auto ml-md-0" data-scs-animation-in="fadeInRight" data-scs-animation-delay="500">
                                <img src="{{ asset('frontend/assets/images/como-img5.jpg') }}"  style="max-width: 600px;" class="rounded-4 shadow-4" alt="" aria-controls="#picker-editor" draggable="false">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    
                </div>
            
            </div>
        </div>
    </div>
@endsection