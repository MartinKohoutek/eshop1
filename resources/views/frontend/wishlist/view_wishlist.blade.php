@extends('frontend.master_dashboard')
@section('home')
@section('title')
    MKShop - Wishlist
@endsection
<div class="page-content">
    <!--start breadcrumb-->
    <section class="py-3 border-bottom d-none d-md-flex">
        <div class="container">
            <div class="page-breadcrumb d-flex align-items-center">
                <h3 class="breadcrumb-title pe-3">Wishlist</h3>
                <div class="ms-auto">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="bx bx-home-alt"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">My Wishlist</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!--end breadcrumb-->
    <!--start shop cart-->
    <section class="py-4">
        <div class="container">
            <h3 class="d-none">Wishlist</h3>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card shadow-none mb-0">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="table-light">
                                                <tr>
                                                    <th></th>
                                                    <th>Product</th>
                                                    <th>Price</th>
                                                    <th>Stock Status</th>
                                                    <th>Remove</th>
                                                </tr>
                                            </thead>
                                            <tbody id="wishlist">
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
        </div>
    </section>
    <!--end shop cart-->
</div>
<style>
    .product-thumbnail img {
        max-width: 120px;
        border-radius: 15px;
        border: 1px solid #ececec;
        padding: 5px;
    }

    .product-rate-cover {
        margin-bottom: 20px;
    }

    .product-rate {
        background-image: url("{{ asset('frontend/assets/images/rating-stars.png') }}");
        background-position: 0 -12px;
        background-repeat: repeat-x;
        height: 12px;
        width: 60px;
        transition: all 0.5s ease-out 0s;
        -webkit-transition: all 0.5s ease-out 0s;
    }

    .product-rating {
        height: 12px;
        background-repeat: repeat-x;
        background-image: url("{{ asset('frontend/assets/images/rating-stars.png') }}");
        background-position: 0 0;
    }

    .detail-info {
        padding: 0 !important;
    }

    .stock-status {
        display: inline-block;
        padding: 8px 12px;
        border-radius: 5px;
        margin-bottom: 20px;
        font-family: "Quicksand", sans-serif;
        font-size: 14px;
        font-weight: 700;
        line-height: 1;
        margin-top: 10px;
    }

    .stock-status.in-stock {
        background: #DEF9EC;
        color: #3BB77E;
    }

    .stock-status.out-stock {
        color: #f74b81;
        background: #fde0e9;
    }

    table td.action i {
        font-size: 24px;
    }
</style>
@endsection