<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function ProductDetails($id, $slug) {
        $product = Product::findOrFail($id);
        return view('frontend.product.product_details', compact('product'));
    }
}
