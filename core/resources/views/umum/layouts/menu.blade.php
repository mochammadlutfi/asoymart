
    <nav class="menu-classic menu-fixed menu-transparent menu-one-page align-right" data-menu-anima="fade-bottom" data-scroll-detect="true">
        <div class="container">
            <div class="menu-brand">
                <a href="#">
                    <img class="logo-default" src="{{ asset('assets/landing/media/logo-dark.png') }}" alt="logo" />
                    <img class="logo-retina" src="{{ asset('assets/landing/media/logo-dark.png') }}" alt="logo" />
                </a>
            </div>
            <i class="menu-btn"></i>
            <div class="menu-cnt">
                <ul>
                    <li>
                        <a href="#overview">Tentang</a>
                    </li>
                    <li>
                        <a href="#">Blog</a>
                    </li>
                </ul>
                <div class="menu-right">
                    {{-- <ul class="lan-menu">
                        <li class="dropdown">
                            <a href="#"><img src="media/en.png" />EN </a>
                            <ul>
                                <li><a href="#"><img src="media/it.png" />IT</a></li>
                                <li><a href="#"><img src="media/es.png" />ES</a></li>
                            </ul>
                        </li>
                    </ul> --}}
                    <div class="menu-custom-area">
                        <a class="btn btn-xs btn-circle" href="{{ route('mitra.daftar') }}">Daftar Jadi Mitra</a>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </nav>