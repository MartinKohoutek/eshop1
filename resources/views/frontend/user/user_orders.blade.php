@extends('dashboard')
@section('user')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="page-content">
    <!--start breadcrumb-->
    <section class="py-3 border-bottom d-none d-md-flex">
        <div class="container">
            <div class="page-breadcrumb d-flex align-items-center">
                <h3 class="breadcrumb-title pe-3">My Orders</h3>
                <div class="ms-auto">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="javascript:;">Account</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">My Orders</li>
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
            <h3 class="d-none">Account</h3>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card shadow-none mb-3 mb-lg-0">
                                @include('frontend.user.body.sidebar')
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card shadow-none mb-0">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Date</th>
                                                    <th>Total</th>
                                                    <th>Payment</th>
                                                    <th>Invoice</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($orders as $key => $order)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $order->order_date }}</td>
                                                    <td>${{ $order->amount }}</td>
                                                    <td>{{ $order->payment_method }}</td>
                                                    <td>{{ $order->invoice_no }}</td>
                                                    <td>
                                                        @if ($order->status == 'pending')
                                                        <div class="badge rounded-pill bg-warning w-100">Pending</div>
                                                        @elseif ($order->status == 'confirmed')
                                                        <div class="badge rounded-pill bg-info w-100">Confirmed</div>
                                                        @elseif ($order->status == 'processing')
                                                        <div class="badge rounded-pill bg-dark w-100">Processing</div>
                                                        @elseif ($order->status == 'delivered' && $order->return_order == 0)
                                                        <div class="badge rounded-pill bg-success w-100">Delivered</div>
                                                        @endif

                                                        @if ($order->return_order == '1')
                                                        <div class="badge rounded-pill bg-danger w-100">Returned</div>    
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="d-flex gap-2"> <a href="{{ url('user/order-details/'.$order->id) }}" class="btn btn-success btn-sm rounded-0"><i class="fa fa-eye"></i> View</a>
                                                        <a href="{{ url('user/invoice-download/'.$order->id) }}" class="btn btn-danger btn-sm rounded-0"><i class="fa fa-download"></i> Invoice</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
        </div>
    </section>
    <!--end shop cart-->
</div>
@endsection