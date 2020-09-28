<!DOCTYPE html>
<html lang="en">
    <head>
        @include('umum.layouts.meta')
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">

        <!-- CSS Implementing Plugins -->
        <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/font-awesome/css/fontawesome-all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/font-electro.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/js/plugins/sweetalert2/sweetalert2.min.css') }}">
        <!-- CSS Electro Template -->
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/theme.css') }}">
        <style>
            #wizard > .steps{
                display: none;
            }
        </style>
    </head>

    <body>

        <!-- ========== HEADER ========== -->
        @include('umum.layouts.header_min')
        <!-- ========== END HEADER ========== -->

        <!-- ========== MAIN CONTENT ========== -->
        <main id="content" role="main">
            <!-- End breadcrumb -->
            <div class="container max-width-1130">
                <form id="checkout" onsubmit="return false">
                    @csrf
                    {{-- <input type="hidden" name="ongkir" value="{{ $total_belanja }}"> --}}
                    <input type="hidden" name="total" value="{{ $total_belanja }}">
                    <input type="hidden" name="alamat['id']" value="{{ $alamat->id }}">
                    <input type="hidden" name="alamat['penerima']" value="{{ $alamat->penerima }}">
                    <input type="hidden" name="alamat['phone']" value="{{ $alamat->phone }}">
                    <input type="hidden" name="alamat['alamat']" value="{{ $alamat->alamat }}">
                    <input type="hidden" name="alamat['kelurahan_id']" value="{{ $alamat->kelurahan_id }}">
                    <input type="hidden" name="alamat['kd_pos']" value="{{ $alamat->kd_pos }}">

                    <div class="row my-4 my-xl-10">
                        <div id="wizard" class="col-md-8 col-sm-12">
                            <h4 class="hide">Atur Pesanan</h4>
                            <section>
                                <div class="card shadow border mb-3">
                                    <div class="card-header">
                                        <span class="font-size-20 font-weight-bold">
                                            <i class="fa fa-truck mr-1"></i>Kirim ke mana?
                                        </span>
                                        <button type="button" class="btn btn-outline-primary float-right btn-sm" data-toggle="modal" data-target="#modalAlamat">Pilih Alamat Lain</button>
                                    </div>
                                    <div class="card-body">
                                        @if($alamat)
                                        <div>
                                            <p class="mb-0">
                                                <b class="nama-penerima">{{ $alamat->penerima }}</b>
                                                <span class="nama-alamat">{{ $alamat->nama }}</span>
                                                <span class="badge badge-success">Utama</span>
                                            </p>
                                            <div class="phone">
                                                {{ $alamat->phone }}
                                            </div>
                                            <div class="alamat-lengkap">
                                                {{ $alamat->alamat }}<br>
                                                {{ $alamat->daerah }}, {{ $alamat->kd_pos }}
                                            </div>
                                        </div>
                                        @else
                                        <div class="text-center">
                                            <img class="empty-img" src="{{ asset('assets/img/placeholder/alamat.png') }}">
                                            <div>
                                                <h3 class="font-size-24 font-weight-bold mt-1">Alamat Pengiriman Belum Ditambahkan</h3>
                                                <button type="button" class="btn btn-primary btn-lg" id="btn-add_alamat">
                                                    <i class="fa fa-plus mr-1"></i>Tambah Alamat</button>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="cart-group">
                                    <div class="box-group b-vertical">
                                        @foreach($cart as $seller => $produk)
                                        @php
                                            list($sel_id, $sel_nama) = explode('-', $seller);
                                            $sub_total = 0;
                                        @endphp
                                        <div class="card shadow mb-2">
                                            <div class="card-body cart-store">
                                                <div class="store__name">
                                                    <div class="mitra">
                                                        <div>
                                                            <i class="icon icon__blibli"></i>
                                                        </div>
                                                        <span class="ellipsis-oneline">
                                                            <span></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="d-flex normal-cart">
                                            </div> --}}
                                            <div class="cart-product">
                                                @foreach($produk as $p)
                                                <div class="border-bottom border-width-2 card-body product py-1">
                                                    <div class="row">
                                                        <div class="col-md-1gdot7 mr-0 p-2 mr-0 p-2">
                                                            <div class="product__img text-center">
                                                                <img src="{{ get_produk_img($p->produk->fotoUtama) }}" data-src="" alt="" class="img-fluid lazyImage" data-loaded="true">
                                                            </div>
                                                        </div>
                                                        <div class="col-6 p-2">
                                                            <div class="font-weight-bold product__name py-2">
                                                                {{ $p->produk_nama }}
                                                            </div>
                                                            <div class="product__price">
                                                               {{ $p->harga_frm }} x {{ $p->qty }} barang
                                                            </div>
                                                            <div class="product__weight">
                                                               {{ $p->produk->berat }} {{ $p->produk->berat_satuan }}
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="float-right font-size-20 font-weight-bold product__price py-5 text-orange">
                                                                {{ $p->subTotal_frm }}
                                                             </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @php
                                                    $sub_total += $p->sub_total;
                                                @endphp
                                                @endforeach
                                                <div class="card-body py-2 border-top border-width-3">
                                                    <div class="row">
                                                        <div class="col-6">

                                                        </div>
                                                        <div class="col-6">
                                                            <div class="product__subtotal">
                                                                <span class="float-left font-size-20 font-weight-bold text-grey">
                                                                    Subtotal
                                                                </span>
                                                                <span class="float-right font-size-24 font-weight-bold text-orange">
                                                                    Rp{{ number_format($sub_total,0,',','.') }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </section>
                            <h4 class="hide">Bayar Pesanan</h4>
                            <section>
                                <div class="card shadow border mb-3">
                                    <div class="card-header">
                                        <span class="font-size-20 font-weight-bold">
                                            <i class="fa fa-wallet mr-1"></i>Pilih Metode Pembayaran
                                        </span>
                                    </div>
                                    <div class="card-body px-0 pb-0">
                                        <div class="as-payment-cat px-3 border-bottom border-width-3">
                                            <label for="virtual_account" class="as-payment-cat__label">
                                                <div class="d-flex">
                                                    <div class="d-flex">
                                                        <label class="align-items-center as-radio-button as-radio-button">
                                                            <input type="radio" name="payment_method" id="virtual_account" class="as-radio-button__input" value="virtual_account">
                                                            <span class="as-radio-button__check"></span>
                                                        </label>
                                                    </div>
                                                    <div class="ml-3" style="width: 100%;">
                                                        <p class="mb-0 font-size-18 font-weight-semi-bold">
                                                            Virtual Account
                                                        </p>
                                                        <div class="bl-logos" data-test-logos="">
                                                            <div class="d-flex bl-logos__container flex-wrap">
                                                                <div class="d-flex as-payment-method">
                                                                    <div class="as-logo-payment border border-gray-15">
                                                                        <img src="https://s1.bukalapak.com/tuku/assets/images/b6df8590cc3aad5b07d7a2685ea21612.png" alt="bank_bca" class="as-logo-payment__img">
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex as-payment-method">
                                                                    <div class="as-logo-payment border border-gray-15">
                                                                        <img src="https://s1.bukalapak.com/tuku/assets/images/35594f7d930540063eddce789ae99342.png" alt="bank_bni" class="as-logo-payment__img">
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex as-payment-method">
                                                                    <div class="as-logo-payment border border-gray-15">
                                                                        <img src="https://s1.bukalapak.com/tuku/assets/images/faca8cdb7b6b457ad4a817dcc892bc80.png" alt="briva" class="as-logo-payment__img">
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex as-payment-method">
                                                                    <div class="as-logo-payment border border-gray-15">
                                                                        <img src="https://s1.bukalapak.com/tuku/assets/images/c3b0ad0918c4005eedec47bd8f6ed015.png" alt="bank_mandiri" class="as-logo-payment__img">
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex as-payment-method">
                                                                    <div class="as-logo-payment border border-gray-15">
                                                                        <img src="https://s1.bukalapak.com/tuku/assets/images/a09dfaad2fd8c149cd5b648e43e58e77.png" alt="bank_permata" class="as-logo-payment__img">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!---->
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                        <!-- END Payment Virtual Account -->

                                        <!-- Payment Transfer -->
                                        <div class="as-payment-cat px-3 border-bottom border-width-3">
                                            <label for="transfer" class="as-payment-cat__label">
                                                <div class="d-flex">
                                                    <div class="d-flex">
                                                        <label class="align-items-center as-radio-button as-radio-button">
                                                            <input type="radio" name="payment_method" id="transfer" class="as-radio-button__input" value="transfer">
                                                            <span class="as-radio-button__check"></span>
                                                        </label>
                                                    </div>
                                                    <div class="ml-3" style="width: 100%;">
                                                        <p class="mb-0 font-size-18 font-weight-semi-bold">
                                                            Bank Transfer
                                                        </p>
                                                        <div class="bl-logos" data-test-logos="">
                                                            <div class="d-flex bl-logos__container flex-wrap">
                                                                <div class="d-flex as-payment-method">
                                                                    <div class="as-logo-payment border border-gray-15">
                                                                        <img src="https://s1.bukalapak.com/tuku/assets/images/b6df8590cc3aad5b07d7a2685ea21612.png" alt="bank_bca" class="as-logo-payment__img">
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex as-payment-method">
                                                                    <div class="as-logo-payment border border-gray-15">
                                                                        <img src="https://s1.bukalapak.com/tuku/assets/images/35594f7d930540063eddce789ae99342.png" alt="bank_bni" class="as-logo-payment__img">
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex as-payment-method">
                                                                    <div class="as-logo-payment border border-gray-15">
                                                                        <img src="https://s1.bukalapak.com/tuku/assets/images/faca8cdb7b6b457ad4a817dcc892bc80.png" alt="briva" class="as-logo-payment__img">
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex as-payment-method">
                                                                    <div class="as-logo-payment border border-gray-15">
                                                                        <img src="https://s1.bukalapak.com/tuku/assets/images/c3b0ad0918c4005eedec47bd8f6ed015.png" alt="bank_mandiri" class="as-logo-payment__img">
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex as-payment-method">
                                                                    <div class="as-logo-payment border border-gray-15">
                                                                        <img src="https://s1.bukalapak.com/tuku/assets/images/a09dfaad2fd8c149cd5b648e43e58e77.png" alt="bank_permata" class="as-logo-payment__img">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!---->
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                        <!-- END Payment Transfer -->

                                        <!-- Payment Kredit -->
                                        <div class="as-payment-cat px-3">
                                            <label for="kredit_debit" class="as-payment-cat__label">
                                                <div class="d-flex">
                                                    <div class="d-flex">
                                                        <label class="align-items-center as-radio-button as-radio-button">
                                                            <input type="radio" name="payment_method" id="kredit_debit" class="as-radio-button__input" value="kredit_debit">
                                                            <span class="as-radio-button__check"></span>
                                                        </label>
                                                    </div>
                                                    <div class="ml-3" style="width: 100%;">
                                                        <p class="mb-0 font-size-18 font-weight-semi-bold">
                                                            Virtual Account
                                                        </p>
                                                        <div class="bl-logos" data-test-logos="">
                                                            <div class="d-flex bl-logos__container flex-wrap">
                                                                <div class="d-flex as-payment-method">
                                                                    <div class="as-logo-payment border border-gray-15">
                                                                        <img src="https://s1.bukalapak.com/tuku/assets/images/b6df8590cc3aad5b07d7a2685ea21612.png" alt="bank_bca" class="as-logo-payment__img">
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex as-payment-method">
                                                                    <div class="as-logo-payment border border-gray-15">
                                                                        <img src="https://s1.bukalapak.com/tuku/assets/images/35594f7d930540063eddce789ae99342.png" alt="bank_bni" class="as-logo-payment__img">
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex as-payment-method">
                                                                    <div class="as-logo-payment border border-gray-15">
                                                                        <img src="https://s1.bukalapak.com/tuku/assets/images/faca8cdb7b6b457ad4a817dcc892bc80.png" alt="briva" class="as-logo-payment__img">
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex as-payment-method">
                                                                    <div class="as-logo-payment border border-gray-15">
                                                                        <img src="https://s1.bukalapak.com/tuku/assets/images/c3b0ad0918c4005eedec47bd8f6ed015.png" alt="bank_mandiri" class="as-logo-payment__img">
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex as-payment-method">
                                                                    <div class="as-logo-payment border border-gray-15">
                                                                        <img src="https://s1.bukalapak.com/tuku/assets/images/a09dfaad2fd8c149cd5b648e43e58e77.png" alt="bank_permata" class="as-logo-payment__img">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!---->
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                        <!-- END Payment Kredit -->
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class="col-md-4 d-none d-md-block">
                            <div class="card shadow border">
                                <div class="border-bottom border-width-3 card-body">
                                    <button type="button" class="btn btn-block btn-lg btn-outline-dark">
                                        <i class="fa fa-ticket mr-1"></i>  Gunakan Voucher
                                    </button>
                                </div>
                                <div class="card-body">
                                    <div class="font-size-20 font-weight-bold total_title mb-3">Rincian Harga</div>
                                    <div class="font-size-18 mb-1">
                                        <span>Total Belanja</span>
                                        <span class="text-black float-right total_belanja">{{ currency_frm($total_belanja) }}</span>
                                    </div>
                                    <div class="font-size-18 mb-1">
                                        <span>Ongkos Kirim</span>
                                        <span class="text-black float-right total_belanja"></span>
                                    </div>
                                    <div class="font-size-18 my-3">
                                        <span class="font-size-20 font-weight-bold">Total Pembayaran</span>
                                        <span class="font-size-20 font-weight-bold float-right total_belanja"> Rp 15000</span>
                                    </div>
                                    <button class="btn btn-primary btn-block btn-lg" type="button" id="btn-next">
                                        Lanjut Ke Pembayaran
                                    </button>
                                    <button class="btn btn-primary btn-block btn-lg hide" type="submit" id="btn-bayar">
                                        Bayar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </main>
        <!-- ========== END MAIN CONTENT ========== -->
        <div class="modal fade" id="modalAlamat" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0 pb-0">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- JS Global Compulsory -->
        <script src="{{ asset('assets/frontend/vendor/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/frontend/vendor/jquery-migrate/dist/jquery-migrate.min.js') }}"></script>
        <script src="{{ asset('assets/frontend/vendor/popper.js/dist/umd/popper.min.js') }}"></script>
        <script src="{{ asset('assets/frontend/vendor/bootstrap/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/laroute.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.js" integrity="sha512-bE0ncA3DKWmKaF3w5hQjCq7ErHFiPdH2IGjXRyXXZSOokbimtUuufhgeDPeQPs51AI4XsqDZUK7qvrPZ5xboZg==" crossorigin="anonymous"></script>

        <!-- JS Implementing Plugins -->
        <script src="{{ asset('assets/frontend/vendor/appear.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/accounting.js/0.4.1/accounting.min.js"></script>

        <!-- JS Plugins Init. -->
        <script src="{{ asset('assets/js/common.js') }}"></script>
        <script src="{{ asset('assets/js/functions.js') }}"></script>
        <script src="{{ asset('assets/js/umum/checkout.js') }}"></script>
        @stack('scripts')
    </body>
</html>
