@foreach ($cat->subcategorias as $cat)
    <li><input {{ $categoria->categoria_id == $cat->id ? 'checked' : '' }} name="categoria_padre" value="{{ $cat->id }}" type="radio">{{ $cat->nombre }}
        @if ($cat->subcategorias->count() > 0)
            <ul>
                @include('backend.categorias.parcial.li-radio-edit', $cat)
            </ul>
        @endif
    </li>
@endforeach
