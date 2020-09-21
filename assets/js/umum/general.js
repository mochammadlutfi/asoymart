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
    if(checkAddToCartValidity()) {
        $('#error_cart').addClass('hide');
        $.ajax({
           type:"POST",
           url: laroute.route('cart.addToCart'),
           data: $('#option-choice-form').serializeArray(),
           success: function(data){
               $('#addToCart-modal-body').html(null);
               $('.c-preloader').hide();
               $('#modal-size').removeClass('modal-lg');
               $('#addToCart-modal-body').html(data);
               updateNavCart();
               $('#cart_items_sidenav').html(parseInt($('#cart_items_sidenav').html())+1);
           },
           error: function(httpObj, textStatus, errorThrown) {
            if(httpObj.status == 401)
            alert('Login Error');
           }
       });
    }
    else{
        $('#error_cart').removeClass('hide');
    }
});
