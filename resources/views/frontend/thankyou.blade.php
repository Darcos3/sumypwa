@extends('frontend.layouts.app')

@section('titulo', 'Thank You')

@section('content')
    <!-- breadcrumb -->
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <!-- breadcrumb -->
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="../home/index.html">Inicio</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Confirmación pedido</li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="container">
        <div class="mb-4">
            <h1 class="text-center">PEDIDO RECIBIDO</h1>
            <p class="entry-subtitle text-gray-44 text-center">Gracias tu orden ha sido recibida</p>
        </div>
        <div class="my-4 my-xl-8">
            <div class="row">

                <div class="col-lg-7">
                    <div class="mb-4">
                        <!-- Title -->
                        <div class="border-bottom border-color-1 mb-5">
                            <h3 class="section-title mb-0 pb-2 font-size-25">Detalles de la orden</h3>
                        </div>
                        <!-- End Title -->

                        <!-- Billing Form -->
                        <div class="row">
                            <div class="col-md-4">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Número de Orden
                                    </label>
                                    125456789
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-md-4">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Fecha
                                    </label>
                                    SEPTIEMBRE 31, 2023
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-md-4">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Total
                                    </label>
                                    $122.085.000
                                </div>
                                <!-- End Input -->
                            </div>


                            <div class="w-100"></div>

                            
                            <div class="col-md-4">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Metodo de pago
                                    </label>
                                    PAYU - PASARELA DE PAGO
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-md-4">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Estado de la transacción
                                    </label>
                                    APROBADA
                                </div>
                                <!-- End Input -->
                            </div>

                           </div>

                            <div class="border-bottom border-color-1 mb-5">
                                <h3 class="section-title mb-0 pb-2 font-size-25">Información del cliente</h3>
                            </div>

                            <div class="row">

                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="mb-6 card-detalle-orden">
                                    <label class="form-label">
                                        DETALLES DE FACTURACIÓN
                                    </label>
                                    Juan Ignacio Rojas Torres<br>
                                    Calle 123 Av. Siempre Viva<br>
                                    Unidad Milesa Tower<br>
                                    Cali, Valle del Cauca<br>
                                    Colombia<br>
                                    <i class="far fa-envelope"></i> juanrojas@gmail.com<br>
                                    <i class="fa fa-phone"></i> 321 658 7414
                                    
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="mb-6 card-detalle-orden">
                                    <label class="form-label">
                                        DETALLES DE ENVÍO
                                    </label>
                                    Juan Ignacio Rojas Torres<br>
                                    Calle 123 Av. Siempre Viva<br>
                                    Unidad Milesa Tower<br>
                                    Cali, Valle del Cauca<br>
                                    Colombia<br>
                                    <i class="far fa-envelope"></i> juanrojas@gmail.com<br>
                                    <i class="fa fa-phone"></i> 321 658 7414
                                </div>
                                <!-- End Input -->
                            </div>


                            <div class="w-100"></div>
                        </div>
                        <!-- End Billing Form -->

                    </div>
                </div>


                <div class="col-lg-5 mb-7 mb-lg-0">
                    <div class="pl-lg-3 ">
                        <div class="bg-gray-1 rounded-lg">
                            <!-- Order Summary -->
                            <div class="p-4 mb-4 checkout-table">
                                <!-- Title -->
                                <div class="border-bottom border-color-1 mb-5">
                                    <h3 class="section-title mb-0 pb-2 font-size-25">Resumen del pedido</h3>
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
                                        <tr class="cart_item">
                                            <td>Taladro PRO - MAKITA<strong class="product-quantity">× 1</strong></td>
                                            <td>$1.100.000</td>
                                        </tr>
                                        <tr class="cart_item">
                                            <td>Sierra electrica - FALCON X<strong class="product-quantity">× 1</strong></td>
                                            <td>$685.000</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Subtotal</th>
                                            <td>$1.985.000</td>
                                        </tr>
                                        <tr>
                                            <th>Envío</th>
                                            <td>$30.000</td>
                                        </tr>
                                        <tr>
                                            <th>Total</th>
                                            <td><strong>$2.085.000</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <!-- End Product Content -->
                                
                            </div>
                            <!-- End Order Summary -->
                        </div>
                    </div>
                </div>

                
            </div>
        </div>
    </div>
@endsection