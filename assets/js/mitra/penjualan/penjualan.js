$(function () {
    var table = $('#list-penjualan').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: laroute.route('mitra.penjualan'),
          data: function (d) {
                d.status = $('#status').val(),
                d.search = $('input[type="search"]').val()
            }
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    $(".pencarian").keyup(function(){
        table.draw();
    });

  

  });
$(document).on('click', '.menu_tabs', function () {
    status = $(this).attr("data-status");
    $tabs = $(this);
    // $tabs.addClass("active");
    $('.menu_tabs').each(function(index, currentElement) {
        if($(this).attr("data-status") !== status)
        {
            $(this).removeClass('active');
        }else
        {
            $tabs.addClass('active');
        }
    });
    $.ajax({
        type: "GET",
        url: laroute.route('mitra.order'),
        data: {
            status: status,
            tgl_mulai : '17-18-2020',
            tgl_akhir : '17-18-2020',
        },
        success: function (response) {
            $('#tbl_variasi tbody').html(response.html);
        }
    });
    window.history.replaceState(null, null, "?status="+status);
});