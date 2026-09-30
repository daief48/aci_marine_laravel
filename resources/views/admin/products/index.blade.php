@extends('admin.layouts.admin')
@section('title', 'Products')
@section('content')
<div class='mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4'>
    <div>
        <h2 class='text-2xl font-bold text-slate-800'>Products</h2>
        <p class='text-sm text-slate-500 mt-1'>Manage your website's Products.</p>
    </div>
    <div class='flex items-center gap-3'>
        <form action="{{ route('admin.products.index') }}" method="GET" class="flex items-center gap-3">
            <div class="relative">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name..." class="pl-9 pr-4 py-2.5 rounded-lg border border-slate-300 text-sm focus:ring focus:ring-brand-green/20 focus:border-brand-green outline-none bg-white min-w-[200px]">
                <svg class="w-4 h-4 text-slate-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>
            <select name="category_id" onchange="this.form.submit()" class="px-3 py-2.5 rounded-lg border border-slate-300 text-sm focus:ring focus:ring-brand-green/20 focus:border-brand-green outline-none bg-white min-w-[200px]">
                <option value="">All Categories</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->title }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="hidden">Search</button>
        </form>
        <a href="{{ route('admin.products.create') }}" class='bg-brand-green hover:bg-green-600 text-white px-5 py-2.5 rounded-lg shadow-sm font-medium text-sm transition-colors flex items-center gap-2 whitespace-nowrap'>
            <svg class='w-4 h-4' fill='none' stroke='currentColor' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M12 4v16m8-8H4'></path></svg>
            Add New
        </a>
    </div>
</div>

