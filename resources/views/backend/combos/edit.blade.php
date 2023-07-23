@extends('backend.layouts.app')

@section('titulo', 'Editar Combo')


@section('styles')
    <link href="{{ asset('backend/assets/css/basic.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/plugins/summernote/summernote-lite.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/css/dropzone.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('backend/assets/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" />
    <style media="screen">
        ul.categorias input {
            margin-right: 5px;
        }
    </style>
@endsection


@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Combos</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item active" aria-current="page">Editar</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-2">
        <div class="col-md-12">
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5">
                    {{-- <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                        </div>
                        <h5 class="mb-0 text-primary">Datos generales</h5>
                    </div>
                    <hr> --}}
                    <form class="row g-3" id="registro" class="kt-form kt-form--label-right" method="POST" action="{{ route('combos.update',$combo->id) }}" role="form" enctype='multipart/form-data'>
                        @csrf
                        {{ method_field('PATCH') }}
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{$combo->nombre}}">
                        </div>
                        <div class="col-md-4">
                            <label for="nombre" class="form-label">Slug</label>
                            <input type="text" disabled class="form-control" id="nombre" name="nombre" value="{{$combo->slug}}">
                        </div>
                        <div class="col-md-2">
                            <label for="sku" class="form-label">Activo</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="activo" value="" id="activo" {{ $combo->activo ? 'checked' : ''}}>
                                <label class="form-check-label" for="activo">Activar combo</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="precio" class="form-label">Precio</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bx-dollar' ></i></span>
                                <input type="number" class="form-control border-start-0" id="precio" name="precio" value="{{$combo->precio}}" placeholder="Precio" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="precio_descuento" class="form-label">Precio con descuento</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bx-dollar' ></i></span>
                                <input type="number" class="form-control border-start-0" id="precio_descuento" name="precio_descuento" value="{{$combo->precio_descuento}}" placeholder="Precio con descuento" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="precio_ferretero" class="form-label">Precio Ferretero</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bx-dollar' ></i></span>
                                <input type="number" class="form-control border-start-0" id="precio_ferretero" name="precio_ferretero" value="{{$combo->precio_ferretero}}" placeholder="Precio Ferretero" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="sku" class="form-label">SKU</label>
                                <input type="text" class="form-control" id="sku" name="sku" value="{{$combo->sku}}" placeholder="SKU" />
                        </div>
                        <div class="col-12">
                            <label for="descripcion" class="form-label">Descripción Corta</label>
                            <textarea class="mytextarea" rows="3" name="descripcion_corta" maxlength="50">{{$combo->descripcion_corta}}</textarea>
                        </div>
                        <div class="col-md-8">
                            <label class="form-label">Etiquetas</label>
                            <select class="multiple-select" data-placeholder="Choose anything" multiple="multiple" name="etiquetas[]">
                                @foreach ($etiquetas as $etiqueta)
                                    <option {{ $combo->etiquetas->find($etiqueta->id) != null ? 'selected' : '' }} value="{{ $etiqueta->id }}" >{{ $etiqueta->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="inputAddress3" class="form-label">Imagen principal</label>
                            <div class="dropzone dropzone-default dropzone-brand" id="imagen-principal">
                                <div class="dropzone-msg dz-message needsclick">
                                    <h3 class="dropzone-msg-title">Arrastrar o click.</h3>
                                    <span class="dropzone-msg-desc">Imagen cuadrada</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea class="mytextarea" name="descripcion">{{$combo->descripcion}}</textarea>
                        </div>
                        <div class="col-12">
                            <label for="especificaciones" class="form-label">Especificaciones</label>
                            <textarea class="mytextarea" name="especificaciones">{{$combo->especificaciones}}</textarea>
                        </div>
                        <div class="col-4">
                            <label for="especificaciones" class="form-label">Categorías</label>
                            <ul class="categorias">
                                <li><input {{ $combo->categorias->find(1) != null ? 'checked' : '' }} name="categorias[]" value="1" type="checkbox">
                                    Sin categoría
                                    <input {{ $combo->categoria_id == 1 ? 'checked' : '' }} name="categoria_principal" value="1" type="radio">
                                </li>
                                @foreach ($categorias as $categoria)
                                    <li><input {{ $combo->categorias->find($categoria->id) != null ? 'checked' : '' }} name="categorias[]" value="{{ $categoria->id }}" type="checkbox">
                                        {{ $categoria->nombre }}
                                        <input {{ $combo->categoria_id == $categoria->id ? 'checked' : '' }} name="categoria_principal" value="{{ $categoria->id }}" type="radio">
                                        @if ($categoria->subcategorias->count() > 0)
                                            <ul>
                                                @include('backend.categorias.parcial.li-edit-combo', [$categoria])
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-8">
                            <div class="col-12">
                                <label for="especificaciones" class="form-label">Productos del Combo</label>
                                <div class="input-group">
                                    <select class="form-select" id="atributos" aria-label="Atributos">
                                        <option selected value="0">Escoger</option>
                                        @foreach ($productos as $producto)
                                            <option value="{{$producto->id}}">{{$producto->sku}} {{$producto->nombre}}</option>
                                        @endforeach
                                    </select>
                                    <button class="btn btn-outline-success" type="button" id="nuevo_atributo">Añadir</button>
                                </div>
                            </div>
                            <hr>
                            <div id="listado-atributos">
                                <table class="table">
                                    <tr>
                                        <th>SKU</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Acción</th>
                                    </tr>
                                    <tbody class="productos">
                                        @foreach ($combo->productos as $producto)
                                            <tr id="atributo-div-{{$producto->id}}">
                                                <td>{{ $producto->sku }}</td>
                                                <td>{{ $producto->nombre }}</td>
                                                <td>${{ number_format($producto->precio,0,'.','.') }}</td>
                                                <td><button onclick="eliminarAtributo({{$producto->id}})" class="btn btn-outline-danger" type="button">Eliminar </button></td>
                                                <input type="hidden" name="productos[]" value="{{$producto->id}}">
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary px-5">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('backend/assets/plugins/summernote/summernote-lite.min.js') }}"> </script>
    <script src="{{ asset('backend/assets/plugins/summernote/lang/summernote-es-ES.js') }}"> </script>
    <script src="{{ asset('backend/assets/js/dropzone.min.js') }}"> </script>
    <script src="{{ asset('backend/assets/plugins/select2/js/select2.min.js') }}"></script>


    <script>
    $(document).ready(function() {
        $('.mytextarea').summernote({
            // lang: 'es-ES'
        });
    });
    $('.multiple-select').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });
    $('#imagen-principal').dropzone({
        url: '{{ route('imagen-producto.store') }}',
        maxFilesize: 10,
        maxFiles: 1,
        renameFile: function(file) {
            var dt = new Date();
            var time = dt.getTime();
            return time+file.name;
        },
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        addRemoveLinks: true,
        timeout: 50000,
        removedfile: function(file)
        {
            var name = file.upload.filename;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
                },
                type: 'POST',
                url: '{{ route("imagen-producto.delete") }}',
                data: {filename: name},
                success: function (data){
                    $('form').find('input[data-nombre="' + data + '"]').remove()
                },
                error: function(e) {
            }});
            var fileRef;
            return (fileRef = file.previewElement) != null ?
            fileRef.parentNode.removeChild(file.previewElement) : void 0;
        },
        success: function(file, response)
        {
            $('form#registro').append('<input type="hidden" data-nombre="' + response.data +'" name="imagen" value="' + response.data + '">');
        },
        error: function(file, response)
        {
            return false;
        },
        maxfilesexceeded: function(file, response)
        {
            this.removeAllFiles();
            this.addFile(file);
        },
        headers: {
            'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
        }
    });

    $("#atributos").select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });

    function eliminarAtributo(val) {
        $("#atributo-div-"+val).remove();
        $('#atributos option[value="'+val+'"]').removeAttr("disabled");
    }


    var valor = 0;
    $( "#nuevo_atributo" ).click(function() {
        var atributoId = $( "#atributos option:selected" ).val();
        valor++;
        $.ajax({
            url: "/cargar_producto/"+atributoId,
            type: "GET",
            data:{
                _token:'{{ csrf_token() }}'
            },
            cache: false,
            dataType: 'json',
            success: function(dataResult){
                var producto = dataResult.data;

                $( "#atributos option:selected" ).prop('disabled','disabled');
                $('#atributos option[value="0"]').prop("selected",true);


                $("table tbody.productos").append(`
                    <tr id="atributo-div-`+producto.id+`">
                        <td>`+producto.sku+`</td>
                        <td>`+producto.nombre+`</td>
                        <td>`+'$'+producto.precio.toLocaleString('es-CO',{maximumFractionDigits:0})+`</td>
                        <td><button onclick="eliminarAtributo(`+producto.id+`)" class="btn btn-outline-danger" type="button">Eliminar </button></td>
                        <input type="hidden" name="productos[]" value="`+producto.id+`">
                    </tr>
                `);
                $("#atributo-"+atributoId).select2({
                    theme: 'bootstrap4',
                    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                    placeholder: $(this).data('placeholder'),
                    allowClear: Boolean($(this).data('allow-clear')),
                });
                atributo.terminos.forEach(termino => {
                    var newOption = new Option(termino.nombre, termino.id, false, false);
                    $("#atributo-"+atributoId).append(newOption).trigger('change');
                });
            }
        });
    });
    </script>
@endsection
