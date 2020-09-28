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
            @include('mitra.layouts.header_front')
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="content">
                    <div class="text-center">
                        <h1 class="h4 font-w700 mt-30 mb-10"> Halo, Selamat Datang!</h1>
                        <h2 class="h5 font-w400 text-muted mb-0">
                           Silahkan Daftar Untuk Menjadi Mitra Asoy Mart. Jika Sudah Punya Akun? <a href="{{ route('mitra.login') }}">Login</a> Disini
                        </h2>
                    </div>
                    <div class="mt-50 row">
                        <div class="col-lg-6">
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
                        </div>
                        <div class="col">

                        </div>
                    </div>
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
        </div>
        <script src="{{ asset('assets/js/laroute.js') }}"></script>
        <script src="{{ asset('assets/js/codebase.app.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/select2/js/select2.full.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/select2/js/i18n/id.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/bootstrap-wizard/jquery.bootstrap.wizard.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
        <script src="{{ asset('assets/js/mitra/auth/daftar.js') }}"></script>
    </body>
</html>
