@extends('backend.layouts.app')

@section('titulo', 'Transportes')

@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Transportes</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item active" aria-current="page">Listado</li>
                </ol>
            </nav>
        </div>
        {{-- <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('etiquetas.create') }}" type="button" class="btn btn-primary">Nueva</a>
            </div>
        </div> --}}
    </div>
    <!--end breadcrumb-->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table mb-0 table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">nombre</th>
                                <th scope="col">Dimensiones máximas</th>
                                <th scope="col">Peso máximo</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Activo</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transportes as $transporte)
                                <tr>
                                    <th scope="row">{{ $transporte->id }}</th>
                                    <td>{{ $transporte->nombre }}</td>
                                    <td>{{ $transporte->ancho }} x {{ $transporte->alto }} x {{ $transporte->largo }} cm</td>
                                    <td>{{ $transporte->peso }} kg</td>
                                    <td>${{ number_format($transporte->precio,0,',','.') }}</td>
                                    <td>
                                        @if ($transporte->activo)
                                            <div class="font-22 text-success">	<i class="bx bx-check-circle"></i></div>
                                        @else
                                            <div class="font-22 text-danger">	<i class="bx bx-x-circle"></i></div>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="#" type="button" class="btn btn-outline-dark"><i class="bx bx-edit-alt"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
