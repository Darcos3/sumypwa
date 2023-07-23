@extends('frontend.layouts.app')

@section('titulo', 'Quienes Somos')

@section('content')
    <main id="content" role="main">
        <div class="bg-img-hero mb-14" style="background-image: url(../../assets/img/1920x600/img1.jpg);">
            <div class="container">
                <div class="flex-content-center max-width-620-lg flex-column mx-auto text-center min-height-564">
                    <h1 class="h1 font-weight-bold">Quienes somos</h1>
                    <p class="text-gray-39 font-size-18 text-lh-default">Somos una empresa dedicada a la distribución de productos eléctricos y de ferretería al por mayor y al publico en general, estamos apostándole siempre a ser lideres en innovación tecnológica para lograr tiempos de entrega insuperables, disponibilidad de productos y excelencia en el servicio; logrando así ser un aliado estratégico de nuestros clientes.</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="card mb-3 border-0 text-center rounded-0">
                        <img class="img-fluid mb-3" src="{{ asset('frontend/assets/images/quienes-somos/img-beneficio1.jpg') }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="font-size-18 font-weight-semi-bold mb-3">No te llenes de inventario</h5>
                            <p class="text-gray-90 max-width-334 mx-auto">Contamos con un amplio surtido de productos a tu disposición.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="card mb-3 border-0 text-center rounded-0">
                        <img class="img-fluid mb-3" src="{{ asset('frontend/assets/images/quienes-somos/img-beneficio2.jpg') }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="font-size-18 font-weight-semi-bold mb-3">Cierra tus ventas</h5>
                            <p class="text-gray-90 max-width-334 mx-auto">Asegura a tu cliente y pídenos la mercancía sobre pedido.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="card mb-3 border-0 text-center rounded-0">
                        <img class="img-fluid mb-3" src="{{ asset('frontend/assets/images/quienes-somos/img-beneficio3.jpg') }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="font-size-18 font-weight-semi-bold mb-3">Aprovecha nuestra Inmediatez</h5>
                            <p class="text-gray-90 max-width-334 mx-auto">Disfruta de los envíos exprés con tiempos de entrega máximo de 3 horas.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="card mb-3 border-0 text-center rounded-0">
                        <img class="img-fluid mb-3" src="{{ asset('frontend/assets/images/quienes-somos/img-beneficio4.jpg') }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="font-size-18 font-weight-semi-bold mb-3">Programa tus despachos</h5>
                            <p class="text-gray-90 max-width-334 mx-auto">Adicional tenemos envíos en ruta con tiempos de entrega de máximo 24 horas.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="card mb-3 border-0 text-center rounded-0">
                        <img class="img-fluid mb-3" src="{{ asset('frontend/assets/images/quienes-somos/img-beneficio5.jpg') }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="font-size-18 font-weight-semi-bold mb-3">Ahora desde tu teléfono, Tablet o pc</h5>
                            <p class="text-gray-90 max-width-334 mx-auto">Y con tan solo un click, puedes comprar tus productos agotados.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="card mb-3 border-0 text-center rounded-0">
                        <img class="img-fluid mb-3" src="{{ asset('frontend/assets/images/quienes-somos/img-beneficio6.jpg') }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="font-size-18 font-weight-semi-bold mb-3">Incremente tus ingresos</h5>
                            <p class="text-gray-90 max-width-334 mx-auto">Te traemos excelentes precios que te permitirán competir y aumentar tu margen de ganancia.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="card mb-3 border-0 text-center rounded-0">
                        <img class="img-fluid mb-3" src="{{ asset('frontend/assets/images/quienes-somos/img-beneficio7.jpg') }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="font-size-18 font-weight-semi-bold mb-3">Amplia tu gama de productos</h5>
                            <p class="text-gray-90 max-width-334 mx-auto">estamos siempre a la vanguardia incorporando productos nuevos y novedosos.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="card mb-3 border-0 text-center rounded-0">
                        <img class="img-fluid mb-3" src="{{ asset('frontend/assets/images/quienes-somos/img-beneficio8.jpg') }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="font-size-18 font-weight-semi-bold mb-3">Ahorra</h5>
                            <p class="text-gray-90 max-width-334 mx-auto">Obtén descuentos, promociones especiales y más.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-3 border-0 text-center rounded-0">
                        <img class="img-fluid mb-3" src="{{ asset('frontend/assets/images/quienes-somos/img-beneficio9.jpg') }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="font-size-18 font-weight-semi-bold mb-3">Sin complicaciones</h5>
                            <p class="text-gray-90 max-width-334 mx-auto">Con nosotros encuentras una plataforma de fácil manejo, Rápida y segura.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
