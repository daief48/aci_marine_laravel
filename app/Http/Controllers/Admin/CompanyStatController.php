<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyStat;
use Illuminate\Http\Request;

class CompanyStatController extends Controller
{
    public function index(Request $request)
    {
        $query = CompanyStat::orderBy('order');
        
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('label', 'like', "%{$search}%");
        }

        $items = $query->paginate(10)->appends($request->all());
        return view('admin.company_stats.index', compact('items'));
    }

    public function create()
    {
        return view('admin.company_stats.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'number' => 'nullable',
            'label' => 'nullable',
            'order' => 'nullable',
        ]);

        $validated['is_active'] = $request->has('is_active');

        CompanyStat::create($validated);
        return redirect()->route('admin.company-stats.index')->with('success', 'Created successfully.');
    }

    public function edit(CompanyStat $companyStat)
    {
        $item = $companyStat;
        return view('admin.company_stats.edit', compact('item'));
    }

    public function update(Request $request, CompanyStat $companyStat)
    {
        $validated = $request->validate([
            'number' => 'nullable',
            'label' => 'nullable',
            'order' => 'nullable',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $companyStat->update($validated);
        return redirect()->route('admin.company-stats.index')->with('success', 'Updated successfully.');
    }

    public function destroy(CompanyStat $companyStat)
    {
        $companyStat->delete();
        return redirect()->route('admin.company-stats.index')->with('success', 'Deleted successfully.');
    }
}
