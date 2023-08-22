@extends('frontend.master_dashboard')
@section('home')
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
                <table class="table table-bordered align-middle">
                    <thead>
                        <tr>
                            <th class="align-middle text-center">
                                <p class="mb-0 text-uppercase fs-3 fw-light text-white">Product
                                    <br>Photo
                                </p>
                            </th>
                            <th class="align-middle text-center">
                                <img src="assets/images/products/22.png" alt="" width="230">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Price</td>
                            <td>$349.00</td>
                        </tr>
                        <tr>
                            <td>Model</td>
                            <td>iPhone 8</td>
                        </tr>
                        <tr>
                            <td>Brand</td>
                            <td>Apple</td>
                        </tr>
                        <tr>
                            <td>Rating</td>
                            <td>4.8 <i class='bx bx-star'></i>
                            </td>
                        </tr>
                        <tr>
                            <td>Summary</td>
                            <td>There are many variations of passages of Lorem Ipsum available,
                                <br>but the majority have suffered alteration in some form, by injected
                            </td>
                        </tr>
                        <tr>
                            <td>Memory</td>
                            <td>64 GB - 256 GB</td>
                        </tr>
                        <tr>
                            <td>Num of Cores</td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <td>RAM</td>
                            <td>8 GB</td>
                        </tr>
                        <tr>
                            <td>System</td>
                            <td>iOS 12</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td> <a href="javascript:;" class="btn btn-white btn-ecomm">Add to Cart</a>
                                <a href="javascript:;" class="btn btn-light btn-ecomm">Remove</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!--end shop cart-->
</div>
@endsection