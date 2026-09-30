<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ProjectReference;

class ProjectReferenceController extends Controller
{
    public function index(Request $request)
    {
        $query = ProjectReference::latest();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('project_name', 'like', "%{$search}%")
                  ->orWhere('client_name', 'like', "%{$search}%");
        }

        $projects = $query->paginate(10)->appends($request->all());
        return view('admin.project_references.index', compact('projects'));
    }

    public function create()
    {
        $galleryCategories = \App\Models\ProjectGalleryCategory::where('is_active', true)->orderBy('order')->get();
        return view('admin.project_references.create', compact('galleryCategories'));
    }

    public function store(Request $request)
    {
        $data = $request->except(['_token', 'hero_bg', 'gallery_items']);
        
        if ($request->hasFile('hero_bg')) {
            $file = $request->file('hero_bg');
            $filename = time() . '_hero_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/projects'), $filename);
            $data['hero_bg'] = 'uploads/projects/' . $filename;
        }

        $galleryItems = [];
        if ($request->has('gallery_items')) {
            foreach ($request->input('gallery_items', []) as $index => $itemData) {
                if ($request->hasFile("gallery_items.{$index}.image")) {
                    $file = $request->file("gallery_items.{$index}.image");
                    $filename = time() . '_gallery_' . $file->getClientOriginalName();
                    $file->move(public_path('uploads/projects'), $filename);
                    $itemData['img'] = 'uploads/projects/' . $filename;
                }
                unset($itemData['image']);
                $galleryItems[] = $itemData;
            }
        }
        $data['gallery_items'] = $galleryItems;
        
        if ($request->has('phases')) {
            $data['phases'] = array_values($request->input('phases', []));
        }

        ProjectReference::create($data);

        return redirect()->route('admin.project-references.index')->with('success', 'Project created successfully.');
    }

    public function edit(ProjectReference $projectReference)
    {
        $galleryCategories = \App\Models\ProjectGalleryCategory::where('is_active', true)->orderBy('order')->get();
        return view('admin.project_references.edit', compact('projectReference', 'galleryCategories'));
    }

    public function update(Request $request, ProjectReference $projectReference)
    {
        $data = $request->except(['_token', '_method', 'hero_bg', 'gallery_items']);

        if ($request->hasFile('hero_bg')) {
            $file = $request->file('hero_bg');
            $filename = time() . '_hero_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/projects'), $filename);
            $data['hero_bg'] = 'uploads/projects/' . $filename;
        }

        $galleryItems = [];
        if ($request->has('gallery_items')) {
            foreach ($request->input('gallery_items', []) as $index => $itemData) {
                // If a new image was uploaded
                if ($request->hasFile("gallery_items.{$index}.image")) {
                    $file = $request->file("gallery_items.{$index}.image");
                    $filename = time() . '_gallery_' . $file->getClientOriginalName();
                    $file->move(public_path('uploads/projects'), $filename);
                    $itemData['img'] = 'uploads/projects/' . $filename;
                } else if (isset($itemData['existing_img'])) {
                    $itemData['img'] = $itemData['existing_img'];
                }
                unset($itemData['existing_img']);
                unset($itemData['image']);
                $galleryItems[] = $itemData;
            }
        }
        $data['gallery_items'] = $galleryItems;

        if ($request->has('phases')) {
            $data['phases'] = array_values($request->input('phases', []));
        } else {
            $data['phases'] = [];
        }

        $projectReference->update($data);

        return redirect()->route('admin.project-references.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(ProjectReference $projectReference)
    {
        $projectReference->delete();
        return redirect()->route('admin.project-references.index')->with('success', 'Project deleted successfully.');
    }
}
