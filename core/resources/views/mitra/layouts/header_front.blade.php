<header id="page-header">
    <!-- Header Content -->
    <div class="content-header min-height-75">
        <div class="content-header-section w-100">
            <div class="row no-gutters">
                <div class="col d-flex">
                    <div class="content-header-item">
                        <a href="{{ url('/mitra') }}">
                            <img src="{{ asset('assets/img/logo/logo_mitra.png') }}" class="img-fluid h-100"/>
                        </a>
                    </div>
                </div>
                <div class="col text-right d-none d-lg-block">
                    {{-- <ul class="nav-main-header">
                        <li>
                            <a class="active" href="javascript:void(0)">
                                <i class="si si-home d-none d-xl-inline-block"></i> Home
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="si si-flag d-none d-xl-inline-block"></i> Notifications
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="si si-envelope d-none d-xl-inline-block"></i> Messages
                            </a>
                        </li>
                    </ul> --}}
                    <a href="{{ route('mitra.daftar') }}" class="btn btn-outline-primary">Login</a>
                    <a href="{{ route('mitra.daftar') }}" class="btn btn-primary">Daftar</a>
                </div>
            </div>
        </div>
    </div>
    <!-- END Header Content -->

    <!-- Header Search -->
    <div id="page-header-search" class="overlay-header">
        <div class="content-header content-header-fullrow">
            <form>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <!-- Close Search Section -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <button type="button" class="btn btn-secondary px-15" data-toggle="layout" data-action="header_search_off">
                            <i class="fa fa-times"></i>
                        </button>
                        <!-- END Close Search Section -->
                    </div>
                    <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary px-15">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- END Header Search -->

    <!-- Header Loader -->
    <div id="page-header-loader" class="overlay-header bg-primary">
        <div class="content-header content-header-fullrow text-center">
            <div class="content-header-item">
                <i class="fa fa-sun-o fa-spin text-white"></i>
            </div>
        </div>
    </div>
    <!-- END Header Loader -->
</header>
