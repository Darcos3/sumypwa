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

        .text-primary {
            color: #f1592a !important;
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
                <img src="{{ asset('images/logo-sumy@2xwhite.png') }}" class="img fluid"
                    style="width: 200px;">
                    <h3 class="cover-heading mt-3">No Tienes Acceso al Sistema.</h3><br><br>
                    <p class="lead mt-4">Lo siento, pero tu no formas parte del equipo de transportadores de Sumy, por lo tanto no puedes acceder al sistema.<br>
                        <br>Te invitamos a que visites <a href="https://sumy.com.co" class="text-primary" target="_blank">www.sumy.com.co</a>, e inicies sesión con tu cuenta. 
                    </p>
                    <p class="lead">
                    <form method="post" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-lg btn-primary">Regresar al Inicio</button>
                    </form>
                    </p>
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
