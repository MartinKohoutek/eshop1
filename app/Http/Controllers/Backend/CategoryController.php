<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    public function AllCategories() {
        $categories = Category::latest()->get();
        return view('backend.category.category_all', compact('categories'));
    }

    public function AddCategory() {
        return view('backend.category.category_add');
    }

    public function StoreCategory(Request $request)
    {
        $image = $request->file('category_image');
        $img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize('120', '120')->save('upload/category/' . $img_name);
        $save_url = 'upload/category/' . $img_name;

        Category::insert([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
            'category_image' => $save_url,
        ]);

        $notification = [
            'message' => 'Category Inserted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.categories')->with($notification);
    }

    public function EditCategory($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.category_edit', compact('category'));
    }

    public function UpdateCategory(Request $request)
    {
        $category_id = $request->id;
        $old_image = $request->old_image;

        if ($request->file('category_image')) {
            $image = $request->file('category_image');
            $img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize('120', '120')->save('upload/category/' . $img_name);
            $save_url = 'upload/category/' . $img_name;

            if (file_exists($old_image)) {
                unlink($old_image);
            }

            Category::findOrFail($category_id)->update([
                'category_name' => $request->category_name,
                'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
                'category_image' => $save_url,
            ]);

            $notification = [
                'message' => 'Category Updated with Image Successfully!',
                'alert-type' => 'success'
            ];

            return redirect()->route('all.categories')->with($notification);
        } else {
            Category::findOrFail($category_id)->update([
                'category_name' => $request->category_name,
                'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
            ]);

            $notification = [
                'message' => 'Categpry Updated without Image Successfully!',
                'alert-type' => 'info'
            ];

            return redirect()->route('all.categories')->with($notification);
        }
    }

    public function DeleteCategory($id) {
        $category = Category::findOrFail($id);
        $image = $category->category_image;
        unlink($image);
        Category::findOrFail($id)->delete();

        $notification = [
            'message' => 'Category Deleted Successfully!',
            'alert-type' => 'info'
        ];

        return redirect()->back()->with($notification);
    }
}
