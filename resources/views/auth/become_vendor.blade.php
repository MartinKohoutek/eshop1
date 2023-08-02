<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset('frontend/assets/images/favicon-32x32.png') }}" type="image/png" />
    <!--plugins-->
    <link href="{{ asset('frontend/assets/plugins/OwlCarousel/css/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/assets/plugins/nouislider/nouislider.min.css') }}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{ asset('frontend/assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('frontend/assets/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('frontend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/icons.css') }}" rel="stylesheet">
    <title>MKShop - Become a Vendor</title>
</head>

<body class="bg-theme bg-theme1"> <b class="screen-overlay"></b>
    <!--wrapper-->
    <div class="wrapper">
        @include('frontend.body.header')
        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                <!--start breadcrumb-->
                <section class="py-3 border-bottom d-none d-md-flex">
                    <div class="container">
                        <div class="page-breadcrumb d-flex align-items-center">
                            <h3 class="breadcrumb-title pe-3">Sign Up</h3>
                            <div class="ms-auto">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb mb-0 p-0">
                                        <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="bx bx-home-alt"></i> Home</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">Sign Up</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </section>
                <!--end breadcrumb-->
                <!--start shop cart-->
                <section class="py-0 py-lg-5">
                    <div class="container">
                        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0" style="min-height: 100vh; height: auto">
                            <div class="row row-cols-1 row-cols-lg-1 row-cols-xl-2">
                                <div class="col mx-auto">
                                    <div class="card mb-0">
                                        <div class="card-body">
                                            <div class="border p-4 rounded">
                                                <div class="text-center">
                                                    <h3 class="">Become a Vendor</h3>
                                                    <p>Already have an vendor account? <a href="{{ route('vendor.login') }}">Sign in here</a>
                                                    </p>
                                                </div>
                                                <div class="form-body">
                                                    <form class="row g-3" method="post" action="{{ route('vendor.register') }}">
                                                        @csrf
                                                        <div class="col-12">
                                                            <label for="name" class="form-label">Shop Name</label>
                                                            <input type="text" name="name" class="form-control" id="name" placeholder="Jhon">
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="username" class="form-label">User Name</label>
                                                            <input type="text" name="username" class="form-control" id="username" placeholder="Jhon">
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="email" class="form-label">Email Address</label>
                                                            <input type="email" name="email" class="form-control" id="email" placeholder="example@user.com">
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="phone" class="form-label">Phone</label>
                                                            <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone">
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="phone" class="form-label">Join Date</label>
                                                            <select name="vendor_join" class="form-select mb-3" aria-label="Default select example">
                                                                <option selected="">Open this select Join Date</option>
                                                                <option value="2022">2022</option>
                                                                <option value="2023">2023</option>
                                                                <option value="2024">2024</option>
                                                                <option value="2025">2025</option>
                                                                <option value="2026">2026</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="password" class="form-label">Password</label>
                                                            <div class="input-group" id="show_hide_password">
                                                                <input type="password" name="password" class="form-control border-end-0" id="password" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                                                            <div class="input-group" id="show_hide_password">
                                                                <input type="password" name="password_confirmation" class="form-control border-end-0" id="password_confirmation" placeholder="Confirm Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                                                <label class="form-check-label" for="flexSwitchCheckChecked">I read and agree to Terms & Conditions</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="d-grid">
                                                                <button type="submit" class="btn btn-light"><i class='bx bx-user'></i>Submit & Register</button>
                                                            </div>
                                                        </div>
                                                    </form>
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
        </div>
        <!--end page wrapper -->
        @include('frontend.body.footer')
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
    </div>
    <!--end wrapper-->

    <!-- Bootstrap JS -->
    <script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/plugins/OwlCarousel/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/plugins/OwlCarousel/js/owl.carousel2.thumbs.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <!--app JS-->
    <script src="{{ asset('frontend/assets/js/app.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/show-hide-password.js') }}"></script>
</body>

</html>