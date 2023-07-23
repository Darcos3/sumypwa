@extends('frontend.usuarios.layouts.usuarios')

@section('titulo', 'Cambio de contraseña')

@section('contenido')
    <h2>Cambio de Contraseña</h2>
    <p>
        Debes ingresar tu contraseña actual, y luego la contraseña nueva por la cual deseas cambiar.
    </p>

    @if($msg == 'error')
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Error</h4>
            <p>¡La contraseña que ingresaste como actual no es la correcta, intenta nuevamente!</p>
        </div>
    @endif

    @if($msg == 'error-new-password')
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Error</h4>
            <p>¡Al confirmar la nueva contraseña, ingresaste otra distinta, intenta nuevamente!</p>
        </div>
    @endif
    

    @if($msg == 'success')
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Correcto</h4>
            <p>¡Tu contraseña ha sido actualizada correctamente!</p>
        </div>
    @endif

    <div class="row mt-4 mb-4">
        <form method="POST" action="{{ route('usuarios.cambiarcontrasena')}}" class="col-md-12">
            @csrf

            <div class="row">
                <div class="col-md-4">
                    <label for="">Contraseña Actual</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
                        </div>
                        <input type="password" name="password" placeholder="Ingrese contraseña actual" style="font-size: 0.9em" class="form-control" required>
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="">Nueva Contraseña</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
                        </div>
                        <input type="password" name="newpassword" placeholder="Ingrese nueva contraseña" style="font-size: 0.9em" class="form-control" required>
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="">Confirmar Nueva Contraseña</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
                        </div>
                        <input type="password" name="confirmarnewpassword" placeholder="Confirme nueva contraseña" style="font-size: 0.9em" class="form-control" required>
                    </div>
                </div>
                
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary mt-4">Cambiar contraseña</button>
                </div>
            </div>
        </form>
    </div>
@endsection

