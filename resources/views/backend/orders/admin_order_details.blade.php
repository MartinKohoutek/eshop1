@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Orders</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Admin Order Details</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">

            </div>
        </div>
    </div>
    <!--end breadcrumb-->

    <hr />
    <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4>Shipping Details</h4>
                </div>
                <!-- <hr> -->
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
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4>Order Details</h4>
                    <span class="text-warning">Invoice: {{ $order->invoice_no }}</span>
                </div>
                <!-- <hr> -->
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
                                @elseif ($order->status == 'confirmed')
                                <div class="badge rounded-pill bg-info">Confirmed</div>
                                @elseif ($order->status == 'processing')
                                <div class="badge rounded-pill bg-danger">Processing</div>
                                @elseif ($order->status == 'delivered')
                                <div class="badge rounded-pill bg-success">Delivered</div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>
                                @if ($order->status == 'pending')
                                <a id="confirm" href="{{ route('pending-confirm', $order->id) }}" class="btn btn-block btn-success">Confirm Order</a>
                                @elseif ($order->status == 'confirmed')
                                <a id="processing" href="{{ route('confirm-processing', $order->id) }}" class="btn btn-block btn-success">Processing Order</a>
                                @elseif ($order->status == 'processing')
                                <a id="delivered" href="{{ route('processing-delivered', $order->id) }}" class="btn btn-block btn-success">Delivered Order</a>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1">
        <div class="col">
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
    </div>
</div>
@endsection