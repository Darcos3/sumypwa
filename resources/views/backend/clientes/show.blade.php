@extends('backend.layouts.app')

@section('titulo', 'Cliente')


@section('styles')
    <link href="{{ asset('backend/assets/css/basic.min.css') }}" rel="stylesheet">

    <link href="{{ asset('backend/assets/css/lightbox.min.css') }}" rel="stylesheet" />
@endsection


@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Cliente</div>
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
                        <h5 class="mb-0 text-primary">Datos del Cliente</h5>
                    </div>
                    <hr>
                    <div class="row g-3">
                        <form class="row g-3" id="registro" class="kt-form kt-form--label-right" method="POST" action="{{ route('clientes.actualizar', $cliente->id) }}" role="form" enctype='multipart/form-data'>
                        @csrf
                        {{ method_field('PATCH') }}
                            <div class="col-md-6">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="{{$cliente->name}}">
                            </div>
                            <div class="col-md-6">
                                <label for="apellidos" class="form-label">Apellidos</label>
                                <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{$cliente->apellidos}}">
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{$cliente->email}}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Celular</label>
                                <input type="tel" class="form-control" id="celular" name="celular" value="{{$cliente->celular}}">
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Cédula</label>
                                <input type="text" class="form-control" id="cedula" name="cedula" value="{{$cliente->cedula}}">
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Fecha de Cumpleaños</label>
                                <input type="date" class="form-control" id="birthday" name="birthday" value="{{$cliente->birthday}}">
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
                                <label for="direccion" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" value="{{$cliente->direccion}}">
                            </div>
                            
                            <div class="col-md-6">
                                <label for="Id" class="form-label">Id</label>
                                <input type="text" class="form-control" id="identificador" name="identificador" value="{{$cliente->id}}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="forma_pago" class="form-label">Forma de Pago</label>
                                <select class="form-control" id="formapago" name="forma_pago">
                                    @if( $cliente->formapago != '')
                                        <option value="{{$cliente->formapago}}">{{$cliente->formapago}}</option>
                                    @endif
                                    <option value="contado">Contado</option>
                                    <option value="credito">Crédito</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="sku" class="form-label">Estado</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" {{ $cliente->estado ? 'checked' : '' }}  name="estado" id="estado">
                                    <label class="form-check-label" for="estado">Seleccionar para habilitar el cliente</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary px-5">Guardar</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bx-purchase-tag me-1 font-22 text-primary"></i>
                        </div>
                        <h5 class="mb-0 text-primary">Órdenes realizadas</h5>
                    </div>
                    <hr>
                    <table class="table mb-0 table-hover table-sm">
                        <thead>
                            <tr>
                                <th scope="col">ID Pedido</th>
                                <th scope="col">Fecha creación</th>
                                <th scope="col">Fecha entrega</th>
                                <th scope="col">Total</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Novedades</th>
                                <th scope="col">Forma de Pago</th>
                                <th scope="col">Opciones</th>
                        </thead>
                        <tbody>
                            @foreach ($pedidosCliente as $pedido)
                                <tr>
                                    <td>{{ $pedido->id }}</td>
                                    <td>{{ $pedido->created_at}}</td>
                                    <td>{{ $pedido->created_at}}</td>
                                    <td>${{ number_format($pedido->total, 0, '.', '.')}}</td>
                                    <td>
                                        <div class="label text-left text-{{$pedido->estadoPedido->css}} w-100" style="font-size:0.8em">
                                            <b>{{ $pedido->estadoPedido->nombre }}</b>
                                        </div>
                                    </td>
                                    <td>
                                        @if($pedido->comentario == '')
                                        Sin novedades
                                        @else
                                        {{ $pedido->comentario}}</td>
                                        @endif
                                    <td>
                                        @if($pedido->estadoPedido->nombre == 'Por Pagar - Crédito Ferretero')
                                        Crédito
                                        @else
                                        Contado
                                        @endif
                                    </td>
                                    <td>
                                        <a title="Ver Pedido" href="{{ route('pedidos.show', $pedido->id) }}" type="button" class="btn btn-sm">
                                            {{-- <i class="lni lni-eye"></i> --}}
                                            <b>Ver detalles</b>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-center text-md-left mb-3 mb-md-0">Mostrando {{$pedidosCliente->firstItem()}}–{{$pedidosCliente->count()}} de {{$pedidosCliente->total()}}</div>
                    {{ $pedidosCliente->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('backend/assets/js/lightbox.min.js') }}"></script>
@endsection
