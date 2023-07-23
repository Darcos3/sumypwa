@extends('frontend.layouts.app')

@section('titulo', 'Contacto recibido')

@section('content')
    <main id="content" role="main">
        <!-- breadcrumb -->
        <div class="bg-gray-13 bg-md-transparent">
            <div class="container">
                <!-- breadcrumb -->
                <div class="my-md-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="../home/index.html">Inicio</a></li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Contacto</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->


        <div class="container">
            <div class="mb-5">
                <h1 class="text-center">Mensaje Enviado</h1>
            </div>
            <div class="row mb-10">
                <div class="col-lg-7 col-xl-6 mb-8 mb-lg-0">
                    <div class="mr-xl-6">
                        <div class="border-bottom border-color-1 mb-5">
                            <h3 class="section-title mb-0 pb-2 font-size-25">Mensaje Enviado</h3>
                        </div>
                        <p class="max-width-830-xl text-gray-90">Estimado cliente {{ $firstName }}, <br><br>
                        Es un placer que nos hayas contactado, nosotros
                        hemos recibido tu mensaje, muy pronto nos comunicaremos contigo y 
                        te brindaremos una respuesta, SUMY te desea un feliz resto de día.</p>
                    </div>
                </div>
                <div class="col-lg-5 col-xl-6">
                    <div class="mb-6">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127450.08829203268!2d-76.6693584492385!3d3.395225124390289!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e30a6f0cc4bb3f1%3A0x1f0fb5e952ae6168!2sCali%2C%20Valle%20del%20Cauca%2C%20Colombia!5e0!3m2!1sen!2sin!4v1674581076135!5m2!1sen!2sin" width="100%" height="288" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    </div>
                    <div class="border-bottom border-color-1 mb-5">
                        <h3 class="section-title mb-0 pb-2 font-size-25">Dirección</h3>
                    </div>
                    <address class="mb-6 text-lh-23">
                        Calle 1 # 2 - 3, Cali, Valle del Cauca
                        <div class="">(+57) 300 123 45 78</div>
                        <div class="">Email: <a class="text-blue text-decoration-on" href="mailto:contacto@sumy.com">contacto@sumy.com</a></div>
                    </address>
                    <h5 class="font-size-14 font-weight-bold mb-3">Horario</h5>
                    <div class="">Lunes a viernes: 8am - 6pm</div>
                    <div class="mb-6">Sabados y festivos: 8am - 1pm</div>
                </div>
            </div>
        </div>
    </main>
@endsection
