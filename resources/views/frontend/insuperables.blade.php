@extends('frontend.layouts.app')

@section('titulo', 'Insuperables')

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
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Insuperables</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="container">
            <div class="mb-8 position-relative">
                <dv class="d-flex justify-content-between border-bottom border-color-1 flex-md-nowrap flex-wrap border-sm-bottom-0">
                    <h3 class="section-title section-title__full mb-0 pb-2 font-size-22">Productos Insuperables</h3>
                </dv>
                <div 
                    class="js-slick-carousel u-slick u-slick--gutters-0 position-static overflow-hidden u-slick-overflow-visble pb-5 pt-2 px-1"
                    data-arrows-classes="d-none d-xl-block u-slick__arrow-normal u-slick__arrow-centered--y rounded-circle text-black font-size-30 z-index-2"
                    data-arrow-left-classes="fa fa-angle-left u-slick__arrow-inner--left left-n16"
                    data-arrow-right-classes="fa fa-angle-right u-slick__arrow-inner--right right-n20"
                    data-pagi-classes="d-xl-none text-center right-0 bottom-1 left-0 u-slick__pagination u-slick__pagination--long mb-0 z-index-n1 mt-3 pt-1"
                    data-slides-show="10"
                    data-slides-scroll="1"
                    data-responsive='[{
                        "breakpoint": 1400,
                        "settings": {
                        "slidesToShow": 4
                        }
                    }, {
                        "breakpoint": 1200,
                        "settings": {
                            "slidesToShow": 3
                        }
                    }, {
                        "breakpoint": 992,
                        "settings": {
                        "slidesToShow": 3
                        }
                    }, {
                        "breakpoint": 768,
                        "settings": {
                        "slidesToShow": 2
                        }
                    }, {
                        "breakpoint": 554,
                        "settings": {
                        "slidesToShow": 2
                        }
                    }]'>
                    @foreach ($insuperables as $proIns)
                        @include('frontend.productos.parcial.producto-1', ['producto' => $proIns])
                    @endforeach
                </div>
            </div>

        </div>
    </main>
@endsection