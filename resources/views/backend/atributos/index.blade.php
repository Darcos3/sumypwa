@extends('backend.layouts.app')

@section('titulo', 'Atributos')

@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Atributos</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item active" aria-current="page">Listado</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('atributos.create') }}" type="button" class="btn btn-primary">Nuevo</a>
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
                                <th scope="col">Slug</th>
                                <th scope="col">Activa</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($atributos as $atributo)
                                <tr>
                                    <th scope="row">{{ $atributo->id }}</th>
                                    <td>{{ $atributo->nombre }}</td>
                                    <td>{{ $atributo->slug }}</td>
                                    <td>
                                        @if ($atributo->activa)
                                            <div class="font-22 text-success">	<i class="bx bx-check-circle"></i></div>
                                        @else
                                            <div class="font-22 text-danger">	<i class="bx bx-x-circle"></i></div>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('atributos.show', $atributo->slug) }}" target="_blank" type="button" class="btn btn-outline-dark"><i class="bx bx-file"></i>
                                            </a>
                                            <a href="{{ route('atributos.edit', $atributo->id) }}" type="button" class="btn btn-outline-dark"><i class="bx bx-edit-alt"></i>
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
