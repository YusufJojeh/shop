<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\SiteSetting;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::latest()->take(6)->get();
        
        // Get special products for the special products section
        $specialProducts = Product::where('is_special', true)
            ->orderBy('special_order')
            ->orderBy('created_at', 'desc')
            ->take(8)
            ->get();
        
        // Get products with active offers for the offers section
        $offerProducts = Product::activeOffers()
            ->orderBy('discount_percentage', 'desc')
            ->take(8)
            ->get();
        
        // Get categories for filtering
        $categories = Category::active()->ordered()->get();
        
        // Get trending products (most recent)
        $trendProducts = Product::latest()->take(8)->get();
        
        // Get site settings
        $settings = SiteSetting::getByGroup();
        
        return view('home', compact('featuredProducts', 'specialProducts', 'offerProducts', 'categories', 'trendProducts', 'settings'));
    }

    public function about()
    {
        $settings = SiteSetting::getByGroup();
        return view('about', compact('settings'));
    }

    public function contact()
    {
        $settings = SiteSetting::getByGroup();
        return view('contact', compact('settings'));
    }
}
