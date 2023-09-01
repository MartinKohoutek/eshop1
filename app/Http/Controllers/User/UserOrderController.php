<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserOrderController extends Controller
{
    public function UserOrders() {
        $user = User::findOrFail(Auth::user()->id);
        return view('frontend.user.user_orders', compact('user'));
    }
}
