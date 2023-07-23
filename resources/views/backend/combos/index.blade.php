@extends('backend.layouts.app')

@section('titulo', 'Combos')

@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Combos</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item active" aria-current="page">Listado</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group"  role="group">
                <a href="{{ route('combos.create') }}" type="button" class="btn btn-primary">Nuevo</a>
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
                                <th scope="col">Precio</th>
                                <th scope="col">Descuento</th>
                                <th scope="col">Precio Ferretero</th>
                                <th scope="col">Activo</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($combos as $combo)
                                <tr>
                                    <th scope="row">{{ $combo->id }}</th>
                                    <td>{{ $combo->nombre }}</td>
                                    <td>${{ number_format($combo->precio, 0, '.', '.')}}</td>
                                    <td>${{ number_format($combo->precio_descuento ?? 0, 0, '.', '.')}}</td>
                                    <td>${{ number_format($combo->precio_ferretero ?? 0, 0, '.', '.')}}</td>
                                </td>
                                <td>
                                    @if ($combo->activo)
                                        <div class="font-22 text-success">	<i class="bx bx-check-circle"></i></div>
                                    @else
                                        <div class="font-22 text-danger">	<i class="bx bx-x-circle"></i></div>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('combos.show', $combo->slug) }}" target="_blank" type="button" class="btn btn-outline-dark"><i class="lni lni-eye"></i>
                                        </a>
                                        <a href="{{ route('combos.edit', $combo->id) }}" type="button" class="btn btn-outline-dark"><i class="bx bx-edit-alt"></i>
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
