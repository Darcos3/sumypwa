@extends('frontend.usuarios.layouts.usuarios')

@section('titulo', 'Cuenta')

@section('contenido')
    <h2>Administrar las direcciones</h2>
    <p>
        Actualización de la dirección.
    </p>

    <div class="row mb-6 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
        <form action="{{ route('usuarios.direcciones.update', $direccion->id)}}" method="post" role="form">
            @method('PATCH')
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Tipo</label>
                        <input class="form-control" name="tipo" type="text" class="input-text" value="{{$direccion->tipo}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input class="form-control" name="nombres" type="text" class="input-text" value="{{$direccion->nombres}}">
                    </div>
                    <div class="form-group">
                        <label>Apellido</label>
                        <input class="form-control" name="apellidos" type="text" class="input-text" value="{{$direccion->apellidos}}">
                    </div>
                    <div class="form-group">
                        <label>Nombre Empresa</label>
                        <input class="form-control" name="nombre_empresa" type="text" class="input-text" value="{{$direccion->nombre_empresa}}">
                    </div>
                    
                    
                    <div class="form-group">
                        <label>Departamento</label>
                        <select id="departamento_id" name="departamento_id" class="form-control js-select selectpicker dropdown-select departamento" required="" data-msg="Please select state." data-error-class="u-has-error" data-success-class="u-has-success"
                            data-live-search="true"
                            data-style="form-control border-color-1 font-weight-normal">
                            @foreach ($departamentos as $departamento)
                                <option {{ $departamento->id == $direccion->ciudad->departamento_id ? 'selected' : '' }} value="{{ $departamento->id }}">{{ $departamento->nombre  }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Dirección</label>
                        <input class="form-control" name="direccion" type="text" class="input-text" value="{{$direccion->direccion}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Documento</label>
                        <input class="form-control" name="documento" type="text" class="input-text" value="{{$direccion->documento}}">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="email" type="email" class="input-text" value="{{$direccion->email}}">
                    </div>
                    <div class="form-group">
                        <label>Teléfono</label>
                        <input class="form-control" name="telefono" type="tel" class="input-text" value="{{$direccion->telefono}}">
                    </div>
                    <div class="form-group">
                        <label>Ciudad</label>
                        <select id="ciudad_id" name="ciudad_id" class="form-control" required="" data-msg="Please select state." data-error-class="u-has-error" data-success-class="u-has-success"
                            data-live-search="true"
                            data-style="form-control border-color-1 font-weight-normal">
                            <option {{ $direccion->ciudad_id == $direccion->ciudad->id ? 'selected' : '' }} value="{{ $direccion->ciudad->id }}">{{ $direccion->ciudad->nombre}}</option>
                            
                            {{-- @foreach ($ciudades as $ciudad) --}}
                                {{-- <option value="{{ $ciudad->id }}">{{ $ciudad->nombre }}</option> --}}
                            {{-- @endforeach --}}
                        </select>   
                    </div>
                    <div class="form-group">
                        <label>Comentario</label>
                        <textarea name="comentario" rows="4" class="form-control input-text" value="">{{$direccion->comentario}}</textarea>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary-dark-w px-5">Guardar</button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
         var dep_id = $( "#departamento_id" ).val();
         var city_id = $( "#ciudad_id" ).val();
         $.ajax({
            type:"GET",
            url:"/departamentos/"+dep_id,
            success: function(data) {
                console.log(data)
                // $('#ciudad_id') .find('option') .remove() .end() .append('<option value="">Escoja una ciudad</option>') .val('whatever');
                $.each(data, function(key, value) {
                    if(value.id != city_id ){
                        $("#ciudad_id").append('<option value="'+value.id+'">'+value.nombre+'</option>');
                    }
                });
            }
        });

        

        $( "#departamento_id" ).change(function() {
            var dep_id = $( "#departamento_id" ).val();
            $.ajax({
                type:"GET",
                url:"/departamentos/"+dep_id,
                success: function(data) {
                    console.log(data)
                    $('#ciudad_id') .find('option') .remove() .end() .append('<option value="">Escoja una ciudad</option>') .val('whatever');
                    $.each(data, function(key, value) {
                        $("#ciudad_id").append('<option value="'+value.id+'">'+value.nombre+'</option>');
                    });
                }
            });
        });
        $( "#direccion1" ).change(function() {
            var dir_id = $( "#direccion1" ).val();
            $.ajax({
                type:"GET",
                url:"/direcciones/"+dir_id,
                success: function(data) {
                    $('#ciudad_id').val('whatever');


                    $('#ciudad_id') .find('option') .remove() .end() .append('<option value="">Escoja una ciudad</option>') .val('whatever');
                    $.each(data, function(key, value) {
                        $("#ciudad_id").append('<option value="'+value.id+'">'+value.nombre+'</option>');
                    });
                }
            });
        });
    </script>
@endsection
