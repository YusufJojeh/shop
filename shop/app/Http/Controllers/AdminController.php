<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalProducts = Product::count();
        $recentProducts = Product::latest()->take(5)->get();
        
        return view('admin.dashboard', compact('totalProducts', 'recentProducts'));
    }
}
