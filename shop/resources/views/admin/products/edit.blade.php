@extends('admin.layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-6xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-900">Edit Product</h1>
            <a href="{{ route('admin.products.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg">
                Back to Products
            </a>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- English Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Product Name (English)</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('name') border-red-500 @enderror"
                               placeholder="Enter product name">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Arabic Name -->
                    <div>
                        <label for="name_ar" class="block text-sm font-medium text-gray-700 mb-2">Product Name (Arabic)</label>
                        <input type="text" id="name_ar" name="name_ar" value="{{ old('name_ar', $product->name_ar) }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('name_ar') border-red-500 @enderror"
                               placeholder="اسم المنتج" dir="rtl">
                        @error('name_ar')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- English Description -->
                    <div class="md:col-span-2">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description (English)</label>
                        <textarea id="description" name="description" rows="3" 
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('description') border-red-500 @enderror"
                                  placeholder="Enter product description">{{ old('description', $product->description) }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Arabic Description -->
                    <div class="md:col-span-2">
                        <label for="description_ar" class="block text-sm font-medium text-gray-700 mb-2">Description (Arabic)</label>
                        <textarea id="description_ar" name="description_ar" rows="3" 
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('description_ar') border-red-500 @enderror"
                                  placeholder="وصف المنتج" dir="rtl">{{ old('description_ar', $product->description_ar) }}</textarea>
                        @error('description_ar')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Price -->
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700 mb-2">Price</label>
                        <input type="number" id="price" name="price" value="{{ old('price', $product->price) }}" step="0.01" min="0"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('price') border-red-500 @enderror"
                               placeholder="0.00">
                        @error('price')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Category Selection -->
                    <div>
                        <label for="category_id" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                        <select id="category_id" name="category_id" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('category_id') border-red-500 @enderror">
                            <option value="">Select a category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Legacy Category Fields (for backward compatibility) -->
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Category (Legacy)</label>
                        <input type="text" id="category" name="category" value="{{ old('category', $product->category) }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('category') border-red-500 @enderror"
                               placeholder="Enter category name">
                        @error('category')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="category_ar" class="block text-sm font-medium text-gray-700 mb-2">Category (Arabic)</label>
                        <input type="text" id="category_ar" name="category_ar" value="{{ old('category_ar', $product->category_ar) }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('category_ar') border-red-500 @enderror"
                               placeholder="اسم الفئة" dir="rtl">
                        @error('category_ar')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Product Image -->
                    <div class="md:col-span-2">
                        <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Product Image</label>
                        @if($product->image_path)
                            <div class="mb-4">
                                <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="h-32 w-32 rounded-lg object-cover">
                                <p class="mt-1 text-sm text-gray-500">Current image</p>
                            </div>
                        @endif
                        <input type="file" id="image" name="image" accept="image/*"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('image') border-red-500 @enderror">
                        <p class="mt-1 text-sm text-gray-500">Upload a new image to replace the current one (optional)</p>
                        @error('image')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Special Product Settings -->
                    <div class="md:col-span-2">
                        <div class="border border-gray-200 rounded-lg p-4">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Special Product Settings</h3>
                            
                            <div class="flex items-center mb-4">
                                <input type="checkbox" id="is_special" name="is_special" value="1" 
                                       {{ old('is_special', $product->is_special) ? 'checked' : '' }}
                                       class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                <label for="is_special" class="ml-2 block text-sm text-gray-900">
                                    Mark as Special Product (Show in Special Offers section)
                                </label>
                            </div>
                            
                            <div>
                                <label for="special_order" class="block text-sm font-medium text-gray-700 mb-2">Special Order (Display order in Special section)</label>
                                <input type="number" id="special_order" name="special_order" value="{{ old('special_order', $product->special_order) }}" min="1" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('special_order') border-red-500 @enderror"
                                       placeholder="1, 2, 3... (lower numbers appear first)">
                                @error('special_order')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Offers & Discounts Settings -->
                    <div class="md:col-span-2">
                        <div class="border border-gray-200 rounded-lg p-4">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Offers & Discounts</h3>
                            
                            <div class="flex items-center mb-4">
                                <input type="checkbox" id="has_offer" name="has_offer" value="1" 
                                       {{ old('has_offer', $product->has_offer) ? 'checked' : '' }}
                                       class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                <label for="has_offer" class="ml-2 block text-sm text-gray-900">
                                    Enable Offers & Discounts
                                </label>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="original_price" class="block text-sm font-medium text-gray-700 mb-2">Original Price</label>
                                    <input type="number" id="original_price" name="original_price" value="{{ old('original_price', $product->original_price) }}" step="0.01" min="0"
                                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('original_price') border-red-500 @enderror"
                                           placeholder="Original price before discount">
                                    @error('original_price')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="discount_percentage" class="block text-sm font-medium text-gray-700 mb-2">Discount Percentage</label>
                                    <input type="number" id="discount_percentage" name="discount_percentage" value="{{ old('discount_percentage', $product->discount_percentage) }}" step="0.01" min="0" max="100"
                                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('discount_percentage') border-red-500 @enderror"
                                           placeholder="0-100">
                                    @error('discount_percentage')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="offer_start_date" class="block text-sm font-medium text-gray-700 mb-2">Offer Start Date</label>
                                    <input type="date" id="offer_start_date" name="offer_start_date" value="{{ old('offer_start_date', $product->offer_start_date ? $product->offer_start_date->format('Y-m-d') : '') }}"
                                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('offer_start_date') border-red-500 @enderror">
                                    @error('offer_start_date')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="offer_end_date" class="block text-sm font-medium text-gray-700 mb-2">Offer End Date</label>
                                    <input type="date" id="offer_end_date" name="offer_end_date" value="{{ old('offer_end_date', $product->offer_end_date ? $product->offer_end_date->format('Y-m-d') : '') }}"
                                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('offer_end_date') border-red-500 @enderror">
                                    @error('offer_end_date')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="offer_title" class="block text-sm font-medium text-gray-700 mb-2">Offer Title (English)</label>
                                    <input type="text" id="offer_title" name="offer_title" value="{{ old('offer_title', $product->offer_title) }}" 
                                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('offer_title') border-red-500 @enderror"
                                           placeholder="e.g., Limited Time Offer">
                                    @error('offer_title')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="offer_title_ar" class="block text-sm font-medium text-gray-700 mb-2">Offer Title (Arabic)</label>
                                    <input type="text" id="offer_title_ar" name="offer_title_ar" value="{{ old('offer_title_ar', $product->offer_title_ar) }}" 
                                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('offer_title_ar') border-red-500 @enderror"
                                           placeholder="عرض لفترة محدودة" dir="rtl">
                                    @error('offer_title_ar')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div class="md:col-span-2">
                                    <label for="offer_description" class="block text-sm font-medium text-gray-700 mb-2">Offer Description (English)</label>
                                    <textarea id="offer_description" name="offer_description" rows="2" 
                                              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('offer_description') border-red-500 @enderror"
                                              placeholder="Brief description of the offer">{{ old('offer_description', $product->offer_description) }}</textarea>
                                    @error('offer_description')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div class="md:col-span-2">
                                    <label for="offer_description_ar" class="block text-sm font-medium text-gray-700 mb-2">Offer Description (Arabic)</label>
                                    <textarea id="offer_description_ar" name="offer_description_ar" rows="2" 
                                              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('offer_description_ar') border-red-500 @enderror"
                                              placeholder="وصف مختصر للعرض" dir="rtl">{{ old('offer_description_ar', $product->offer_description_ar) }}</textarea>
                                    @error('offer_description_ar')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end space-x-4 mt-8">
                    <a href="{{ route('admin.products.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg">
                        Cancel
                    </a>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
                        Update Product
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
