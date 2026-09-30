<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutHighlight;
use Illuminate\Http\Request;

class AboutHighlightController extends Controller
{
    public function index(Request $request)
    {
        $query = AboutHighlight::query();
        
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
        }

        $items = $query->paginate(10)->appends($request->all());
        return view('admin.about_highlights.index', compact('items'));
    }

    public function create()
    {
        return view('admin.about_highlights.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        AboutHighlight::create($validated);
        return redirect()->route('admin.about-highlights.index')->with('success', 'Created successfully.');
    }

    public function edit(AboutHighlight $aboutHighlight)
    {
        return view('admin.about_highlights.edit', ['item' => $aboutHighlight]);
    }

    public function update(Request $request, AboutHighlight $aboutHighlight)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $aboutHighlight->update($validated);
        return redirect()->route('admin.about-highlights.index')->with('success', 'Updated successfully.');
    }

    public function destroy(AboutHighlight $aboutHighlight)
    {
        $aboutHighlight->delete();
        return redirect()->route('admin.about-highlights.index')->with('success', 'Deleted successfully.');
    }
}
