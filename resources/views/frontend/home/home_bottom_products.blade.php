<!--start bottom products section-->
@php
$hot_deals = App\Models\Product::where('hot_deals', 1)->where('discount_price', '!=', NULL)->orderBy('id', 'DESC')->limit(4)->get();
$special_offer = App\Models\Product::where('special_offer', 1)->orderBy('id', 'DESC')->limit(4)->get();
$recently_added = App\Models\Product::where('status', '1')->orderBy('id', 'DESC')->limit(4)->get();
$special_deals = App\Models\Product::where('special_deals', '1')->orderBy('id', 'DESC')->limit(4)->get();
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
                        <div class="ms-2" >
                            <h6 class="mb-0 fw-light mb-1"><a href="{{ url('product/details/'.$item->id.'/'.$item->product_slug) }}">{{ $item->product_name}}</a></h6>
                            @php
                            $average = App\Models\Review::where('product_id', $item->id)->where('status', 1)->avg('rating');
                            @endphp
                            <div class="rating font-12">
                                @if ($average == 0)
                                <i class="bx bxs-star text-light-4"></i>
                                <i class="bx bxs-star text-light-4"></i>
                                <i class="bx bxs-star text-light-4"></i>
                                <i class="bx bxs-star text-light-4"></i>
                                <i class="bx bxs-star text-light-4"></i>
                                @elseif ($average == 1 || $average < 2) <i class="bx bxs-star text-warning"></i>
                                    <i class="bx bxs-star text-light-4"></i>
                                    <i class="bx bxs-star text-light-4"></i>
                                    <i class="bx bxs-star text-light-4"></i>
                                    <i class="bx bxs-star text-light-4"></i>
                                    @elseif ($average == 2 || $average < 3) <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-light-4"></i>
                                        <i class="bx bxs-star text-light-4"></i>
                                        <i class="bx bxs-star text-light-4"></i>
                                        @elseif ($average == 3 || $average < 4) <i class="bx bxs-star text-warning"></i>
                                            <i class="bx bxs-star text-warning"></i>
                                            <i class="bx bxs-star text-warning"></i>
                                            <i class="bx bxs-star text-light-4"></i>
                                            <i class="bx bxs-star text-light-4"></i>
                                            @elseif ($average == 4 || $average < 5) <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star text-light-4"></i>
                                                @elseif ($average == 5 || $average < 5) <i class="bx bxs-star text-warning"></i>
                                                    <i class="bx bxs-star text-warning"></i>
                                                    <i class="bx bxs-star text-warning"></i>
                                                    <i class="bx bxs-star text-warning"></i>
                                                    <i class="bx bxs-star text-warning"></i>
                                                    @endif
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
                            <a href="{{ url('product/details/'.$item->id.'/'.$item->product_slug) }}">
                                <img src="{{ asset($item->product_thumbnail) }}" width="100" alt="">
                            </a>
                        </div>
                        <div class="ms-2">
                            <h6 class="mb-0 fw-light mb-1"><a href="{{ url('product/details/'.$item->id.'/'.$item->product_slug) }}">{{ $item->product_name }}</a></h6>
                            @php
                            $average = App\Models\Review::where('product_id', $item->id)->where('status', 1)->avg('rating');
                            @endphp
                            <div class="rating font-12"> @if ($average == 0)
                                                <i class="bx bxs-star text-light-4"></i>
                                                    <i class="bx bxs-star text-light-4"></i>
                                                    <i class="bx bxs-star text-light-4"></i>
                                                    <i class="bx bxs-star text-light-4"></i>
                                                    <i class="bx bxs-star text-light-4"></i>
                                                @elseif ($average == 1 || $average < 2) <i class="bx bxs-star text-warning"></i>
                                                    <i class="bx bxs-star text-light-4"></i>
                                                    <i class="bx bxs-star text-light-4"></i>
                                                    <i class="bx bxs-star text-light-4"></i>
                                                    <i class="bx bxs-star text-light-4"></i>
                                                    @elseif ($average == 2 || $average < 3) <i class="bx bxs-star text-warning"></i>
                                                        <i class="bx bxs-star text-warning"></i>
                                                        <i class="bx bxs-star text-light-4"></i>
                                                        <i class="bx bxs-star text-light-4"></i>
                                                        <i class="bx bxs-star text-light-4"></i>
                                                        @elseif ($average == 3 || $average < 4) <i class="bx bxs-star text-warning"></i>
                                                            <i class="bx bxs-star text-warning"></i>
                                                            <i class="bx bxs-star text-warning"></i>
                                                            <i class="bx bxs-star text-light-4"></i>
                                                            <i class="bx bxs-star text-light-4"></i>
                                                            @elseif ($average == 4 || $average < 5) <i class="bx bxs-star text-warning"></i>
                                                                <i class="bx bxs-star text-warning"></i>
                                                                <i class="bx bxs-star text-warning"></i>
                                                                <i class="bx bxs-star text-warning"></i>
                                                                <i class="bx bxs-star text-light-4"></i>
                                                                @elseif ($average == 5 || $average < 5) <i class="bx bxs-star text-warning"></i>
                                                                    <i class="bx bxs-star text-warning"></i>
                                                                    <i class="bx bxs-star text-warning"></i>
                                                                    <i class="bx bxs-star text-warning"></i>
                                                                    <i class="bx bxs-star text-warning"></i>
                                                                    @endif
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
                    <h6 class="mb-3 text-uppercase">Recently Added</h6>
                    @foreach ($recently_added as $key => $item)
                    <div class="d-flex align-items-center">
                        <div class="bottom-product-img">
                            <a href="{{ url('product/details/'.$item->id.'/'.$item->product_slug) }}">
                                <img src="{{ asset($item->product_thumbnail) }}" width="100" alt="">
                            </a>
                        </div>
                        <div class="ms-2">
                            <h6 class="mb-0 fw-light mb-1"><a href="{{ url('product/details/'.$item->id.'/'.$item->product_slug) }}">{{ $item->product_name }}</a></h6>
                            @php
                            $average = App\Models\Review::where('product_id', $item->id)->where('status', 1)->avg('rating');
                            @endphp
                            <div class="rating font-12"> @if ($average == 0)
                                                <i class="bx bxs-star text-light-4"></i>
                                                    <i class="bx bxs-star text-light-4"></i>
                                                    <i class="bx bxs-star text-light-4"></i>
                                                    <i class="bx bxs-star text-light-4"></i>
                                                    <i class="bx bxs-star text-light-4"></i>
                                                @elseif ($average == 1 || $average < 2) <i class="bx bxs-star text-warning"></i>
                                                    <i class="bx bxs-star text-light-4"></i>
                                                    <i class="bx bxs-star text-light-4"></i>
                                                    <i class="bx bxs-star text-light-4"></i>
                                                    <i class="bx bxs-star text-light-4"></i>
                                                    @elseif ($average == 2 || $average < 3) <i class="bx bxs-star text-warning"></i>
                                                        <i class="bx bxs-star text-warning"></i>
                                                        <i class="bx bxs-star text-light-4"></i>
                                                        <i class="bx bxs-star text-light-4"></i>
                                                        <i class="bx bxs-star text-light-4"></i>
                                                        @elseif ($average == 3 || $average < 4) <i class="bx bxs-star text-warning"></i>
                                                            <i class="bx bxs-star text-warning"></i>
                                                            <i class="bx bxs-star text-warning"></i>
                                                            <i class="bx bxs-star text-light-4"></i>
                                                            <i class="bx bxs-star text-light-4"></i>
                                                            @elseif ($average == 4 || $average < 5) <i class="bx bxs-star text-warning"></i>
                                                                <i class="bx bxs-star text-warning"></i>
                                                                <i class="bx bxs-star text-warning"></i>
                                                                <i class="bx bxs-star text-warning"></i>
                                                                <i class="bx bxs-star text-light-4"></i>
                                                                @elseif ($average == 5 || $average < 5) <i class="bx bxs-star text-warning"></i>
                                                                    <i class="bx bxs-star text-warning"></i>
                                                                    <i class="bx bxs-star text-warning"></i>
                                                                    <i class="bx bxs-star text-warning"></i>
                                                                    <i class="bx bxs-star text-warning"></i>
                                                                    @endif
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
                    @if ($key != count($recently_added) - 1)
                    <hr />
                    @endif
                    @endforeach
                </div>
            </div>
            <div class="col">
                <div class="top-rated-products-list mb-3">
                    <h6 class="mb-3 text-uppercase">Special Deals</h6>
                    @foreach ($special_deals as $key => $item)
                    <div class="d-flex align-items-center">
                        <div class="bottom-product-img">
                            <a href="{{ url('product/details/'.$item->id.'/'.$item->product_slug) }}">
                                <img src="{{ asset($item->product_thumbnail) }}" width="100" alt="">
                            </a>
                        </div>
                        <div class="ms-2">
                            <h6 class="mb-0 fw-light mb-1"><a href="{{ url('product/details/'.$item->id.'/'.$item->product_slug) }}">{{ $item->product_name }}</a></h6>
                            @php
                            $average = App\Models\Review::where('product_id', $item->id)->where('status', 1)->avg('rating');
                            @endphp
                            <div class="rating font-12"> @if ($average == 0)
                                                <i class="bx bxs-star text-light-4"></i>
                                                    <i class="bx bxs-star text-light-4"></i>
                                                    <i class="bx bxs-star text-light-4"></i>
                                                    <i class="bx bxs-star text-light-4"></i>
                                                    <i class="bx bxs-star text-light-4"></i>
                                                @elseif ($average == 1 || $average < 2) <i class="bx bxs-star text-warning"></i>
                                                    <i class="bx bxs-star text-light-4"></i>
                                                    <i class="bx bxs-star text-light-4"></i>
                                                    <i class="bx bxs-star text-light-4"></i>
                                                    <i class="bx bxs-star text-light-4"></i>
                                                    @elseif ($average == 2 || $average < 3) <i class="bx bxs-star text-warning"></i>
                                                        <i class="bx bxs-star text-warning"></i>
                                                        <i class="bx bxs-star text-light-4"></i>
                                                        <i class="bx bxs-star text-light-4"></i>
                                                        <i class="bx bxs-star text-light-4"></i>
                                                        @elseif ($average == 3 || $average < 4) <i class="bx bxs-star text-warning"></i>
                                                            <i class="bx bxs-star text-warning"></i>
                                                            <i class="bx bxs-star text-warning"></i>
                                                            <i class="bx bxs-star text-light-4"></i>
                                                            <i class="bx bxs-star text-light-4"></i>
                                                            @elseif ($average == 4 || $average < 5) <i class="bx bxs-star text-warning"></i>
                                                                <i class="bx bxs-star text-warning"></i>
                                                                <i class="bx bxs-star text-warning"></i>
                                                                <i class="bx bxs-star text-warning"></i>
                                                                <i class="bx bxs-star text-light-4"></i>
                                                                @elseif ($average == 5 || $average < 5) <i class="bx bxs-star text-warning"></i>
                                                                    <i class="bx bxs-star text-warning"></i>
                                                                    <i class="bx bxs-star text-warning"></i>
                                                                    <i class="bx bxs-star text-warning"></i>
                                                                    <i class="bx bxs-star text-warning"></i>
                                                                    @endif
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
                    @if ($key != count($special_deals) - 1)
                    <hr />
                    @endif
                    @endforeach

                </div>
            </div>
        </div>
        <!--end row-->
    </div>
</section>
<!--end bottom products section-->