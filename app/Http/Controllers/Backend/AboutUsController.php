<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Brand;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function UpdateAboutUs() {
        $about = AboutUs::find(1);
        return view('backend.about.about_us_update', compact('about'));
    }

    public function StoreAboutUs(Request $request) {
        $request->validate([
            'description' => 'required',
        ], [
            'description.required' => 'Please Enter Description',
        ]);

        AboutUs::findOrFail(1)->update([
            'description' => $request->description,
        ]);

        $notification = [
            'message' => 'About Us Section Updated Successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    public function ViewAboutUs() {
        $about = AboutUs::find(1);
        $brands = Brand::orderBy('brand_name')->get();
        $choose = WhyChooseUs::latest()->limit(3)->get();
        return view('frontend.about.view_about_us', compact('about', 'brands', 'choose'));
    }
}
