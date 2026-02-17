<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::pluck('key_value', 'key_name')->toArray();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->except('_token');
        
        foreach ($data as $key => $value) {
            Setting::updateOrCreate(
                ['key_name' => $key],
                ['key_value' => $value]
            );
        }

        return redirect()->back()->with('success', 'Settings updated successfully');
    }
}