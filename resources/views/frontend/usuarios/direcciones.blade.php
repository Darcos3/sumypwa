@extends('frontend.usuarios.layouts.usuarios')

@section('titulo', 'Cuenta')

@section('contenido')
    <h2>Administrar las direcciones</h2>
    <p>
        Creación, actualización y eliminación de las direcciones.
    </p>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalnewdireccion">Nueva</button>

    <div class="row mt-4 mb-4">
        @foreach ($direcciones as $direccion)
            <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="member">
                    <h3>{{ $direccion->tipo }}</h3>
                    <ul>
                        <li><span>Departamento</span> {{$direccion->ciudad->departamento->nombre}}</li>
                        <li><span>Ciudad</span> {{$direccion->ciudad->nombre}}</li>
                        <li><span>Dirección</span> {{$direccion->direccion}}</li>
                        <li><span>Comentario</span> {{$direccion->comentario}}</li>
                    </ul>
                    <div class="action-btns">
                        <a href="{{ route('usuarios.direcciones.edit', $direccion->id)}}"  class="btn btn-primary" role="button">Editar</a> 
                        <a href="#" class="btn btn-delete" role="button" data-toggle="modal" data-target="#borrardireccion{{$direccion->id}}">Eliminar</a>
                        <div class="modal fade" id="borrardireccion{{$direccion->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Eliminar Dirección</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        ¿En verdad quieres eliminar esta dirección?
                                    </div>
                                    <div class="modal-footer">
                                        <div class="mb-3">
                                        </div>
                                        <form action="{{ route('usuarios.direcciones.destroy', $direccion->id)}}" method="post" role="form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-primary-dark-w px-5">Eliminar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div> 
        @endforeach
    </div>

    
    <!-- Modal -->
    <div class="modal fade" id="modalnewdireccion" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nueva dirección</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('usuarios.direcciones.store')}}">
                    @csrf
                    <div class="modal-body bg-white">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Nombre de la dirección
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control facturacion nombre_direccion" name="nombre_direccion" placeholder="Ejemplo: Principal, Casa, etc" aria-label="Mi Negocio" required="" data-msg="Ingrese el nombre de la dirección." data-error-class="u-has-error" data-success-class="u-has-success" autocomplete="off" required>
                                </div>
                                <!-- End Input -->
                            </div> 
                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Nombres
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control facturacion nombre" name="nombre_facturacion" placeholder="Nombres" aria-label="Jack" required="" data-msg="Please enter your frist name." data-error-class="u-has-error" data-success-class="u-has-success" autocomplete="off" required>
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Apellidos
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control facturacion apellido" name="apellido_facturacion" placeholder="Apellidos" aria-label="Wayley" required="" data-msg="Please enter your last name." data-error-class="u-has-error" data-success-class="u-has-success" required>
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="w-100"></div>

                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Nombre de la Empresa (Opcional)
                                    </label>
                                    <input type="text" class="form-control facturacion nombre_empresa" name="nombre_empresa_facturacion" placeholder="Empresa" aria-label="Empresa" data-msg="Por favor ingrese Empresa." data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>
                                <!-- End Input -->
                            </div>
                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Cédula o NIT (Opcional)
                                    </label>
                                    <input type="text" class="form-control facturacion numero_identificacion" name="numero_identificacion_facturacion" placeholder="Cédula o NIT" aria-label="Empresa" data-msg="Por favor ingrese Empresa." data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Dirección
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control facturacion direccion" name="direccion_facturacion" placeholder="Dirección completa" aria-label="Dirección completa" required data-msg="Por favor ingrese valid address." data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Apto, Bloque, etc.
                                    </label>
                                    <input type="text" class="form-control facturacion direccion_adicional" name="direccion_adicional_facturacion" placeholder="Bloque 001, Apto 001" aria-label="Bloque 001, Apto 001" data-msg="Por favor ingrese valid address." data-error-class="u-has-error" data-success-class="u-has-success" required>
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Departamento
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select id="departamento_id" data-ciudad="ciudad_id" name="departamento_id_facturacion" class="form-control facturacion departamento_id departamento" required="" data-msg="Please select state." data-error-class="u-has-error" data-success-class="u-has-success"
                                        data-live-search="true"
                                        data-style="form-controlborder-color-1 font-weight-normal" required>
                                        <option value="">Seleccionar Departamento</option>
                                        @foreach ($departamentos as $departamento)
                                            <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- End Input -->
                            </div>


                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Ciudad
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select id="ciudad_id" name="ciudad_id_facturacion" class="form-control facturacion ciudad_id" required="" data-msg="Please select state." data-error-class="u-has-error" data-success-class="u-has-success"
                                        data-live-search="true"
                                        data-style="form-controlborder-color-1 font-weight-normal" required>
                                        <option value="">Seleccionar Ciudad</option>
                                        {{-- @foreach ($ciudades as $ciudad)
                                            <option value="{{ $ciudad->id }}">{{ $ciudad->nombre }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Email
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="email" name="email_facturacion" class="form-control facturacion email" placeholder="correo@gmail.com" aria-label="jackwayley@gmail.com" required="" data-msg="Por favor ingrese valid email address." data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Teléfono
                                    </label>
                                    <input type="text" name="telefono_facturacion" class="form-control facturacion telefono" placeholder="3XX XXX XXXX" aria-label="3XX XXX XXXX" data-msg="Please enter your last name." data-error-class="u-has-error" data-success-class="u-has-success" required>
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="w-100"></div>
                            <div class="col-md-12">
                                <!-- Input -->
                                <div class="js-form-message mb-6">
                                    <label class="form-label">
                                        Comentario (Opcional)
                                    </label>
                                    <textarea name="comentario" class="form-control facturacion comentario" placeholder="Ingresa los comentarios adicionales"></textarea>
                                </div>
                                <!-- End Input -->
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script type="text/javascript">
        $(".departamento" ).change(function() {
            console.log('cambia ciudad');
            var dep_id = $( this ).val();
            var ciudad = $( this ).attr('data-ciudad');
            console.log(dep_id);
            console.log(ciudad);
            $.ajax({
                type:"GET",
                url:"/departamentos/"+dep_id,
                success: function(data) {
                    $('#'+ciudad) .find('option') .remove() .end() .append('<option value="">Escoja una ciudad</option>') .val('whatever');
                    $.each(data, function(key, value) {
                        $("#"+ciudad).append('<option value="'+value.id+'">'+value.nombre+'</option>');
                    });
                }
            });
        });
    </script>
@endsection

