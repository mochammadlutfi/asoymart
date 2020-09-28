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
                <div class="card border">
                    <div class="card-body">
                        @foreach($order as $seller => $produk)
                        @php
                            $head = explode(',', $seller);
                            $sub_total = 0;
                        @endphp
                        <div class="card mb-2">
                            <div class="card-body d-flex border-bottom boder-width-2">
                                <div>
                                    <i class="fa fa-store"></i>
                                    {{ $head[1] }}
                                </div>
                            </div>
                            <div class="border-bottom border-width-2 card-body product py-1">
                                @foreach($produk as $ord)
                                    <div class="row border-bottom">
                                        <div class="col-md-1gdot7 mr-0 p-2 mr-0 p-2">
                                            <div class="product__img text-center">
                                                <img src="{{ get_produk_img($ord->produk->fotoUtama) }}" data-src="" alt="" class="img-fluid lazyImage" data-loaded="true">
                                            </div>
                                        </div>
                                        <div class="col-8 p-2">
                                            <div class="font-weight-bold product__name py-2">
                                                {{ $ord->produk_nama }}
                                            </div>
                                            <div class="product__price">
                                            {{ $ord->harga_frm }} x {{ $ord->qty }} barang
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="float-right font-size-20 font-weight-bold product__price py-5 text-orange">
                                                {{ $ord->subTotal_frm }}
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $sub_total += $ord->sub_total;
                                    @endphp
                                @endforeach
                                <div class="row justify-content-between py-2">
                                    <div class="col-6">
                                        <a class="btn btn-outline-gray-8" href="#">
                                            <i class="fa fa-eye"></i> Lihat Detail Pesanan
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <div class="font-size-18 mb-1">
                                            <span>Total Pesanan</span>
                                            <span class="font-size-20 font-weight-bold float-right text-orange">{{ currency_frm($sub_total) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        {{-- <div class="height-380 py-5">
                            <img class="empty-img" src="{{ asset('assets/img/placeholder/empty.png') }}">
                            <div>
                                <h3 class="font-size-24 font-weight-bold mt-5">Belum Ada Transaksi Yang Dilakukan
                                </h3>
                                <p class="font-size-16">Daftar transaksi anda masih kosong. Yuk segera mulai belanja di Asoy Mart</p>
                            </div>
                        </div> --}}
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
