@extends('backend.layouts.app')

@section('titulo', 'Nueva Etqieueta')


@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Etiquetas</div>
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
                    <form class="row g-3" id="registro" class="kt-form kt-form--label-right" method="POST" action="{{ route('etiquetas.update', $etiqueta->id) }}" role="form" enctype='multipart/form-data'>
                    @csrf
                    {{ method_field('PATCH') }}
                        <div class="col-md-5">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{$etiqueta->nombre}}">
                        </div>
                        <div class="col-md-5">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" value="{{$etiqueta->slug}}">
                        </div>
                        <div class="col-md-2">
                            <label for="sku" class="form-label">Activa</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="activa" value="" id="activa" {{ $etiqueta->activa ? 'checked' : ''}}>
                                <label class="form-check-label" for="activa">Activar etiqueta</label>
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
