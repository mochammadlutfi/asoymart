<div class="card shadow border mb-2">
    <div class="card-body py-2">
        <div class="row">
            <div class="col-6">
                <div class="checkbox py-1">
                    <input id="select-all" type="checkbox">
                    <label for="select-all" class="cart__header-select font-size-18 font-weight-semi-bold">Pilih Semua Produk</label>
                </div>
            </div>
            <div class="col-6">
                <button type="button" class="float-right btn btn-sm btn-danger hide" id="hapus-all">
                    <i class="fa fa-trash mr-1"></i>
                    Hapus
                </button>
            </div>
        </div>
    </div>
</div>
<div class="cart-group">
    @forelse($cart as $seller => $produk)
    @php
        list($sel_id, $sel_nama) = explode('-', $seller);
    @endphp
    <div class="card shadow mb-2">
        <div class="card-body cart-store">
            <div class="store__name">
                <div class="checkbox mitra">
                    <input id="mitra-{{ $sel_id }}" type="checkbox">
                    <label for="mitra-{{ $sel_id }}">{{ $sel_nama }}</label>
                    <div>
                        <i class="icon icon__blibli"></i>
                    </div>
                    <span class="ellipsis-oneline">
                        <span></span>
                    </span>
                </div>
            </div>
        </div>
        <div class="cart-product">
            @foreach($produk as $p)
            <div class="product card-body">
                <div class="row">
                    <div class="col-2 d-flex pr-0">
                        <div class="b-narrow d-flex">
                            <div class="checkbox product_check">
                                <input id="{{ $sel_id }}-{{ $p->id }}" type="checkbox">
                                <label for="{{ $sel_id }}-{{ $p->id }}">&nbsp;</label>
                            </div>
                        </div>
                        <div class="b-narrow p-3">
                            <img src="{{ get_produk_img($p->produk->fotoUtama) }}" data-src="" alt="" class="img-fluid lazyImage" data-loaded="true">
                        </div>
                    </div>
                    <div class="col-10 pl-0 pt-3">
                        <div class="product__name">
                            <a href="">
                                <div class="product__name">
                                    {{ $p->produk_nama }}
                                </div>
                            </a>
                        </div>
                        <div class="product__price">
                            <input type="hidden" class="cart_id" value="{{ $p->id }}">
                            <input type="hidden" class="harga" value="{{ number_format($p->harga,0,',','') }}">
                            <div class="product__price--after">
                                Rp{{ number_format($p->harga,0,',','.') }}
                            </div>
                        </div>
                        <div class="product-quantity d-flex align-items-center float-right">
                            <div class="input-group input-group--style-2 pr-3 input-number"
                                style="width: 160px;">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary mr-1 quantity-down"
                                        type="button" data-type="minus">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </span>
                                <input type="text" name="quantity"
                                    class="form-control input-number text-center" placeholder="1" value="{{ $p->qty }}" data-min="1" data-max="{{ $p->variant->stok }}">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary ml-1 quantity-up"
                                        type="button" data-type="plus">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @empty
    <div class="card shadow shadow">
        <div class="card-body text-center">
        <div class="height-380 py-5">
            <img class="empty-img" src="{{ asset('assets/img/placeholder/alamat.png') }}">
            <div>
                <h3 class="font-size-24 font-weight-bold mt-5">Alamat Pengiriman Belum Ditambahkan</h3>
                <p class="font-size-16"></p>
                <button type="button" class="btn btn-primary btn-lg" id="btn-add_alamat">
                    <i class="fa fa-plus mr-1"></i>Tambah Alamat</button>
            </div>
        </div>
        </div>
    </div>
    @endforelse
</div>
