$(document).ready(function () {
});

// Product Detail
function checkAddToCartValidity(){
    has_var = $('input[name="has_variasi"]').val();
    if(has_var == '1')
    {
        var1 = $('input[name=var1]:checked', '#option-choice-form'); 
        if($('input[name="has_variasi"]').attr("data-var2") === '1')
        {
            var2 = $('input:radio[name=var2]:checked').val();
            if(var1.length > 0 && var2.length > 0)
            {
                return true;
            }else{
                return false;
            }
        }else{
            if(var1.length > 0)
            {
                return true;
            }else{
                return false;
            }
        }
    }else{
        return true;
    }
}

$(document).on('change', '#option-choice-form input', function () {
    if(checkAddToCartValidity())
    {
        getVariantPrice();
        $('#error_cart').addClass('hide');
    }else{
        $('#error_cart').removeClass('hide');
    }
});

function getVariantPrice(){
    if($('#option-choice-form input[name=quantity]').val() > 0 && checkAddToCartValidity()){
        $.ajax({
           type:"POST",
           url: laroute.route('variant_price'),
           data: $('#option-choice-form').serializeArray(),
           success: function(response){
               if(response.fail == false)
               {
                    $('.product-harga').html(response.harga);
                    $('.total_harga').html(response.total);
                    $('.total-field').removeClass('hide');
               }
           }
       });
    }
}

$(document).on('click', '#btn-add-cart', function () {
    // $('#addToCart').find('input[type=hidden].ck').val(3);
    // $('#addToCart').modal();
    if(checkAddToCartValidity()) {
        $('#error_cart').addClass('hide');
        $.ajax({
           type:"POST",
           url: laroute.route('cart.addToCart'),
           data: $('#option-choice-form').serializeArray(),
           success: function(response){
                $('#cartTopHover span').html(parseInt($('#cartTopHover span').text(), 10) +response.data.incr);
                $('#addToCart').find('.product__name').html(response.data.produk_nama);
                $('#addToCart').find('.product__img img').attr("src", response.data.produk_img);
                $('#addToCart').find('.product__price').html(response.data.produk_price);
                $('#addToCart').find('.product__subtotal').html(response.data.produk_subtotal);
                $('#addToCart').find('input[type=hidden].ck').val(response.data.id);
                $('#addToCart').modal();
           },
           error: function(httpObj, textStatus, errorThrown) {
            if(httpObj.status == 401)
                $('#loginModal').modal();
           }
       });
    }
    else{
        $('#error_cart').removeClass('hide');
    }
});
