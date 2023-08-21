<!--start top header wrapper-->
<div class="header-wrapper bg-dark-1">
    <div class="top-menu border-bottom">
        <div class="container">
            <nav class="navbar navbar-expand">
                <div class="shiping-title text-uppercase font-13 text-white d-none d-sm-flex">Welcome to our eTrans store!</div>
                <ul class="navbar-nav ms-auto d-none d-lg-flex">
                    <li class="nav-item"> <a class="nav-link" href="order-tracking.html">Track Order</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="about-us.html">About</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="shop-categories.html">Our Stores</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="blog.html">Blog</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="contact-us.html">Contact</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="javascript:;">Help & FAQs</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">USD</a>
                        <ul class="dropdown-menu dropdown-menu-lg-end">
                            <li><a class="dropdown-item" href="#">USD</a>
                            </li>
                            <li><a class="dropdown-item" href="#">EUR</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                            <div class="lang d-flex gap-1">
                                <div><i class="flag-icon flag-icon-um"></i>
                                </div>
                                <div><span>ENG</span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg-end">
                            <a class="dropdown-item d-flex allign-items-center" href="javascript:;"> <i class="flag-icon flag-icon-de me-2"></i><span>German</span>
                            </a> <a class="dropdown-item d-flex allign-items-center" href="javascript:;"><i class="flag-icon flag-icon-fr me-2"></i><span>French</span></a>
                            <a class="dropdown-item d-flex allign-items-center" href="javascript:;"><i class="flag-icon flag-icon-um me-2"></i><span>English</span></a>
                            <a class="dropdown-item d-flex allign-items-center" href="javascript:;"><i class="flag-icon flag-icon-in me-2"></i><span>Hindi</span></a>
                            <a class="dropdown-item d-flex allign-items-center" href="javascript:;"><i class="flag-icon flag-icon-cn me-2"></i><span>Chinese</span></a>
                            <a class="dropdown-item d-flex allign-items-center" href="javascript:;"><i class="flag-icon flag-icon-ae me-2"></i><span>Arabic</span></a>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav social-link ms-lg-2 ms-auto">
                    <li class="nav-item"> <a class="nav-link" href="javascript:;"><i class='bx bxl-facebook'></i></a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="javascript:;"><i class='bx bxl-twitter'></i></a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="javascript:;"><i class='bx bxl-linkedin'></i></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="header-content pb-3 pb-md-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col col-md-auto">
                    <div class="d-flex align-items-center">
                        <div class="mobile-toggle-menu d-lg-none px-lg-2" data-trigger="#navbar_main"><i class='bx bx-menu'></i>
                        </div>
                        <div class="logo d-none d-lg-flex">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('frontend/assets/images/logo-icon.png') }}" class="logo-icon" alt="" />
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md order-4 order-md-2">
                    <div class="input-group flex-nowrap px-xl-4">
                        <input type="text" class="form-control w-100" placeholder="Search for Products">
                        <select class="form-select flex-shrink-0" aria-label="Default select example" style="width: 10.5rem;">
                            <option selected>All Categories</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select> <span class="input-group-text cursor-pointer"><i class='bx bx-search'></i></span>
                    </div>
                </div>
                <div class="col col-md-auto order-3 d-none d-xl-flex align-items-center">
                    <div class="fs-1 text-white"><i class='bx bx-headphone'></i>
                    </div>
                    <div class="ms-2">
                        <p class="mb-0 font-13">CALL US NOW</p>
                        <h5 class="mb-0">+011 5827918</h5>
                    </div>
                </div>
                <div class="col col-md-auto order-2 order-md-4">
                    <div class="top-cart-icons">
                        <nav class="navbar navbar-expand">
                            <ul class="navbar-nav ms-auto">
                                @auth
                                <li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link cart-link"><i class='bx bx-user'></i> Account</a>
                                </li>
                                @else
                                <li class="nav-item"><a href="{{ route('login') }}" class="nav-link cart-link"><i class='bx bx-user'></i> Login</a>
                                </li>
                                <span style="margin: 2px, 0; font-size: 35px"> | </span>
                                <li class="nav-item"><a href="{{ route('register') }}" class="nav-link cart-link"><i class='bx bx-user'></i> Register</a>
                                </li>
                                @endauth
                                <li class="nav-item"><a href="{{ route('wishlist') }}" class="nav-link cart-link"><i class='bx bx-heart'></i><span id="wishlistCount"></span></a>
                                </li>
                                <li class="nav-item dropdown dropdown-large">
                                    <a href="#" class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative cart-link" data-bs-toggle="dropdown"> <span class="alert-count" id="cartQty2">8</span>
                                        <i class='bx bx-shopping-bag'></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="javascript:;">
                                            <div class="cart-header">
                                                <p class="cart-header-title mb-0" id="cartQty">8 ITEMS</p>
                                                <p class="cart-header-clear ms-auto mb-0">VIEW CART</p>
                                            </div>
                                        </a>
                                        <div class="cart-list" id="miniCart">
                                            <!-- MINI CART -->
                                        </div>
                                        <a href="javascript:;">
                                            <div class="text-center cart-footer d-flex align-items-center">
                                                <h5 class="mb-0">TOTAL</h5>
                                                <h5 class="mb-0 ms-auto" id="cartTotal">$189.00</h5>
                                            </div>
                                        </a>
                                        <div class="d-grid p-3 border-top"> <a href="javascript:;" class="btn btn-light btn-ecomm">CHECKOUT</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>
    @php
    $categories = App\Models\Category::orderBy('category_name', 'ASC')->get();
    @endphp
    <div class="primary-menu border-top">
        <div class="container">
            <nav id="navbar_main" class="mobile-offcanvas navbar navbar-expand-lg">
                <div class="offcanvas-header">
                    <button class="btn-close float-end"></button>
                    <h5 class="py-2 text-white">Navigation</h5>
                </div>
                <ul class="navbar-nav">
                    <li class="nav-item active"> <a class="nav-link" href="{{ url('/') }}">Home </a>
                    </li>
                    <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">Categories <i class='bx bx-chevron-down'></i></a>
                        <div class="dropdown-menu dropdown-large-menu">
                            <div class="row">
                                @foreach ($categories as $cat)
                                <div class="col-md-4">

                                    <h6 class="large-menu-title">{{ $cat->category_name }} <img src="{{ asset($cat->category_image) }}" alt="" style="width: 30px; height: 30px"></h6>

                                    <ul class="">
                                        <!-- <li><a href="#">Casual T-Shirts</a>
                                        </li>
                                        <li><a href="#">Formal Shirts</a> -->
                                    </ul>
                                </div>
                                @endforeach
                                <!-- end col-3 -->
                                <!-- <div class="col-md-4">
                                    <h6 class="large-menu-title">Electronics</h6>
                                    <ul class="">
                                        <li><a href="#">Mobiles</a>
                                        </li>
                                        <li><a href="#">Laptops</a>
                                        </li>
                                        <li><a href="#">Macbook</a>
                                        </li>
                                        <li><a href="#">Televisions</a>
                                        </li>
                                        <li><a href="#">Lighting</a>
                                        </li>
                                        <li><a href="#">Smart Watch</a>
                                        </li>
                                        <li><a href="#">Galaxy Phones</a>
                                        </li>
                                        <li><a href="#">PC Monitors</a>
                                        </li>
                                    </ul>
                                </div> -->
                                <!-- end col-3 -->
                                <!-- <div class="col-md-4">
                                    <div class="pramotion-banner1">
                                        <img src="{{ asset('frontend/assets/images/gallery/menu-img.jpg') }}" class="img-fluid" alt="" />
                                    </div>
                                </div> -->
                                <!-- end col-3 -->
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- dropdown-large.// -->
                    </li>

                    @php
                    $categories = App\Models\Category::orderBy('category_name', 'ASC')->limit(5)->get();
                    @endphp

                    @foreach ($categories as $cat)
                    <li class="nav-item dropdown"> 
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="{{ url('product/category/'.$cat->id.'/'.$cat->category_slug) }}" data-bs-toggle="dropdown" data-bs-target="#cat{{$cat->id}}" role="button" aria-expanded="false">{{ $cat->category_name}} <i class='bx bx-chevron-down'></i></a>
                        <ul class="dropdown-menu" aria-labelledby="cat{{$cat->id}}">
                            @php
                            $subcategories = App\Models\SubCategory::where('category_id', $cat->id)->orderBy('subcategory_name', 'ASC')->limit(6)->get();
                            @endphp
                            @foreach ($subcategories as $subcat)
                            <li><a class="dropdown-item" href="{{ url('product/subcategory/'.$subcat->id.'/'.$subcat->subcategory_slug) }}">{{ $subcat->subcategory_name}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    @endforeach

                    <li class="nav-item"> <a class="nav-link" href="blog.html">Blog </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="about-us.html">About Us </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="contact-us.html">Contact Us </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="shop-categories.html">Our Store</a>
                    </li>
                    <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">My Account <i class='bx bx-chevron-down'></i></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="account-dashboard.html">Dashboard</a>
                            </li>
                            <li><a class="dropdown-item" href="account-downloads.html">Downloads</a>
                            </li>
                            <li><a class="dropdown-item" href="account-orders.html">Orders</a>
                            </li>
                            <li><a class="dropdown-item" href="account-payment-methods.html">Payment Methods</a>
                            </li>
                            <li><a class="dropdown-item" href="account-user-details.html">User Details</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<!--end top header wrapper-->