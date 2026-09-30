<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryItem;
use Illuminate\Http\Request;

class GalleryItemController extends Controller
{
    public function index(Request $request)
    {
        $query = GalleryItem::with('galleryCategory')->orderBy('order');
        
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('title', 'like', "%{$search}%");
        }

        $items = $query->paginate(10)->appends($request->all());
        return view('admin.gallery_items.index', compact('items'));
    }

    public function create()
    {
        $categories = \App\Models\GalleryCategory::where('is_active', true)->get();
        return view('admin.gallery_items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'gallery_category_id' => 'required|exists:gallery_categories,id',
            'image_url' => 'nullable',
            'badge' => 'nullable',
            'title' => 'nullable',
            'description' => 'nullable',
            'order' => 'nullable',
        ]);

        
        
        $validated['is_active'] = $request->has('is_active');
        if ($request->has('is_featured')) $validated['is_featured'] = $request->has('is_featured');

        if ($request->hasFile('image_url')) {
            $file = $request->file('image_url');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/gallery'), $filename);
            $validated['image_url'] = 'uploads/gallery/' . $filename;
        }
        
        
        
        $validated['is_featured'] = $request->has('is_featured');

        GalleryItem::create($validated);
        return redirect()->route('admin.gallery-items.index')->with('success', 'Created successfully.');
    }

    public function edit(GalleryItem $galleryItem)
    {
        $item = $galleryItem;
        $categories = \App\Models\GalleryCategory::where('is_active', true)->get();
        return view('admin.gallery_items.edit', compact('item', 'categories'));
    }

    public function update(Request $request, GalleryItem $galleryItem)
    {
        $validated = $request->validate([
            'gallery_category_id' => 'required|exists:gallery_categories,id',
            'image_url' => 'nullable',
            'badge' => 'nullable',
            'title' => 'nullable',
            'description' => 'nullable',
            'order' => 'nullable',
        ]);

        
        $validated['is_active'] = $request->has('is_active');
        if ($request->has('is_featured')) $validated['is_featured'] = $request->has('is_featured');

        if ($request->hasFile('image_url')) {
            $file = $request->file('image_url');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/gallery'), $filename);
            $validated['image_url'] = 'uploads/gallery/' . $filename;
        } else {
            unset($validated['image_url']); // Don't override with null if no new file
        }
        
        $validated['is_featured'] = $request->has('is_featured');

        $galleryItem->update($validated);
        return redirect()->route('admin.gallery-items.index')->with('success', 'Updated successfully.');
    }

    public function destroy(GalleryItem $galleryItem)
    {
        $galleryItem->delete();
        return redirect()->route('admin.gallery-items.index')->with('success', 'Deleted successfully.');
    }
}
