<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();
        
        if ($request->has('category') && $request->category !== 'all') {
            $locale = app()->getLocale();
            if ($locale === 'ar') {
                $query->where('category_ar', $request->category);
            } else {
                $query->where('category', $request->category);
            }
        }
        
        $products = $query->latest()->paginate(12);
        
        // Get categories based on current locale
        $locale = app()->getLocale();
        if ($locale === 'ar') {
            $categories = Product::distinct()->pluck('category_ar')->filter();
        } else {
            $categories = Product::distinct()->pluck('category');
        }
        
        return view('products.index', compact('products', 'categories'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        
        $locale = app()->getLocale();
        if ($locale === 'ar' && $product->category_ar) {
            $relatedProducts = Product::where('category_ar', $product->category_ar)
                ->where('id', '!=', $product->id)
                ->take(4)
                ->get();
        } else {
            $relatedProducts = Product::where('category', $product->category)
                ->where('id', '!=', $product->id)
                ->take(4)
                ->get();
        }
            
        return view('products.show', compact('product', 'relatedProducts'));
    }
}
