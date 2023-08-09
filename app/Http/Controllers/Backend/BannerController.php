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

    public function EditBanner($id)
    {
        $banners = Banner::findOrFail($id);
        return view('backend.banner.banner_edit', compact('banners'));
    }

    public function UpdateBanner(Request $request, $id)
    {
        //$slider_id = $request->id;
        //$old_image = $request->old_image;
        $banner = Banner::findOrFail($id);

        if ($request->file('banner_image')) {
            $image = $request->file('banner_image');
            $img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize('800', '800')->save('upload/banner/' . $img_name);
            $save_url = 'upload/banner/' . $img_name;

            if (file_exists($banner->banner_image)) {
                unlink($banner->banner_image);
            }

            $banner->update([
                'banner_title' => $request->banner_title,
                'banner_subtitle' => $request->banner_subtitle,
                'banner_url' => $request->banner_url,
                'banner_image' => $save_url,
            ]);

            $notification = [
                'message' => 'Banner Updated with Image Successfully!',
                'alert-type' => 'success'
            ];

            return redirect()->route('all.banner')->with($notification);
        } else {
            $banner->update([
                'banner_title' => $request->banner_title,
                'banner_subtitle' => $request->banner_subtitle,
                'banner_url' => $request->banner_url,
            ]);

            $notification = [
                'message' => 'Banner Updated without Image Successfully!',
                'alert-type' => 'info'
            ];

            return redirect()->route('all.banner')->with($notification);
        }
    }

    public function DeleteBanner($id) {
        $banner = Banner::findOrFail($id);
        $image = $banner->banner_image;
        unlink($image);
        $banner->delete();

        $notification = [
            'message' => 'Banner Deleted Successfully!',
            'alert-type' => 'info'
        ];

        return redirect()->back()->with($notification);
    }
}
