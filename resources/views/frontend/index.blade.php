@extends('frontend.master_dashboard')
@section('home')
<div class="page-content">
    @include('frontend.home.home_information')
    @include('frontend.home.home_promotion')
    @include('frontend.home.home_featured_product')
    @include('frontend.home.home_new_arrivals')
    
    @include('frontend.home.home_categories')
    @include('frontend.home.home_support_info')
    @include('frontend.home.home_news')
    @include('frontend.home.home_brands')
    @include('frontend.home.home_bottom_products')
</div>
@endsection