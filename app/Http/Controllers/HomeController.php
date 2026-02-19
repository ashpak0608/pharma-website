<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Certificate;
use App\Models\Setting;
use App\Models\Inquiry;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', 1)->get();
        $settings = Setting::pluck('key_value', 'key_name')->toArray();
        
        return view('home', compact('categories', 'settings'));
    }

    public function about()
    {
        $settings = Setting::pluck('key_value', 'key_name')->toArray();
        return view('about', compact('settings'));
    }

    public function products(Request $request)
    {
        $query = Product::with('category')->where('status', 1);
        
        // Search functionality
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('composition', 'LIKE', "%{$search}%")
                  ->orWhere('description', 'LIKE', "%{$search}%");
            });
        }
        
        // Category filter
        if ($request->has('category') && !empty($request->category)) {
            $query->where('category_id', $request->category);
        }
        
        // Pagination - 9 products per page
        $products = $query->paginate(9)->withQueryString();
        
        // Get all categories for filter dropdown
        $categories = Category::where('status', 1)->get();
        $settings = Setting::pluck('key_value', 'key_name')->toArray();
        
        return view('products', compact('products', 'categories', 'settings'));
    }

    public function productDetail($slug)
    {
        $product = Product::with('category')->where('slug', $slug)->firstOrFail();
        $settings = Setting::pluck('key_value', 'key_name')->toArray();
        return view('product-detail', compact('product', 'settings'));
    }

    public function certificates()
    {
        $certificates = Certificate::all();
        $settings = Setting::pluck('key_value', 'key_name')->toArray();
        return view('certificates', compact('certificates', 'settings'));
    }

    public function contact()
    {
        $settings = Setting::pluck('key_value', 'key_name')->toArray();
        return view('contact', compact('settings'));
    }

    public function submitInquiry(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string'
        ]);

        Inquiry::create($request->all());

        return redirect()->back()->with('success', 'Thank you for your inquiry. We will contact you soon.');
    }
}