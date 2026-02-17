<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $settings = Setting::pluck('key_value', 'key_name')->toArray();
        return view('about', compact('settings'));
    }
}