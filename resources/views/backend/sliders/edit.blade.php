@extends('backend.layouts.app')

@section('titulo', 'Editar Slider')


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
        <div class="breadcrumb-title pe-3">Sliders</div>
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
                    <form class="row g-3" id="registro" class="kt-form kt-form--label-right" method="POST" action="{{ route('sliders.update',$slider->id) }}" role="form" enctype='multipart/form-data'>
                        @csrf
                        {{ method_field('PATCH') }}
                        <div class="col-md-4">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{$slider->nombre}}">
                        </div>
                        <div class="col-md-4">
                            <label for="nombre" class="form-label">Enlace</label>
                            <input type="text" class="form-control" id="Enlace" name="enlace" value="{{$slider->enlace}}">
                        </div>
                        <div class="col-md-4">
                            <label for="sku" class="form-label">Activo</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="activo" value="{{ $slider->activo ? '1' : '0'}}" id="activo" {{ $slider->activo ? 'checked' : ''}}>
                                <label class="form-check-label" for="activo">Activar Slider</label>
                            </div>
                        </div>
                        
                        {{-- <div class="col-md-6">
                            <label for="nombre" class="form-label">Botón</label>
                            <input type="text" class="form-control" id="boton" name="boton" value="{{$slider->boton}}">
                        </div>
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Título</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" value="{{$slider->titulo}}">
                        </div>
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Descripción</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{$slider->descripcion}}">
                        </div> --}}
                        <div class="col-6">
                            <label for="inputAddress3" class="form-label">Imagen principal</label>
                            <div class="dropzone dropzone-default dropzone-brand" id="imagen-principal">
                                <div class="dropzone-msg dz-message needsclick">
                                    <h3 class="dropzone-msg-title">Arrastrar o click.</h3>
                                    <span class="dropzone-msg-desc">Imagen 1920 x 422</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="inputAddress3" class="form-label">Imagen Móviles</label>
                            <div class="dropzone dropzone-default dropzone-brand" id="imagen-movil">
                                <div class="dropzone-msg dz-message needsclick">
                                    <h3 class="dropzone-msg-title">Arrastrar o click.</h3>
                                    <span class="dropzone-msg-desc">Imagen 768 x 900</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary px-5">Guardar</button>
                        </div>
                        @if ($slider->imagen)
                            <input type="hidden" name="imagen" value="{{$slider->imagen}}">
                        @endif

                        @if ($slider->imagen_movil)
                            <input type="hidden" name="imagen_movil" value="{{$slider->imagen_movil}}">
                        @endif
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
    $('#imagen-principal').dropzone({
        maxFiles: 1,
        init: function () {
            var myDropzone = this;
            
            @if ($slider->imagen != 'sin-imagen.png')
                var mockFile = {
                    name: "{{$slider->imagen}}",
                    type: 'image/jpg',
                    status: Dropzone.ADDED,
                    url: '{{ asset('/storage/imagenes_slider/original/') }}',
                    id: '{{$slider->imagen}}'
                };
                myDropzone.files.push(mockFile);
                myDropzone.emit("addedfile", mockFile);
                myDropzone.emit("thumbnail", mockFile, '{{ asset('/storage/imagenes_slider/original/'.$slider->imagen) }}');
            @endif
            console.log('cantidad inicial '+myDropzone.files.length);
        },
        url: '{{ route('imagen-slider.store') }}',
        maxFilesize: 10,
        renameFile: function(file) {
            var dt = new Date();
            var time = dt.getTime();
            {{-- return time+file.name; --}}
            return time+'.jpg';
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
                    url: '{{ route("imagen-slider.delete") }}',
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

    $('#imagen-movil').dropzone({
        maxFiles: 1,
        init: function () {
            var myDropzone = this;
            
            @if ($slider->imagen != 'sin-imagen.png')
                var mockFile = {
                    name: "{{$slider->imagen_movil}}",
                    type: 'image/jpg',
                    status: Dropzone.ADDED,
                    url: '{{ asset('/storage/imagenes_slider/original/') }}',
                    id: '{{$slider->imagen_movil}}'
                };
                myDropzone.files.push(mockFile);
                myDropzone.emit("addedfile", mockFile);
                myDropzone.emit("thumbnail", mockFile, '{{ asset('/storage/imagenes_slider/original/'.$slider->imagen_movil) }}');
            @endif
            console.log('cantidad inicial '+myDropzone.files.length);
        },
        url: '{{ route('imagen-slider.store') }}',
        maxFilesize: 10,
        renameFile: function(file) {
            var dt = new Date();
            var time = dt.getTime();
            {{-- return time+file.name; --}}
            return time+'.jpg';
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
                    url: '{{ route("imagen-slider.delete") }}',
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
