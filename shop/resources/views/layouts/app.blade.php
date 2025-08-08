<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title', __('messages.premium_products'))</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Arabic Font -->
    @if(app()->getLocale() === 'ar')
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @endif

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        /* Custom styles for the trend slider */
        .line-clamp-1 {
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        /* Smooth transitions for slider */
        #trendSlider {
            transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        /* Hover effects for slider cards */
        #trendSlider .transform {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        /* Pulse animation for trend badge */
        @keyframes pulse {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.8;
            }
        }
        
        .animate-pulse {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            #trendSlider > div {
                width: 100% !important;
            }
        }
        
        /* RTL Support for Arabic */
        [dir="rtl"] {
            direction: rtl;
            text-align: right;
        }
        
        [dir="rtl"] .flex {
            flex-direction: row-reverse;
        }
        
        [dir="rtl"] .space-x-8 > * + * {
            margin-left: 0;
            margin-right: 2rem;
        }
        
        [dir="rtl"] .space-x-4 > * + * {
            margin-left: 0;
            margin-right: 1rem;
        }
        
        [dir="rtl"] .space-x-2 > * + * {
            margin-left: 0;
            margin-right: 0.5rem;
        }
        
        [dir="rtl"] .ml-auto {
            margin-left: 0;
            margin-right: auto;
        }
        
        [dir="rtl"] .mr-auto {
            margin-right: 0;
            margin-left: auto;
        }
        
        [dir="rtl"] .pl-4 {
            padding-left: 0;
            padding-right: 1rem;
        }
        
        [dir="rtl"] .pr-4 {
            padding-right: 0;
            padding-left: 1rem;
        }
        
        /* Arabic Font */
        [dir="rtl"] body {
            font-family: 'Cairo', sans-serif;
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('home', ['locale' => app()->getLocale()]) }}" class="flex-shrink-0 flex items-center">
                        <span class="text-2xl font-bold text-blue-600">{{ \App\Models\SiteSetting::getValue('store_name', 'My Store') }}</span>
                    </a>
                </div>
                
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home', ['locale' => app()->getLocale()]) }}" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition-colors">{{ __('messages.home') }}</a>
                    <a href="{{ route('products.index', ['locale' => app()->getLocale()]) }}" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition-colors">{{ __('messages.products') }}</a>
                    <a href="{{ route('about', ['locale' => app()->getLocale()]) }}" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition-colors">{{ __('messages.about') }}</a>
                    <a href="{{ route('contact', ['locale' => app()->getLocale()]) }}" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition-colors">{{ __('messages.contact') }}</a>
                    
                    <!-- Language Switcher -->
                    <div class="relative">
                        <button type="button" class="language-switcher text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition-colors flex items-center">
                            <span>{{ __('messages.language') }}</span>
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div class="language-dropdown hidden absolute right-0 mt-2 w-32 bg-white rounded-md shadow-lg z-50">
                            <a href="{{ route('language.switch', 'en') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 {{ app()->getLocale() === 'en' ? 'bg-blue-50 text-blue-600' : '' }}">
                                {{ __('messages.english') }}
                            </a>
                            <a href="{{ route('language.switch', 'ar') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 {{ app()->getLocale() === 'ar' ? 'bg-blue-50 text-blue-600' : '' }}">
                                {{ __('messages.arabic') }}
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button type="button" class="mobile-menu-button text-gray-700 hover:text-blue-600 focus:outline-none focus:text-blue-600">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div class="mobile-menu hidden md:hidden">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-white border-t">
                <a href="{{ route('home', ['locale' => app()->getLocale()]) }}" class="text-gray-700 hover:text-blue-600 block px-3 py-2 rounded-md text-base font-medium">{{ __('messages.home') }}</a>
                <a href="{{ route('products.index', ['locale' => app()->getLocale()]) }}" class="text-gray-700 hover:text-blue-600 block px-3 py-2 rounded-md text-base font-medium">{{ __('messages.products') }}</a>
                <a href="{{ route('about', ['locale' => app()->getLocale()]) }}" class="text-gray-700 hover:text-blue-600 block px-3 py-2 rounded-md text-base font-medium">{{ __('messages.about') }}</a>
                <a href="{{ route('contact', ['locale' => app()->getLocale()]) }}" class="text-gray-700 hover:text-blue-600 block px-3 py-2 rounded-md text-base font-medium">{{ __('messages.contact') }}</a>
                
                <!-- Mobile Language Switcher -->
                <div class="border-t pt-2 mt-2">
                    <div class="text-sm text-gray-500 px-3 py-1">{{ __('messages.language') }}</div>
                    <a href="{{ route('language.switch', 'en') }}" class="text-gray-700 hover:text-blue-600 block px-3 py-2 rounded-md text-base font-medium {{ app()->getLocale() === 'en' ? 'bg-blue-50 text-blue-600' : '' }}">
                        {{ __('messages.english') }}
                    </a>
                    <a href="{{ route('language.switch', 'ar') }}" class="text-gray-700 hover:text-blue-600 block px-3 py-2 rounded-md text-base font-medium {{ app()->getLocale() === 'ar' ? 'bg-blue-50 text-blue-600' : '' }}">
                        {{ __('messages.arabic') }}
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="col-span-1 md:col-span-2">
                    <h3 class="text-2xl font-bold text-blue-400 mb-4">{{ \App\Models\SiteSetting::getValue('store_name', 'My Store') }}</h3>
                    <p class="text-gray-300 mb-4">{{ \App\Models\SiteSetting::getValue('store_description', 'Discover premium products that enhance your lifestyle. Quality, innovation, and style in every item.') }}</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <span class="sr-only">Facebook</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <span class="sr-only">Instagram</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 6.62 5.367 11.987 11.988 11.987 6.62 0 11.987-5.367 11.987-11.987C24.014 5.367 18.637.001 12.017.001zM8.449 16.988c-1.297 0-2.448-.49-3.323-1.297C4.198 14.895 3.708 13.744 3.708 12.447s.49-2.448 1.418-3.323c.875-.807 2.026-1.297 3.323-1.297s2.448.49 3.323 1.297c.928.875 1.418 2.026 1.418 3.323s-.49 2.448-1.418 3.244c-.875.807-2.026 1.297-3.323 1.297zm7.83-9.781c-.49 0-.928-.175-1.297-.49-.368-.315-.49-.753-.49-1.243 0-.49.122-.928.49-1.243.369-.315.807-.49 1.297-.49s.928.175 1.297.49c.368.315.49.753.49 1.243 0 .49-.122.928-.49 1.243-.369.315-.807.49-1.297.49z"/>
                            </svg>
                        </a>
                    </div>
                </div>
                
                                 <div>
                     <h4 class="text-lg font-semibold mb-4">{{ __('messages.quick_links') }}</h4>
                     <ul class="space-y-2">
                         <li><a href="{{ route('home', ['locale' => app()->getLocale()]) }}" class="text-gray-300 hover:text-white transition-colors">{{ __('messages.home') }}</a></li>
                         <li><a href="{{ route('products.index', ['locale' => app()->getLocale()]) }}" class="text-gray-300 hover:text-white transition-colors">{{ __('messages.products') }}</a></li>
                         <li><a href="{{ route('about', ['locale' => app()->getLocale()]) }}" class="text-gray-300 hover:text-white transition-colors">{{ __('messages.about') }}</a></li>
                         <li><a href="{{ route('contact', ['locale' => app()->getLocale()]) }}" class="text-gray-300 hover:text-white transition-colors">{{ __('messages.contact') }}</a></li>
                     </ul>
                 </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Contact Info</h4>
                    <ul class="space-y-2 text-gray-300">
                        <li>{{ \App\Models\SiteSetting::getValue('store_address', '123 Store Street') }}</li>
                        <li>{{ \App\Models\SiteSetting::getValue('store_email', 'contact@mystore.com') }}</li>
                        <li>{{ \App\Models\SiteSetting::getValue('store_phone', '+1 (555) 123-4567') }}</li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; {{ date('Y') }} {{ \App\Models\SiteSetting::getValue('store_name', 'My Store') }}. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.querySelector('.mobile-menu-button').addEventListener('click', function() {
            document.querySelector('.mobile-menu').classList.toggle('hidden');
        });

        // Trend Products Slider functionality
        document.addEventListener('DOMContentLoaded', function() {
            const slider = document.getElementById('trendSlider');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            const dots = document.querySelectorAll('.slider-dot');
            
            if (!slider) return; // Exit if slider doesn't exist
            
            let currentSlide = 0;
            const totalSlides = Math.ceil(slider.children.length / 4); // 4 products per slide
            let autoPlayInterval;
            
            function updateSlider() {
                const translateX = -currentSlide * 100;
                slider.style.transform = `translateX(${translateX}%)`;
                
                // Update dots
                dots.forEach((dot, index) => {
                    dot.classList.toggle('bg-indigo-500', index === currentSlide);
                    dot.classList.toggle('bg-gray-300', index !== currentSlide);
                });
            }
            
            function nextSlide() {
                currentSlide = (currentSlide + 1) % totalSlides;
                updateSlider();
            }
            
            function prevSlide() {
                currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
                updateSlider();
            }
            
            // Event listeners
            if (nextBtn) {
                nextBtn.addEventListener('click', nextSlide);
            }
            
            if (prevBtn) {
                prevBtn.addEventListener('click', prevSlide);
            }
            
            // Dot navigation
            dots.forEach((dot, index) => {
                dot.addEventListener('click', () => {
                    currentSlide = index;
                    updateSlider();
                    resetAutoPlay();
                });
            });
            
            // Auto-play functionality
            function startAutoPlay() {
                autoPlayInterval = setInterval(nextSlide, 4000); // Change slide every 4 seconds
            }
            
            function resetAutoPlay() {
                clearInterval(autoPlayInterval);
                startAutoPlay();
            }
            
            // Start auto-play
            startAutoPlay();
            
            // Pause auto-play on hover
            slider.addEventListener('mouseenter', () => {
                clearInterval(autoPlayInterval);
            });
            
            slider.addEventListener('mouseleave', () => {
                startAutoPlay();
            });
            
            // Keyboard navigation
            document.addEventListener('keydown', (e) => {
                if (e.key === 'ArrowLeft') {
                    prevSlide();
                    resetAutoPlay();
                } else if (e.key === 'ArrowRight') {
                    nextSlide();
                    resetAutoPlay();
                }
            });
            
            // Touch/swipe support for mobile
            let startX = 0;
            let endX = 0;
            
            slider.addEventListener('touchstart', (e) => {
                startX = e.touches[0].clientX;
            });
            
            slider.addEventListener('touchend', (e) => {
                endX = e.changedTouches[0].clientX;
                const diff = startX - endX;
                
                if (Math.abs(diff) > 50) { // Minimum swipe distance
                    if (diff > 0) {
                        nextSlide(); // Swipe left
                    } else {
                        prevSlide(); // Swipe right
                    }
                    resetAutoPlay();
                }
            });
        });
        
        // Language Switcher Dropdown
        document.addEventListener('DOMContentLoaded', function() {
            const languageSwitcher = document.querySelector('.language-switcher');
            const languageDropdown = document.querySelector('.language-dropdown');
            
            if (languageSwitcher && languageDropdown) {
                languageSwitcher.addEventListener('click', function(e) {
                    e.stopPropagation();
                    languageDropdown.classList.toggle('hidden');
                });
                
                // Close dropdown when clicking outside
                document.addEventListener('click', function(e) {
                    if (!languageSwitcher.contains(e.target) && !languageDropdown.contains(e.target)) {
                        languageDropdown.classList.add('hidden');
                    }
                });
            }
        });
    </script>
</body>
</html>
