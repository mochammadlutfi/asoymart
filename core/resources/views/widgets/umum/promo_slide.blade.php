<div class="position-relative">
    <div class="js-slick-carousel u-slick position-static overflow-hidden u-slick-overflow-visble pb-0 pt-2 px-1"
        data-center-mode="true" data-slides-show="1" data-variable-width="true"
        {{-- data-autoplay="true" --}}
        data-infinite="true"
        data-pagi-classes="bottom-1 js-pagination mb-0 u-slick__pagination u-slick__pagination--long slide-pagination"
        data-responsive='[{
            "breakpoint": 1400,
            "settings": {
                "slidesToShow": 1,
                "centerMode": true,
                "variableWidth": true
            }
        }, {
            "breakpoint": 1200,
            "settings": {
                "slidesToShow": 1,
                "centerMode": true,
                "variableWidth": true
            }
        }, {
            "breakpoint": 992,
            "settings": {
                "slidesToShow": 1,
                "centerMode": true,
                "variableWidth": true
            }
        }, {
            "breakpoint": 768,
            "settings": {
                "slidesToShow": 1,
                "centerMode": true,
                "variableWidth": true
            }
        }, {
            "breakpoint": 554,
            "settings": {
                "slidesToShow": 1,
                "centerMode": true,
                "variableWidth": true
            }
        }]'>
        {{-- @for($i=0; $i <= 3; $i++) --}}
        @foreach($promo as $p)
        <div class="js-slide px-2 promoBanner">
            <a href="{{ route('promo.detail', $p->slug) }}">
                <img class="img-fluid" src="{{ asset($p->image) }}" width="100%" />
            </a>
        </div>
        @endforeach
        {{-- https://via.placeholder.com/1200x400.png --}}
    {{-- @endfor --}}
</div>
