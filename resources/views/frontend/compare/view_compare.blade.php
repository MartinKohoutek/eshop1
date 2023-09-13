@extends('frontend.master_dashboard')
@section('home')

@section('title')
    MKShop - Compare Products
@endsection
<div class="page-content">
    <!--start breadcrumb-->
    <section class="py-3 border-bottom d-none d-md-flex">
        <div class="container">
            <div class="page-breadcrumb d-flex align-items-center">
                <h3 class="breadcrumb-title pe-3">Product comparison</h3>
                <div class="ms-auto">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Product comparison</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!--end breadcrumb-->
    <!--start shop cart-->
    <section class="py-4">
        <div class="container">
            <h3 class="d-none">Product Table</h3>
            <div class="table-responsive">
                <table class="table table-bordered align-middle" style="table-layout: fixed;">
                    <thead id="heads">
                        
                    </thead>
                    <tbody id="compare">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!--end shop cart-->
</div>
@endsection