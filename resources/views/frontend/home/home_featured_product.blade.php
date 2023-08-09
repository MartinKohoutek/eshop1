<!--start Featured product-->
<section class="py-4">
    <div class="container">
        <div class="d-flex align-items-center">
            <h5 class="text-uppercase mb-0">FEATURED PRODUCTS</h5>
            <a href="javascript:;" class="btn btn-light ms-auto rounded-0">More Products<i class='bx bx-chevron-right'></i></a>
        </div>
        <hr />
        @php
        $products = App\Models\Product::where('status', 1)->orderBy('id', 'ASC')->limit(8)->get();
        @endphp
        <div class="product-grid">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
                @foreach ($products as $product)
                @php
                $amount = $product->selling_price - $product->discount_price;
                $discount = round(($amount/$product->selling_price) * 100);
                @endphp
                <div class="col">
                    <div class="card rounded-0 product-card">
                        <div class="card-header bg-transparent border-bottom-0">
                            <div class="d-flex align-items-center justify-content-end gap-3">
                                
                                <a href="javascript:;">
                                    <div class="product-compare"><span><i class='bx bx-git-compare'></i> Compare</span>
                                    </div>
                                </a>
                                <a href="javascript:;">
                                    <div class="product-wishlist"> <i class='bx bx-heart'></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <a href="product-details.html" style="position: relative;">
                            <img src="{{ asset($product->product_thumbnail) }}" class="card-img-top" alt="..." >
                            @if ($product->discount_price)
                            <span class="badge bg-success" style="font-size: 15px; position:absolute; left: 5px; top: 5px;">Discount {{ $discount }}%</span>
                            @endif
                        </a>
                        <div class="card-body">
                            <div class="product-info">
                                <a href="javascript:;">
                                    <p class="product-catergory font-13 mb-1">{{ $product->category_id }}</p>
                                </a>
                                <a href="javascript:;">
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
                                        <a href="javascript:;" class="btn btn-light btn-ecomm"> <i class='bx bxs-cart-add'></i>Add to Cart</a> <a href="javascript:;" class="btn btn-link btn-ecomm" data-bs-toggle="modal" data-bs-target="#QuickViewProduct"><i class='bx bx-zoom-in'></i>Quick View</a>
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
    </div>
</section>
<!--end Featured product-->