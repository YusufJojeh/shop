<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminSiteSettingController;
use Illuminate\Support\Facades\Route;

// Language switching route
Route::get('/language/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ar'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('language.switch');

// Redirect root to default language
Route::get('/', function () {
    return redirect('/' . (session('locale', 'en')));
});

// English Routes
Route::prefix('en')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/about', [HomeController::class, 'about'])->name('about');
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
});

// Arabic Routes
Route::prefix('ar')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/about', [HomeController::class, 'about'])->name('about');
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
});

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/login', function () {
        return view('admin.login');
    })->name('admin.login');
    
    Route::post('/login', function () {
        $email = request('email');
        $password = request('password');
        
        if ($email === 'admin@example.com' && $password === 'password') {
            session(['admin_logged_in' => true]);
            return redirect()->route('admin.dashboard');
        }
        
        return back()->withErrors(['email' => 'Invalid credentials']);
    })->name('admin.login.post');
    
    Route::middleware('admin')->group(function () {
        Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/logout', function () {
            session()->forget('admin_logged_in');
            return redirect()->route('admin.login');
        })->name('admin.logout');
        
        // Products
        Route::resource('products', AdminProductController::class, ['as' => 'admin']);
        
        // Categories
        Route::resource('categories', AdminCategoryController::class, ['as' => 'admin']);
        
        // Site Settings
        Route::get('/settings', [AdminSiteSettingController::class, 'index'])->name('admin.settings.index');
        Route::post('/settings', [AdminSiteSettingController::class, 'update'])->name('admin.settings.update');
        Route::post('/settings/reset', [AdminSiteSettingController::class, 'resetToDefaults'])->name('admin.settings.reset');
    });
});
