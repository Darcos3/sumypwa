@extends('frontend.usuarios.layouts.usuarios')

@section('titulo', 'Cuenta')

@section('contenido')
<h2>Historial de Pedidos</h2>

<table class="table table-hover">
    <tr>
        <th> ID </th>
        <th> Fecha </th>
        <th> Total </th>
        <th> Estado </th>
        <th> Acciones </th>
    </tr>
    @foreach ($pedidos as $pedido)
        <tr>
            <td> {{ $pedido->id }} </td>
            <td> {{ $pedido->created_at }} </td>
            <td>${{ number_format($pedido->total,0,'.','.') }} </td>
            <td> {{ $pedido->estadoPedido->nombre }} </td>
            <td>
                <a href="{{ route('usuarios.pedidos.show', $pedido->id)}}" class="btn btn-primary btn-sm tabindex="-1" role="button" ><i class="far fa-eye"></i></a>
                @if( $pedido->estado_pedido_id < 4 )
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modcancelar{{$pedido->id}}">
                  <i class="fa fa-ban"></i>
                </button>
                
                <!-- Modal -->
                <div class="modal fade" id="modcancelar{{$pedido->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Cancelar pedido</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body bg-white">
                                Esta seguro de cancelar la orden No {{$pedido->id}}? de clic en Aceptar para procesar y por favor 
                                envie un correo a servicioalcliente@sumy.com.co con el motivo de la cancelación, No. de orden, valor a Soporte 
                                de Sumy para que le tramitan el reembolso si ha realizado el pago de la orden.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <a title="Cancelar pedido No {{ $pedido->id }}" href="{{ route('pedidos.cancelar', $pedido->id) }}" class="btn btn-primary" >Aceptar</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </td>
        </tr>
    @endforeach


</table>
@endsection
