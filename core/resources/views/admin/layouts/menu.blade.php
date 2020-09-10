<ul class="nav-main">
    <li>
        <a class="{{ Request::is('admin/beranda') ? 'active' : null }}" href="{{ route('admin.beranda') }}"><i class="si si-cup"></i><span class="sidebar-mini-hide">Beranda</span></a>
    </li>
    <li class="{{ Request::is('admin/produk/*','admin/produk') ? 'open' : null }}">
        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-social-dropbox"></i><span class="sidebar-mini-hide">Produk</span></a>
        <ul>
            {{-- <li>
                <a class="{{ Request::is('admin/produk', 'admin/produk/edit/*', 'admin/produk/tambah') ? 'active' : null }}" href="{{ route('admin.produk') }}">Kelola Produk</a>
            </li> --}}
            <li>
                <a class="{{ Request::is('admin/produk/kategori') ? 'active' : null }}" href="{{ route('admin.kategori') }}">Kelola Kategori</a>
            </li>
            {{-- <li>
                <a class="{{ Request::is('admin/produk/merk') ? 'active' : null }}" href="{{ route('admin.merk') }}">Kelola Merk</a>
            </li>
            <li>
                <a class="{{ Request::is('admin/produk/pajak') ? 'active' : null }}" href="{{ route('admin.merk') }}">Pajak</a>
            </li> --}}
        </ul>
    </li>
    <li class="{{ Request::is('admin/bisnis/*') ? 'open' : null }}">
        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-home"></i><span class="sidebar-mini-hide">Mitra</span></a>
        <ul>
            <li>
                <a class="{{ Request::is('admin/mitra') ? 'active' : null }}" href="{{ route('admin.mitra') }}">Kelola Mitra</a>
            </li>
            <li>
                <a class="{{ Request::is('admin/mitra/kategori') ? 'active' : null }}" href="{{ route('admin.Bisniskategori') }}">Penarikan Dana Mitra</a>
            </li>
            <li>
                <a class="{{ Request::is('admin/mitra/kategori') ? 'active' : null }}" href="{{ route('admin.Bisniskategori') }}">Verifikasi Mitra</a>
            </li>
        </ul>
    </li>
    <li>
        <a class="{{ Request::is('admin/pelanggan') ? 'active' : null }}" href="{{ route('admin.beranda') }}"><i class="si si-people"></i>Pelanggan</a>
    </li>
    <li class="{{ Request::is('admin/pelanggan/*') ? 'open' : null }}">
        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-home"></i><span class="sidebar-mini-hide">Pelanggan</span></a>
        <ul>
            <li>
                <a class="{{ Request::is('admin/pelanggan') ? 'active' : null }}" href="{{ route('admin.mitra') }}">Kelola Pelanggan</a>
            </li>
            <li>
                <a class="{{ Request::is('admin/mitra/kategori') ? 'active' : null }}" href="{{ route('admin.Bisniskategori') }}">Penarikan Dana Mitra</a>
            </li>
            <li>
                <a class="{{ Request::is('admin/mitra/kategori') ? 'active' : null }}" href="{{ route('admin.Bisniskategori') }}">Verifikasi Mitra</a>
            </li>
        </ul>
    </li>
</ul>
