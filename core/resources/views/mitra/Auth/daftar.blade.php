<!doctype html>
<html lang="en" class="no-focus">
    <head>
        @include('mitra.layouts.meta')
        <!-- Fonts and Codebase framework -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,400i,600,700">
        <link rel="stylesheet" href="{{ asset('assets/js/plugins/select2/css/select2.min.css') }}">
        <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/codebase.css') }}">
        <link rel="stylesheet" id="css-theme" href="{{ asset('assets/css/themes/earth.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/js/plugins/sweetalert2/sweetalert2.min.css') }}">
    </head>
    <body>

        <div id="page-container" class="sidebar-inverse side-scroll page-header-fixed main-content-boxed">

            <!-- Header -->
            <header id="page-header">
                <!-- Header Content -->
                <div class="content-header min-height-75">
                    <div class="content-header-section w-100">
                        <div class="row no-gutters">
                            <div class="col d-flex">
                                <!-- Toggle Sidebar -->
                                <button type="button" class="btn btn-dual-secondary d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
                                    <i class="fa fa-navicon"></i>
                                </button>

                                <div class="content-header-item">
                                    <a href="{{ url('/mitra') }}">
                                        <img src="{{ asset('assets/img/logo/logo.png') }}" width="180px"/>
                                    </a>
                                </div>
                                <div class="min-height-20 ml-10">
                                    <h2 class="border-3x border-left border-primary font-size-h3 mb-0 my-5 pl-10 text-primary">Mitra</h2>
                                </div>
                            </div>
                            <div class="col text-right">
                                {{-- <ul class="nav-main-header">
                                    <li>
                                        <a class="active" href="javascript:void(0)">
                                            <i class="si si-home d-none d-xl-inline-block"></i> Home
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="si si-flag d-none d-xl-inline-block"></i> Notifications
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="si si-envelope d-none d-xl-inline-block"></i> Messages
                                        </a>
                                    </li>
                                </ul> --}}
                                <a href="{{ route('mitra.daftar') }}" class="btn btn-outline-primary">Login</a>
                                <a href="{{ route('mitra.daftar') }}" class="btn btn-primary">Daftar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Header Content -->

                <!-- Header Search -->
                <div id="page-header-search" class="overlay-header">
                    <div class="content-header content-header-fullrow">
                        <form>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <!-- Close Search Section -->
                                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                    <button type="button" class="btn btn-secondary px-15" data-toggle="layout" data-action="header_search_off">
                                        <i class="fa fa-times"></i>
                                    </button>
                                    <!-- END Close Search Section -->
                                </div>
                                <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-secondary px-15">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END Header Search -->

                <!-- Header Loader -->
                <div id="page-header-loader" class="overlay-header bg-primary">
                    <div class="content-header content-header-fullrow text-center">
                        <div class="content-header-item">
                            <i class="fa fa-sun-o fa-spin text-white"></i>
                        </div>
                    </div>
                </div>
                <!-- END Header Loader -->
            </header>
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="content pt-100">
                    <div class="row">
                        <div class="col-6">

                        </div>
                        <div class="col-6">
                            <div id="pendaftaran" class="block">
                                <!-- Step Tabs -->
                                <ul class="nav nav-tabs nav-tabs-alt nav-fill" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#info_warung" data-toggle="tab">1.
                                            Informasi Bisnis</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#info_pemilik" data-toggle="tab">2.
                                            Konfirmasi Data</a>
                                    </li>
                                </ul>
                                <!-- END Step Tabs -->

                                <!-- Form -->
                                <form id="form-pendaftaran" method="post" onsubmit="return false;">
                                    <!-- Steps Content -->
                                    <div class="block-content block-content-full tab-content"
                                        style="min-height: 274px;">
                                        <!-- Step 1 -->
                                        <div class="tab-pane active" id="info_warung" role="tabpanel">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="field-nama">Nama Toko</label>
                                                        <input class="form-control" type="text" id="field-nama"
                                                            name="nama" placeholder="Masukan Nama Bisnis">
                                                        <div id="error-nama" class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="field-telepon">No Telepon</label>
                                                        <input class="form-control" type="text" id="field-telepon"
                                                            name="telepon" placeholder="Masukan No. Kontak">
                                                        <div id="error-telepon" class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="field-link_toko">Link Toko</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    Asoymart.com/toko/
                                                                </span>
                                                            </div>
                                                            <input type="text" class="form-control" id="field-link_toko"
                                                                name="link_toko" placeholder="Contoh: kirana">
                                                        </div>
                                                        <div id="error-link_toko" class="text-danger font-size-xs"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="field-alamat">Alamat</label>
                                                        <textarea class="form-control" name="alamat" id="field-alamat"
                                                            placeholder="Masukan Alamat Usaha"></textarea>
                                                        <div id="error-alamat" class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="field-wilayah">Wilayah</label>
                                                        <select class="form-control" name="wilayah" id="field-wilayah"
                                                            style="width:100%"></select>
                                                        <div id="error-wilayah" class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="field-pos">Kode Pos</label>
                                                        <input class="form-control" type="text" id="field-pos"
                                                            name="pos" placeholder="Masukan Kode POS">
                                                        <div id="error-pos" class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END Step 1 -->

                                        <!-- Step 2 -->
                                        <div class="tab-pane" id="info_pemilik" role="tabpanel">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-line" id="preview-nama">
                                                        <label>Nama Bisnis</label>
                                                        <p class="mb-0"></p>
                                                    </div>
                                                    <div class="form-line" id="preview-telepon">
                                                        <label>No. Telepon</label>
                                                        <p class="mb-0"></p>
                                                    </div>
                                                    <div class="form-line" id="preview-link_toko">
                                                        <label>Link / Tautan Bisnis</label>
                                                        <p class="mb-0"></p>
                                                    </div>
                                                    <div class="form-line" id="preview-alamat">
                                                        <label>Alamat Bisnis</label>
                                                        <p class="mb-0"></p>
                                                    </div>
                                                    <div class="form-line" id="preview-pos">
                                                        <label>Kode Pos</label>
                                                        <p class="mb-0"></p>
                                                    </div>
                                                    <div class="form-line" id="preview-kabupaten">
                                                        <label>Kota/Kabupaten</label>
                                                        <p class="mb-0"></p>
                                                    </div>
                                                    <div class="form-line" id="preview-provinsi">
                                                        <label>Provinsi</label>
                                                        <p class="mb-0"></p>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-12">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="daftar-terms" name="daftar-terms">
                                                                <label class="custom-control-label" for="daftar-terms">Saya telah membaca dan setuju <a href="">perjanjian mitra</a></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END Step 2 -->
                                    </div>
                                    <!-- END Steps Content -->

                                    <!-- Steps Navigation -->
                                    <div class="block-content block-content-sm block-content-full bg-body-light">
                                        <div class="row">
                                            <div class="col-6">
                                                <button type="button" class="btn btn-alt-secondary disabled"
                                                    data-wizard="prev">
                                                    <i class="fa fa-angle-left mr-5"></i> Sebelumnya
                                                </button>
                                            </div>
                                            <div class="col-6 text-right">
                                                <button type="button" class="btn btn-alt-secondary" data-wizard="next">
                                                    Selanjutnya <i class="fa fa-angle-right ml-5"></i>
                                                </button>
                                                <button type="submit" class="btn btn-alt-primary d-none" id="finish_btn"
                                                    data-wizard="finish" disabled>
                                                    <i class="fa fa-check mr-5"></i> Daftar Sekarang
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Steps Navigation -->
                                </form>
                                <!-- END Form -->
                            </div>
                            {{-- <div id="pendaftaran" class="block mb-0">
                                <!-- Step Tabs -->
                                <ul class="nav nav-tabs nav-tabs-alt nav-fill" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#info_warung" data-toggle="tab">1.
                                            Informasi Toko</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#konfirmasi_data" data-toggle="tab">2.
                                            Konfirmasi Data</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#berhasil" data-toggle="tab">3.
                                            Berhasil</a>
                                    </li>
                                </ul>
                                <!-- END Step Tabs -->

                                <!-- Form -->
                                <form id="form-pendaftaran" method="post" onsubmit="return false;">
                                    <!-- Steps Content -->
                                    <div class="block-content block-content-full tab-content"
                                        style="min-height: 274px;">
                                        <!-- Step 1 -->
                                        <div class="tab-pane active" id="info_warung" role="tabpanel">
                                            <div class="form-group">
                                                <label for="field-nama">Nama Toko</label>
                                                <input class="form-control" type="text" id="field-nama"
                                                    name="nama" placeholder="Masukan Nama Bisnis">
                                                <div id="error-nama" class="invalid-feedback"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="field-no_kontak">No Telepon</label>
                                                <input class="form-control" type="text" id="field-no_kontak"
                                                    name="no_kontak" placeholder="Masukan No. Kontak">
                                                <div id="error-no_kontak" class="invalid-feedback"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="field-link_toko">Link Toko</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            Asoymart.com/toko/
                                                        </span>
                                                    </div>
                                                    <input type="text" class="form-control" id="field-link_toko" name="link_toko" placeholder="Contoh: kirana">
                                                </div>
                                                </div>
                                                <div id="error-link_toko" class="invalid-feedback"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="field-alamat">Alamat</label>
                                                <textarea class="form-control" name="alamat"id="field-alamat" placeholder="Masukan Alamat Usaha"></textarea>
                                                <div id="error-alamat" class="invalid-feedback"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="field-wilayah">Wilayah</label>
                                                <select class="form-control" name="wilayah" id="field-wilayah" style="width:100%"></select>
                                                <div id="error-wilayah" class="invalid-feedback"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="field-pos">Kode Pos</label>
                                                <input class="form-control" type="text" id="field-pos"
                                                    name="pos"  placeholder="Masukan Kode POS">
                                                <div id="error-pos" class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <!-- END Step 1 -->

                                        <!-- Step 2 -->
                                        <div class="tab-pane" id="konfirmasi_data" role="tabpanel">

                                        </div>
                                        <div class="tab-pane" id="berhasil" role="tabpanel">

                                        </div>
                                        <!-- END Step 2 -->
                                    </div>
                                    <!-- END Steps Content -->

                                    <!-- Steps Navigation -->
                                    <div class="block-content block-content-sm block-content-full bg-white">
                                        <div class="row">
                                            <div class="col-6">
                                                <button type="button" class="btn btn-alt-secondary disabled"
                                                    data-wizard="prev">
                                                    <i class="fa fa-angle-left mr-5"></i> Sebelumnya
                                                </button>
                                            </div>
                                            <div class="col-6 text-right">
                                                <button type="button" class="btn btn-alt-secondary" data-wizard="next">
                                                    Selanjutnya <i class="fa fa-angle-right ml-5"></i>
                                                </button>
                                                <button type="submit" class="btn btn-alt-primary d-none"
                                                    data-wizard="finish">
                                                    <i class="fa fa-check mr-5"></i> Daftar Sekarang
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Steps Navigation -->
                                </form>
                                <!-- END Form -->
                            </div> --}}
                        </div>
                    </div>
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->

            <!-- Footer -->
            {{-- <footer id="page-footer" class="bg-white opacity-0">
                <div class="content py-20 font-size-sm clearfix">
                    <div class="float-right">
                        Crafted with <i class="fa fa-heart text-pulse"></i> by <a class="font-w600" href="https://1.envato.market/ydb" target="_blank">pixelcave</a>
                    </div>
                    <div class="float-left">
                        <a class="font-w600" href="https://1.envato.market/95j" target="_blank">Codebase 3.4</a> &copy; <span class="js-year-copy"></span>
                    </div>
                </div>
            </footer> --}}
            <!-- END Footer -->
        </div>
        <script src="{{ asset('assets/js/laroute.js') }}"></script>
        <script src="{{ asset('assets/js/codebase.app.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/select2/js/select2.full.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/select2/js/i18n/id.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/bootstrap-wizard/jquery.bootstrap.wizard.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
        <script src="{{ asset('assets/modules/mitra/js/daftar.js') }}"></script>
    </body>
</html>
