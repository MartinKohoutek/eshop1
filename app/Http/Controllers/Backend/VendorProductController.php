<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorProductController extends Controller
{
    public function VendorAllProduct() {
        $products = Product::where('vendor_id', Auth::user()->id)->latest()->get();
        return view('vendor.backend.product.vendor_product_all', compact('products'));
    }
}
