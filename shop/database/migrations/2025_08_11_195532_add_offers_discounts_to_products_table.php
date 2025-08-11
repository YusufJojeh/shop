<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->boolean('has_offer')->default(false)->after('special_order');
            $table->decimal('original_price', 10, 2)->nullable()->after('has_offer');
            $table->decimal('discount_percentage', 5, 2)->nullable()->after('original_price');
            $table->date('offer_start_date')->nullable()->after('discount_percentage');
            $table->date('offer_end_date')->nullable()->after('offer_start_date');
            $table->string('offer_title')->nullable()->after('offer_end_date');
            $table->string('offer_title_ar')->nullable()->after('offer_title');
            $table->text('offer_description')->nullable()->after('offer_title_ar');
            $table->text('offer_description_ar')->nullable()->after('offer_description');
            $table->integer('category_id')->nullable()->after('offer_description_ar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'has_offer',
                'original_price',
                'discount_percentage',
                'offer_start_date',
                'offer_end_date',
                'offer_title',
                'offer_title_ar',
                'offer_description',
                'offer_description_ar',
                'category_id'
            ]);
        });
    }
};
