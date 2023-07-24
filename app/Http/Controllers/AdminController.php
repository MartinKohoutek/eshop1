<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Ramsey\Uuid\v1;

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
}
