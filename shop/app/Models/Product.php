<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'name_ar',
        'description',
        'description_ar',
        'price',
        'category',
        'category_ar',
        'image_path',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    // Helper methods for bilingual support
    public function getLocalizedNameAttribute()
    {
        $locale = app()->getLocale();
        return $locale === 'ar' ? ($this->name_ar ?: $this->name) : $this->name;
    }

    public function getLocalizedDescriptionAttribute()
    {
        $locale = app()->getLocale();
        return $locale === 'ar' ? ($this->description_ar ?: $this->description) : $this->description;
    }

    public function getLocalizedCategoryAttribute()
    {
        $locale = app()->getLocale();
        if ($locale === 'ar' && !empty($this->category_ar)) {
            return $this->category_ar;
        }
        return $this->category;
    }
}
