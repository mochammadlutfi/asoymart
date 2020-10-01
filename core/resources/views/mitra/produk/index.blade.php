@extends('mitra.layouts.master')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/js/plugins/select2/css/select2.min.css') }}">
<style>
    #list-produk_filter {
        display: none;
    }
</style>
@endsection

@section('content')
<div class="content">
    <div class="content-heading pt-3 mb-3">
        <a href="{{ route('mitra.produk.tambah') }}" class="btn btn-primary float-right mr-5">
            <i class="si si-plus mr-1"></i>
            Tambah Produk
        </a>
        Katalog Produk
    </div>
    <div class="block block-shadow block-rounded">
        <div class="block-content border-bottom border-3x">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="si si-magnifier"></i>
                                </span>
                            </div>
                            <input type="text" id="cari_produk" class="form-control" placeholder="Cari Nama Produk">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="block-content pb-15 pt-0">
            <table class="table table-striped table-vcenter" id="list-produk">
                <thead>
                    <tr>
                        <th class="font-weight-bold" width="40%">INFO PRODUK</th>
                        <th class="font-weight-bold">STATISTIK</th>
                        <th class="font-weight-bold">HARGA</th>
                        <th class="font-weight-bold">STOK</th>
                        <th></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@stop
@push('scripts')
<script>jQuery(function(){ Codebase.helpers('table-tools'); });</script>
<script src="{{ asset('assets/js/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/select2/js/i18n/id.js') }}"></script>
<script src="{{ asset('assets/js/mitra/produk/produk.js') }}"></script>
<script>
</script>
@endpush
