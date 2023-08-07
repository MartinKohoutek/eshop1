<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\SubCategory;
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
        Image::make($image)->resize('400', '300')->save('upload/products/thumbnail/' . $img_name);
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

        $images = $request->file('multi_img');
        foreach ($images as $img) {
            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize('400', '300')->save('upload/products/multi-image/' . $make_name);
            $uploadPath = 'upload/products/multi-image/' . $make_name;
            MultiImg::insert([
                'product_id' => $product_id,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now(),
            ]);
        }

        $notification = [
            'message' => 'Product Inserted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.products')->with($notification);
    }

    public function EditProduct($id) {
        $product = Product::findOrFail($id);
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $vendors = User::where('role', 'vendor')->where('status', 'active')->get();
        $subcategories = SubCategory::latest()->get();
        $multiImages = MultiImg::where('product_id', $id)->get();

        return view('backend.product.product_edit', compact('brands', 'categories', 'vendors', 'product', 'subcategories', 'multiImages'));
    }

    public function UpdateProduct(Request $request) {
        $product_id = $request->id;

        Product::FindOrFail($product_id)->update([
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

            // 'product_thumbnail' => $save_url,
            'vendor_id' => $request->vendor_id,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Product Updated Without Image Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.products')->with($notification);
    }

    public function UpdateProductThumbnail(Request $request) {
        $pro_id = $request->id;
        $old_image = $request->old_image;

        $image = $request->file('product_thumbnail');
        $img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize('400', '300')->save('upload/products/thumbnail/' . $img_name);
        $save_url = 'upload/products/thumbnail/' . $img_name;

        if (file_exists($old_image)) {
            unlink($old_image);
        }

        Product::findOrFail($pro_id)->update([
            'product_thumbnail' => $save_url,
            'updated_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Product Thumbnail Updated Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function UpdateProductMultiImage(Request $request) {
        $images = $request->multi_img;

        foreach ($images as $id => $image) {
            $imgDel = MultiImg::findOrFail($id);
            unlink($imgDel->photo_name);

            $make_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize('400', '300')->save('upload/products/multi-image/' . $make_name);
            $uploadPath = 'upload/products/multi-image/' . $make_name;
            MultiImg::where('id', $id)->update([
                'photo_name' => $uploadPath,
                'updated_at' => Carbon::now(),
            ]);
        }

        $notification = [
            'message' => 'Product Multi Image Updated Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}
