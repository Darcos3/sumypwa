@extends('backend.layouts.app')

@section('titulo', 'Nuevo Producto')


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
        <div class="breadcrumb-title pe-3">Productos</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item active" aria-current="page">Nuevo</li>
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
                    <form class="row g-3" id="registro" class="kt-form kt-form--label-right" method="POST" action="{{ route('productos.store') }}" role="form" enctype='multipart/form-data'>
                    @csrf
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre">
                        </div>
                        <div class="col-md-6">

                        </div>
                        <div class="col-md-3">
                            <label for="precio" class="form-label">Precio</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bx-dollar' ></i></span>
                                <input type="number" class="form-control border-start-0" id="precio" name="precio" placeholder="Precio" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="precio_descuento" class="form-label">Precio con descuento</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bx-dollar' ></i></span>
                                <input type="number" class="form-control border-start-0" id="precio_descuento" name="precio_descuento" placeholder="Precio con descuento" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="sku" class="form-label">SKU</label>
                                <input type="text" class="form-control" id="sku" name="sku" placeholder="SKU" />
                        </div>
                        <div class="col-md-3">
                            <label for="sku" class="form-label">Destacado</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="destacado" value="" id="destacado">
                                <label class="form-check-label" for="destacado">Destacar Producto</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="cantidad" class="form-label">Cantidad de unidades</label>
                            <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="Número de unidades disponibles" />
                        </div>
                        <div class="col-md-8">
                            <label class="form-label">Etiquetas</label>
                            <select class="multiple-select" data-placeholder="Choose anything" multiple="multiple" name="etiquetas[]">
                                @foreach ($etiquetas as $etiqueta)
                                    <option value="{{ $etiqueta->id }}" >{{ $etiqueta->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="ancho" class="form-label">Ancho (cm)</label>
                            <input type="number" class="form-control" id="ancho" name="ancho" placeholder="Ancho (cm)" step="any"/>
                        </div>
                        <div class="col-md-3">
                            <label for="alto" class="form-label">Alto (cm)</label>
                            <input type="number" class="form-control" id="alto" name="alto" placeholder="Alto (cm)" step="any"/>
                        </div>
                        <div class="col-md-3">
                            <label for="largo" class="form-label">Largo (cm)</label>
                            <input type="number" class="form-control" id="largo" name="largo" placeholder="Largo (cm)" step="any"/>
                        </div>
                        <div class="col-md-3">
                            <label for="peso" class="form-label">Peso (kg)</label>
                            <input type="number" class="form-control" id="peso" name="peso" placeholder="Peso (kg)" step="any"/>
                        </div>
                        <div class="col-12">
                            <label for="descripcion" class="form-label">Descripción Corta</label>
                            <textarea class="mytextarea" rows="3" name="descripcion_corta" maxlength="50">Descripción corta del producto</textarea>
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
                        <div class="col-8">
                            <label for="inputAddress3" class="form-label">Imagenes slider</label>
                            <div class="dropzone dropzone-default dropzone-brand" id="imagenes-slider">
                                <div class="dropzone-msg dz-message needsclick">
                                    <h3 class="dropzone-msg-title">Arrastra o haz click, para cargarlas.</h3>
                                    <span class="dropzone-msg-desc">Imágenes cuadradas</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea class="mytextarea" name="descripcion"></textarea>
                        </div>
                        <div class="col-12">
                            <label for="especificaciones" class="form-label">Especificaciones</label>
                            <textarea class="mytextarea" name="especificaciones"></textarea>
                        </div>
                        <div class="col-4">
                            <label for="especificaciones" class="form-label">Categorías</label>
                            <ul class="categorias">
                                <li><input name="categorias[]" value="1" type="checkbox" checked >Sin categoría <input name="categoria_principal" value="1" type="radio" checked></li>
                                @foreach ($categorias as $categoria)
                                    <li><input name="categorias[]" value="{{ $categoria->id }}" type="checkbox">{{ $categoria->nombre }} <input name="categoria_principal" value="{{ $categoria->id }}" type="radio">
                                        @if ($categoria->subcategorias->count() > 0)
                                            <ul>
                                                @include('backend.categorias.parcial.li', [$categoria, $nivel = '<i class="bx bx-right-arrow-alt"></i>'])
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-8">
                            <div class="col-12">
                                <label for="especificaciones" class="form-label">Atributos</label>
                                <div class="input-group">
                                    <select class="form-select" id="atributos" aria-label="Atributos">
                                        <option selected value="0">Escoger</option>
                                        @foreach ($atributos as $atributo)
                                            <option value="{{$atributo->id}}">{{$atributo->nombre}}</option>
                                        @endforeach
                                    </select>
                                    <button class="btn btn-outline-success" type="button" id="nuevo_atributo">Añadir</button>
                                </div>
                            </div>
                            <hr>
                            <div id="listado-atributos">
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

    $('#imagenes-slider').dropzone({
        url: '{{ route('imagen-productos-slider.store') }}',
        maxFilesize: 10,
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
            url: '{{ route("imagen-productos-slider.delete") }}',
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
            $('form#registro').append('<input type="hidden" data-nombre="' + response.data.nombre +'" name="imagenes[]" value="' + response.data.id + '">');
        },
        error: function(file, response)
        {
            return false;
        },
        headers: {
            'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
        }
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
            url: "/cargar_atributo/"+atributoId,
            type: "GET",
            data:{
                _token:'{{ csrf_token() }}'
            },
            cache: false,
            dataType: 'json',
            success: function(dataResult){
                var atributo = dataResult.data;

                $( "#atributos option:selected" ).prop('disabled','disabled');
                $('#atributos option[value="0"]').prop("selected",true);


                $("#listado-atributos").append(`
                    <div class="col-12" id="atributo-div-`+atributoId+`">
                        <label class="form-label">`+atributo.nombre+`</label>
                        <div class="input-group">
                            <select class="form-select" name="terminos[]" id="atributo-`+atributoId+`" multiple="multiple">
                            </select>
                            <button onclick="eliminarAtributo(`+atributoId+`)" class="btn btn-outline-danger" type="button">Eliminar
                            </button>
                        </div>

                    </div>
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
