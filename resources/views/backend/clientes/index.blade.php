@extends('backend.layouts.app')

@section('titulo', 'Clientes')

@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Clientes</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item active" aria-current="page">Listado</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="/clientes/exportar" type="button" class="btn btn-primary">Descargar clientes</a>
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
                                <th scope="col">email</th>
                                <th scope="col">celular</th>
                                <th scope="col">Activo</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $cliente)
                                <tr>
                                    <th scope="row">{{ $cliente->id }}</th>
                                    <td>{{ $cliente->name.' '.$cliente->apellidos }}</td>
                                    <td>{{ $cliente->email }}</td>
                                    <td>{{ $cliente->celular }}</td>
                                    <td>
                                        @if ($cliente->estado)
                                            <div class="font-22 text-success">	<i class="bx bx-check-circle"></i></div>
                                        @else
                                            <div class="font-22 text-danger">	<i class="bx bx-x-circle"></i></div>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('clientes.show', $cliente->id) }}" type="button" class="btn btn-outline-dark"><i class="lni lni-eye"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-center text-md-left mb-3 mb-md-0">Mostrando {{$clientes->firstItem()}}–{{$clientes->count()}} de {{$clientes->total()}}</div>
                    {{ $clientes->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
