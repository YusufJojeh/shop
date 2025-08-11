<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // Store Information
            ['key' => 'store_name', 'value' => 'My Online Store', 'type' => 'text', 'group' => 'general'],
            ['key' => 'store_name_ar', 'value' => 'متجري الإلكتروني', 'type' => 'text', 'group' => 'general'],
            ['key' => 'store_tagline', 'value' => 'Quality Products at Great Prices', 'type' => 'text', 'group' => 'general'],
            ['key' => 'store_tagline_ar', 'value' => 'منتجات عالية الجودة بأسعار ممتازة', 'type' => 'text', 'group' => 'general'],
            ['key' => 'store_description', 'value' => 'Your one-stop shop for all your needs. We offer a wide selection of quality products at competitive prices.', 'type' => 'text', 'group' => 'general'],
            ['key' => 'store_description_ar', 'value' => 'متجرك الشامل لجميع احتياجاتك. نقدم تشكيلة واسعة من المنتجات عالية الجودة بأسعار تنافسية.', 'type' => 'text', 'group' => 'general'],
            ['key' => 'store_email', 'value' => 'contact@mystore.com', 'type' => 'text', 'group' => 'general'],
            ['key' => 'store_phone', 'value' => '+1 (555) 123-4567', 'type' => 'text', 'group' => 'general'],
            ['key' => 'store_address', 'value' => '123 Store Street, City, State 12345', 'type' => 'text', 'group' => 'general'],
            ['key' => 'store_address_ar', 'value' => '١٢٣ شارع المتجر، المدينة، الولاية ١٢٣٤٥', 'type' => 'text', 'group' => 'general'],
            
            // Theme Colors
            ['key' => 'primary_color', 'value' => '#3B82F6', 'type' => 'color', 'group' => 'theme'],
            ['key' => 'secondary_color', 'value' => '#8B5CF6', 'type' => 'color', 'group' => 'theme'],
            ['key' => 'accent_color', 'value' => '#10B981', 'type' => 'color', 'group' => 'theme'],
            ['key' => 'text_color', 'value' => '#1F2937', 'type' => 'color', 'group' => 'theme'],
            ['key' => 'background_color', 'value' => '#F9FAFB', 'type' => 'color', 'group' => 'theme'],
            
            // Hero Section
            ['key' => 'hero_title', 'value' => 'Welcome to Our Store', 'type' => 'text', 'group' => 'content'],
            ['key' => 'hero_title_ar', 'value' => 'مرحباً بكم في متجرنا', 'type' => 'text', 'group' => 'content'],
            ['key' => 'hero_subtitle', 'value' => 'Discover amazing products at unbeatable prices', 'type' => 'text', 'group' => 'content'],
            ['key' => 'hero_subtitle_ar', 'value' => 'اكتشف منتجات رائعة بأسعار لا تقبل المنافسة', 'type' => 'text', 'group' => 'content'],
            ['key' => 'hero_button_text', 'value' => 'Shop Now', 'type' => 'text', 'group' => 'content'],
            ['key' => 'hero_button_text_ar', 'value' => 'تسوق الآن', 'type' => 'text', 'group' => 'content'],
            ['key' => 'hero_image', 'value' => '', 'type' => 'image', 'group' => 'content'],
            
            // About Section
            ['key' => 'about_title', 'value' => 'About Our Store', 'type' => 'text', 'group' => 'content'],
            ['key' => 'about_title_ar', 'value' => 'عن متجرنا', 'type' => 'text', 'group' => 'content'],
            ['key' => 'about_content', 'value' => 'We are committed to providing our customers with the best shopping experience. Our products are carefully selected to ensure quality and satisfaction.', 'type' => 'text', 'group' => 'content'],
            ['key' => 'about_content_ar', 'value' => 'نحن ملتزمون بتقديم أفضل تجربة تسوق لعملائنا. منتجاتنا مختارة بعناية لضمان الجودة والرضا.', 'type' => 'text', 'group' => 'content'],
            ['key' => 'about_image', 'value' => '', 'type' => 'image', 'group' => 'content'],
            
            // Features Section
            ['key' => 'features_title', 'value' => 'Why Choose Us', 'type' => 'text', 'group' => 'content'],
            ['key' => 'features_title_ar', 'value' => 'لماذا تختارنا', 'type' => 'text', 'group' => 'content'],
            ['key' => 'feature_1_title', 'value' => 'Fast Shipping', 'type' => 'text', 'group' => 'content'],
            ['key' => 'feature_1_title_ar', 'value' => 'شحن سريع', 'type' => 'text', 'group' => 'content'],
            ['key' => 'feature_1_description', 'value' => 'Quick and reliable delivery to your doorstep', 'type' => 'text', 'group' => 'content'],
            ['key' => 'feature_1_description_ar', 'value' => 'توصيل سريع وموثوق إلى باب منزلك', 'type' => 'text', 'group' => 'content'],
            ['key' => 'feature_2_title', 'value' => 'Quality Products', 'type' => 'text', 'group' => 'content'],
            ['key' => 'feature_2_title_ar', 'value' => 'منتجات عالية الجودة', 'type' => 'text', 'group' => 'content'],
            ['key' => 'feature_2_description', 'value' => 'Carefully selected items for your satisfaction', 'type' => 'text', 'group' => 'content'],
            ['key' => 'feature_2_description_ar', 'value' => 'منتجات مختارة بعناية لرضاك', 'type' => 'text', 'group' => 'content'],
            ['key' => 'feature_3_title', 'value' => 'Customer Support', 'type' => 'text', 'group' => 'content'],
            ['key' => 'feature_3_title_ar', 'value' => 'دعم العملاء', 'type' => 'text', 'group' => 'content'],
            ['key' => 'feature_3_description', 'value' => '24/7 support to help you with any questions', 'type' => 'text', 'group' => 'content'],
            ['key' => 'feature_3_description_ar', 'value' => 'دعم على مدار الساعة لمساعدتك في أي أسئلة', 'type' => 'text', 'group' => 'content'],
            
            // Social Media
            ['key' => 'facebook_url', 'value' => '', 'type' => 'text', 'group' => 'social'],
            ['key' => 'instagram_url', 'value' => '', 'type' => 'text', 'group' => 'social'],
            ['key' => 'twitter_url', 'value' => '', 'type' => 'text', 'group' => 'social'],
            ['key' => 'youtube_url', 'value' => '', 'type' => 'text', 'group' => 'social'],
            
            // Footer
            ['key' => 'footer_text', 'value' => '© 2024 My Online Store. All rights reserved.', 'type' => 'text', 'group' => 'content'],
            
            // Special Products Section
            ['key' => 'special_products_title', 'value' => 'Special Offers', 'type' => 'text', 'group' => 'content'],
            ['key' => 'special_products_title_ar', 'value' => 'عروض خاصة', 'type' => 'text', 'group' => 'content'],
            ['key' => 'special_products_subtitle', 'value' => 'Limited time offers on selected products', 'type' => 'text', 'group' => 'content'],
            ['key' => 'special_products_subtitle_ar', 'value' => 'عروض لفترة محدودة على منتجات مختارة', 'type' => 'text', 'group' => 'content'],
            ['key' => 'show_special_products_section', 'value' => '1', 'type' => 'boolean', 'group' => 'content'],

            // Offers Section
            ['key' => 'offers_title', 'value' => 'Hot Deals & Discounts', 'type' => 'text', 'group' => 'content'],
            ['key' => 'offers_title_ar', 'value' => 'صفقات ساخنة وتخفيضات', 'type' => 'text', 'group' => 'content'],
            ['key' => 'offers_subtitle', 'value' => 'Don\'t miss out on these amazing offers', 'type' => 'text', 'group' => 'content'],
            ['key' => 'offers_subtitle_ar', 'value' => 'لا تفوت هذه العروض المذهلة', 'type' => 'text', 'group' => 'content'],
            ['key' => 'show_offers_section', 'value' => '1', 'type' => 'boolean', 'group' => 'content'],
            
            // Store Settings
            ['key' => 'currency', 'value' => 'USD', 'type' => 'text', 'group' => 'general'],
            ['key' => 'currency_symbol', 'value' => '$', 'type' => 'text', 'group' => 'general'],
            ['key' => 'show_trending_section', 'value' => '1', 'type' => 'boolean', 'group' => 'content'],
            ['key' => 'show_features_section', 'value' => '1', 'type' => 'boolean', 'group' => 'content'],
            ['key' => 'show_about_section', 'value' => '1', 'type' => 'boolean', 'group' => 'content'],
        ];

        foreach ($settings as $setting) {
            SiteSetting::setValue($setting['key'], $setting['value'], $setting['type'], $setting['group']);
        }
    }
}
