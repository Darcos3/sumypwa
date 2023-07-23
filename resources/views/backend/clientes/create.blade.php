@extends('backend.layouts.app')

@section('titulo', 'Nuevo Atributo')

@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Atributos</div>
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
                    <form class="row g-3" id="registro" class="kt-form kt-form--label-right" method="POST" action="{{ route('atributos.store') }}" role="form" enctype='multipart/form-data'>
                        @csrf
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre">
                        </div>
                        <div class="col-md-6">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug">
                        </div>
                        <div class="col-md-12">
                            <label for="slug" class="form-label">Términos</label>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group col-md-12">
                                <input id="termino_nombre" type="text" class="form-control" placeholder="Nombre del término" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-success" type="button" id="nueva_opcion">Añadir</button>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div id="sortable" class="col-md-6">
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
    <script>
    function eliminarOpcion(val) {
        console.log(val);
        $("#opcion"+val).remove();
        console.log('laog');
    }


    var valor = 0;
    $( "#nueva_opcion" ).click(function() {
        $( "#termino_nombre" ).focus();
        var nombre = $( "#termino_nombre" ).val();
        $( "#termino_nombre" ).val('');
        valor++;
        $("#sortable").append(`
            <div id="opcion`+valor+`"  class="input-group col-md-6">
                <input type="text" name="terminos[]" class="form-control" value="`+nombre+`" aria-label="Recipient's username" aria-describedby="button-addon2">
                <button onclick="eliminarOpcion(`+valor+`)" class="btn btn-outline-danger" type="button">Eliminar</button>
            </div>
            `);
        // $("#sortable").append(' <li id="opcion'+valor+'" class="ui-state-default"> <i style="color:#ef9d00;padding-right: 15px;" class="fas fa-arrows-alt-v"></i> <div class="input-group"> <input type="text" name="opciones[]" value="'+nombre+'" class="form-control"> <div class="lista-opciones input-group-append"> <button onclick="eliminarOpcion('+valor+')" class="btn btn-danger" type="button"> <i style="color:white" class="fas fa-times"></i> </button> </div> </div> </li>');
    });
    </script>
@endsection
