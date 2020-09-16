@extends('umum.layouts.master')
@section('styles')
<style>
    .mitra-header{
        border: 1px solid #efefef;
        padding: 16px 24px;
        border-radius: 10px;
        background-color: #ffffff;
        box-shadow: 0 0 16px -4px rgba(0, 0, 0, 0.12);
    }
    .mitra-logo{
        width: 64px;
        height: 64px;
        background-color: #FFFFFF;
        border-radius: 50%;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        overflow: hidden;
        box-shadow: 0 0 8px 0 rgba(0, 0, 0, 0.1);
    }

    @media screen and (min-width: 1024px)
    {
        .mitra-header .mitra-logo {
            width: 100px;
            height: 100px;
            margin-right: 24px;
            box-shadow: none;
        }
    }
</style>
@endsection

@section('content')
<main id="content" role="main">
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <!-- breadcrumb -->
            <div class="mitra-header my-md-3">
                <div class="row align-items-baseline">
                    <div class="col-md-6 border-right">
                        <div class="d-flex">
                            <span class="mitra-logo">
                                <img class="img-fluid" src="https://via.placeholder.com/300x300.png" alt="Demo Seller Shop">
                            </span>
                            <div class="pl-4">
                                <h3 class="strong-700 heading-4 mb-0 font-weight-bold">{{ $data->nama }}
                                    <span class="ml-2"><i class="fa fa-check-circle" style="color:green"></i></span>
                                </h3>
                                <div class="star-rating star-rating-sm mb-1">
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                        class="fa fa-star"></i><i class="fa fa-star"></i>
                                </div>
                                <div class="location alpha-6">House : Demo, Road : Demo, Section : Demo</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                </div>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->
    <div class="container">

    </div>
</main>
@stop
