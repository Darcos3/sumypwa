@extends('frontend.layouts.app')

@section('titulo', 'Envío')

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
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Envío</li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="container">
        <div class="mb-5">
            <h1 class="text-center">Envío</h1>
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
        {{-- <form class="js-validate" novalidate="novalidate" action="{{route('')}}"> --}}
        <form method="POST" action="{{ route('usuarios.envio-guardar') }}" role="form" enctype='multipart/form-data'>
                @csrf
            <div class="row">
                <div class="col-lg-5 order-lg-2 mb-7 mb-lg-0">
                    <div class="pl-lg-3">
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
                                        @foreach ($productos as $producto)
                                            <tr class="cart_item">
                                                <td><strong class="product-quantity">{{ $producto->pivot->cantidad }} × </strong>{{ $producto->nombre}}&nbsp;</td>
                                                <td>${{ number_format($producto->pivot->cantidad * $producto->menorPrecio(),0,'.','.')  }}</td>
                                            </tr>
                                        @endforeach
                                        @foreach ($combos as $combo)
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
                                            {{-- <td>${{ number_format($sub,0,'.','.')}}</td> --}}
                                        </tr>
                                        <tr>
                                            <th>Descuento por Cupón</th>
                                            <td>${{ number_format( $cupon ,0,'.','.')}}</td>
                                        </tr>
                                        <tr>
                                            <th>Iva</th>
                                            <td>${{  number_format($iva,0,'.','.') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Envío</th>
                                            <td>${{  number_format($envio,0,'.','.') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Total</th>
                                            {{-- <td><strong>${{ number_format($total + $cupon,0,'.','.') }}</strong></td> --}}
                                            <td><strong>${{ number_format($tot,0,'.','.') }}</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <!-- End Product Content -->
                                <div class="form-group d-flex align-items-center justify-content-between px-3 mb-5">

                                    <div class="d-md-flex">
                                        <button type="submit" class="btn btn-primary-dark-w ml-md-2 px-5 px-md-4 px-lg-5 w-100 w-md-auto d-none d-md-inline-block">Ir a pagar</button>
                                        {{-- <a href="{{ route('usuarios.checkout') }}" class="btn btn-primary-dark-w ml-md-2 px-5 px-md-4 px-lg-5 w-100 w-md-auto d-none d-md-inline-block">Ir a pagar</a> --}}
                                    </div>


                                    {{-- <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck10" required
                                            data-msg="Please agree terms and conditions."
                                            data-error-class="u-has-error"
                                            data-success-class="u-has-success">
                                        <label class="form-check-label form-label" for="defaultCheck10">
                                            He leido y acepto los <a href="#" class="text-blue">términos y condiciones</a>, y <a class="text-blue" href="{{ asset('frontend/assets/archivos/autorizacion_de_tratamiento_de_datos_personles_sumy.pdf') }}" target="_blank">autorizo tratamiento de datos</a> de SUMY.
                                            <span class="text-danger">*</span>
                                        </label>
                                    </div> --}}
                                </div>
                                {{-- <div class="border-top border-width-3 border-color-1 pt-3 mb-3">
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
                                                        data-amount-in-cents="{{$total*100 }}"
                                                        data-reference="{{ $pedido->id }}"
                                                        data-signature:integrity="{{ $signature }}"
                                                        data-customer-data:email="{{auth()->user()->email }}"
                                                        data-customer-data:full-name="{{auth()->user()->name }}"
                                                        data-redirect-url="http://68.183.50.234:50331/pagos/wompi/respuesta"
                                                        >
                                                        </script>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Card -->
                                        <!-- Card -->
                                        @if ( isset(auth()->user()->ferretero) && auth()->user()->ferretero->estado_ferretero_id == 2)
                                            <div class="border-bottom border-color-1 border-dotted-bottom">
                                                    <div class="p-3" id="basicsHeadingOne">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" id="stylishRadio1" name="stylishRadio" checked>
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
                                                    data-parent="#basicsAccordion1">
                                                    <div class="p-4">
                                                        El pago se hará a crédito.
                                                    </div>
                                                    <a href="{{ route('pedidos.respuesta-ferretero', $pedido->id) }}" class="btn btn-primary-dark-w ml-md-2 px-5 px-md-4 px-lg-5 w-100 w-md-auto d-none d-md-inline-block">Pagar a crédito</a>
                                                </div>
                                            </div>
                                        @endif
                                        <!-- End Card -->
                                    </div>
                                    <!-- End Basics Accordion -->
                                </div> --}}

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
                            <div class="col-md-12">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Escoger una dirección ya almacenada
                                        {{-- <span class="text-danger">*</span> --}}
                                    </label>
                                    <select id="direccion" name="direccion_facturacion_id" data-tipo="facturacion" class="form-control js-select selectpicker dropdown-select direccion" data-success-class="u-has-success"
                                        data-live-search="true"
                                        data-style="form-controlborder-color-1 font-weight-normal">
                                        <option value="">Seleccionar Dirección</option>
                                        @foreach ($direcciones as $direccion)
                                            <option value="{{ $direccion->id }}">{{ $direccion->tipo.': '.$direccion->direccion.' '.$direccion->comentario }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- End Input -->
                            </div>
                            <div class="col-md-8">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Nombre de la dirección
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control facturacion nombre_direccion" name="nombre_direccion" placeholder="Ejemplo: Principal, Casa, etc" aria-label="Mi Negocio" required="" data-msg="Ingrese el nombre de la dirección." data-error-class="u-has-error" data-success-class="u-has-success" autocomplete="off">
                                </div>
                                <!-- End Input -->
                            </div> <div class="col-md-4">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        ¿Crear dirección?
                                        {{-- <span class="text-danger">*</span> --}}
                                    </label>
                                    <div id="shopCartHeadingFour" class="custom-control custom-checkbox d-flex align-items-center">
                                        <input type="checkbox" name="crear_nueva_facturacion" class="custom-control-input" id="crear_nueva_facturacion">
                                        <label class="custom-control-label form-label" for="crear_nueva_facturacion">
                                            Crear como nueva dirección
                                        </label>
                                    </div>
                                </div>
                                <!-- End Input -->
                            </div>
                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Nombres
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control facturacion nombre" name="nombre_facturacion" placeholder="Escriba su nombre" aria-label="Escriba su nombre" required="" data-msg="Por favor escriba su nombre." data-error-class="u-has-error" data-success-class="u-has-success" autocomplete="off">
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Apellidos
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control facturacion apellido" name="apellido_facturacion" placeholder="Escriba sus apellidos" aria-label="Escriba sus apellidos" required="" data-msg="Por favor escriba sus apellidos." data-error-class="u-has-error" data-success-class="u-has-success">
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
                                    <input type="text" class="form-control facturacion nombre_empresa" name="nombre_empresa_facturacion" placeholder="Empresa" aria-label="Empresa" data-msg="Por favor ingrese el nombre de la Empresa." data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>
                                <!-- End Input -->
                            </div>
                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Cédula o NIT (Opcional)
                                    </label>
                                    <input type="text" class="form-control facturacion numero_identificacion" name="numero_identificacion_facturacion" placeholder="Cédula o NIT" aria-label="Cedula o NIT" data-msg="Por favor ingrese cédula o NIT." data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-md-8">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Dirección
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control facturacion direccion" name="direccion_facturacion" placeholder="Dirección completa" aria-label="Dirección completa" required="" data-msg="Por favor ingrese valid address." data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-md-4">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Conjunto, Bloque, Apto.
                                    </label>
                                    <input type="text" class="form-control facturacion direccion_adicional" name="direccion_adicional_facturacion" placeholder="Conjunto, Bloque, Apto" aria-label="Conjunto, Bloque, Apto" data-msg="Por favor ingrese si es un conjunto, bloque o apto." data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-md-12">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Departamento
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select id="departamento_id" data-ciudad="ciudad_id" name="departamento_id_facturacion" class="form-control facturacion departamento_id departamento" required="" data-msg="Por favor seleccione un departamento." data-error-class="u-has-error" data-success-class="u-has-success"
                                        data-live-search="true"
                                        data-style="form-controlborder-color-1 font-weight-normal">
                                        <option value="">Seleccionar Departamento</option>
                                        @foreach ($departamentos as $departamento)
                                            <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="w-100"></div>


                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Ciudad
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select id="ciudad_id" name="ciudad_id_facturacion" class="form-control facturacion ciudad_id" required="" data-msg="Por favor seleccione la ciudad." data-error-class="u-has-error" data-success-class="u-has-success"
                                        data-live-search="true"
                                        data-style="form-controlborder-color-1 font-weight-normal">
                                        <option value="">Seleccionar Ciudad</option>
                                        {{-- @foreach ($ciudades as $ciudad)
                                            <option value="{{ $ciudad->id }}">{{ $ciudad->nombre }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Email
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="email" name="email_facturacion" class="form-control facturacion email" placeholder="jackwayley@gmail.com" aria-label="usuario@gmail.com" required="" data-msg="Por favor ingrese valid email address." data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Teléfono
                                    </label>
                                    <input type="text" name="telefono_facturacion" class="form-control facturacion telefono" placeholder="3XX XXX XXXX" aria-label="3XX XXX XXXX" data-msg="Please enter your last name." data-error-class="u-has-error" data-success-class="u-has-success">
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
                                            <span class="text-danger">*</span>
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
                        <!-- End Title -->
                        <!-- Accordion -->
                        <div id="shopCartAccordion3" class="accordion rounded mb-5">
                            <!-- Card -->
                            <div class="card border-0">
                                <div id="shopCartHeadingFour" class="custom-control custom-checkbox d-flex align-items-center">
                                    <input type="checkbox" name="envio_diferente" class="custom-control-input" id="envio_diferente" name="envio_diferente" >
                                    <label class="custom-control-label form-label" for="envio_diferente" data-toggle="collapse" data-target="#shopCartfour" aria-expanded="false" aria-controls="shopCartfour">
                                        ¿Enviar a una dirección diferente?
                                    </label>
                                </div>
                                <div id="shopCartfour" class="collapse mt-5" aria-labelledby="shopCartHeadingFour" data-parent="#shopCartAccordion3" style="">
                                    <!-- Shipping Form -->
                                    <div class="row">
                                        <div class="col-md-12">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Escoger una dirección ya almacenada
                                        {{-- <span class="text-danger">*</span> --}}
                                    </label>
                                    <select id="direccion_id2" data-tipo="envio" name="direccion_envio_id" class="form-control js-select selectpicker dropdown-select direccion" data-success-class="u-has-success"
                                        data-live-search="true"
                                        data-style="form-controlborder-color-1 font-weight-normal">
                                        <option value="">Seleccionar Dirección</option>
                                        @foreach ($direcciones as $direccion)
                                            <option value="{{ $direccion->id }}">{{ $direccion->tipo.': '.$direccion->direccion.' '.$direccion->comentario }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- End Input -->
                            </div>
                            <div class="col-md-8">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Nombre de la dirección
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control envio nombre_direccion" name="nombre_direccion2" placeholder="Mi Negocio" aria-label="Mi Negocio" data-msg="Ingrese el nombre de la dirección." data-error-class="u-has-error" data-success-class="u-has-success" autocomplete="off">
                                </div>
                                <!-- End Input -->
                            </div> <div class="col-md-4">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        ¿Crear dirección?
                                        {{-- <span class="text-danger">*</span> --}}
                                    </label>
                                    <div id="shopCartHeadingFour" class="custom-control custom-checkbox d-flex align-items-center">
                                        <input type="checkbox" name="crear_nueva_envio" class="custom-control-input" id="crear_nueva_envio">
                                        <label class="custom-control-label form-label" for="crear_nueva_envio">
                                            Crear como nueva dirección
                                        </label>
                                    </div>
                                </div>
                                <!-- End Input -->
                            </div>
                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Nombres
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control envio  nombre" name="nombre2" placeholder="Jack" aria-label="Jack" data-msg="Please enter your frist name." data-error-class="u-has-error" data-success-class="u-has-success" autocomplete="off">
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Apellidos
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control envio  apellido" name="apellido2" placeholder="Wayley" aria-label="Wayley" data-msg="Please enter your last name." data-error-class="u-has-error" data-success-class="u-has-success">
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
                                    <input type="text" class="form-control envio  nombre_empresa" name="nombre_empresa2" placeholder="Empresa" aria-label="Empresa" data-msg="Por favor ingrese Empresa." data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>
                                <!-- End Input -->
                            </div>
                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Cédula o NIT (Opcional)
                                    </label>
                                    <input type="text" class="form-control envio  numero_identificacion" name="numero_identificacion2" placeholder="Cédula o NIT" aria-label="Empresa" data-msg="Por favor ingrese Empresa." data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-md-8">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Dirección
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control envio  direccion" name="direccion2" placeholder="Dirección completa" aria-label="Dirección completa" data-msg="Por favor ingrese valid address." data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-md-4">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Apto, Bloque, etc.
                                    </label>
                                    <input type="text" class="form-control envio  direccion_adicional" name="direccion_adicional2" placeholder="Bloque 001, Apto 001" aria-label="Bloque 001, Apto 001" data-msg="Por favor ingrese valid address." data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-md-12">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Departamento
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select id="departamento_id2" name="departamento_id2" data-ciudad="ciudad_id2" class="form-control envio departamento_id departamento" data-msg="Please select state." data-error-class="u-has-error" data-success-class="u-has-success"
                                        data-live-search="true"
                                        data-style="form-controlborder-color-1 font-weight-normal">
                                        <option value="">Seleccionar Departamento</option>
                                        @foreach ($departamentos as $departamento)
                                            <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="w-100"></div>


                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Ciudad
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select id="ciudad_id2" name="ciudad_id2" class="form-control envio ciudad_id" data-msg="Please select state." data-error-class="u-has-error" data-success-class="u-has-success"
                                        data-live-search="true"
                                        data-style="form-controlborder-color-1 font-weight-normal">
                                        <option value="">Seleccionar Ciudad</option>
                                        {{-- @foreach ($ciudades as $ciudad)
                                            <option value="{{ $ciudad->id }}">{{ $ciudad->nombre }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Email
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="email" name="email2" class="form-control envio email" placeholder="jackwayley@gmail.com" aria-label="jackwayley@gmail.com" data-msg="Por favor ingrese valid email address." data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Teléfono
                                    </label>
                                    <input type="text" name="telefono2" class="form-control envio telefono" placeholder="3XX XXX XXXX" aria-label="3XX XXX XXXX" data-msg="Please enter your last name." data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="w-100"></div>
                                    </div>
                                    <!-- End Shipping Form -->
                                </div>
                            </div>
                            <!-- End Card -->
                        </div>
                        <!-- End Accordion -->
                        <!-- Input -->
                        <div class="js-form-message mb-6">
                            <label class="form-label">
                                Comentario (opcional)
                            </label>

                            <div class="input-group">
                                <textarea class="form-control p-5" rows="4" name="comentario" placeholder="Comentario adicional sobre el envío."></textarea>
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
    <script type="text/javascript">
        $(".departamento" ).change(function() {
            console.log('cambia ciudad');
            var dep_id = $( this ).val();
            var ciudad = $( this ).attr('data-ciudad');
            console.log(dep_id);
            console.log(ciudad);
            $.ajax({
                type:"GET",
                url:"/departamentos/"+dep_id,
                success: function(data) {
                    $('#'+ciudad) .find('option') .remove() .end() .append('<option value="">Escoja una ciudad</option>') .val('whatever');
                    $.each(data, function(key, value) {
                        $("#"+ciudad).append('<option value="'+value.id+'">'+value.nombre+'</option>');
                    });
                }
            });
        });
        $(".direccion" ).change(function() {
            var dir_id = $( this ).val();
            var tipoDireccion = $(this).attr('data-tipo');
            $.ajax({
                type:"GET",
                url:"/direcciones/"+dir_id,
                success: function(data) {
                    $('.'+tipoDireccion+'.nombre_direccion').val(data.tipo);
                    $('.'+tipoDireccion+'.nombre').val(data.nombres);
                    $('.'+tipoDireccion+'.apellido').val(data.apellidos);
                    $('.'+tipoDireccion+'.nombre_empresa').val(data.nombre_empresa);
                    $('.'+tipoDireccion+'.numero_identificacion').val(data.documento);
                    $('.'+tipoDireccion+'.direccion').val(data.direccion);
                    $('.'+tipoDireccion+'.direccion_adicional').val(data.comentario);
                    $('.'+tipoDireccion+'.departamento_id option[value='+data.departamento_id+']').prop("selected", true);
                    $('.'+tipoDireccion+'.email').val(data.email);
                    $('.'+tipoDireccion+'.telefono').val(data.telefono);
                    $('.'+tipoDireccion+'.ciudad_id') .find('option') .remove() .end() .append('<option value="">Escoja una ciudad</option>') .val('whatever');
                    $.each(data.ciudades, function(key, value) {
                        $('.'+tipoDireccion+'.ciudad_id').append('<option value="'+value.id+'">'+value.nombre+'</option>');
                    });
                    $('.'+tipoDireccion+'.ciudad_id option[value='+data.ciudad_id+']').prop("selected", true);

                }
            });
        });
        // Al escoger enviar a una dirección diferente, le pone required a ciertos campos
        $("#envio_diferente" ).change(function() {

            console.log($(this).is(':checked'));
            if ($(this).is(':checked')) {
                console.log('pone required');
                $('.envio.nombre_direccion').prop("required", true);
                $('.envio.nombre').prop("required", true);
                $('.envio.apellido').prop("required", true);
                $('.envio.direccion').prop("required", true);
                $('.envio.departamento').prop("required", true);
                $('.envio.ciudad_id').prop("required", true);
                $('.envio.email').prop("required", true);
            } else {
                console.log('quita required');
                $('.envio.nombre_direccion').prop("required", false);
                $('.envio.nombre').prop("required", false);
                $('.envio.apellido').prop("required", false);
                $('.envio.direccion').prop("required", false);
                $('.envio.departamento').prop("required", false);
                $('.envio.ciudad_id').prop("required", false);
                $('.envio.email').prop("required", false);
            }

        });
    </script>
@endsection
