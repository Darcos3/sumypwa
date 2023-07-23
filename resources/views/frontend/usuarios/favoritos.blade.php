@extends('frontend.layouts.app')

@section('titulo', 'Favoritos')

@section('styles')
    <style>
        .btn-add-cart {
            height: inherit !important;        
        }
    </style>
@endsection

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
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Favoritos</li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="container">
        <div class="my-6">
            <h1 class="text-center">Mis favoritos</h1>
        </div>
        <div class="mb-16 wishlist-table">
            <form class="mb-4" action="#" method="post">
                <div class="table-responsive">
                    <table class="table" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="product-remove">&nbsp;</th>
                                <th class="product-thumbnail">&nbsp;</th>
                                <th class="product-name">Producto</th>
                                <th class="product-price">Precio Unitario</th>
                                <th class="product-Stock w-lg-15">Unidades disponibles</th>
                                <th class="product-subtotal min-width-200-md-lg">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos as $producto)
                                <tr>
                                    <td class="text-center">
                                        <a href="#" class="text-gray-32 font-size-26 favorito" data-combo="0" data-id="{{$producto->id}}">×</a>
                                    </td>
                                    <td class="d-none d-md-table-cell">
                                        <a href="{{ route('productos.show', $producto->slug) }}"><img class="img-fluid max-width-100 p-1 border border-color-1" src="{{ asset('storage/imagenes_producto/original/'.$producto->imagen) }}" alt="Image Description"></a>
                                    </td>

                                    <td data-title="Product">
                                        <a href="{{ route('productos.show', $producto->slug) }}" class="text-gray-90">{{ $producto->nombre}}</a>
                                    </td>

                                    <td data-title="Unit Price">
                                        <span class="">${{ $producto->precio}}</span>
                                    </td>

                                    <td data-title="Stock Status">
                                        <!-- Stock Status -->
                                        <span>{{ $producto->cantidad}} unidades</span>
                                        <!-- End Stock Status -->
                                    </td>

                                    <td>
                                        <button type="button" class="btn btn-primary mb-3 mb-md-0 font-weight-normal px-5 px-md-4 px-lg-5 w-100 w-md-auto btn-add-cart" data-combo="0" data-id="{{$producto->id}}" data-toggle="modal" data-target="#ModalQuantity" >Añadir al carrito</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection

@section('scripts')
    <script>
        $( ".favorito" ).click(function(e) {
            var id = $(this).attr('data-id');
            var element = $(this);

            e.preventDefault();

            $.ajax({
                type:"GET",
                url:"/productos/favorito/"+id,
                success: function(data) {
                    $("#icono-favorito").html(data.cantidad);
                    if (data.estado === 0 ) {
                        element.closest('tr').fadeOut(300, function(){ element.closest('tr').remove();});
                    }
                }
            });
        });

    </script>
@endsection
