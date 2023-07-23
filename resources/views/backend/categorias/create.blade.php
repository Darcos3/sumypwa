@extends('backend.layouts.app')

@section('titulo', 'Nueva Categoría')


@section('styles')
    <link href="{{ asset('backend/assets/css/dropzone.min.css') }}" rel="stylesheet">
    <style media="screen">
        ul.categorias input {
            margin-right: 5px;
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
                    <li class="breadcrumb-item active" aria-current="page">Nueva</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-2">
        <div class="col-md-12">
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5">
                    <form class="row g-3" id="registro" class="kt-form kt-form--label-right" method="POST" action="{{ route('categorias.store') }}" role="form" enctype='multipart/form-data'>
                    @csrf
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre">
                        </div>
                        <div class="col-md-6">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug">
                        </div>
                        <div class="col-6">
                            <label for="especificaciones" class="form-label">Categoría padre</label>
                            <ul class="categorias">
                                <li><input name="categoria_padre" value="" type="radio" checked>Sin categoría padre</li>
                                @foreach ($categorias as $categoria)
                                    <li><input name="categoria_padre" value="{{ $categoria->id }}" type="radio"> {{ $categoria->nombre }}
                                        @if ($categoria->subcategorias->count() > 0)
                                            <ul>
                                                @include('backend.categorias.parcial.li-radio', $categoria)
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <label for="inputAddress3" class="form-label">Imagen principal</label>
                                <div class="dropzone dropzone-default dropzone-brand" id="imagen-principal">
                                    <div class="dropzone-msg dz-message needsclick">
                                        <h3 class="dropzone-msg-title">Arrastrar o click.</h3>
                                        <span class="dropzone-msg-desc">Imagen cuadrada</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="inputAddress3" class="form-label">Imagen principal</label>
                                <div class="dropzone dropzone-default dropzone-brand" id="imagen-principal">
                                    <div class="dropzone-msg dz-message needsclick">
                                        <h3 class="dropzone-msg-title">Arrastrar o click.</h3>
                                        <span class="dropzone-msg-desc">Imagen cuadrada</span>
                                    </div>
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
        url: '{{ route('imagen-categoria.store') }}',
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
            var fileRef;
            return (fileRef = file.previewElement) != null ?
            fileRef.parentNode.removeChild(file.previewElement) : void 0;
        },
        success: function(file, response)
        {
            $('form#registro').append('<input type="hidden" data-nombre="' + response.data +'" name="imagen" value="' + response.data + '">');
            console.log(response);
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
