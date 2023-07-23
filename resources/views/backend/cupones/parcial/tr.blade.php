@foreach ($categoria->subcategorias as $categoria)
    <tr>
        <th scope="row">{{ $categoria->id }}</th>
        <td>{!! $nivel !!} {{ $categoria->nombre }}</td>
        <td>{{ $categoria->slug }}</td>
        <td>
            @if ($categoria->activa)
                <div class="font-22 text-success">	<i class="bx bx-check-circle"></i></div>
            @else
                <div class="font-22 text-danger">	<i class="bx bx-x-circle"></i></div>
            @endif
        </td>
        <td>
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="{{ route('categorias.show', App\Models\Categoria::generarUrl($categoria) ) }}" target="_blank" type="button" class="btn btn-outline-dark"><i class="bx bx-file"></i>
                {{-- <a href="{{ route('categorias.show', $categoria->slug) }}" target="_blank" type="button" class="btn btn-outline-dark"><i class="bx bx-file"></i> --}}
                </a>
                <a href="{{ route('categorias.edit', $categoria->id) }}" type="button" class="btn btn-outline-dark"><i class="bx bx-edit-alt"></i>
                </a>
            </div>
        </td>
    </tr>
    @if ($categoria->subcategorias->count() > 0)
        @include('backend.categorias.parcial.tr', [$categoria, $nivel .= '<i class="bx bx-right-arrow-alt"></i>'])
    @endif
@endforeach
