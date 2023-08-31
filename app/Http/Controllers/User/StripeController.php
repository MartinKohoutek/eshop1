<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function StripeOrder(Request $request)
    {
        \Stripe\Stripe::setApiKey('sk_test_51Nk1tSJDg5Rja1Q8ZS9Qj9BbQ2wfJbzFbc16sZRNHTE0plnAomdmuHt0zkL8p3O95Y5YZIqGa9eSXDqLwXjTf7u700zHo0tkOt');

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
            'amount' => 999*100,
            'currency' => 'usd',
            'description' => 'Easy Multi Vendor Shop',
            'source' => $token,
            'metadata' => ['order_id' => '6735'],
        ]);

        dd($charge);
    }
}
