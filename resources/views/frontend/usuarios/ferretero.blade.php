@extends('frontend.usuarios.layouts.usuarios')

@section('titulo', 'Cuenta')

@section('contenido')
<div class="col-md-8">
    <h2>Crear perfil mayorista</h2>


    @if (auth()->user()->ferretero)
        <p>Su análisis está en proceso. Una vez se defina, nos comunicaremos con ustedes. Gracias.</p>
    @else
        <p>Por favor diligencia toda la información del siguiente formulario, tu solicitud será procesada en el menor tiempo posible y te comunicaremos vía email cuando ya puedas empezar a disfrutar de las ventajas de tu <strong>perfil ferretero</strong>.</p>
        <form class="account-information" id="registro" class="kt-form kt-form--label-right" method="POST" action="{{ route('usuarios.ferretero.guardar') }}" role="form" enctype='multipart/form-data'>
            @csrf
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="js-form-message form-group">
                        <label class="form-label">Nombre Ferreteria</label>
                        <input class="form-control" type="text" class="input-text" name="nombre_ferreteria" required>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="js-form-message form-group">
                        <label class="form-label">NIT</label>
                        <input class="form-control" type="text" class="input-text" name="nit" required>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="js-form-message form-group">
                        <label class="form-label">Dirección ferreteria</label>
                        <input class="form-control" type="text" class="input-text" name="direccion" required>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="js-form-message form-group">
                        <label class="form-label">Número contacto</label>
                        <input class="form-control" type="text" class="input-text" name="numero_contacto" required>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="js-form-message form-group">
                        <label class="form-label">Correo electrónico</label>
                        <input class="form-control" type="email" class="input-text" name="email" required>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="js-form-message form-group">
                        <label class="form-label">Nombre representante</label>
                        <input class="form-control" type="text" class="input-text" name="nombre_representante" required>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="js-form-message form-group">
                        <label class="form-label">Celular</label>
                        <input class="form-control" type="text" class="input-text" name="celular" required>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="js-form-message form-group">
                        <label class="form-label">Foto de la Cámara de Comercio</label>
                        <input class="form-control" type="file" class="input-text" name="camara_comercio" required>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="js-form-message form-group">
                        <label class="form-label">Foto de la Cédula</label>
                        <input class="form-control" type="file" class="input-text" name="foto_cedula" required>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="js-form-message form-group">
                        <label class="form-label">Foto del RUT</label>
                        <input class="form-control" type="file" class="input-text" name="foto_rut" required>
                    </div>
                </div>
            </div>
            <div class="mb-6">
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary-dark-w px-5">Guardar</button>
                </div>
            </div>
        </form>
    @endif
</div>
@endsection
