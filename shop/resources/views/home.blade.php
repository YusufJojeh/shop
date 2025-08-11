@extends('layouts.app')

@section('title', __('messages.home'))

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-blue-600 to-purple-600 text-white overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-20"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
                    {{ $settings['hero_title']->value ?? __('messages.hero_title') }}
                </h1>
                <p class="text-xl md:text-2xl mb-8 text-blue-100 leading-relaxed">
                    {{ $settings['hero_subtitle']->value ?? __('messages.hero_subtitle') }}
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                                    <a href="{{ route('products.index', ['locale' => app()->getLocale()]) }}" class="bg-white text-blue-600 px-8 py-4 rounded-lg font-semibold text-lg hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 inline-block text-center">
                    {{ $settings['hero_button_text']->value ?? __('messages.hero_button') }}
                </a>
                <a href="{{ route('about', ['locale' => app()->getLocale()]) }}" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold text-lg hover:bg-white hover:text-blue-600 transition-all duration-300 inline-block text-center">
                    {{ __('messages.read_more') }}
                </a>
                </div>
            </div>
            <div class="hidden lg:block">
                @if($settings['hero_image']->value)
                    <img src="{{ Storage::url($settings['hero_image']->value) }}" alt="Hero Image" class="w-full h-auto rounded-lg shadow-2xl">
                @else
                    <div class="bg-white bg-opacity-10 rounded-lg p-12 text-center">
                        <svg class="w-32 h-32 mx-auto mb-4 text-white opacity-50" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                        </svg>
                        <p class="text-white opacity-75">Hero Image</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Quick Stats Section -->
<section class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="text-3xl font-bold text-blue-600 mb-2">{{ $featuredProducts->count() }}+</div>
                <div class="text-gray-600">{{ __('messages.total_products') }}</div>
            </div>
            <div class="text-center">
                <div class="text-3xl font-bold text-purple-600 mb-2">{{ $categories->count() }}</div>
                <div class="text-gray-600">{{ __('messages.categories') }}</div>
            </div>
            <div class="text-center">
                <div class="text-3xl font-bold text-green-600 mb-2">24/7</div>
                <div class="text-gray-600">{{ __('messages.customer_support') }}</div>
            </div>
        </div>
    </div>
</section>

<!-- Trending Products Slider Section -->
@if($settings['show_trending_section']->value ?? true)
<section class="py-16 bg-gradient-to-r from-gray-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">🔥 {{ __('messages.trending_products') }}</h2>
            <p class="text-lg text-gray-600">{{ __('messages.discover_trending') }}</p>
        </div>
        
        <div class="relative">
            <!-- Slider Container -->
            <div class="overflow-hidden">
                <div id="trendSlider" class="flex transition-transform duration-500 ease-in-out">
                    @foreach($trendProducts as $product)
                    <div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 flex-shrink-0 px-3">
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                            <div class="relative h-64 bg-gray-200">
                                @if($product->image_path)
                                    <img src="{{ Storage::url($product->image_path) }}" alt="{{ $product->localized_name }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-blue-100 to-purple-100">
                                        <div class="text-center text-gray-400">
                                            <svg class="w-16 h-16 mx-auto mb-2" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                                            </svg>
                                            <p class="text-sm">No Image</p>
                                        </div>
                                    </div>
                                @endif
                                <!-- Trend Badge -->
                                <div class="absolute top-3 left-3">
                                    <span class="bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full animate-pulse">
                                        🔥 TRENDING
                                    </span>
                                </div>
                                <!-- Price Badge -->
                                <div class="absolute top-3 right-3">
                                    <span class="bg-green-500 text-white text-sm font-bold px-3 py-1 rounded-full">
                                        {{ $settings['currency_symbol']->value ?? '$' }}{{ number_format($product->price, 2) }}
                                    </span>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="flex items-center justify-between mb-3">
                                    <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">{{ $product->localized_category }}</span>
                                </div>
                                <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-1">{{ $product->localized_name }}</h3>
                                <p class="text-gray-600 mb-4 text-sm line-clamp-2">{{ Str::limit($product->localized_description, 80) }}</p>
                                <a href="{{ route('products.show', ['locale' => app()->getLocale(), 'id' => $product->id]) }}" class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white py-3 px-4 rounded-lg hover:from-blue-700 hover:to-purple-700 transition-all duration-300 text-center block font-semibold transform hover:scale-105">
                                    {{ __('messages.view_details') }} →
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            
            <!-- Navigation Arrows -->
            <button id="prevBtn" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-white rounded-full p-3 shadow-lg hover:shadow-xl transition-all duration-300 z-10">
                <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            <button id="nextBtn" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-white rounded-full p-3 shadow-lg hover:shadow-xl transition-all duration-300 z-10">
                <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
            
            <!-- Dots Indicator -->
            <div class="flex justify-center mt-8 space-x-2">
                @for($i = 0; $i < ceil($trendProducts->count() / 4); $i++)
                <button class="slider-dot w-3 h-3 rounded-full bg-gray-300 hover:bg-blue-500 transition-colors duration-300 {{ $i === 0 ? 'bg-blue-500' : '' }}" data-slide="{{ $i }}"></button>
                @endfor
            </div>
        </div>
    </div>
