@extends('frontend.master_dashboard')
@section('home')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="page-content">
    <!--start breadcrumb-->
    <section class="py-3 border-bottom d-none d-md-flex">
        <div class="container">
            <div class="page-breadcrumb d-flex align-items-center">
                <h3 class="breadcrumb-title pe-3">Checkout</h3>
                <div class="ms-auto">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="javascript:;">Shop</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
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
                        <div class="checkout-details">
                            <div class="card bg-transparent rounded-0 shadow-none">
                                <div class="card-body">
                                    <div class="steps steps-light">
                                        <a class="step-item active" href="shop-cart.html">
                                            <div class="step-progress"><span class="step-count">1</span>
                                            </div>
                                            <div class="step-label"><i class='bx bx-cart'></i>Cart</div>
                                        </a>
                                        <a class="step-item active current" href="checkout-details.html">
                                            <div class="step-progress"><span class="step-count">2</span>
                                            </div>
                                            <div class="step-label"><i class='bx bx-user-circle'></i>Details</div>
                                        </a>
                                        <a class="step-item" href="checkout-shipping.html">
                                            <div class="step-progress"><span class="step-count">3</span>
                                            </div>
                                            <div class="step-label"><i class='bx bx-cube'></i>Shipping</div>
                                        </a>
                                        <a class="step-item" href="checkout-payment.html">
                                            <div class="step-progress"><span class="step-count">4</span>
                                            </div>
                                            <div class="step-label"><i class='bx bx-credit-card'></i>Payment</div>
                                        </a>
                                        <a class="step-item" href="checkout-review.html">
                                            <div class="step-progress"><span class="step-count">5</span>
                                            </div>
                                            <div class="step-label"><i class='bx bx-check-circle'></i>Review</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card rounded-0">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="">
                                            <img src="assets/images/avatars/avatar-1.png" width="90" alt="" class="rounded-circle p-1 border">
                                        </div>
                                        <div class="ms-2">
                                            <h6 class="mb-0">Jhon Michle</h6>
                                            <p class="mb-0">michle@example.com</p>
                                        </div>
                                        <div class="ms-auto"> <a href="javascript:;" class="btn btn-light btn-ecomm"><i class='bx bx-edit'></i> Edit Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card rounded-0">
                                <div class="card-body">
                                    <div class="border p-3">
                                        <h2 class="h5 mb-0">Shipping Address</h2>
                                        <div class="my-3 border-bottom"></div>
                                        <div class="form-body">
                                            <form class="row g-3">
                                                <div class="col-md-6">
                                                    <label class="form-label">First Name</label>
                                                    <input type="text" name="shipping_name" class="form-control rounded-0" value="{{ Auth::user()->name }}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Last Name</label>
                                                    <input type="text" class="form-control rounded-0">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">E-mail id</label>
                                                    <input type="text" name="shipping_email" class="form-control rounded-0" value="{{ Auth::user()->email }}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Phone Number</label>
                                                    <input type="text" name="shipping_phone" class="form-control rounded-0" value="{{ Auth::user()->phone }}">
                                                </div>
                                                <!-- <div class="col-md-6">
                                                    <label class="form-label">Company</label>
                                                    <input type="text" class="form-control rounded-0">
                                                </div> -->
                                                <div class="col-md-6">
                                                    <label class="form-label">Zip/Postal Code</label>
                                                    <input type="text" class="form-control rounded-0" name="post_code">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">State/Province/Division</label>
                                                    <select name="division_id" class="form-select rounded-0">
                                                        <option>Select an division ...</option>
                                                        @foreach ($divisions as $item)
                                                        <option value="{{ $item->id }}">{{ $item->division_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <label class="form-label">Country/District</label>
                                                    <select name="district_id" class="form-select rounded-0">
                                                        
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">State</label>
                                                    <select name="state_id" class="form-select rounded-0">
                                                        
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Address</label>
                                                    <textarea class="form-control rounded-0" name="shipping_address">{{ Auth::user()->address }}</textarea>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Additional Information</label>
                                                    <textarea class="form-control rounded-0" name="notes"></textarea>
                                                </div>
                                                <div class="col-md-12">
                                                    <h6 class="mb-0 h5">Billing Address</h6>
                                                    <div class="my-3 border-bottom"></div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="gridCheck" checked>
                                                        <label class="form-check-label" for="gridCheck">Same as shipping address</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="d-grid"> <a href="javascript:;" class="btn btn-light btn-ecomm"><i class='bx bx-chevron-left'></i>Back to Cart</a>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="d-grid"> <a href="javascript:;" class="btn btn-white btn-ecomm">Proceed to Checkout<i class='bx bx-chevron-right'></i></a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="order-summary">
                            <div class="card rounded-0">
                                <div class="card-body">
                                    <div class="card rounded-0 border bg-transparent shadow-none">
                                        <div class="card-body">
                                            <p class="fs-5 text-white">Apply Discount Code</p>
                                            <div class="input-group">
                                                <input type="text" class="form-control rounded-0" placeholder="Enter discount code">
                                                <button class="btn btn-light btn-ecomm" type="button">Apply Discount</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card rounded-0 border bg-transparent shadow-none">
                                        <div class="card-body">
                                            <p class="fs-5 text-white">Order summary</p>
                                            
                                            @foreach ($carts as $key => $cart)
                                            <div class="my-3 border-top"></div>
                                            <div class="d-flex align-items-center">
                                                <a class="d-block flex-shrink-0" href="javascript:;">
                                                    <img src="{{ asset($cart->options->image) }}" width="75" alt="Product">
                                                </a>
                                                <div class="ps-2">
                                                    <h6 class="mb-1"><a href="javascript:;">{{ $cart->name }}</a></h6>
                                                    <div class="widget-product-meta"><span class="me-2">${{ $cart->price }}</span><span class="">x {{ $cart->qty }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach

                                        </div>
                                    </div>
                                    <div class="card rounded-0 border bg-transparent mb-0 shadow-none">
                                        <div class="card-body">
                                            @if (Session::has('coupon'))
                                            <p class="mb-2">Subtotal: <span class="float-end">${{ $cartTotal }}</span>
                                            </p>
                                            <p class="mb-0">Discount: <span class="float-end">{{ session()->get('coupon')['coupon_name'] }} ({{ session()->get('coupon')['coupon_discount']}})%</span>
                                            </p>
                                            <p class="mb-0">Coupon Discount: <span class="float-end">-${{ session()->get('coupon')['discount_amount'] }}</span>
                                            </p>
                                            <p class="mb-2">Shipping: <span class="float-end">--</span>
                                            </p>
                                            <p class="mb-2">Taxes: <span class="float-end">$14.00</span>
                                            </p>
                                            <div class="my-3 border-top"></div>
                                            <h5 class="mb-0">Order Total: <span class="float-end">${{ session()->get('coupon')['total_amount'] }}</span></h5>
                                            @else
                                            <p class="mb-2">Shipping: <span class="float-end">--</span>
                                            </p>
                                            <p class="mb-2">Taxes: <span class="float-end">$14.00</span>
                                            </p>
                                            <div class="my-3 border-top"></div>
                                            <h5 class="mb-0">Order Total: <span class="float-end">${{ $cartTotal}}</span></h5>
                                            @endif
                                        </div>
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
<script>
     $(document).ready(function() {
        $('select[name="division_id"]').on('change', function() {
            var division_id = $(this).val();
            if (division_id) {
                $.ajax({
                    url: "{{ url('/district-get/ajax/') }}/" + division_id, // jako /axaj/{id}
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="district_id"]').html('');
                        var d = $('select[name="district_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="district_id"]').append('<option value="' + value.id + '">' + value.district_name + '</option>');
                        });
                    }
                });
            } else {
                alert('danger');
            }
        });
    });

    $(document).ready(function() {
        $('select[name="district_id"]').on('change', function() {
            var district_id = $(this).val();
            if (district_id) {
                $.ajax({
                    url: "{{ url('/state-get/ajax/') }}/" + district_id, // jako /axaj/{id}
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="state_id"]').html('');
                        var d = $('select[name="state_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="state_id"]').append('<option value="' + value.id + '">' + value.state_name + '</option>');
                        });
                    }
                });
            } else {
                alert('danger');
            }
        });
    });
</script>
@endsection