<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CouponController extends Controller
{
    public function AllCoupon() {
        $coupons = Coupon::latest()->get();
        return view('backend.coupon.coupon_all', compact('coupons'));
    }

    public function AddCoupon() {
        return view('backend.coupon.coupon_add');
    }

    public function StoreCoupon(Request $request) {
        Coupon::insert([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'created_at' => Carbon::now(), 
        ]);

        $notification = [
            'message' => 'Coupon Inserted Successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->route('all.coupon')->with($notification);
    }

    public function EditCoupon($id) {
        $coupon = Coupon::findOrFail($id);
        return view('backend.coupon.edit_coupon', compact('coupon'));
    }

    public function UpdateCoupon(Request $request) {
        Coupon::findOrFail($request->id)->update([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'created_at' => Carbon::now(), 
        ]);

        $notification = [
            'message' => 'Coupon Updated Successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->route('all.coupon')->with($notification);
    }

    public function DeleteCoupon($id) {
        Coupon::findOrFail($id)->delete();

        $notification = [
            'message' => 'Coupon Deleted Successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }
}
