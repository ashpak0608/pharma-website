<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::with('products')
            ->where('status', 1)
            ->get();
            
        return view('products', compact('categories'));
    }

    public function show($slug)
    {
        $product = Product::with('category')
            ->where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();
            
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('status', 1)
            ->limit(4)
            ->get();
            
        return view('product-detail', compact('product', 'relatedProducts'));
    }
}