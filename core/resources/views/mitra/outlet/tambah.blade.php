@extends('mitra.layouts.master')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/js/plugins/select2/css/select2.min.css') }}">
@endsection


@section('content')
<div class="content">
    <form id="form-outlet" onsubmit="return false;">
        <div class="content-heading pt-3 mb-3">
            Tambah Outlet Baru
            <button type="submit" class="btn btn-secondary float-right">
                <i class="si si-check mr-5"></i>
                Simpan Data
            </button>
        </div>
        <div class="block block-rounded">
            <div class="block-content pb-15">
                <div class="row">
                    <div class="col-lg-8">
                        <h2 class="content-heading pt-0 mb-2">Detail Outlet</h2>
                        <div class="form-group">
                            <label for="field-nama">Nama Outlet</label>
                            <input type="text" class="form-control" id="field-nama" name="nama" placeholder="Masukan Nama Outlet">
                            <div id="error-nama" class="invalid-feedback"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-no_kontak">No Kontak</label>
                                    <input class="form-control" type="text" id="field-no_kontak"
                                        name="no_kontak" placeholder="Masukan No. Kontak">
                                    <div id="error-no_kontak" class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-no_kontak_alt">No Kontak Alternatif
                                        Usaha</label>
                                    <input class="form-control" type="text" id="field-no_kontak_alt"
                                        name="no_kontak_alt" placeholder="Masukan No Kontak Alternatif">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="field-daerah">Daerah Outlet</label>
                                    <select class="form-control" name="daerah" id="field-daerah" style="width:100%"></select>
                                    <div id="error-daerah" class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="field-pos">Kode Pos</label>
                                    <input type="text" class="form-control" id="field-pos" name="pos" placeholder="Masukan Kode Pos">
                                    <div id="error-pos" class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-alamat">Alamat</label>
                            <textarea class="form-control" id="field-alamat" name="alamat" placeholder="Masukan Alamat Toko"></textarea>
                            <div id="error-alamat" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <h2 class="content-heading pt-0 mb-2">Foto Outlet</h2>
                        <div class="form-group">
                            <div class="row justify-content-center mb-10">
                                <div class="col-6 py-1">
                                    <img id="img_preview" src="{{ asset('assets/img/placeholder.png') }}" width="100%"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input js-custom-file-input-enabled" id="field-foto" name="foto" data-toggle="custom-file-input">
                                        <label class="custom-file-label" for="field-foto">Pilih File</label>
                                    </div>
                                    <div id="error-foto" class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@stop
@push('scripts')
<script src="{{ asset('assets/js/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/select2/js/i18n/id.js') }}"></script>
<script src="{{ asset('assets/js/pages/mitra/outlet-form.js') }}"></script>
@endpush
