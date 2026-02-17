<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\InquiryController;
use App\Http\Controllers\Admin\SettingController;

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/products', [HomeController::class, 'products'])->name('products');
Route::get('/product/{slug}', [HomeController::class, 'productDetail'])->name('product.detail');
Route::get('/certificates', [HomeController::class, 'certificates'])->name('certificates');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact/submit', [HomeController::class, 'submitInquiry'])->name('contact.submit');

// Admin Routes
Route::prefix('admin')->group(function () {
    // Guest routes
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'login']);
    
    // Protected routes
    Route::middleware(['admin'])->group(function () {
        Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        
        // Category routes
        Route::resource('categories', CategoryController::class)->names([
            'index' => 'admin.categories.index',
            'create' => 'admin.categories.create',
            'store' => 'admin.categories.store',
            'edit' => 'admin.categories.edit',
            'update' => 'admin.categories.update',
            'destroy' => 'admin.categories.destroy',
        ]);
        
        // Product routes
        Route::resource('products', ProductController::class)->names([
            'index' => 'admin.products.index',
            'create' => 'admin.products.create',
            'store' => 'admin.products.store',
            'edit' => 'admin.products.edit',
            'update' => 'admin.products.update',
            'destroy' => 'admin.products.destroy',
        ]);
        
        // Certificate routes
        Route::resource('certificates', CertificateController::class)->names([
            'index' => 'admin.certificates.index',
            'create' => 'admin.certificates.create',
            'store' => 'admin.certificates.store',
            'edit' => 'admin.certificates.edit',
            'update' => 'admin.certificates.update',
            'destroy' => 'admin.certificates.destroy',
        ]);
        
        // Inquiry routes
        Route::get('/inquiries', [InquiryController::class, 'index'])->name('admin.inquiries.index');
        Route::get('/inquiries/{inquiry}', [InquiryController::class, 'show'])->name('admin.inquiries.show');
        Route::delete('/inquiries/{inquiry}', [InquiryController::class, 'destroy'])->name('admin.inquiries.destroy');
        Route::post('/inquiries/{inquiry}/mark-read', [InquiryController::class, 'markAsRead'])->name('admin.inquiries.mark-read');
        
        // Settings routes
        Route::get('/settings', [SettingController::class, 'index'])->name('admin.settings.index');
        Route::post('/settings', [SettingController::class, 'update'])->name('admin.settings.update');
    });
});