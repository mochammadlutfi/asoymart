@extends('umum.layouts.master')
@section('styles')
@endsection

@section('content')
<main id="content" role="main">
    <div class="container">
        <div class="row my-5 justify-content-center">
            <div class="col-lg-4">
                <h3 class="mb-0 pb-2 font-size-26 text-center">Masuk ke akun kamu</h3>
                <form id="form-login" onsubmit="return false;">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="field-email">Alamat Email
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" name="email" id="field-email" placeholder="Masukan Alamat Email">
                        <div class="invalid-feedback" id="error-email"></div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="field-password">Password
                            <span class="text-danger">*</span>
                        </label>
                        <input type="password" class="form-control" name="password" id="field-password" placeholder="Masukan Password">
                        <div class="invalid-feedback" id="error-password"></div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">
                            Masuk Sekarang
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@stop

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="{{ asset('assets/modules/user/login.js') }}"></script>
@endpush
