<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ShipDistricts;
use App\Models\ShipDivision;
use App\Models\ShipState;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function DistrictGetAjax($division_id)
    {
        $ship = ShipDistricts::where('division_id', $division_id)->orderBy('district_name', 'ASC')->get();
        return json_encode($ship);
    }

    public function StateGetAjax($district_id)
    {
        $ship = ShipState::where('district_id', $district_id)->orderBy('state_name', 'ASC')->get();
        return json_encode($ship);
    }

    public function CheckoutStore(Request $request)
    {
        $data = [];
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['division_id'] = $request->division_id;
        $data['district_id'] = $request->district_id;
        $data['state_id'] = $request->state_id;
        $data['post_code'] = $request->post_code;
        $data['shipping_address'] = $request->shipping_address;
        $data['notes'] = $request->notes;
        $cartTotal = Cart::total();
        $carts = Cart::content();
        $cartQty = Cart::count();

        return view('frontend.checkout.checkout_payment', compact('data', 'carts', 'cartTotal', 'cartQty'));
    }
}
