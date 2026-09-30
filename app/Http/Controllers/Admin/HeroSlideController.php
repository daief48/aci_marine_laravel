<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSlide;
use App\Models\Setting;
use Illuminate\Http\Request;

class HeroSlideController extends Controller
{
    public function index()
    {
        $slides = HeroSlide::orderBy('order')->get();
        $settings = Setting::where('key', 'hero_background_video')->pluck('value', 'key');
        return view('admin.hero_slides.index', compact('slides', 'settings'));
    }

    public function updateAll(Request $request)
    {
        $request->validate([
            'hero_video_file' => 'nullable|file|mimes:mp4,webm,ogg|max:102400', // max 100MB
            'hero_background_video' => 'nullable|string|max:1000',
        ]);

        // Handle File Upload if present
        if ($request->hasFile('hero_video_file')) {
            $file = $request->file('hero_video_file');
            $fileName = 'hero_bg_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/videos'), $fileName);

            $videoPath = '/uploads/videos/' . $fileName;

            Setting::updateOrCreate(
                ['key' => 'hero_background_video'],
                ['value' => $videoPath]
            );
        } elseif ($request->filled('hero_background_video')) {
            Setting::updateOrCreate(
                ['key' => 'hero_background_video'],
                ['value' => $request->input('hero_background_video')]
            );
        }

        // Handle the dynamic slides
        // Delete old slides
        HeroSlide::truncate();

        $slidesData = $request->input('slides', []);
        
        foreach ($slidesData as $index => $slide) {
            if (empty($slide['title'])) {
                continue; // Title is required, skip if empty
            }
            
            HeroSlide::create([
                'title' => $slide['title'],
                'subtitle' => $slide['subtitle'] ?? null,
                'link_text' => $slide['link_text'] ?? null,
                'link_url' => $slide['link_url'] ?? null,
                'text_color' => 'light',
                'order' => $index,
                'is_active' => true,
            ]);
        }

        return redirect()->route('admin.hero-slides.index')->with('success', 'Hero slider settings updated successfully.');
    }

    public function create()
    {
        return view('admin.hero_slides.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'subtitle' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'video_url' => 'nullable|url|max:500',
            'link_text' => 'nullable|string|max:255',
            'link_url' => 'nullable|string|max:255',
            'text_color' => 'required|in:light,dark',
            'order' => 'required|integer|min:0',
            'is_active' => 'boolean'
        ]);

        $validated['is_active'] = $request->has('is_active');

        HeroSlide::create($validated);

        return redirect()->route('admin.hero-slides.index')->with('success', 'Hero slide created successfully.');
    }

    public function edit(HeroSlide $heroSlide)
    {
        return view('admin.hero_slides.edit', compact('heroSlide'));
    }

    public function update(Request $request, HeroSlide $heroSlide)
    {
        $validated = $request->validate([
            'subtitle' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'video_url' => 'nullable|url|max:500',
            'link_text' => 'nullable|string|max:255',
            'link_url' => 'nullable|string|max:255',
            'text_color' => 'required|in:light,dark',
            'order' => 'required|integer|min:0',
            'is_active' => 'boolean'
        ]);

        $validated['is_active'] = $request->has('is_active');

        $heroSlide->update($validated);

        return redirect()->route('admin.hero-slides.index')->with('success', 'Hero slide updated successfully.');
    }

    public function destroy(HeroSlide $heroSlide)
    {
        $heroSlide->delete();
        return redirect()->route('admin.hero-slides.index')->with('success', 'Hero slide deleted successfully.');
    }
}
