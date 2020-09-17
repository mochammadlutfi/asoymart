@extends('mitra.layouts.master')

@section('content')
<div class="content">
    <form id="form-produk" onsubmit="return false;">
        <input type="hidden" name="total_variasi" id="total_variasi" value="1">
        <input type="hidden" name="is_variasi" id="is_variasi" value="0">
        <div class="pt-0 mb-3">
            <a href="{{ route('mitra.pengaturan') }}">
                < Kembali ke Pengaturan
            </a>
        </div>
        <div class="content-heading pt-0 mb-3">
            Pengaturan Alamat
        </div>
        <div class="row">
            <div class="col-lg-12">
                {{-- 1. Informasi Produk --}}
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <div class="block-title">
                            <button type="button" id="btn_tambah" class="btn btn-primary float-right mr-5">
                                <i class="si si-plus mr-1"></i>
                                Tambah Alamat
                            </button>
                            <strong>Daftar Alamat</strong>
                        </div>
                    </div>
                    <div class="block-content pb-15">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>Nama Alamat</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                  <td>sdljasdlas</th>
                                  <td>Mark</td>
                                  <td>
                                    <a href="#" class="btn btn-primary" role="button" aria-pressed="true">Edit</a>
                                    <a href="#" class="btn btn-primary" role="button" aria-pressed="true">Hapus</a>
                                    <a href="#" class="btn btn-primary" role="button" aria-pressed="true">Set Utama</a>
                                  </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="modal_form"tabindex="-1" role="dialog" aria-labelledby="modal-popout" aria-hidden="true">
    <div class="modal-dialog modal-dialog-popout modal-lg" role="document">
        <div class="modal-content">
            <div class="block mb-0">
                <div class="block-header block-header-default">
                        <h3 class="block-title modal-title">Tambah Alamat</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <form id="form-alamat">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <label class="col-form-label" for="field-nama">Nama Alamat</label>
                                        <input type="text" class="form-control" id="field-nama" name="nama" placeholder="Contoh : Rumah, Kantor, Kosan, dll">
                                        <div class="invalid-feedback" id="error-nama">Invalid feedback</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <label class="col-form-label" for="field-nama">Atas Nama</label>
                                        <input type="text" class="form-control" id="field-nama" name="nama" placeholder="Isi Nama Lapak">
                                        <div class="invalid-feedback" id="error-nama">Invalid feedback</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <label class="col-form-label" for="field-nama">Nomor Telepon</label>
                                        <input type="text" class="form-control" id="field-nama" name="nama" placeholder="Isi nomor telepon">
                                        <div class="invalid-feedback" id="error-nama">Invalid feedback</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <label class="col-form-label" for="field-nama">Alamat Lengkap</label>
                                        <textarea class="form-control" id="deskripsi_seo" name="seo_deskripsi" maxlength="115" data-always-show="true" data-placement="top" placeholder="Isikan nama jalan, nama gedung, nomor rumah" rows="2"></textarea>
                                        <div class="invalid-feedback" id="error-nama">Invalid feedback</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center mb-2">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-alt-primary btn-block"><i class="si si-check mr-1"></i>Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@push('scripts')
    <script>
        $(document).on('click', '#btn_tambah', function () {
            save_method = 'tambah';
            $('#modal_title').text('Tambah Data Kategori');
            $('#modal_form').modal({
                backdrop: 'static',
                keyboard: false
            })
        });
    </script>
@endpush
