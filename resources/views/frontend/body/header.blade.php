<!--start top header wrapper-->
<div class="header-wrapper bg-dark-1">
    <div class="top-menu border-bottom">
        <div class="container">
            <nav class="navbar navbar-expand">
                <div class="shiping-title text-uppercase font-13 text-white d-none d-sm-flex">Welcome to our eTrans store!</div>
                <ul class="navbar-nav ms-auto d-none d-lg-flex">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('view.about.us') }}">About</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('shop.page') }}">Our Store</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('home.blog') }}">Blog</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('view.contact') }}">Contact</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                </ul>
                @php
                    $siteSettings = App\Models\SiteSetting::find(1);
                @endphp
                <ul class="navbar-nav social-link ms-lg-2 ms-auto">
                    @if ($siteSettings->facebook != null)
                    <li class="nav-item"> <a class="nav-link" href="{{ url($siteSettings->facebook) }}"><i class='bx bxl-facebook'></i></a>
                    </li>
                    @endif
                    @if ($siteSettings->twitter != null)
                    <li class="nav-item"> <a class="nav-link" href="{{ url($siteSettings->twitter) }}"><i class='bx bxl-twitter'></i></a>
                    </li>
                    @endif
                    @if ($siteSettings->instagram != null)
                    <li class="nav-item"> <a class="nav-link" href="{{ url($siteSettings->instagram) }}"><i class='bx bxl-instagram'></i></a>
                    </li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
    @php
    $settings = App\Models\SiteSetting::find(1);
    @endphp
    <div class="header-content pb-3 pb-md-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col col-md-auto">
                    <div class="d-flex align-items-center">
                        <div class="mobile-toggle-menu d-lg-none px-lg-2" data-trigger="#navbar_main"><i class='bx bx-menu'></i>
                        </div>
                        <div class="logo d-none d-lg-flex">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset($settings->logo) }}" class="logo-icon" alt="" />
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md order-4 order-md-2 searchbox" style="position: relative;">
                    <form action="{{ route('product.search') }}" method="post">
                        @csrf
                        <div class="input-group flex-nowrap px-xl-4">
                            <input onfocus="search_result_show()" onblur="search_result_hide()" type="text" name="search" id="search" class="form-control w-100" placeholder="Search for Products">
                            <span class="input-group-text cursor-pointer"><i class='bx bx-search'></i></span>
                        </div>
                        <div id="searchProducts"></div>
                    </form>
                </div>
                <div class="col col-md-auto order-3 d-none d-xl-flex align-items-center">
                    <div class="fs-1 text-white"><i class='bx bx-headphone'></i>
                    </div>
                    <div class="ms-2">
                        <p class="mb-0 font-13">CALL US NOW</p>
                        <h5 class="mb-0">{{ $settings->support_phone }}</h5>
                    </div>
                </div>
                <div class="col col-md-auto order-2 order-md-4">
                    <div class="top-cart-icons">
                        <nav class="navbar navbar-expand">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item"><a href="{{ route('compare') }}" class="nav-link cart-link position-relative"><span class="alert-count" id="compareCount">0</span><i class='bx bx-git-compare'></i><span></span></a>
                                </li>
                                <li class="nav-item"><a href="{{ route('wishlist') }}" class="nav-link cart-link position-relative"><span class="alert-count" id="wishlistCount">0</span><i class='bx bx-heart'></i></a>
                                </li>
                                <li class="nav-item dropdown dropdown-large">
                                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative cart-link" data-bs-toggle="dropdown"> <span class="alert-count" id="cartQty2">0</span>
                                        <i class='bx bx-shopping-bag'></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="{{ route('mycart') }}">
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
                                <div class="col-md-4">
                                    <!-- <h6 class="large-menu-title"> </h6> -->
                                    <ul class="">
                                        @foreach ($categories as $cat)
                                        @if ($loop->index < 5)
                                        <li><a href="{{ url('product/category/'.$cat->id.'/'.$cat->category_slug) }}"><img src="{{ asset($cat->category_image) }}" alt="" style="width: 30px; height: 30px"> {{ $cat->category_name }}</a>
                                        </li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="col-md-4">
                                    <!-- <h6 class="large-menu-title">Electronics</h6> -->
                                    <ul class="">
                                        @foreach ($categories as $cat)
                                        @if ($loop->index >= 5)
                                        <li><a href="{{ url('product/category/'.$cat->id.'/'.$cat->category_slug) }}"><img src="{{ asset($cat->category_image) }}" alt="" style="width: 30px; height: 30px"> {{ $cat->category_name }}</a>
                                        </li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="col-md-4">
                                    <div class="pramotion-banner1">
                                        <img src="{{ asset('frontend/assets/images/gallery/menu-img.jpg') }}" class="img-fluid" alt="" />
                                    </div>
                                </div>

                            </div>

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

                    <li class="nav-item"> <a class="nav-link" href="{{ route('home.blog') }}">Blog </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('view.about.us') }}">About Us </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('view.contact') }}">Contact Us </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('shop.page') }}">Our Store</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                @auth
                <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">My Account <i class='bx bx-chevron-down'></i></a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('user.details') }}">User Details</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('user.change.password') }}">Change Password</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('user.orders') }}">Orders</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('user.track.order') }}">Track Your Order</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('return.order.page') }}">Returned Orders</a>
                        </li>
                        <div class="dropdown-divider"></div>
                        <li><a class="dropdown-item" href="{{ route('user.logout') }}">Logout</a>
                        </li>
                    </ul>
                </li>
                @else
                <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a>
                </li>
                <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a>
                </li>
                @endauth
                </ul>
            </nav>
        </div>
    </div>
</div>
<!--end top header wrapper-->
<style>
    #searchProducts {
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        background: #fff;
        z-index: 999;
        border-radius: 8px;
        margin-top: 5px;
    }
</style>
<script>
    function search_result_show() {
        $('#searchProducts').slideDown();
    }

    function search_result_hide() {
        $('#searchProducts').slideUp();
    }
</script>