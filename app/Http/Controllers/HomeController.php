<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Certificate;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', 1)->get();
        $featuredProducts = Product::where('status', 1)->latest()->take(6)->get();
        $certificates = Certificate::latest()->take(4)->get();
        $settings = Setting::pluck('key_value', 'key_name')->toArray();
        
        return view('home', compact('categories', 'featuredProducts', 'certificates', 'settings'));
    }

    public function about()
    {
        $settings = Setting::pluck('key_value', 'key_name')->toArray();
        return view('about', compact('settings'));
    }

    public function products()
    {
        $categories = Category::with('products')->where('status', 1)->get();
        return view('products', compact('categories'));
    }

    public function productDetail($slug)
    {
        $product = Product::with('category')->where('slug', $slug)->firstOrFail();
        return view('product-detail', compact('product'));
    }

    public function certificates()
    {
        $certificates = Certificate::all();
        return view('certificates', compact('certificates'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function submitInquiry(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required'
        ]);

        Inquiry::create($request->all());

        return redirect()->back()->with('success', 'Thank you for your inquiry. We will contact you soon.');
    }
}