<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

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

    public function VendorChangePassword() {
        $vendor = User::find(Auth::user()->id);
        return view('vendor.vendor_change_password', compact('vendor'));
    }

    public function VendorUpdatePassword(Request $request) {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        if (!Hash::check($request->old_password, Auth::user()->password)) {
            return back()->with('error', 'Old Password Does not Matched');
        }

        User::whereId(Auth::user()->id)->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('status', 'Vendor Password Changed Successfully!');
    }

    public function BecomeVendor() {
        return view('auth.become_vendor');
    }

    public function VendorRegister(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = User::insert([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'vendor_join' => $request->vendor_join,
            'password' => Hash::make($request->password),
            'role' => 'vendor',
            'status' => 'inactive',
        ]);

        $notification = [
            'message' => 'Vendor Registered Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('vendor.login')->with($notification);
    }
}
