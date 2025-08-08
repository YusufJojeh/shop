@extends('layouts.app')

@section('title', $product->localized_name)

@section('content')
<!-- Product Detail Section -->
<section class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Product Image -->
            <div class="space-y-4">
                <div class="bg-gray-200 rounded-lg overflow-hidden">
                    @if($product->image_path)
                        <img src="{{ Storage::url($product->image_path) }}" alt="{{ $product->localized_name }}" class="w-full h-96 object-cover">
                    @else
                        <div class="w-full h-96 flex items-center justify-center text-gray-400">
                            <div class="text-center">
                                <svg class="w-24 h-24 mx-auto mb-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                                </svg>
                                <p class="text-lg">No Image Available</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Product Info -->
            <div class="space-y-6">
                <div>
                    <span class="bg-indigo-100 text-indigo-800 text-sm font-medium px-3 py-1 rounded-full">{{ $product->localized_category }}</span>
                </div>
                
                <h1 class="text-4xl font-bold text-gray-900">{{ $product->localized_name }}</h1>
                
                <div class="text-4xl font-bold text-indigo-600">
                    ${{ number_format($product->price, 2) }}
                </div>
                
                <div class="prose prose-lg text-gray-600">
                    <p>{{ $product->localized_description }}</p>
                </div>
                
                <div class="border-t border-gray-200 pt-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Product Features</h3>
                    <ul class="space-y-2 text-gray-600">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            Premium quality materials
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            Expert craftsmanship
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            Designed for durability
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            Customer satisfaction guaranteed
                        </li>
                    </ul>
                </div>
                
                <div class="flex space-x-4">
                    <a href="{{ route('contact', ['locale' => app()->getLocale()]) }}" class="flex-1 bg-indigo-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-indigo-700 transition-colors text-center">
                        Contact Us
                    </a>
                    <a href="{{ route('products.index', ['locale' => app()->getLocale()]) }}" class="flex-1 bg-gray-200 text-gray-700 py-3 px-6 rounded-lg font-semibold hover:bg-gray-300 transition-colors text-center">
                        View All Products
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Products Section -->
@if($relatedProducts->count() > 0)
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Related Products</h2>
            <p class="text-lg text-gray-600">You might also like these products</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($relatedProducts as $relatedProduct)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="h-48 bg-gray-200 flex items-center justify-center">
                    @if($relatedProduct->image_path)
                        <img src="{{ Storage::url($relatedProduct->image_path) }}" alt="{{ $relatedProduct->localized_name }}" class="w-full h-full object-cover">
                    @else
                        <div class="text-gray-400 text-center">
                            <svg class="w-12 h-12 mx-auto mb-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                            </svg>
                            <p class="text-xs">No Image</p>
                        </div>
                    @endif
                </div>
                <div class="p-4">
                    <div class="flex items-center justify-between mb-2">
                        <span class="bg-indigo-100 text-indigo-800 text-xs font-medium px-2 py-0.5 rounded">{{ $relatedProduct->localized_category }}</span>
                        <span class="text-lg font-bold text-gray-900">${{ number_format($relatedProduct->price, 2) }}</span>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $relatedProduct->localized_name }}</h3>
                    <p class="text-gray-600 mb-4 text-sm line-clamp-2">{{ Str::limit($relatedProduct->localized_description, 80) }}</p>
                    <a href="{{ route('products.show', ['locale' => app()->getLocale(), 'id' => $relatedProduct->id]) }}" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 transition-colors text-center block text-sm">
                        View Details
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection
