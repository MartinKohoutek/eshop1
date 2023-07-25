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
}
