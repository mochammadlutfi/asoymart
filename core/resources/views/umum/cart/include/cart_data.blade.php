@if($data->status)
<ul class="list-unstyled px-3">
    <li class="border-bottom pb-3 mb-3 cart-top">
        @foreach($data->cart as $cart)
        <div class="cart-top_item">
            <ul class="list-unstyled row mx-n2">
                <li class="px-2 col-auto cart-top_img">
                    <img class="img-fluid" src="{{ get_produk_img($cart->produk->fotoUtama()->path) }}" alt="Image Description">
                </li>
                <li class="px-2 col">
                    <h5 class="cart-top__product-name font-size-14 mb-1">{{ \Illuminate\Support\Str::limit($cart->produk->nama, 30) }}</h5>
                    <span class="font-size-14">1 × $1,100.00</span>
                </li>
                <li class="px-2 col-auto">
                    <div class="text-orange font-weight-bold">
                        {{ $cart->harga_frm }}
                    </div>
                </li>
            </ul>
        </div>
        @endforeach
    </li>
</ul>
<div class="flex-center-between px-4 pt-2">
    <a href="{{ route('cart') }}" class="btn btn-primary btn-block mb-3 mb-md-0 font-weight-normal px-5 px-md-4 px-lg-5">Lihat Keranjang</a>
</div>
@else
<div class="text-center">
    <img src="https://ecs7.tokopedia.net/assets-unify/il-header-cart-empty.jpg" alt="empty-basket" class="max-width-200">
    <div class="font-size-16 font-weight-bold mt-3">
        Yah keranjang belanjaanmu masih kosong!
    </div>
</div>
@endif



