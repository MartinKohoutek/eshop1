<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SiteSettingController extends Controller
{
    public function SiteSetting() {
        $settings = SiteSetting::find(1);
        return view('backend.settings.setting_update', compact('settings'));
    }

    public function SiteSettingUpdate(Request $request) {
        $settings = SiteSetting::find($request->id);
        if ($request->file('logo')) {
            if (file_exists($settings->logo)) {
                unlink($settings->logo);
            }

            $image = $request->file('logo');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(180, 56)->save('upload/logo/'.$name_gen);
            $save_url = '/upload/logo/'.$name_gen;
            $settings->update(['logo' => $save_url]);
        }

        $settings->update([
            'support_phone' => $request->support_phone,
            'phone_one' => $request->phone_one,
            'email' => $request->email,
            'company_address' => $request->company_address,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,
            'twitter' => $request->twitter,
            'copyright' => $request->copyright,
            'working_days' => $request->working_days,
        ]);

        $notification = [
            'message' => 'Site Settings Updated Successfully!',
            'alert-message' => 'success',
        ];

        return redirect()->back()->with($notification);
    }
}
