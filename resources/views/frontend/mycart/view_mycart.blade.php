@extends('frontend.master_dashboard')
@section('home')
<div class="page-content">
    <!--start breadcrumb-->
    <section class="py-3 border-bottom d-none d-md-flex">
        <div class="container">
            <div class="page-breadcrumb d-flex align-items-center">
                <h3 class="breadcrumb-title pe-3">Shop Cart</h3>
                <div class="ms-auto">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="bx bx-home-alt"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Shop Cart</li>
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
            <div class="shop-cart">
                <div class="row">
                    <div class="col-12 col-xl-8">
                        <div class="shop-cart-list mb-3 p-3">
                            <div id="cartPage"></div>
                            
                            <div class="d-lg-flex align-items-center gap-2"> <a href="javascript:;" class="btn btn-light btn-ecomm"><i class='bx bx-shopping-bag'></i> Continue Shoping</a>
                                <a href="javascript:;" class="btn btn-light btn-ecomm ms-auto"><i class='bx bx-x-circle'></i> Clear Cart</a>
                                <a href="javascript:;" class="btn btn-white btn-ecomm"><i class='bx bx-refresh'></i> Update Cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="checkout-form p-3 bg-dark-1">
                            <div class="card rounded-0 border bg-transparent shadow-none">
                                <div class="card-body">
                                    <p class="fs-5 text-white">Apply Discount Code</p>
                                    <div class="input-group">
                                        <input id="coupon_name" type="text" class="form-control rounded-0" placeholder="Enter discount code">
                                        <a type="submit" onclick="applyCoupon()" class="btn btn-light btn-ecomm" type="button">Apply Discount</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card rounded-0 border bg-transparent shadow-none">
                                <div class="card-body">
                                    <p class="fs-5 text-white">Estimate Shipping and Tax</p>
                                    <div class="my-3 border-top"></div>
                                    <div class="mb-3">
                                        <label class="form-label">Country Name</label>
                                        <select class="form-select rounded-0">
                                            <option selected>United States</option>
                                            <option value="1">Australia</option>
                                            <option value="2">India</option>
                                            <option value="3">Canada</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">State/Province</label>
                                        <select class="form-select rounded-0">
                                            <option selected>California</option>
                                            <option value="1">Texas</option>
                                            <option value="2">Canada</option>
                                        </select>
                                    </div>
                                    <div class="mb-0">
                                        <label class="form-label">Zip/Postal Code</label>
                                        <input type="email" class="form-control rounded-0">
                                    </div>
                                </div>
                            </div>
                            <div class="card rounded-0 border bg-transparent mb-0 shadow-none">
                                <div class="card-body">
                                    <p class="mb-2">Subtotal: <span class="float-end">$198.00</span>
                                    </p>
                                    <p class="mb-2">Shipping: <span class="float-end">--</span>
                                    </p>
                                    <p class="mb-2">Taxes: <span class="float-end">$14.00</span>
                                    </p>
                                    <p class="mb-0">Discount: <span class="float-end">--</span>
                                    </p>
                                    <div class="my-3 border-top"></div>
                                    <h5 class="mb-0">Order Total: <span class="float-end">212.00</span></h5>
                                    <div class="my-4"></div>
                                    <div class="d-grid"> <a href="javascript:;" class="btn btn-white btn-ecomm">Proceed to Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </section>
    <!--end shop cart-->
</div>
@endsection