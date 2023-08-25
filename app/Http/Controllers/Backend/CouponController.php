<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function AllCoupon() {
        $coupons = Coupon::latest()->get();
        return view('backend.coupon.coupon_all', compact('coupons'));
    }
}
