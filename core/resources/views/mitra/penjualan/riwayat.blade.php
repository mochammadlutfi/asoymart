@extends('mitra.layouts.master')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/js/plugins/bootstrap-daterangepicker/daterangepicker.css') }}" />
<style>
    #list-merk_filter {
        display: none;
    }
</style>
@endsection


@section('content')
<div class="content">
    <div class="content-heading pt-0 mb-3">
        Riwayat Penjualan
    </div>
    <div class="row gutters-tiny mb-1">

        <!-- Total Transaksi -->
        <div class="col-md-6 col-xl-6">
            <div class="block block-rounded block-transparent bg-gd-dusk">
                <div class="block-content block-content-full block-sticky-options">
                    <div class="block-options">
                        <div class="block-options-item">
                            <i class="fa fa-archive text-white-op"></i>
                        </div>
                    </div>
                    <div class="py-20 text-center">
                        <div class="font-size-h2 font-w700 mb-0 text-white js-count-to-enabled tot_transaksi" data-toggle="countTo" data-to="{{ $total_transaksi }}">{{ $total_transaksi }}</div>
                        <div class="font-size-sm font-w600 text-uppercase text-white-op">Total Transaksi</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Total Transaksi -->

        <!-- Penjualan Kotor -->
        <div class="col-md-6 col-xl-6">
            <div class="block block-rounded block-transparent bg-gd-elegance">
                <div class="block-content block-content-full block-sticky-options">
                    <div class="block-options">
                        <div class="block-options-item">
                            <i class="fa fa-area-chart text-white-op"></i>
                        </div>
                    </div>
                    <div class="py-20 text-center">
                        <div class="font-size-h2 font-w700 mb-0 text-white penjualan_kotor">{{ $penjualan_kotor }}</div>
                        <div class="font-size-sm font-w600 text-uppercase text-white-op">Penjualan Kotor</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Penjualan Kotor -->
    </div>
    <div class="block">
        <div class="block-content bg-body-light">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group row">
                        <div class="col-lg-12">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" id="tgl_range" placeholder="Cari Berdasarkan Tanggal">
                            </div>
                        </div>
                        <input type="hidden" id="tgl_mulai" value="">
                        <input type="hidden" id="tgl_akhir" value="">
                    </div>
                </div>
                <div class="col-md-4">
                </div>
            </div>
        </div>
        <div class="block-content pb-15">
            <table class="table table-hover table-vcenter" id="list-riwayat">
                <thead>
                    <tr>
                        <th class="font-weight-bold">Tanggal</th>
                        <th class="font-weight-bold">Status</th>
                        <th class="font-weight-bold">No. Struk</th>
                        <th class="font-weight-bold">Jumlah</th>
                        <th class="font-weight-bold">Kasir</th>
                    </tr>
                </thead>
                @include('mitra.penjualan.include.riwayat_data')
            </table>
            <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
        </div>
    </div>
</div>
@stop
@push('scripts')
{{-- <script src="{{ asset('assets/js/plugins/bootstrap-daterangepicker/moment.min.js') }}"></script> --}}
<script src="{{ asset('assets/js/plugins/moment/moment-with-locales.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/bootstrap-daterangepicker/daterangepicker.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/mitra/pos-riwayat.js') }}"></script>
@endpush
