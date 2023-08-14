<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
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

    public function Index() {
        $skip_category_0 = Category::skip(0)->first();
        $skip_product_0 = Product::where('status', 1)->where('category_id', $skip_category_0->id)->orderBy('id', 'DESC')->limit(5)->get();

        $skip_category_1 = Category::skip(1)->first();
        $skip_product_1 = Product::where('status', 1)->where('category_id', $skip_category_1->id)->orderBy('id', 'DESC')->limit(5)->get();

        $skip_category_2 = Category::skip(2)->first();
        $skip_product_2 = Product::where('status', 1)->where('category_id', $skip_category_2->id)->orderBy('id', 'DESC')->limit(5)->get();

        return view('frontend.index', compact('skip_category_0', 'skip_product_0', 'skip_category_1', 'skip_product_1', 'skip_category_2', 'skip_product_2'));
    }
}
