<!doctype html>
<html lang="en" class="no-focus">
    <head>
        @include('mitra.layouts.meta')

        <!-- Stylesheets -->

        <!-- Page JS Plugins CSS -->

        {{-- <link rel="stylesheet" href="{{ asset('assets/backend/js/plugins/slick/slick.css') }}"> --}}
        <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables/dataTables.bootstrap4.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css">
        {{-- <link rel="stylesheet" href="{{ asset('assets/js/plugins/sweetalert2/sweetalert2.min.css') }}"> --}}

        @yield('styles')
        {{--  --}}
        <!-- Fonts and Codebase framework -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,400i,600,700">
        {{-- <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/codebase.css') }}"> --}}
        <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/codebase.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/js/plugins/sweetalert2/sweetalert2.min.css') }}">
        <!-- Scripts -->
        <script>window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};</script>
        <link rel="stylesheet" id="css-theme" href="{{ asset('assets/css/themes/earth.css') }}">
        <!-- END Stylesheets -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>

        <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header main-content-boxed">

            @include('mitra.layouts.sidebar')
            <!-- END Sidebar -->

            <!-- Header -->
            @include('mitra.layouts.header')
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">

                <!-- Page Content -->
                @yield('content')
                <!-- END Page Content -->

            </main>
            <!-- END Main Container -->

            @include('mitra.layouts.footer');

        </div>
        @include('mitra.layouts.incl_scripts');
        @stack('scripts')
    </body>
</html>
