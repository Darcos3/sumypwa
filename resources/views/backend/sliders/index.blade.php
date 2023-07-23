@extends('backend.layouts.app')

@section('titulo', 'Sliders')

@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Sliders</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item active" aria-current="page">Listado</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group"  role="group">
                <a href="{{ route('sliders.create') }}" type="button" class="btn btn-primary">Nuevo</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table mb-0 table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">nombre</th>
                                <th scope="col">Activo</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sliders as $slider)
                                <tr>
                                    <th scope="row">{{ $slider->id }}</th>
                                    <td>{{ $slider->nombre }}</td>
                                </td>
                                <td>
                                    @if ($slider->activo)
                                        <div class="font-22 text-success">	<i class="bx bx-check-circle"></i></div>
                                    @else
                                        <div class="font-22 text-danger">	<i class="bx bx-x-circle"></i></div>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('sliders.edit', $slider->id) }}" type="button" class="btn btn-outline-dark"><i class="bx bx-edit-alt"></i>
                                        </a>

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#eliminar{{$slider->id}}" title="Eliminar slider {{$slider->id}}">
                                          <i class="bx bx-trash"></i>
                                        </button>
                                        
                                        <!-- Modal -->
                                        <div class="modal fade" id="eliminar{{$slider->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Eliminar slider</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Estas seguro que quieres eliminar el slider {{$slider->id }} ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                        <form action="{{ route('sliders.delete', $slider->id) }}" method="post" role="form">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-dark px-5">Eliminar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
