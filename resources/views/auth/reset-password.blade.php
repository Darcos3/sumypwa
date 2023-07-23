@extends('frontend.layouts.app')

@section('titulo', 'Reestablecer Contraseña')

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
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Reestablecer Contraseña
                            </li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="container">
            <div class="mb-4">
                <h1 class="text-center">Reestablecer Contraseña</h1>
            </div>
            <div class="my-4 my-xl-8">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <!-- Title -->
                        {{-- <div class="border-bottom border-color-1 mb-6">
                            <h3 class="d-inline-block section-title mb-0 pb-2 font-size-26">Iniciar sesión</h3>
                        </div> --}}
                        <p class="text-gray-90 mb-4">Ingrese su nueva contraseña.</p>
                        <!-- End Title -->
                        <form class="js-validate" novalidate="novalidate" method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <!-- Form Group -->
                            <div class="js-form-message form-group">
                                <label class="form-label" for="signinSrEmailExample3">Correo electrónico
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="email" class="form-control" name="email" id="signinSrEmailExample3"
                                    placeholder="Correo electrónico" aria-label="Correo electrónico" required
                                    data-msg="Ingrese un correo válido" data-error-class="u-has-error"
                                    data-success-class="u-has-success"
                                    value="{{ old('email', $request->email) }}" required autofocus >
                                @error('email')
                                    <span class="invalid-feedback" role="alert" style="display:block;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="js-form-message form-group">
                                <label class="form-label" for="signinSrEmailExample3">Contraseña
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="password" class="form-control" name="password" id="signinSrEmailExample3"
                                    placeholder="Contraseña" aria-label="Contraseña" required
                                    data-msg="Ingrese un correo válido" data-error-class="u-has-error"
                                    data-success-class="u-has-success"
                                    required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert" style="display:block;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="js-form-message form-group">
                                <label class="form-label" for="signinSrEmailExample3">Confirmar Contraseña
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="password" class="form-control" name="password_confirmation" id="signinSrEmailExample3"
                                    placeholder="Contraseña" aria-label="Contraseña" required
                                    data-msg="Ingrese un correo válido" data-error-class="u-has-error"
                                    data-success-class="u-has-success"
                                    required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert" style="display:block;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- End Form Group -->

                            <!-- Button -->
                            <div class="mb-1">
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary-dark-w px-5">Reestablecer</button>
                                </div>
                            </div>
                            <!-- End Button -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
