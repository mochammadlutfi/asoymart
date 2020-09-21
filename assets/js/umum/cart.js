$(document).ready(function () {
    // $('form#checkout').submit(function(e) { 
    //     e.preventDefault();
    //     var formData = new FormData($('form#checkout')[0]);
    //     $.ajax({
    //         url: laroute.route('cart.checkout'),
    //         type: 'POST',
    //         data: formData,
    //         cache: false,
    //         contentType: false,
    //         processData: false,
    //         beforeSend: function(){
    //             Swal.fire({
    //                 title: 'Tunggu Sebentar...',
    //                 text: ' ',
    //                 imageUrl: laroute.url('assets/img/loading.gif', ['']),
    //                 showConfirmButton: false,
    //                 allowOutsideClick: false,
    //             });
    //         },
    //         success: function (response) {
    //             $('.is-invalid').removeClass('is-invalid');
    //             if (response.fail == false) { 
    //                 Swal.fire({
    //                     title: `Berhasil!`,
    //                     showConfirmButton: false,
    //                     icon: 'success',
    //                     html: `Produk Baru Berhasil Disimpan!
    //                         <br><br>
    //                         <a href="`+ laroute.route('mitra.produk') +`" class="btn btn-keluar btn-alt-danger"><i class="si si-close mr-1"></i>Keluar</a> 
    //                         <a href="`+ laroute.route('mitra.produk.tambah') +`" class="btn btn-tambah_baru btn-alt-primary"><i class="si si-plus mr-1"></i>Tambah Produk Lain</a>`,
    //                     showCancelButton: false,
    //                     showConfirmButton: false,
    //                     allowOutsideClick: false,
    //                 });
    //             } else {
    //                 Swal.close();
    //                 for (control in response.errors) {
    //                     $('#field-' + control).addClass('is-invalid');
    //                     $('#error-' + control).html(response.errors[control]);
    //                 }
    //             }
    //         },
    //         error: function (jqXHR, textStatus, errorThrown) {
    //             Swal.close();
    //             alert('Error adding / update data');
    //         }
    //     });
    // });
});

$(document).on('change', '#select-all', function () {
    $('.cart-group input[type=checkbox]').not(this).prop('checked', this.checked);
    updateCart();
});

$(document).on('change', '.cart-store input[type=checkbox]', function () {
    parent = $(this).closest('.cart-store').parent();
    parent.find('.cart-product input[type=checkbox]').not(this).prop('checked', this.checked);
    updateCart();
});

$(document).on('change', '.cart-group input[type=checkbox]', function () {
    updateCart();
});

$(document).on('change', '.product input.input-number', function () {
    $.ajax({
        type:"POST",
        url: laroute.route('cart.updateQuantity'),
        data: {
            // _token : $('meta[name="csrf-token"]').attr('content'),
            cart_id : $('.product input.cart_id').val(),
            qty : parseInt($(this).val())
        },
        success: function(data){
            $('#addToCart-modal-body').html(null);
            $('.c-preloader').hide();
            $('#modal-size').removeClass('modal-lg');
            $('#addToCart-modal-body').html(data);
            updateNavCart();
            $('#cart_items_sidenav').html(parseInt($('#cart_items_sidenav').html())+1);
        }
    });
});

function updateCart()
{
    var total = 0;
    var produk = 0;
    var i = 0;
    var parent = $('form#checkout');
    parent.find('input[type=hidden].ck').remove();
    $('.product').each(function () {
        if($(this).find('input[type=checkbox]').is(":checked")){
            harga = $(this).find('input.harga').val();
            qty = parseInt($(this).find('input.input-number').val());
            cart_id = $(this).find('input.cart_id').val();
            total += harga*qty;
            produk += qty;
            i += 1;
            parent.append(`<input type="hidden" class="ck" name="c_id[`+i+`]" value="`+cart_id+`">`);
        }
    });
    $('.total_title').html('Total belanja ('+produk+' produk)');
    $('.total_belanja').text(__convert_currency(total, true, true));
}