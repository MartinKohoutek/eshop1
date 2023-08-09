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

    public function UpdateSlider(Request $request, $id)
    {
        //$slider_id = $request->id;
        //$old_image = $request->old_image;
        $slider = Slider::findOrFail($id);

        if ($request->file('slider_image')) {
            $image = $request->file('slider_image');
            $img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize('600', '600')->save('upload/slider/' . $img_name);
            $save_url = 'upload/slider/' . $img_name;

            if (file_exists($slider->slider_image)) {
                unlink($slider->slider_image);
            }

            $slider->update([
                'slider_title' => $request->slider_title,
                'slider_subtitle' => $request->slider_subtitle,
                'slider_description' => $request->slider_description,
                'slider_image' => $save_url,
            ]);

            $notification = [
                'message' => 'Slider Updated with Image Successfully!',
                'alert-type' => 'success'
            ];

            return redirect()->route('all.slider')->with($notification);
        } else {
            $slider->update([
                'slider_title' => $request->slider_title,
                'slider_subtitle' => $request->slider_subtitle,
                'slider_description' => $request->slider_description,
            ]);

            $notification = [
                'message' => 'Slider Updated without Image Successfully!',
                'alert-type' => 'info'
            ];

            return redirect()->route('all.slider')->with($notification);
        }
    }

    public function DeleteSlider($id) {
        $slider = Slider::findOrFail($id);
        $image = $slider->slider_image;
        unlink($image);
        $slider->delete();

        $notification = [
            'message' => 'Slider Deleted Successfully!',
            'alert-type' => 'info'
        ];

        return redirect()->back()->with($notification);
    }
}
