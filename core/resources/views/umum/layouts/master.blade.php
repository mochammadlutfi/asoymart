<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Title -->
        <title>ASOY MART</title>

        <!-- Required Meta Tags Always Come First -->
        @include('include.meta')
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
        <!-- CSS Implementing Plugins -->
        <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/font-awesome/css/fontawesome-all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/font-electro.css') }}">

        <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/animate.css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/hs-megamenu/src/hs.megamenu.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/fancybox/jquery.fancybox.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/js/plugins/slick-carousel/slick/slick.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/js/plugins/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/js/plugins/sweetalert2/sweetalert2.min.css') }}">

        <!-- CSS Electro Template -->
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/theme.css') }}">
        @yield('styles')
    </head>

    <body>

        <!-- ========== HEADER ========== -->
        @include('umum.layouts.header')
        <!-- ========== END HEADER ========== -->

        <!-- ========== MAIN CONTENT ========== -->
        @yield('content')
        <!-- ========== END MAIN CONTENT ========== -->

        <!-- ========== FOOTER ========== -->
        @include('umum.layouts.footer')
        <!-- ========== END FOOTER ========== -->

        <!-- ========== SECONDARY CONTENTS ========== -->
        <!-- ========== HEADER SIDEBAR ========== -->
        @include('umum.layouts.sidebar_nav')
        <!-- ========== END HEADER SIDEBAR ========== -->
        @include('umum.layouts.bottom_menu')
        <!-- ========== END SECONDARY CONTENTS ========== -->
        @include('umum.include.add-cart')

        @include('umum.include.login')


        <!-- Go to Top -->
        <a class="js-go-to u-go-to d-none d-lg-block" href="#"
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
        <script src="{{ asset('assets/frontend/vendor/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/frontend/vendor/jquery-migrate/dist/jquery-migrate.min.js') }}"></script>
        <script src="{{ asset('assets/frontend/vendor/popper.js/dist/umd/popper.min.js') }}"></script>
        <script src="{{ asset('assets/frontend/vendor/bootstrap/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/laroute.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

        <!-- JS Implementing Plugins -->
        <script src="{{ asset('assets/frontend/vendor/appear.js') }}"></script>
        <script src="{{ asset('assets/frontend/vendor/jquery.countdown.min.js') }}"></script>
        <script src="{{ asset('assets/frontend/vendor/hs-megamenu/src/hs.megamenu.js') }}"></script>
        <script src="{{ asset('assets/frontend/vendor/svg-injector/dist/svg-injector.min.js') }}"></script>
        <script src="{{ asset('assets/frontend/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}"></script>
        <script src="{{ asset('assets/frontend/vendor/jquery-validation/dist/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('assets/frontend/vendor/fancybox/jquery.fancybox.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/slick-carousel/slick/slick.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/accounting.js/0.4.1/accounting.min.js"></script>

        <!-- JS Electro -->
        <script src="{{ asset('assets/frontend/js/hs.core.js') }}"></script>
        <script src="{{ asset('assets/frontend/js/components/hs.countdown.js') }}"></script>
        <script src="{{ asset('assets/frontend/js/components/hs.header.js') }}"></script>
        <script src="{{ asset('assets/frontend/js/components/hs.hamburgers.js') }}"></script>
        <script src="{{ asset('assets/frontend/js/components/hs.unfold.js') }}"></script>
        <script src="{{ asset('assets/frontend/js/components/hs.focus-state.js') }}"></script>
        <script src="{{ asset('assets/frontend/js/components/hs.malihu-scrollbar.js') }}"></script>
        <script src="{{ asset('assets/frontend/js/components/hs.validation.js') }}"></script>
        <script src="{{ asset('assets/frontend/js/components/hs.fancybox.js') }}"></script>
        <script src="{{ asset('assets/frontend/js/components/hs.onscroll-animation.js') }}"></script>
        <script src="{{ asset('assets/frontend/js/components/hs.slick-carousel.js') }}"></script>
        <script src="{{ asset('assets/frontend/js/components/hs.show-animation.js') }}"></script>
        <script src="{{ asset('assets/frontend/js/components/hs.svg-injector.js') }}"></script>
        <script src="{{ asset('assets/frontend/js/components/hs.go-to.js') }}"></script>
        <script src="{{ asset('assets/frontend/js/components/hs.selectpicker.js') }}"></script>

        <!-- JS Plugins Init. -->
        <script src="{{ asset('assets/modules/page/js/home.js') }}"></script>
        <script src="{{ asset('assets/js/common.js') }}"></script>
        <script src="{{ asset('assets/js/functions.js') }}"></script>
        @stack('scripts')
    </body>
</html>
