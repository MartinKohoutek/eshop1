<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function UserDashboard() {
        $userData = User::find(Auth::user()->id);
        return view('frontend.user.user_dashboard', compact('userData'));
    }

    public function UserDetails() {
        $userData = User::find(Auth::user()->id);
        return view('frontend.user.user_details', compact('userData'));
    }

    public function UserProfileStore(Request $request) {
        $data = User::find(Auth::user()->id);
        
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        
        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/user_images/'.$data->photo));
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $fileName);
            $data->photo = $fileName;
        }
        $data->update();

        $notification = [
            'message' => 'User Profile Updated Successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    public function UserLogout(Request $request) {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $notification = [
            'message' => 'User Logout Successfully!',
            'alert-type' => 'success',
        ];

        return redirect('/login')->with($notification);
    }

    public function UserChangePassword() {
        $userData = User::find(Auth::user()->id);
        return view('frontend.user.user_change_password', compact('userData'));
    }

    public function UserPasswordStore(Request $request) {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        if (!Hash::check($request->old_password, Auth::user()->password)) {
            return redirect()->back()->with('error', 'Old Password Does Not Match!');
        }

        $userData = User::whereId(Auth::user()->id);
        $userData->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->back()->with('status', 'Password Changed Successfully!');
    }
}
