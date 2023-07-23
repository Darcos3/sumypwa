@extends('backend.layouts.app')

@section('titulo', 'Ferreteros')

@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Ferreteros</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item active" aria-current="page">Listado</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table mb-0 table-hover table-sm">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">nombre Cliente</th>
                                <th scope="col">Ferretería</th>
                                <th scope="col">NIT</th>
                                <th scope="col">Dirección de la Ferretería</th>
                                <th scope="col">Estado del cupo</th>
                                <th scope="col">Cupo Total</th>
                                {{-- <th scope="col">Duración crédito</th> --}}
                                {{-- <th scope="col">Vencimiento crédito</th> --}}
                                {{-- <th scope="col" title="Ordenes pendientes">Ordenes Pend.</th> --}}
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ferreteros as $ferretero)
                                <tr>
                                    <td scope="row">{{ $ferretero->id }}</td>
                                    <td>{{ $ferretero->nombre_representante }}</td>
                                    <td>{{ $ferretero->nombre_ferreteria }}</td>
                                    <td>{{ $ferretero->nit }}</td>
                                    <td>{{ $ferretero->direccion }}</td>
                                    <td>
                                        <div class="badge rounded-pill text-dark">
                                            @if( $ferretero->estado_ferretero_id == 1 )
                                                <div class="text-success">Pendiente</div>
                                            @elseif( $ferretero->estado_ferretero_id == 2 )
                                                <div class="text-success">Aprobada</div>
                                            @endif
                                        </div>
                                    </td>
                                    <td>${{  number_format($ferretero->cupo, 0, ',', '.') }}</td>

                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('ferreteros.show', $ferretero->id) }}" type="button" class="btn btn-outline-dark"><i class="lni lni-eye"></i></a>
                                            <a title="Aprobar" href="{{ route('ferreteros.edit', $ferretero->id) }}" type="button" class="btn btn-outline-dark"><i class="bx bx-edit-alt"></i>
                                            </a>
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
