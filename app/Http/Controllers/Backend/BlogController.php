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

    public function EditBlogPost($id) {
        $categories = BlogCategory::latest()->get();
        $blog = BlogPost::findOrFail($id);
        return view('backend.blog.blog_post_edit', compact('categories', 'blog'));
    }

    public function UpdateBlogPost(Request $request) {
        $post_id = $request->post_id;
        $old_image = $request->old_image;

        if ($request->file('post_image')) {
            $image = $request->file('post_image');
            $img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize('934', '400')->save('upload/blog/' . $img_name);
            $save_url = 'upload/blog/' . $img_name;
    
            if (file_exists($old_image)) {
                unlink($old_image);
            }

            BlogPost::findOrFail($post_id)->update([
                'post_image' => $save_url,
            ]);
        }

        BlogPost::findOrFail($post_id)->update([
            'category_id' => $request->category_id,
            'post_title' => $request->post_title,
            'post_slug' => strtolower(str_replace(' ', '-', $request->post_title)),  
            'post_short_description' => $request->post_short_description,
            'post_long_description' => $request->post_long_description,
            'updated_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Blog Post Updated Successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->route('admin.blog.post')->with($notification);
    }

    public function DeleteBlogPost($id) {
        $blog = BlogPost::findOrFail($id);
        $image = $blog->post_image;
        unlink($image);

        $blog->delete();

        $notification = [
            'message' => 'Blog Post Deleted Successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    public function AllBlog() {
        $categories = BlogCategory::latest()->get();
        $posts = BlogPost::latest()->get();
        $recentPosts = BlogPost::latest()->limit(4)->get();
        return view('frontend.blog.home_blog', compact('categories', 'posts', 'recentPosts'));
    }

    public function BlogDetails($id, $slug) {
        $categories = BlogCategory::latest()->get();
        $post = BlogPost::findOrFail($id);
        $breadCat = BlogCategory::where('id', $id)->get();
        $recentPosts = BlogPost::latest()->limit(4)->get();
        return view('frontend.blog.blog_details', compact('categories', 'post', 'breadCat', 'recentPosts'));
    }

    public function BlogCategory($id, $slug) {
        $categories = BlogCategory::latest()->get();
        $posts = BlogPost::where('category_id', $id)->get();
        $breadCat = BlogCategory::where('id', $id)->get();
        $recentPosts = BlogPost::latest()->limit(4)->get();
        return view('frontend.blog.category_post', compact('categories', 'posts', 'breadCat', 'recentPosts'));
    }
}
