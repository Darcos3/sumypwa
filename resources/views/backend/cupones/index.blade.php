@extends('backend.layouts.app')

@section('titulo', 'Cupones')

@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Cupones</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item active" aria-current="page">Listado</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('cupones.create') }}" type="button" class="btn btn-primary">Nuevo</a>
            </div>
        </div>
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
                                <th scope="col">Código</th>
                                <th scope="col">Descuento $</th>
                                <th scope="col">Descuento %</th>
                                <th scope="col">Usos</th>
                                <th scope="col">Vencimiento</th>
                                <th scope="col">Activo</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cupones as $cupon)
                                <tr>
                                    <th scope="row">{{ $cupon->id }}</th>
                                    <td>{{ $cupon->nombre }}</td>
                                    <td>{{ $cupon->codigo }}</td>
                                    <td>${{ number_format($cupon->descuento_dinero, 0, '.','.') }}</td>
                                    <td>{{ $cupon->descuento_porcentaje }}%</td>
                                    <td>{{ $cupon->usos }}</td>
                                    <td>{{ $cupon->vencimiento }}</td>
                                    <td>
                                        @if ($cupon->estado)
                                            <div class="font-22 text-success">	<i class="bx bx-check-circle"></i></div>
                                        @else
                                            <div class="font-22 text-danger">	<i class="bx bx-x-circle"></i></div>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            {{-- <a href="{{ route('cupones.show', $cupon->id) }}" target="_blank" type="button" class="btn btn-outline-dark"><i class="bx bx-file"></i></a> --}}
                                            <a href="{{ route('cupones.edit', $cupon->id) }}" type="button" class="btn btn-outline-dark"><i class="bx bx-edit-alt"></i></a>
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
