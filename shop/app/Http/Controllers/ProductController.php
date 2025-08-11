<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $query = Product::with('category');
        
        // Filter by category if provided
        if (request('category')) {
            $query->where('category_id', request('category'));
        }
        
        $products = $query->latest()->paginate(12);
        $categories = Category::active()->ordered()->get();
        
        return view('products.index', compact('products', 'categories'));
    }

    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);
        
        // Get related products from the same category
        $relatedProducts = Product::where('id', '!=', $product->id)
            ->where(function($query) use ($product) {
                if ($product->category_id) {
                    $query->where('category_id', $product->category_id);
                } else {
                    $query->where('category', $product->category);
                }
            })
            ->take(4)
            ->get();
        
        return view('products.show', compact('product', 'relatedProducts'));
    }
}
