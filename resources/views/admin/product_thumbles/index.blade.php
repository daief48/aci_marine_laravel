@extends('admin.layouts.admin')
@section('title', 'Product Categories')
@section('content')

@if(session('success'))
<div class="mb-4 flex items-center gap-3 px-4 py-3 rounded-lg bg-green-50 border border-green-200 text-green-800 text-sm font-medium">
    <svg class="w-5 h-5 text-green-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
    {{ session('success') }}
</div>
@endif

<div class='mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4'>
    <div>
        <h2 class='text-2xl font-bold text-slate-800'>Product Categories</h2>
        <p class='text-sm text-slate-500 mt-1'>Manage your website's Product Categories & homepage display order.</p>
    </div>
    <div class='flex items-center gap-3'>
        <form action="{{ route('admin.product-thumbles.index') }}" method="GET" class="flex items-center gap-3">
            <div class="relative">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search categories..." class="pl-9 pr-4 py-2.5 rounded-lg border border-slate-300 text-sm focus:ring focus:ring-brand-green/20 focus:border-brand-green outline-none bg-white min-w-[200px]">
                <svg class="w-4 h-4 text-slate-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>
            <button type="submit" class="hidden">Search</button>
        </form>
        <a href="{{ route('admin.product-thumbles.create') }}" class='bg-brand-green hover:bg-green-600 text-white px-5 py-2.5 rounded-lg shadow-sm font-medium text-sm transition-colors flex items-center gap-2 whitespace-nowrap'>
            <svg class='w-4 h-4' fill='none' stroke='currentColor' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M12 4v16m8-8H4'></path></svg>
            Add New
        </a>
    </div>
</div>

{{-- ── FULL TABLE (edit/delete) ─────────────────────────────────────── --}}
<div class='bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden'>
    <div class='overflow-x-auto'>
        <table class='w-full min-w-full divide-y divide-slate-200'>
            <thead class='bg-slate-50'>
                <tr>
                    <th class='p-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider'>Image</th>
                    <th class='p-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider'>Details</th>
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
                                <img class='h-12 w-12 rounded-lg object-cover border border-slate-200 shadow-sm' src='{{ $item->imageUrl() }}' alt='{{ $item->title }}'>
                            </div>
                        </div>
                    </td>
                    <td class='p-4'>
                        <div class='text-sm font-semibold text-slate-900'>{{ $item->title }}</div>
                        <div class='text-xs text-slate-500 truncate max-w-xs'>{{ $item->subtitle }}</div>
                        <span class='inline-flex mt-1 items-center px-2 py-0.5 rounded text-xs font-medium bg-blue-100 text-blue-800'>{{ $item->tag }}</span>
                    </td>
                    <td class='p-4 whitespace-nowrap text-sm font-mono font-bold text-slate-600'>{{ $item->order }}</td>
                    <td class='p-4 whitespace-nowrap'>
                        <span class='px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $item->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}'>
                            {{ $item->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td class='p-4 whitespace-nowrap text-sm font-medium'>
                        <div class='flex items-center gap-3'>
                            <a href="{{ route('admin.product-thumbles.edit', $item) }}" class='text-slate-400 hover:text-blue-600 transition-colors' title='Edit'>
                                <svg class='w-5 h-5' fill='none' stroke='currentColor' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z'></path></svg>
                            </a>
                            <form action="{{ route('admin.product-thumbles.destroy', $item) }}" method='POST' class='inline-block m-0 delete-form'>
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
                            <a href="{{ route('admin.product-thumbles.create') }}" class='mt-4 text-brand-green font-medium hover:underline'>Create New</a>
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

{{-- ── DRAG-AND-DROP REORDER PANEL (below table) ───────────────────── --}}
<div class="mt-6 bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
    <div class="px-6 py-4 border-b border-slate-100 bg-slate-50/60 flex items-center justify-between">
        <div class="flex items-center gap-2">
            <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
            <h3 class="text-sm font-semibold text-slate-700">Homepage Card Display Order</h3>
        </div>
        <span class="text-xs text-slate-400 bg-slate-100 px-2 py-1 rounded-md">Drag rows to reorder → click Save</span>
    </div>

    <form id="reorderForm" action="{{ route('admin.product-thumbles.reorder') }}" method="POST" class="p-4">
        @csrf
        <ul id="sortable-thumbles" class="space-y-2">
            @foreach($items->sortBy('order') as $item)
            <li class="flex items-center gap-3 p-3 bg-slate-50 border border-slate-200 rounded-lg cursor-grab active:cursor-grabbing hover:bg-slate-100 transition-colors"
                data-id="{{ $item->id }}">
                <input type="hidden" name="orders[{{ $item->id }}]" value="{{ $item->order }}" class="order-input">

                <span class="text-slate-400 shrink-0">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16"/>
                    </svg>
                </span>

                <img src="{{ $item->imageUrl() }}" class="w-10 h-10 rounded-lg object-cover border border-slate-200 shrink-0" alt="{{ $item->title }}">

                <div class="flex-1 min-w-0">
                    <span class="text-sm font-semibold text-slate-800">{{ $item->title }}</span>
                    <span class="ml-2 text-xs text-slate-400">(order: <span class="order-label font-mono font-bold text-slate-600">{{ $item->order }}</span>)</span>
                </div>

                <span class="shrink-0 text-xs px-2 py-0.5 rounded-full font-semibold {{ $item->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                    {{ $item->is_active ? 'Active' : 'Inactive' }}
                </span>
            </li>
            @endforeach
        </ul>

        <div class="mt-4 flex items-center gap-3">
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm px-6 py-2.5 rounded-lg shadow-sm transition-colors flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Save Order to Homepage
            </button>
            <span class="text-xs text-slate-400">Changes take effect immediately on the homepage and /products page.</span>
        </div>
    </form>
</div>

{{-- SortableJS --}}
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.3/Sortable.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const list = document.getElementById('sortable-thumbles');
    if (!list) return;

    Sortable.create(list, {
        animation: 150,
        ghostClass: 'bg-blue-50',
        handle: 'li',
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
</script>
@endsection