<ul class="nav-main">
    <li>
        <a class="{{ Request::is('mitra/beranda') ? 'active' : null }}" href="{{ route('mitra.beranda') }}"><i class="si si-cup"></i>Beranda</span></a>
    </li>
    <li class="{{ Request::is('mitra/produk/*','mitra/produk') ? 'open' : null }}">
        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-social-dropbox"></i>Produk</span></a>
        <ul>
            <li>
                <a class="{{ Request::is('mitra/produk/tambah') ? 'active' : null }}" href="{{ route('mitra.produk.tambah') }}">Tambah Produk</a>
            </li>
            <li>
                <a class="{{ Request::is('mitra/produk', 'mitra/produk/edit/*') ? 'active' : null }}" href="{{ route('mitra.produk') }}">Katalog Produk</a>
            </li>
        </ul>
    </li>
    <li>
        <a class="{{ Request::is('mitra/penjualan', 'mitra/penjualan/*') ? 'active' : null }}" href="{{ route('mitra.order') }}?status=terbaru"><i class="si si-bag"></i>Penjualan</span></a>
    </li>
    <li>
        <a class="{{ Request::is('mitra/chat', 'mitra/chat/*') ? 'active' : null }}" href="{{ route('mitra.beranda') }}"><i class="si si-bubble"></i>Chat</span></a>
    </li>
    <li class="{{ Request::is('mitra/ulasan/*','mitra/keluhan') ? 'open' : null }}">
        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-emoticon-smile"></i>Kata Pembeli</span></a>
        <ul>
            <li>
                <a class="{{ Request::is('mitra/ulasan', 'mitra/ulasan/*') ? 'active' : null }}" href="{{ route('mitra.produk.tambah') }}">Ulasan</a>
            </li>
            <li>
                <a class="{{ Request::is('mitra/keluhan', 'mitra/keluhan/*') ? 'active' : null }}" href="{{ route('mitra.produk') }}">Keluhan</a>
            </li>
        </ul>
    </li>
    <li class="{{ Request::is('mitra/keuangan/*','mitra/keuangan') ? 'open' : null }}">
        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-wallet"></i>Keuangan</span></a>
        <ul>
            <li>
                <a class="{{ Request::is('mitra/keuangan/penghasilan-saya') ? 'active' : null }}" href="{{ route('mitra.produk.tambah') }}">Penghasilan Saya</a>
            </li>
            <li>
                <a class="{{ Request::is('mitra/keuangan/penarikan-dana') ? 'active' : null }}" href="{{ route('mitra.produk') }}">Penarikan Dana</a>
            </li>
            <li>
                <a class="{{ Request::is('mitra/keuangan/rekening-bank') ? 'active' : null }}" href="{{ route('mitra.produk') }}">Rekening Bank</a>
            </li>
        </ul>
    </li>
    <li class="{{ Request::is('mitra/toko/*','mitra/toko') ? 'open' : null }}">
        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="fa fa-store"></i>Toko</span></a>
        <ul>
            <li>
                <a class="{{ Request::is('mitra/toko/profil') ? 'active' : null }}" href="{{ route('mitra.toko.profil') }}">Profil Toko</a>
            </li>
            <li>
                <a class="{{ Request::is('mitra/toko/etalase') ? 'active' : null }}" href="{{ route('mitra.etalase') }}">Etalase Toko</a>
            </li>
            {{-- <li>
                <a class="{{ Request::is('mitra/toko/outlet') ? 'active' : null }}" href="{{ route('mitra.outlet') }}">Outlet Toko</a>
            </li> --}}
        </ul>
    </li>
    <li>
        <a class="{{ Request::is('mitra/pengaturan') ? 'active' : null }}" href="#"><i class="fa fa-cogs"></i>Pengaturan</span></a>
    </li>
</ul>
