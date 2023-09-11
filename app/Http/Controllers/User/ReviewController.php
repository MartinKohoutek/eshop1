<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function StoreReview(Request $request) {
        $product_id = $request->product_id;
        $vendor_id = $request->hvendor_id;

        $request->validate([
            'comment' => 'required',
        ]);

        Review::insert([
            'product_id' => $product_id,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
            'rating' => $request->quality,
            'vendor_id' => $vendor_id,
            'created_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Review Will Approve By Admin',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    public function PendingReview() {
        $reviews = Review::where('status', 0)->orderBy('id', 'DESC')->get();
        return view('backend.review.pending_review', compact('reviews'));
    }

    public function ReviewApprove($id) {
        $review = Review::findOrFail($id)->update([
            'status' => 1,
        ]);

        $notification = [
            'message' => 'Review Approved Successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    public function PublishReview() {
        $reviews = Review::where('status', 1)->orderBy('id', 'DESC')->get();
        return view('backend.review.publish_review', compact('reviews'));
    }

    public function DeleteReview($id) {
        Review::findOrFail($id)->delete();

        $notification = [
            'message' => 'Review Deleted Successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    public function VendorAllReview() {
        $vendor_id = Auth::user()->id;
        $reviews = Review::where('vendor_id', $vendor_id)->where('status', 1)->orderBy('id', 'DESC')->get();
        return view('vendor.review.approve_review', compact('reviews'));
    }
}
