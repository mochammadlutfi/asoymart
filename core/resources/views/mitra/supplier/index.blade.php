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
        <a href="{{ route('mitra.supplier.tambah') }}" class="btn btn-secondary float-right mr-5"><i class="si si-plus mr-1"></i>Tambah Supplier</a>
        Kelola Supplier
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
            <table class="table table-hover table-vcenter mb-0" id="list-supplier">
                <thead>
                    <tr>
                        <th class="font-weight-bold">Nama</th>
                        <th class="font-weight-bold">No. Telepon</th>
                        <th class="font-weight-bold">Alamat</th>
                        <th class="font-weight-bold">Perwakilan</th>
                        <th class="font-weight-bold">Kontak</th>
                        <th class="font-weight-bold"></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@stop
@push('scripts')
<script>
$(function () {
    oTable = $('#list-supplier').DataTable({
        processing: true,
        serverSide: true,
        ajax: laroute.route('mitra.supplier'),
        columns: [{
                data: 'nama',
                name: 'nama'
            },
            {
                data: 'telp',
                name: 'telp'
            },
            {
                data: 'alamat',
                name: 'alamat'
            },
            {
                data: 'perwakilan_nama',
                name: 'perwakilan_nama'
            },
            {
                data: 'perwakilan_hp',
                name: 'perwakilan_hp'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ]
    });

    $('#search_box').keyup(function () {
        oTable.search($(this).val()).draw();
    });
});
</script>
@endpush
