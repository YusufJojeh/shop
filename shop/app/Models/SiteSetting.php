<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'type',
        'group'
    ];

    /**
     * Get a setting value by key with bilingual support
     */
    public static function getValue($key, $default = null)
    {
        $locale = app()->getLocale();
        $localizedKey = $key . '_' . $locale;
        
        // Try to get localized version first
        $setting = static::where('key', $localizedKey)->first();
        if ($setting) {
            return $setting->value;
        }
        
        // Fall back to base key
        $setting = static::where('key', $key)->first();
        return $setting ? $setting->value : $default;
    }

    /**
     * Set a setting value
     */
    public static function setValue($key, $value, $type = 'text', $group = 'general')
    {
        return static::updateOrCreate(
            ['key' => $key],
            ['value' => $value, 'type' => $type, 'group' => $group]
        );
    }

    /**
     * Get all settings by group
     */
    public static function getByGroup($group)
    {
        return static::where('group', $group)->get();
    }
}
