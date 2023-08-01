<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    public function AllBrands() {
        $brands = Brand::latest()->get();
        return view('backend.brand.brand_all', compact('brands'));
    }

    public function AddBrand() {
        return view('backend.brand.brand_add');
    }

    public function StoreBrand(Request $request) {
        $image = $request->file('brand_image');
        $img_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize('300', '300')->save('upload/brand/'.$img_name);
        $save_url = 'upload/brand/'.$img_name;

        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_slug' => strtolower(str_replace(' ', '-', $request->brand_name)),
            'brand_image' => $save_url,
        ]);

        $notification = [
            'message' => 'Brand Insrted Successfully!',
            'alert-type' => 'info'
        ];

        return redirect()->route('all.brands')->with($notification);
    }

    public function EditBrand($id) {
        $brand = Brand::findOrFail($id);
        return view('backend.brand.brand_edit', compact('brand'));
    }
}
