<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Inquiry;
use App\Models\Certificate;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCategories = Category::count();
        $totalProducts = Product::count();
        $totalInquiries = Inquiry::count();
        $totalCertificates = Certificate::count();
        $recentInquiries = Inquiry::latest()->take(5)->get();
        
        return view('admin.dashboard', compact('totalCategories', 'totalProducts', 'totalInquiries', 'totalCertificates', 'recentInquiries'));
    }
}