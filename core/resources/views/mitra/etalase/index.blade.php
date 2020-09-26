@extends('mitra.layouts.master')

@section('styles')
<style>
    #list-supplier_filter {
        display: none;
    }
</style>
@endsection


@section('content')
<div class="content">
    <div class="content-heading pt-0 mb-3">
        Etalase Toko
        <button type="button" class="btn btn-primary float-right" id="btn-add_etalase">Tambah Etalase</button>
    </div>
    <div class="block">
        <div class="block-content bg-body-light">
            <!-- Search -->
            <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" id="search_box" placeholder="Masukan Kata Kunci..">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
            <!-- END Search -->
        </div>
        <div class="block-content pb-15">
            <table class="table table-hover table-vcenter mb-0" id="list-etalase">
                <thead>
                    <tr>
                        <th class="font-weight-bold" width="40%">Nama</th>
                        <th class="font-weight-bold">Jumlah Produk</th>
                        <th class="font-weight-bold"></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<div class="modal" id="modalEtalase">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form onsubmit="return false" id="form-etalase">
                @csrf
                <input type="hidden" name="id" id="field-id" value="">
                <div class="block-header block-header-default">
                    <h3 class="block-title modal-title">Judul Modal</h3>
                    <div class="block-options">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">
                                <i class="fa fa-times-circle"></i>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="block-content py-0">
                    <div class="form-group">
                        <label class="col-form-label" for="field-nama">Nama Etalase</label>
                        <input type="text" class="form-control" id="field-nama" name="nama" placeholder="Masukan Nama Etalase" autocomplete="off">
                        <div class="invalid-feedback font-size-sm" id="error-nama">Invalid feedback</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-check"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@stop
@push('scripts')
    <script src="{{ asset('assets/js/mitra/toko/etalase.js') }}"></script>
@endpush
