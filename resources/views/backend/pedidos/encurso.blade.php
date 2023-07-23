@extends('backend.layouts.app')

@section('titulo', 'Pedidos')

@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Pedidos</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item active" aria-current="page">Ordenes en curso</strong></li>
                </ol>
            </nav>
        </div>
    </div>

    <form action="{{ route('pedidos.buscarpedido') }}" class="col-md-12">
        <div class="row">
            @csrf
            <div class="col-md-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="bx bx-search-alt-2"></i>
                        </span>
                    </div>
                    <input class="form-control" name="id" id="idpedido" placeholder="Buscar por id">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <select class="form-control" name="estado" id="estadopedido">
                        <option value="">Seleccione el estado a buscar</option>
                        <option value="todos">Todos los estados</option>
                        @foreach ($estadosPedido as $estado)
                            <option value="{{$estado->id}}">{{$estado->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <button class="btn btn-primary" type="submit" id="btnform">Buscar</button>
            </div>
        </div>
    </form>
    
    @foreach ($pedidos as $pedido)
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <h6>Cliente</h6>
                        <h5>{{ $pedido->nombre }} {{ $pedido->apellido}}</h5>
                        <span>Tel: {{ $pedido->telefono }} Dirección: {{ $pedido->direccion }} - {{ $pedido->direccion_adicional }}</span><br>
                        <span>Email: {{ $pedido->email }}</span><br>
                        <span>ID del Cliente: {{ $pedido->user_id }}</span>
                    </div>
                    <div class="col-md-4">
                        <h6>Estado del pago</h6>
                        @if( $pedido->estado_pago == 1 || $pedido->estado_pago == '')
                            <div class="text-success"><b>Pagado</b></div>
                        @else
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#pagado{{$pedido->id}}">
                              Cambiar estado a pagado
                            </button>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="pagado{{$pedido->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Cambiar estado del pago del pedido</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            ¿Estas seguro que quieres cambiar el estado del pago del pedido a pagado?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <a class="btn btn-warning"  href="{{ route('pedidos.update-pago', $pedido->id) }}">Cambiar estado a pagado</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-4">
                        @if($pedido->id_transportador != '')
                            <h6>Domiciliario</h6>
                            {{ $pedido->transportador->name }} {{ $pedido->transportador->apellidos }}<br>
                            ID: {{ $pedido->transportador->id }} Tel: {{ $pedido->transportador->celular }}
                        @else
                           @if($pedido->estado_pedido_id < 4 || $pedido->estado_pedido_id == 9)
                            <strong>Seleccione el domiciliario</strong>
                            <form method="POST" action="{{ route('pedidos.asignardomiciliario', $pedido->id) }}">
                                @csrf
                                {{ method_field('PATCH') }}
                                {{-- <input type="text" name="codigo" value="{{ $pedido->id }}" /> --}}
                                <select name="domiciliario" class="form-control">
                                    <option value="">Seleccione</option>
                                    @foreach ($domiciliarios as $dom )
                                        <option value="{{ $dom->id }}">{{ $dom->name }} {{ $dom->apellidos }}</option>
                                    @endforeach
                                </select>

                                <button type="submit" class="btn btn-sm btn-success btn-block mt-3" style="width: 100%">Asignar</button>
                            </form>
                           @endif
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <h6>ID de la orden {{ $pedido->id }}</h6>
                    <div class="col-md-10">
                        <div class="table-responsive border-top border-4 border-primary">
                            <table class="table mb-0 table-hover table-bordered table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Items</th>
                                        <th scope="col">Ref</th>
                                        <th scope="col">U.M</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col">IVA</th>
                                        <th scope="col">Cantidad</th>
                                        <th  style="text-align:right;" scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $iva1 = 0;
                                        $iva2 = 0;
                                        $sumaiva = 0;
                                        $vprecio1 = 0;
                                        $vprecio2 = 0;
                                    ?>
                                    @foreach ($pedido->productos as $producto)
                                        <tr>
                                            <td><img src="{{ asset('storage/imagenes_producto/original/'.$producto->imagen) }}" class="img-fluid max-width-100 p-1 border border-color-1" style="width: 80px; height: 80px"></td>
                                            <td>{{ $producto->nombre }}</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td style="text-align:right;">
                                                ${{ number_format($producto->pivot->precio, 0, '.', '.') }}
                                            </td>
                                            <td style="text-align:right;">
                                                <?php
                                                    $iva1 += $producto->pivot->precio * 0.19;
                                                ?>
                                                19 %
                                            </td>
                                            <td>{{ $producto->pivot->cantidad }}</td>
                                            <td style="text-align:right;">
                                                <?php $vprecio1 += $producto->pivot->cantidad * $producto->pivot->precio; ?>
                                                ${{ number_format($producto->pivot->cantidad * $producto->pivot->precio, 0, '.', '.') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    @foreach ($pedido->combos as $combo)
                                        <tr>
                                            <th scope="row">{{ $combo->id }}</th>
                                            <td>{{ $combo->nombre }}</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td style="text-align:right;">${{ number_format($combo->pivot->precio, 0, '.', '.') }}</td>
                                            <td style="text-align:right;">
                                                <?php
                                                    $iva2 += $combo->pivot->precio * 0.19;
                                                ?>
                                                19 %
                                            </td>
                                            <td>{{ $combo->pivot->cantidad }}</td>
                                            <td style="text-align:right;">
                                                <?php $vprecio2 += $combo->pivot->cantidad * $combo->pivot->precio; ?>
                                                ${{ number_format($combo->pivot->cantidad * $combo->pivot->precio, 0, '.', '.') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="offset-md-8 col-md-4">
                            <table class="table mb-3 mb-md-0 table-sm" style="text-align: right">
                                <tbody>
                                    <?php
                                        $sumaiva = $iva1 + $iva2;
                                        $sumasubtotal = $vprecio1 + $vprecio2;
                                        $sumatotal = 0;
                                    ?>
                                    <tr class="cart-subtotal">
                                        <th>Subtotal</th>
                                        <td data-title="Subtotal"><span class="amount">${{ number_format($sumasubtotal,0,',','.') }}</span></td>
                                    </tr>
                                    <tr class="cart-subtotal">
                                        <th>Ahorro</th>
                                        <td data-title="Subtotal"><span class="amount">-</span></td>
                                    </tr>
                                    <tr class="cart-subtotal">
                                        <th>Iva</th>
                                        <td data-title="Subtotal"><span class="amount">
                                            ${{ number_format($sumaiva,0,',','.') }}
                                        </span></td>
                                    </tr>
                                    <tr class="shipping">
                                        <th>Envío</th>
                                        <td data-title="Shipping">
                                            <span class="amount">${{  number_format($pedido->envio,0,',','.')}}</span>
                                        </td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Total</th>
                                        <?php $sumatotal = $sumasubtotal + $sumaiva + $pedido->envio; ?>
                                        <td data-title="Total"><strong><span class="amount">${{ number_format($sumatotal,0,',','.') }}</span></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-2">
                        @if($pedido->estado_pedido_id == 2)
                            <button type="button" style="width: 100%" class="btn btn btn-sm btn-block btn-{{$pedido->estadoPedido->css}}" data-bs-toggle="modal" data-bs-target="#cambioestado{{$pedido->id}}">
                              {{ $pedido->estadoPedido->nombre }}
                            </button>
                        @elseif($pedido->estado_pedido_id == 3 && $pedido->id_transportador == null) 
                            <small>Seleccione primero el transportador para poder cambiar de estado, a estado en camino</small>
                            <button type="button" style="width: 100%" class="btn btn btn-sm btn-block btn-{{$pedido->estadoPedido->css}}" disabled>
                                {{ $pedido->estadoPedido->nombre }}
                            </button>
                        {{-- @elseif($pedido->estado_pedido_id >= 5) 
                            <button type="button" style="width: 100%"  class="btn btn btn-sm btn-block btn-{{$pedido->estadoPedido->css}}" data-bs-toggle="modal" data-bs-target="#cambioestado{{$pedido->id}}">
                                {{ $pedido->estadoPedido->nombre }}
                            </button> --}}
                        @elseif( $pedido->estado_pedido_id == 5) 
                            
                            {{-- <button type="button" style="width: 100%" class="btn btn btn-sm btn-block btn-{{$pedido->estadoPedido->css}}" data-bs-toggle="modal" data-bs-target="#cambioestado{{$pedido->id}}"> --}}
                            <button type="button" style="width: 100%" class="btn btn btn-sm btn-block btn-{{$pedido->estadoPedido->css}}">
                            
                              {{ $pedido->estadoPedido->nombre }}
                            </button>
                        @else 
                            <button type="button" style="width: 100%" class="btn btn btn-sm btn-block btn-{{$pedido->estadoPedido->css}}" data-bs-toggle="modal" data-bs-target="#cambioestado{{$pedido->id}}">
                              {{ $pedido->estadoPedido->nombre }}
                            </button>
                        @endif
                        
                        <div class="modal fade" id="cambioestado{{$pedido->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Cambiar el Estado del Pedido</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Está seguro que desea cambiar el estado del pedido No. {{ $pedido->id}} a
                                        @if($pedido->estado_pedido_id == 1)
                                            En alistamiento
                                        @elseif($pedido->estado_pedido_id == 2)
                                            Alistada
                                        @elseif($pedido->estado_pedido_id == 3)
                                            En camino
                                        @elseif($pedido->estado_pedido_id == 4)
                                            Entregada
                                        @endif
                                        ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <a class="btn btn-primary" href="{{ route('pedidos.update', $pedido->id) }}">Cambiar estado</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endforeach

    {{ $pedidos->links() }}
@endsection

@section('scripts')
    <script>
        $(document).on('ready', function () {
            console.log($("#idpedido").val());
            $("#idpedido").change(function(){
                if($("#idpedido").val() < 0){
                    $("#btnform").prop('disabled', false);
                }
            });

            $("#estadopedido").change(function(){
                $("#btnform").prop('disabled', false);
            });
        });
    </script>
@endsection
