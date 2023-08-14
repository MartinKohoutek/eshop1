<!--start bottom products section-->
@php
$hot_deals = App\Models\Product::where('hot_deals', 1)->where('discount_price', '!=', NULL)->orderBy('id', 'DESC')->limit(4)->get();
$special_offer = App\Models\Product::where('special_offer', 1)->orderBy('id', 'DESC')->limit(4)->get();
@endphp
<section class="py-4 border-top">
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
            <div class="col">
                <div class="bestseller-list mb-3">
                    <h6 class="mb-3 text-uppercase">Hot Deals</h6>
                    @foreach ($hot_deals as $key => $item)
                    <div class="d-flex align-items-center">
                        <div class="bottom-product-img">
                            <a href="{{ url('product/details/'.$item->id.'/'.$item->product_slug) }}">
                                <img src="{{ asset($item->product_thumbnail) }}" width="100" alt="">
                            </a>
                        </div>
                        <div class="ms-0">
                            <h6 class="mb-0 fw-light mb-1">{{ $item->product_name}}</h6>
                            <div class="rating font-12"> <i class="bx bxs-star text-white"></i>
                                <i class="bx bxs-star text-white"></i>
                                <i class="bx bxs-star text-white"></i>
                                <i class="bx bxs-star text-white"></i>
                                <i class="bx bxs-star text-white"></i>
                            </div>
                            @php
                            $amount = $item->selling_price - $item->discount_price;
                            $discount = round(($amount/$item->selling_price) * 100);
                            @endphp
                            <p class="mb-0 text-white">
                                <!-- <strong>$59.00</strong> -->
                                @if ($item->discount_price)
                                <span class="me-1 text-decoration-line-through">${{ $item->selling_price }}</span>
                                <span class="text-white">${{ $item->discount_price }}</span>
                                @else
                                <span class="text-white">${{ $item->selling_price }}</span>
                                @endif
                            </p>
                        </div>
                    </div>
                    @if ($key != count($hot_deals) - 1)
                    <hr />
                    @endif
                    @endforeach
                </div>
            </div>
            <div class="col">
                <div class="featured-list mb-3">
                    <h6 class="mb-3 text-uppercase">Special Offer</h6>
                    @foreach ($special_offer as $key => $item)

                    <div class="d-flex align-items-center">
                        <div class="bottom-product-img">
                            <a href="product-details.html">
                                <img src="{{ asset($item->product_thumbnail) }}" width="100" alt="">
                            </a>
                        </div>
                        <div class="ms-0">
                            <h6 class="mb-0 fw-light mb-1">{{ $item->product_name }}</h6>
                            <div class="rating font-12"> <i class="bx bxs-star text-white"></i>
                                <i class="bx bxs-star text-white"></i>
                                <i class="bx bxs-star text-white"></i>
                                <i class="bx bxs-star text-white"></i>
                                <i class="bx bxs-star text-white"></i>
                            </div>
                            @php
                            $amount = $item->selling_price - $item->discount_price;
                            $discount = round(($amount/$item->selling_price) * 100);
                            @endphp
                            <p class="mb-0 text-white">
                                <!-- <strong>$59.00</strong> -->
                                @if ($item->discount_price)
                                <span class="me-1 text-decoration-line-through">${{ $item->selling_price }}</span>
                                <span class="text-white">${{ $item->discount_price }}</span>
                                @else
                                <span class="text-white">${{ $item->selling_price }}</span>
                                @endif
                            </p>
                        </div>
                    </div>
                    @if ($key != count($special_offer) - 1)
                    <hr />
                    @endif
                    @endforeach

                </div>
            </div>
            <div class="col">
                <div class="new-arrivals-list mb-3">
                    <h6 class="mb-3 text-uppercase">New arrivals</h6>
                    <div class="d-flex align-items-center">
                        <div class="bottom-product-img">
                            <a href="jproduct-details.html">
                                <img src="{{ asset('frontend/assets/images/products/09.png') }}" width="100" alt="">
                            </a>
                        </div>
                        <div class="ms-0">
                            <h6 class="mb-0 fw-light mb-1">Product Short Name</h6>
                            <div class="rating font-12"> <i class="bx bxs-star text-white"></i>
                                <i class="bx bxs-star text-white"></i>
                                <i class="bx bxs-star text-white"></i>
                                <i class="bx bxs-star text-white"></i>
                                <i class="bx bxs-star text-white"></i>
                            </div>
                            <p class="mb-0 text-white"><strong>$59.00</strong>
                            </p>
                        </div>
                    </div>
                    <hr />
                    <div class="d-flex align-items-center">
                        <div class="bottom-product-img">
                            <a href="product-details.html">
                                <img src="{{ asset('frontend/assets/images/products/10.png') }}" width="100" alt="">
                            </a>
                        </div>
                        <div class="ms-0">
                            <h6 class="mb-0 fw-light mb-1">Product Short Name</h6>
                            <div class="rating font-12"> <i class="bx bxs-star text-white"></i>
                                <i class="bx bxs-star text-white"></i>
                                <i class="bx bxs-star text-white"></i>
                                <i class="bx bxs-star text-white"></i>
                                <i class="bx bxs-star text-white"></i>
                            </div>
                            <p class="mb-0 text-white"><strong>$59.00</strong>
                            </p>
                        </div>
                    </div>
                    <hr />
                    <div class="d-flex align-items-center">
                        <div class="bottom-product-img">
                            <a href="product-details.html">
                                <img src="{{ asset('frontend/assets/images/products/11.png') }}" width="100" alt="">
                            </a>
                        </div>
                        <div class="ms-0">
                            <h6 class="mb-0 fw-light mb-1">Product Short Name</h6>
                            <div class="rating font-12"> <i class="bx bxs-star text-white"></i>
                                <i class="bx bxs-star text-white"></i>
                                <i class="bx bxs-star text-white"></i>
                                <i class="bx bxs-star text-white"></i>
                                <i class="bx bxs-star text-white"></i>
                            </div>
                            <p class="mb-0 text-white"><strong>$59.00</strong>
                            </p>
                        </div>
                    </div>
                    <hr />
                    <div class="d-flex align-items-center">
                        <div class="bottom-product-img">
                            <a href="product-details.html">
                                <img src="{{ asset('frontend/assets/images/products/12.png') }}" width="100" alt="">
                            </a>
                        </div>
                        <div class="ms-0">
                            <h6 class="mb-0 fw-light mb-1">Product Short Name</h6>
                            <div class="rating font-12"> <i class="bx bxs-star text-white"></i>
                                <i class="bx bxs-star text-white"></i>
                                <i class="bx bxs-star text-white"></i>
                                <i class="bx bxs-star text-white"></i>
                                <i class="bx bxs-star text-white"></i>
                            </div>
                            <p class="mb-0 text-white"><strong>$59.00</strong>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="top-rated-products-list mb-3">
                    <h6 class="mb-3 text-uppercase">Top rated Products</h6>
                    <div class="d-flex align-items-center">
                        <div class="bottom-product-img">
                            <a href="product-details.html">
                                <img src="{{ asset('frontend/assets/images/products/13.png') }}" width="100" alt="">
                            </a>
                        </div>
                        <div class="ms-0">
                            <h6 class="mb-0 fw-light mb-1">Product Short Name</h6>
                            <div class="rating font-12"> <i class="bx bxs-star text-white"></i>
                                <i class="bx bxs-star text-white"></i>
                                <i class="bx bxs-star text-white"></i>
                                <i class="bx bxs-star text-white"></i>
                                <i class="bx bxs-star text-white"></i>
                            </div>
                            <p class="mb-0 text-white"><strong>$59.00</strong>
                            </p>
                        </div>
                    </div>
                    <hr />
                    <div class="d-flex align-items-center">
                        <div class="bottom-product-img">
                            <a href="product-details.html">
                                <img src="{{ asset('frontend/assets/images/products/14.png') }}" width="100" alt="">
                            </a>
                        </div>
                        <div class="ms-0">
                            <h6 class="mb-0 fw-light mb-1">Product Short Name</h6>
                            <div class="rating font-12"> <i class="bx bxs-star text-white"></i>
                                <i class="bx bxs-star text-white"></i>
                                <i class="bx bxs-star text-white"></i>
                                <i class="bx bxs-star text-white"></i>
                                <i class="bx bxs-star text-white"></i>
                            </div>
                            <p class="mb-0 text-white"><strong>$59.00</strong>
                            </p>
                        </div>
                    </div>
                    <hr />
                    <div class="d-flex align-items-center">
                        <div class="bottom-product-img">
                            <a href="product-details.html">
                                <img src="{{ asset('frontend/assets/images/products/15.png') }}" width="100" alt="">
                            </a>
                        </div>
                        <div class="ms-0">
                            <h6 class="mb-0 fw-light mb-1">Product Short Name</h6>
                            <div class="rating font-12"> <i class="bx bxs-star text-white"></i>
                                <i class="bx bxs-star text-white"></i>
                                <i class="bx bxs-star text-white"></i>
                                <i class="bx bxs-star text-white"></i>
                                <i class="bx bxs-star text-white"></i>
                            </div>
                            <p class="mb-0 text-white"><strong>$59.00</strong>
                            </p>
                        </div>
                    </div>
                    <hr />
                    <div class="d-flex align-items-center">
                        <div class="bottom-product-img">
                            <a href="product-details.html">
                                <img src="{{ asset('frontend/assets/images/products/16.png') }}" width="100" alt="">
                            </a>
                        </div>
                        <div class="ms-0">
                            <h6 class="mb-0 fw-light mb-1">Product Short Name</h6>
                            <div class="rating font-12"> <i class="bx bxs-star text-white"></i>
                                <i class="bx bxs-star text-white"></i>
                                <i class="bx bxs-star text-white"></i>
                                <i class="bx bxs-star text-white"></i>
                                <i class="bx bxs-star text-white"></i>
                            </div>
                            <p class="mb-0 text-white"><strong>$59.00</strong>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
    </div>
</section>
<!--end bottom products section-->