<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalProducts = Product::count();
        $specialProductsCount = Product::where('is_special', true)->count();
        $activeOffersCount = Product::activeOffers()->count();
        $totalCategories = Category::count();
        $recentProducts = Product::latest()->take(5)->get();
        
        return view('admin.dashboard', compact('totalProducts', 'specialProductsCount', 'activeOffersCount', 'totalCategories', 'recentProducts'));
    }
}
