@extends('frontend.master_dashboard')
@section('home')
@section('title')
    MKShop - All Vendors
@endsection
<section class="py-4">
    <div class="container">
        <div class="d-flex align-items-center">
            <h5 class="text-uppercase mb-4">All Our Vendor List</h5>
        </div>
        <div class="col-12">
            <div class="product-wrapper">
                <div class="toolbox d-flex align-items-center mb-3 gap-2">
                    <div class="d-flex flex-wrap flex-grow-1 gap-1">
                        <div class="d-flex align-items-center flex-nowrap">
                            <p class="mb-0 font-13 text-nowrap text-white">Search Vendors:</p>
                            <select class="form-select ms-3 rounded-0">
                                <option value="menu_order" selected="selected">(By Name or ID)</option>
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
                    <p>We have <strong class="text-brand">{{ count($vendors) }}</strong> vendors now</p>
                </div>
                <div class="add-banner">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">
                        @foreach ($vendors as $vendor)
                        <div class="col d-flex">
                            <div class="card rounded-0 w-100">
                                <img src="{{ (!empty($vendor->photo)) ? url('/upload/vendor_images/'.$vendor->photo) : url('upload/no_image.jpg') }}" class="card-img-top" alt="...">
                                <div class="position-absolute top-0 end-0 m-3 product-discount"><span class="">-10%</span>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $vendor->name }}</h5>
                                    <h6 class="text-muted">Since {{ $vendor->vendor_join }}</h6>
                                    @php
                                    $products = App\Models\Product::where('vendor_id', $vendor->id)->get();
                                    @endphp
                                    <span class="badge bg-success">{{ count($products) }} Products</span>
                                    <p class="card-text">{{ Str::limit($vendor->vendor_short_info, 30) }}</p> <a href="{{ route('vendor.details', $vendor->id) }}" class="btn btn-light btn-ecomm">Visit Store</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!--end row-->
                </div>
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
        <hr />

    </div>
</section>
@endsection