</section>
@endif

<!-- Special Products Section -->
@if($settings['show_special_products_section']->value ?? true)
<section class="py-16 bg-gradient-to-r from-yellow-50 to-orange-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">⭐ {{ $settings['special_products_title']->value ?? __('messages.special_products_title') }}</h2>
            <p class="text-lg text-gray-600">{{ $settings['special_products_subtitle']->value ?? __('messages.special_products_subtitle') }}</p>
        </div>
        
        @if($specialProducts->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($specialProducts as $product)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border-2 border-yellow-200">
                <div class="relative h-48 bg-gray-200">
                    @if($product->image_path)
                        <img src="{{ Storage::url($product->image_path) }}" alt="{{ $product->localized_name }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-yellow-100 to-orange-100">
                            <div class="text-center text-gray-400">
                                <svg class="w-16 h-16 mx-auto mb-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                                </svg>
                                <p class="text-sm">No Image</p>
                            </div>
                        </div>
                    @endif
                    <!-- Special Badge -->
                    <div class="absolute top-3 left-3">
                        <span class="bg-yellow-500 text-white text-xs font-bold px-2 py-1 rounded-full animate-pulse">
                            ⭐ SPECIAL
                        </span>
                    </div>
                    <!-- Price Badge -->
                    <div class="absolute top-3 right-3">
                        <span class="bg-green-500 text-white text-sm font-bold px-3 py-1 rounded-full">
                            {{ $settings['currency_symbol']->value ?? '$' }}{{ number_format($product->price, 2) }}
                        </span>
                    </div>
                </div>
                <div class="p-4">
                    <div class="flex items-center justify-between mb-2">
                        <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full">{{ $product->localized_category }}</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-1">{{ $product->localized_name }}</h3>
                    <p class="text-gray-600 mb-4 text-sm line-clamp-2">{{ Str::limit($product->localized_description, 60) }}</p>
                    <a href="{{ route('products.show', ['locale' => app()->getLocale(), 'id' => $product->id]) }}" class="w-full bg-gradient-to-r from-yellow-500 to-orange-500 text-white py-2 px-4 rounded-lg hover:from-yellow-600 hover:to-orange-600 transition-all duration-300 text-center block font-semibold transform hover:scale-105">
                        {{ __('messages.view_details') }} →
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-12">
            <div class="text-gray-400 mb-4">
                <svg class="w-24 h-24 mx-auto" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z" clip-rule="evenodd" />
                </svg>
            </div>
            <h3 class="text-lg font-medium text-gray-900 mb-2">No Special Products Yet</h3>
            <p class="text-gray-500">Mark products as special in the admin panel to display them here.</p>
        </div>
        @endif
    </div>
</section>
@endif

<!-- Offers & Discounts Section -->
@if($settings['show_offers_section']->value ?? true)
<section class="py-16 bg-gradient-to-r from-red-50 to-pink-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">🔥 {{ $settings['offers_title']->value ?? __('messages.offers_title') }}</h2>
            <p class="text-lg text-gray-600">{{ $settings['offers_subtitle']->value ?? __('messages.offers_subtitle') }}</p>
        </div>
        
        @if($offerProducts->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($offerProducts as $product)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border-2 border-red-200">
                <div class="relative">
                    @if($product->image_path)
                        <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->localized_name }}" class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    @endif
                    <div class="absolute top-2 right-2">
                        <span class="bg-red-500 text-white px-2 py-1 rounded-full text-xs font-bold">-{{ $product->discount_percentage }}%</span>
                    </div>
                    @if($product->localized_offer_title)
                    <div class="absolute top-2 left-2">
                        <span class="bg-orange-500 text-white px-2 py-1 rounded-full text-xs font-bold">{{ $product->localized_offer_title }}</span>
                    </div>
                    @endif
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $product->localized_name }}</h3>
                    <p class="text-gray-600 text-sm mb-4">{{ Str::limit($product->localized_description, 80) }}</p>
                    <div class="flex justify-between items-center mb-4">
                        <div>
                            <span class="text-2xl font-bold text-red-600">${{ number_format($product->discounted_price, 2) }}</span>
                            @if($product->original_price)
                            <span class="text-sm text-gray-500 line-through ml-2">${{ number_format($product->original_price, 2) }}</span>
                            @endif
                        </div>
                        <span class="text-sm text-gray-500">{{ $product->localized_category }}</span>
                    </div>
                    @if($product->localized_offer_description)
                    <p class="text-sm text-orange-600 mb-4">{{ $product->localized_offer_description }}</p>
                    @endif
                    <a href="{{ route('products.show', ['locale' => app()->getLocale(), 'id' => $product->id]) }}" 
                       class="block w-full bg-red-500 hover:bg-red-600 text-white text-center py-2 px-4 rounded-lg font-semibold transition-colors">
                        {{ __('messages.view_details') }}
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-12">
            <h3 class="text-lg font-medium text-gray-900 mb-2">No Active Offers</h3>
            <p class="text-gray-500">Add offers and discounts to products in the admin panel to display them here.</p>
        </div>
        @endif
    </div>
