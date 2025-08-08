@extends('layouts.app')

@section('title', __('messages.products'))

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">{{ __('messages.our_products') }}</h1>
            <p class="text-xl text-indigo-100">{{ __('messages.discover_collection') }}</p>
        </div>
    </div>
</section>

<!-- Filters and Products -->
<section class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Category Filters -->
        <div class="mb-8">
            <div class="flex flex-wrap gap-4 justify-center">
                <a href="{{ route('products.index', ['locale' => app()->getLocale()]) }}" 
                   class="px-6 py-2 rounded-full {{ request('category') == null ? 'bg-indigo-600 text-white' : 'bg-white text-gray-700 hover:bg-gray-100' }} transition-colors">
                    {{ __('messages.all_categories') }}
                </a>
                @foreach($categories as $category)
                <a href="{{ route('products.index', ['locale' => app()->getLocale(), 'category' => $category]) }}" 
                   class="px-6 py-2 rounded-full {{ request('category') == $category ? 'bg-indigo-600 text-white' : 'bg-white text-gray-700 hover:bg-gray-100' }} transition-colors">
                    {{ $category }}
                </a>
                @endforeach
            </div>
        </div>

        <!-- Products Grid -->
        @if($products->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @foreach($products as $product)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="h-64 bg-gray-200 flex items-center justify-center">
                    @if($product->image_path)
                        <img src="{{ Storage::url($product->image_path) }}" alt="{{ $product->localized_name }}" class="w-full h-full object-cover">
                    @else
                        <div class="text-gray-400 text-center">
                            <svg class="w-16 h-16 mx-auto mb-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                            </svg>
                            <p class="text-sm">No Image</p>
                        </div>
                    @endif
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-2">
                        <span class="bg-indigo-100 text-indigo-800 text-xs font-medium px-2.5 py-0.5 rounded">{{ $product->category }}</span>
                        <span class="text-2xl font-bold text-gray-900">${{ number_format($product->price, 2) }}</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $product->localized_name }}</h3>
                    <p class="text-gray-600 mb-4 line-clamp-2">{{ Str::limit($product->localized_description, 100) }}</p>
                    <a href="{{ route('products.show', ['locale' => app()->getLocale(), 'id' => $product->id]) }}" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 transition-colors text-center block">
                        {{ __('messages.view_details') }}
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-12">
            {{ $products->links() }}
        </div>
        @else
        <div class="text-center py-12">
            <div class="text-gray-400 mb-4">
                <svg class="w-24 h-24 mx-auto" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z" clip-rule="evenodd" />
                </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ __('messages.no_products') }}</h3>
            <p class="text-gray-600">{{ __('messages.try_different_category') }}</p>
        </div>
        @endif
    </div>
</section>
@endsection
