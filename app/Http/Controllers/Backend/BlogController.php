<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function AdminBlogCategory() {
        $categories = BlogCategory::latest()->get();
        return view('backend.blog.blog_category_all', compact('categories'));
    }

    public function AddBlogCategory() {
        return view('backend.blog.blog_category_add');
    }

    public function StoreBlogCategory(Request $request) {
        BlogCategory::insert([
            'blog_category_name' => $request->blog_category_name,
            'blog_category_slug' => strtolower(str_replace(' ', '-', $request->blog_category_name)),
            'created_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Blog Category Inserted Successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->route('admin.blog.category')->with($notification);
    }
}
