@foreach ($categoria->subcategorias as $categoria)
    <li><input name="categorias[]" value="{{ $categoria->id }}" type="checkbox">{{ $categoria->nombre }} <input name="categoria_principal" value="{{ $categoria->id }}" type="radio">
        @if ($categoria->subcategorias->count() > 0)
            <ul>
                @include('backend.categorias.parcial.li', $categoria)
            </ul>
        @endif
    </li>
@endforeach
