<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::latest()->take(6)->get();
        
        // Get categories based on current locale
        $locale = app()->getLocale();
        if ($locale === 'ar') {
            $categories = Product::distinct()->pluck('category_ar')->filter();
        } else {
            $categories = Product::distinct()->pluck('category');
        }
        
        // Get trend products - products created in the last 30 days or random selection
        $trendProducts = Product::where('created_at', '>=', now()->subDays(30))
            ->orWhere(function($query) {
                $query->inRandomOrder();
            })
            ->take(8)
            ->get();
        
        // If we don't have enough recent products, fill with random ones
        if ($trendProducts->count() < 8) {
            $additionalProducts = Product::inRandomOrder()
                ->whereNotIn('id', $trendProducts->pluck('id'))
                ->take(8 - $trendProducts->count())
                ->get();
            $trendProducts = $trendProducts->merge($additionalProducts);
        }
        
        // Get site settings
        $settings = SiteSetting::all()->keyBy('key');
        
        return view('home', compact('featuredProducts', 'categories', 'trendProducts', 'settings'));
    }

    public function about()
    {
        $settings = SiteSetting::all()->keyBy('key');
        return view('about', compact('settings'));
    }

    public function contact()
    {
        $settings = SiteSetting::all()->keyBy('key');
        return view('contact', compact('settings'));
    }
}
