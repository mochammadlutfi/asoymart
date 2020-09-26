{{-- <div class="mb-6"> --}}
    <div class="d-flex justify-content-between align-items-center border-bottom border-color-1 flex-lg-nowrap flex-wrap mb-3">
        <h3 class="section-title section-title__full mb-0 pb-2 font-size-22">Kategori Produk</h3>
    </div>
    <div class="js-slick-carousel u-slick mb-2"
        data-slides-show="7"
        data-infinite="true"
        data-slides-scroll="4"
        data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic u-slick__arrow-centered--y rounded-circle"
        data-arrow-left-classes="fas fa-arrow-left u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left left-n16 bg-white shadow border text-primary"
        data-arrow-right-classes="fas fa-arrow-right u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right right-n20 bg-white shadow border text-primary"
        data-responsive='[{
            "breakpoint": 1400,
            "settings": {
            "slidesToShow": 7
            }
        }, {
            "breakpoint": 1200,
            "settings": {
                "slidesToShow": 6
            }
        }, {
            "breakpoint": 992,
            "settings": {
            "slidesToShow": 6
            }
        }, {
            "breakpoint": 768,
            "settings": {
            "slidesToShow": 4
            }
        }, {
            "breakpoint": 554,
            "settings": {
            "slidesToShow": 3
            }
        }, {
            "breakpoint": 480,
            "settings": {
            "slidesToShow": 2
            }
        }]'>
        @foreach(kategori_menu() as $kategori)
        <div class="js-slide products-group">
            <div class="product-item">
                <div class="h-100 product-item__outer px-0dot5 w-100">
                    <div class="product-item__inner px-xl-4">
                        <div class="product-item__body pb-xl-2">
                            <div class="mb-2">
                                <a href="#" class="d-block text-center"><img class="img-fluid" src="{{ asset($kategori->thumbnail) }}" alt="Image Description"></a>
                            </div>
                            <h5 class="text-center mb-1 product-item__title">
                                <a href="../shop/single-product-fullwidth.html" class="font-size-15 text-gray-90">
                                    {{ $kategori->nama }}
                                </a>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{-- <ul class="row list-unstyled products-group no-gutters mb-6">
        @foreach(kategori_menu() as $kategori)
        <li class="col-6 col-md-2 col-xl-1gdot7 p-3">
            <div class="card">
                <div class="card-body">
                    <div class="mb-2">
                        <a href="#" class="d-block text-center"><img class="img-fluid" src="{{ asset($kategori->thumbnail) }}" alt="Image Description"></a>
                    </div>
                    <h5 class="text-center mb-1 product-item__title">
                        <a href="../shop/single-product-fullwidth.html" class="font-size-15 text-gray-90">
                            {{ $kategori->nama }}
                        </a>
                    </h5>
                </div>
            </div>
        </li> --}}
        {{-- <li class="col-6 col-md-2 col-xl-1gdot7 product-item">
            <div class="product-item__outer h-100 w-100">
                <div class="product-item__inner px-xl-4 p-3">
                    <div class="product-item__body pb-xl-2">
                        <div class="mb-2">
                            <a href="#" class="d-block text-center"><img class="img-fluid" src="{{ asset($kategori->thumbnail) }}" alt="Image Description"></a>
                        </div>
                        <h5 class="text-center mb-1 product-item__title">
                            <a href="../shop/single-product-fullwidth.html" class="font-size-15 text-gray-90">
                                {{ $kategori->nama }}
                            </a>
                        </h5>
                    </div>
                </div>
            </div>
        </li> --}}
        {{-- @endforeach --}}
    {{-- </ul>
</div> --}}