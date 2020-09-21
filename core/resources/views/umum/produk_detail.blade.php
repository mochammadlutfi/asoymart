@extends('umum.layouts.master')
@section('styles')
<style>
.checkbox-alphanumeric::after,
.checkbox-alphanumeric::before {
  content: '';
  display: table;
}

.checkbox-alphanumeric::after {
  clear: both;
}

.checkbox-alphanumeric input {
  left: -9999px;
  position: absolute;
}

.checkbox-alphanumeric label {
  width: 2.25rem;
  height: 2.25rem;
  float: left;
  padding: 0.375rem 0;
  margin-right: 0.375rem;
  display: block;
  color: #818a91;
  font-size: 0.875rem;
  font-weight: 400;
  text-align: center;
  background: transparent;
  text-transform: uppercase;
  border: 1px solid #e6e6e6;
  border-radius: 2px;
  -webkit-transition: all 0.3s ease;
  -moz-transition: all 0.3s ease;
  -o-transition: all 0.3s ease;
  -ms-transition: all 0.3s ease;
  transition: all 0.3s ease;
  transform: scale(0.95);
}

.checkbox-alphanumeric-circle label {
  border-radius: 100%;
}

.checkbox-alphanumeric label > img {
  max-width: 100%;
}

.checkbox-alphanumeric label:hover {
  cursor: pointer;
  border-color: #085d35;
}

.checkbox-alphanumeric input:checked ~ label {
    transform: scale(1.1);
    border-color: #085d35;
    color: #07693b;
    border: 2px solid;
}

.checkbox-alphanumeric--style-1 label {
  width: auto;
  padding-left: 1rem;
  padding-right: 1rem;
  border-radius: 2px;
  padding-bottom: .5rem;
  padding-top: .4rem;
}

.d-table.checkbox-alphanumeric--style-1 {
  width: 100%;
}

.d-table.checkbox-alphanumeric--style-1 label {
  width: 100%;
}
</style>
@endsection

