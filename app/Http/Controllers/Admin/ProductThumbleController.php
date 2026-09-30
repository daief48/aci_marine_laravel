<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductThumble;
use Illuminate\Http\Request;

class ProductThumbleController extends Controller
{
    public function index(Request $request)
    {
        $query = ProductThumble::orderBy('order');
        
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('subtitle', 'like', "%{$search}%");
        }

        $items = $query->paginate(10)->appends($request->all());
        return view('admin.product_thumbles.index', compact('items'));
    }

    public function create()
    {
        return view('admin.product_thumbles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'     => 'nullable',
            'tag'       => 'nullable',
            'subtitle'  => 'nullable',
            'image_url' => 'nullable',
            'order'     => 'nullable',
        ]);

        $validated['is_active'] = $request->has('is_active');

        // Handle uploaded image file
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/product-thumbles'), $filename);
            $validated['image'] = 'uploads/product-thumbles/' . $filename;
        }

        // Handle image_url if it's a file
        if ($request->hasFile('image_url')) {
            $file = $request->file('image_url');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/product-thumbles'), $filename);
            $validated['image'] = 'uploads/product-thumbles/' . $filename;
            unset($validated['image_url']);
        }

        ProductThumble::create($validated);
        return redirect()->route('admin.product-thumbles.index')->with('success', 'Created successfully.');
    }

    public function edit(ProductThumble $productThumble)
    {
        $item = $productThumble;
        return view('admin.product_thumbles.edit', compact('item'));
    }

    public function update(Request $request, ProductThumble $productThumble)
    {
        $validated = $request->validate([
            'title'     => 'nullable',
            'tag'       => 'nullable',
            'subtitle'  => 'nullable',
            'image_url' => 'nullable',
            'order'     => 'nullable',
        ]);

        $validated['is_active'] = $request->has('is_active');

        // Handle uploaded image file (new 'image' field)
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($productThumble->image && file_exists(public_path($productThumble->image))) {
                unlink(public_path($productThumble->image));
            }
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/product-thumbles'), $filename);
            $validated['image'] = 'uploads/product-thumbles/' . $filename;
        }

        // Handle image_url if it's a file
        if ($request->hasFile('image_url')) {
            $file = $request->file('image_url');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/product-thumbles'), $filename);
            $validated['image'] = 'uploads/product-thumbles/' . $filename;
            unset($validated['image_url']);
        } else {
            unset($validated['image_url']); // Don't override with null if no new file
        }

        $productThumble->update($validated);
        return redirect()->route('admin.product-thumbles.index')->with('success', 'Updated successfully.');
    }

    public function destroy(ProductThumble $productThumble)
    {
        $productThumble->delete();
        return redirect()->route('admin.product-thumbles.index')->with('success', 'Deleted successfully.');
    }

    public function reorder(Request $request)
    {
        $orders = $request->input('orders', []);
        foreach ($orders as $id => $order) {
            ProductThumble::where('id', $id)->update(['order' => (int)$order]);
        }
        return back()->with('success', 'Homepage product cards order updated successfully.');
    }
}
