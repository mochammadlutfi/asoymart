@extends('mitra.layouts.master')

@section('content')
<div class="content p-15">
    <div class="row invisible" data-toggle="appear">
        <!-- Row #1 -->
        <div class="col-6 col-xl-4">
            <div class="block block-link-shadow text-right">
                <div class="block-content block-content-full clearfix">
                    <div class="float-left mt-10 d-none d-sm-block">
                        <i class="si si-bag fa-3x text-body-bg-dark"></i>
                    </div>
                    <div class="font-size-sm font-w600 text-uppercase text-muted">Pesanan Baru</div>
                    <div class="font-size-h3 font-w600" id="penghasilan_kotor">
                        0
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-xl-4">
            <a class="block block-link-shadow text-right" href="javascript:void(0)">
                <div class="block-content block-content-full clearfix">
                    <div class="float-left mt-10 d-none d-sm-block">
                        <i class="si si-envelope-open fa-3x text-body-bg-dark"></i>
                    </div>
                    <div class="font-size-sm font-w600 text-uppercase text-muted">Pengiriman Perlu Diproses</div>
                    <div class="font-size-h3 font-w600 keuntungan_kotor">0</div>
                </div>
            </a>
        </div>
        <div class="col-6 col-xl-4">
            <a class="block block-link-shadow text-right" href="javascript:void(0)">
                <div class="block-content block-content-full clearfix">
                    <div class="float-left mt-10 d-none d-sm-block">
                        <i class="si si-users fa-3x text-body-bg-dark"></i>
                    </div>
                    <div class="font-size-sm font-w600 text-uppercase text-muted">Komplain Pesanan</div>
                    <div class="font-size-h3 font-w600" id="total_transaksi_jual">0</div>
                </div>
            </a>
        </div>
        <!-- END Row #1 -->

        <!-- Row #2 -->
        <div class="col-6 col-xl-4">
            <div class="block block-link-shadow text-right">
                <div class="block-content block-content-full clearfix">
                    <div class="float-left mt-10 d-none d-sm-block">
                        <i class="si si-bag fa-3x text-body-bg-dark"></i>
                    </div>
                    <div class="font-size-sm font-w600 text-uppercase text-muted">Chat Baru</div>
                    <div class="font-size-h3 font-w600" id="penghasilan_kotor">
                        0
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-xl-4">
            <a class="block block-link-shadow text-right" href="javascript:void(0)">
                <div class="block-content block-content-full clearfix">
                    <div class="float-left mt-10 d-none d-sm-block">
                        <i class="si si-envelope-open fa-3x text-body-bg-dark"></i>
                    </div>
                    <div class="font-size-sm font-w600 text-uppercase text-muted">Ulasan Baru</div>
                    <div class="font-size-h3 font-w600 keuntungan_kotor">0</div>
                </div>
            </a>
        </div>

        <div class="col-6 col-xl-4">
            <a class="block block-link-shadow text-right" href="javascript:void(0)">
                <div class="block-content block-content-full clearfix">
                    <div class="float-left mt-10 d-none d-sm-block">
                        <i class="si si-users fa-3x text-body-bg-dark"></i>
                    </div>
                    <div class="font-size-sm font-w600 text-uppercase text-muted">Produk Habis</div>
                    <div class="font-size-h3 font-w600" id="total_transaksi_jual">
                        0
                    </div>
                </div>
            </a>
        </div>
        <!-- END Row #2 -->
    </div>
</div>

@stop
@push('scripts')
<script src="{{ asset('assets/js/pages/mitra/beranda.js') }}"></script>
@endpush
