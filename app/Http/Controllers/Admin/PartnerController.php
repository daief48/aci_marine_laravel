<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::orderBy('order', 'asc')->orderBy('id', 'asc')->paginate(15);
        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role_subtitle' => 'nullable|string|max:255',
            'badge_text' => 'required|string|max:255',
            'estd_year' => 'nullable|string|max:100',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096',
            'logo_url' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'partner_url' => 'nullable|url|max:255',
            'order' => 'required|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $logoPath = 'image/mitsubishi.png';

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = 'partner_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/partners'), $fileName);
            $logoPath = '/uploads/partners/' . $fileName;
        } elseif ($request->filled('logo_url')) {
            $logoPath = $request->input('logo_url');
        }

        Partner::create([
            'name' => $validated['name'],
            'role_subtitle' => $validated['role_subtitle'] ?? null,
            'badge_text' => $validated['badge_text'],
            'estd_year' => $validated['estd_year'] ?? 'ESTD. ' . date('Y'),
            'logo' => $logoPath,
            'description' => $validated['description'] ?? null,
            'partner_url' => $validated['partner_url'] ?? null,
            'order' => $validated['order'] ?? 0,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.partners.index')->with('success', 'Partner added successfully.');
    }

    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Request $request, Partner $partner)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role_subtitle' => 'nullable|string|max:255',
            'badge_text' => 'required|string|max:255',
            'estd_year' => 'nullable|string|max:100',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096',
            'logo_url' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'partner_url' => 'nullable|url|max:255',
            'order' => 'required|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $logoPath = $partner->logo;

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = 'partner_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/partners'), $fileName);
            $logoPath = '/uploads/partners/' . $fileName;
        } elseif ($request->filled('logo_url')) {
            $logoPath = $request->input('logo_url');
        }

        $partner->update([
            'name' => $validated['name'],
            'role_subtitle' => $validated['role_subtitle'] ?? null,
            'badge_text' => $validated['badge_text'],
            'estd_year' => $validated['estd_year'] ?? $partner->estd_year,
            'logo' => $logoPath,
            'description' => $validated['description'] ?? null,
            'partner_url' => $validated['partner_url'] ?? null,
            'order' => $validated['order'] ?? 0,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.partners.index')->with('success', 'Partner updated successfully.');
    }

    public function destroy(Partner $partner)
    {
        $partner->delete();
        return redirect()->route('admin.partners.index')->with('success', 'Partner deleted successfully.');
    }

    public function reorder(Request $request)
    {
        $orders = $request->input('orders', []);
        foreach ($orders as $id => $order) {
            Partner::where('id', $id)->update(['order' => (int)$order]);
        }
        return back()->with('success', 'Partner display order updated successfully.');
    }
}
