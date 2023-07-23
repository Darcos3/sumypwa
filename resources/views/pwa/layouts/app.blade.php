<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Title -->
        <title>@yield('titulo') | SUMY - Domiciliarios</title>

        <!-- Required Meta Tags Always Come First -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('frontend/assets/images/favicon.png') }}">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">

        {{-- PWA --}}
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link href="{{ asset('pwa/css/styles.css') }}" rel="stylesheet" />
        @yield('styles')
        @laravelPWA
    </head>

    <body data-spy="scroll" data-target=".navbar" data-offset="90" data-bs-smooth-scroll="true">
        <!-- ========== MAIN CONTENT ========== -->
        @yield('content')
        <!-- ========== END MAIN CONTENT ========== -->
        <!-- Go to Top -->
        <a class="js-go-to u-go-to" href="#"
            data-position='{"bottom": 15, "right": 15 }'
            data-type="fixed"
            data-offset-top="400"
            data-compensation="#header"
            data-show-effect="slideInUp"
            data-hide-effect="slideOutDown">
            <span class="fas fa-arrow-up u-go-to__inner"></span>
        </a>
        <!-- End Go to Top -->

        <!-- JS Global Compulsory -->
        <script src="{{ asset('frontend/assets/vendor/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/vendor/jquery-migrate/dist/jquery-migrate.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/vendor/popper.js/dist/umd/popper.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/vendor/bootstrap/bootstrap.min.js') }}"></script>

        <!-- JS Implementing Plugins -->
        <script src="{{ asset('frontend/assets/vendor/appear.js') }}"></script>
        <script src="{{ asset('frontend/assets/vendor/jquery.countdown.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/vendor/hs-megamenu/src/hs.megamenu.js') }}"></script>
        <script src="{{ asset('frontend/assets/vendor/svg-injector/dist/svg-injector.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/vendor/jquery-validation/dist/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/vendor/fancybox/jquery.fancybox.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/vendor/typed.js/lib/typed.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/vendor/slick-carousel/slick/slick.js') }}"></script>
        <script src="{{ asset('frontend/assets/vendor/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>

        <!-- JS Electro -->

        <script src="{{ asset('frontend/assets/js/hs.core.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/components/hs.range-slider.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/components/hs.countdown.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/components/hs.header.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/components/hs.hamburgers.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/components/hs.unfold.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/components/hs.focus-state.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/components/hs.malihu-scrollbar.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/components/hs.validation.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/components/hs.fancybox.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/components/hs.onscroll-animation.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/components/hs.slick-carousel.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/components/hs.show-animation.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/components/hs.svg-injector.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/components/hs.go-to.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/components/hs.selectpicker.js') }}"></script>


        <!-- JS Plugins Init. -->
        <script>
            $(".btn-add-cart").click(function(){
                $('#ModalQuantity').modal({backdrop: 'static', keyboard: false})
                $("#error-cantidades").hide();
            });

            $(window).on('load', function () {
                // initialization of HSMegaMenu component
                $('.js-mega-menu').HSMegaMenu({
                    event: 'hover',
                    direction: 'horizontal',
                    pageContainer: $('.container'),
                    breakpoint: 767.98,
                    hideTimeOut: 0
                });
            });

            $(document).on('ready', function () {
                
                
            
                // initialization of header
                $.HSCore.components.HSHeader.init($('#header'));

                // initialization of animation
                $.HSCore.components.HSOnScrollAnimation.init('[data-animation]');

                // initialization of unfold component
                $.HSCore.components.HSUnfold.init($('[data-unfold-target]'), {
                    afterOpen: function () {
                        $(this).find('input[type="search"]').focus();
                    }
                });

                // initialization of popups
                $.HSCore.components.HSFancyBox.init('.js-fancybox');

                // initialization of countdowns
                var countdowns = $.HSCore.components.HSCountdown.init('.js-countdown', {
                    yearsElSelector: '.js-cd-years',
                    monthsElSelector: '.js-cd-months',
                    daysElSelector: '.js-cd-days',
                    hoursElSelector: '.js-cd-hours',
                    minutesElSelector: '.js-cd-minutes',
                    secondsElSelector: '.js-cd-seconds'
                });

                $.HSCore.components.HSRangeSlider.init('.js-range-slider');

                // initialization of malihu scrollbar
                $.HSCore.components.HSMalihuScrollBar.init($('.js-scrollbar'));

                // initialization of forms
                $.HSCore.components.HSFocusState.init();

                // initialization of form validation
                $.HSCore.components.HSValidation.init('.js-validate', {
                    rules: {
                        confirmPassword: {
                            equalTo: '#signupPassword'
                        }
                    }
                });

                // initialization of show animations
                $.HSCore.components.HSShowAnimation.init('.js-animation-link');

                // initialization of fancybox
                $.HSCore.components.HSFancyBox.init('.js-fancybox');

                // initialization of slick carousel
                $.HSCore.components.HSSlickCarousel.init('.js-slick-carousel');

                // initialization of go to
                $.HSCore.components.HSGoTo.init('.js-go-to');

                // initialization of hamburgers
                $.HSCore.components.HSHamburgers.init('#hamburgerTrigger');

                // initialization of unfold component
                $.HSCore.components.HSUnfold.init($('[data-unfold-target]'), {
                    beforeClose: function () {
                        $('#hamburgerTrigger').removeClass('is-active');
                    },
                    afterClose: function() {
                        $('#headerSidebarList .collapse.show').collapse('hide');
                    }
                });

                $('#headerSidebarList [data-toggle="collapse"]').on('click', function (e) {
                    e.preventDefault();

                    var target = $(this).data('target');

                    if($(this).attr('aria-expanded') === "true") {
                        $(target).collapse('hide');
                    } else {
                        $(target).collapse('show');
                    }
                });

                // initialization of unfold component
                $.HSCore.components.HSUnfold.init($('[data-unfold-target]'));

                // initialization of select picker
                $.HSCore.components.HSSelectPicker.init('.js-select');
            });

            $( ".anadir-favorito" ).click(function(e) {
                var id = $(this).attr('data-id');
                var element = $(this);

                e.preventDefault();

                $.ajax({
                    type:"GET",
                    url:"/productos/favorito/"+id,
                    success: function(data) {
                        $("#icono-favorito").html(data.cantidad);
                        if (data.estado === 0 ) {
                            console.log('elimina');
                            element.closest('div').find('.fas').css('color', '#848484');
                        } else {
                            console.log('añade');
                            element.children("i").css("color", "red");
                        }
                    }
                });
            });

            $( ".btn-add-cart" ).click(function(e) {

                console.log($("#input-modal").val());

                

                var id = $(this).attr('data-id');
                var esCombo = $(this).attr('data-combo');
                var url = esCombo == 0 ? "/productos/datos-modal/" : "/combos/datos-modal/" ;
                $.ajax({
                    type:"GET",
                    url:url+id,
                    success: function(data) {
                        console.log(data);
                        console.log(data.b.pivot);
                        
                        $("#input-modal").change(function(){
                            if($("#input-modal").val() > data.a.cantidad){
                                $("#error-cantidades").show();
                                $("#boton-modal").hide();
                            }
                            else {
                                $("#error-cantidades").hide();
                                $("#boton-modal").show();
                            }
                        });
                        
                        $("#producto-modal").html(data.a.nombre);
                        $(".producto-modal").html(data.a.nombre);
                        $("#producto-cantidad").html(data.a.cantidad);
                        $("#input-modal").attr("max", data.a.cantidad);
                        
                        {{-- $("#imagen-modal").attr("src","/storage/imagenes_producto/original/"+data.a.imagen); --}}

                        if( data.b.pivot == undefined ) {
                            $("#input-modal").val(1);
                            $("#cantidades").text(0);
                            $("#unidades").text(1);

                            {{-- $("#input-modal").val(data.b.pivot); --}}
                            $("#unidades").text(data.b.pivot);
                            $("#error_existencias").hide();
                            $("#boton-modal").show();
                        }
                        else{
                            if ( data.b.pivot != undefined ){
                                if( data.b.pivot > data.a.cantidad ){
                                    $("#input-modal").attr("max", 0);
                                    $("#input-modal").attr("min", 0);
                                    $("#input-modal").val(0);
                                    $("#unidades").hide();
                                    $("#error_existencias").show();
                                    $("#boton-modal").hide();
                                }
                                else {
                                    $("#input-modal").val(data.b.pivot);
                                    $("#unidades").show();
                                    $("#unidades").text(data.b.pivot);
                                    $("#error_existencias").hide();
                                    $("#boton-modal").show();
                                }
                            }
                            if(  0 > data.a.cantidad ){
                                $("#input-modal").attr("max", 0);
                                $("#input-modal").attr("min", 0);
                                $("#input-modal").val(0);
                                $("#unidades").hide();
                                $("#error_existencias").show();
                                $("#boton-modal").hide();
                            }
                            $("#cantidades").text(data.b.pivot - 1);
                        }
                        
                        $("#boton-modal").attr('onClick', "anadirCarrito("+id+",1,"+esCombo+");");
                    }
                });
            });

            function anadirCarrito(id, cantidad2, esCombo = 0) {
                var cantidad = $("#input-modal").val();

                console.log('entra con '+cantidad);
                $.ajax({
                    type:"GET",
                    url:"/anadircarrito?id="+id+"&cantidad="+cantidad+"&escombo="+esCombo,
                    success: function(data) {
                        console.log('añade carrito');

                        $("#icono-carrito").html(data.cantidad);
                        $("#total-carrito").html('$'+data.total.toLocaleString('es-CO',{maximumFractionDigits:0}));
                        location.reload();

                    }
                });
            }
        </script>

        @yield('scripts')
    </body>
</html>
