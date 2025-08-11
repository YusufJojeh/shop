<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'name_ar',
        'description',
        'description_ar',
        'price',
        'category',
        'category_ar',
        'image_path',
        'is_special',
        'special_order',
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
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_special' => 'boolean',
        'has_offer' => 'boolean',
        'original_price' => 'decimal:2',
        'discount_percentage' => 'decimal:2',
        'offer_start_date' => 'date',
        'offer_end_date' => 'date'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getLocalizedNameAttribute()
    {
        $locale = app()->getLocale();
        if ($locale === 'ar' && !empty($this->name_ar)) {
            return $this->name_ar;
        }
        return $this->name;
    }

    public function getLocalizedDescriptionAttribute()
    {
        $locale = app()->getLocale();
        if ($locale === 'ar' && !empty($this->description_ar)) {
            return $this->description_ar;
        }
        return $this->description;
    }

    public function getLocalizedCategoryAttribute()
    {
        if ($this->category) {
            return $this->category->localized_name;
        }
        
        $locale = app()->getLocale();
        if ($locale === 'ar' && !empty($this->category_ar)) {
            return $this->category_ar;
        }
        return $this->category;
    }

    public function getLocalizedOfferTitleAttribute()
    {
        $locale = app()->getLocale();
        if ($locale === 'ar' && !empty($this->offer_title_ar)) {
            return $this->offer_title_ar;
        }
        return $this->offer_title;
    }

    public function getLocalizedOfferDescriptionAttribute()
    {
        $locale = app()->getLocale();
        if ($locale === 'ar' && !empty($this->offer_description_ar)) {
            return $this->offer_description_ar;
        }
        return $this->offer_description;
    }

    public function getDiscountedPriceAttribute()
    {
        if (!$this->has_offer || !$this->discount_percentage) {
            return $this->price;
        }

        $originalPrice = $this->original_price ?? $this->price;
        return $originalPrice - ($originalPrice * $this->discount_percentage / 100);
    }

    public function getDiscountAmountAttribute()
    {
        if (!$this->has_offer || !$this->discount_percentage) {
            return 0;
        }

        $originalPrice = $this->original_price ?? $this->price;
        return $originalPrice * $this->discount_percentage / 100;
    }

    public function isOfferActive()
    {
        if (!$this->has_offer) {
            return false;
        }

        $now = now()->toDateString();
        
        if ($this->offer_start_date && $this->offer_start_date > $now) {
            return false;
        }
        
        if ($this->offer_end_date && $this->offer_end_date < $now) {
            return false;
        }

        return true;
    }

    public function scopeWithOffers($query)
    {
        return $query->where('has_offer', true);
    }

    public function scopeActiveOffers($query)
    {
        $now = now()->toDateString();
        return $query->where('has_offer', true)
                    ->where(function($q) use ($now) {
                        $q->whereNull('offer_start_date')
                          ->orWhere('offer_start_date', '<=', $now);
                    })
                    ->where(function($q) use ($now) {
                        $q->whereNull('offer_end_date')
                          ->orWhere('offer_end_date', '>=', $now);
                    });
    }
}
