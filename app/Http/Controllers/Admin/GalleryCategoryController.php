<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;

class GalleryCategoryController extends Controller
{
    public function index(Request $request)
    {
        $query = GalleryCategory::orderBy('order');
        
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('name', 'like', "%{$search}%");
        }

        $items = $query->paginate(10)->appends($request->all());
        return view('admin.gallery_categories.index', compact('items'));
    }

    public function create()
    {
        return view('admin.gallery_categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'order' => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->has('is_active');

        GalleryCategory::create($validated);
        return redirect()->route('admin.gallery-categories.index')->with('success', 'Created successfully.');
    }

    public function edit(GalleryCategory $galleryCategory)
    {
        $item = $galleryCategory;
        return view('admin.gallery_categories.edit', compact('item'));
    }

    public function update(Request $request, GalleryCategory $galleryCategory)
    {
        $validated = $request->validate([
            'name' => 'required',
            'order' => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $galleryCategory->update($validated);
        return redirect()->route('admin.gallery-categories.index')->with('success', 'Updated successfully.');
    }

    public function destroy(GalleryCategory $galleryCategory)
    {
        $galleryCategory->delete();
        return redirect()->route('admin.gallery-categories.index')->with('success', 'Deleted successfully.');
    }
}
