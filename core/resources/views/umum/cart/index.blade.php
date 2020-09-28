@extends('umum.layouts.master')
@section('styles')
<link rel="stylesheet" href="https://unpkg.com/placeholder-loading/dist/css/placeholder-loading.min.css">
@endsection

@section('content')
<main id="content" role="main">
    <!-- End breadcrumb -->
    <div class="container mb-8">
        <div class="cart_title">
            <h1 class="text-center">Keranjang Belanja</h1>
        </div>

        <div class="row">
            <div class="col-md-8 col-sm-12 px-1 px-sm-3" id="cart-content">
                <div class="card shadow shadow">
                    <div class="card-body">
                        <div class="py-6 text-center">
                            <div class="height-50 spinner-grow text-primary width-50" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-none d-md-block">
                <div class="card shadow border">
                    <div class="card-body">
                        <div class="font-size-20 font-weight-bold total_title">Total belanja</div>
                        <div class="cart-price-value font-size-24 font-weight-bold float-right total_belanja mb-3">Rp0</div>

                        <form id="checkout" method="POST" action="{{ route('checkout') }}">
                            @csrf
                            <button class="btn btn-primary btn-block btn-lg" type="submit" disabled>
                                Lanjut Ke Pembayaran
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@stop
@push('scripts')
    <script src="{{ asset('assets/js/umum/cart.js') }}"></script>
@endpush
