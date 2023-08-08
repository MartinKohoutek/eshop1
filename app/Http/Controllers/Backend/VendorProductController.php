<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorProductController extends Controller
{
    public function VendorAllProduct() {
        $products = Product::where('vendor_id', Auth::user()->id)->latest()->get();
        return view('vendor.backend.product.vendor_product_all', compact('products'));
    }

    public function VendorAddProduct() {
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        // $vendors = User::where('role', 'vendor')->where('status', 'active')->get();
        return view('vendor.backend.product.vendor_product_add', compact('brands', 'categories'));
    }

    public function VendorGetSubCategory($category_id) {
        $subcat = SubCategory::where('category_id', $category_id)->orderBy('subcategory_name', 'ASC')->get();
        return json_encode($subcat);
    }
}
