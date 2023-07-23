@extends('frontend.layouts.app')

@section('titulo', 'Iniciar')

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
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Mi Cuenta</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="container">
            <div class="mb-4">
                <h1 class="text-center">Mi cuenta</h1>
            </div>
            <div class="my-4 my-xl-8">
                <div class="row">
                    <div class="col-md-5 ml-xl-auto mr-md-auto mr-xl-0 mb-8 mb-md-0">
                        <!-- Title -->
                        <div class="border-bottom border-color-1 mb-6">
                            <h3 class="d-inline-block section-title mb-0 pb-2 font-size-26">Iniciar sesión</h3>
                        </div>
                        <p class="text-gray-90 mb-4">Bienvenido ... Inicia sesión</p>
                        <!-- End Title -->
                        <form class="js-validate" novalidate="novalidate">
                            <!-- Form Group -->
                            <div class="js-form-message form-group">
                                <label class="form-label" for="signinSrEmailExample3">Correo electrónico
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="email" class="form-control" name="email" id="signinSrEmailExample3" placeholder="Correo electrónico" aria-label="Correo electrónico" required
                                data-msg="Ingrese un correo válido"
                                data-error-class="u-has-error"
                                data-success-class="u-has-success">
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="js-form-message form-group">
                                <label class="form-label" for="signinSrPasswordExample2">Contraseña <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" name="password" id="signinSrPasswordExample2" placeholder="Contraseña" aria-label="Contraseña" required
                                data-msg="Tu contraseña es invalida."
                                data-error-class="u-has-error"
                                data-success-class="u-has-success">
                            </div>
                            <!-- End Form Group -->

                            <!-- Checkbox -->
                            <div class="js-form-message mb-3">
                                <div class="custom-control custom-checkbox d-flex align-items-center">
                                    <input type="checkbox" class="custom-control-input" id="rememberCheckbox" name="rememberCheckbox" required
                                    data-error-class="u-has-error"
                                    data-success-class="u-has-success">
                                    <label class="custom-control-label form-label" for="rememberCheckbox">
                                        Recordarme
                                    </label>
                                </div>
                            </div>
                            <!-- End Checkbox -->

                            <!-- Button -->
                            <div class="mb-1">
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary-dark-w px-5">Iniciar sesión</button>
                                </div>
                                <div class="mb-2">
                                    <a class="text-blue" href="#">¿Olvidó su contraseña?</a>
                                </div>
                            </div>
                            <!-- End Button -->
                        </form>
                    </div>
                    <div class="col-md-1 d-none d-md-block">
                        <div class="flex-content-center h-100">
                            <div class="width-1 bg-1 h-100"></div>
                            <div class="width-50 height-50 border border-color-1 rounded-circle flex-content-center font-italic bg-white position-absolute">o</div>
                        </div>
                    </div>
                    <div class="col-md-5 ml-md-auto ml-xl-0 mr-xl-auto">
                        <!-- Title -->
                        <div class="border-bottom border-color-1 mb-6">
                            <h3 class="d-inline-block section-title mb-0 pb-2 font-size-26">Registrarse</h3>
                        </div>
                        <p class="text-gray-90 mb-4">Cree una cuenta para aprovechar los beneficios de una experiencia de compra personalizada.</p>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- End Title -->
                        <!-- Form Group -->
                        <form class="js-validate" novalidate="novalidate" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="js-form-message form-group mb-5">
                                <label class="form-label" for="email">Correo electrónico
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Correo electrónico" aria-label="Correo electrónico" required
                                data-msg="Ingrese un correo válido"
                                data-error-class="u-has-error"
                                data-success-class="u-has-success">
                                @error('email')
                                    <span class="invalid-feedback" role="alert" style="display:block;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Form Group -->
                            <div class="js-form-message form-group">
                                <label class="form-label" for="contrasena">Contraseña <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" name="password" id="contrasena" placeholder="Contraseña" aria-label="Contraseña" required
                                data-msg="Tu contraseña es invalida."
                                data-error-class="u-has-error"
                                data-success-class="u-has-success">
                                @error('password')
                                    <span class="invalid-feedback" role="alert" style="display:block;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="js-form-message form-group">
                                <label class="form-label" for="confirmarContrasena">Confirmar Contraseña <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" name="password_confirmation" id="confirmarContrasena" placeholder="Contraseña" aria-label="Contraseña" required
                                data-msg="Tu contraseña es invalida."
                                data-error-class="u-has-error"
                                data-success-class="u-has-success">
                            </div>
                            <!-- End Form Group -->

                            <!-- End Form Group -->
                            <p class="text-gray-90 mb-4">Sus datos personales se utilizarán para respaldar su experiencia en este sitio web, para administrar su cuenta y para otros fines descritos en nuestra <a target="_blank" href="{{ asset('frontend/assets/archivos/politica_de_tratamiento_de_proteccion_de_datos_personales_de_los_titulares_sumy.pdf') }}" class="text-blue">política de privacidad.</a></p>
                            <!-- Button -->

                            
                            <div class="mb-6">
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary-dark-w px-5">Registrar</button>
                                </div>
                            </div>
                            <!-- End Button -->
                        </form>
                        <h3 class="font-size-18 mb-3">Al registrarse podrá: </h3>
                        <ul class="list-group list-group-borderless">
                            <li class="list-group-item px-0"><i class="fas fa-check mr-2 text-green font-size-16"></i> Posibilidad de suscribirse como mayorista</li>
                            <li class="list-group-item px-0"><i class="fas fa-check mr-2 text-green font-size-16"></i> Converirse en nuestro aliado como domiciliario</li>
                            <li class="list-group-item px-0"><i class="fas fa-check mr-2 text-green font-size-16"></i> Reporte de compras y envíos</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
