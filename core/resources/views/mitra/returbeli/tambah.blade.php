@extends('mitra.layouts.master')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/js/plugins/select2/css/select2.min.css') }}">
@endsection


@section('content')
<div class="content">
    <form id="form-returbeli" onsubmit="return false;">
        <div class="content-heading pt-0 mb-3">
            Tambah Retur Pembelian
            <button type="submit" class="btn btn-secondary float-right mr-5">
                <i class="si si-paper-plane mr-1"></i>
                Simpan
            </button>
        </div>
        <div class="block">
            <div class="block-content pb-15">
                <div class="row border-bottom">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-supplier">Supplier</label>
                            <select class="form-control" id="field-supplier" name="supplier" style="width: 100%;"></select>
                            <div id="error-supplier" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-outlet">Outlet</label>
                            <select class="form-control" id="field-outlet" name="outlet" style="width: 100%;"></select>
                            <div id="error-outlet" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-tgl_transaksi">Tanggal*</label>
                            <input type="text" class="form-control" id="field-tgl_transaksi" name="tgl_transaksi" placeholder="Tanggal Transaksi" value="{{ date('d-m-Y') }}">
                            <div class="invalid-feedback" id="error-tgl_transaksi">Invalid feedback</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-referensi">No Referensi*</label>
                            <input type="text" class="form-control" id="field-referensi" name="referensi" placeholder="No Referensi">
                            <div class="invalid-feedback" id="error-referensi">Invalid feedback</div>
                        </div>
                    </div>
                </div>
                <div class="row mt-15">
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <img src="{{ asset('assets/img/placeholder/barcode.png') }}">
                                    </span>
                                </div>
                                <input type="text" class="form-control" id="cari_sku" placeholder="Masukan Kode Produk" autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <button type="button" id="btn-cari_produk" class="btn btn-alt-primary btn-block">
                        <i class="si si-plus mr-5"></i>
                        Tambahkan Produk
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-vcenter" id="retur_table">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>Produk</th>
                                    <th>Kuantitas</th>
                                    <th>Harga Satuan<small class="text-white">(Rp)</small></th>
                                    <th>Jumlah <small class="text-white">(Rp)</small></th>
                                    <th width="5%"><i class="fa fa-trash"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr class="table-warning">
                                    <td colspan="3" class="font-w700 text-uppercase text-right">Sub Total</td>
                                    <td colspan="2" class="font-w700 text-right">
                                        <span class="display_currency total_subtotal"></span>
                                        <input type="hidden" id="total_subtotal_input" value="0"  name="sub_total">
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        <input type="hidden" id="row_count" value="0">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@include('mitra.produk.include.modal')
@include('mitra.produk.include.modal_variasi')
@stop
@push('scripts')
<script src="{{ asset('assets/js/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/select2/js/i18n/id.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('assets/js/pages/mitra/returbeli-form.js') }}"></script>
@endpush
