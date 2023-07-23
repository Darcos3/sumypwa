@extends('backend.layouts.app')

@section('titulo', 'Transportador')


@section('styles')
    <link href="{{ asset('backend/assets/css/basic.min.css') }}" rel="stylesheet">

    <link href="{{ asset('backend/assets/css/lightbox.min.css') }}" rel="stylesheet" />
@endsection


@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Transportador</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item active" aria-current="page">Validar</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-2">
        <div class="col-md-12">
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                        </div>
                        <h5 class="mb-0 text-primary">Datos del Transportador</h5>
                    </div>
                    <hr>
                    <div class="row g-3">
                        <form class="row g-3" id="registro" class="kt-form kt-form--label-right" method="POST" action="{{ route('transportadores.update', $transportador->id) }}" role="form" enctype='multipart/form-data'>
                        @csrf
                        {{ method_field('PATCH') }}
                            <div class="col-md-6">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="{{$transportador->name}}">
                            </div>
                            <div class="col-md-6">
                                <label for="apellidos" class="form-label">Apellidos</label>
                                <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{$transportador->apellidos}}">
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{$transportador->email}}">
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Celular</label>
                                <input type="tel" class="form-control" id="celular" name="celular" value="{{$transportador->celular}}">
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Cédula</label>
                                <input type="text" class="form-control" id="cedula" name="cedula" value="{{$transportador->cedula}}">
                            </div>
                            <div class="col-md-6">
                                <label for="ciudad" class="form-label">Ciudad</label>
                                <select id="ciudad" name="ciudad" class="form-control" required="">
                                    @foreach ($ciudades as $ciudad)
                                        <option value="{{ $ciudad->id }}">{{ $ciudad->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="sku" class="form-label">Estado</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" {{ $transportador->estado ? 'checked' : '' }}  name="estado" id="estado">
                                    <label class="form-check-label" for="estado">Seleccionar para habilitar el transportador</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary px-5">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
