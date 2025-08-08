<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminSiteSettingController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::all()->groupBy('group');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->all();
        
        foreach ($data as $key => $value) {
            if (str_starts_with($key, 'setting_')) {
                $settingKey = str_replace('setting_', '', $key);
                $setting = SiteSetting::where('key', $settingKey)->first();
                
                if ($setting) {
                    // Handle file uploads
                    if ($setting->type === 'image' && $request->hasFile($key)) {
                        // Delete old image if exists
                        if ($setting->value && Storage::disk('public')->exists($setting->value)) {
                            Storage::disk('public')->delete($setting->value);
                        }
                        
                        $imagePath = $request->file($key)->store('settings', 'public');
                        $setting->update(['value' => $imagePath]);
                    } else {
                        $setting->update(['value' => $value]);
                    }
                }
            }
        }

        return redirect()->route('admin.settings.index')->with('success', 'Settings updated successfully!');
    }

    public function resetToDefaults()
    {
        // Delete all current settings
        SiteSetting::truncate();
        
        // Re-run the seeder
        $seeder = new \Database\Seeders\SiteSettingsSeeder();
        $seeder->run();

        return redirect()->route('admin.settings.index')->with('success', 'Settings reset to defaults successfully!');
    }
}
