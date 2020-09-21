jQuery(document).ready(function () {
    oTable = $('#list-produk').DataTable({
        processing: true,
        serverSide: true,
        ajax: laroute.route('mitra.produk'),
        columns: [
            {
                data: 'info_produk',
                name: 'info_produk'
            },
            {
                data: 'views',
                name: 'views'
            },
            {
                data: 'harga',
                name: 'harga'
            },
            {
                data: 'stok',
                name: 'stok'
            },
            {
                data: 'aksi',
                name: 'aksi',
                orderable: false,
                searchable: false
            },
        ]
    });

    $('#cari_produk').keyup(function () {
        oTable.search($(this).val()).draw();
    });
});