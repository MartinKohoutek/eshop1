<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function ShopPage() {
        $categories = Category::orderBy('category_name', 'ASC')->get();
        $products = Product::where('status', 1)->orderBy('id', 'DESC')->get();
        $new_products = Product::orderBy('id', 'DESC')->limit(3)->get();
        return view('frontend.product.shop_page', compact('products', 'categories', 'new_products'));
    }
}
