@extends('mitra.layouts.master')

@section('styles')
<style>
    #list-outlet_filter {
        display: none;
    }

</style>
@endsection


@section('content')
<div class="content">
    <div class="content-heading pt-3 mb-3">
        <a href="{{ route('mitra.outlet.tambah') }}" class="btn btn-secondary float-right mr-5">
            <i class="si si-plus mr-1"></i>Tambah Outlet Baru
        </a>
        Kelola Outlet
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
            <table class="table table-borderless table-striped font-size-sm" id="list-outlet">
                <thead>
                    <tr>
                        <th>Nama Outlet</th>
                        <th>No. Kontak</th>
                        <th>Alamat Lengkap</th>
                        <th class="text-center" style="width: 15%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
@push('scripts')
<script>
$(function () {
    oTable = $('#list-outlet').DataTable({
        processing: true,
        serverSide: true,
        ajax: laroute.route('mitra.outlet'),
        columns: [{
                data: 'nama',
                name: 'nama'
            },
            {
                data: 'kontaknya',
                name: 'kontaknya'
            },
            {
                data: 'alamat',
                name: 'alamat'
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
