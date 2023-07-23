@extends('backend.layouts.app')

@section('titulo', 'Dashboard')

@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Dashboard</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item active" aria-current="page">Estadisticas</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        {{-- Categorias --}}
                        <div class="col-md-8 d-flex">
                            <div class="card radius-10 w-100 ">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h5 class="mb-1">Top Productos mas Vendidos</h5>
                                        </div>
                                        <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="product-list p-3 mb-3" style="height: auto !important">
        
                                    @foreach($topproductos as $producto)
                                        <div class="d-flex align-items-center py-3 border-bottom cursor-pointer">
                                            <div class="product-img me-2">
                                                <img src="{{ asset('storage/imagenes_producto/original/'.$producto->imagen) }}" alt="product img">
                                            </div>
                                            <div class="">
                                                <h6 class="mb-0 font-14">{{ $producto->nombre }}</h6>
                                                <p class="mb-0">{{ $producto->vendidos }} Vendidos</p>
                                            </div>
                                            <div class="ms-auto">
                                                <h6 class="mb-0">${{ number_format($producto->precio, 0, '.', '.')}}</h6>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                         </div>

                        {{-- Usuarios sistema --}}
                        <div class="col-md-4">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h5 class="mb-0">Métricas del sistema</h5>
                                    </div>
                                </div>
                            </div>
					        
                            <div class="card radius-10 w-100 overflow-hidden">
                                <div class="store-metrics" style="height: auto !important">
                                    <div class="card radius-10 border shadow-none">
                                        <div class="card-body">
                                            @foreach($usuarios as $users)
                                                <div class="card radius-10 border shadow-none">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center">
                                                            <div>
                                                                <p class="mb-0 text-secondary">Total 
                                                                    @if(  $users->nombre == 'Administrador')
                                                                    Administradores
                                                                    @elseif( $users->nombre == "Cliente")
                                                                    Clientes
                                                                    @elseif( $users->nombre == "Ferretero")
                                                                    Ferreteros
                                                                    @elseif( $users->nombre == "Domiciliario")
                                                                    Domiciliarios
                                                                    @endif
                                                                </p>
                                                                <h6 class="mb-0">{{ $users->cantidad }}</h6>
                                                            </div>
                                                            @if(  $users->nombre == 'Administrador')
                                                                    <div class="widgets-icons bg-light-info text-info ms-auto">
                                                                        <i class='bx bx-user-circle' ></i>
                                                                    </div>
                                                                @elseif( $users->nombre == "Cliente")
                                                                    <div class="widgets-icons bg-light-success text-success ms-auto">
                                                                        <i class='bx bx-user-pin' ></i>
                                                                    </div>  
                                                                @elseif( $users->nombre == "Ferretero")
                                                                    <div class="widgets-icons bg-light-warning text-warning ms-auto">
                                                                        <i class='bx bx-user' ></i>
                                                                    </div>
                                                                @elseif( $users->nombre == "Domiciliario")
                                                                    <div class="widgets-icons bg-light-danger text-danger ms-auto">    
                                                                        <i class='bx bx-cycling' ></i>
                                                                    </div>
                                                                @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            @foreach($categorias as $categs)
                                                <div class="card radius-10 border shadow-none">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center">
                                                            <div>
                                                                <p class="mb-0 text-secondary">Total 
                                                                    Categorias
                                                                </p>
                                                                <h6 class="mb-0">{{ $categs->cantidad }}</h6>
                                                            </div>
                                                            <div class="widgets-icons bg-light-info text-info ms-auto">
                                                                <i class='bx bx-category' ></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            @foreach($productos as $prods)
                                                <div class="card radius-10 border shadow-none">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center">
                                                            <div>
                                                                <p class="mb-0 text-secondary">Total 
                                                                    Productos
                                                                </p>
                                                                <h6 class="mb-0">{{ $prods->cantidad }}</h6>
                                                            </div>
                                                            <div class="widgets-icons bg-light-warning text-warning ms-auto">
                                                                <i class='bx bx-box' ></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Ultimos pedidos --}}
                    <br><br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h5 class="mb-1">Pedidos Recientes</h5>
                                </div>
                                <div class="ms-auto">
                                    <a href="/pedidos" class="btn btn-primary btn-sm radius-30">Ver todos los pedidos</a>
                                </div>
                            </div>
                            <div class="card radius-10 w-100">
                                <div class="card-body">
                                    <div class="table-responsive mt-3">
                                        <table class="table align-middle mb-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>No Pedido</th>
                                                    <th>Cliente</th>
                                                    <th>Fecha</th>
                                                    <th>Estado</th>
                                                    <th>Precio</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pedidos as $ped)
                                                    <tr>
                                                        <td>{{ $ped->numero }}</td>
                                                        <td>{{ $ped->nombre }} {{$ped->apellido}}</td>
                                                        <td>{{ $ped->created_at }}</td>
                                                        <td>
                                                            <div class="badge bg-light-{{ $ped->estadoPedido->css }} text-{{ $ped->estadoPedido->css }} w-100" style="font-size:0.8em">
                                                                {{ $ped->estadoPedido->nombre }}
                                                            </div>
                                                        </td>
                                                        <td>${{ number_format($ped->total, 0, '.', '.')}}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
