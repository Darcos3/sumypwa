@extends('backend.layouts.app')

@section('titulo', 'Pedidos')

@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Pedidos</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item active" aria-current="page">Pedido <strong>#{{$pedido->id}}</strong></li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <img class="img-fluid" src="{{ asset('frontend/assets/images/logo-sumy@2x.png')}}" style="width: 180px; height:auto;">
        </div>
        <div class="col-md-4 text-center">
            <strong>
                <span class="text-uppercase">sumy<br>mayorista digital</span><br>
                <span>1124852512-6</span>  <br>
                <span>Cll 13 # 49-07 Piso 3</span>  <br>
                <span>Tel 3118099969</span> 
            </strong> 
        </div>
        <div class="col-md-4 text-right" style="text-align: right !important">
            <span>Pedido Nro: <strong class="text-danger">{{$pedido->id}}</strong></span><br>
            <span>Elaborado el {{$pedido->created_at}}</span>
        </div>
    </div>

    <div class="row mt-3 mb-3">
        <div class="col-md-4" style="padding: 0px !important">
            <div class="card">
                <h5 class="card-title bg-primary text-center text-light text-uppercase fs-6">Cliente</h5>
                <div class="card-body" style="">
                    <div class="card-text" style="padding-top: 0px !important">
                        <h6 class="text-uppercase"><strong>{{ $pedido->nombre_envio }} {{ $pedido->apellido_envio }} 
                        @if($pedido->nombre_empresa_envio != '')
                            <span> / {{ $pedido->nombre_empresa_envio }}</span>
                        @endif
                        </strong></h6>
                        <span>{{ $pedido->numero_identificacion_envio }}</span><br>
                        <span>{{ $pedido->direccion_adicional_envio }}</span><br>
                        <span>{{ $pedido->direccion_envio }}</span><br>
                        <span>{{ $pedido->telefono_envio }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <h5 class="card-title bg-primary text-center text-light text-uppercase fs-6">Contacto del Pedido</h5>
                <div class="card-body" style="">
                    <div class="card-text" style="padding-top: 0px !important">
                        <h6 class="text-uppercase"><strong>{{ $pedido->nombre }} {{ $pedido->apellido }}</strong></h6>
                        <span>{{ $pedido->numero_identificacion }}</span><br>
                        <span>{{ $pedido->direccion_adicional }}</span><br>
                        <span>{{ $pedido->direccion }}</span><br>
                        <span>{{ $pedido->telefono }}</span>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-md-4">
            <div class="card">
                <h5 class="card-title bg-primary text-center text-light text-uppercase fs-6">Estado del pedido</h5>
                <div class="card-body" style="">
                    <div class="card-text" style="padding-top: 0px !important">
                        <form action="{{ route('pedidos.update',$pedido->id) }}" method="post">
                            @csrf
                            {{ method_field('PATCH') }}
                            <h6>Estado</h6>
                            <div class="input-group">
                                <select name="estado_pedido_id" class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                                    @foreach ($estadosPedido as $estado)
                                        <option value="{{$estado->id}}" {{ $pedido->estado_pedido_id == $estado->id ? 'selected' : '' }}>{{$estado->nombre}}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-outline-success" type="button">Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>

    <div class="row">
        <div class="col-md-12">
            <h5 class="text-uppercase text-center">Detalles del pedido</h5>
            <div class="table-responsive border-top border-4 border-primary">
                <table class="table mb-0 table-hover table-bordered table-sm">
                    <thead class="bg-dark text-light text-uppercase">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Items</th>
                            <th scope="col">Ref</th>
                            <th scope="col">U.M</th>
                            <th scope="col">Cantidad</th>
                            <th  style="text-align:right;" scope="col">Vr unitario</th>
                            <th  style="text-align:right;" scope="col">Descto %</th>
                            <th  style="text-align:right;" scope="col">Imp. %</th>
                            <th  style="text-align:right;" scope="col">SubTotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $iva1 = 0;
                            $iva2 = 0;
                            $sumaiva = 0;
                        ?>
                        @foreach ($pedido->productos as $producto)
                            <tr>
                                <th scope="row">{{ $producto->id }}</th>
                                <td>{{ $producto->nombre }}</td>
                                <td>-</td>
                                <td>-</td>
                                <td>{{ $producto->pivot->cantidad }}</td>
                                <td style="text-align:right;">
                                    ${{ number_format($producto->pivot->precio, 0, '.', '.') }}
                                </td>
                                <td style="text-align:right;">${{ number_format($producto->pivot->precio_descuento, 0, '.', '.') }}</td>
                                <td style="text-align:right;">
                                    <?php
                                        $iva1 += $producto->pivot->precio * 0.19;
                                    ?>
                                    19 %
                                </td>
                                <td style="text-align:right;">${{ number_format($producto->pivot->cantidad * $producto->pivot->precio, 0, '.', '.') }}</td>
                            </tr>
                        @endforeach
                        @foreach ($pedido->combos as $combo)
                            <tr>
                                <th scope="row">{{ $combo->id }}</th>
                                <td>{{ $combo->nombre }}</td>
                                <td>-</td>
                                <td>-</td>
                                <td>{{ $combo->pivot->cantidad }}</td>
                                <td style="text-align:right;">${{ number_format($combo->pivot->precio, 0, '.', '.') }}</td>
                                <td style="text-align:right;">${{ number_format($combo->pivot->precio_descuento, 0, '.', '.') }}</td>
                                <td style="text-align:right;">
                                    <?php
                                        $iva2 += $combo->pivot->precio * 0.19;
                                    ?>
                                    19 %
                                </td>
                                <td style="text-align:right;">${{ number_format($combo->pivot->cantidad * $combo->pivot->precio, 0, '.', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-8">
            <div class="card">
                <h5 class="card-title bg-primary text-center text-light text-uppercase fs-6">Anotaciones</h5>
                <div class="card-body" style="">
                    <div class="card-text" style="padding-top: 0px !important">
                        <span>
                        @if($pedido->comentarios == '')
                            No se han ingresado comentarios para este pedido
                        @else
                            {{ $pedido->comentarios }}
                        @endif
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <table class="table table-sm table-bordered fw-bold">
                <?php $sumaiva = $iva1 + $iva2; ?>
                <tr>
                    <td style="text-align:right;">Subtotal</td>
                    <td style="text-align:right;">${{ number_format($pedido->total - $sumaiva, 0, '.', '.') }}</td>
                </tr>
                <tr>
                    <td style="text-align:right;">AHORRO</td>
                    <td style="text-align:right;">-</td>
                </tr>
                <tr>
                    <td style="text-align:right;">IVA</td>
                    <td style="text-align:right;">
                        ${{ number_format($sumaiva, 0, '.', '.') }}
                    </td>
                </tr>
                <tr>
                    <td style="text-align:right;">ENVÍO ({{ $pedido->medioTransporte->nombre }})</td>
                    <td style="text-align:right;">${{ number_format($pedido->envio, 0, '.', '.') }}</td>
                </tr>
                @if ($pedido->cupon_id)
                    <tr>
                        <td style="text-align:right;">CUPÓN ({{ $pedido->cupon->nombre }})</td>
                        <td style="text-align:right;">${{ number_format($pedido->cupon_descuento, 0, '.', '.') }}</td>
                    </tr>
                @endif
                <tr>
                    <td style="text-align:right;">TOTAL</td>
                    <td style="text-align:right;">${{ number_format($pedido->total, 0, '.', '.') }}</td>
                </tr>
            </table>
        </div>
        <div class="col-md-4">
            <div class="card">
                <h5 class="card-title bg-primary text-center text-light text-uppercase fs-6">forma de pago</h5>
                <div class="card-body" style="">
                    <div class="card-text" style="padding-top: 0px !important">
                        <span class="text-capitalize">{{ $pedido->user->forma_pago }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
