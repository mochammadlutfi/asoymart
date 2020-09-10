
<!doctype html>
<html lang="en" class="no-focus">
    <head>
        @include('mitra.layouts.meta')

        <!-- Stylesheets -->
        <!-- Fonts and Codebase framework -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,400i,600,700">
        <link rel="stylesheet" href="{{ asset('assets/js/plugins/select2/css/select2.min.css') }}">
        <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/codebase.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/js/plugins/sweetalert2/sweetalert2.min.css') }}">
        <!-- Scripts -->
        <script>window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};</script>
        <link rel="stylesheet" id="css-theme" href="{{ asset('assets/css/themes/earth.css') }}">
        <!-- Currency setting -->
        <input type="hidden" id="p_code" value="IDR">
        <input type="hidden" id="p_symbol" value="Rp">
        <input type="hidden" id="p_thousand" value=".">
        <input type="hidden" id="p_decimal" value=",">
        <input type="hidden" id="__code" value="IDR">
        <input type="hidden" id="__symbol" value="Rp">
        <input type="hidden" id="__thousand" value=".">
        <input type="hidden" id="__decimal" value=",">
        <input type="hidden" id="__symbol_placement" value="before">
        <input type="hidden" id="__precision" value="0">
        <input type="hidden" id="__quantity_precision" value="0">
    </head>
    <body>
        <div id="page-container" class="sidebar-inverse side-scroll page-header-fixed  main-content-boxed">

            <!-- Header -->
            <header id="page-header">
                <!-- Header Content -->
                <div class="content-header">
                    <!-- Left Section -->
                    <div class="content-header-section">
                        <!-- Logo -->
                        <div class="content-header-item" style="height: auto;">
                            <a href="{{ url('/mitra') }}">
                        <img src="{{ asset('assets/img/logo/logo.png') }}" width="180px"/>
                        </a>
                        </div>
                        <!-- END Logo -->
                    </div>
                    <!-- END Left Section -->

                    <!-- Middle Section -->
                    <div class="content-header-section d-none d-lg-block">
                    </div>
                    <!-- END Middle Section -->

                    <!-- Right Section -->

                    <!-- END Right Section -->
                </div>
                <!-- END Header Content -->

                <!-- Header Loader -->
                <!-- Please check out the Activity page under Elements category to see examples of showing/hiding it -->
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
                <div class="content content-full" style="max-width:100%;padding:15px 20px 1px">

                    <!-- Dummy content -->
                    <div class="row">
                        <div class="col-lg-7 px-2">
                            <div class="block">
                                <div class="block-content">
                                    <input type="hidden" id="produk_page" value="1">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="field-keyword">Cari Produk</label>
                                                <input type="text" id="field-keyword" class="form-control" placeholder="Masukan Nama Produk">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="field-kategori">Kategori</label>
                                                <select class="form-control" id="field-kategori" name="kategori" placeholder="Pilih Kategori"  style="width: 100%"></select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="field-merk">Merk</label>
                                                <select class="form-control" id="field-merk" name="merk" placeholder="Pilih Merk" style="width: 100%"></select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row" id="product_list_body"></div>
                                        </div>
                                        <div class="col-md-12 text-center" id="suggestion_page_loader" style="display: none;">
                                            <i class="fa fa-spinner fa-spin fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 px-2">
                            <div class="block">
                                <div class="block-content pb-15">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label" for="field-pelanggan">Pelanggan</label>
                                        <div class="col-lg-9">
                                            <select class="form-control" id="field-pelanggan" name="pelanggan" style="width: 100%;"></select>
                                            <div id="error-pelanggan" class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <form id="form-penjualan" onsubmit="return false;">
                                        <input type="hidden" id="produk_page" value="1">
                                        <input type="hidden" name="row_cart" id="row_cart" value="0">
                                        <table class="table border-top border-bottom mb-3" id="pos_table">
                                            <tbody>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td class="px-0">
                                                        <div class="font-w600 font-size-md">Sub Total</div>
                                                    </td>
                                                    <td colspan="2">
                                                        <div class="font-w600 font-size-md text-right" id="total_subtotal">Rp 0</div>
                                                        <input type="hidden" id="total_subtotal_input" value="0" name="sub_total">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="px-0">
                                                        <span class="font-w600 font-size-md">Diskon</span>
                                                    </td>
                                                    <td colspan="2">
                                                        <div class="font-w600 font-size-md text-right">Rp <span class="diskon_cart">0</span></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="px-0">
                                                        <div class="font-w600 font-size-md">Total Belanja</div>
                                                    </td>
                                                    <td colspan="2">
                                                        <div class="font-w600 font-size-md text-right" id="grand_total">Rp 0</div>
                                                        <input id="grand_total_hidden" name="final_total" type="hidden" value="">
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <div class="row">
                                            <div class="col-6">
                                                <button class="btn btn-lg btn-block btn-alt-primary diskon">
                                                    Diskon
                                                </button>
                                            </div>
                                            <div class="col-6">
                                                <button class="btn btn-lg btn-block btn-alt-primary bayar">
                                                    Bayar
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Dummy content -->
                </div>
                <div class="modal" id="variasiModal"tabindex="-1" role="dialog" aria-labelledby="modal-popout" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-popout" role="document">
                        <div class="modal-content">
                            <div class="block mb-0">
                                <div class="block-content px-25 py-15">
                                    <form id="form-produkvariasi" onsubmit="return false;">
                                    @csrf
                                    <div class="row">
                                        <div class="col-3">
                                            <img id="modal_produkFoto" src="{{ asset('assets/img/placeholder/product.png') }}" width="100%">
                                        </div>
                                        <div class="col-9 py-10">
                                            <h2 class="font-size-h2 mb-0" id="modal_produkNama">Nama Produk</h2>
                                            <span class="mb-0" id="modal_produkKategori">Kategori</span>
                                        </div>
                                    </div>
                                    <table class="table" id="variasi_table">
                                        <tbody>

                                        </tbody>
                                    </table>
                                    <div class="row">
                                        <div class="col-12 text-right">
                                            <button type="button" class="btn btn-alt-danger" data-dismiss="modal" aria-label="Close">
                                                <i class="si si-close mr-1"></i> Batal
                                            </button>
                                            <button type="submit" class="btn btn-alt-primary" id="submitvariasi"><i class="si si-check mr-1"></i>Simpan</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal" id="ubahCartModal"tabindex="-1" role="dialog" aria-labelledby="modal-popout" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-popout" role="document">
                        <div class="modal-content">
                            <div class="block mb-0">
                                <div class="block-content px-25 py-15">
                                    <form id="form-ubahcart" onsubmit="return false;">
                                    <input type="hidden" id="ubah_variasi_id" name="ubah_variasi_id" value="">
                                    @csrf
                                    <div class="row">
                                        <div class="col-3">
                                            <img id="modal_produkFoto" src="{{ asset('assets/img/placeholder/product.png') }}" width="100%">
                                        </div>
                                        <div class="col-5 py-20">
                                            <h2 class="font-size-h5 mb-0 modal_produkNama">Nama Produk</h2>
                                            <h2 class="font-size-h6 mb-0 modal_variasiNama">Nama Produk</h2>
                                        </div>
                                        <div class="col-4 py-20 text-right">
                                            <h2 class="font-size-h5 mb-0 ">Rp <span class="modal_hrgaxqty display_currency">0</span></h2>
                                            <h2 class="font-size-h6 mb-0">Rp <span class="hrg_net display_currency">0</span></h2>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label for="field-hrg">Nego Harga</label>
                                            <input type="text" class="form-control" id="field-hrg" name="hrg" placeholder="Masukan Harga Nego" value="">
                                            <div id="error-hrg" class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label for="field-diskon_val">Diskon Produk</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="field-diskon_val" name="diskon_val" placeholder="Masukan Diskon">
                                            <div id="error-diskon_val" class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="input-group input-number">
                                                <div class="input-group-prepend">
                                                    <button type="button" class="btn btn-secondary quantity-down">
                                                        <i class="fa fa-minus text-danger"></i>
                                                    </button>
                                                </div>
                                                <input type="number" data-min="1" class="form-control pos_quantity input_quantity valid" value="0" name="qty" value="0">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-secondary quantity-up">
                                                        <i class="fa fa-plus text-success"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 text-right">
                                            <button type="button" class="btn btn-alt-danger" data-dismiss="modal" aria-label="Close">
                                                <i class="si si-close mr-1"></i> Batal
                                            </button>
                                            <button type="submit" class="btn btn-alt-primary" id="submitvariasi"><i class="si si-check mr-1"></i>Simpan</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal" id="payModal"tabindex="-1" role="dialog" aria-labelledby="modal-popout" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-popout" role="document">
                        <div class="modal-content">
                            <div class="block mb-0">
                                <div class="block-content px-25 py-15 bg-gray-lighter">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <div class="font-size-md font-w600 ">Total Tagihan
                                                <button type="button" class="btn-block-option float-right" data-dismiss="modal" aria-label="Close">
                                                    <i class="si si-close"></i>
                                                </button>
                                            </div>
                                            <div class="font-size-h3 font-w600">Rp <span class="display_currency total_tagihan"></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-content px-25 py-15">
                                    <div class="form-group">
                                        <label for="field-uang_diterima">Uang yang diterima</label>
                                        <input type="text" class="form-control" id="field-uang_diterima" name="uang_diterima" placeholder="Rp {{ getCart('penjualan')->getTotal() }}">
                                        <div id="error-uang_diterima" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group kembalian" style="display:none">
                                        <label for="field-uang_kembali">Kembalian</label>
                                        <input type="text" class="form-control" id="field-uang_kembali" name="uang_kembali" placeholder="Rp 0" disabled>
                                        <div id="error-uang_kembali" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-alt-primary btn-block" id="bayar_pas">Uang Pas</button>
                                        <button type="button" class="btn btn-alt-primary btn-block" id="bayar_lebih" style="display:none">Bayar Sekarang</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->

            @include('mitra.layouts.footer');
        </div>
        @include('mitra.layouts.incl_scripts');
        <script src="{{ asset('assets/js/plugins/select2/js/select2.full.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/select2/js/i18n/id.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('assets/js/pages/mitra/pos.js') }}"></script>
        <script>
            // jQuery(document).ready(function () {

            // });
        </script>
    </body>
</html>
