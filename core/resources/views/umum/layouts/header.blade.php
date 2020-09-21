<header id="header" class="u-header u-header-left-aligned-nav mb-3">
    <div class="u-header__section shadow-none">
        <!-- Topbar -->
        <div class="u-header-topbar bg-gray-1 border-0 py-2 d-none d-xl-block">
            <div class="container">
                <div class="d-flex align-items-center">
                    <div class="topbar-left">
                        <a href="#" class="text-gray-110 font-size-13 hover-on-dark">Lokasi Anda!</a>
                    </div>
                    <div class="topbar-right ml-auto">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border">
                                <a href="#" class="u-header-topbar__nav-link"><i class="ec ec-map-pointer mr-1"></i> Store Locator</a>
                            </li>
                            <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border">
                                <a href="../shop/track-your-order.html" class="u-header-topbar__nav-link"><i class="ec ec-transport mr-1"></i> Track Your Order</a>
                            </li>
                            <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border u-header-topbar__nav-item-no-border u-header-topbar__nav-item-border-single">
                                <div class="d-flex align-items-center">
                                    <!-- Language -->
                                    <div class="position-relative">
                                        <a id="languageDropdownInvoker" class="dropdown-nav-link dropdown-toggle d-flex align-items-center u-header-topbar__nav-link font-weight-normal" href="javascript:;" role="button"
                                            aria-controls="languageDropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false"
                                            data-unfold-event="hover"
                                            data-unfold-target="#languageDropdown"
                                            data-unfold-type="css-animation"
                                            data-unfold-duration="300"
                                            data-unfold-delay="300"
                                            data-unfold-hide-on-scroll="true"
                                            data-unfold-animation-in="slideInUp"
                                            data-unfold-animation-out="fadeOut">
                                            <span class="d-inline-block d-sm-none">US</span>
                                            <span class="d-none d-sm-inline-flex align-items-center"><i class="ec ec-dollar mr-1"></i> Dollar (US)</span>
                                        </a>

                                        <div id="languageDropdown" class="dropdown-menu dropdown-unfold" aria-labelledby="languageDropdownInvoker">
                                            <a class="dropdown-item active" href="#">English</a>
                                            <a class="dropdown-item" href="#">Deutsch</a>
                                            <a class="dropdown-item" href="#">Español‎</a>
                                        </div>
                                    </div>
                                    <!-- End Language -->
                                </div>
                            </li>
                            <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border">
                                <!-- Account Sidebar Toggle Button -->
                                <a id="sidebarNavToggler" href="javascript:;" role="button" class="u-header-topbar__nav-link"
                                    aria-controls="sidebarContent"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                    data-unfold-event="click"
                                    data-unfold-hide-on-scroll="false"
                                    data-unfold-target="#sidebarContent"
                                    data-unfold-type="css-animation"
                                    data-unfold-animation-in="fadeInRight"
                                    data-unfold-animation-out="fadeOutRight"
                                    data-unfold-duration="500">
                                    <i class="ec ec-user mr-1"></i> Register <span class="text-gray-50">or</span> Sign in
                                </a>
                                <!-- End Account Sidebar Toggle Button -->
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Topbar -->

        <!-- Logo-Vertical-menu-Search-header-icons -->
        <div class="border-bottom bg-white bg-xl-transparent min-height-86 flex-horizontal-center">
            <div class="container">
                <div class="row align-items-center justify-content-between justify-content-xl-start">
                    <!-- Logo -->
                    <div class="col-auto">
                        <div class="d-inline-flex d-xl-flex align-items-center justify-content-xl-between position-relative">
                            <!-- Responsive Menu -->
                            <div id="logoAndNav">
                                <!-- Nav -->
                                <nav class="navbar navbar-expand u-header__navbar">
                                    <!-- Fullscreen Toggle Button -->
                                    <button id="sidebarHeaderInvoker" type="button" class="mr-2 pl-0 navbar-toggler d-block d-xl-none btn u-hamburger ml-auto"
                                        aria-controls="sidebarHeader"
                                        aria-haspopup="true"
                                        aria-expanded="false"
                                        data-unfold-event="click"
                                        data-unfold-hide-on-scroll="false"
                                        data-unfold-target="#sidebarHeader"
                                        data-unfold-type="css-animation"
                                        data-unfold-animation-in="fadeInLeft"
                                        data-unfold-animation-out="fadeOutLeft"
                                        data-unfold-duration="500">
                                        <span id="hamburgerTrigger" class="u-hamburger__box">
                                            <span class="u-hamburger__inner"></span>
                                        </span>
                                    </button>
                                    <!-- End Fullscreen Toggle Button -->

                                    <!-- Logo -->
                                    <a class="navbar-brand u-header__navbar-brand u-header__navbar-brand-center ml-1 ml-xl-0 d-none d-xl-block" href="{{ url('/') }}" aria-label="Asoy Mart">
                                        <img src="{{ asset('assets/media/logo/logo.png') }}"/>
                                    </a>
                                    <!-- End Logo -->
                                </nav>
                                <!-- End Nav -->
                            </div>
                            <!-- End Responsive Menu -->

                            <!-- Basics Accordion -->
                            <div id="basicsAccordion" class="d-none d-xl-block">
                                <!-- Card -->
                                <div class="card border-0 py-3 position-static">
                                    <div class="card-header bg-transparent card-collapse border-0 my-1 d-none d-xl-block" id="basicsHeadingOne">
                                        <button type="button" class="btn-link btn-block d-flex card-btn py-3 text-lh-1 px-0 shadow-none rounded-0 bg-transparent border-0 font-weight-bold text-gray-90"
                                            data-toggle="collapse"
                                            data-target="#basicsCollapseOne"
                                            aria-expanded="true"
                                            aria-controls="basicsCollapseOne">
                                            <span class="text-gray-90 font-size-15">Kategori <i class="ml-2 ec ec-arrow-down-search"></i></span>
                                        </button>
                                    </div>
                                    <div id="basicsCollapseOne" class="collapse vertical-menu v3 border-top-primary border-top border-width-2"
                                        aria-labelledby="basicsHeadingOne"
                                        data-parent="#basicsAccordion">
                                        <div class="card-body p-0">
                                            <nav class="js-mega-menu navbar navbar-expand-xl u-header__navbar u-header__navbar--no-space hs-menu-initialized">
                                                <div id="navBar" class="collapse navbar-collapse u-header__navbar-collapse">
                                                    <ul class="navbar-nav u-header__navbar-nav">
                                                        @foreach(kategori_menu() as $kategori)
                                                        <!-- Nav Item MegaMenu -->
                                                        <li class="nav-item hs-has-mega-menu u-header__nav-item"
                                                            data-event="hover"
                                                            data-animation-in="slideInUp"
                                                            data-animation-out="fadeOut"
                                                            data-position="left">
                                                            <a id="basicMegaMenu" class="nav-link u-header__nav-link u-header__nav-link-toggle" href="javascript:;" aria-haspopup="true" aria-expanded="false">{{ $kategori->nama }}</a>

                                                            <!-- Nav Item - Mega Menu -->
                                                            <div class="hs-mega-menu vmm-tfw u-header__sub-menu" aria-labelledby="basicMegaMenu">
                                                                {{-- <div class="vmm-bg">
                                                                    <img class="img-fluid" src="../../assets/img/500X400/img1.png" alt="Image Description">
                                                                </div> --}}
                                                                <div class="row u-header__mega-menu-wrapper">
                                                                    @foreach($kategori->sub_kategori as $sub_kat)
                                                                    <div class="col mb-3 mb-sm-0">
                                                                        <a class="u-header__sub-menu-title" href="#">{{ $sub_kat->nama }}</a>
                                                                        <ul class="u-header__sub-menu-nav-group mb-3">
                                                                            @foreach($sub_kat->sub_kategori as $sub)
                                                                            <li><a class="nav-link u-header__sub-menu-nav-link" href="#">{{ $sub->nama }}</a></li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            <!-- End Nav Item - Mega Menu -->
                                                        </li>
                                                        <!-- End Nav Item MegaMenu-->
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Card -->
                            </div>
                            <!-- End Basics Accordion -->
                        </div>
                    </div>
                    <!-- End Logo -->
                    <!-- Search Bar -->
                    <div class="col d-none d-xl-block">
                        <form class="js-focus-state">
                            <label class="sr-only" for="searchproduct">Search</label>
                            <div class="input-group">
                                <input type="text" class="form-control font-size-15 border-right-0 height-40 border-width-2 border-primary" name="pencarian" placeholder="Kamu lagi cari apa?" required>
                                <div class="input-group-append">
                                    <button class="btn btn-primary height-40 py-2 px-3" type="button" id="searchProduct1">
                                        <span class="ec ec-search font-size-24"></span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- End Search Bar -->
                    <!-- Header Icons -->
                    <div class="col-auto position-static">
                        <div class="d-flex">
                            <ul class="d-flex list-unstyled mb-0 mr-5">
                                <!-- Search -->
                                <li class="col d-xl-none px-2 px-sm-3 position-static">
                                    <a id="searchClassicInvoker" class="font-size-22 text-gray-90 text-lh-1 btn-text-secondary" href="javascript:;" role="button"
                                        data-toggle="tooltip"
                                        data-placement="top"
                                        title="Search"
                                        aria-controls="searchClassic"
                                        aria-haspopup="true"
                                        aria-expanded="false"
                                        data-unfold-target="#searchClassic"
                                        data-unfold-type="css-animation"
                                        data-unfold-duration="300"
                                        data-unfold-delay="300"
                                        data-unfold-hide-on-scroll="true"
                                        data-unfold-animation-in="slideInUp"
                                        data-unfold-animation-out="fadeOut">
                                        <span class="ec ec-search"></span>
                                    </a>

                                    <!-- Input -->
                                    <div id="searchClassic" class="dropdown-menu dropdown-unfold dropdown-menu-right left-0 mx-2" aria-labelledby="searchClassicInvoker">
                                        <form class="js-focus-state input-group px-3">
                                            <input class="form-control" type="search" placeholder="Search Product">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary px-3" type="button"><i class="font-size-18 ec ec-search"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- End Input -->
                                </li>
                                <!-- End Search -->
                                <li class="col d-xl-none px-2 px-sm-3">
                                    <a href="{{ route('login') }}" class="text-gray-90" data-toggle="tooltip" data-placement="top" title="Masuk">
                                        <i class="font-size-22 ec ec-user"></i>
                                    </a>
                                </li>
                                <li class="col pr-xl-0 px-2 px-sm-3 d-none d-xl-block">
                                    <div id="cartTopHover" class="text-gray-90 position-relative d-flex c-pointer" data-toggle="tooltip" data-placement="top" title="Cart"
                                        aria-controls="cartDropDown"
                                        aria-haspopup="true"
                                        aria-expanded="false"
                                        data-unfold-event="click"
                                        data-unfold-target="#cartDropDown"
                                        data-unfold-type="css-animation"
                                        data-unfold-duration="150"
                                        data-unfold-delay="150"
                                        data-unfold-hide-on-scroll="true"
                                        data-unfold-animation-in="slideInUp"
                                        data-unfold-animation-out="fadeOut">
                                        <i class="font-size-22 ec ec-shopping-bag"></i>
                                        <span class="bg-lg-down-black text-white width-22 height-22 bg-primary position-absolute d-flex align-items-center justify-content-center rounded-circle left-12 top-8 font-weight-bold font-size-12">
                                            {{ get_totalCart() }}
                                        </span>
                                    </div>
                                    <div id="cartDropDown" class="cart-dropdown dropdown-menu dropdown-unfold border-top border-top-primary mt-5 border-width-2 border-left-0 border-right-0 border-bottom-0 left-auto right-0 min-width-450" aria-labelledby="cartTopHover">

                                    </div>
                                </li>
                            </ul>
                            @if(Auth::guard('web')->check())
                                <div class="position-relative py-1">
                                    <a id="userAuthInvoker" class="dropdown-nav-link dropdown-toggle d-flex align-items-center font-weight-bold font-size-16" href="javascript:void(0);" role="button"
                                        aria-controls="userAuth"
                                        aria-haspopup="true"
                                        aria-expanded="false"
                                        data-unfold-event="hover"
                                        data-unfold-target="#userAuth"
                                        data-unfold-type="css-animation"
                                        data-unfold-duration="300"
                                        data-unfold-delay="300"
                                        data-unfold-hide-on-scroll="true"
                                        data-unfold-animation-in="slideInUp"
                                        data-unfold-animation-out="fadeOut">
                                        <span class="d-inline-block d-sm-none"><i class="ec ec-user"></i></span>
                                        <span class="d-none d-sm-inline-flex align-items-center"><i class="ec ec-user mr-1"></i>Hi,  {{ auth()->guard('web')->user()->nama }}</span>
                                    </a>
                                    <div id="userAuth" class="font-size-16 user-dropdown dropdown-menu dropdown-unfold border-top border-top-primary mt-5 border-width-2 border-left-0 border-right-0 border-bottom-0 left-auto right-0" aria-labelledby="userAuthInvoker">
                                        <a class="user-dropdown-item dropdown-item font-size-16" href="{{ route('user.profil') }}">
                                            Profil
                                        </a>
                                        <a class="user-dropdown-item dropdown-item font-size-16" href="#">
                                            Pesanan Saya
                                        </a>
                                        <a class="user-dropdown-item dropdown-item font-size-16" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Keluar
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        ‎</a>
                                    </div>
                                </div>
                            @else
                            <div class="auth-button d-none d-sm-block">
                                <a href="{{ route('login') }}" class="btn btn-primary mr-3">
                                    Masuk
                                </a>
                                <a href="{{ route('register') }}" class="btn btn-primary">
                                    Daftar
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                    <!-- End Header Icons -->
                </div>
            </div>
        </div>
        <!-- End Logo-Vertical-menu-Search-header-icons -->
    </div>
</header>
