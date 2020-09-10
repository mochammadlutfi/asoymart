@extends('mitra.layouts.master')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/js/plugins/select2/css/select2.min.css') }}">
@endsection


@section('content')
<div class="content">
    <form id="form-supplier" onsubmit="return false;">
        <div class="content-heading pt-0 mb-3">
            Tambah Supplier
            <button type="submit" class="btn btn-secondary float-right mr-5">
                <i class="si si-paper-plane mr-1"></i>
                Simpan Supplier
            </button>
        </div>
        <div class="block">
            <div class="block-content pb-15">
                <div class="row px-0">
                    <div class="col-lg-6">
                        <input type="hidden" name="supplier_id" value="{{ $data->id }}">
                        <div class="form-group">
                            <label for="field-nama">Nama Supplier</label>
                            <input type="text" class="form-control" name="nama" id="field-nama" placeholder="Masukan Nama Variasi Produk" value="{{ $data->nama }}">
                            <div id="error-nama" class="invalid-feedback"></div>
                        </div>
                        <div class="form-group">
                            <label for="field-telp">No. Telepon</label>
                            <input type="text" class="form-control" id="field-telp" name="telp" placeholder="Masukan No. Telepon" value="{{ $data->telp }}">
                            <div id="error-telp" class="invalid-feedback"></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="field-wilayah">Wilayah</label>
                                    <select name="wilayah" id="wilayah" style="width:100%"></select>
                                    <div id="error-wilayah" class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="field-kd_pos">Kode Pos</label>
                                    <input type="text" class="form-control" id="field-kd_pos" name="kd_pos" placeholder="Kode Pos" value="{{ $data->daerah->postal_code }}">
                                    <div id="error-kd_pos" class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-alamat">Alamat</label>
                            <textarea class="form-control" id="field-alamat" name="alamat" placeholder="Masukan Alamat Lengkap" rows="4">{{ $data->alamat }}</textarea>
                            <div id="error-alamat" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="field-perwakilan_nama">Nama Perwakilan</label>
                            <input type="text" class="form-control" name="perwakilan_nama" id="field-perwakilan_nama" placeholder="Masukan Nama Perwakilan" value="{{ $data->perwakilan_nama }}">
                            <div id="error-perwakilan_nama" class="invalid-feedback"></div>
                        </div>
                        <div class="form-group">
                            <label for="field-perwakilan_hp">No. Handphone</label>
                            <input type="text" class="form-control" name="perwakilan_hp" id="field-perwakilan_hp" placeholder="Masukan No. Handphone" value="{{ $data->perwakilan_hp }}">
                            <div id="error-perwakilan_hp" class="invalid-feedback"></div>
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
{{-- <script src="{{ asset('assets/js/pages/form-supplier.js') }}"></script> --}}
<script>
$(document).ready(function () {

    var wilayah = $('#wilayah').select2({
        placeholder: 'Cari Kelurahan',
        ajax: {
            url: laroute.route('wilayah.json'),
            type: 'POST',
            dataType: 'JSON',
            delay: 250,
            data: function (params) {
                return {
                    searchTerm: params.term
                };
            },
            processResults: function (response) {
                return {
                    results: response
                };
            },
            cache: true
        },
        templateResult: function(response) {
            var selectionText = response.text.split(",");
            var $returnString = $('<span>'+selectionText[0] + '</br>' + selectionText[1] + ', ' + selectionText[2]+ ', ' + selectionText[3] +'</span>');
            return $returnString;
        },
        templateSelection: function(response) {
            if(response.id === '')
            {
                return 'Cari Kelurahan';
            }else{
                return response.text;
            }
        },
    });

var $option = $('<option selected>{{ $wilayah }}</option>').val('{{ $data->daerah_id }}');

wilayah.append($option).trigger('change');

$("#form-supplier").submit(function (e) {
    e.preventDefault();
    var formData = new FormData($('#form-supplier')[0]);
    $.ajax({
        url: laroute.route('mitra.supplier.update'),
        type: 'POST',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function(){
            Swal.fire({
                title: 'Tunggu Sebentar...',
                text: ' ',
                imageUrl: laroute.url('assets/img/loading.gif', ['']),
                showConfirmButton: false,
                allowOutsideClick: false,
            });
        },
        // complete: function(){
        //     Swal.close();
        // },
        success: function (response) {
            $('.is-invalid').removeClass('is-invalid');
            if (response.fail == false) {
                $('#modal_embed').modal('hide');
                Swal.fire({
                    title: "Berhasil",
                    text: "Data Supplier Berhasil Diperbaharui",
                    timer: 3000,
                    showConfirmButton: false,
                    icon: 'success'
                });
                window.setTimeout(function () {
                    location.reload();
                }, 1500);
            } else {
                for (control in response.errors) {
                    $('#field-' + control).addClass('is-invalid');
                    $('#error-' + control).html(response.errors[control]);
                }
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            Swal.close();
            alert('Error adding / update data');
            $('#btnSimpan').text('Simpan');
            $('#btnSimpan').attr('disabled', false);
        }
    });
});
});
</script>
@endpush
