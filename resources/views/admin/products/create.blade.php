@extends('admin.layouts.admin')
@section('title', 'Create Product')
@section('content')
<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="text-2xl font-bold text-slate-800">Add New Product</h2>
        <p class="text-sm text-slate-500 mt-1">Add a new product item under a category (Level 2 hierarchy).</p>
    </div>
    <a href="{{ route('admin.products.index') }}" class="text-slate-500 hover:text-slate-700 font-medium text-sm transition-colors flex items-center gap-1">
        ← Back to List
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden w-full">
    <div class="p-6 border-b border-slate-100 bg-slate-50/50">
        <h3 class="text-sm font-semibold text-slate-700">Product Configuration</h3>
    </div>
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-5">
        @csrf
        
        <div>
            <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">Parent Category</label>
            <select name="product_thumble_id" required class="w-full border border-slate-200 rounded-lg p-2.5 text-sm focus:border-brand-green focus:ring-1 focus:ring-brand-green/20 outline-none transition-all">
                <option value="">-- Assign a Category (Level 1) --</option>
                @foreach($thumbles as $thumble)
                    <option value="{{ $thumble->id }}">{{ $thumble->title }}</option>
                @endforeach
            </select>
            <p class="text-[11px] text-slate-400 mt-1">This product will be listed on the category detail page of the selected category.</p>
        </div>

        <div>
            <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">Product Name</label>
            <input type="text" name="name" required class="w-full border border-slate-200 rounded-lg p-2.5 text-sm focus:border-brand-green focus:ring-1 focus:ring-brand-green/20 outline-none transition-all" placeholder="e.g. Mitsubishi S6M3H-MPTK Marine Engine">
        </div>

        <div>
            <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">Product Image File</label>
            <input type="file" name="image" accept="image/*" class="w-full border border-slate-200 rounded-lg p-2 text-sm focus:border-brand-green focus:ring-1 focus:ring-brand-green/20 outline-none file:mr-4 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-slate-100 file:text-slate-700 hover:file:bg-slate-200">
            <p class="text-[11px] text-slate-400 mt-1">Upload the product image. Clear white or transparent background is recommended.</p>
        </div>

        <div>
            <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">Custom Link URL Override (Optional)</label>
            <input type="text" name="link_url" class="w-full border border-slate-200 rounded-lg p-2.5 text-sm focus:border-brand-green focus:ring-1 focus:ring-brand-green/20 outline-none transition-all" placeholder="e.g. /custom-page-url">
            <p class="text-[11px] text-slate-400 mt-1">Leave empty to use the automatic dynamic page (`/products/{category}/{product}`). Only set this if you want clicking this product card to link somewhere else.</p>
        </div>

        <div class="border-t border-slate-100 pt-4">
            <h4 class="text-sm font-bold text-slate-800 mb-4">Detailed Information (Optional but recommended)</h4>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">General Information</label>
                    <textarea name="general_info" rows="3" class="w-full border border-slate-200 rounded-lg p-2.5 text-sm focus:border-brand-green focus:ring-1 focus:ring-brand-green/20 outline-none transition-all"></textarea>
                </div>
                
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">Applications</label>
                    <textarea name="applications" rows="2" class="w-full border border-slate-200 rounded-lg p-2.5 text-sm focus:border-brand-green focus:ring-1 focus:ring-brand-green/20 outline-none transition-all"></textarea>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">Ratings Information</label>
                    <textarea name="ratings" rows="2" class="w-full border border-slate-200 rounded-lg p-2.5 text-sm focus:border-brand-green focus:ring-1 focus:ring-brand-green/20 outline-none transition-all"></textarea>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">Documentation & Manuals</label>
                    <textarea name="docs" rows="2" class="w-full border border-slate-200 rounded-lg p-2.5 text-sm focus:border-brand-green focus:ring-1 focus:ring-brand-green/20 outline-none transition-all"></textarea>
                </div>
            </div>
        </div>

        <div class="border-t border-slate-100 pt-4">
            <div class="flex justify-between items-center mb-4">
                <h4 class="text-sm font-bold text-slate-800">Key Benefits</h4>
                <button type="button" onclick="addBenefit()" class="text-xs bg-slate-100 hover:bg-slate-200 text-slate-700 px-3 py-1.5 rounded font-semibold transition-colors">+ Add Benefit</button>
            </div>
            <div id="benefits-container" class="space-y-2">
                <div class="flex gap-2">
                    <input type="text" name="benefits[]" class="flex-1 border border-slate-200 rounded-lg p-2 text-sm focus:border-brand-green focus:ring-1 outline-none" placeholder="e.g. Reliable performance">
                    <button type="button" onclick="this.parentElement.remove()" class="px-3 py-2 text-red-500 hover:bg-red-50 rounded-lg">×</button>
                </div>
            </div>
        </div>

        <div class="border-t border-slate-100 pt-4">
            <div class="flex justify-between items-center mb-4">
                <h4 class="text-sm font-bold text-slate-800">Features (Tabs)</h4>
                <button type="button" onclick="addFeature()" class="text-xs bg-slate-100 hover:bg-slate-200 text-slate-700 px-3 py-1.5 rounded font-semibold transition-colors">+ Add Feature</button>
            </div>
            <div id="features-container" class="space-y-3">
                <div class="bg-slate-50 p-3 rounded-lg border border-slate-200 relative group">
                    <button type="button" onclick="this.parentElement.remove()" class="absolute top-2 right-2 text-red-500 hover:text-red-700">×</button>
                    <div class="grid grid-cols-2 gap-3 mb-2 pr-6">
                        <input type="text" name="features[0][key]" class="border border-slate-200 rounded px-2 py-1.5 text-sm" placeholder="Tab Key (e.g. ucd)">
                        <input type="text" name="features[0][title]" class="border border-slate-200 rounded px-2 py-1.5 text-sm" placeholder="Title (e.g. Unrestricted Continuous Duty)">
                    </div>
                    <textarea name="features[0][desc]" rows="2" class="w-full border border-slate-200 rounded px-2 py-1.5 text-sm" placeholder="Feature Description"></textarea>
                </div>
            </div>
        </div>

        <div class="border-t border-slate-100 pt-4">
            <div class="flex justify-between items-center mb-4">
                <h4 class="text-sm font-bold text-slate-800">Specifications Table</h4>
                <button type="button" onclick="addSpec()" class="text-xs bg-slate-100 hover:bg-slate-200 text-slate-700 px-3 py-1.5 rounded font-semibold transition-colors">+ Add Spec</button>
            </div>
            <div id="specs-container" class="space-y-2">
                <div class="flex gap-2">
                    <input type="text" name="specs[0][key]" class="w-1/3 border border-slate-200 rounded-lg p-2 text-sm" placeholder="Spec Name (e.g. Cylinder)">
                    <input type="text" name="specs[0][val]" class="flex-1 border border-slate-200 rounded-lg p-2 text-sm" placeholder="Value (e.g. 6 in-line)">
                    <button type="button" onclick="this.parentElement.remove()" class="px-3 py-2 text-red-500 hover:bg-red-50 rounded-lg">×</button>
                </div>
            </div>
        </div>

        <div class="border-t border-slate-100 pt-4 grid grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">Display Order</label>
                <input type="number" name="order" value="0" min="0" class="w-full border border-slate-200 rounded-lg p-2.5 text-sm focus:border-brand-green focus:ring-1 focus:ring-brand-green/20 outline-none transition-all">
            </div>
            <div class="flex items-center pt-6">
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" id="is_active" class="sr-only peer" checked>
                    <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-brand-green"></div>
                    <span class="ml-3 text-sm font-semibold text-slate-700">Active / Visible</span>
                </label>
            </div>
        </div>

<script>
let featureCount = 1;
function addFeature() {
    const container = document.getElementById('features-container');
    const html = `
        <div class="bg-slate-50 p-3 rounded-lg border border-slate-200 relative group">
            <button type="button" onclick="this.parentElement.remove()" class="absolute top-2 right-2 text-red-500 hover:text-red-700">×</button>
            <div class="grid grid-cols-2 gap-3 mb-2 pr-6">
                <input type="text" name="features[${featureCount}][key]" class="border border-slate-200 rounded px-2 py-1.5 text-sm" placeholder="Tab Key (e.g. ucd)">
                <input type="text" name="features[${featureCount}][title]" class="border border-slate-200 rounded px-2 py-1.5 text-sm" placeholder="Title (e.g. Heavy Duty)">
            </div>
            <textarea name="features[${featureCount}][desc]" rows="2" class="w-full border border-slate-200 rounded px-2 py-1.5 text-sm" placeholder="Feature Description"></textarea>
        </div>
    `;
    container.insertAdjacentHTML('beforeend', html);
    featureCount++;
}

let specCount = 1;
function addSpec() {
    const container = document.getElementById('specs-container');
    const html = `
        <div class="flex gap-2">
            <input type="text" name="specs[${specCount}][key]" class="w-1/3 border border-slate-200 rounded-lg p-2 text-sm" placeholder="Spec Name">
            <input type="text" name="specs[${specCount}][val]" class="flex-1 border border-slate-200 rounded-lg p-2 text-sm" placeholder="Value">
            <button type="button" onclick="this.parentElement.remove()" class="px-3 py-2 text-red-500 hover:bg-red-50 rounded-lg">×</button>
        </div>
    `;
    container.insertAdjacentHTML('beforeend', html);
    specCount++;
}

function addBenefit() {
    const container = document.getElementById('benefits-container');
    const html = `
        <div class="flex gap-2">
            <input type="text" name="benefits[]" class="flex-1 border border-slate-200 rounded-lg p-2 text-sm focus:border-brand-green focus:ring-1 outline-none" placeholder="e.g. New benefit">
            <button type="button" onclick="this.parentElement.remove()" class="px-3 py-2 text-red-500 hover:bg-red-50 rounded-lg">×</button>
        </div>
    `;
    container.insertAdjacentHTML('beforeend', html);
}
</script>

        <div class="border-t border-slate-100 pt-6 flex items-center gap-3">
            <button type="submit" class="bg-brand-green hover:bg-green-600 text-white font-semibold text-sm px-6 py-2.5 rounded-lg shadow-sm transition-colors">
                Save Product
            </button>
            <a href="{{ route('admin.products.index') }}" class="text-slate-500 hover:bg-slate-100 font-semibold text-sm px-4 py-2.5 rounded-lg transition-colors">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