<div class='bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden'>
    <div class='overflow-x-auto'>
        <table class='w-full min-w-full divide-y divide-slate-200'>
            <thead class='bg-slate-50'>
                <tr>
                    <th class='p-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider'>Image</th>
                    <th class='p-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider'>Name & Category</th>
                    <th class='p-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider'>Link Override</th>
                    <th class='p-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider'>Order</th>
                    <th class='p-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider'>Status</th>
                    <th class='p-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider'>Actions</th>
                </tr>
            </thead>
            <tbody class='bg-white divide-y divide-slate-200'>
                @forelse($items as $item)
                <tr class='hover:bg-slate-50/50 transition-colors'>
                    <td class='p-4 whitespace-nowrap'>
                        <div class='flex items-center'>
                            <div class='h-12 w-12 flex-shrink-0'>
                                <img class='h-12 w-12 rounded-lg object-cover border border-slate-200 shadow-sm' src='{{ $item->imageUrl() }}' alt='{{ $item->name }}'>
                            </div>
                        </div>
                    </td>
                    <td class='p-4'>
                        <div class='text-sm font-semibold text-slate-900'>{{ $item->name }}</div>
                        @if($item->productThumble)
                            <span class='inline-flex mt-1 items-center px-2 py-0.5 rounded text-xs font-medium bg-emerald-100 text-emerald-800'>
                                {{ $item->productThumble->title }}
                            </span>
                        @else
                            <span class='inline-flex mt-1 items-center px-2 py-0.5 rounded text-xs font-medium bg-slate-100 text-slate-600'>
                                Unassigned
                            </span>
                        @endif
                    </td>
                    <td class='p-4 text-sm text-slate-500'>
                        @if($item->link_url)
                            <a href='{{ $item->link_url }}' target='_blank' class='text-blue-600 hover:underline flex items-center gap-1'>
                                View Link <svg class='w-3 h-3' fill='none' stroke='currentColor' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14'></path></svg>
                            </a>
                        @else
                            @if($item->product_thumble_id)
                                <a href='{{ route('products.detail', [$item->product_thumble_id, $item->id]) }}' target='_blank' class='text-blue-600 hover:underline flex items-center gap-1'>
                                    View Auto-Page <svg class='w-3 h-3' fill='none' stroke='currentColor' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14'></path></svg>
                                </a>
                            @else
                                <span class='text-slate-400 italic text-xs'>Unassigned (No Page)</span>
                            @endif
                        @endif
                    </td>
                    <td class='p-4 whitespace-nowrap text-sm text-slate-500'>{{ $item->order }}</td>
                    <td class='p-4 whitespace-nowrap'>
                        <span class='px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $item->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}'>
                            {{ $item->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
        
                    <td class='p-4 whitespace-nowrap text-sm font-medium'>
                        <div class='flex items-center gap-3'>
                            <a href="{{ route('admin.products.edit', $item) }}" class='text-slate-400 hover:text-blue-600 transition-colors' title='Edit'>
                                <svg class='w-5 h-5' fill='none' stroke='currentColor' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z'></path></svg>
                            </a>
                            <form action="{{ route('admin.products.destroy', $item) }}" method='POST' class='inline-block m-0 delete-form'>
                                @csrf @method('DELETE')
                                <button type='submit' class='text-slate-400 hover:text-red-600 transition-colors' title='Delete'>
                                    <svg class='w-5 h-5' fill='none' stroke='currentColor' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16'></path></svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan='100%' class='p-8 text-center text-slate-500'>
                        <div class='flex flex-col items-center justify-center'>
                            <svg class='w-12 h-12 text-slate-300 mb-3' fill='none' stroke='currentColor' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4'></path></svg>
                            <p class='text-base font-medium text-slate-900'>No items found</p>
                            <p class='text-sm mt-1'>Get started by creating a new item.</p>
                            <a href="{{ route('admin.products.create') }}" class='mt-4 text-brand-green font-medium hover:underline'>Create New</a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class='p-4 border-t border-slate-200'>
        {{ $items->links() }}
    </div>
</div>

{{-- ── PER-CATEGORY DRAG-AND-DROP REORDER ──────────────────────────── --}}
<div class="mt-8 space-y-6">
    <div class="flex items-center gap-2 mb-2">
        <svg class="w-5 h-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
        <h3 class="text-base font-bold text-slate-800">Reorder Products per Category</h3>
        <span class="text-xs text-slate-400 bg-slate-100 px-2 py-1 rounded-md ml-2">Drag rows → click Save</span>
    </div>

    @foreach($categories as $cat)
    @php $catProducts = \App\Models\Product::where('product_thumble_id', $cat->id)->where('is_active', true)->orderBy('order','asc')->orderBy('id','asc')->get(); @endphp
    @if($catProducts->count() > 0)
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="px-5 py-3 border-b border-slate-100 bg-slate-50/60 flex items-center gap-3">
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-blue-100 text-blue-800">{{ $cat->tag ?? $cat->title }}</span>
            <span class="text-sm font-semibold text-slate-700">{{ $cat->title }}</span>
        </div>
        <form action="{{ route('admin.products.reorder') }}" method="POST" class="p-4">
            @csrf
            <ul id="sortable-products-{{ $cat->id }}" class="space-y-2">
                @foreach($catProducts as $prod)
                <li class="flex items-center gap-3 p-3 bg-slate-50 border border-slate-200 rounded-lg cursor-grab active:cursor-grabbing hover:bg-slate-100 transition-colors"
                    data-id="{{ $prod->id }}">
                    <input type="hidden" name="orders[{{ $prod->id }}]" value="{{ $prod->order }}" class="order-input">
                    <span class="text-slate-400 shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16"/></svg>
                    </span>
                    <div class="flex-1 min-w-0">
                        <span class="text-sm font-semibold text-slate-800">{{ $prod->name }}</span>
                        <span class="ml-2 text-xs text-slate-400">order: <span class="order-label font-mono font-bold text-slate-600">{{ $prod->order }}</span></span>
                    </div>
                    <a href="{{ route('admin.products.edit', $prod) }}" class="text-xs text-blue-600 hover:underline shrink-0">Edit</a>
                </li>
                @endforeach
            </ul>
            <div class="mt-3 flex items-center gap-3">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs px-5 py-2 rounded-lg shadow-sm transition-colors flex items-center gap-2">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    Save {{ $cat->title }} Order
                </button>
            </div>
        </form>
    </div>
    @endif
    @endforeach
</div>

{{-- SortableJS --}}
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.3/Sortable.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('[id^="sortable-products-"]').forEach(function (list) {
        Sortable.create(list, {
            animation: 150,
            ghostClass: 'bg-blue-50',
            onEnd: function () {
                const rows = list.querySelectorAll('li');
                rows.forEach(function (row, index) {
                    const input = row.querySelector('.order-input');
                    const label = row.querySelector('.order-label');
                    const newOrder = index + 1;
                    if (input) input.value = newOrder;
                    if (label) label.textContent = newOrder;
                });
            }
        });
    });
});
</script>
@endsection