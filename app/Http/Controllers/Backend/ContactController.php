<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ContactController extends Controller
{
    public function ViewContact() {
        $siteSetting = SiteSetting::find(1);
        return view('frontend.contact.contact_view', compact('siteSetting'));
    }

    public function StoreContact(Request $request) {
        $request->validate([
            'email' => 'required',
            'contact_message' => 'required',
        ], [
            'email.required' => 'Please Enter Valid Email Address',
            'contact_message.required' => 'Please Enter Message', 
        ]);

        Contact::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->contact_message,
            'created_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Message Sent Successfully!',
            'alert-type' => 'success',
        ];

        return redirect('/')->with($notification);
    }

    public function AllContactMessages() {
        $messages = Contact::latest()->get();
        return view('backend.contact.all_contact', compact('messages'));
    }

    public function ShowContactMessages($id) {
        $message = Contact::find($id);
        return view('backend.contact.show_contact', compact('message'));
    }

    public function DeleteContactMessages($id) {
        Contact::find($id)->delete();

        $notification = [
            'message' => 'Message Deleted Successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->route('all.contact.messages')->with($notification);
    }
}
