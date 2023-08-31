<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class StripeController extends Controller
{
    public function StripeOrder(Request $request)
    {
        \Stripe\Stripe::setApiKey('sk_test_51Nk1tSJDg5Rja1Q8ZS9Qj9BbQ2wfJbzFbc16sZRNHTE0plnAomdmuHt0zkL8p3O95Y5YZIqGa9eSXDqLwXjTf7u700zHo0tkOt');

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

        if (Session::has('coupon')) {
            $total_amount = Session::get('coupon')['total_amount'];
        } else {
            $total_amount = round(Cart::total());
        }

        $charge = \Stripe\Charge::create([
            'amount' => $total_amount*100,
            'currency' => 'usd',
            'description' => 'Easy Multi Vendor Shop',
            'source' => $token,
            'metadata' => ['order_id' => uniqid()],
        ]);

        // dd($charge);
        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_id' => $request->state_id,
            'name',
            'email',
            'phone',
            'address',
            'post_code',
            'notes',
            'payment_type',
            'payment_method',
            'transaction_id',
            'currency',
            'amount',
            'order_number',
            'invoice_no',
            'order_date',
            'order_month',
            'order_year',
            'confirm_date',
            'processing_date',
            'picked_date',
            'shipped_date',
            'delivered_date',
            'cancel_date',
            'return_date',
            'return_reason',
            'status',
            'created_at',
        ]);
    }
}
