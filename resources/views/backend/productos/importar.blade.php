@extends('backend.layouts.app')

@section('titulo', 'Importar Productos')


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
                    <li class="breadcrumb-item active" aria-current="page">Importar</li>
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
                    <form class="row g-3" id="registro" class="kt-form kt-form--label-right" method="POST" action="{{ route('productos.importar.store') }}" role="form" enctype='multipart/form-data'>
                    @csrf
                    <div class="col-md-6">
                            <label for="archivo" class="form-label">Solo se podrán importar archivos CSV, el sistema detectará error si se suben archivos con otro tipo de extensión.</label>
                            <input type="file" class="form-control" id="archivo" name="archivo" accept=".csv">
                        </div>
                        <div class="col-12">
                            <!-- Button trigger modal -->
                            <button type="button" disabled class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modguardar" id="btnmodal">
                              Guardar
                            </button>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="modguardar" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Importar Archivo</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            ¿Está seguro que ha validado el documento que se pretende subir al sistema, incluidas las rutas de las imagenes?<br><br>
                                            El sistema buscará si hay coincidencias en el código SKU, de ser asi se sumarán las cantidades nuevas al producto
                                            <br><br>El máximo de productos a subir con imagenes es de 100 elementos por proceso
                                            <br><br>En cuanto a las URL de las imagenes del plano de productos debe revisar que las url no contengan espacios, tildes o caracteres extraños, tambien debe validar que las url funcionen correctamente
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-primary px-5">Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
        $("#archivo").change( function(){
            $("#btnmodal").prop('disabled', false);
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
