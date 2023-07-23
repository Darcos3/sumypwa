@extends('frontend.layouts.app')

@section('titulo', 'Carrito')

@section('content')
<main id="content" role="main" class="cart-page">
    <!-- breadcrumb -->
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <!-- breadcrumb -->
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="/">Inicio</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Carrito</li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="container">
        <div class="mb-4">
            <h1 class="text-center">Carrito</h1>
        </div>
        <form class="mb-4" action="{{ route('carrito.actualizar', auth()->user()->carrito->id) }}" method="post">
            @csrf
            <div class="mb-10 cart-table">
                <table class="table" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="product-remove">&nbsp;</th>
                            <th class="product-thumbnail">&nbsp;</th>
                            <th class="product-name">Producto</th>
                            <th class="product-name">Ref</th>
                            <th class="product-name">U.M</th>
                            <th class="product-price">Precio</th>
                            <th class="product-price">IVA</th>
                            <th class="product-quantity w-lg-15">Cantidad</th>
                            <th class="product-subtotal">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $iva1 = 0;
                            $iva2 = 0;
                            $iva3 = 0;
                        ?>
                        @foreach ($productos as $producto)
                            @if ($producto->precio_descuento)
                                <tr class="">
                                    <td class="text-center">
                                        <a href="#" class="text-gray-32 font-size-26 carrito" data-combo="0" data-id="{{$producto->id}}">×</a>
                                    </td>
                                    <td class="d-none d-md-table-cell">
                                        <a href="{{ route('productos.show', $producto->slug) }}"><img class="img-fluid max-width-100 p-1 border border-color-1" src="{{ asset('storage/imagenes_producto/original/'.$producto->imagen) }}" alt="Image Description"></a>
                                    </td>

                                    <td data-title="Product">
                                        <a href="{{ route('productos.show', $producto->slug) }}" class="text-gray-90">{{ $producto->nombre}}</a>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td data-title="Price">
                                        <span class="">${{ number_format($producto->precio_descuento - ($producto->precio_descuento * 0.19), 0, ',','.')}}</span>
                                    </td>

                                    <td data-title="iva">
                                        <?php $iva1 += $producto->precio_descuento * 0.19; ?>
                                        {{-- <span class="">${{ number_format($producto->precio_descuento * 0.19, 0, ',','.')}}</span> --}}
                                        {{-- <span class="">19%</span> --}}
                                        <span class="">$ <?php echo number_format($iva1); ?></span>
                                    </td>

                                    <td data-title="Quantity">
                                        <input name="producto[{{$producto->id}}]" type="number" min="1" class="form-control" style="width: 70%" value="{{ $producto->pivot->cantidad }}">
                                    </td>

                                    <td data-title="Total">
                                        <span class="">${{ number_format($producto->precio_descuento * $producto->pivot->cantidad, 0, ',', '.') }}</span>
                                    </td>
                                </tr>
                            @else
                                <tr class="">
                                    <td class="text-center">
                                        <a href="#" class="text-gray-32 font-size-26 carrito" data-combo="0" data-id="{{$producto->id}}" data-combo="0">×</a>
                                    </td>
                                    <td class="d-none d-md-table-cell">
                                        <a href="{{ route('productos.show', $producto->slug) }}"><img class="img-fluid max-width-100 p-1 border border-color-1" src="{{ asset('storage/imagenes_producto/original/'.$producto->imagen) }}" alt="Image Description"></a>
                                    </td>

                                    <td data-title="Product">
                                        <a href="{{ route('productos.show', $producto->slug) }}" class="text-gray-90">{{ $producto->nombre}}</a>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td data-title="Price">
                                        <span class="">${{ number_format($producto->precio - ($producto->precio * 0.19), 0, ',','.')}}</span>
                                    </td>

                                    <td data-title="iva">
                                        <?php $iva2 += $producto->precio * 0.19; ?>
                                        {{-- <span class="">${{ number_format($producto->precio * 0.19, 0, ',','.')}}</span> --}}
                                        {{-- <span class="">19%</span> --}}
                                        <span class="">{{$iva2}}</span>
                                    </td>

                                    <td data-title="Quantity">
                                        <input name="producto[{{$producto->id}}]" type="number" min="1" class="form-control" style="width: 70%" value="{{ $producto->pivot->cantidad }}">
                                    </td>

                                    <td data-title="Total">
                                        <span class="">${{ number_format($producto->precio * $producto->pivot->cantidad, 0, ',', '.') }}</span>
                                    </td>
                                </tr>

                            @endif

                        @endforeach

                        @foreach ($combos as $combo)
                            <tr class="">
                                <td class="text-center">
                                    <a href="#" class="text-gray-32 font-size-26 carrito" data-combo="1" data-id="{{$combo->id}}" data-combo="1">×</a>
                                </td>
                                <td class="d-none d-md-table-cell">
                                    <a href="{{ route('combos.show', $combo->slug) }}"><img class="img-fluid max-width-100 p-1 border border-color-1" src="{{ asset('storage/imagenes_producto/original/'.$combo->imagen) }}" alt="Image Description"></a>
                                </td>

                                <td data-title="Product">
                                    <a href="{{ route('combos.show', $combo->slug) }}" class="text-gray-90">{{ $combo->nombre}}</a>
                                </td>
                                <td></td>
                                <td></td>
                                <td data-title="Price">
                                    <span class="">${{ number_format($combo->menorPrecio() - ($combo->menorPrecio() * 0.19), 0, ',','.')}}</span>
                                </td>

                                <td data-title="iva">
                                    <?php
                                        $iva3 += $combo->menorPrecio() * 0.19;
                                    ?>

                                    {{-- <span class="">${{ number_format($combo->menorPrecio() * 0.19, 0, ',','.')}}</span> --}}
                                    {{-- <span class="">19%</span> --}}
                                    <span class="">{{$iva3}}</span>
                                </td>

                                <td data-title="Quantity">
                                    <input name="combo[{{$producto->id}}]" type="number" min="1" class="form-control" style="width: 70%" value="{{ $combo->pivot->cantidad }}">
                                </td>

                                <td data-title="Total">
                                    <span class="">${{ number_format($combo->menorPrecio() * $combo->pivot->cantidad, 0, ',', '.') }}</span>
                                </td>
                            </tr>

                        @endforeach
                        <tr>
                            <td colspan="9" class="border-top space-top-2 justify-content-center">
                                <div class="pt-md-3">
                                    <div class="d-block d-md-flex flex-center-between">
                                        <div class="mb-3 mb-md-0 w-xl-40">
                                            <!-- Apply coupon Form -->
                                            <form class="js-focus-state">
                                                <label class="banner-bg" style="padding: 5px; width:70%" for="subscribeSrEmailExample1"><img src="{{ asset('frontend/assets/images/descuento.png') }}" style="width: 15px; height: 15px" />¿Tiene un Cupón de Descuento?</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="text" id="codigo_cupon" placeholder="Código del cupón" aria-label="Coupon code" aria-describedby="Código del cupón">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-block btn-dark px-4" type="button" id="aplicar_cupon"><i class="fas fa-tags d-md-none"></i><span class="d-none d-md-inline">Aplicar cupón</span></button>
                                                    </div>
                                                </div>
                                                <p style="color:green" id="mensaje-cupon"></p>
                                            </form>
                                            <!-- End Apply coupon Form -->
                                        </div>
                                        <div class="d-md-flex">
                                            <button type="submit" class="btn btn-soft-secondary mb-3 mb-md-0 font-weight-normal px-5 px-md-4 px-lg-5 w-100 w-md-auto">Actualizar Carrito</button>
                                            <a href="{{ route('usuarios.envio') }}" class="btn btn-primary-dark-w ml-md-2 px-5 px-md-4 px-lg-5 w-100 w-md-auto d-none d-md-inline-block">Proceder con la compra</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mb-8 cart-total">
                <div class="row">
                    <div class="col-xl-5 col-lg-6 offset-lg-6 offset-xl-7 col-md-8 offset-md-4">
                        <div class="border-bottom border-color-1 mb-3">
                            <h3 class="d-inline-block section-title mb-0 pb-2 font-size-26">Totales</h3>
                        </div>
                       
                        <table class="table mb-3 mb-md-0" id="valores_normales">
                            <tbody>
                                <?php
                                    $sumaiva = $iva1 + $iva2 + $iva3;
                                ?>
                                <tr class="cart-subtotal">
                                    <th>Subtotal</th>
                                    <td data-title="Subtotal">$<span class="amount" id="subtotal">
                                        {{ number_format($subtotal,0,',','.') }}
                                    </span></td>
                                </tr>
                                <tr class="cart-subtotal">
                                    <th>Des. Cupón</th>
                                    <td >
                                        <span id="valcupon"></span> |
                                        <span data-title="Subtotal" class="amount" id="descupon"></span> 
                                    </td>
                                </tr>
                                <tr class="cart-subtotal">
                                    <th>Ahorro</th>
                                    <td data-title="Subtotal">$<span class="amount" id="ahorro">0</span></td>
                                </tr>
                                <tr class="cart-subtotal">
                                    <th>Iva</th>
                                    <td data-title="Subtotal">$<span class="amount" id="iva">
                                        {{ number_format($sumaiva,0,',','.') }}
                                    </span></td>
                                </tr>
                                <tr class="shipping">
                                    <th>Envío</th>
                                    <td data-title="Shipping">
                                        Aplica para envío <strong>{{$medioSeleccionado->nombre}}</strong>
                                        $ <span class="amount" id="envio">
                                            {{  number_format($medioSeleccionado->precio,0,',','.')}}
                                        </span>
                                    </td>
                                </tr>
                                <tr class="order-total">
                                    <th>Total</th>
                                    <td data-title="Total"><strong>$<span class="amount" id="total">
                                        {{ number_format($total,0,',','.') }}
                                    </span></strong></td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="table mb-3 mb-md-0" id="valores_calculo" style="display:none">
                            <tbody>
                                <?php
                                    $sumaiva = $iva1 + $iva2 + $iva3;
                                ?>
                                <tr class="cart-subtotal">
                                    <th>Subtotal</th>
                                    <td data-title="Subtotal">$<span class="amount" id="vc_subtotal">
                                        <?php echo $subtotal; ?>
                                    </span></td>
                                </tr>
                                <tr class="cart-subtotal">
                                    <th>Des. Cupón</th>
                                    <td data-title="Subtotal">
                                        <span class="amount" id="vc_valcupon"></span> |
                                        <span class="amount" id="vc_descupon"></span> 
                                    </td>
                                </tr>
                                <tr class="cart-subtotal">
                                    <th>Ahorro</th>
                                    <td data-title="Subtotal">$<span class="amount" id="ahorro">0</span></td>
                                </tr>
                                <tr class="cart-subtotal">
                                    <th>Iva</th>
                                    <td data-title="Subtotal">$<span class="amount" id="vc_iva">
                                        {{ $sumaiva  }}
                                    </span></td>
                                </tr>
                                <tr class="shipping">
                                    <th>Envío</th>
                                    <td data-title="Shipping">
                                        Aplica para envío <strong>{{$medioSeleccionado->nombre}}</strong>
                                        $ <span class="amount" id="vc_envio">
                                            {{  $medioSeleccionado->precio }}
                                        </span>
                                    </td>
                                </tr>
                                <tr class="order-total">
                                    <th>Total</th>
                                    <td data-title="Total"><strong>$<span class="amount" id="vc_total">
                                        {{  $total  }}
                                    </span></strong></td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="button" class="btn btn-primary-dark-w ml-md-2 px-5 px-md-4 px-lg-5 w-100 w-md-auto d-md-none">Proceder con la <to></to> compra</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
