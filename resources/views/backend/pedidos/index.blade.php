@extends('backend.layouts.app')

@section('titulo', 'Pedidos')

@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Pedidos</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item active" aria-current="page">Listado</li>
                </ol>
            </nav>
        </div>
        {{-- <div class="ms-auto">
            <div class="btn-group"  role="group">
                <a href="{{ route('productos.importar') }}" type="button" class="btn btn-primary">Importar</a>
                <a href="{{ route('productos.create') }}" type="button" class="btn btn-primary">Nuevo</a>
            </div>
        </div> --}}
    </div>
    <!--end breadcrumb-->


    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <form method="POST" action="{{ route('pedidos.buscar') }}">
                    @csrf
                    <input type="text" class="form-control ps-5 radius-30" placeholder="Buscar por cliente o id" name="termino" style="width: 50%; display: inline-block"></span>
                    <button type="submit" class="btn btn-primary" style="display: inline-block">Buscar</button>
                    <a href="{{ route('pedidos.index') }}" class="btn btn-dark" style="display: inline-block">Cancelar busqueda</a>
                </form>
                    
              {{-- <div class="ms-auto"><a href="javascript:;" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add New Order</a></div> --}}
            </div>
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Número</th>
                            <th>Cliente</th>
                            <th>Estado</th>
                            <th>Estado del pago</th>
                            <th>Total <a href="{{ route('pedidos.ptotal', 0) }}"><i class='bx bx-caret-up'></i></a>  <a href="{{ route('pedidos.ptotald', 0) }}"><i class='bx bx-caret-down'></i></a> </th>
                            <th>Fecha de compra</th>
                            <th>Vencimiento <a href="{{ route('pedidos.pvencimiento', 0) }}"><i class='bx bx-caret-up'></i></a><a href="{{ route('pedidos.pvencimientod', 0) }}"><i class='bx bx-caret-down'></i></a></th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedidos as $pedido)
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="ms-2">
                                            <h6 class="mb-0 font-14">{{ $pedido->id }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    {{ $pedido->name }}
                                    {{-- <p>{{$pedido->nombre}} {{$pedido->apellido}}</p> --}}
                                </td>
                                <td><div class="badge rounded-pill text-{{$pedido->estadoPedido->css}} bg-light p-2 text-uppercase px-3"><i class='bx bxs-circle me-1'></i>{{ $pedido->estadoPedido->nombre }}</div></td>
                                <td>
                                    @if( $pedido->estado_pago == 1 || $pedido->estado_pago == '' )
                                        <div class="text-success"><b>Pagado</b></div>
                                    @elseif( $pedido->estado_pago == 2 )
                                        <div class="text-warning"><b>Por pagar - crédito</b></div>
                                    @elseif( $pedido->estado_pago == 3 )
                                        <div class="text-warning"><b>Por pagar - contado</b></div>
                                    @elseif( $pedido->estado_pago == 4 )
                                        <div class="text-danger"><b>Fallido</b></div>
                                    @elseif( $pedido->estado_pago == 5 )
                                        <div class="text-dark"><b>Reembolso pago</b></div>
                                    @elseif( $pedido->estado_pago == 6 )
                                        <div class="text-secondary"><b>Cancelado pago</b></div>
                                    @elseif( $pedido->estado_pago == 7 )
                                        <div class="text-warning"><b>Contado 10 dias</b></div>
                                    @endif
                                </td>
                                <td>${{ number_format($pedido->total, 0, '.', '.')}}</td>
                                <?php

                                    $fa = date('d-m-Y'); 
                                    $fahora = date("d-m-Y",strtotime($fa));

                                    $fp = date("d-m-Y",strtotime($pedido->created_at));
                                    $fvf10 = date("d-m-Y",strtotime($fp."+ 10 days"));
                                    $fvf = date("d-m-Y",strtotime($fp."+ 30 days"));
                                ?>
                                <td><?php echo $fp ?></td>
                                <td>
                                @if( $pedido->estado_pago != 7)
                                    <?php
                                        echo $fvf;
                                    ?>
                                @else 
                                    <?php
                                        echo $fvf10;
                                    ?>
                                @endif
                                </td>
                                {{-- <td><button type="button" class="btn btn-primary btn-sm radius-30 px-4">Ver detalles</button></td> --}}
                                <td>
                                    <div class="d-flex order-actions">
                                        <a href="{{ route('pedidos.show', $pedido->id) }}" type="button" class="btn btn-outline-dark"><i class="lni lni-eye"></i></a>
                                        
                                        @if( $pedido->estado_pedido_id == 6)
                                            @if( $pedido->estado_pago  == 1 || $pedido->estado_pago == '' )
                                            <button type="button" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#modrembolso{{$pedido->id}}">
                                                <i class='bx bx-dollar'></i>
                                            </button>
                                            
                                            <!-- Modal -->
                                            <div class="modal fade" id="modrembolso{{$pedido->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Reembolsar Dinero</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="container-fluid">
                                                                Esta seguro que desea cambiar el estado de pago a reembolso para la orden {{ $pedido->id }}?
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                            <form method="POST" action="{{ route('pedidos.reembolsar-pago', $pedido->id) }}">
                                                                @csrf
                                                                <button type="submit" class="btn btn-primary">Reembolsar pago</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>  
                                            @endif
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $pedidos->links() }}
            </div>
        </div>
    </div>

@endsection
