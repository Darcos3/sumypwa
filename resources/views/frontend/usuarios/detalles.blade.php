@extends('frontend.usuarios.layouts.usuarios')

@section('titulo', 'Cuenta')

@section('contenido')
    <h2>Detalles de la Cuenta</h2>

    <form class="account-information" method="POST" action="{{ route('usuarios.detalles.guardar') }}" role="form" enctype='multipart/form-data'>
        @csrf
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="js-form-message form-group">
                    <label class="form-label">Nombre </label>
                    <input class="form-control" name="name" type="text" class="input-text" value="{{ auth()->user()->name }}" required>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="js-form-message form-group">
                    <label class="form-label">Apellidos</label>
                    <input class="form-control" name="apellidos" type="text" class="input-text" value="{{ auth()->user()->apellidos }}" required>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="js-form-message form-group">
                    <label class="form-label">Correo Electrónico</label>
                    <input class="form-control" type="email" class="input-text" disabled value="{{ auth()->user()->email }}" required>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="js-form-message form-group">
                    <label class="form-label">Celular</label>
                    <input class="form-control" name="celular" type="text" class="input-text" value="{{ auth()->user()->celular }}" required>
                </div>
            </div>
            {{-- <div class="col-lg-6 col-md-6">
                <div class="js-form-message form-group">
                    <label class="form-label">Nueva contraseña</label>
                    <input class="form-control" type="password" class="input-text" value="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="js-form-message form-group">
                    <label class="form-label">Confirmar nueva contraseña</label>
                    <input class="form-control" name="password_confirmation" type="text" class="input-text" value="">
                </div>
            </div> --}}
            <div class="col-lg-6 col-md-6">
                <div class="js-form-message form-group">
                    <label class="form-label">Cédula</label>
                    <input class="form-control" name="cedula" type="text" class="input-text" value="{{ auth()->user()->cedula }}" required>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="js-form-message form-group">
                    <label class="form-label">Fecha de Cumpleaños</label>
                    <input class="form-control" name="birthday" type="date" class="input-text" value="{{ auth()->user()->birthday }}" required>
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <label for="ciudad" class="form-label">Ciudad</label>
                <select id="ciudad" name="ciudad" class="form-control" required>
                    @foreach ($ciudades as $ciudad)
                        {{-- @if( auth()->user()->id_ciudad != '')
                            <option value="{{ auth()->user()->id_ciudad }}">{{ $ciudad->nombre }}</option>
                        @endif --}}
                        <option value="{{ $ciudad->id }}" {{ $ciudad->id == auth()->user()->id_ciudad ? 'selected' : '' }}>{{ $ciudad->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="js-form-message form-group">
                    <label class="form-label">Dirección</label>
                    <input class="form-control" name="direccion" type="text" class="input-text" value="{{ auth()->user()->direccion }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <label for="forma_pago" class="form-label">Forma de Pago</label>
                <select class="form-control" id="formapago" name="forma_pago" required>
                    {{-- @if( auth()->user()->forma_pago != '')
                        <option value="{{ auth()->user()->forma_pago }}">{{ auth()->user()->forma_pago }}</option>
                    @endif --}}
                    <option value="contado" {{ 'contado' == auth()->user()->forma_pago ? 'selected' : '' }}>Contado</option>
                    <option value="credito" {{ 'credito' == auth()->user()->forma_pago ? 'selected' : '' }}>Crédito</option>
                </select>
            </div>
        </div>
        <div class="mb-6">
            <div class="mb-3 mt-3">
                <button type="submit" class="btn btn-primary-dark-w px-5">Guardar</button>
            </div>
        </div>
    </form>
@endsection
