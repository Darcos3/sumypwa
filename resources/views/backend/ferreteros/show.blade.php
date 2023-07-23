@extends('backend.layouts.app')

@section('titulo', 'Validar Ferretero')


@section('styles')
    <link href="{{ asset('backend/assets/css/basic.min.css') }}" rel="stylesheet">

    <link href="{{ asset('backend/assets/css/lightbox.min.css') }}" rel="stylesheet" />
@endsection


@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Ferretero</div>
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
                        <h5 class="mb-0 text-primary">Datos del Ferretero</h5>
                    </div>
                    <hr>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Nombre de la Ferreteria</label>
                            <p>{{$ferretero->user->name}}</p>
                        </div>
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">NIT</label>
                            <p>{{$ferretero->nit}}</p>
                        </div>
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Dirección Ferretería</label>
                            <p>{{$ferretero->direccion}}</p>
                        </div>
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Número Contacto</label>
                            <p>{{$ferretero->numero_contacto}}</p>
                        </div>
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Correo electrónico</label>
                            <p>{{$ferretero->email}}</p>
                        </div>
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Nombre representante</label>
                            <p>{{$ferretero->nombre_representante}}</p>
                        </div>
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Celular</label>
                            <p>{{$ferretero->celular}}</p>
                        </div>
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Foto de la Cámara de Comercio</label>
                            <p>
                                <a href="{{asset('storage/ferreteros/'.$ferretero->camara_comercio)}}">
                                    {{-- <img style="width:100px; height:auto;" src="{{asset('storage/ferreteros/'.$ferretero->camara_comercio)}}" alt=""> --}}
                                    Enlace
                                </a>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Foto de la Cédula</label>
                            <p>
                                <a href="{{asset('storage/ferreteros/'.$ferretero->foto_cedula)}}">
                                    {{-- <img style="width:100px; height:auto;" src="{{asset('storage/ferreteros/'.$ferretero->foto_cedula)}}" alt=""> --}}
                                    Enlace
                                </a>
                            </p>
                            {{-- <p><a href="{{asset('storage/ferreteros/'.$ferretero->foto_cedula)}}">Enlace</a></p> --}}
                        </div>
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Foto del RUT</label>
                            <p>
                                <a href="{{asset('storage/ferreteros/'.$ferretero->foto_rut)}}">
                                    {{-- <img style="width:100px; height:auto;" src="{{asset('storage/ferreteros/'.$ferretero->foto_rut)}}" alt=""> --}}
                                    Enlace
                                </a>
                            </p>
                            {{-- <p><a href="{{asset('storage/ferreteros/'.$ferretero->foto_rut)}}">Enlace</a></p> --}}
                        </div>
                    </div>
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                        </div>
                        <h5 class="mb-0 text-primary">Órdenes pendientes por pagar</h5>
                    </div>
                    <hr>
                    <table class="table mb-0 table-hover table-sm table-striped">
                        <thead>
                            <tr>
                                <th scope="col"># pedido</th>
                                <th scope="col">Fecha de compra</th>
                                <th scope="col">Vencimiento</th>
                                <th scope="col">Valor</th>
                                {{-- <th scope="col">Opciones</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $pedidos as $pedido )
                                @if( $pedido->estado_pago == 2 )
                                    <tr>
                                        <td>{{ $pedido->id }}</td>
                                        <td>
                                            <?php
                                                echo date("d-m-Y",strtotime($pedido->created_at));
                                            ?>
                                        </td>
                                        <td>
                                            <?php 
                                                $fa = date('d-m-Y'); 
                                                $fp = $pedido->created_at;
                                                $fvf = date("d-m-Y",strtotime($fp."+ 10 days"));
                                                $fv1 = date("d-m-Y",strtotime($fp."+ 6 days"));
                                                $fv2 = date("d-m-Y",strtotime($fp."+ 8 days"));

                                                if( $fa < $fv1 ){
                                                    echo "<div class='badge bg-success'>".$fvf."</div>";
                                                }
                                                else if( $fa > $fv1 && $fa < $fvf){
                                                    echo "<div class='badge bg-warning'>".$fvf."</div>";
                                                }
                                                else if( $fa > $fvf){
                                                    echo "<div class='text-danger'><b>Vencido</b> ".$fvf."</div>";
                                                }
                                            ?>
                                        </td>
                                        <td>$ {{ number_format($pedido->total) }}</td>
                                        {{-- <td> --}}
                                            {{-- <a title="Ver Pedido" href="{{ route('pedidos.show', $pedido->id) }}" type="button" class="btn btn-outline-dark"><i class="lni lni-eye"></i></a> --}}
                                        {{-- </td> --}}
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('backend/assets/js/lightbox.min.js') }}"></script>
@endsection
