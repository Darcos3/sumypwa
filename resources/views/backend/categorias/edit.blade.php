@extends('backend.layouts.app')

@section('titulo', 'Editar Categoría')


@section('styles')
    <link href="{{ asset('backend/assets/css/dropzone.min.css') }}" rel="stylesheet">
    <style media="screen">
        ul.categorias input {
            margin-right: 5px;
        }
        .dropzone .dz-preview .dz-image img {
            width: 120px;
        }
    </style>
@endsection


@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Categorías</div>
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
                    <form class="row g-3" id="registro" class="kt-form kt-form--label-right" method="POST" action="{{ route('categorias.update', $categoria->id) }}" role="form" enctype='multipart/form-data'>
                    @csrf
                    {{ method_field('PATCH') }}
                        <div class="col-md-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{$categoria->nombre}}">
                        </div>
                        <div class="col-md-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" value="{{$categoria->slug}}">
                        </div>
                        <div class="col-md-3">
                            <label for="sku" class="form-label">Activa</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="activa" value="" id="activa" {{ $categoria->activa ? 'checked' : ''}}>
                                <label class="form-check-label" for="activa">Activar categoría</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="sku" class="form-label">Destacada</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="destacada" value="{{ $categoria->destacada ? '1' : '0'}}" id="activa" {{ $categoria->destacada ? 'checked' : ''}}>
                                <label class="form-check-label" for="activa">Destacar categoría</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="especificaciones" class="form-label">Categoría padre</label>
                            <ul class="categorias">
                                <li><input {{ $categoria->categoria_id == null ? 'checked' : '' }} name="categoria_padre" value="" type="radio" checked>Sin categoría padre</li>
                                @foreach ($categorias as $cat)
                                    <li><input {{ $categoria->categoria_id == $cat->id ? 'checked' : '' }} name="categoria_padre" value="{{ $cat->id }}" type="radio"> {{ $cat->nombre }}
                                        @if ($cat->subcategorias->count() > 0)
                                            <ul>
                                                @include('backend.categorias.parcial.li-radio-edit', $cat)
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <label for="inputAddress3" class="form-label">Imagen principal</label>
                            <div class="dropzone dropzone-default dropzone-brand" id="imagen-principal">
                                <div class="dropzone-msg dz-message needsclick">
                                    <h3 class="dropzone-msg-title">Arrastrar o click.</h3>
                                    <span class="dropzone-msg-desc">Imagen cuadrada</span>
                                </div>
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
    <script src="{{ asset('backend/assets/js/dropzone.min.js') }}"> </script>

    <script>
    $('#imagen-principal').dropzone({
        maxFiles: 1,
        init: function () {
            var myDropzone = this;

            @if ($categoria->imagen != 'sin-imagen.png')
                var mockFile = {
                    name: "{{$categoria->imagen}}",
                    type: 'image/jpg',
                    status: Dropzone.ADDED,
                    url: '{{ asset('/storage/imagenes_categoria/original/') }}',
                    id: '{{$categoria->imagen}}'
                };
                myDropzone.files.push(mockFile);
                myDropzone.emit("addedfile", mockFile);
                myDropzone.emit("thumbnail", mockFile, '{{ asset('/storage/imagenes_categoria/original/'.$categoria->imagen) }}');
            @endif
            console.log('cantidad inicial '+myDropzone.files.length);
        },
        url: '{{ route('imagen-categoria.store') }}',
        maxFilesize: 10,
        renameFile: function(file) {
            var dt = new Date();
            var time = dt.getTime();
            return time+file.name;
        },
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        addRemoveLinks: true,
        timeout: 50000,
        processing: function(file)
        {
            if (this.files.length > 1) {
                this.removeAllFiles();
            }
        },
        removedfile: function(file)
        {
            if (file.status == 'added') {
                $('form#registro').append('<input type="hidden" name="imagenBorrar" value="true">');
            } else {
                var name = file.upload.filename;
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
                    },
                    type: 'POST',
                    url: '{{ route("imagen-categoria.delete") }}',
                    data: {filename: name},
                    success: function (data){
                        console.log(data);
                        console.log("File has been successfully removed!!");
                        $('form').find('input[data-nombre="' + data + '"]').remove()
                    },
                    error: function(e) {
                        console.log(e);
                }});
            }
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
    </script>
@endsection
