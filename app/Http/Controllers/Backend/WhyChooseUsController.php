<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class WhyChooseUsController extends Controller
{
    public function AllWhyChoose() {
        $allWhyChoose = WhyChooseUs::all();
        return view('backend.choose.all_why_choose', compact('allWhyChoose'));
    }

    public function AddWhyChoose() {
        return view('backend.choose.add_why_choose');
    }

    public function StoreWhyChoose(Request $request) {
        $request->validate([
            'title' => 'required',
            'icon' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
        ], [
            'title.required' => 'Please Enter Title',
            'icon.required' => 'Please Enter Icon',
            'short_description' => 'Please Enter Short Description', 
            'long_description' => 'Please Enter Long Description', 
        ]);

        WhyChooseUs::insert([
            'title' => $request->title,
            'icon' => $request->icon,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'created_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Why Choose Us Inserted Successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->route('all.why.choose')->with($notification);
    }

    public function EditWhyChoose($id) {
        $choose = WhyChooseUs::findOrFail($id);
        return view('backend.choose.edit_why_choose', compact('choose'));
    }

    public function UpdateWhyChoose(Request $request) {
        $request->validate([
            'title' => 'required',
            'icon' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
        ], [
            'title.required' => 'Please Enter Title',
            'icon.required' => 'Please Enter Icon',
            'short_description' => 'Please Enter Short Description', 
            'long_description' => 'Please Enter Long Description', 
        ]);

        WhyChooseUs::findOrFail($request->id)->update([
            'title' => $request->title,
            'icon' => $request->icon,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'updated_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Why Choose Us Updated Successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->route('all.why.choose')->with($notification);
    }

    public function DeleteWhyChoose($id) {
        WhyChooseUs::findOrFail($id)->delete();

        $notification = [
            'message' => 'Why Choose Us Deleted Successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }
}
