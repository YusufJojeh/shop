@extends('layouts.app')

@section('title', __('messages.about'))

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-24">
    <div class="absolute inset-0 bg-black opacity-20"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">{{ __('messages.about_our_brand') }}</h1>
            <p class="text-xl md:text-2xl text-indigo-100">{{ __('messages.discover_story_mission') }}</p>
        </div>
    </div>
</section>

<!-- Our Story Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">{{ __('messages.our_story') }}</h2>
                <p class="text-lg text-gray-600 mb-6">
                    {{ __('messages.our_story_paragraph_1') }}
                </p>
                <p class="text-lg text-gray-600 mb-6">
                    {{ __('messages.our_story_paragraph_2') }}
                </p>
                <p class="text-lg text-gray-600">
                    {{ __('messages.our_story_paragraph_3') }}
                </p>
            </div>
            <div class="bg-gray-200 rounded-lg h-96 flex items-center justify-center">
                <div class="text-center text-gray-400">
                    <svg class="w-24 h-24 mx-auto mb-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                    </svg>
                    <p class="text-lg">Our Story Image</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission & Values Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ __('messages.our_mission_values') }}</h2>
            <p class="text-lg text-gray-600">{{ __('messages.what_drives_us') }}</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-lg shadow-md text-center">
                <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">{{ __('messages.innovation') }}</h3>
                <p class="text-gray-600">{{ __('messages.innovation_desc') }}</p>
            </div>
            
            <div class="bg-white p-8 rounded-lg shadow-md text-center">
                <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">{{ __('messages.quality') }}</h3>
                <p class="text-gray-600">{{ __('messages.quality_desc') }}</p>
            </div>
            
            <div class="bg-white p-8 rounded-lg shadow-md text-center">
                <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">{{ __('messages.customer_focus') }}</h3>
                <p class="text-gray-600">{{ __('messages.customer_focus_desc') }}</p>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ __('messages.our_team') }}</h2>
            <p class="text-lg text-gray-600">{{ __('messages.meet_our_team') }}</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="w-32 h-32 bg-gray-200 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <div class="text-gray-400">
                        <svg class="w-16 h-16" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ __('messages.sarah_johnson') }}</h3>
                <p class="text-indigo-600 mb-2">{{ __('messages.founder_ceo') }}</p>
                <p class="text-gray-600">{{ __('messages.sarah_desc') }}</p>
            </div>
            
            <div class="text-center">
                <div class="w-32 h-32 bg-gray-200 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <div class="text-gray-400">
                        <svg class="w-16 h-16" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ __('messages.michael_chen') }}</h3>
                <p class="text-indigo-600 mb-2">{{ __('messages.head_of_design') }}</p>
                <p class="text-gray-600">{{ __('messages.michael_desc') }}</p>
            </div>
            
            <div class="text-center">
                <div class="w-32 h-32 bg-gray-200 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <div class="text-gray-400">
                        <svg class="w-16 h-16" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ __('messages.emily_rodriguez') }}</h3>
                <p class="text-indigo-600 mb-2">{{ __('messages.customer_success') }}</p>
                <p class="text-gray-600">{{ __('messages.emily_desc') }}</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-indigo-600">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">{{ __('messages.ready_experience_quality') }}</h2>
        <p class="text-xl text-indigo-100 mb-8">{{ __('messages.explore_collection') }}</p>
                    <a href="{{ route('products.index', ['locale' => app()->getLocale()]) }}" class="bg-white text-indigo-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
            {{ __('messages.shop_our_products') }}
        </a>
    </div>
</section>
@endsection
