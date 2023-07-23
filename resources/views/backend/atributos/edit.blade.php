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
                    <form class="row g-3" id="registro" class="kt-form kt-form--label-right" method="POST" action="{{ route('atributos.update',$atributo->id) }}" role="form" enctype='multipart/form-data'>
                        @csrf
                        {{ method_field('PATCH') }}
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{$atributo->nombre}}">
                        </div>
                        <div class="col-md-6">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" value="{{$atributo->slug}}">
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
                            <div id="sortable" class="col-md-8">
                                @foreach ($atributo->terminos as $key => $termino)

                                    <div id="opcion{{$key}}"  class="input-group col-md-6">
                                        <input type="file" name="imagen_actual[{{$termino->id}}]" class="form-control">
                                        <input type="text" name="terminos_actual[{{$termino->id}}]" class="form-control" value="{{$termino->nombre}}" aria-label="Recipient's username" aria-describedby="button-addon2">

                                        <div class="input-group-text">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modaleliminartermino{{$termino->id}}"  style="margin-right: 15px !important">
                                              Eliminar
                                            </button>
                                            
                                            <!-- Modal -->
                                            <div class="modal fade" id="modaleliminartermino{{$termino->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Eliminar Termino</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            ¿Estas seguro que deseas eliminar el termino {{ $termino->nombre }} ?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                            <button onclick="eliminarOpcionActual({{$key}},{{$termino->id}})" class="btn btn-outline-danger" type="button" id="nueva_opcion" data-bs-dismiss="modal">Eliminar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <input style="margin-right:5px;" id="eliminar_imagen_{{$termino->id}}" class="form-check-input" type="checkbox" name="eliminar_imagen_actual[{{$termino->id}}]">
                                            <label for="eliminar_imagen_{{$termino->id}}"> Eliminar imagen</label>
                                        </div>

                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="button" class="btn btn-primary btn-sm px-5" data-bs-toggle="modal" data-bs-target="#modalguardar"  style="margin-right: 15px !important">
                                Guardar
                            </button>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="modalguardar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Editar Terminos</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                        </div>
                                        <div class="modal-body">
                                            ¿Estas seguro que deseas editar los cambios de estos términos?
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
    <script>
    function eliminarOpcion(val) {
        $("#opcion"+val).remove();
    }

    function eliminarOpcionActual(val,id) {
        $("#opcion"+val).remove();
        $("#sortable").append(`
            <input type="hidden" name="eliminar_terminos[]" value="`+id+`">
        `);
    }


    var valor = {{ $key ?? '' }};
    $( "#nueva_opcion" ).click(function() {
        $( "#termino_nombre" ).focus();
        var nombre = $( "#termino_nombre" ).val();
        $( "#termino_nombre" ).val('');
        valor++;
        $("#sortable").append(`
            <div id="opcion`+valor+`"  class="input-group col-md-6">
                <input type="file" name="imagen_terminos[`+valor+`]" class="form-control">
                <input type="text" name="terminos[`+valor+`]" class="form-control" value="`+nombre+`" aria-label="Recipient's username" aria-describedby="button-addon2">
                <button onclick="eliminarOpcion(`+valor+`)" class="btn btn-outline-danger" type="button">Eliminar</button>
            </div>
        `);
        // $("#sortable").append(' <li id="opcion'+valor+'" class="ui-state-default"> <i style="color:#ef9d00;padding-right: 15px;" class="fas fa-arrows-alt-v"></i> <div class="input-group"> <input type="text" name="opciones[]" value="'+nombre+'" class="form-control"> <div class="lista-opciones input-group-append"> <button onclick="eliminarOpcion('+valor+')" class="btn btn-danger" type="button"> <i style="color:white" class="fas fa-times"></i> </button> </div> </div> </li>');
    });
    </script>
@endsection
