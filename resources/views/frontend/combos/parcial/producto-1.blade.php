<div class="js-slide products-group">
    <div class="product-item">
        <div class="product-item__outer h-100 w-100">
            <div class="product-item__inner px-wd-4 p-2 p-md-3">
                <div class="product-item__body pb-xl-2">
                    <div class="mb-2">
                        <a href="{{ route('productos.show', $producto->slug) }}" class="d-block text-center"><img class="img-fluid" src="{{ asset('storage/imagenes_producto/original/'.$producto->imagen) }}" alt="Image Description"></a>
                    </div>
                    <div class="mb-2"><a href="{{ route('categorias.show', App\Models\Categoria::generarUrl($producto->categoria) ) }}" class="font-size-12 text-gray-5">{{ $producto->categoria->nombre}}</a></div>
                    <h5 class="mb-4 product-item__title"><a href="{{ route('productos.show', $producto->slug) }}" class="text-blue font-weight-bold">{{ $producto->nombre }}</a></h5>
                    <div class="flex-center-between mb-1">
                        @if ($producto->tieneDescuento())
                            <div class="prodcut-price d-flex align-items-center position-relative">
                                <ins class="font-size-20 text-red text-decoration-none">${{ number_format($producto->precioDescuento(), 0, ',', '.') }}</ins>
                                <del class="font-size-12 tex-gray-6 position-absolute bottom-100">${{ number_format($producto->precio, 0, ',', '.') }}</del>
                            </div>
                        @else
                            <div class="product-price">
                                <div class="text-gray-100">${{ number_format($producto->precio, 0, ',', '.') }}</div>
                            </div>
                        @endif


                        <div class="d-none d-xl-block prodcut-add-cart">
                            <a href="#" data-combo="0" data-id="{{$producto->id}}" class="btn-add-cart btn-primary transition-3d-hover"  data-toggle="modal" data-target="#ModalQuantity"  data-toggle="modal" data-target="#ModalQuantity"><i class="ec ec-add-to-cart"></i></a>
                        </div>
                    </div>
                </div>
                <div class="product-item__footer">
                    <div class="border-top pt-2 flex-center-between flex-wrap">
                        @auth
                            <a href="#" data-combo="0" data-id="{{$producto->id}}" class="text-gray-6 font-size-13 anadir-favorito"><i class="fas fa-heart" style="{{auth()->user()->productos->find($producto->id) ? 'color:red;' : '' }}"></i> Favoritos</a>
                        @endauth
                        @guest
                            <a href="#" data-combo="0" data-id="{{$producto->id}}" class="text-gray-6 font-size-13 anadir-favorito"><i class="fas fa-heart"></i> Favoritos</a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