@endsection

@section('scripts')
    <script>
        $( ".carrito" ).click(function(e) {
                var id = $(this).attr('data-id');
                var esCombo = $(this).attr('data-combo');
                var element = $(this);

                e.preventDefault();

                $.ajax({
                    type:"GET",
                    url:"/productos/eliminarcarrito/"+id+"?es_combo="+esCombo,
                    success: function(data) {
                        $("#icono-favorito").html(data.cantidad);
                        if (data.estado === 1 ) {
                            element.closest('tr').fadeOut(300, function(){ element.closest('tr').remove();});
                            $("#icono-carrito").html(data.cantidad);
                            $("#total-carrito").html('$'+data.total.toLocaleString('es-CO',{maximumFractionDigits:0}));
                        }
                    }
                });
            });

            $( "#aplicar_cupon" ).click(function(e) {
                var codigo = $('#codigo_cupon').val();
                e.preventDefault();
                $.ajax({
                    type:"GET",
                    url:"/anadirCupon?cupon="+codigo,
                    success: function(data) {
                        console.log(data)
                        if (data.exito === 200 ) {
                            let valor = Math.round(data.valor);
                            let tipo = data.tipo;

                            if(tipo == 'dto_pesos'){
                                function numberWithCommas(num) {
                                    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                                }

                                $("#mensaje-cupon").css('color', 'green').html('Cupón añadido con éxito.');
                                
                                let subtotal = JSON.parse($("#vc_subtotal").text());   
                                let cupon = JSON.parse(data.valor);
                                
                                let envio = JSON.parse($("#vc_envio").text());
                                let total = JSON.parse($("#vc_total").text());

                                let descuento = subtotal - cupon;
                                let operacion = JSON.parse(subtotal) - JSON.parse(descuento);
                                
                                console.warn(descuento);
                                
                                let iva =  descuento * 0.19;
                                let subtotalmenoscupon = subtotal - operacion;
                                let vartotal =  subtotalmenoscupon + iva + envio; 

                                $("#descupon").text();
                                $("#valcupon").text('$' +numberWithCommas(Math.round(cupon)));
                                
                                $("#subtotal").text(numberWithCommas(Math.round(subtotal)));
                                $("#iva").text(numberWithCommas(Math.round(iva)));
                                $("#envio").text(numberWithCommas(envio));
                                $("#total").text(numberWithCommas(Math.round(vartotal)));
                            
                            }
                            else {
                                function numberWithCommas(num) {
                                    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                                }

                                $("#mensaje-cupon").css('color', 'green').html('Cupón añadido con éxito.');
                                
                                let subtotal = JSON.parse($("#vc_subtotal").text());   
                                let cupon = JSON.parse(valor);
                                let envio = JSON.parse($("#vc_envio").text());
                                let total = JSON.parse($("#vc_total").text());


                                let porcentaje = JSON.parse(data.valor);
                                let descuento = JSON.parse(subtotal) * JSON.parse(porcentaje);
                                let operacion = JSON.parse(subtotal) - JSON.parse(descuento);

                                console.warn(operacion)

                                let iva =  operacion * 0.19;
                                let vartotal = operacion + iva + envio; 

                                $("#descupon").text('$'+numberWithCommas(Math.round(descuento)));
                                $("#valcupon").text(porcentaje + '%');
                                $("#subtotal").text(numberWithCommas(Math.round(subtotal)));
                                $("#iva").text(numberWithCommas(Math.round(iva)));
                                $("#envio").text(numberWithCommas(envio));
                                $("#total").text(numberWithCommas(Math.round(vartotal)));
                            }

                            
                        } else {
                            $("#mensaje-cupon").css('color', 'red').html('El cupón ya ha sido utilizado, el cupón se ha vencido o el cupón no es válido.');
                        }
                    },
                    error: function(error){
                        console.log(error.status)
                        $("#mensaje-cupon").css('color', 'red').html('El código del cupón no existe.');
                    }
                });
            });
    </script>
@endsection
