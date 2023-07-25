<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Title -->
        <title>@yield('titulo') | SUMY - Transportadores</title>

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
        <script src="{{ asset('js/jquery-3.7.0.min.js') }}"></script>
        <script src="{{ asset('pwa/js/scripts.js') }}"></script>
        @yield('scripts')
    </body>
</html>
