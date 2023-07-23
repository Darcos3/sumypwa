@extends('frontend.layouts.app')

@section('titulo', 'Marcas')

@section('content')
    <main id="content" role="main">
        <!-- breadcrumb -->
        <div class="bg-gray-13 bg-md-transparent">
            <div class="container">
                <!-- breadcrumb -->
                <div class="my-md-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="/">Inicio</a></li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Marcas</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="container">
            <div class="mb-4">
                <h1 class="text-center">Marcas</h1>
            </div>
            <div class="my-4 my-xl-8 page-marcas">
                <div class="row">
                    @foreach ($marcas->terminos as $marca)
                        <div class="col-sm-6 col-md-4 col-lg-2 mr-md-auto mr-xl-0 mb-5">
                            {{-- <a class="lnk-marca" href="{{ route('terminos.show',  ['atributo' => $marca->slug, 'termino' => $marca->slug]) }}"> --}}
                                @if( $marca->imagen != '')
                                <a class="lnk-marca text-center" href="/marcas/{{ $marca->nombre }}">
                                <img src="{{ asset('storage/terminos/'.$marca->imagen )  }}" class="img-thumbnail"  style="width: 100px; height: 100px" alt="{{ $marca->nombre }}" >
                                <br>{{ $marca->nombre }}
                                </a>
                                
                                @else
                                <a class="lnk-marca text-center" href="/marcas/{{ $marca->nombre }}">
                                <img src="{{ asset('storage/marca_none.png' )  }}" class="img-thumbnail" style="width: 100px; height: 100px" title="Marca sin imagen"><br>
                                <br>{{ $marca->nombre }}
                                </a>
                                @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection
