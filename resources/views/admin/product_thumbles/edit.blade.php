@extends('admin.layouts.admin')
@section('title', 'Edit Product Category')
@section('content')
<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="text-2xl font-bold text-slate-800">Edit Product Category</h2>
        <p class="text-sm text-slate-500 mt-1">Modify details for the product category: <strong>{{ $item->title }}</strong>.</p>
    </div>
    <a href="{{ route('admin.product-thumbles.index') }}" class="text-slate-500 hover:text-slate-700 font-medium text-sm transition-colors flex items-center gap-1">
        ← Back to List
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden w-full">
    <div class="p-6 border-b border-slate-100 bg-slate-50/50">
        <h3 class="text-sm font-semibold text-slate-700">Category Configuration</h3>
    </div>
    <form action="{{ route('admin.product-thumbles.update', $item) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-5">
        @csrf @method('PUT')
        
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">Category Name (Title)</label>
                <input type="text" name="title" value="{{ $item->title }}" required class="w-full border border-slate-200 rounded-lg p-2.5 text-sm focus:border-brand-green focus:ring-1 focus:ring-brand-green/20 outline-none transition-all" placeholder="e.g. Navigation & Safety">
            </div>
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">Badge Tag</label>
                <input type="text" name="tag" value="{{ $item->tag }}" required class="w-full border border-slate-200 rounded-lg p-2.5 text-sm focus:border-brand-green focus:ring-1 focus:ring-brand-green/20 outline-none transition-all" placeholder="e.g. Nav & Safety">
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">Subtitle / Description</label>
            <textarea name="subtitle" rows="3" class="w-full border border-slate-200 rounded-lg p-2.5 text-sm focus:border-brand-green focus:ring-1 focus:ring-brand-green/20 outline-none transition-all" placeholder="Enter a comprehensive category description shown at the top of the category page...">{{ $item->subtitle }}</textarea>
        </div>

        <div class="border-t border-slate-100 pt-4 grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">Category Image File</label>
                @if($item->image)
                    <div class="mb-3 relative group">
                        <img src="{{ $item->imageUrl() }}" class="h-24 object-contain rounded-lg border border-slate-200 bg-slate-50 p-1">
                        <p class="text-[10px] text-slate-400 mt-1">Current uploaded image</p>
                    </div>
                @endif
                <input type="file" name="image" accept="image/*" class="w-full border border-slate-200 rounded-lg p-2 text-sm focus:border-brand-green focus:ring-1 focus:ring-brand-green/20 outline-none file:mr-4 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-slate-100 file:text-slate-700 hover:file:bg-slate-200">
                <p class="text-[11px] text-slate-400 mt-1">Upload a new image file to replace current one</p>
            </div>
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">External Image URL</label>
                @if($item->image_url && !$item->image)
                    <div class="mb-3">
                        <img src="{{ $item->image_url }}" class="h-24 object-contain rounded-lg border border-slate-200 bg-slate-50 p-1">
                        <p class="text-[10px] text-slate-400 mt-1">Current external URL image</p>
                    </div>
                @endif
                <input type="text" name="image_url" value="{{ $item->image_url }}" class="w-full border border-slate-200 rounded-lg p-2.5 text-sm focus:border-brand-green focus:ring-1 focus:ring-brand-green/20 outline-none transition-all" placeholder="https://...">
            </div>
        </div>

        <div class="border-t border-slate-100 pt-4 grid grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">Display Order</label>
                <input type="number" name="order" value="{{ $item->order }}" min="0" class="w-full border border-slate-200 rounded-lg p-2.5 text-sm focus:border-brand-green focus:ring-1 focus:ring-brand-green/20 outline-none transition-all">
            </div>
            <div class="flex items-center pt-6">
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" id="is_active" class="sr-only peer" {{ $item->is_active ? 'checked' : '' }}>
                    <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-brand-green"></div>
                    <span class="ml-3 text-sm font-semibold text-slate-700">Active / Published</span>
                </label>
            </div>
        </div>

        <div class="border-t border-slate-100 pt-6 flex items-center gap-3">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm px-6 py-2.5 rounded-lg shadow-sm transition-colors">
                Update Category
            </button>
            <a href="{{ route('admin.product-thumbles.index') }}" class="text-slate-500 hover:bg-slate-100 font-semibold text-sm px-4 py-2.5 rounded-lg transition-colors">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
