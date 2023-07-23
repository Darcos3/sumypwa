@extends('pwa.layouts.app')

@section('titulo', 'Inicio')

@section('styles')
    <style>
        .btn:hover {
            cursor: pointer !important;
            opacity: 0.8;
            box-shadow: 1px 2px 3px #222;
        }

        .rounded-circle {
            width: 80px;
            height: 80px;
        }

        #btnInicio {
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
    <!-- Background Video-->
    <video class="bg-video" playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
        <source src="{{ asset('pwa/assets/mp4/bg.mp4') }}" type="video/mp4" />
    </video>
    <!-- Masthead-->
    <div class="masthead">
        <div class="masthead-content text-white">
            <div class="col-md-12">
                <span id="btnInicio" class="nav-link" style="display:none">
                   <i class="fas fa-left-arrow"></i> Regresar al inicio  
                </span>
            </div>
            <div class="container-fluid px-4 px-lg-0 text-center">
                <img src="{{ asset('frontend/assets/images/logo-sumy@2xwhite.png') }}" class="img fluid"
                    style="width: 200px;">
                <div id="paso1">
                    <h3 class="fst-italic lh-1 mb-4 mt-3">¿Eres Repartidor de Sumy?</h3>
                    <p class="mb-5">Si formas parte de los repartidores de Sumy, ingresa a la plataforma donde
                        encontrarás distintas formas de llevar a cabo tus entregas.
                    </p>
                    <div class="row">
                        <div class="col text-center">
                            <img src="{{ asset('frontend/assets/images/venta-empresa.jpg') }}"
                                class="img-fluid rounded-circle"><br>
                            Ver ingresos diarios
                        </div>
                        <div class="col text-center">
                            <img src="{{ asset('frontend/assets/images/ve-ico1.png') }}" class="img-fluid rounded-circle">
                            <br>Ver tus entregas
                        </div>
                        <div class="col text-center">
                            <img src="{{ asset('frontend/assets/images/ve-ico3.png') }}" class="img-fluid rounded-circle">
                            <br>Gestionar tu ruta
                        </div>
                        <div class="col text-center">
                            <img src="{{ asset('frontend/assets/images/ve-ico2.png') }}" class="img-fluid rounded-circle">
                            <br>Te brindaremos aseoria
                        </div>
                        <img src="{{ asset('frontend/assets/images/sumy-img1.png') }}" class="img-fluid">
                    </div>

                    <div class="col-md-12 mt-3" style="text-align: right">
                        <button class="btn btn-primary" type="button" id="btnpaso1">Iniciar Sesión</button>
                    </div>
                </div>

                <div id="paso2" class="text-center mt-5" style="display:none">
                    <h3>Inicio de Sesión</h3>
                    <p>Por favor, ingresa tus datos de acceso al sistema de Sumy</p>
                    <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                        <div class="row">
                            <div class="form-group">
                                <input class="form-control" id="email" type="email"
                                    placeholder="Enter email address..." />
                            </div>
                            <div class="form-group mt-3">
                                <input class="form-control" id="password" type="password"
                                    placeholder="Enter email password..." />
                            </div>
                            <button class="btn btn-primary btn-block mt-3" type="submit">Iniciar
                                Sesión</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="social-icons">
        <div class="d-flex flex-row flex-lg-column justify-content-center align-items-center h-100 mt-3 mt-lg-0">
            <a class="btn btn-dark m-3" href="#!"><i class="fab fa-twitter"></i></a>
            <a class="btn btn-dark m-3" href="#!"><i class="fab fa-facebook-f"></i></a>
            <a class="btn btn-dark m-3" href="#!"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        $(document).ready(function() {
            $("#paso2").hide();

            $("#btnpaso1").click(function() {
                $("#paso1").hide();
                $("#paso2").fadeIn();
                $("#btnInicio").show();
            })

            $("#btnInicio").click(function(){
                $("#paso1").fadeIn();
                $("#btnInicio").hide();
                $("#paso2").hide();
            })
        })
    </script>
@endsection
