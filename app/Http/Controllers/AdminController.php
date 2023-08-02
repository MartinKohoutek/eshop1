<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function Ramsey\Uuid\v1;
use function Symfony\Component\String\b;

class AdminController extends Controller
{
    public function AdminDashboard() {
        return view('admin.index');
    }

    public function AdminLogout(Request $request) {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    public function AdminLogin() {
        return view('admin.admin_login');
    }

    public function AdminProfile() {
        $admin = User::find(Auth::user()->id);
        return view('admin.admin_profile_view', compact('admin'));
    }

    public function AdminProfileStore(Request $request) {
        $data = User::find(Auth::user()->id);

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->update();

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/'.$data->photo));
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $fileName);
            $data->update(['photo' => $fileName]);
        }

        $notification = [
            'message' => 'Admin Profile Updated Successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    public function AdminChangePassword() {
        $admin = User::find(Auth::user()->id);
        return view('admin.admin_change_password', compact('admin'));
    }

    public function AdminUpdatePassword(Request $request) {
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

        return back()->with('status', 'Password Changed Successfully!');
    }

    public function InactiveVendor() {
        $inactiveVendor = User::where('status', 'inactive')->where('role', 'vendor')->Latest()->get();
        return view('backend.vendor.inactive_vendor', compact('inactiveVendor'));
    }

    public function ActiveVendor() {
        $activeVendor = User::where('status', 'active')->where('role', 'vendor')->Latest()->get();
        return view('backend.vendor.active_vendor', compact('activeVendor'));
    }

    public function InactiveVendorDetails($id) {
        $vendor = User::findOrFail($id);
        return view('backend.vendor.inactive_vendor_details', compact('vendor'));
    }

    public function ActiveVendorApprove(Request $request) {
        $vendor = User::findOrFail($request->id)->update([
            'status' => 'active',
        ]);

        $notification = [
            'message' => 'Vendor Activation Successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->route('active.vendor')->with($notification);
    }

    public function ActiveVendorDetails($id) {
        $vendor = User::findOrFail($id);
        return view('backend.vendor.active_vendor_details', compact('vendor'));
    }

    public function InactiveVendorApprove(Request $request) {
        $vendor = User::findOrFail($request->id)->update([
            'status' => 'inactive',
        ]);

        $notification = [
            'message' => 'Vendor Deactivation Successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->route('inactive.vendor')->with($notification);
    }
}
