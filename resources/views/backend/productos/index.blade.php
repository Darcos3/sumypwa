@extends('backend.layouts.app')

@section('titulo', 'Productos')

@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Productos</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item active" aria-current="page">Listado</li>
                </ol>
            </nav>
        </div>
        <form method="POST" action="{{ route('productos.listadobuscar') }}" style="margin-left: 10px">
            @csrf
            <input type="text" class="form-control radius-30" placeholder="Buscar por nombre" name="termino" style="width: 70%; display: inline-block"></span>
            <button type="submit" class="btn btn-primary" style="display: inline-block">Buscar</button>
        </form>
        <div class="ms-auto">
            <a href="/productos/exportar" type="button" class="btn btn-primary mr-3">Descargar productos</a>
            <div class="btn-group"  role="group">
                <a href="{{ route('productos.importar') }}" type="button" class="btn btn-primary" style="margin-right: 5px">Importar</a>
                <a href="{{ route('productos.create') }}" type="button" class="btn btn-primary">Nuevo</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @if (Session::has('message'))
                    <div class="alert alert-success">{{ Session::get('message') }}</div>
                @endif
                <div class="card-body">
                    <table class="table mb-0 table-hover table-sm table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">SKU</th>
                                <th scope="col">nombre</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Descuento</th>
                                <th scope="col">Precio Ferretero</th>
                                <th scope="col">Existencias</th>
                                <th scope="col">Facturar sin existencias</th>
                                <th scope="col">Categoría principal</th>
                                <th scope="col">Etiquetas</th>
                                <th scope="col">Activo</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos as $producto)
                                <tr>
                                    <th scope="row">{{ $producto->id }}</th>
                                    <td>{{ $producto->sku }}</td>
                                    <td>{{ $producto->nombre }}</td>
                                    <td>${{ number_format($producto->precio, 0, '.', '.')}}</td>
                                    <td>
                                        <?php 
                                        if($producto->precio_descuento > 0){
                                            $descuento = 100 - ($producto->precio_descuento * 100 / $producto->precio);
                                            echo number_format($descuento, 0, ',', '.')." % de dcto";
                                        }
                                        else {
                                            echo number_format(0, 0, ',', '.')." % de dcto";
                                        }
                                        ?>
                                    </td>
                                    <td>${{ number_format($producto->precio_ferretero ?? 0, 0, '.', '.')}}</td>
                                    <td>{{ $producto->cantidad }}</td>
                                    <td>
                                        <?php
                                            if($producto->facturar_sinexistencias ==null){
                                                ?>No<?php
                                            }else {
                                                ?>Si<?php
                                            }
                                        ?>
                                    </td>
                                    <td>{{ $producto->categoria->nombre }}</td>
                                    <td>@forelse ($producto->etiquetas as $etiqueta)
                                        -{{$etiqueta->nombre}}
                                    @empty
                                        Sin etiquetas
                                    @endforelse
                                </td>
                                <td>
                                    @if ($producto->activo)
                                        <div class="font-22 text-success">	<i class="bx bx-check-circle"></i></div>
                                    @else
                                        <div class="font-22 text-danger">	<i class="bx bx-x-circle"></i></div>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        @if($producto->slug != '')
                                            <a href="{{ route('productos.show', $producto->slug) }}" target="_blank" type="button" class="btn btn-outline-dark"><i class="lni lni-eye"></i>
                                            </a>
                                        @endif
                                        
                                        <a href="{{ route('productos.edit', $producto->id) }}" type="button" class="btn btn-outline-dark"><i class="bx bx-edit-alt"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    
                </table>
                <table>
                    <tr class="d-md-flex justify-content-between align-items-center border-top pt-3" aria-label="Page navigation example">
                        <td>
                            {{ $productos->withQueryString()->links() }}
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
