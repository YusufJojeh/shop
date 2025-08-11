<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get category IDs for reference
        $electronicsCategory = Category::where('name', 'Electronics')->first();
        $fashionCategory = Category::where('name', 'Fashion')->first();
        $homeCategory = Category::where('name', 'Home & Garden')->first();
        $sportsCategory = Category::where('name', 'Sports & Outdoors')->first();
        $booksCategory = Category::where('name', 'Books & Media')->first();
        $beautyCategory = Category::where('name', 'Health & Beauty')->first();

        $products = [
            [
                'name' => 'Premium Wireless Headphones',
                'name_ar' => 'سماعات لاسلكية فاخرة',
                'description' => 'Experience crystal-clear sound with our premium wireless headphones.',
                'description_ar' => 'استمتع بالصوت الواضح مع سماعاتنا اللاسلكية الفاخرة.',
                'price' => 299.99,
                'category' => 'Electronics',
                'category_ar' => 'الإلكترونيات',
                'category_id' => $electronicsCategory ? $electronicsCategory->id : null,
                'is_special' => true,
                'special_order' => 1,
                'has_offer' => true,
                'original_price' => 399.99,
                'discount_percentage' => 25.00,
                'offer_start_date' => now()->subDays(5),
                'offer_end_date' => now()->addDays(25),
                'offer_title' => 'Limited Time Offer',
                'offer_title_ar' => 'عرض لفترة محدودة',
                'offer_description' => 'Save 25% on premium wireless headphones',
                'offer_description_ar' => 'وفر 25% على السماعات اللاسلكية الفاخرة'
            ],
            [
                'name' => 'Smart Fitness Watch',
                'name_ar' => 'ساعة رياضية ذكية',
                'description' => 'Track your fitness goals with our advanced smart watch.',
                'description_ar' => 'تتبع أهدافك الرياضية مع ساعتنا الذكية المتقدمة.',
                'price' => 199.99,
                'category' => 'Electronics',
                'category_ar' => 'الإلكترونيات',
                'category_id' => $electronicsCategory ? $electronicsCategory->id : null,
                'is_special' => false,
                'has_offer' => true,
                'original_price' => 249.99,
                'discount_percentage' => 20.00,
                'offer_start_date' => now()->subDays(10),
                'offer_end_date' => now()->addDays(20),
                'offer_title' => 'Fitness Sale',
                'offer_title_ar' => 'تخفيضات رياضية',
                'offer_description' => '20% off on all fitness devices',
                'offer_description_ar' => 'خصم 20% على جميع الأجهزة الرياضية'
            ],
            [
                'name' => 'Designer Leather Bag',
                'name_ar' => 'حقيبة جلدية مصممة',
                'description' => 'Elegant leather bag crafted from premium materials.',
                'description_ar' => 'حقيبة جلدية أنيقة مصنوعة من مواد فاخرة.',
                'price' => 159.99,
                'category' => 'Fashion',
                'category_ar' => 'الأزياء',
                'category_id' => $fashionCategory ? $fashionCategory->id : null,
                'is_special' => true,
                'special_order' => 2,
                'has_offer' => false
            ],
            [
                'name' => 'Organic Cotton T-Shirt',
                'name_ar' => 'قميص قطني عضوي',
                'description' => 'Comfortable and eco-friendly cotton t-shirt.',
                'description_ar' => 'قميص قطني مريح وصديق للبيئة.',
                'price' => 29.99,
                'category' => 'Fashion',
                'category_ar' => 'الأزياء',
                'category_id' => $fashionCategory ? $fashionCategory->id : null,
                'is_special' => false,
                'has_offer' => true,
                'original_price' => 39.99,
                'discount_percentage' => 25.00,
                'offer_start_date' => now()->subDays(15),
                'offer_end_date' => now()->addDays(15),
                'offer_title' => 'Eco-Friendly Sale',
                'offer_title_ar' => 'تخفيضات صديقة للبيئة',
                'offer_description' => '25% off on organic clothing',
                'offer_description_ar' => 'خصم 25% على الملابس العضوية'
            ],
            [
                'name' => 'Smart Home Security Camera',
                'name_ar' => 'كاميرا أمن منزلية ذكية',
                'description' => 'Keep your home safe with our smart security camera.',
                'description_ar' => 'حافظ على أمان منزلك مع كاميرا الأمان الذكية.',
                'price' => 89.99,
                'category' => 'Home & Garden',
                'category_ar' => 'المنزل والحديقة',
                'category_id' => $homeCategory ? $homeCategory->id : null,
                'is_special' => false,
                'has_offer' => true,
                'original_price' => 129.99,
                'discount_percentage' => 30.00,
                'offer_start_date' => now()->subDays(20),
                'offer_end_date' => now()->addDays(10),
                'offer_title' => 'Home Security Deal',
                'offer_title_ar' => 'صفقة أمان المنزل',
                'offer_description' => '30% off on security cameras',
                'offer_description_ar' => 'خصم 30% على كاميرات الأمان'
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
