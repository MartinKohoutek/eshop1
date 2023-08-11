<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\MultiImg;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function ProductDetails($id, $slug) {
        $product = Product::findOrFail($id);
        $colors = explode(',', $product->product_color);
        $sizes = explode(',', $product->product_size);
        $tags = explode(',', $product->product_tags);
        $images = MultiImg::where('product_id', $id)->get();

        $similarProducts = Product::where('category_id', $product->category_id)->where('id', '!=', $id)->orderBy('id', 'DESC')->limit(5)->get();
        return view('frontend.product.product_details', compact('product', 'colors', 'sizes', 'tags', 'images', 'similarProducts'));
    }
}
