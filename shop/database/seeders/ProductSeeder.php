<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Premium Wireless Headphones',
                'name_ar' => 'سماعات لاسلكية فاخرة',
                'description' => 'Experience crystal-clear sound with our premium wireless headphones. Featuring noise cancellation technology and 30-hour battery life for uninterrupted listening pleasure.',
                'description_ar' => 'استمتع بالصوت الواضح مع سماعاتنا اللاسلكية الفاخرة. تتميز بتقنية إلغاء الضوضاء وعمر بطارية 30 ساعة للاستماع المتواصل.',
                'price' => 299.99,
                'category' => 'Electronics',
                'category_ar' => 'الإلكترونيات',
                'image_path' => null,
            ],
            [
                'name' => 'Organic Cotton T-Shirt',
                'name_ar' => 'قميص قطني عضوي',
                'description' => 'Made from 100% organic cotton, this comfortable t-shirt is perfect for everyday wear. Available in multiple colors and sizes.',
                'description_ar' => 'مصنوع من قطن عضوي 100%، هذا القميص المريح مثالي للارتداء اليومي. متوفر بألوان وأحجام متعددة.',
                'price' => 29.99,
                'category' => 'Clothing',
                'category_ar' => 'الملابس',
                'image_path' => null,
            ],
            [
                'name' => 'Smart Fitness Watch',
                'name_ar' => 'ساعة ذكية لللياقة',
                'description' => 'Track your health and fitness goals with our advanced smartwatch. Features heart rate monitoring, GPS, and water resistance.',
                'description_ar' => 'تتبع أهداف صحتك ولياقتك مع ساعتنا الذكية المتقدمة. تتميز بمراقبة معدل ضربات القلب ونظام تحديد المواقع ومقاومة الماء.',
                'price' => 199.99,
                'category' => 'Electronics',
                'category_ar' => 'الإلكترونيات',
                'image_path' => null,
            ],
            [
                'name' => 'Handcrafted Ceramic Mug',
                'name_ar' => 'كوب خزفي مصنوع يدوياً',
                'description' => 'Beautifully handcrafted ceramic mug perfect for your morning coffee or tea. Microwave and dishwasher safe.',
                'description_ar' => 'كوب خزفي مصنوع يدوياً بشكل جميل مثالي لقهوة الصباح أو الشاي. آمن للمايكروويف وغسالة الصحون.',
                'price' => 15.99,
                'category' => 'Home & Garden',
                'category_ar' => 'المنزل والحديقة',
                'image_path' => null,
            ],
            [
                'name' => 'Leather Crossbody Bag',
                'name_ar' => 'حقيبة جلدية عبر الكتف',
                'description' => 'Stylish and practical leather crossbody bag with multiple compartments. Perfect for everyday use or travel.',
                'description_ar' => 'حقيبة جلدية أنيقة وعملية عبر الكتف مع أقسام متعددة. مثالية للاستخدام اليومي أو السفر.',
                'price' => 89.99,
                'category' => 'Fashion',
                'category_ar' => 'الأزياء',
                'image_path' => null,
            ],
            [
                'name' => 'Aromatherapy Essential Oil Set',
                'name_ar' => 'مجموعة زيوت عطرية أساسية',
                'description' => 'Pure essential oils set including lavender, eucalyptus, and peppermint. Perfect for relaxation and wellness.',
                'description_ar' => 'مجموعة زيوت أساسية نقية تشمل اللافندر والأوكالبتوس والنعناع. مثالية للاسترخاء والعافية.',
                'price' => 45.99,
                'category' => 'Health & Beauty',
                'category_ar' => 'الصحة والجمال',
                'image_path' => null,
            ],
            [
                'name' => 'Stainless Steel Water Bottle',
                'name_ar' => 'زجاجة ماء من الفولاذ المقاوم للصدأ',
                'description' => 'Keep your drinks cold for 24 hours or hot for 12 hours with our premium stainless steel water bottle.',
                'description_ar' => 'احتفظ بمشروباتك باردة لمدة 24 ساعة أو ساخنة لمدة 12 ساعة مع زجاجة الماء الفاخرة من الفولاذ المقاوم للصدأ.',
                'price' => 24.99,
                'category' => 'Home & Garden',
                'category_ar' => 'المنزل والحديقة',
                'image_path' => null,
            ],
            [
                'name' => 'Wireless Bluetooth Speaker',
                'name_ar' => 'مكبر صوت بلوتوث لاسلكي',
                'description' => 'Portable wireless speaker with 360-degree sound and 20-hour battery life. Perfect for outdoor activities.',
                'description_ar' => 'مكبر صوت لاسلكي محمول مع صوت 360 درجة وعمر بطارية 20 ساعة. مثالي للأنشطة الخارجية.',
                'price' => 79.99,
                'category' => 'Electronics',
                'category_ar' => 'الإلكترونيات',
                'image_path' => null,
            ],
            [
                'name' => 'Natural Face Moisturizer',
                'name_ar' => 'مرطب وجه طبيعي',
                'description' => 'Hydrating face moisturizer made with natural ingredients. Suitable for all skin types.',
                'description_ar' => 'مرطب وجه مرطب مصنوع من مكونات طبيعية. مناسب لجميع أنواع البشرة.',
                'price' => 34.99,
                'category' => 'Health & Beauty',
                'category_ar' => 'الصحة والجمال',
                'image_path' => null,
            ],
            [
                'name' => 'Denim Jacket',
                'name_ar' => 'جاكيت جينز',
                'description' => 'Classic denim jacket with modern styling. Comfortable fit and durable construction.',
                'description_ar' => 'جاكيت جينز كلاسيكي بتصميم عصري. مناسب مريح وبناء متين.',
                'price' => 69.99,
                'category' => 'Clothing',
                'category_ar' => 'الملابس',
                'image_path' => null,
            ],
            [
                'name' => 'Smart LED Light Bulb',
                'name_ar' => 'مصباح LED ذكي',
                'description' => 'Control your lighting with your smartphone. Features dimming, color changing, and scheduling capabilities.',
                'description_ar' => 'تحكم في إضاءتك بهاتفك الذكي. يتميز بقدرات التعتيم وتغيير اللون والجدولة.',
                'price' => 39.99,
                'category' => 'Electronics',
                'category_ar' => 'الإلكترونيات',
                'image_path' => null,
            ],
            [
                'name' => 'Bamboo Cutting Board',
                'name_ar' => 'لوح تقطيع من الخيزران',
                'description' => 'Eco-friendly bamboo cutting board with juice groove. Perfect for food preparation and serving.',
                'description_ar' => 'لوح تقطيع من الخيزران صديق للبيئة مع أخدود العصير. مثالي لإعداد الطعام والتقديم.',
                'price' => 19.99,
                'category' => 'Home & Garden',
                'category_ar' => 'المنزل والحديقة',
                'image_path' => null,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
