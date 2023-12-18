<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BlogComment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BlogCommentController extends Controller
{
    public function UserBlogCommentStore(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'comment' => 'required',
            'title' => 'required',
        ], [
            'name.required' => 'Please Enter Name',
            'email.required' => 'Please Enter Email Address',
            'comment.required' => 'Please Enter Comment',
            'title.required' => 'Please Enter Title',
        ]);

        BlogComment::insert([
            'blog_id' => $request->blog_id,
            'user_id' => $request->user_id,
            'title' => $request->title,
            'email' => $request->email,
            'name' => $request->name,
            'comment' => $request->comment,
            'created_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Blog Comment Inserted Successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification)->with('status', 'Comment will be approved by Admin');
    }
}
