<!--start New Arrivals-->
@php
$featured = App\Models\Product::where('featured', 1)->orderBy('id', 'DESC')->limit(5)->get();
@endphp
<section class="py-4">
    <div class="container">
        <div class="d-flex align-items-center">
            <h5 class="text-uppercase mb-0">New Arrivals</h5>
            <a href="{{ url('/product/new/arrivals') }}" class="btn btn-light ms-auto rounded-0">View All<i class='bx bx-chevron-right'></i></a>
        </div>
        <hr />
        <div class="product-grid">
            <div class="new-arrivals owl-carousel owl-theme">
                @foreach ($featured as $item)
                <div class="item">
                    <div class="card rounded-0 product-card">
                        <div class="card-header bg-transparent border-bottom-0">
                            <div class="d-flex align-items-center justify-content-end">
                                <a id="{{ $item->id }}" onclick="addToCompare(this.id)">
                                    <div class="product-compare"><span><i class='bx bx-git-compare'></i> Compare</span>
                                    </div>
                                </a>
                                <a id="{{ $item->id }}" onclick="addToWishlist(this.id)">
                                    <div class="product-wishlist"> <i class='bx bx-heart'></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @php
                        $amount = $item->selling_price - $item->discount_price;
                        $discount = round(($amount/$item->selling_price) * 100);
                        @endphp
                        <a href="{{ url('product/details/'.$item->id.'/'.$item->product_slug) }}">
                            <img src="{{ asset($item->product_thumbnail) }}" class="card-img-top" alt="...">
                            @if ($item->discount_price)
                            <span class="badge bg-primary" style="font-size: 15px; position:absolute; left: 5px; top: 5px;">- {{ $discount }} %</span>
                            @else
                            <span class="badge bg-success" style="font-size: 15px; position:absolute; left: 5px; top: 5px;">New</span>
                            @endif
                        </a>
                        <div class="card-body">
                            <div class="product-info">
                                <a href="javascript:;">
                                    <p class="product-catergory font-13 mb-1">{{ $item['category']['category_name'] }}</p>
                                </a>
                                <a href="{{ url('product/details/'.$item->id.'/'.$item->product_slug) }}s">
                                    <h6 class="product-name mb-2">{{ $item->product_name }}</h6>
                                </a>
                                <div class="d-flex align-items-center">
                                    <div class="mb-1 product-price">
                                        @if ($item->discount_price)
                                        <span class="me-1 text-decoration-line-through">${{ $item->selling_price }}</span>
                                        <span class="text-white fs-5">${{ $item->discount_price }}</span>
                                        @else
                                        <span class="text-white fs-5">${{ $item->selling_price }}</span>
                                        @endif
                                    </div>
                                    @php
                                    $average = App\Models\Review::where('product_id', $item->id)->where('status', 1)->avg('rating');
                                    @endphp
                                    <div class="cursor-pointer ms-auto"> <span>{{ $average == NULL ? '0.0' : number_format($average, 1) }}</span> <i class="bx bxs-star text-white"></i>
                                    </div>
                                </div>
                                <div class="product-action mt-2">
                                    <div class="d-grid gap-2">
                                        <a href="javascript:;" class="btn btn-light btn-ecomm"> <i class='bx bxs-cart-add'></i>Add to Cart</a>
                                        <a href="javascript:;" class="btn btn-link btn-ecomm" data-bs-toggle="modal" data-bs-target="#QuickViewProduct" id="{{ $item->id }}" onclick="productView(this.id)"><i class='bx bx-zoom-in'></i>Quick View</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!--end New Arrivals-->