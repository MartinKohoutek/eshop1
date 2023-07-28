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
}