@section('content')
<main id="content" role="main">

    <!-- End breadcrumb -->
    <div class="container">
        <!-- Single Product Body -->
        <div class="card shadow border p-3">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <div id="sliderSyncingNav" class="js-slick-carousel u-slick mb-2"
                        data-infinite="true"
                        data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic u-slick__arrow-centered--y rounded-circle"
                        data-arrow-left-classes="fas fa-arrow-left u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left ml-lg-2 ml-xl-4"
                        data-arrow-right-classes="fas fa-arrow-right u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right mr-lg-2 mr-xl-4"
                        data-nav-for="#sliderSyncingThumb">
                        @foreach($Produkfoto as $foto)
                        <div class="js-slide">
                            <img class="img-fluid" src="{{ get_produk_img($foto->path) }}" alt="Image Description">
                        </div>
                        @endforeach
                    </div>


                    <div id="sliderSyncingThumb" class="js-slick-carousel u-slick u-slick--slider-syncing u-slick--slider-syncing-size u-slick--transform-off"
                        data-infinite="true"
                        data-slides-show="5"
                        data-is-thumbs="true"
                        data-nav-for="#sliderSyncingNav">
                        @foreach($Produkfoto as $foto)
                        <div class="js-slide" style="cursor: pointer;">
                            <img class="img-fluid" src="{{ get_produk_img($foto->path) }}" alt="Image Description">
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-7 mb-md-6 mb-lg-0">
                    <div class="mb-2 product-body">
                        <div class="border-bottom mb-3 pb-md-1 pb-3">
                            <h2 class="font-size-30 font-weight-bold text-lh-1dot2 ">{{ $produk->nama }}</h2>
                            <div class="mb-2">
                                <a class="d-inline-flex align-items-center small font-size-15 text-lh-1" href="#">
                                    <div class="text-warning mr-2">
                                        <small class="fas fa-star"></small>
                                        <small class="fas fa-star"></small>
                                        <small class="fas fa-star"></small>
                                        <small class="fas fa-star"></small>
                                        <small class="far fa-star text-muted"></small>
                                    </div>
                                    <span class="text-secondary font-size-13">(3 customer reviews)</span>
                                </a>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex align-items-baseline">
                                <ins class="font-size-26 font-weight-bolder text-decoration-none text-primary product-harga">{{ $produk->harga }}</ins>
                                {{-- <del class="font-size-20 ml-2 text-gray-6">$2,299.00</del> --}}
                            </div>
                        </div>
                        <form id="option-choice-form" method="POST" onsubmit="return false;">
                            @csrf
                            <input type="hidden" name="id" value="{{ $produk->id }}">
                            <input type="hidden" name="has_variasi" value="{{ $produk->has_variasi }}" data-var2="{{ $produk->var2_status }}">

                            @if ($produk->has_variasi != 0)

                                <div class="border-top no-gutters pt-3 row">
                                    <div class="col-2">
                                        <div class="product-description-label mt-2 ">{{ $produk->var1_nama }}:</div>
                                    </div>
                                    <div class="col-10">
                                        <ul class="list-inline checkbox-alphanumeric checkbox-alphanumeric--style-1 mb-2">
                                            @foreach (json_decode($produk->var1_value) as $key => $value)
                                                <li>
                                                    <input type="radio" id="var1-{{ $value }}" name="var1" value="{{ $value }}">
                                                    <label for="var1-{{ $value }}">{{ $value }}</label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>

                                @if($produk->var2_status === 1)
                                <div class="border-top no-gutters pt-3 row">
                                    <div class="col-2">
                                        <div class="product-description-label mt-2 ">{{ $produk->var2_nama }}:</div>
                                    </div>
                                    <div class="col-10">
                                        <ul class="list-inline checkbox-alphanumeric checkbox-alphanumeric--style-1 mb-2">
                                            @foreach (json_decode($produk->var2_value) as $key => $value)
                                                <li>
                                                    <input type="radio" id="var2-{{ $value }}" name="var2" value="{{ $value }}">
                                                    <label for="var2-{{ $value }}">{{ $value }}</label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                @endif
                            @endif

                            {{-- @if (count(json_decode($detailedProduct->colors)) > 0)
                                <div class="row no-gutters">
                                    <div class="col-2">
                                        <div class="product-description-label mt-2">{{ translate('Color')}}:</div>
                                    </div>
                                    <div class="col-10">
                                        <ul class="list-inline checkbox-color mb-1">
                                            @foreach (json_decode($detailedProduct->colors) as $key => $color)
                                                <li>
                                                    <input type="radio" id="{{ $detailedProduct->id }}-color-{{ $key }}" name="color" value="{{ $color }}" @if($key == 0) checked @endif>
                                                    <label style="background: {{ $color }};" for="{{ $detailedProduct->id }}-color-{{ $key }}" data-toggle="tooltip"></label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>

                                <hr>
                            @endif --}}

                            <!-- Quantity + Add to cart -->
                            <div class="border-top no-gutters pt-3 pb-2 row">
                                <div class="col-2">
                                    <div class="product-description-label mt-2">Jumlah</div>
                                </div>
                                <div class="col-10">
                                    <div class="product-quantity d-flex align-items-center">
                                        <div class="input-group input-group--style-2 pr-3 input-number" style="width: 160px;">
                                            <span class="input-group-btn">
                                                <button class="btn btn-primary btn-sm mr-1 quantity-down" type="button" data-type="minus">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </span>
                                            <input type="text" name="quantity" class="form-control input-number text-center" placeholder="1" value="1" min="1" max="10">
                                            <span class="input-group-btn">
                                                <button class="btn btn-primary btn-sm ml-1 quantity-up" type="button" data-type="plus">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </span>
                                        </div>
                                        {{-- <div class="avialable-amount">(<span id="available-quantity">{{ $qty }}</span> {{ translate('available')}})</div> --}}
                                    </div>
                                </div>
                            </div>

                            <div class="border-top no-gutters pt-3 pb-2 row hide total-field">
                                <div class="col-2">
                                    <div class="product-description-label mt-2">Total</div>
                                </div>
                                <div class="col-10">
                                    <ins class="font-size-26 font-weight-bolder text-decoration-none text-primary total_harga">{{ $produk->harga }}</ins>
                                </div>
                            </div>
                        </form>
                        <div class="alert alert-danger hide" id="error_cart" role="alert">
                            Silahkan pilih variasi terlebih dahulu
                        </div>
                        <div class="border-top py-3">
                            <button href="#" class="btn btn btn-outline-primary font-weight-bold" id="btn-buy-now">
                                Beli Sekarang
                            </button>
                            <button href="#" class="btn btn-primary font-weight-bold" id="btn-add-cart">
                                Tambah Ke Keranjang
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Single Product Body -->

        <!-- Mitra Header -->
        <div class="card shadow border my-md-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="d-flex">
                            <span class="mitra-logo">
                                <img class="img-fluid" src="https://via.placeholder.com/300x300.png" alt="Demo Seller Shop">
                            </span>
                            <div class="pl-4">
                                <a href="{{ route('seller', $produk->bisnis->link_toko) }}">
                                    <h3 class="strong-700 heading-4 mb-0 font-weight-bold">{{ $produk->bisnis->nama }}
                                        <span class="ml-2"><i class="fa fa-check-circle"></i></span>
                                    </h3>
                                </a>
                                <div class="star-rating star-rating-sm mb-1">
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                        class="fa fa-star"></i><i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                    </div>
                </div>
            </div>
        </div>
        <!-- End Mitra Header -->

        <!-- Single Product Tab -->
        <div class="card shadow mb-8">
            <div class="position-relative position-md-static px-md-6">
                <ul class="nav nav-classic nav-tab nav-tab-lg justify-content-xl-center flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble border-0 pb-1 pb-xl-0 mb-n1 mb-xl-0" id="pills-tab-8" role="tablist">
                    <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                        <a class="nav-link active" id="deskripsi-tab" data-toggle="pill" href="#deskripsi" role="tab" aria-controls="deskripsi" aria-selected="true">Deskripsi</a>
                    </li>
                    <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                        <a class="nav-link" id="ulasan-tab" data-toggle="pill" href="#ulasan" role="tab" aria-controls="ulasan" aria-selected="false">Ulasan</a>
                    </li>
                </ul>
            </div>
            <!-- Tab Content -->
            <div class="p-4 mt-4 mt-md-0 px-lg-10 py-lg-9">
                <div class="tab-content" id="Jpills-tabContent">
                    <div class="tab-pane fade active show" id="deskripsi" role="tabpanel" aria-labelledby="deskripsi-tab">
                        <h3 class="font-size-24 mb-3">Perfectly Done</h3>
                        <p>{{ $produk->deskripsi }}</p>
                    </div>
                    <div class="tab-pane fade" id="ulasan" role="tabpanel" aria-labelledby="ulasan-tab">
                        <h3 class="font-size-24 mb-3">Perfectly Done</h3>
                        <p>{{ $produk->deskripsi }}</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="pt-lg-8 pt-xl-10">
                                    <h3 class="font-size-24 mb-3">Wireless</h3>
                                    <p class="mb-6">Fusce vitae nibh mi. Integer posuere, libero et ullamcorper facilisis, enim eros tincidunt orci, eget vestibulum sapien nisi ut leo. Cras finibus vel est ut mollis. Donec luctus condimentum ante et euismod.</p>
                                    <h3 class="font-size-24 mb-3">Fresh Design</h3>
                                    <p class="mb-6">Integer bibendum aliquet ipsum, in ultrices enim sodales sed. Quisque ut urna vitae lacus laoreet malesuada eu at massa. Pellentesque nibh augue, pellentesque nec dictum vel, pretium a arcu. Duis eu urna suscipit, lobortis elit quis, ullamcorper massa.</p>
                                    <h3 class="font-size-24 mb-3">Fabolous Sound</h3>
                                    <p class="mb-6">Cras rutrum, nibh a sodales accumsan, elit sapien ultrices sapien, eget semper lectus ex congue elit. Nullam dui elit, fermentum a varius at, iaculis non dolor. In hac habitasse platea dictumst.</p>
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                <img class="img-fluid mr-n4 mr-lg-n10" src="../../assets/img/580X580/img1.jpg" alt="Image Description">
                            </div>
                            <div class="col-md-6 text-left">
                                <img class="img-fluid ml-n4 ml-lg-n10" src="../../assets/img/580X580/img2.jpg" alt="Image Description">
                            </div>
                            <div class="col-md-6 align-self-center">
                                <div class="pt-lg-8 pt-xl-10 text-right">
                                    <h3 class="font-size-24 mb-3">Inteligent Bass</h3>
                                    <p class="mb-6">Fusce vitae nibh mi. Integer posuere, libero et ullamcorper facilisis, enim eros tincidunt orci, eget vestibulum sapien nisi ut leo. Cras finibus vel est ut mollis. Donec luctus condimentum ante et euismod.</p>
                                    <h3 class="font-size-24 mb-3">Battery Life</h3>
                                    <p class="mb-6">Integer bibendum aliquet ipsum, in ultrices enim sodales sed. Quisque ut urna vitae lacus laoreet malesuada eu at massa. Pellentesque nibh augue, pellentesque nec dictum vel, pretium a arcu. Duis eu urna suscipit, lobortis elit quis, ullamcorper massa.</p>
                                </div>
                            </div>
                        </div>
                        <ul class="nav flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                            <li class="nav-item text-gray-111 flex-shrink-0 flex-xl-shrink-1"><strong>SKU:</strong> <span class="sku">FW511948218</span></li>
                            <li class="nav-item text-gray-111 mx-3 flex-shrink-0 flex-xl-shrink-1">/</li>
                            <li class="nav-item text-gray-111 flex-shrink-0 flex-xl-shrink-1"><strong>Category:</strong> <a href="#" class="text-blue">Headphones</a></li>
                            <li class="nav-item text-gray-111 mx-3 flex-shrink-0 flex-xl-shrink-1">/</li>
                            <li class="nav-item text-gray-111 flex-shrink-0 flex-xl-shrink-1"><strong>Tags:</strong> <a href="#" class="text-blue">Fast</a>, <a href="#" class="text-blue">Gaming</a>, <a href="#" class="text-blue">Strong</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Tab Content -->
        </div>
        <!-- End Single Product Tab -->
    </div>
</main>
@stop
@push('scripts')
    <script src="{{ asset('assets/js/umum/general.js') }}"></script>
@endpush
