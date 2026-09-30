<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key');
        return view('admin.settings.homepage', compact('settings'));
    }

    public function about()
    {
        $settings = Setting::all()->pluck('value', 'key');
        return view('admin.settings.about', compact('settings'));
    }

    // Projects Page Settings
    public function projects()
    {
        $settings = Setting::whereIn('key', [
            'projects_page_subtitle',
            'projects_page_title',
            'projects_page_description'
        ])->pluck('value', 'key');

        return view('admin.settings.projects', compact('settings'));
    }

    // Contact Page Settings
    public function contact()
    {
        $settings = Setting::all()->pluck('value', 'key');
        return view('admin.settings.contact', compact('settings'));
    }

    public function footer()
    {
        $settings = Setting::all()->pluck('value', 'key');
        return view('admin.settings.footer', compact('settings'));
    }

    public function updateAll(Request $request)
    {
        $data = $request->except(['_token', 'story_featured_image']);
        
        foreach($data as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        if ($request->hasFile('story_featured_image')) {
            $file = $request->file('story_featured_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/settings'), $filename);
            Setting::updateOrCreate(['key' => 'story_featured_image'], ['value' => 'uploads/settings/' . $filename]);
        }

        return redirect()->back()->with('success', 'Settings updated.');
    }
}
