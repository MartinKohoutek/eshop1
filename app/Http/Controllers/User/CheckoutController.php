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
    public function DistrictGetAjax($division_id) {
        $ship = ShipDistricts::where('division_id', $division_id)->orderBy('district_name', 'ASC')->get();
        return json_encode($ship);
    }

    public function StateGetAjax($district_id) {
        $ship = ShipState::where('district_id', $district_id)->orderBy('state_name', 'ASC')->get();
        return json_encode($ship);
    }

    public function CheckoutPayment() {
        if (Auth::check()) {
            if (Cart::total() > 0) {
                $carts = Cart::content();
                $cartQty = Cart::count();
                $cartTotal = Cart::total();
                $divisions = ShipDivision::orderBy('division_name', 'ASC')->get();
        
                return view('frontend.checkout.checkout_payment', compact('carts', 'cartQty', 'cartTotal', 'divisions'));
            } else {
                $notification = [
                    'message' => 'Cart is empty. sShopping At List One Product!',
                    'alert-type' => 'error',
                ];
    
                return redirect()->to('/')->with($notification);    
            }
        } else {
            $notification = [
                'message' => 'You need to login first!',
                'alert-type' => 'error',
            ];

            return redirect()->route('login')->with($notification);
        }
    }
}
