@extends('mitra.layouts.master')

@section('content')
<div class="content">
    <input type="hidden" name="total_variasi" id="total_variasi" value="1">
    <input type="hidden" name="is_variasi" id="is_variasi" value="0">
    <div class="pt-0 mb-3">
        <a href="{{ route('mitra.pengaturan') }}">
            < Kembali ke Pengaturan
        </a>
    </div>
    <div class="content-heading pt-0 mb-3">
        Rekening Bank
    </div>
    <div class="row">
        <div class="col-lg-12">
            {{-- 1. Informasi Produk --}}
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <div class="block-title">
                        <button type="button" id="btn_tambah" class="btn btn-primary float-right mr-5">
                            <i class="si si-plus mr-1"></i>
                            Tambah Rekening
                        </button>
                        <strong>Daftar Rekening Bank (Pencairan)</strong>
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
                            @foreach ($datas as $data)
                                <tr>
                                    <td>{{ $data['bank_account_name'] }}</th>
                                    <td>{{ $data['account_number'] }}</th>
                                    <td>
                                        @if ($data['is_prime'] == '1')
                                            <button type="button" class="btn btn-primary" disabled> <i class="fa fa-check"></i> Utama</button>
                                        @else
                                            <button type="button" class="btn btn-primary">Set Utama</button>
                                        @endif

                                        <a href="#" class="btn btn-primary" role="button" aria-pressed="true">Edit</a>
                                        <a href="#" class="btn btn-primary" role="button" aria-pressed="true">Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_form"tabindex="-1" role="dialog" aria-labelledby="modal-popout" aria-hidden="true">
    <div class="modal-dialog modal-dialog-popout modal-lg" role="document">
        <div class="modal-content">
            <div class="block mb-0">
                <div class="block-header block-header-default">
                        <h3 class="block-title modal-title">Tambah Rekening</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <form id="form-rekening">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <label class="col-form-label" for="field-bank_account_name">Nama Bank</label>
                                        <select class="form-control" name="bank_account_name" id="field-bank_account_name">
                                            <option value="">Pilih Bank</option>
                                            <option value="bni">BNI</option>
                                            <option value="bca">BCA</option>
                                        </select>
                                        <div class="invalid-feedback" id="error-bank_account_name">Invalid feedback</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <label class="col-form-label" for="field-account_number">Nomor Rekening</label>
                                        <input type="number" class="form-control" id="field-account_number" name="account_number">
                                        <div class="invalid-feedback" id="error-account_number">Invalid feedback</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <label class="col-form-label" for="field-name">Atas Nama</label>
                                        <input type="text" class="form-control" id="field-name" name="name">
                                        <div class="invalid-feedback" id="error-name">Invalid feedback</div>
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
            $('#modal_title').text('Tambah Data Rekening');
            $('#modal_form').modal({
                backdrop: 'static',
                keyboard: false
            })
        });
        jQuery(document).ready(function () {
            $("#form-rekening").submit(function (e) {
                e.preventDefault();
                var formData = new FormData($('#form-rekening')[0]);

                var link;
                var pesan;
                if (save_method == 'tambah') {
                    link = "{{ route('mitra.pengaturan.rekening.simpan') }}";
                    pesan = "No Rekening Baru Berhasil Ditambahkan";
                } else {
                    link = "{{ route('mitra.pengaturan.rekening.ubah') }}";
                    pesan = "No Rekening Berhasil Diperbaharui";
                }

                $.ajax({
                    url: link,
                    type: 'POST',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        console.log('0');
                        $('.is-invalid').removeClass('is-invalid');
                        if (response.fail == false) {
                            console.log('1');
                            $('#modal_embed').modal('hide');
                            swal.fire({
                                title: "Berhasil",
                                text: pesan,
                                timer: 3000,
                                buttons: false,
                                icon: 'success'
                            });
                            window.setTimeout(function () {
                                location.reload();
                            }, 1500);
                        } else {
                            console.log('2');
                            for (control in response.errors) {
                                $('#field-' + control).addClass('is-invalid');
                                $('#error-' + control).html(response.errors[control]);
                            }
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert('Error adding / update data');
                        $('#btnSimpan').text('Simpan');
                        $('#btnSimpan').attr('disabled', false);

                    }
                });
            });
        });
    </script>
@endpush
