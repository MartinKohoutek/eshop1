<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BannerController extends Controller
{
    public function AllBanner() {
        $banners = Banner::latest()->get();
        return view('backend.banner.banner_all', compact('banners'));
    }

    public function AddBanner() {
        return view('backend.banner.banner_add');
    }

    public function StoreBanner(Request $request)
    {
        $image = $request->file('banner_image');
        $img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize('800', '800')->save('upload/banner/' . $img_name);
        $save_url = 'upload/banner/' . $img_name;

        Banner::insert([
            'banner_title' => $request->banner_title,
            'banner_subtitle' => $request->banner_subtitle,
            'banner_url' => $request->banner_url,
            'banner_image' => $save_url,
        ]);

        $notification = [
            'message' => 'Banner Inserted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.banner')->with($notification);
    }
}
