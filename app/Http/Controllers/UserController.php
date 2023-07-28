<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
