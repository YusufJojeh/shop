<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::active()->ordered()->get();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'name_ar' => 'nullable|string|max:255',
            'description' => 'required|string',
            'description_ar' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category' => 'nullable|string|max:255',
            'category_ar' => 'nullable|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_special' => 'boolean',
            'special_order' => 'nullable|integer|min:1',
            'has_offer' => 'boolean',
            'original_price' => 'nullable|numeric|min:0',
            'discount_percentage' => 'nullable|numeric|min:0|max:100',
            'offer_start_date' => 'nullable|date',
            'offer_end_date' => 'nullable|date|after_or_equal:offer_start_date',
            'offer_title' => 'nullable|string|max:255',
            'offer_title_ar' => 'nullable|string|max:255',
            'offer_description' => 'nullable|string',
            'offer_description_ar' => 'nullable|string'
        ]);

        $data = $request->only([
            'name', 'name_ar', 'description', 'description_ar', 'price',
            'category', 'category_ar', 'category_id', 'is_special', 'special_order',
            'has_offer', 'original_price', 'discount_percentage', 'offer_start_date',
            'offer_end_date', 'offer_title', 'offer_title_ar', 'offer_description', 'offer_description_ar'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $data['image_path'] = $imagePath;
        }

        Product::create($data);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $categories = Category::active()->ordered()->get();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'name_ar' => 'nullable|string|max:255',
            'description' => 'required|string',
            'description_ar' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category' => 'nullable|string|max:255',
            'category_ar' => 'nullable|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_special' => 'boolean',
            'special_order' => 'nullable|integer|min:1',
            'has_offer' => 'boolean',
            'original_price' => 'nullable|numeric|min:0',
            'discount_percentage' => 'nullable|numeric|min:0|max:100',
            'offer_start_date' => 'nullable|date',
            'offer_end_date' => 'nullable|date|after_or_equal:offer_start_date',
            'offer_title' => 'nullable|string|max:255',
            'offer_title_ar' => 'nullable|string|max:255',
            'offer_description' => 'nullable|string',
            'offer_description_ar' => 'nullable|string'
        ]);

        $data = $request->only([
            'name', 'name_ar', 'description', 'description_ar', 'price',
            'category', 'category_ar', 'category_id', 'is_special', 'special_order',
            'has_offer', 'original_price', 'discount_percentage', 'offer_start_date',
            'offer_end_date', 'offer_title', 'offer_title_ar', 'offer_description', 'offer_description_ar'
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($product->image_path) {
                Storage::disk('public')->delete($product->image_path);
            }
            
            $imagePath = $request->file('image')->store('products', 'public');
            $data['image_path'] = $imagePath;
        }

        $product->update($data);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        // Delete image if exists
        if ($product->image_path) {
            Storage::disk('public')->delete($product->image_path);
        }

        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Product deleted successfully.');
    }
}
