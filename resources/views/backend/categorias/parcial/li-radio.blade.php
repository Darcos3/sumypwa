@foreach ($categoria->subcategorias as $categoria)
    <li><input name="categoria_padre" value="{{ $categoria->id }}" type="radio">{{ $categoria->nombre }}
        @if ($categoria->subcategorias->count() > 0)
            <ul>
                @include('backend.categorias.parcial.li-radio', $categoria)
            </ul>
        @endif
    </li>
@endforeach
