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
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="/">Inicio</a></li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Subscrito</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->


        <div class="container">
            <div class="mb-5">
                <h1 class="text-center">Subscrito al Boletín de Noticias</h1>
            </div>
            <div class="row mb-10">
                <div class="col-lg-7 col-xl-6 mb-8 mb-lg-0">
                    <div class="mr-xl-6">
                        <div class="border-bottom border-color-1 mb-5">
                            <h3 class="section-title mb-0 pb-2 font-size-25">¡Felicidades!</h3>
                        </div>
                        @if($estado == true)
                            <p class="max-width-830-xl text-gray-90">Estimado cliente ya te has subscrito a Sumy con tu correo electrónico {{ $email }},
                                muy pronto te enviaremos noticias, cupones o descuentos, está atento!
                            </p><br>
                        @else
                            <p class="max-width-830-xl text-gray-90">Estimado cliente tu correo electrónico {{ $email }},
                                ha sido subscrito en Sumy, muy pronto te enviaremos noticias, cupones o descuentos, está atento!
                            </p><br>
                        @endif
                        <p>Muchas gracias.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
