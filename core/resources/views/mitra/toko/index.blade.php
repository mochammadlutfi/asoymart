@extends('mitra.layouts.master')

@section('styles')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
<style>
    #list-supplier_filter {
        display: none;
    }

</style>
@endsection


@section('content')
<div class="content">
    <div class="content-heading pt-0 mb-3">
        Profil Toko
    </div>
    <div class="block block-rounded">
        <form id="form-toko_info" onsubmit="return false">
            <div class="block-header block-header-default">
                <div class="block-title">
                    <strong>Informasi Toko</strong>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <div class="block-content pb-15">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="col-form-label" for="field-nama">Nama Toko</label>
                            <input type="text" class="form-control" id="field-nama" name="nama"
                                placeholder="Masukan Nama Toko" autocomplete="off" value="{{ $toko->nama }}">
                            <div class="invalid-feedback font-size-sm" id="error-nama">Invalid feedback</div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="field-deskripsi">Deskripsi Toko</label>
                            <textarea class="form-control" name="deskripsi" id="field-deskripsi" cols="30" rows="5"
                                placeholder="Masukan Deskripsi Toko">{{ $toko->deskripsi }}</textarea>
                            <div class="invalid-feedback font-size-sm" id="error-deskripsi">Invalid feedback</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="col-form-label" for="field-logo">Logo Toko</label>
                            <div class="row justify-content-center mb-10">
                                <div class="col-6 py-1">
                                    <img id="logo_prev" src="{{ get_toko_img($toko->logo) }}" width="100%" />
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <input type="hidden" name="logo" id="logo" value="">
                                <div class="col-md-6">
                                    <div class="btn btn-primary btn-block">
                                        <input type="file" class="file-upload" id="field-logo" accept="image/*">
                                        Pilih Foto
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="field-sampul">Sampul Toko</label>
                            <input type="hidden" name="sampul" id="sampul" value="">
                            <p class="mb-2">Ukuran optimal 1200 x 400 px (piksel) dengan format JPG, JPEG, atau PNG dan ukuran file maks. 10 MB</p>
                            <div class="banner">
                                <img class="img-fluid" id="sampulPrev" src="{{ get_toko_sampul($toko->cover) }}" alt="sampul-toko">
                                <button type="button" class="bg-black-op-75 border-0 btn btn-primary mb-15 mr-15 position-absolute text-center text-white" style="bottom: 5px;right: 5px;">
                                    <input type="file" class="file-upload" id="field-sampul">
                                    <i class="fa fa-camera mr-1"></i>Ubah Sampul Toko
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@include('include.modal_crop')

<div class="modal" id="sampulModal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="block-header block-header-default">
                    <h3 class="block-title modal-title">Potong & Sesuaikan Sampul</h3>
                <div class="block-options">
                    <button type="button" class="close btn-primary" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            <i class="fa fa-times-circle"></i>
                        </span>
                    </button>
                </div>
            </div>
            <div class="block-content pb-15">
                <div id="cropSampul"></div>
                <div class="row">
                    <div class="col-md-3">
                        <button class="btn btn-info rotate btn-block text-center" data-deg="90">
                            <i class="fa fa-undo"></i>
                        </button>
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-info rotate btn-block text-center" data-deg="-90" >
                        <i class="fa fa-redo"></i></button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-primary btn-block" id="sampulSave">Potong Dan Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.js"></script>
<script src="{{ asset('assets/js/mitra/toko/toko.js') }}"></script>
@endpush
