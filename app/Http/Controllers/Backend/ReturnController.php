<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class ReturnController extends Controller
{
    public function ReturnRequest() {
        $orders = Order::where('return_order', 1)->orderBy('id', 'DESC')->get();
        return view('backend.return_orders.return_order_request', compact('orders'));
    }

    public function ReturnRequestApproved($order_id) {
        Order::where('id', $order_id)->update([
            'return_order' => 2,
        ]);

        $notification = [
            'message' => 'Return Order Successfully Approved',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }
}
