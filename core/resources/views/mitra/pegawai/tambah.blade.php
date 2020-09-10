@extends('mitra.layouts.master')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/js/plugins/select2/css/select2.min.css') }}">
@endsection


@section('content')
<div class="content">
    <form id="form-pegawai" onsubmit="return false;">
    <div class="content-heading pt-0 mb-3">
        Tambah Pegawai Baru
        <button type="submit" class="btn btn-secondary float-right mr-5">
            <i class="si si-paper-plane mr-1"></i>
            Simpan Pegawai
        </button>
    </div>
    <div class="block block-rounded">
        <div class="block-content pb-15">
            <div class="row info_produk">
                <div class="col-lg-8">
                    <h2 class="content-heading pt-0 mb-2">Detail Profil</h2>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="field-nama">Nama Lengkap</label>
                                <input type="text" class="form-control" id="field-nama" name="nama" placeholder="Masukan Nama Lengkap">
                                <div id="error-nama" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="field-username">Username</label>
                                <input type="text" class="form-control" id="field-username" name="username" placeholder="Masukan No. Kontak">
                                <div id="error-username" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="field-email">Alamat Email</label>
                                <input type="email" class="form-control" id="field-email" name="email" placeholder="Masukan Alamat Email">
                                <div id="error-email" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="field-phone">No. Hp</label>
                                <input type="text" class="form-control" id="field-phone" name="phone" placeholder="Masukan No. Kontak">
                                <div id="error-phone" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="field-outlet">Outlet</label>
                                <select class="form-control" id="field-outlet" name="outlet" placeholder="Pilih Outlet">
                                </select>
                                <div id="error-outlet" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="field-jabatan">Jabatan</label>
                                <select class="form-control" name="jabatan" id="field-jabatan">
                                    <option value="">Pilih Jabatan</option>
                                    <option value="Kasir">Kasir</option>
                                </select>
                                <div id="error-jabatan" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label for="field-kontak">Daerah</label>
                                <select name="wilayah" id="wilayah" style="width:100%"></select>
                                <div id="error-wilayah" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="field-kd_pos">Kode Pos</label>
                                <input type="text" class="form-control" id="field-kd_pos" name="kd_pos" placeholder="Masukan Kode Pos">
                                <div id="error-kd_pos" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-alamat">Alamat</label>
                        <textarea class="form-control" name="alamat" placeholder="Masukan Alamat Toko"></textarea>
                        <div id="error-alamat" class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h2 class="content-heading pt-0 mb-2">Foto Pegawai</h2>
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
<script src="{{ asset('assets/js/pages/mitra/pegawai-form.js') }}"></script>
@endpush
