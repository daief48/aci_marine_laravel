<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductThumble;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('productThumble')->orderBy('order');

        if ($request->filled('category_id')) {
            $query->where('product_thumble_id', $request->category_id);
        }
        
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('name', 'like', "%{$search}%");
        }

        $items = $query->paginate(15)->appends($request->all());
        $categories = ProductThumble::orderBy('order')->get();

        return view('admin.products.index', compact('items', 'categories'));
    }

    public function create()
    {
        $thumbles = ProductThumble::orderBy('order')->get();
        return view('admin.products.create', compact('thumbles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_thumble_id' => 'nullable',
            'name'               => 'nullable',
            'link_url'           => 'nullable',
            'order'              => 'nullable',
            'general_info'       => 'nullable',
            'applications'       => 'nullable',
            'ratings'            => 'nullable',
            'docs'               => 'nullable',
            'benefits'           => 'nullable|array',
            'features'           => 'nullable|array',
            'specs'              => 'nullable|array',
        ]);

        $validated['is_active'] = $request->has('is_active');

        // Clean up arrays if needed
        if (isset($validated['benefits'])) {
            $validated['benefits'] = array_values(array_filter($validated['benefits']));
        }
        if (isset($validated['features'])) {
            $validated['features'] = array_values(array_filter($validated['features'], function($f) {
                return !empty($f['key']) && !empty($f['title']);
            }));
            
            // Re-key by feature key
            $featuresObj = [];
            foreach ($validated['features'] as $f) {
                $featuresObj[$f['key']] = [
                    'title' => $f['title'],
                    'desc' => $f['desc'] ?? ''
                ];
            }
            $validated['features'] = $featuresObj;
        }
        if (isset($validated['specs'])) {
            $validated['specs'] = array_values(array_filter($validated['specs'], function($s) {
                return !empty($s['key']);
            }));
            
            // Re-key by spec key
            $specsObj = [];
            foreach ($validated['specs'] as $s) {
                $specsObj[$s['key']] = $s['val'] ?? '';
            }
            $validated['specs'] = $specsObj;
        }

        // Handle uploaded image
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/products'), $filename);
            $validated['image'] = 'uploads/products/' . $filename;
        }

        Product::create($validated);
        return redirect()->route('admin.products.index')->with('success', 'Created successfully.');
    }

    public function edit(Product $product)
    {
        $item    = $product;
        $thumbles = ProductThumble::orderBy('order')->get();
        return view('admin.products.edit', compact('item', 'thumbles'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'product_thumble_id' => 'nullable',
            'name'               => 'nullable',
            'link_url'           => 'nullable',
            'order'              => 'nullable',
            'general_info'       => 'nullable',
            'applications'       => 'nullable',
            'ratings'            => 'nullable',
            'docs'               => 'nullable',
            'benefits'           => 'nullable|array',
            'features'           => 'nullable|array',
            'specs'              => 'nullable|array',
        ]);

        $validated['is_active'] = $request->has('is_active');

        // Clean up arrays if needed
        if (isset($validated['benefits'])) {
            $validated['benefits'] = array_values(array_filter($validated['benefits']));
        }
        if (isset($validated['features'])) {
            $validated['features'] = array_values(array_filter($validated['features'], function($f) {
                return !empty($f['key']) && !empty($f['title']);
            }));
            
            // Re-key by feature key
            $featuresObj = [];
            foreach ($validated['features'] as $f) {
                $featuresObj[$f['key']] = [
                    'title' => $f['title'],
                    'desc' => $f['desc'] ?? ''
                ];
            }
            $validated['features'] = $featuresObj;
        }
        if (isset($validated['specs'])) {
            $validated['specs'] = array_values(array_filter($validated['specs'], function($s) {
                return !empty($s['key']);
            }));
            
            // Re-key by spec key
            $specsObj = [];
            foreach ($validated['specs'] as $s) {
                $specsObj[$s['key']] = $s['val'] ?? '';
            }
            $validated['specs'] = $specsObj;
        }

        // Handle uploaded image
        if ($request->hasFile('image')) {
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/products'), $filename);
            $validated['image'] = 'uploads/products/' . $filename;
        }

        $product->update($validated);
        return redirect()->route('admin.products.index')->with('success', 'Updated successfully.');
    }

    public function destroy(Product $product)
    {
        if ($product->image && file_exists(public_path($product->image))) {
            unlink(public_path($product->image));
        }
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Deleted successfully.');
    }

    public function reorder(Request $request)
    {
        $orders = $request->input('orders', []);
        foreach ($orders as $id => $order) {
            Product::where('id', $id)->update(['order' => (int)$order]);
        }
        return back()->with('success', 'Product display order updated successfully.');
    }
}
