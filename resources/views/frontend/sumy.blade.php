@extends('frontend.layouts.app')

@section('titulo', 'Sumy')

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
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">SUMY</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="container">
            <div class="mb-4">
                <h1 class="text-center">Somos <span class="text-primary">SUMY</span>, mayorista digital </h1>
                <p class="text-center"><img src="{{ asset('frontend/assets/images/sumy-img1.png') }}" style="max-width: 469px; width: 100%" ></p>
                <p class="text-center">Iniciamos operación en Cali, desde el año 2017 en nuestra sede física en el barrio Jorge Sadwasky y desde el año 2023, migramos operaciones a nuestra plataforma digital <a href="#">www.sumy.com</a></p>
            </div>
            <div class="my-4 my-xl-8">
                <div class="row mega-menu-sumy">
                    <div class="col-md-4 text-center mt-5 mb-5">
                        <h6>Venta Telefónica</h6>
                        <p>Cel. 311 809 9969 / 302 868 3818<br>
                            Fijo. 335 9971 <br>
                        o comunícate con nuestra asistente virtual</p>
                        <a href="https://wa.me/573118099969" target="_blank"><img src="{{ asset('frontend/assets/images/suly-ws.png') }}" width="180"></a>
                    </div>
                    <div class="col-md-4 text-center mt-5 mb-5">
                        <h6>Horarios de atención</h6>
                        <p>Lunes a Viernes 7:30am a 6:00 pm<br>
                        Sábados 7:30am a 4:00</p>
                        <img src="{{ asset('frontend/assets/images/soon-app2.png') }}" width="180">
                    </div>
                    <div class="col-md-4 text-center mt-5 mb-5">
                        <h6>Compra seguro</h6>
                        <p>Pagos en línea<br> 100% fáciles y rápidos</p>
                        <img src="{{ asset('frontend/assets/images/wompi.png') }}" width="180">
                    </div>  
                </div>
            </div>
        </div>
    </main>
@endsection