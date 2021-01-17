<!doctype html>
<html lang="en" class="no-focus">
    <head>
        <title>Mitra | Asoy Mart</title>
        @include('include.meta')

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,400i,600,700">
        <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/codebase.css') }}">
        <link rel="stylesheet" id="css-theme" href="{{ asset('assets/css/themes/earth.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/js/plugins/sweetalert2/sweetalert2.min.css') }}">
    </head>
    <body>

        <div id="page-container" class="sidebar-inverse side-scroll page-header-fixed main-content-boxed">

            <!-- Header -->
            @include('mitra.layouts.header_front')
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="content">
                    <div class="text-center">
                        <h1 class="h4 font-w700 mt-30 mb-10"> Halo, Selamat Datang!</h1>
                        <h2 class="h5 font-w400 text-muted mb-0">
                            Silahkan login dengan akun Mitra Asoy Mart. <br>Jika Anda Belum Menjadi Mitra? Silahkan <a href="{{ route('mitra.daftar') }}">Daftar</a> Disini
                        </h2>
                    </div>
                    <div class="row mt-50">
                        <div class="col-lg-6">
                            <div class="block block-rounded block-shadow">
                                <div class="block-content pb-20">
                                    <form method="POST" id="loginForm" onsubmit="return false">
                                        @csrf
                                        <div class="form-group row mb-2">
                                            <div class="col-12">
                                                <label for="login-email">Alamat Email</label>
                                                <input type="text" class="form-control" id="login-email" name="email" placeholder="Masukan Alamat Email">
                                                <div class="invalid-feedback font-size-sm" id="error-email"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <div class="col-12">
                                                <label for="login-password">Password</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" class="form-control" id="login-password" name="password" placeholder="Masukan Password">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <a href="javaScript:void(0);"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                                        </span>
                                                    </div>
                                                    <div class="invalid-feedback font-size-sm" id="error-password"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <div class="col-sm-6 d-sm-flex align-items-center">
                                                <div class="custom-control custom-checkbox mr-auto ml-0 mb-0">
                                                    <input type="checkbox" class="custom-control-input" id="login-remember-me" name="remember">
                                                    <label class="custom-control-label" for="login-remember-me">Ingat Saya</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 text-sm-right">
                                                <a class="font-weight-bold" href="#">
                                                    Lupa Password?
                                                </a>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <div class="col-sm-12 text-sm-right">
                                                <button type="submit" class="btn btn-primary btn-block" disabled>
                                                    <i class="si si-login mr-10"></i> Masuk
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">

                        </div>
                    </div>
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
        </div>
        <script src="{{ asset('assets/js/codebase.app.js') }}"></script>
        <script src="{{ asset('assets/js/laroute.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('assets/js/mitra/auth/login.js') }}"></script>
    </body>
</html>
