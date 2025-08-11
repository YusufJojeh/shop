@extends('layouts.admin')

@section('title', 'Site Settings')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Site Settings</h1>
        <form action="{{ route('admin.settings.reset') }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to reset all settings to defaults?')">
            @csrf
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors">
                Reset to Defaults
            </button>
        </form>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <!-- Store Information -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-2xl font-semibold text-gray-900 mb-6">Store Information</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Store Name (English)</label>
                    <input type="text" name="setting_store_name" value="{{ $settings['general']->where('key', 'store_name')->first()->value ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Store Name (Arabic)</label>
                    <input type="text" name="setting_store_name_ar" value="{{ $settings['general']->where('key', 'store_name_ar')->first()->value ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" dir="rtl">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Store Tagline (English)</label>
                    <input type="text" name="setting_store_tagline" value="{{ $settings['general']->where('key', 'store_tagline')->first()->value ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Store Tagline (Arabic)</label>
                    <input type="text" name="setting_store_tagline_ar" value="{{ $settings['general']->where('key', 'store_tagline_ar')->first()->value ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" dir="rtl">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Store Description (English)</label>
                    <textarea name="setting_store_description" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $settings['general']->where('key', 'store_description')->first()->value ?? '' }}</textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Store Description (Arabic)</label>
                    <textarea name="setting_store_description_ar" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" dir="rtl">{{ $settings['general']->where('key', 'store_description_ar')->first()->value ?? '' }}</textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Store Email</label>
                    <input type="email" name="setting_store_email" value="{{ $settings['general']->where('key', 'store_email')->first()->value ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Store Phone</label>
                    <input type="text" name="setting_store_phone" value="{{ $settings['general']->where('key', 'store_phone')->first()->value ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Store Address (English)</label>
                    <input type="text" name="setting_store_address" value="{{ $settings['general']->where('key', 'store_address')->first()->value ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Store Address (Arabic)</label>
                    <input type="text" name="setting_store_address_ar" value="{{ $settings['general']->where('key', 'store_address_ar')->first()->value ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" dir="rtl">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Currency</label>
                    <input type="text" name="setting_currency" value="{{ $settings['general']->where('key', 'currency')->first()->value ?? 'USD' }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Currency Symbol</label>
                    <input type="text" name="setting_currency_symbol" value="{{ $settings['general']->where('key', 'currency_symbol')->first()->value ?? '$' }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>
        </div>

        <!-- Theme Colors -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-2xl font-semibold text-gray-900 mb-6">Theme Colors</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Primary Color</label>
                    <input type="color" name="setting_primary_color" value="{{ $settings['theme']->where('key', 'primary_color')->first()->value ?? '#3B82F6' }}" class="w-full h-12 border border-gray-300 rounded-md">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Secondary Color</label>
                    <input type="color" name="setting_secondary_color" value="{{ $settings['theme']->where('key', 'secondary_color')->first()->value ?? '#8B5CF6' }}" class="w-full h-12 border border-gray-300 rounded-md">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Accent Color</label>
                    <input type="color" name="setting_accent_color" value="{{ $settings['theme']->where('key', 'accent_color')->first()->value ?? '#10B981' }}" class="w-full h-12 border border-gray-300 rounded-md">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Text Color</label>
                    <input type="color" name="setting_text_color" value="{{ $settings['theme']->where('key', 'text_color')->first()->value ?? '#1F2937' }}" class="w-full h-12 border border-gray-300 rounded-md">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Background Color</label>
                    <input type="color" name="setting_background_color" value="{{ $settings['theme']->where('key', 'background_color')->first()->value ?? '#F9FAFB' }}" class="w-full h-12 border border-gray-300 rounded-md">
                </div>
            </div>
        </div>

        <!-- Hero Section -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-2xl font-semibold text-gray-900 mb-6">Hero Section</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Hero Title</label>
                    <input type="text" name="setting_hero_title" value="{{ $settings['content']->where('key', 'hero_title')->first()->value ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Hero Subtitle</label>
                    <input type="text" name="setting_hero_subtitle" value="{{ $settings['content']->where('key', 'hero_subtitle')->first()->value ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Hero Button Text</label>
                    <input type="text" name="setting_hero_button_text" value="{{ $settings['content']->where('key', 'hero_button_text')->first()->value ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Hero Image</label>
                    <input type="file" name="setting_hero_image" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @if($settings['content']->where('key', 'hero_image')->first()->value)
                        <div class="mt-2">
                            <img src="{{ Storage::url($settings['content']->where('key', 'hero_image')->first()->value) }}" alt="Current Hero Image" class="w-32 h-20 object-cover rounded">
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Features Section -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-2xl font-semibold text-gray-900 mb-6">Features Section</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Features Title</label>
                    <input type="text" name="setting_features_title" value="{{ $settings['content']->where('key', 'features_title')->first()->value ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="flex items-center">
                    <input type="checkbox" name="setting_show_features_section" value="1" {{ ($settings['content']->where('key', 'show_features_section')->first()->value ?? '1') == '1' ? 'checked' : '' }} class="mr-2">
                    <label class="text-sm font-medium text-gray-700">Show Features Section</label>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Feature 1 Title</label>
                    <input type="text" name="setting_feature_1_title" value="{{ $settings['content']->where('key', 'feature_1_title')->first()->value ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Feature 1 Description</label>
                    <input type="text" name="setting_feature_1_description" value="{{ $settings['content']->where('key', 'feature_1_description')->first()->value ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Feature 2 Title</label>
                    <input type="text" name="setting_feature_2_title" value="{{ $settings['content']->where('key', 'feature_2_title')->first()->value ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Feature 2 Description</label>
                    <input type="text" name="setting_feature_2_description" value="{{ $settings['content']->where('key', 'feature_2_description')->first()->value ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Feature 3 Title</label>
                    <input type="text" name="setting_feature_3_title" value="{{ $settings['content']->where('key', 'feature_3_title')->first()->value ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Feature 3 Description</label>
                    <input type="text" name="setting_feature_3_description" value="{{ $settings['content']->where('key', 'feature_3_description')->first()->value ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>
        </div>

        <!-- About Section -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-2xl font-semibold text-gray-900 mb-6">About Section</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">About Title</label>
                    <input type="text" name="setting_about_title" value="{{ $settings['content']->where('key', 'about_title')->first()->value ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="flex items-center">
                    <input type="checkbox" name="setting_show_about_section" value="1" {{ ($settings['content']->where('key', 'show_about_section')->first()->value ?? '1') == '1' ? 'checked' : '' }} class="mr-2">
                    <label class="text-sm font-medium text-gray-700">Show About Section</label>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">About Content</label>
                    <textarea name="setting_about_content" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $settings['content']->where('key', 'about_content')->first()->value ?? '' }}</textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">About Image</label>
                    <input type="file" name="setting_about_image" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @if($settings['content']->where('key', 'about_image')->first()->value)
                        <div class="mt-2">
                            <img src="{{ Storage::url($settings['content']->where('key', 'about_image')->first()->value) }}" alt="Current About Image" class="w-32 h-20 object-cover rounded">
                        </div>
                    @endif
                </div>
                <div class="flex items-center">
                    <input type="checkbox" name="setting_show_trending_section" value="1" {{ ($settings['content']->where('key', 'show_trending_section')->first()->value ?? '1') == '1' ? 'checked' : '' }} class="mr-2">
                    <label class="text-sm font-medium text-gray-700">Show Trending Section</label>
                </div>
            </div>
        </div>

        <!-- Social Media -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-2xl font-semibold text-gray-900 mb-6">Social Media</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Facebook URL</label>
                    <input type="url" name="setting_facebook_url" value="{{ $settings['social']->where('key', 'facebook_url')->first()->value ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Instagram URL</label>
                    <input type="url" name="setting_instagram_url" value="{{ $settings['social']->where('key', 'instagram_url')->first()->value ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Twitter URL</label>
                    <input type="url" name="setting_twitter_url" value="{{ $settings['social']->where('key', 'twitter_url')->first()->value ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">YouTube URL</label>
                    <input type="url" name="setting_youtube_url" value="{{ $settings['social']->where('key', 'youtube_url')->first()->value ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>
        </div>

        <!-- Special Products Section -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-2xl font-semibold text-gray-900 mb-6">Special Products Section</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Special Products Title (English)</label>
                    <input type="text" name="setting_special_products_title" value="{{ $settings['content']->where('key', 'special_products_title')->first()->value ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Special Products Title (Arabic)</label>
                    <input type="text" name="setting_special_products_title_ar" value="{{ $settings['content']->where('key', 'special_products_title_ar')->first()->value ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" dir="rtl">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Special Products Subtitle (English)</label>
                    <input type="text" name="setting_special_products_subtitle" value="{{ $settings['content']->where('key', 'special_products_subtitle')->first()->value ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Special Products Subtitle (Arabic)</label>
                    <input type="text" name="setting_special_products_subtitle_ar" value="{{ $settings['content']->where('key', 'special_products_subtitle_ar')->first()->value ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" dir="rtl">
                </div>
                <div class="flex items-center">
                    <input type="checkbox" name="setting_show_special_products_section" value="1" {{ ($settings['content']->where('key', 'show_special_products_section')->first()->value ?? '1') == '1' ? 'checked' : '' }} class="mr-2">
                    <label class="text-sm font-medium text-gray-700">Show Special Products Section</label>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-2xl font-semibold text-gray-900 mb-6">Footer</h2>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Footer Text</label>
                <input type="text" name="setting_footer_text" value="{{ $settings['content']->where('key', 'footer_text')->first()->value ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                Save Settings
            </button>
        </div>
    </form>
</div>
@endsection
