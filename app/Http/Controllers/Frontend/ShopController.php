<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function ShopPage() {
        $products = Product::query();
        if (!empty($_GET['category'])) {
            $slug = explode(',', $_GET['category']);
            $catIds = Category::select('id')->whereIn('category_slug', $slug)->pluck('id')->toArray();
            $products = Product::whereIn('category_id', $catIds)->get();
        } elseif (!empty($_GET['brand'])) {
            $slug = explode(',', $_GET['brand']);
            $brandIds = Brand::select('id')->whereIn('brand_slug', $slug)->pluck('id')->toArray();
            $products = Product::whereIn('brand_id', $brandIds)->get();
        } else {
            $products = Product::where('status', 1)->orderBy('id', 'DESC')->get();
        }

        $categories = Category::orderBy('category_name', 'ASC')->get();
        $brands = Brand::orderBy('brand_name', 'ASC')->get();
        $new_products = Product::orderBy('id', 'DESC')->limit(3)->get();
        return view('frontend.product.shop_page', compact('products', 'categories', 'new_products', 'brands'));
    }

    public function ShopFilter(Request $request) {
        $data = $request->all();
        $catUrl = "";
        if (!empty($data['category'])) {
            foreach ($data['category'] as $category) {
                if (empty($catUrl)) {
                    $catUrl .=  '&category='.$category;
                } else {
                    $catUrl .= ','.$category;
                }
            }
        }
        $brandUrl = "";
        if (!empty($data['brand'])) {
            foreach ($data['brand'] as $brand) {
                if (empty($brandUrl)) {
                    $brandUrl .=  '&brand='.$brand;
                } else {
                    $brandUrl .= ','.$brand;
                }
            }
        }

        return redirect()->route('shop.page', $catUrl.$brandUrl);
    }
}
