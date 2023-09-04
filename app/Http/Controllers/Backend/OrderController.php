<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Pdf;

class OrderController extends Controller
{
    public function PendingOrder() {
        $orders = Order::where('status', 'pending')->orderBy('id', 'DESC')->get();
        return view('backend.orders.pending_orders', compact('orders'));
    }

    public function AdminConfirmedOrder() {
        $orders = Order::where('status', 'confirmed')->orderBy('id', 'DESC')->get();
        return view('backend.orders.confirmed_orders', compact('orders'));
    }

    public function AdminProcessingOrder() {
        $orders = Order::where('status', 'processing')->orderBy('id', 'DESC')->get();
        return view('backend.orders.processing_orders', compact('orders'));
    }

    public function AdminDeliveredOrder() {
        $orders = Order::where('status', 'delivered')->orderBy('id', 'DESC')->get();
        return view('backend.orders.delivered_orders', compact('orders'));
    }

    public function PendingToConfirm($order_id) {
        Order::findOrFail($order_id)->update([
            'status' => 'confirmed',
        ]);

        $notification = [
            'message' => 'Order Confirmed Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('admin.confirmed.order')->with($notification);
    }

    public function ConfirmToProcessing($order_id) {
        Order::findOrFail($order_id)->update([
            'status' => 'processing',
        ]);

        $notification = [
            'message' => 'Order Processing Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('admin.processing.order')->with($notification);
    }

    public function ProcessingToDelivered($order_id) {
        Order::findOrFail($order_id)->update([
            'status' => 'delivered',
        ]);

        $notification = [
            'message' => 'Order Delivered Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('admin.delivered.order')->with($notification);
    }

    public function AdminOrderDetails($order_id) {
        $order = Order::with('division', 'district', 'state', 'user')->where('id', $order_id)->first();
        $orderItems = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        return view('backend.orders.admin_order_details', compact('order', 'orderItems'));
    }

    public function AdminInvoiceDownload($order_id) {
        $order = Order::with('division', 'district', 'state', 'user')->where('id', $order_id)->first();
        $orderItems = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();

        $pdf = Pdf::loadView('backend.orders.admin_order_invoice', compact('order', 'orderItems'))->setPaper('a4')
            ->setOption(['tempDir' => public_path(), 'chroot' => public_path()]);
        return $pdf->download('invoice.pdf');
    }
}
