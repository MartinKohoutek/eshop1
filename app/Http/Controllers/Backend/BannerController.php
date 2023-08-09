<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function AllBanner() {
        $banners = Banner::latest()->get();
        return view('backend.banner.banner_all', compact('banners'));
    }
}
