@extends('frontend.usuarios.layouts.usuarios')

@section('titulo', 'Cuenta')

@section('contenido')
    <div class="row row-cols-1 row-cols-3">
        <div class="col">
            <h6 class="mb-0 text-uppercase">Detalles del pedido</h6>
            <hr/>
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5">
                    {{-- <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                        </div>
                        <h5 class="mb-0 text-primary">Datos generales</h5>
                    </div>
                    <hr> --}}
                    <div class="col-md-6">
                            <h6>Fecha de creación</h6>
                            <p>{{$pedido->created_at}}</p>
                            <h6>Cliente</h6>
                            <p>{{$pedido->user->name}}</p>
                            <h6>Estado</h6>
                            <p>{{$pedido->estadoPedido->nombre}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <h6 class="mb-0 text-uppercase">Dirección</h6>
            <hr/>
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5">
                    <div class="col-md-6">
                        <h6>nombre y apellido</h6>
                        <p>{{$pedido->nombre}} {{ $pedido->apellido}}</p>
                        <h6>Nombre empresa</h6>
                        <p>{{$pedido->nombre_empresa}}</p>
                        <h6>Número identificacion</h6>
                        <p>{{$pedido->numero_identificacion}}</p>
                        <h6>Dirección</h6>
                        <p>{{$pedido->direccion}} - {{$pedido->direccion_adicional}}</p>
                        <h6>Ciudad</h6>
                        <p>{{$pedido->ciudad ? $pedido->ciudad->nombre : ''}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-1">
        <div class="col">
            <h6 class="mb-0 text-uppercase">Pagar Factura</h6>
            <form>
                <script
                src="https://checkout.wompi.co/widget.js"
                data-render="button"
                data-public-key="pub_test_ZnG5ojC8YksHGt4JmsRXbrW3BwcILJ0G"
                data-currency="COP"
                data-amount-in-cents="{{ (int) $pedido->total*100 }}"
                data-reference="{{ $pedido->id }}"
                data-signature:integrity="{{ $signature }}"
                data-customer-data:email="{{auth()->user()->email }}"
                data-customer-data:full-name="{{auth()->user()->name }}"
                data-redirect-url="http://68.183.50.234:50331/pagos/wompi/respuesta"
                >
                </script>
            </form>
        </div>
    </div>
    <hr>
    <div class="row row-cols-1 row-cols-1">
        <div class="col">
            <h6 class="mb-0 text-uppercase">Productos pedidos</h6>
            <hr/>
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5">
                    {{-- <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                        </div>
                        <h5 class="mb-0 text-primary">Datos generales</h5>
                    </div>
                    <hr> --}}
                    <div class="col-md-12">
                        <table class="table mb-0 table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">SKU</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Cantidad</th>
                                    <th  style="text-align:right;" scope="col">Valor</th>
                                    <th  style="text-align:right;" scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pedido->productos as $producto)
                                    <tr>
                                        <th scope="row">{{ $producto->sku }}</th>
                                        <td>{{ $producto->nombre }}</td>
                                        <td>{{ $producto->pivot->cantidad }}</td>
                                        <td style="text-align:right;">${{ number_format($producto->pivot->precio, 0, '.', '.') }}</td>
                                        <td style="text-align:right;">${{ number_format($producto->pivot->cantidad * $producto->pivot->precio, 0, '.', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td style="text-align:right;">ENVÍO ({{ $pedido->medioTransporte->nombre }})</td>
                                    <td style="text-align:right;">${{ number_format($pedido->envio, 0, '.', '.') }}</td>
                                </tr>
                                @if ($pedido->cupon_id)
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td style="text-align:right;">CUPÓN ({{ $pedido->cupon->nombre }})</td>
                                        <td style="text-align:right;">${{ number_format($pedido->cupon_descuento, 0, '.', '.') }}</td>
                                    </tr>
                                @endif
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td style="text-align:right;">TOTAL</td>
                                    <td style="text-align:right;">${{ number_format($pedido->total, 0, '.', '.') }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
