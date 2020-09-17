@extends('mitra.layouts.master')

@section('content')
<div class="content-heading pt-0 m-3">
    Pengaturan
</div>
<div class="content p-15">
    <div class="row invisible" data-toggle="appear">
        <!-- Row #1 -->
        <div class="col-6 col-xl-6">
            <a class="block block-link-shadow text-right" href="{{ route('mitra.pengaturan.alamat') }}">
                <div class="block block-link-shadow text-right">
                    <div class="block-content block-content-full clearfix">
                        <div class="float-left mt-10 d-none d-sm-block">
                            <i class="si si-pin fa-3x text-body-bg-dark"></i>
                        </div>
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Alamat</div>
                        <div class="font-size-p font-w300 keuntungan_kotor">Atur alamat utamamu di sini. Alamat utama digunakan untuk perhitungan ongkos kirim saat pembeli berbelanja di lapakmu.</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-6 col-xl-6">
            <a class="block block-link-shadow text-right" href="">
                <div class="block-content block-content-full clearfix">
                    <div class="float-left mt-10 d-none d-sm-block">
                        <i class="si si-home fa-3x text-body-bg-dark"></i>
                    </div>
                    <div class="font-size-sm font-w600 text-uppercase text-muted">Lapak</div>
                    <div class="font-size-p font-w300 keuntungan_kotor">Atur header, deskripsi lapak, lokasi lapak, dan catatan pelapak. Kamu juga bisa menutup sementara lapakmu di sini.</div>
                </div>
            </a>
        </div>
        <div class="col-6 col-xl-6">
            <a class="block block-link-shadow text-right" href="{{ route('mitra.pengaturan.rekening') }}">
                <div class="block-content block-content-full clearfix">
                    <div class="float-left mt-10 d-none d-sm-block">
                        <i class="si si-wallet fa-3x text-body-bg-dark"></i>
                    </div>
                    <div class="font-size-sm font-w600 text-uppercase text-muted">Rekening Bank</div>
                    <div class="font-size-p font-w300 keuntungan_kotor">Atur no rekening menjadi tempat pencairan dana dari hasil penjualanmu.</div>
                </div>
            </a>
        </div>
        <div class="col-6 col-xl-6">
            <a class="block block-link-shadow text-right" href="">
                <div class="block-content block-content-full clearfix">
                    <div class="float-left mt-10 d-none d-sm-block">
                        <i class="si si-envelope-open fa-3x text-body-bg-dark"></i>
                    </div>
                    <div class="font-size-sm font-w600 text-uppercase text-muted">Notifikasi</div>
                    <div class="font-size-p font-w300 keuntungan_kotor">Atur tipe notifikasi yang kamu terima dari Asoymart.</div>
                </div>
            </a>
        </div>
        <!-- END Row #1 -->
    </div>
</div>

@stop
