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

// Public Routes with Language Support
Route::group(['prefix' => '{locale?}', 'where' => ['locale' => 'en|ar']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/about', [HomeController::class, 'about'])->name('about');
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

    // Product Routes
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
});

// Admin Routes (Protected) - No language prefix needed
Route::prefix('admin')->name('admin.')->middleware(['admin'])->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // Product Management
    Route::resource('products', AdminProductController::class);
    
    // Site Settings Management
    Route::get('/settings', [AdminSiteSettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [AdminSiteSettingController::class, 'update'])->name('settings.update');
    Route::post('/settings/reset', [AdminSiteSettingController::class, 'resetToDefaults'])->name('settings.reset');
});

// Simple admin login (for demo purposes)
Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login');

Route::post('/admin/login', function () {
    $credentials = request()->only('email', 'password');
    
    // Hardcoded admin credentials for demo
    if ($credentials['email'] === 'admin@example.com' && $credentials['password'] === 'password') {
        session(['admin_logged_in' => true]);
        return redirect()->route('admin.dashboard');
    }
    
    return back()->withErrors(['email' => 'Invalid credentials']);
})->name('admin.login.post');

Route::post('/admin/logout', function () {
    session()->forget('admin_logged_in');
    return redirect()->route('home');
})->name('admin.logout');

// Redirect root to default language
Route::get('/', function () {
    return redirect('/' . (session('locale', 'en')));
});
