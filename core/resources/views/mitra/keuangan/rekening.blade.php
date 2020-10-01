@extends('mitra.layouts.master')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/js/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/js/plugins/select2/css/select2-bootstrap4.min.css') }}">
<style>
    #list-rekening_filter {
        display: none;
    }
</style>
@endsection


@section('content')
<div class="content">
    <div class="content-heading pt-0 mb-3">
        Rekening Bank
        <button type="button" class="btn btn-primary float-right" id="btn-add_rekening">Tambah Rekening</button>
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
            <table class="table table-hover table-vcenter mb-0" id="list-rekening">
                <thead>
                    <tr>
                        <th class="font-weight-bold">Nama Bank</th>
                        <th class="font-weight-bold">Nomor Rekening	</th>
                        <th class="font-weight-bold">Atas Nama</th>
                        <th class="font-weight-bold" width="20% text-right"></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<div class="modal" id="modalRekening">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form onsubmit="return false" id="form-rekening">
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
                        <label class="col-form-label" for="field-bank">Nama Bank</label>
                        <select class="form-control" name="bank" id="field-bank" style="width:100%"></select>
                        <div class="invalid-feedback font-size-sm" id="error-bank">Invalid feedback</div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="field-rekening">No. Rekening</label>
                        <input type="text" class="form-control" id="field-rekening" name="rekening" placeholder="Masukan No. Rekening" autocomplete="off">
                        <div class="invalid-feedback font-size-sm" id="error-rekening">Invalid feedback</div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="field-nama">Atas Nama</label>
                        <input type="text" class="form-control" id="field-nama" name="nama" placeholder="Masukan Atas Nama" autocomplete="off">
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
<script src="{{ asset('assets/js/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/select2/js/i18n/id.js') }}"></script>
<script src="{{ asset('assets/js/mitra/rekening.js') }}"></script>
@endpush
