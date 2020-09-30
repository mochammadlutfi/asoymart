@extends('umum.layouts.master')
@section('styles')
@endsection

@section('content')
<main id="content" role="main">
    <div class="container">
        <div class="row mb-6">
            <div class="col-lg-3">
                @include('umum.user.menu')
            </div>
            <div class="col-lg-9">
                <div class="card shadow-lg text-center border-lg-down-0">
                    <div class="card-body px-3 px-lg-0">
                        <div class="row">
                            <div class="col-4 col-md-4 border-right border-lg-down-0 pl-0">
                                <div class="font-size-18 mb-1 text-left">
                                    <span class="d-block">No. Pembelian</span>
                                    <a class="font-size-14-down-lg font-size-20 font-weight-bold">{{ $order->invoice_no }}</a>
                                </div>
                            </div>
                            <div class="col-4 col-md-4 border-right border-lg-down-0">
                                <div class="font-size-18 mb-1 text-left">
                                    <span class="d-block">Tanggal Transaksi</span>
                                    <span class="font-size-14-down-lg font-size-20 font-weight-bold">Rabu, 27 Jan 2020</span>
                                </div>
                            </div>
                            <div class="col-4 col-md-4 border-right border-lg-down-0">
                                <div class="font-size-18 mb-1 text-left">
                                    <span class="d-block">Status</span>
                                    <span class="font-size-14-down-lg font-size-20 font-weight-bold">Menunggu Pembayaran</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body border-top border-width-2 border-top-lg-down-0">
                        <div class="font-size-18 mb-1 text-left">
                            <span class="d-block">Daftar Produk</span>
                        </div>
                        @foreach($produk as $ord)
                            <div class="row border-bottom">
                                <div class="col-md-1gdot7 mr-0 p-2 w-20">
                                    <div class="product__img text-center">
                                        <img src="{{ get_produk_img($ord->produk->fotoUtama) }}" data-src="" alt="" class="img-fluid lazyImage" data-loaded="true">
                                    </div>
                                </div>
                                <div class="col-8 p-2 text-left">
                                    <div class="font-weight-bold product__name py-2">
                                        {{ $ord->produk_nama }}
                                    </div>
                                    <div class="product__price">
                                    {{ $ord->harga_frm }} x {{ $ord->qty }} barang
                                    </div>
                                </div>
                                <div class="col d-none d-md-block">
                                    <div class="float-right font-size-20 font-weight-bold product__price py-5 text-orange">
                                        {{ $ord->subTotal_frm }}
                                    </div>
                                </div>
                            </div>
                            @php
                                $sub_total = 0;
                                $sub_total += $ord->sub_total;
                            @endphp
                        @endforeach
                        <div class="row justify-content-between py-2">
                            <div class="col-6">
                            </div>
                            <div class="col-6">
                                <div class="font-size-18 mb-1 text-right">
                                    <span>Total Pesanan</span>
                                    <span class="font-size-20 font-weight-bold text-orange">{{ currency_frm($sub_total) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@stop

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="{{ asset('assets/modules/user/login.js') }}"></script>
@endpush
