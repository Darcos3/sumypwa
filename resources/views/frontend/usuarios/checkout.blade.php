@extends('frontend.layouts.app')

@section('titulo', 'Checkout')

@section('content')
<main id="content" role="main" class="checkout-page">
    <!-- breadcrumb -->
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <!-- breadcrumb -->
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="/">Inicio</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{ route('usuarios.carrito') }}">Carrito</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{ route('usuarios.envio') }}">Envío</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Checkout</li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="container">
        <div class="mb-5">
            <h1 class="text-center">Checkout</h1>
        </div>
        <!-- Accordion -->
        {{-- <div id="shopCartAccordion" class="accordion rounded mb-5">
            <!-- Card -->
            <div class="card border-0">
                <div id="shopCartHeadingOne" class="alert alert-primary mb-0" role="alert">
                    Returning customer? <a href="#" class="alert-link" data-toggle="collapse" data-target="#shopCartOne" aria-expanded="false" aria-controls="shopCartOne">Click here to login</a>
                </div>
                <div id="shopCartOne" class="collapse border border-top-0" aria-labelledby="shopCartHeadingOne" data-parent="#shopCartAccordion" style="">
                    <!-- Form -->
                    <form class="js-validate p-5">
                        <!-- Title -->
                        <div class="mb-5">
                            <p class="text-gray-90 mb-2">Welcome back! Sign in to your account.</p>
                            <p class="text-gray-90">If you have shopped with us before, please enter your details below. If you are a new customer, please proceed to the Billing & Shipping section.</p>
                        </div>
                        <!-- End Title -->

                        <div class="row">
                            <div class="col-lg-6">
                                <!-- Form Group -->
                                <div class="js-form-message form-group">
                                    <label class="form-label" for="signinSrEmailExample3">Email address</label>
                                    <input type="email" class="form-control" name="email" id="signinSrEmailExample3" placeholder="Email address" aria-label="Email address" required
                                    data-msg="Por favor ingrese valid email address."
                                    data-error-class="u-has-error"
                                    data-success-class="u-has-success">
                                </div>
                                <!-- End Form Group -->
                            </div>
                            <div class="col-lg-6">
                                <!-- Form Group -->
                                <div class="js-form-message form-group">
                                    <label class="form-label" for="signinSrPasswordExample2">Password</label>
                                    <input type="password" class="form-control" name="password" id="signinSrPasswordExample2" placeholder="********" aria-label="********" required
                                    data-msg="Your password is invalid. Please try again."
                                    data-error-class="u-has-error"
                                    data-success-class="u-has-success">
                                </div>
                                <!-- End Form Group -->
                            </div>
                        </div>

                        <!-- Checkbox -->
                        <div class="js-form-message mb-3">
                            <div class="custom-control custom-checkbox d-flex align-items-center">
                                <input type="checkbox" class="custom-control-input" id="rememberCheckbox" name="rememberCheckbox" required
                                data-error-class="u-has-error"
                                data-success-class="u-has-success">
                                <label class="custom-control-label form-label" for="rememberCheckbox">
                                    Remember me
                                </label>
                            </div>
                        </div>
                        <!-- End Checkbox -->

                        <!-- Button -->
                        <div class="mb-1">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary-dark-w px-5">Login</button>
                            </div>
                            <div class="mb-2">
                                <a class="text-blue" href="#">Lost your password?</a>
                            </div>
                        </div>
                        <!-- End Button -->
                    </form>
                    <!-- End Form -->
                </div>
            </div>
            <!-- End Card -->
        </div> --}}
        <!-- End Accordion -->

        {{-- <!-- Accordion -->
        <div id="shopCartAccordion1" class="accordion rounded mb-6">
            <!-- Card -->
            <div class="card border-0">
                <div id="shopCartHeadingTwo" class="alert alert-primary mb-0" role="alert">
                    Have a coupon? <a href="#" class="alert-link" data-toggle="collapse" data-target="#shopCartTwo" aria-expanded="false" aria-controls="shopCartTwo">Click here to enter your code</a>
                </div>
                <div id="shopCartTwo" class="collapse border border-top-0" aria-labelledby="shopCartHeadingTwo" data-parent="#shopCartAccordion1" style="">
                    <form class="js-validate p-5" novalidate="novalidate">
                        <p class="w-100 text-gray-90">If you have a coupon code, please apply it below.</p>
                        <div class="input-group input-group-pill max-width-660-xl">
                            <input type="text" class="form-control" name="name" placeholder="Coupon code" aria-label="Promo code">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-block btn-dark font-weight-normal btn-pill px-4">
                                    <i class="fas fa-tags d-md-none"></i>
                                    <span class="d-none d-md-inline">Apply coupon</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Card -->
        </div> --}}
        <!-- End Accordion -->
        <form class="js-validate" novalidate="novalidate">
            <div class="row">
                <div class="col-lg-5 order-lg-2 mb-7 mb-lg-0">
                    <div class="pl-lg-3 ">
                        <div class="bg-gray-1 rounded-lg">
                            <!-- Order Summary -->
                            <div class="p-4 mb-4 checkout-table">
                                <!-- Title -->
                                <div class="border-bottom border-color-1 mb-5">
                                    <h3 class="section-title mb-0 pb-2 font-size-25">Su orden</h3>
                                </div>
                                <!-- End Title -->

                                <!-- Product Content -->
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="product-name">Producto</th>
                                            <th class="product-total">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pedido->productos as $producto)
                                            <tr class="cart_item">
                                                <td><strong class="product-quantity">{{ $producto->pivot->cantidad }} × </strong>{{ $producto->nombre}}&nbsp;</td>
                                                <td>${{ number_format($producto->pivot->cantidad * $producto->menorPrecio(),0,'.','.')  }}</td>
                                            </tr>
                                        @endforeach
                                        @foreach ($pedido->combos as $combo)
                                            <tr class="cart_item">
                                                <td><strong class="product-quantity">{{ $combo->pivot->cantidad }} × </strong>{{ $combo->nombre}}&nbsp;</td>
                                                <td>${{ number_format($combo->pivot->cantidad * $combo->menorPrecio(),0,'.','.')  }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr style="color:gray;">
                                            <th>Tu Ahorro fue</th>
                                            <td>${{ number_format($ahorrado,0,'.','.')}}</td>
                                        </tr>
                                        <tr>
                                            <th>Subtotal</th>
                                            <td>${{ number_format($subtotal,0,'.','.')}}</td>
                                        </tr>
                                        <tr>
                                            <th>Descuento por Cupón</th>
                                            <td>${{ number_format( $cupon ,0,'.','.')}}</td>
                                        </tr>
                                        <tr>
                                            <th>Iva </th>
                                            <td>${{  number_format($iva,0,'.','.') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Envío {{ $pedido->medioTransporte->nombre}}</th>
                                            <td>${{  number_format($pedido->medioTransporte->precio,0,'.','.') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Total</th>
                                            <td><strong>${{ number_format($pedido->total,0,'.','.') }}</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <!-- End Product Content -->
                                <div class="form-group d-flex align-items-center justify-content-between px-3 mb-5">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck10" required
                                            data-msg="Please agree terms and conditions."
                                            data-error-class="u-has-error"
                                            data-success-class="u-has-success">
                                        <label class="form-check-label form-label" for="defaultCheck10">
                                            He leido y acepto los <a href="#" class="text-blue">términos y condiciones</a>, y <a class="text-blue" href="{{ asset('frontend/assets/archivos/autorizacion_de_tratamiento_de_datos_personles_sumy.pdf') }}" target="_blank">autorizo tratamiento de datos</a> de SUMY.
                                            <span class="text-danger">*</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="border-top border-width-3 border-color-1 pt-3 mb-3">
                                    <!-- Basics Accordion -->
                                    <div id="basicsAccordion1">
                                        <!-- Card -->
                                        <div class="border-bottom border-color-1 border-dotted-bottom">
                                            <div class="p-3" id="basicsHeadingTwo">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" id="secondStylishRadio1" name="stylishRadio">
                                                    <label class="custom-control-label form-label" for="secondStylishRadio1"
                                                        data-toggle="collapse"
                                                        data-target="#basicsCollapseTwo"
                                                        aria-expanded="false"
                                                        aria-controls="basicsCollapseTwo">
                                                        Wompi
                                                    </label>
                                                </div>
                                            </div>
                                            <div id="basicsCollapseTwo" class="collapse border-top border-color-1 border-dotted-top bg-dark-lighter"
                                                aria-labelledby="basicsHeadingTwo"
                                                data-parent="#basicsAccordion1">
                                                <div class="p-4">
                                                    <div class="p-4">
                                                        El pago se hará por medio de Wompi. <a href="#">Mas información sobre Wompi</a>.
                                                    </div>
                                                    <form>
                                                        <script
                                                        src="https://checkout.wompi.co/widget.js"
                                                        data-render="button"
                                                        data-public-key="pub_test_ZnG5ojC8YksHGt4JmsRXbrW3BwcILJ0G"
                                                        data-currency="COP"
                                                        data-amount-in-cents="{{$pedido->total*100 }}"
                                                        data-reference="{{ $pedido->id }}"
                                                        data-signature:integrity="{{ $signature }}"
                                                        data-customer-data:email="{{auth()->user()->email }}"
                                                        data-customer-data:full-name="{{auth()->user()->name }}"
                                                        {{-- data-redirect-url="http://68.183.50.234:50331/pagos/wompi/respuesta?pedidoId={{$pedido->id}}" --}}
                                                        {{-- data-redirect-url="http://sumy.test/pagos/wompi/respuesta?pedidoId={{$pedido->id}}" --}}
                                                        data-redirect-url="https://www.sumy.com.co/pagos/wompi/respuesta?pedidoId={{$pedido->id}}"
                                                        >

                                                        </script>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Card -->
                                        <!-- Card -->
                                        @if ( isset(auth()->user()->ferretero) && auth()->user()->ferretero->estado_ferretero_id == 2)
                                            @if ( auth()->user()->ferretero->cupo > $pedido->total )
                                                <div class="border-bottom border-color-1 border-dotted-bottom">
                                                    <div class="p-3" id="basicsHeadingOne">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" id="stylishRadio1" name="stylishRadio">
                                                            <label class="custom-control-label form-label" for="stylishRadio1"
                                                            data-toggle="collapse"
                                                            data-target="#basicsCollapseOnee"
                                                            aria-expanded="true"
                                                            aria-controls="basicsCollapseOnee">
                                                            A crédito (Perfil Ferretero)
                                                        </label>
                                                    </div>
                                                </div>
                                                <div id="basicsCollapseOnee" class="collapse show border-top border-color-1 border-dotted-top bg-dark-lighter"
                                                    aria-labelledby="basicsHeadingOne"
                                                    data-parent="#basicsAccordion1" style="display: none">
                                                    <div class="p-4">
                                                        El pago se hará a crédito.
                                                    </div>
                                                    <a href="{{ route('pedidos.respuesta-ferretero', $pedido->id) }}" class="btn btn-primary-dark-w ml-md-2 px-5 px-md-4 px-lg-5 w-100 w-md-auto d-none d-md-inline-block">Pagar a crédito</a>
                                                </div>
                                            </div>
                                            @endif

                                        @endif

                                        @if ( isset(auth()->user()->ferretero) && auth()->user()->ferretero->estado_ferretero_id == 2)
                                                <div class="border-bottom border-color-1 border-dotted-bottom">
                                                    <div class="p-3" id="basicsHeadingOne2">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" id="stylishRadio2" name="stylishRadio2">
                                                            <label class="custom-control-label form-label" for="stylishRadio2"
                                                            data-toggle="collapse"
                                                            data-target="#basicsCollapseOnee2"
                                                            aria-expanded="true"
                                                            aria-controls="basicsCollapseOnee2">
                                                            A contado (10 dias)
                                                        </label>
                                                    </div>
                                                </div>
                                                <div id="basicsCollapseOnee2" class="collapse show border-top border-color-1 border-dotted-top bg-dark-lighter"
                                                    aria-labelledby="basicsHeadingOne2"
                                                    data-parent="#basicsAccordion2"
                                                     style="display: none">
                                                    <div class="p-4">
                                                        El pago se hará a contado 10 dias.
                                                    </div>
                                                    <a href="{{ route('pedidos.respuesta-ferretero-contado', $pedido->id) }}" class="btn btn-primary-dark-w ml-md-2 px-5 px-md-4 px-lg-5 w-100 w-md-auto d-none d-md-inline-block">Pagar a contado 10 dias</a>
                                                </div>
                                            </div>

                                        @endif
                                        <!-- End Card -->
                                    </div>
                                    <!-- End Basics Accordion -->
                                </div>

                                {{-- <button type="submit" class="btn btn-primary-dark-w btn-block btn-pill font-size-20 mb-3 py-3">Ordenar</button> --}}

                            </div>
                            <!-- End Order Summary -->
                        </div>
                    </div>
                </div>

                <div class="col-lg-7 order-lg-1">
                    <div class="pb-7 mb-7">
                        <!-- Title -->
                        <div class="border-bottom border-color-1 mb-5">
                            <h3 class="section-title mb-0 pb-2 font-size-25">Detalles de facturación</h3>
                        </div>
                        <!-- End Title -->

                        <!-- Billing Form -->
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Nombres
                                    </label>
                                    <p>{{ $pedido->nombre }}</p>
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Apellidos
                                    </label>
                                    <p>{{ $pedido->apellido }}</p>
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="w-100"></div>

                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Nombre de la Empresa (Opcional)
                                    </label>
                                    <p>{{ $pedido->nombre_empresa }}</p>
                                </div>
                                <!-- End Input -->
                            </div>
                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Cédula o NIT (Opcional)
                                    </label>
                                    <p>{{ $pedido->numero_identificacion }}</p>
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-md-8">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Dirección
                                    </label>
                                    <p>{{ $pedido->direccion }}</p>
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-md-4">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Apto, Bloque, etc.
                                    </label>
                                    <p>{{ $pedido->direccion_adicional }}</p>
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-md-12">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Departamento
                                    </label>
                                    <p>{{ $pedido->ciudad->departamento->nombre }}</p>
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="w-100"></div>


                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Ciudad
                                    </label>
                                    <p>{{ $pedido->ciudad->nombre }}</p>
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Email
                                    </label>
                                    <p>{{ $pedido->email }}</p>
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Teléfono
                                    </label>
                                    <p>{{ $pedido->telefono }}</p>
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="w-100"></div>
                        </div>
                        <!-- End Billing Form -->

                        <!-- Accordion -->
                        {{-- <div id="shopCartAccordion2" class="accordion rounded mb-6">
                            <!-- Card -->
                            <div class="card border-0">
                                <div id="shopCartHeadingThree" class="custom-control custom-checkbox d-flex align-items-center">
                                    <input type="checkbox" class="custom-control-input" id="createAnaccount" name="createAnaccount" >
                                    <label class="custom-control-label form-label" for="createAnaccount" data-toggle="collapse" data-target="#shopCartThree" aria-expanded="false" aria-controls="shopCartThree">
                                        Create an account?
                                    </label>
                                </div>
                                <div id="shopCartThree" class="collapse" aria-labelledby="shopCartHeadingThree" data-parent="#shopCartAccordion2" style="">
                                    <!-- Form Group -->
                                    <div class="js-form-message form-group py-5">
                                        <label class="form-label" for="signinSrPasswordExample1">
                                            Create account password
                                        </label>
                                        <input type="password" class="form-control" name="password" id="signinSrPasswordExample1" placeholder="********" aria-label="********" required
                                        data-msg="Enter password."
                                        data-error-class="u-has-error"
                                        data-success-class="u-has-success">
                                    </div>
                                    <!-- End Form Group -->
                                </div>
                            </div>
                            <!-- End Card -->
                        </div> --}}
                        <!-- End Accordion -->
                        <!-- Title -->
                        <div class="border-bottom border-color-1 mb-5">
                            <h3 class="section-title mb-0 pb-2 font-size-25">Detalles de envío</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Nombres
                                    </label>
                                    <p>{{ $pedido->nombre_envio }}</p>
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Apellidos
                                    </label>
                                    <p>{{ $pedido->apellido_envio }}</p>
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="w-100"></div>

                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Nombre de la Empresa (Opcional)
                                    </label>
                                    <p>{{ $pedido->nombre_empresa_envio }}</p>
                                </div>
                                <!-- End Input -->
                            </div>
                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Cédula o NIT (Opcional)
                                    </label>
                                    <p>{{ $pedido->numero_identificacion_envio }}</p>
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-md-8">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Dirección
                                    </label>
                                    <p>{{ $pedido->direccion_envio }}</p>
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-md-4">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Apto, Bloque, etc.
                                    </label>
                                    <p>{{ $pedido->direccion_adicional_envio }}</p>
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-md-12">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Departamento
                                    </label>
                                    <p>{{ $pedido->ciudadEnvio->departamento->nombre }}</p>
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="w-100"></div>


                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Ciudad
                                    </label>
                                    <p>{{ $pedido->ciudadEnvio->nombre }}</p>
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Email
                                    </label>
                                    <p>{{ $pedido->email_envio }}</p>
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Teléfono
                                    </label>
                                    <p>{{ $pedido->telefono_envio }}</p>
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="w-100"></div>
                        </div>
                        <!-- End Title -->
                        <!-- Accordion -->
                        <!-- Input -->
                        <div class="js-form-message mb-6">
                            <label class="form-label">
                                Comentario
                            </label>

                            <div class="input-group">
                                <p>{{ $pedido->comentario }}</p>
                            </div>
                        </div>
                        <!-- End Input -->
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
@endsection

@section('scripts')
    <script>
        $(document).on('ready', function () {
            // Boton de pago credito ferretero
            $("#stylishRadio1").click(function(){
                $("#stylishRadio2").prop('checked', false);
                console.log('cred ferretero')
                $("#basicsCollapseOnee").show();
                $("#basicsCollapseOnee2").hide();
            });

            $("#stylishRadio2").click(function(){
                $("#stylishRadio1").prop('checked', false);
                console.log('contado ferretero')
                $("#basicsCollapseOnee").hide();
                $("#basicsCollapseOnee2").show();
            });
        });
    </script>
    
@endsection
