@extends('backend.layouts.app')

@section('titulo', 'Validar Ferretero')


@section('styles')
    <link href="{{ asset('backend/assets/css/basic.min.css') }}" rel="stylesheet">

    <link href="{{ asset('backend/assets/css/lightbox.min.css') }}" rel="stylesheet" />
@endsection


@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Ferretero</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item active" aria-current="page">Validarrrr</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-2">
        <div class="col-md-12">
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                        </div>
                        <h5 class="mb-0 text-primary">Datos del Ferretero</h5>
                    </div>
                    <hr>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Nombre de la Ferreteria</label>
                            <p>{{$ferretero->user->name}}</p>
                        </div>
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">NIT</label>
                            <p>{{$ferretero->nit}}</p>
                        </div>
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Dirección Ferretería</label>
                            <p>{{$ferretero->direccion}}</p>
                        </div>
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Número Contacto</label>
                            <p>{{$ferretero->numero_contacto}}</p>
                        </div>
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Correo electrónico</label>
                            <p>{{$ferretero->email}}</p>
                        </div>
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Nombre representante</label>
                            <p>{{$ferretero->nombre_representante}}</p>
                        </div>
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Celular</label>
                            <p>{{$ferretero->celular}}</p>
                        </div>
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Foto de la Cámara de Comercio</label>
                            <p>
                                <a href="{{asset('storage/ferreteros/'.$ferretero->camara_comercio)}}" target="_blank">
                                    <img style="width:100px; height:auto;" src="{{asset('storage/ferreteros/'.$ferretero->camara_comercio)}}" alt="">
                                    Enlace
                                </a>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Foto de la Cédula</label>
                            <p>
                                <a href="{{asset('storage/ferreteros/'.$ferretero->foto_cedula)}}" target="_blank">
                                    <img style="width:100px; height:auto;" src="{{asset('storage/ferreteros/'.$ferretero->foto_cedula)}}" alt="">
                                    Enlace
                                </a>
                            </p>
                            {{-- <p><a href="{{asset('storage/ferreteros/'.$ferretero->foto_cedula)}}">Enlace</a></p> --}}
                        </div>
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Foto del RUT</label>
                            <p>
                                <a href="{{asset('storage/ferreteros/'.$ferretero->foto_rut)}}" target="_blank">
                                    <img style="width:100px; height:auto;" src="{{asset('storage/ferreteros/'.$ferretero->foto_rut)}}" alt="">
                                    Enlace
                                </a>
                            </p>
                            {{-- <p><a href="{{asset('storage/ferreteros/'.$ferretero->foto_rut)}}">Enlace</a></p> --}}
                        </div>
                    </div>
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                        </div>
                        <h5 class="mb-0 text-primary">Verificación</h5>
                    </div>
                    <hr>
                    <form class="row g-3" id="registro" class="kt-form kt-form--label-right" method="POST" action="{{ route('ferreteros.update',$ferretero->id) }}" role="form" enctype='multipart/form-data'>
                        @csrf
                        {{ method_field('PATCH') }}
                        <div class="col-md-4">
                            <label for="precio" class="form-label">Cupo asignado</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bx-dollar' ></i></span>
                                <input type="number" name="cupo" class="form-control border-start-0" min="1" id="precio" name="precio" placeholder="Precio" />
                            </div>
                        </div>
                        <div class="col-md-8">
                            <label class="form-label">Decisión</label>
                            <select class="form-select" name="estado_ferretero_id" id="estado_ferretero_id">
                                <option value="" >Seleccione</option>
                                <option value="2" >Aprobar</option>
                                <option value="3" >Rechazar</option>
                                <option value="4" >Revisar de nuevo</option>
                            </select>
                        </div>
                        {{-- <div class="col-md-8">
                            <label class="form-label">Tiempo del crédito </label>
                            <select class="form-select" name="tiempo_credito" id="tiempo_credito" disabled>
                                <option value="" >Seleccione</option>
                                <option value="15" >15 dias</option>
                                <option value="30" >30 dias</option>
                            </select>
                        </div> --}}
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
        
        $("#estado_ferretero_id").change(function(){
            let option = $("#estado_ferretero_id option:selected").val();

            if( option == 2){
                $("#tiempo_credito").prop('disabled', false);
            }
            else {
                $("#tiempo_credito").prop('disabled', true);
            }
        })
    
    </script>
    <script src="{{ asset('backend/assets/js/lightbox.min.js') }}"></script>
@endsection
