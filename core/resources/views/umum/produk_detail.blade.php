@extends('umum.layouts.master')
@section('styles')
@endsection

@section('content')
<main id="content" role="main">
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <!-- breadcrumb -->
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{ url('/') }}">Home</a></li>
                        @if($produk->kategori->parent->parent)
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="#">{{ $produk->kategori->parent->parent->nama }}</a></li>
                        @endif
                        @if($produk->kategori->parent->parent)
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="#">{{ $produk->kategori->parent->nama }}</a></li>
                        @endif
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">{{ $produk->kategori->nama }}</li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->
    <div class="container">
        <!-- Single Product Body -->
        <div class="mb-xl-14 mb-6">
            <div class="row">
                <div class="col-md-5 mb-4 mb-md-0">
                    <div id="sliderSyncingNav" class="js-slick-carousel u-slick mb-2"
                        data-infinite="true"
                        data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic u-slick__arrow-centered--y rounded-circle"
                        data-arrow-left-classes="fas fa-arrow-left u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left ml-lg-2 ml-xl-4"
                        data-arrow-right-classes="fas fa-arrow-right u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right mr-lg-2 mr-xl-4"
                        data-nav-for="#sliderSyncingThumb">
                        @foreach($Produkfoto as $foto)
                        <div class="js-slide">
                            <img class="img-fluid" src="{{ asset('uploads/'.$foto->path) }}" alt="Image Description">
                        </div>
                        @endforeach
                    </div>

                    <div id="sliderSyncingThumb" class="js-slick-carousel u-slick u-slick--slider-syncing u-slick--slider-syncing-size u-slick--gutters-1 u-slick--transform-off"
                        data-infinite="true"
                        data-slides-show="5"
                        data-is-thumbs="true"
                        data-nav-for="#sliderSyncingNav">
                        @foreach($Produkfoto as $foto)
                        <div class="js-slide" style="cursor: pointer;">
                            <img class="img-fluid" src="{{ asset('uploads/'.$foto->path) }}" alt="Image Description">
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-7 mb-md-6 mb-lg-0">
                    <div class="mb-2">
                        <div class="border-bottom mb-3 pb-md-1 pb-3">
                            <h2 class="font-size-25 text-lh-1dot2">{{ $produk->nama }}</h2>
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
                        <div class="mb-4">
                            <div class="d-flex align-items-baseline">
                                <ins class="font-size-36 text-decoration-none">$1,999.00</ins>
                                <del class="font-size-20 ml-2 text-gray-6">$2,299.00</del>
                            </div>
                        </div>
                        <div class="border-top border-bottom py-3 mb-4">
                            <div class="d-flex align-items-center">
                                <h6 class="font-size-14 mb-0">Color</h6>
                                <!-- Select -->
                                <select class="js-select selectpicker dropdown-select ml-4"
                                    data-style="btn-sm bg-white font-weight-normal py-2 border">
                                    <option value="one" selected>White with Gold</option>
                                    <option value="two">Red</option>
                                    <option value="three">Green</option>
                                    <option value="four">Blue</option>
                                </select>
                                <!-- End Select -->
                            </div>
                        </div>
                        <div class="d-md-flex align-items-end mb-3">
                            <div class="max-width-150 mb-4 mb-md-0">
                                <h6 class="font-size-14">JUMLAH</h6>
                                <!-- Quantity -->
                                <div class="border rounded-pill py-2 px-3 border-color-1">
                                    <div class="js-quantity row align-items-center">
                                        <div class="col">
                                            <input class="js-result form-control h-auto border-0 rounded p-0 shadow-none" type="text" value="1">
                                        </div>
                                        <div class="col-auto pr-1">
                                            <a class="js-minus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0" href="javascript:;">
                                                <small class="fas fa-minus btn-icon__inner"></small>
                                            </a>
                                            <a class="js-plus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0" href="javascript:;">
                                                <small class="fas fa-plus btn-icon__inner"></small>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Quantity -->
                            </div>
                        </div>
                        <div class="border-top py-3">
                            <button href="#" class="btn btn-primary">
                                <i class="ec ec-add-to-cart mr-2 font-size-20"></i>
                                Tambah Ke Keranjang
                            </button>
                            <button href="#" class="btn btn-primary">
                                <i class="ec ec-add-to-cart mr-2 font-size-20"></i>
                                Beli Sekarang
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Single Product Body -->
        <!-- Single Product Tab -->
        <div class="mb-8">
            <div class="position-relative position-md-static px-md-6">
                <ul class="nav nav-classic nav-tab nav-tab-lg flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble border-0 pb-1 pb-xl-0 mb-n1 mb-xl-0" id="pills-tab-8" role="tablist">
                    <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                        <a class="nav-link active" id="deskripsi_produk-tab" data-toggle="pill" href="#deskripsi_produk" role="tab" aria-controls="deskripsi_produk" aria-selected="true">Deskripsi</a>
                    </li>
                    <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                        <a class="nav-link" id="Jpills-two-example1-tab" data-toggle="pill" href="#Jpills-two-example1" role="tab" aria-controls="Jpills-two-example1" aria-selected="false">Description</a>
                    </li>
                    <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                        <a class="nav-link" id="Jpills-three-example1-tab" data-toggle="pill" href="#Jpills-three-example1" role="tab" aria-controls="Jpills-three-example1" aria-selected="false">Specification</a>
                    </li>
                    <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                        <a class="nav-link" id="Jpills-four-example1-tab" data-toggle="pill" href="#Jpills-four-example1" role="tab" aria-controls="Jpills-four-example1" aria-selected="false">Reviews</a>
                    </li>
                </ul>
            </div>
            <!-- Tab Content -->
            <div class="borders-radius-17 border p-4 mt-4 mt-md-0 px-lg-10 py-lg-9">
                <div class="tab-content" id="Jpills-tabContent">
                    <div class="tab-pane fade active show" id="deskripsi_produk" role="tabpanel" aria-labelledby="deskripsi_produk-tab">
                        <?= $produk->deskripsi; ?>
                    </div>
                    <div class="tab-pane fade" id="Jpills-two-example1" role="tabpanel" aria-labelledby="Jpills-two-example1-tab">

                    </div>
                    <div class="tab-pane fade" id="Jpills-three-example1" role="tabpanel" aria-labelledby="Jpills-three-example1-tab">

                    </div>
                    <div class="tab-pane fade" id="Jpills-four-example1" role="tabpanel" aria-labelledby="Jpills-four-example1-tab">

                    </div>
                </div>
            </div>
            <!-- End Tab Content -->
        </div>
        <!-- End Single Product Tab -->
    </div>
</main>
@stop
