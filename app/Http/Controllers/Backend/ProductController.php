<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function AllProducts() {
        $products = Product::latest()->get();
        return view('backend.product.product_all', compact('products'));
    }

    public function AddProduct() {
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $vendors = User::where('role', 'vendor')->where('status', 'active')->get();
        return view('backend.product.product_add', compact('brands', 'categories', 'vendors'));
    }

    public function StoreProduct(Request $request) {
        $image = $request->file('product_thumbnail');
        $img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize('400', '300')->save('upload/products/thumbnail' . $img_name);
        $save_url = 'upload/products/thumbnail/' . $img_name;

        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'product_name' => $request->product_name,
            'product_slug' => strtolower(str_replace(' ', '-', $request->product_name)),

            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags' => $request->product_tags,
            'product_size' => $request->product_size,
            'product_color' => $request->product_color,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,

            'product_thumbnail' => $save_url,
            'vendor_id' => $request->vendor_id,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        Category::insert([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
            'category_image' => $save_url,
        ]);

        $notification = [
            'message' => 'Category Inserted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.categories')->with($notification);
    }
}
