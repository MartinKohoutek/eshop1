@extends('frontend.master_dashboard')
@section('home')
@section('title')
ABCShop | About Us
@endsection
<div class="page-content">
    <!--start breadcrumb-->
    <section class="py-3 border-bottom d-none d-md-flex">
        <div class="container">
            <div class="page-breadcrumb d-flex align-items-center">
                <h3 class="breadcrumb-title pe-3">About Us</h3>
                <div class="ms-auto">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="bx bx-home-alt"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">About Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!--end breadcrumb-->
    <!--start page content-->
    <section class="py-0 py-lg-4">
        <div class="container">
            <h4>Our Story</h4>
            {!! $about->description !!}
        </div>
    </section>
    <section class="py-4">
        <div class="container">
            <h4>Why Choose Us</h4>
            <hr>
            <div class="row row-cols-1 row-cols-lg-3">
                @foreach ($choose as $item)
                <div class="col d-flex">
                    <div class="card rounded-0 shadow-none w-100">
                        <div class="card-body">
                            <i class="{{ $item->icon }}" style="font-size: 60px; color: white"></i>
                            <h5 class="mb-3">{{ $item->title }}</h5>
                            <p class="mb-0">{!! $item->long_description !!}</p>
                        </div>
                    </div>
                </div>
                @endforeach               
            </div>
            <!--end row-->
        </div>
    </section>
    <section class="py-4">
        <div class="container">
            <h4>Our Top Brands</h4>
            <hr>
            <div class="row row-cols-2 row-cols-sm-2 row-cols-md-4 row-cols-xl-5">
                @foreach ($brands as $brand)
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <a href="javscript:;">
                                <img src="{{ asset($brand->brand_image) }}" class="img-fluid" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--end start page content-->
</div>
@endsection