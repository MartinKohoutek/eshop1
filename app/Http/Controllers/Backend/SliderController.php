<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function AllSlider() {
        $sliders = Slider::latest()->get();
        return view('backend.slider.slider_all', compact('sliders'));
    }

    public function AddSlider() {
        return view('backend.slider.slider_add');
    }

    public function StoreSlider(Request $request)
    {
        $image = $request->file('slider_image');
        $img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize('600', '600')->save('upload/slider/' . $img_name);
        $save_url = 'upload/slider/' . $img_name;

        Slider::insert([
            'slider_title' => $request->slider_title,
            'slider_subtitle' => $request->slider_subtitle,
            'slider_description' => $request->slider_description,
            'slider_image' => $save_url,
        ]);

        $notification = [
            'message' => 'Slider Inserted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.slider')->with($notification);
    }

    public function EditSlider($id)
    {
        $sliders = Slider::findOrFail($id);
        return view('backend.slider.slider_edit', compact('sliders'));
    }
}