</section>
@endif

<!-- Features Section -->
@if($settings['show_features_section']->value ?? true)
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ $settings['features_title']->value ?? __('messages.features_title') }}</h2>
            <p class="text-lg text-gray-600">{{ __('messages.features_subtitle') }}</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center p-6 rounded-lg hover:bg-gray-50 transition-colors duration-300">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $settings['feature_1_title']->value ?? __('messages.fast_shipping') }}</h3>
                <p class="text-gray-600">{{ $settings['feature_1_description']->value ?? __('messages.fast_shipping_desc') }}</p>
            </div>
            
            <div class="text-center p-6 rounded-lg hover:bg-gray-50 transition-colors duration-300">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $settings['feature_2_title']->value ?? __('messages.quality_products') }}</h3>
                <p class="text-gray-600">{{ $settings['feature_2_description']->value ?? __('messages.quality_products_desc') }}</p>
            </div>
            
            <div class="text-center p-6 rounded-lg hover:bg-gray-50 transition-colors duration-300">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M12 2.25a9.75 9.75 0 109.75 9.75A9.75 9.75 0 0012 2.25z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $settings['feature_3_title']->value ?? __('messages.customer_support') }}</h3>
                <p class="text-gray-600">{{ $settings['feature_3_description']->value ?? __('messages.customer_support_desc') }}</p>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Featured Products Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ __('messages.featured_products') }}</h2>
            <p class="text-lg text-gray-600">{{ __('messages.featured_subtitle') }}</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($featuredProducts as $product)
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
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">{{ $product->localized_category }}</span>
                        <span class="text-2xl font-bold text-gray-900">{{ $settings['currency_symbol']->value ?? '$' }}{{ number_format($product->price, 2) }}</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $product->localized_name }}</h3>
                    <p class="text-gray-600 mb-4 line-clamp-2">{{ Str::limit($product->localized_description, 100) }}</p>
                    <a href="{{ route('products.show', ['locale' => app()->getLocale(), 'id' => $product->id]) }}" class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors text-center block">
                        {{ __('messages.view_details') }}
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="text-center mt-12">
            <a href="{{ route('products.index', ['locale' => app()->getLocale()]) }}" class="bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                {{ __('messages.view_all_products') }}
            </a>
        </div>
    </div>
</section>

<!-- About Section -->
@if($settings['show_about_section']->value ?? true)
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">{{ $settings['about_title']->value ?? __('messages.about_title') }}</h2>
                <p class="text-lg text-gray-600 mb-6 leading-relaxed">
                    {{ $settings['about_content']->value ?? __('messages.about_content') }}
                </p>
                <a href="{{ route('about', ['locale' => app()->getLocale()]) }}" class="bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                    {{ __('messages.learn_more') }}
                </a>
            </div>
            <div class="bg-gray-200 rounded-lg h-96 flex items-center justify-center">
                @if($settings['about_image']->value)
                    <img src="{{ Storage::url($settings['about_image']->value) }}" alt="About Us" class="w-full h-full object-cover rounded-lg">
                @else
                    <div class="text-center text-gray-400">
                        <svg class="w-24 h-24 mx-auto mb-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                        </svg>
                        <p class="text-lg">About Image</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endif

<!-- CTA Section -->
<section class="py-16 bg-gradient-to-r from-blue-600 to-purple-600 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">{{ __('messages.cta_title') }}</h2>
        <p class="text-xl mb-8 text-blue-100">{{ __('messages.cta_subtitle') }}</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('products.index', ['locale' => app()->getLocale()]) }}" class="bg-white text-blue-600 px-8 py-4 rounded-lg font-semibold text-lg hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 inline-block">
                {{ __('messages.cta_button') }}
            </a>
            <a href="{{ route('contact', ['locale' => app()->getLocale()]) }}" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold text-lg hover:bg-white hover:text-blue-600 transition-all duration-300 inline-block">
                {{ __('messages.contact') }}
            </a>
        </div>
    </div>
</section>
@endsection
