<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
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

    public function EditBlogCategory($id) {
        $category = BlogCategory::findOrFail($id);
        return view('backend.blog.blog_category_edit', compact('category'));
    }

    public function UpdateBlogCategory(Request $request) {
        BlogCategory::findOrFail($request->id)->update([
            'blog_category_name' => $request->blog_category_name,
            'blog_category_slug' => strtolower(str_replace(' ', '-', $request->blog_category_name)),
        ]);

        $notification = [
            'message' => 'Blog Category Updated Successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->route('admin.blog.category')->with($notification);
    }

    public function DeleteBlogCategory($id) {
        BlogCategory::findOrFail($id)->delete();

        $notification = [
            'message' => 'Blog Category Deleted Successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    public function AdminBlogPosts() {
        $posts = BlogPost::latest()->get();
        return view('backend.blog.blog_post_all', compact('posts'));
    }

    public function AddBlogPost() {
        $categories = BlogCategory::latest()->get();
        return view('backend.blog.blog_post_add', compact('categories'));
    }

    public function StoreBlogPost(Request $request)
    {
        $image = $request->file('post_image');
        $img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize('934', '400')->save('upload/blog/' . $img_name);
        $save_url = 'upload/blog/' . $img_name;

        BlogPost::insert([
            'category_id' => $request->category_id,
            'post_title' => $request->post_title,
            'post_slug' => strtolower(str_replace(' ', '-', $request->post_title)),
            'post_image' => $save_url,
            'post_short_description' => $request->post_short_description,
            'post_long_description' => $request->post_long_description,
            'created_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Blog Post Inserted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.blog.post')->with($notification);
    }
}
