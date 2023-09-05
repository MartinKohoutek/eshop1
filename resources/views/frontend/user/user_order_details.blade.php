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
                            <li class="breadcrumb-item active" aria-current="page">Order Details</li>
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
                            <!-- <div class="card shadow-none mb-0">
                                <div class="card-body">                                    
                                </div>
                            </div> -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Shipping Details</h4>
                                        </div>
                                        <hr>
                                        <div class="card-body">
                                            <table class="table">
                                                <tr>
                                                    <th>Shipping Name:</th>
                                                    <td>{{ $order->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Shipping Phone:</th>
                                                    <td>{{ $order->phone }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Shipping Email:</th>
                                                    <td>{{ $order->email }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Shipping Address:</th>
                                                    <td>{{ $order->address }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Division:</th>
                                                    <td>{{ $order['division']['division_name'] }}</td>
                                                </tr>
                                                <tr>
                                                    <th>District:</th>
                                                    <td>{{ $order['district']['district_name'] }}</td>
                                                </tr>
                                                <tr>
                                                    <th>State:</th>
                                                    <td>{{ $order['state']['state_name'] }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Post Code:</th>
                                                    <td>{{ $order->post_code }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Order Date:</th>
                                                    <td>{{ $order->order_date }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Order Details</h4>
                                            <span class="text-warning">Invoice: {{ $order->invoice_no }}</span>
                                        </div>
                                        <hr>
                                        <div class="card-body">
                                            <table class="table">
                                                <tr>
                                                    <th>Name:</th>
                                                    <td>{{ $order['user']['name'] }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Email:</th>
                                                    <td>{{ $order['user']['email'] }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Payment Type:</th>
                                                    <td>{{ $order->payment_method }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Transaction ID:</th>
                                                    <td>{{ $order->transaction_id }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Invoice:</th>
                                                    <td>{{ $order->invoice_no }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Total Amount:</th>
                                                    <td>${{ $order->amount }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Order Status:</th>
                                                    <td>
                                                        @if ($order->status == 'pending')
                                                        <div class="badge rounded-pill bg-warning">Pending</div>
                                                        @elseif ($order->status == 'confirm')
                                                        <div class="badge rounded-pill bg-info">Confirm</div>
                                                        @elseif ($order->status == 'processing')
                                                        <div class="badge rounded-pill bg-danger">Processing</div>
                                                        @elseif ($order->status == 'delivered')
                                                        <div class="badge rounded-pill bg-success">Delivered</div>
                                                        @endif
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card shadow-none mb-0">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Image</th>
                                                    <th>Product Name</th>
                                                    <th>Vendor Name</th>
                                                    <th>Product Code</th>
                                                    <th>Color</th>
                                                    <th>Size</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($orderItems as $key => $item)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>
                                                        <img src="{{ asset($item['product']['product_thumbnail']) }}" alt="" style="width: 50px; height: 50px">
                                                    </td>
                                                    <td>{{ $item['product']['product_name'] }}</td>
                                                    <td>
                                                        @if ($item->vendor_id == NULL)
                                                        Owner
                                                        @else
                                                        {{ $item['product']['vendor']['name'] }}
                                                        @endif
                                                    </td>
                                                    <td>{{ $item['product']['product_code'] }}</td>
                                                    <td>
                                                        @if ($item['color'] == NULL)
                                                        ...
                                                        @else
                                                        {{ $item['color'] }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($item['size'] == NULL)
                                                        ...
                                                        @else
                                                        {{ $item['size'] }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($item['qty'] == NULL)
                                                        ...
                                                        @else
                                                        {{ $item['qty'] }}
                                                        @endif
                                                    </td>
                                                    <td>${{ $item['price'] }}
                                                        <br>Total: ${{$item['price'] * $item['qty'] }}
                                                    </td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($order->status !== 'delivered')
                        @else
                            @php
                            $returnedOrder = App\Models\Order::where('id', $order->id)->where('return_reason', '=', NULL)->first();
                            @endphp
                            @if ($returnedOrder)       
                            <form action="{{ route('return.order', $order->id) }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Order Return Reason</label>
                                    <textarea name="return_reason" class="form-control" style="width: 40%;"></textarea>
                                </div>
                                <button type="submit" class="btn-sm btn-danger" style="width: 40%;">Order Return</button>
                            </form>
                            @else
                            <h5><span class="badge badge-pill bg-danger">You Have Send Return Request For This Product</span></h5>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end shop cart-->
</div>
@endsection