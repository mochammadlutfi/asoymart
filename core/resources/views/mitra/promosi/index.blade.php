@extends('mitra.layouts.master')

@section('styles')
@endsection


@section('content')
<div class="content">
    <div class="content-heading pt-0 mb-3">
        <h2 class="font-size-h2 font-weight-bold mb-0 text-corporate-darker">Promosi</h2>
    </div>
    <div class="block block-rounded block-border block-shadow">
        <div class="block-content">
            <div class="row">
                <div class="col-4">
                    <a class="bg-gray-light block block-link-shadow block-rounded rounded-lg" href="javascript:void(0)">
                        <div class="block-content block-content-full clearfix p-2">
                            <div class="bg-primary-light d-none d-sm-block float-left mr-10 mt-10 p-15 rounded-circle">
                                <i class="fa fa-ticket-alt fa-3x text-white"></i>
                            </div>
                            <div class="font-size-h5 font-w600 mt-10">Voucher Toko Saya</div>
                            <div class="font-size-sm text-muted">Berikan voucher diskon untuk pembeli & tingkatkan pesanan</div>
                        </div>
                    </a>
                </div>
                <div class="col-4">
                    <a class="bg-gray-light block block-link-shadow block-rounded rounded-lg" href="javascript:void(0)">
                        <div class="block-content block-content-full clearfix p-2">
                            <div class="bg-primary-light d-none d-sm-block float-left mr-10 mt-10 p-15 rounded-circle">
                                <i class="fa fa-percent fa-3x text-white"></i>
                            </div>
                            <div class="font-size-h5 font-w600 mt-10">Paket Diskon</div>
                            <div class="font-size-sm text-muted">Tingkatkan rata-rata nilai pembelanjaan Pembeli dalam satu pesanan dengan menawarkan Paket Diskon</div>
                        </div>
                    </a>
                </div>
                <div class="col-4">
                    <a class="bg-gray-light block block-link-shadow block-rounded rounded-lg" href="javascript:void(0)">
                        <div class="block-content block-content-full clearfix p-2">
                            <div class="bg-primary-light d-none d-sm-block float-left mr-10 mt-10 p-15 rounded-circle">
                                <i class="fa fa-shipping-fast fa-3x text-white"></i>
                            </div>
                            <div class="font-size-h5 font-w600 mt-10">Gratis Ongkir</div>
                            <div class="font-size-sm text-muted">Berikan voucher diskon untuk pembeli & tingkatkan pesanan</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@push('scripts')
<script src="{{ asset('assets/js/mitra/toko/toko.js') }}"></script>
@endpush
