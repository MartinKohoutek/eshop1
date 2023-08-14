@extends('frontend.master_dashboard')
@section('home')
<section class="py-3 border-bottom d-none d-md-flex">
    <div class="container">
        <div class="page-breadcrumb d-flex align-items-center">
            <h3 class="breadcrumb-title pe-3">Shop Grid Left Sidebar</h3>
            <div class="ms-auto">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="bx bx-home-alt"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Vendor Details</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!--end breadcrumb-->
<!--start shop area-->
<section class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-3">
                <div class="btn-mobile-filter d-xl-none"><i class='bx bx-slider-alt'></i>
                </div>
                <div class="filter-sidebar d-none d-xl-flex">
                    <div class="card rounded-0 w-100">
                        <div class="card-body">
                            <div class="align-items-center d-flex d-xl-none">
                                <h6 class="text-uppercase mb-0">Filter</h6>
                                <div class="btn-mobile-filter-close btn-close ms-auto cursor-pointer"></div>
                            </div>
                            <hr class="d-flex d-xl-none" />
                            <div class="product-categories">
                                <h6 class="text-uppercase mb-3">Vendor Details</h6>
                                <img src="{{ (!empty($vendor->photo)) ? url('upload/vendor_images/'.$vendor->photo) : url('upload/no_image.jpg') }}" class="card-img-top" alt="...">
                                <div class="position-absolute top-0 end-0 m-3 product-discount"><span class="">-10%</span>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $vendor->name }}</h5>
                                    <h6 class="text-muted">Since {{ $vendor->vendor_join }}</h6>

                                    <p class="card-text">{{ $vendor->vendor_short_info }}</p>
                                    <hr>
                                    <div class="follow-social mb-20">
                                        <h6 class="mb-15">Follow Us</h6>
                                        <ul class="social-network">
                                            <li class="hover-up">
                                                <a href="#"><i class='bx bxl-facebook-circle'></i></a>
                                            </li>
                                            <li class="hover-up">
                                                <a href="#"><i class='bx bxl-twitter'></i></a>
                                            </li>
                                            <li class="hover-up">
                                                <a href="#"><i class='bx bxl-instagram'></i></a>
                                            </li>
                                            <li class="hover-up">
                                                <a href="#"><i class='bx bxl-pinterest'></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <hr>
                                    <h6>Vendor Contact</h6>
                                    <div class="vendor-info">
                                        <ul class="font-sm mb-20">
                                            <li><i class='bx bx-location-plus'></i><strong>Address: </strong><span>{{ $vendor->address }}</span></li>
                                            <li><i class='bx bx-phone'></i><strong>Phone: </strong><span>{{ $vendor->phone }}</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-9">
                <div class="product-wrapper">
                    <div class="toolbox d-flex align-items-center mb-3 gap-2">
                        <div class="d-flex flex-wrap flex-grow-1 gap-1">
                            <div class="d-flex align-items-center flex-nowrap">
                                <p class="mb-0 font-13 text-nowrap text-white">Sort By:</p>
                                <select class="form-select ms-3 rounded-0">
                                    <option value="menu_order" selected="selected">Default sorting</option>
                                    <option value="popularity">Sort by popularity</option>
                                    <option value="rating">Sort by average rating</option>
                                    <option value="date">Sort by newness</option>
                                    <option value="price">Sort by price: low to high</option>
                                    <option value="price-desc">Sort by price: high to low</option>
                                </select>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap">
                            <div class="d-flex align-items-center flex-nowrap">
                                <p class="mb-0 font-13 text-nowrap text-white">Show:</p>
                                <select class="form-select ms-3 rounded-0">
                                    <option>9</option>
                                    <option>12</option>
                                    <option>16</option>
                                    <option>20</option>
                                    <option>50</option>
                                    <option>100</option>
                                </select>
                            </div>
                        </div>
                        <div> <a href="shop-grid-left-sidebar.html" class="btn btn-white rounded-0"><i class='bx bxs-grid me-0'></i></a>
                        </div>
                        <div> <a href="shop-list-left-sidebar.html" class="btn btn-light rounded-0"><i class='bx bx-list-ul me-0'></i></a>
                        </div>
                    </div>
                    <div class="totall-product">
                        <p>We found <strong class="text-brand">{{ count($products) }}</strong> items for you!</p>
                    </div>
                    <div class="product-grid">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-3">
                            @foreach ($products as $product)
                            <div class="col">
                                @php
                                $amount = $product->selling_price - $product->discount_price;
                                $discount = round(($amount/$product->selling_price) * 100);
                                @endphp
                                <div class="card rounded-0 product-card">
                                    <div class="card-header bg-transparent border-bottom-0">
                                        <div class="d-flex align-items-center justify-content-end gap-3">
                                            <a href="javascript:;">
                                                <div class="product-compare"><span><i class="bx bx-git-compare"></i> Compare</span>
                                                </div>
                                            </a>
                                            <a href="javascript:;">
                                                <div class="product-wishlist"> <i class="bx bx-heart"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}">
                                        <img src="{{ asset($product->product_thumbnail) }}" class="card-img-top" alt="...">
                                        @if ($product->discount_price)
                                        <span class="badge bg-primary" style="font-size: 15px; position:absolute; left: 5px; top: 5px;">- {{ $discount }} %</span>
                                        @else
                                        <span class="badge bg-success" style="font-size: 15px; position:absolute; left: 5px; top: 5px;">New</span>
                                        @endif
                                    </a>
                                    <div class="card-body">
                                        <div class="product-info">
                                            <a href="javascript:;">
                                                <p class="product-catergory font-13 mb-1">{{ $product['category']['category_name'] }}</p>
                                            </a>
                                            <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}">
                                                <h6 class="product-name mb-2">{{ $product->product_name }}</h6>
                                            </a>
                                            <div class="d-flex align-items-center">
                                                <div class="mb-1 product-price">
                                                    @if ($product->discount_price)
                                                    <span class="me-1 text-decoration-line-through">${{ $product->selling_price }}</span>
                                                    <span class="text-white fs-5">${{ $product->discount_price }}</span>
                                                    @else
                                                    <span class="text-white fs-5">${{ $product->selling_price }}</span>
                                                    @endif
                                                </div>
                                                <div class="cursor-pointer ms-auto"> <i class="bx bxs-star text-white"></i>
                                                    <i class="bx bxs-star text-white"></i>
                                                    <i class="bx bxs-star text-white"></i>
                                                    <i class="bx bxs-star text-white"></i>
                                                    <i class="bx bxs-star text-white"></i>
                                                </div>
                                            </div>
                                            <div class="product-action mt-2">
                                                <div class="d-grid gap-2">
                                                    <a href="javascript:;" class="btn btn-light btn-ecomm"> <i class="bx bxs-cart-add"></i>Add to Cart</a> <a href="javascript:;" class="btn btn-link btn-ecomm" data-bs-toggle="modal" data-bs-target="#QuickViewProduct"><i class="bx bx-zoom-in"></i>Quick View</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!--end row-->
                    </div>
                    <hr>
                    <nav class="d-flex justify-content-between" aria-label="Page navigation">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="javascript:;"><i class='bx bx-chevron-left'></i> Prev</a>
                            </li>
                        </ul>
                        <ul class="pagination">
                            <li class="page-item active d-none d-sm-block" aria-current="page"><span class="page-link">1<span class="visually-hidden">(current)</span></span>
                            </li>
                            <li class="page-item d-none d-sm-block"><a class="page-link" href="javascript:;">2</a>
                            </li>
                            <li class="page-item d-none d-sm-block"><a class="page-link" href="javascript:;">3</a>
                            </li>
                            <li class="page-item d-none d-sm-block"><a class="page-link" href="javascript:;">4</a>
                            </li>
                            <li class="page-item d-none d-sm-block"><a class="page-link" href="javascript:;">5</a>
                            </li>
                        </ul>
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="javascript:;" aria-label="Next">Next <i class='bx bx-chevron-right'></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!--end row-->
    </div>
</section>
<!--end shop area-->
</div>
<style>
    .social-network li {
        display: inline-block;
        margin: 0 8px 0 0;
        font-size: 24px;
    }

    .vendor-info ul {
        list-style-type: none;
    }

    .vendor-info i {
        font-size: 24px;
        margin: 0 12px 0 0;
        color: white;
        position: relative;
        /* Adjust these values accordingly */
        top: 5px;
        left: -10px;
    }
</style>
@endsection