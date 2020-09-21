@extends('umum.layouts.master')
@section('styles')
@endsection

@section('content')
<main id="content" role="main">
    <div class="container">
        <div class="row mb-6">
            <div class="col-lg-3">
                @include('umum.user.menu')
            </div>
            <div class="col-lg-9">
                <div class="card shadow text-center">
                    <div class="card-header">
                        <ul class="nav nav-pills card-header-pills">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Semua</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Belum Dibayar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" href="#">Dikemas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" href="#">Dikirim</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" href="#">Selesai</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" href="#">Dibatalkan</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="css-1ynqz4z-unf-emptystate e1lf3yex0">
                            <div class="unf-emptystate-img"><img alt="no-order-found"
                                    src="https://assets.tokopedia.net/assets-tokopedia-lite/v2/zeus/production/dd7dcb8c.png">
                            </div>
                            <div>
                                <h3 class="css-1og3umh-unf-heading e1qvo2ff3">Nggak ada transaksi dalam 90 Hari Terakhir
                                </h3>
                                <p class="css-1ers9d0-unf-heading e1qvo2ff8">Coba ubah filter untuk cek rentang waktu
                                    lainnya, ya.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@stop

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="{{ asset('assets/modules/user/login.js') }}"></script>
@endpush
