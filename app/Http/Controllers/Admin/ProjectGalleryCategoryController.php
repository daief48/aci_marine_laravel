<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectGalleryCategory;
use Illuminate\Http\Request;

class ProjectGalleryCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = ProjectGalleryCategory::orderBy('order');
        
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('name', 'like', "%{$search}%");
        }

        $items = $query->paginate(10)->appends($request->all());
        return view('admin.project_gallery_categories.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.project_gallery_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'order' => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->has('is_active');

        ProjectGalleryCategory::create($validated);
        return redirect()->route('admin.project-gallery-categories.index')->with('success', 'Project Gallery Category created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectGalleryCategory $projectGalleryCategory)
    {
        $item = $projectGalleryCategory;
        return view('admin.project_gallery_categories.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProjectGalleryCategory $projectGalleryCategory)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'order' => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $projectGalleryCategory->update($validated);
        return redirect()->route('admin.project-gallery-categories.index')->with('success', 'Project Gallery Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectGalleryCategory $projectGalleryCategory)
    {
        $projectGalleryCategory->delete();
        return redirect()->route('admin.project-gallery-categories.index')->with('success', 'Project Gallery Category deleted successfully.');
    }
}
