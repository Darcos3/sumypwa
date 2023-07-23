@extends('frontend.layouts.app')

@section('titulo', 'Thank You')

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
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">VENTA A EMPRESAS</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="container">
            
            <!-- NUEVA SECCIÓN 1 040423 -->
            
            <div class="my-4 my-xl-8">
                <div class="row mb-10 datos-ve">

                    <div class="col-lg-5 col-xl-6">
                        <h1 class="text-center">VENTA A EMPRESAS</h1>
                        <p class="text-center"><img src="{{ asset('frontend/assets/images/ve-img1.png') }}" style="max-width: 469px; width: 100%" ></p>
                        <p class="text-center" style="font-size: 18px">Si usted es empresa o necesita comprar en volumen</p>
                        <p class="text-center m-8"><a class="btn-primary p-3 rounded-sm text-white font-size-18" href="/ferretero">Registrese aquí</a></p>
                        <p class="text-center" style="font-size: 18px">Registrese ahora y reciba un <strong>Bono de $15.000</strong> en su primera compra</p>
                    </div>

                    <div class="col-lg-7 col-xl-6 mb-8 mb-lg-0">
                        <img src="{{ asset('frontend/assets/images/venta-empresa.jpg')}}" class="img-fluid">
                    </div>  

                </div>
            </div>

            <hr>

            <h4 class="text-center m-5">Encuentra todo en materiales para la construcción mantenimiento y reparación</h2>
            
            <!-- NUEVA SECCIÓN 1 040423 -->


            <!-- Categories Carousel - EL MISMO QUE HAY EN EL INICIO -->
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

            <!-- NUEVA SECCIÓN 2 040423 -->

            <div class="box-ve">
                <div class="row gx-lg-5 "> 
                    <div class="col-lg-4 col-md-12 mb-10 mb-lg-0"> 
                        <div class="card shadow-2-strong h-100"> 
                            <div class="d-flex justify-content-center" style="margin-top: -80px"> 
                                <div class="p-4 shadow-5-strong d-inline-block"> 
                                    <img src="{{ asset('frontend/assets/images/ve-ico1.png') }}" class="img-fluid">
                                </div> 
                            </div> 
                            <div class="card-body">
                                <p class="text-center">Aprovecha hacer tus compras a los mejores precios por volumen</p> 
                            </div> 
                        </div> 
                    </div> 
                    <div class="col-lg-4 mb-10 mb-lg-0"> 
                        <div class="card shadow-2-strong h-100"> 
                            <div class="d-flex justify-content-center" style="margin-top: -80px"> 
                                <div class="p-4 shadow-5-strong d-inline-block"> 
                                    <img src="{{ asset('frontend/assets/images/ve-ico2.png') }}" class="img-fluid">
                                </div> 
                            </div> 
                            <div class="card-body">
                                <p class="text-center">Recibe asesoría en tu proceso elección de productos, procesos de compra y logística</p> 
                            </div> 
                        </div> 
                    </div> 
                    <div class="col-lg-4 mb-10 mb-lg-0"> 
                        <div class="card shadow-2-strong h-100"> 
                            <div class="d-flex justify-content-center" style="margin-top: -80px"> 
                                <div class="p-4 shadow-5-strong d-inline-block"> 
                                    <img src="{{ asset('frontend/assets/images/ve-ico3.png') }}" class="img-fluid">
                                </div> 
                            </div> 
                            <div class="card-body">
                                <p class="text-center">Si requieres algún producto adicional estamos en la disposición de ayudarte a conseguirlo</p> 
                            </div> 
                        </div> 
                    </div> 
                </div>
            </div>

            <!-- FIN NUEVA SECCIÓN 040423 -->


            <!-- Caracteristicas  - EL MISMO QUE HAY EN EL INICIO *** PERO LE MODIFIQUE UNAS CLASES - POR FAVOR ACTUALIZAR EL DEL HOME -->

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
    </main>
@endsection