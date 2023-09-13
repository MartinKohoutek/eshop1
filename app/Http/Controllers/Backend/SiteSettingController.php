<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    public function SiteSetting() {
        $settings = SiteSetting::find(1);
        return view('backend.settings.setting_update', compact('settings'));
    }
}
