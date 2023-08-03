<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

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
}
