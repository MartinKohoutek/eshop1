<!--start Featured product-->
<style>
    .nav-tabs {
        border-bottom: 0;
    }
</style>
<section class="py-4">
    <div class="container">
        @php
        $products = App\Models\Product::where('status', 1)->orderBy('id', 'ASC')->limit(3)->get();
        $categories = App\Models\Category::OrderBy('category_name', 'ASC')->get();
        @endphp
        <div class="d-flex align-items-center">
            <h5 class="text-uppercase mb-0">FEATURED PRODUCTS</h5>
            <div class="d-flex ms-auto">
                <ul class="nav nav-tabs links" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one" aria-selected="true" style="background-color:transparent;">All</button>
                    </li>

                    @foreach ($categories as $cat)

                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="nav-tab-two" data-bs-toggle="tab" href="#category{{ $cat->id }}" type="button" role="tab" aria-controls="tab-two" aria-selected="false" style="background-color:transparent;">{{ $cat->category_name }}</a>
                    </li>
                    @endforeach
                </ul>
                <!-- <a href="javascript:;" class="btn btn-light ms-auto rounded-0">More Products<i class='bx bx-chevron-right'></i></a> -->
            </div>
        </div>
        <hr />

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
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
                                <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}"" style="position: relative;">
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
                                        <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}"">
                                            <h6 class="product-name mb-2">{{ $product->product_name }}</h6>
                                        </a>
                                        <div>
                                            @if ($product->vendor_id == NULL)
                                            <span class="font-small text-muted">By <a href="">Owner</a></span>
                                            @endif
                                            <span class="font-small text-muted">By <a href="">{{ $product['vendor']['name'] }}</a></span>
                                        </div>
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


            @foreach ($categories as $category)
            <div class="tab-pane fade" id="category{{ $category->id }}" role="tabpanel" aria-labelledby="tab-two"> 
                <div class="product-grid">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
                        @php
                        $catProducts = App\Models\Product::where('category_id', $category->id)->orderBy('id', 'DESC')->get();
                        @endphp

                        @forelse ($catProducts as $product)
                        <div class="col">
                            @php
                            $amount = $product->selling_price - $product->discount_price;
                            $discount = round(($amount/$product->selling_price) * 100);
                            @endphp
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
                                <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}" style="position: relative;">
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
                                        <div>
                                            @if ($product->vendor_id == NULL)
                                            <span class="font-small text-muted">By <a href="">Owner</a></span>
                                            @endif
                                            <span class="font-small text-muted">By <a href="">{{ $product['vendor']['name'] }}</a></span>
                                        </div>
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

                        @empty
                        <h5 class="text-danger">No Product Found</h5>
                        @endforelse
                    </div>
                    <!--end row-->
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--end Featured product-->