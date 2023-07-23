@extends('frontend.usuarios.layouts.usuarios')

@section('titulo', 'Cuenta')

@section('contenido')
    <h2>Bienvenido <a href="#" style="color: #f1592a"><b>{{ auth()->user()->name }}</b></a> a tu cuenta</h2>
    <p>
        Desde el escritorio de tu cuenta puedes ver tus <a href="#">pedidos recientes</a>, editar tu
         <a href="#">contraseña</a> editar <a href="#">los detalles de tu cuenta</a> y gestionar tu <a href="#">dirección de envío y facturación</a>.
    </p>

    <div class="row mb-6 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
        @if (auth()->user()->rol_id != 3)
            <div class="col-md-6 mb-4 mb-xl-0 col-xl-6 col-wd-6 flex-shrink-0 flex-xl-shrink-1">
                <a href="{{ route('usuarios.ferretero')}}" class="min-height-146 py-1 py-xl-2 py-wd-1 banner-bg d-flex align-items-center text-gray-90">
                    <div class="col-5 col-xl-6 col-wd-5 pr-0">
                        <img class="img-fluid" src="{{ asset('frontend/assets/images/mi-cuenta/img-ferretero.jpg') }}" alt="Image Description">
                    </div>
                    <div class="col-7 col-xl-7 col-wd-7 pr-xl-5 pr-wd-3">
                        <div class="mb-2 pb-1 font-size-16 font-weight-normal text-ls-n1 text-lh-23">
                            SOLICITA TU <strong>CUENTA DE MAYORISTA</strong> Y OBTEN GRANDES BENEFICIOS
                        </div>
                        <div class="link text-gray-90 font-weight-bold font-size-15" href="#">
                            Crear perfil Mayorista
                            <span class="link__icon ml-1">
                                <span class="link__icon-inner"><i class="ec ec-arrow-right-categproes"></i></span>
                            </span>
                        </div>
                    </div>
                </a>
            </div>
        @endif
        <div class="col-md-6 mb-4 mb-xl-0 col-xl-6 col-wd-6 flex-shrink-0 flex-xl-shrink-1">
            <a href="../shop/shop.html" class="min-height-146 py-1 py-xl-2 py-wd-1 banner-bg d-flex align-items-center text-gray-90">
                <div class="col-5 col-xl-6 col-wd-5 pr-0">
                    <img class="img-fluid" src="{{ asset('frontend/assets/images/mi-cuenta/img-domiciliario.jpg') }}" alt="Image Description">
                </div>
                <div class="col-7 col-xl-7 col-wd-7 pr-xl-5 pr-wd-3">
                    <div class="mb-2 pb-1 font-size-16 font-weight-normal text-ls-n1 text-lh-23">
                        SOLICITA TU <strong>CUENTA DE DOMICILIARIO</strong> Y TRABAJA CON NOSOTROS
                    </div>
                    <div class="link text-gray-90 font-weight-bold font-size-15" href="#">
                        Crear perfil Domiciliario
                        <span class="link__icon ml-1">
                            <span class="link__icon-inner"><i class="ec ec-arrow-right-categproes"></i></span>
                        </span>
                    </div>
                </div>
            </a>
        </div>
    </div>

    @if( auth()->user()->rol_id == 2 )
        @if($tienecupon != '')
            <div class="row mb-6 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                <div class="col-md-6 mb-4 mb-xl-0 col-xl-6 col-wd-6 flex-shrink-0 flex-xl-shrink-1 text-center">
                    <a href="#" class="min-height-146 py-1 py-xl-2 py-wd-1 banner-bg d-flex align-items-center text-gray-90">
                        <div class="col-12 col-xl-12 col-wd-12 pr-xl-4 pr-wd-3">
                            <div class="mb-2 pb-1 font-size-16 font-weight-normal text-ls-n1 text-lh-23">
                                <img src="{{ asset('frontend/assets/images/descuento.png')}}" style="width: 20px; height: 20px">
                                Tienes un cupón disponible
                            </div>
                            <div class="link text-gray-90 font-weight-bold font-size-15" href="#" style="background: white; width: 80%; margin: 0 auto; border: 1px solid #999">
                                {{ $cupon->codigo }}
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @endif
    @endif
@endsection
