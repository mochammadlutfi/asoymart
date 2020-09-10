@extends('admin.layouts.master')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.10/themes/default/style.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
@endsection

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-4">
            <div class="block">
                <div class="block-content pb-15">
                    <button class="btn btn-primary btn-block add-root-category">Tambah Kategori Induk</button>
                    <button class="btn btn-primary btn-block add-sub-category disabled">Tambah Sub Kategori</button>
                    <div class="mt-10 mb-10">
                        <a href="#" class="collapse-all">Collapse All</a> |
                        <a href="#" class="expand-all">Expand All</a>
                    </div>
                    <div id="kategori-tree"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <form id="form-kategori">
                <input type="hidden" id="metode" value="tambah"/>
                <input type="hidden" id="nama_kategori" value=""/>
                <input type="hidden" id="field-kategori_id" name="kategori_id" value=""/>
                <input type="hidden" id="field-parent_id" name="parent_id" value=""/>
                @csrf
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title" id="form-title">Tambah kategori</h3>
                        <button type="button" class="btn btn-danger float-right mr-5 hide" id="hapus-kategori">
                            <i class="si si-trash mr-1"></i>
                            Hapus
                        </button>
                        <button type="submit" class="btn btn-secondary float-right">
                            <i class="si si-paper-plane mr-1"></i>
                            Simpan
                        </button>
                    </div>
                    <div class="block-content">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label" for="field-nama">Nama</label>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" id="field-nama" name="nama" placeholder="Masukan Nama Kategori..">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label" for="field-is_active">Status</label>
                            <div class="col-lg-7">
                                <div class="custom-control custom-checkbox custom-control-inline mb-5">
                                    <input class="custom-control-input" type="checkbox" name="is_active" id="field-is_active" value="1" checked="">
                                    <label class="custom-control-label" for="field-is_active">Aktifkan Kategori</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label" for="field-nama">Icon</label>
                            <div class="col-lg-7">
                                <div class="row justify-content-center mb-10">
                                    <div class="col-6 py-1">
                                        <img id="img_preview" src="{{ asset('assets/img/placeholder/product.png') }}" width="100%"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="btn btn-alt-primary btn-block">
                                            <input type="file" class="file-upload" id="file-upload" accept="image/*">
                                            Pilih Foto
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal" id="cropModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="block-header block-header-default">
                    <h3 class="block-title modal-title">Potong & Sesuaikan Icon</h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                        <i class="si si-close"></i>
                    </button>
                </div>
            </div>
            <div class="block-content pb-15">
                <div id="resizer"></div>
                <div class="row">
                    <div class="col-md-3">
                        <button class="btn btn-alt-primary rotate btn-block text-center" data-deg="90">
                            <i class="fa fa-undo"></i>
                        </button>
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-alt-primary rotate btn-block text-center" data-deg="-90" >
                        <i class="fa fa-redo"></i></button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-alt-primary btn-block" id="upload">Potong Dan Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.10/jstree.min.js"></script>
<script src="{{ asset('assets/modules/produk/js/kategori.js') }}"></script>
@endpush
