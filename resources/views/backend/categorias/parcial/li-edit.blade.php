@foreach ($categoria->subcategorias as $categoria)
    <li><input {{ $producto->categorias->find($categoria->id) != null ? 'checked' : '' }} name="categorias[]" value="{{ $categoria->id }}" type="checkbox">
        {{ $categoria->nombre }}
        <input {{ $producto->categoria_id == $categoria->id ? 'checked' : '' }} name="categoria_principal" value="{{ $categoria->id }}" type="radio">
        @if ($categoria->subcategorias->count() > 0)
            <ul>
                @include('backend.categorias.parcial.li-edit', $categoria)
            </ul>
        @endif
    </li>
@endforeach
