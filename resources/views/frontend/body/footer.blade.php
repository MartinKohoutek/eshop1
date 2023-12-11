<!--start footer section-->
<footer>
    @php
        $settings = App\Models\SiteSetting::find(1);
    @endphp
    <section class="py-4 bg-dark-1">
        <div class="container">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4">
                <div class="col">
                    <div class="footer-section1 mb-3">
                        <h6 class="mb-3 text-uppercase">Contact Info</h6>
                        <div class="address mb-3">
                            <p class="mb-0 text-uppercase text-white">Address</p>
                            <p class="mb-0 font-12">{{ $settings->company_address }}</p>
                        </div>
                        <div class="phone mb-3">
                            <p class="mb-0 text-uppercase text-white">Phone</p>
                            <p class="mb-0 font-13">Toll Free : {{ $settings->support_phone }}</p>
                            <p class="mb-0 font-13">Mobile : {{ $settings->phone_one }}</p>
                        </div>
                        <div class="email mb-3">
                            <p class="mb-0 text-uppercase text-white">Email</p>
                            <p class="mb-0 font-13">{{ $settings->email }}</p>
                        </div>
                        <div class="working-days mb-3">
                            <p class="mb-0 text-uppercase text-white">WORKING DAYS</p>
                            <p class="mb-0 font-13">{{ $settings->working_days }}</p>
                        </div>
                        <div class="working-days mb-3">
                            <p class="mb-0 text-uppercase text-white"><a href="">Vendor</a></p>
                            <p class="mb-0 font-13"><a href="{{ route('become.vendor') }}">Become a Vendor</a></p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    @php
                        $categories = App\Models\Category::withCount('products')->orderBy('products_count', 'DESC')->get();
                    @endphp
                    <div class="footer-section2 mb-3">
                        <h6 class="mb-3 text-uppercase">Shop Categories</h6>
                        <ul class="list-unstyled">
                            @foreach ($categories as $category)    
                            @if ($category->products_count > 0)
                            <li class="mb-1"><a href="{{ url('/product/category/'.$category->id.'/'.$category->category_slug) }}"><i class='bx bx-chevron-right'></i> {{ $category->category_name }} {{ $category->products_count }}</a>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col">
                    <div class="footer-section3 mb-3">
                        <h6 class="mb-3 text-uppercase">Popular Tags</h6>
                        <div class="tags-box"> <a href="javascript:;" class="tag-link">Cloths</a>
                            <a href="javascript:;" class="tag-link">Electronis</a>
                            <a href="javascript:;" class="tag-link">Furniture</a>
                            <a href="javascript:;" class="tag-link">Sports</a>
                            <a href="javascript:;" class="tag-link">Men Wear</a>
                            <a href="javascript:;" class="tag-link">Women Wear</a>
                            <a href="javascript:;" class="tag-link">Laptops</a>
                            <a href="javascript:;" class="tag-link">Formal Shirts</a>
                            <a href="javascript:;" class="tag-link">Topwear</a>
                            <a href="javascript:;" class="tag-link">Headphones</a>
                            <a href="javascript:;" class="tag-link">Bottom Wear</a>
                            <a href="javascript:;" class="tag-link">Bags</a>
                            <a href="javascript:;" class="tag-link">Sofa</a>
                            <a href="javascript:;" class="tag-link">Shoes</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="footer-section4 mb-3">
                        <h6 class="mb-3 text-uppercase">Stay informed</h6>
                        <div class="subscribe">
                            <input type="text" class="form-control radius-30" placeholder="Enter Your Email" />
                            <div class="mt-2 d-grid"> <a href="javascript:;" class="btn btn-white btn-ecomm radius-30">Subscribe</a>
                            </div>
                            <p class="mt-2 mb-0 font-13">Subscribe to our newsletter to receive early discount offers, updates and new products info.</p>
                        </div>
                        <div class="download-app mt-3">
                            <h6 class="mb-3 text-uppercase">Download our app</h6>
                            <div class="d-flex align-items-center gap-2">
                                <a href="javascript:;">
                                    <img src="{{ asset('frontend/assets/images/icons/apple-store.png') }}" class="" width="160" alt="" />
                                </a>
                                <a href="javascript:;">
                                    <img src="{{ asset('frontend/assets/images/icons/play-store.png') }}" class="" width="160" alt="" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
            <hr />
            <div class="row row-cols-1 row-cols-md-2 align-items-center">
                <div class="col">
                    <p class="mb-0">{{ $settings->copyright }}</p>
                </div>
                <div class="col text-end">
                    <div class="payment-icon">
                        <div class="row row-cols-auto g-2 justify-content-end">
                            <div class="col">
                                <img src="{{ asset('frontend/assets/images/icons/visa.png') }}" alt="" />
                            </div>
                            <div class="col">
                                <img src="{{ asset('frontend/assets/images/icons/paypal.png') }}" alt="" />
                            </div>
                            <div class="col">
                                <img src="{{ asset('frontend/assets/images/icons/mastercard.png') }}" alt="" />
                            </div>
                            <div class="col">
                                <img src="{{ asset('frontend/assets/images/icons/american-express.png') }}" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </section>
</footer>
<!--end footer section-->