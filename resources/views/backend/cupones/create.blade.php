@extends('backend.layouts.app')

@section('titulo', 'Nuevo Cupón')


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
        <div class="breadcrumb-title pe-3">Cupón</div>
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
                    <form class="row g-3" id="registro" class="kt-form kt-form--label-right" method="POST" action="{{ route('cupones.store') }}" role="form" enctype='multipart/form-data'>
                    @csrf
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre">
                        </div>
                        <div class="col-md-4">
                            <label for="codigo" class="form-label">Código</label>
                            <input type="text" class="form-control" id="codigo" name="codigo">
                        </div>
                        <div class="col-md-6">
                            <label for="usos" class="form-label">Usos</label>
                            <input type="number" class="form-control" id="usos" name="usos">
                        </div>
                        <div class="col-md-6">
                            <input type="date" id="hoy" style="display:none">
                            <label for="usos" class="form-label">Vencimiento</label>
                            <input type="date" class="form-control" id="vencimiento" name="vencimiento">
                        </div>
                        <div class="col-md-3">
                            <label for="descuento_dinero" class="form-label">Descuento en $</label>
                            <input type="number" class="form-control" id="descuento_dinero" name="descuento_dinero">
                        </div>

                        <div class="col-md-3">
                            <label for="nombre" class="form-label">Descuento Pesos</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="dtopesos" id="dtopesos">
                                <label class="form-check-label" for="flexCheckChecked">Activar</label>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="descuento_porcentaje" class="form-label">Descuento en %</label>
                            <input type="number" step=".1" class="form-control" id="descuento_porcentaje" name="descuento_porcentaje">
                        </div>

                        <div class="col-md-3">
                            <label for="nombre" class="form-label">Descuento Porcentaje</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="dtoporcentaje" id="dtoporcentaje">
                                <label class="form-check-label" for="flexCheckChecked">Activar</label>
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
        var fecha = new Date(); //Fecha actual
        var mes = fecha.getMonth()+1; //obteniendo mes
        var dia = fecha.getDate(); //obteniendo dia
        var ano = fecha.getFullYear(); //obteniendo año
        if(dia<10){
            dia='0'+dia; //agrega cero si el menor de 10
        }
        if(mes<10){
            mes='0'+mes
        }
        $("#hoy").val(ano+"-"+mes+"-"+dia);

        $("#vencimiento").change(function(){
            if( $("#vencimiento").val() < $("#hoy").val() ){
                alert('Debes seleccionar una fecha posterior a la fecha actual');
                $("#vencimiento").val('');
            }
        });

        $("#dtopesos").click(function(){
            console.log('dtopesos click');
            if( $("#dtopesos").is(':checked')== true){

                $("#dtoporcentaje").prop('checked', false);

                $("#descuento_porcentaje").val(0.0);
                $("#descuento_porcentaje").prop('disabled', true);

                $("#descuento_dinero").prop('disabled', false);

            } 
        })

        $("#dtoporcentaje").click(function(){
            console.log('dtoporcentaje click');
            if( $("#dtoporcentaje").is(':checked') == true){
                $("#dtopesos").prop('checked', false);
                $("#descuento_dinero").prop('disabled', true);
                $("#descuento_dinero").val(0.0);

                $("#descuento_porcentaje").prop('disabled', false);

            } 
        })
    </script>
@endsection
