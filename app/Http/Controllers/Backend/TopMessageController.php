<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TopMessage;
use Illuminate\Http\Request;

class TopMessageController extends Controller
{
    public function UpdateTopMessage() {
        $topMessage = TopMessage::find(1);
        return view('backend.topmessage.update_top_message', compact('topMessage'));
    }

    public function StoreTopMessage(Request $request) {
        TopMessage::findOrFail(1)->update([
            'status' => ($request->status) ? 'active' : 'inactive',
            'message' => $request->message,
            'link' => $request->link,
            'link_text' => $request->link_text,
        ]);
        
        $notification = [
            'message' => 'Top Message Updated Successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }
}
