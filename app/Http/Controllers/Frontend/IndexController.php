<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function ProductDetails($id, $slug) {
        $product = Product::findOrFail($id);
        $colors = explode(',', $product->product_color);
        $sizes = explode(',', $product->product_size);
        return view('frontend.product.product_details', compact('product', 'colors', 'sizes'));
    }
}
