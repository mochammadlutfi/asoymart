<!DOCTYPE html>
<html lang="en">
    <head>
        @include('umum.layouts.meta')
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">

        <!-- CSS Implementing Plugins -->
        <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/font-awesome/css/fontawesome-all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/font-electro.css') }}">

        <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/animate.css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/hs-megamenu/src/hs.megamenu.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/fancybox/jquery.fancybox.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/slick-carousel/slick/slick.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/js/plugins/sweetalert2/sweetalert2.min.css') }}">

        <!-- CSS Electro Template -->
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/theme.css') }}">
        @yield('styles')
    </head>

    <body>

        <!-- ========== HEADER ========== -->
        @include('umum.layouts.header_min')
        <!-- ========== END HEADER ========== -->

        <!-- ========== MAIN CONTENT ========== -->
        <main id="content" role="main">
            <!-- End breadcrumb -->
            <div class="container max-width-1130">
                <div class="cart_title">
                    <h1 class="text-center">Keranjang Belanja</h1>
                </div>
                <div class="row">
                    <div class="col-md-8 col-sm-12">
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
                                        Jl. Tubagus Ismail Dalam No. 29 RT 04 RW 07 (Kossan Bapa Ahmad/Danu)
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
                                                        <img src="{{ get_produk_img($p->produk->fotoUtama()->path) }}" data-src="" alt="" class="img-fluid lazyImage" data-loaded="true">
                                                    </div>
                                                </div>
                                                <div class="col-6 p-2">
                                                    <div class="font-weight-bold product__name py-2">
                                                        {{ $p->produk->nama }}
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
                                                    <button type="button" class="btn btn-primary">Pilih Pengiriman</button>
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
                    </div>
                    <div class="col-md-4 d-none d-md-block">
                        <div class="card shadow border">
                            <div class="card-body">
                                <div class="font-size-20 font-weight-bold total_title">Total belanja</div>
                                <div class="cart-price-value font-size-24 font-weight-bold float-right total_belanja mb-3">Rp0</div>

                                <form id="checkout" method="POST" action="{{ route('cart.checkout') }}">
                                    @csrf
                                    <button class="btn btn-primary btn-block btn-lg" type="submit">
                                        Lanjut Ke Pembayaran
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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

        <!-- JS Implementing Plugins -->
        <script src="{{ asset('assets/frontend/vendor/appear.js') }}"></script>
        <script src="{{ asset('assets/frontend/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/accounting.js/0.4.1/accounting.min.js"></script>

        <!-- JS Plugins Init. -->
        <script src="{{ asset('assets/js/common.js') }}"></script>
        <script src="{{ asset('assets/js/functions.js') }}"></script>
        @stack('scripts')
    </body>
</html>
