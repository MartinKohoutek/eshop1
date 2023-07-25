<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{
    public function VendorDashboard() {
        return view('vendor.index');
    }

    public function VendorLogin() {
        return view('vendor.vendor_login');
    }

    public function VendorLogout(Request $request) {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/vendor/login');
    }

    public function VendorProfile() {
        $vendor = User::find(Auth::user()->id);
        return view('vendor.vendor_profile_view', compact('vendor'));
    }

    public function VendorProfileStore(Request $request) {
        $data = User::find(Auth::user()->id);

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->vendor_join = $request->vendor_join;
        $data->vendor_short_info = $request->vendor_short_info;
        $data->update();

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/vendor_images/'.$data->photo));
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/vendor_images'), $fileName);
            $data->update(['photo' => $fileName]);
        }

        $notification = [
            'message' => 'Vendor Profile Updated Successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }
}
