    @if ($categoria->parent)
        @include('frontend.categorias.parcial.breadcrumb-li', ['categoria' => $categoria->parent])
    @endif
    <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{ route('categorias.show', App\Models\Categoria::generarUrl($categoria) ) }}">{{ $categoria->nombre }}</a></li>
