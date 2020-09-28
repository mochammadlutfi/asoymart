@extends('umum.layouts.master')
@section('styles')
<style>

</style>
@endsection

@section('content')
<main id="content" role="main">
    <!-- Slider Section -->
    <div class="container">
        <!-- Promo Slide -->
        <div class="mb-10 mb-xl-3">
            @widget('umum.promo_slide')
        </div>
        <!-- End Promo Slide -->

        <!-- Flash Sale -->
        {{-- <div class="mb-6 d-none d-xl-block">
            <div class="position-relative">
                <div class="border-bottom border-color-1 mb-2">
                    <h3 class="d-inline-block section-title section-title__full mb-0 pb-2 font-size-22">Flash Sale</h3>
                </div>
                <div class="js-slick-carousel u-slick position-static overflow-hidden u-slick-overflow-visble pb-7 pt-2 px-1"
                    data-pagi-classes="text-center right-0 bottom-1 left-0 u-slick__pagination u-slick__pagination--long mb-0 z-index-n1 mt-3 mt-md-0"
                    data-slides-show="6" data-slides-scroll="1"
                    data-arrows-classes="position-absolute top-0 font-size-17 u-slick__arrow-normal top-10"
                    data-arrow-left-classes="fa fa-angle-left right-1"
                    data-arrow-right-classes="fa fa-angle-right right-0"
                    data-responsive='[{
                            "breakpoint": 1400,
                            "settings": {
                            "slidesToShow": 6
                            }
                        }, {
                            "breakpoint": 1200,
                            "settings": {
                                "slidesToShow": 6
                            }
                        }, {
                            "breakpoint": 992,
                            "settings": {
                            "slidesToShow": 4
                            }
                        }, {
                            "breakpoint": 768,
                            "settings": {
                            "slidesToShow": 2
                            }
                        }, {
                            "breakpoint": 554,
                            "settings": {
                            "slidesToShow": 2
                            }
                        }]'>
                    @for($i=0; $i <= 10; $i++) <div class="product-item">
                        <div class="product-item__outer h-100">
                            <div class="product-item__inner">
                                <div class="product-item__body pb-xl-2">
                                    <div class="mb-2">
                                        <a href="../shop/single-product-fullwidth.html" class="d-block text-center">
                                            <img class="img-fluid" src="https://via.placeholder.com/200x200.png"
                                                alt="Image Description">
                                        </a>
                                    </div>
                                    <div class="px-2">
                                        <h5 class="mb-1 product-item__title">
                                            <a href="../shop/single-product-fullwidth.html" class="font-weight-bold">
                                                Wireless Audio System Multiroom 360 degree Full base audio</a>
                                        </h5>
                                        <div class="flex-center-between mb-1">
                                            <div class="prodcut-price">
                                                <div class="text-gray-100">$685,00</div>
                                            </div>
                                        </div>
                                        <span class="d-inline-flex align-items-center small font-size-14">
                                            <div class="text-warning mr-2">
                                                <small class="fas fa-star"></small>
                                                <small class="fas fa-star"></small>
                                                <small class="fas fa-star"></small>
                                                <small class="fas fa-star"></small>
                                                <small class="far fa-star text-muted"></small>
                                            </div>
                                            <span class="text-secondary">(40)</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                @endfor
            </div>
        </div> --}}
        <div class="mt-6">
            @widget('umum.kategori_box')
        </div>

        <div class="mb-6">
            <!-- Nav Classic -->
            <div class="position-relative bg-white text-center z-index-2">
                <ul class="nav nav-classic" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active js-animation-link" id="pills-one-example1-tab" data-toggle="pill"
                            href="#pills-one-example1" role="tab" aria-controls="pills-one-example1" aria-selected="true"
                            data-target="#pills-one-example1" data-link-group="groups" data-animation-in="slideInUp">
                            <div class="d-md-flex justify-content-md-center align-items-md-center">
                                Terbaru
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-animation-link" id="pills-two-example1-tab" data-toggle="pill"
                            href="#pills-two-example1" role="tab" aria-controls="pills-two-example1" aria-selected="false"
                            data-target="#pills-two-example1" data-link-group="groups" data-animation-in="slideInUp">
                            <div class="d-md-flex justify-content-md-center align-items-md-center">
                                Trending
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-animation-link" id="pills-three-example1-tab" data-toggle="pill"
                            href="#pills-three-example1" role="tab" aria-controls="pills-three-example1"
                            aria-selected="false" data-target="#pills-three-example1" data-link-group="groups"
                            data-animation-in="slideInUp">
                            <div class="d-md-flex justify-content-md-center align-items-md-center">
                                Top Rated
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- End Nav Classic -->
            <!-- Tab Content -->
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade pt-2 show active" id="pills-one-example1" role="tabpanel" aria-labelledby="pills-one-example1-tab" data-target-group="groups">
                    <ul class="row list-unstyled products-group no-gutters">
                        @foreach($terbaru as $baru)
                        <li class="col-6 col-md-3 col-xl-2 product-item">
                            <div class="product-item__outer h-100">
                                <div class="product-item__inner">
                                    <div class="product-item__body pb-2">
                                        <a href="{{ route('produk.detail', ['bisnis' => $baru->bisnis->link_toko, 'produk' => $baru->slug]) }}" class="d-block text-center">
                                            <img class="img-fluid" src="{{ get_produk_img($baru->fotoUtama) }}" alt="Image Description">
                                        </a>
                                        <div class="px-2 mt-2">
                                            <a href="{{ route('produk.detail', ['bisnis' => $baru->bisnis->link_toko, 'produk' => $baru->slug]) }}">
                                                <h5 class="mb-1 product-item__title">
                                                        {{ $baru->nama }}
                                                </h5>
                                                <div class="product-price flex-center-between mb-1">
                                                    {{ $baru->harga }}
                                                </div>
                                            </a>
                                            <span class="d-inline-flex align-items-center small font-size-14">
                                                <div class="text-warning mr-2">
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                </div>
                                                <span class="text-secondary">(40)</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="tab-pane fade pt-2" id="pills-two-example1" role="tabpanel"
                    aria-labelledby="pills-two-example1-tab" data-target-group="groups">

                </div>
                <div class="tab-pane fade pt-2" id="pills-three-example1" role="tabpanel"
                    aria-labelledby="pills-three-example1-tab" data-target-group="groups">

                </div>
            </div>
            <!-- End Tab Content -->
        </div>

        <div class="mb-6">
            @widget('umum.seller_box')
        </div>
    </div>
    <!-- End Flash Sale -->

    <!-- End Slider Section -->
</main>
@endsection
