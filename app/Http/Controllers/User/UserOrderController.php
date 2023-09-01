<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Pdf;

class UserOrderController extends Controller
{
    public function UserOrders() {
        $id = Auth::user()->id;
        $orders = Order::where('user_id', $id)->orderBy('id', 'DESC')->get();
        return view('frontend.user.user_orders', compact('orders'));
    }

    public function UserOrderDetails($order_id) {
        $order = Order::with('division', 'district', 'state', 'user')->where('id', $order_id)->where('user_id', Auth::id())->first();
        $orderItems = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        return view('frontend.user.user_order_details', compact('order', 'orderItems'));
    }

    public function UserOrderInvoice($order_id) {
        $order = Order::with('division', 'district', 'state', 'user')->where('id', $order_id)->where('user_id', Auth::id())->first();
        $orderItems = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();

        $pdf = Pdf::loadView('frontend.user.user_invoice', compact('order', 'orderItems'))->setPaper('a4')
            ->setOption(['tempDir' => public_path(), 'chroot' => public_path()]);
        return $pdf->download('invoice.pdf');
    }
}
