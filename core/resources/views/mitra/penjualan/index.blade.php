@extends('mitra.layouts.master')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/js/plugins/bootstrap-daterangepicker/daterangepicker.css') }}" />
<style>
    #list-penjualan_filter {
        display: none;
    }
</style>
@endsection


@section('content')
<div class="content">
    <div class="content-heading pt-0 mb-3">
        Pesanan
    </div>
    <div class="block">
        @include('mitra.penjualan.include.menu_tabs')
        <div class="block-content tab-content">
            <div class="tab-pane active" id="btabs-alt-static-home" role="tabpanel">
                <table class="table table-striped table-vcenter" id="list-penjualan">
                    <thead>
                        <tr>
                            <th class="font-weight-bold" width="40%">PRODUK</th>
                            <th class="font-weight-bold">JUMLAH TAGIHAN</th>
                            <th class="font-weight-bold">STATUS</th>
                            <th>TINDAKAN</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
@push('scripts')
{{-- <script src="{{ asset('assets/js/plugins/bootstrap-daterangepicker/moment.min.js') }}"></script> --}}
<script src="{{ asset('assets/js/plugins/moment/moment-with-locales.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/bootstrap-daterangepicker/daterangepicker.min.js') }}"></script>
<script src="{{ asset('assets/js/mitra/penjualan/penjualan.js') }}"></script>
<script>
    // var url = new URL(laroute.url('/', []));

    function GFG_Fun(status) {
        window.history.replaceState(null, null, "?status="+status);
    }

    function GetURLParameter(sParam)
    {
        var sPageURL = window.location.search.substring(1);
        var sURLVariables = sPageURL.split('&');
        for (var i = 0; i < sURLVariables.length; i++)
        {
            var sParameterName = sURLVariables[i].split('=');
            if (sParameterName[0] == sParam)
            {
                return sParameterName[1];
            }
        }
    }

</script>
@endpush
