<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Electronics',
                'name_ar' => 'الإلكترونيات',
                'description' => 'Latest electronic devices and gadgets',
                'description_ar' => 'أحدث الأجهزة الإلكترونية والأدوات',
                'is_active' => true,
                'sort_order' => 1
            ],
            [
                'name' => 'Fashion',
                'name_ar' => 'الأزياء',
                'description' => 'Trendy fashion items and accessories',
                'description_ar' => 'عناصر الأزياء والإكسسوارات العصرية',
                'is_active' => true,
                'sort_order' => 2
            ],
            [
                'name' => 'Home & Garden',
                'name_ar' => 'المنزل والحديقة',
                'description' => 'Home improvement and garden supplies',
                'description_ar' => 'تحسينات المنزل ومستلزمات الحدائق',
                'is_active' => true,
                'sort_order' => 3
            ],
            [
                'name' => 'Sports & Outdoors',
                'name_ar' => 'الرياضة والهواء الطلق',
                'description' => 'Sports equipment and outdoor gear',
                'description_ar' => 'معدات رياضية ومعدات الهواء الطلق',
                'is_active' => true,
                'sort_order' => 4
            ],
            [
                'name' => 'Books & Media',
                'name_ar' => 'الكتب والوسائط',
                'description' => 'Books, movies, and digital media',
                'description_ar' => 'الكتب والأفلام والوسائط الرقمية',
                'is_active' => true,
                'sort_order' => 5
            ],
            [
                'name' => 'Health & Beauty',
                'name_ar' => 'الصحة والجمال',
                'description' => 'Health products and beauty supplies',
                'description_ar' => 'منتجات صحية ومستلزمات التجميل',
                'is_active' => true,
                'sort_order' => 6
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
