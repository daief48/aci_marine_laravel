<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $query = Client::orderBy('order');
        
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('name', 'like', "%{$search}%");
        }

        $items = $query->paginate(10)->appends($request->all());
        
        $settings = \App\Models\Setting::whereIn('key', [
            'clients_page_subtitle',
            'clients_page_title',
            'clients_page_description'
        ])->pluck('value', 'key');
        
        return view('admin.clients.index', compact('items', 'settings'));
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'nullable',
            'logo_url' => 'nullable',
            'order' => 'nullable',
        ]);

        
        
        $validated['is_active'] = $request->has('is_active');
        if ($request->has('is_featured')) $validated['is_featured'] = $request->has('is_featured');

        if ($request->hasFile('logo_url')) {
            $file = $request->file('logo_url');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/clients'), $filename);
            $validated['logo_url'] = 'uploads/clients/' . $filename;
        }
        
        
        

        Client::create($validated);
        return redirect()->route('admin.clients.index')->with('success', 'Created successfully.');
    }

    public function edit(Client $client)
    {
        $item = $client;
        return view('admin.clients.edit', compact('item'));
    }

    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'name' => 'nullable',
            'logo_url' => 'nullable',
            'order' => 'nullable',
        ]);

        
        $validated['is_active'] = $request->has('is_active');
        if ($request->has('is_featured')) $validated['is_featured'] = $request->has('is_featured');

        if ($request->hasFile('logo_url')) {
            $file = $request->file('logo_url');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/clients'), $filename);
            $validated['logo_url'] = 'uploads/clients/' . $filename;
        } else {
            unset($validated['logo_url']); // Don't override with null if no new file
        }
        

        $client->update($validated);
        return redirect()->route('admin.clients.index')->with('success', 'Updated successfully.');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('admin.clients.index')->with('success', 'Deleted successfully.');
    }
}
