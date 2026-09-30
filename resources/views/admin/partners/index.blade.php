@extends('admin.layouts.admin')
@section('title', 'Authorized Partnerships')

@section('content')
@if(session('success'))
<div class="mb-6 flex items-center gap-3 px-4 py-3 rounded-xl bg-green-50 border border-green-200 text-green-800 text-sm font-medium shadow-sm">
    <svg class="w-5 h-5 text-green-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
    {{ session('success') }}
</div>
@endif

<div class='mb-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4'>
    <div>
        <div class="flex items-center gap-2 text-xs font-semibold text-brand-green tracking-wider uppercase mb-1">
            <span class="w-2 h-2 rounded-full bg-brand-green"></span>
            About Page & Contact Page
        </div>
        <h1 class='text-2xl md:text-3xl font-extrabold text-slate-800 tracking-tight'>Authorized Partnerships</h1>
        <p class='text-sm text-slate-500 mt-1'>Manage your dynamic global partner brands (e.g. MHIET Japan, DAMEN, etc.).</p>
    </div>
    <div class='flex items-center gap-3'>
        <a href="{{ route('admin.partners.create') }}" class='bg-brand-green hover:bg-[#1b7430] text-white px-5 py-2.5 rounded-xl shadow-md font-bold text-xs transition-all flex items-center gap-2 whitespace-nowrap shadow-green-600/20 hover:shadow-lg'>
            <svg class='w-4 h-4' fill='none' stroke='currentColor' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M12 4v16m8-8H4'></path></svg>
            Add New Partner
        </a>
    </div>
</div>

{{-- ── FULL TABLE (edit/delete) ─────────────────────────────────────── --}}
<div class='bg-white rounded-2xl shadow-sm border border-slate-200/80 overflow-hidden mb-8'>
    <div class="px-6 py-4 border-b border-slate-100 bg-slate-50/60 flex items-center justify-between">
        <h3 class="text-sm font-bold text-slate-800">Partners Directory ({{ $partners->total() }})</h3>
        <span class="text-xs text-slate-400">Featured across About & Contact pages</span>
    </div>
    <div class='overflow-x-auto'>
        <table class='w-full min-w-full divide-y divide-slate-200'>
            <thead class='bg-slate-50/50'>
                <tr>
                    <th class='p-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider'>Partner Brand</th>
                    <th class='p-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider'>Role / Subtitle</th>
                    <th class='p-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider'>Badge & Estd</th>
                    <th class='p-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider'>Sort Order</th>
                    <th class='p-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider'>Status</th>
                    <th class='p-4 text-right text-xs font-bold text-slate-500 uppercase tracking-wider'>Actions</th>
                </tr>
            </thead>
            <tbody class='bg-white divide-y divide-slate-100'>
                @forelse($partners as $partner)
                <tr class='hover:bg-slate-50/60 transition-colors'>
                    <td class='p-4 whitespace-nowrap'>
                        <div class='flex items-center gap-3'>
                            <div class='h-12 w-24 bg-slate-50 rounded-xl border border-slate-200 p-2 flex items-center justify-center shrink-0 shadow-xs'>
                                <img class='max-h-8 max-w-full object-contain' src='{{ $partner->logoUrl() }}' alt='{{ $partner->name }}'>
                            </div>
                            <div>
                                <span class='font-bold text-sm text-slate-900 block'>{{ $partner->name }}</span>
                                @if($partner->partner_url)
                                    <a href="{{ $partner->partner_url }}" target="_blank" class="text-[11px] text-blue-600 hover:underline inline-flex items-center gap-1">
                                        Website link
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td class='p-4 text-xs text-slate-600 font-medium'>
                        {{ $partner->role_subtitle ?? '—' }}
                    </td>
                    <td class='p-4 whitespace-nowrap'>
                        <span class='inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-red-50 text-[#F60000] border border-red-100'>
                            {{ $partner->badge_text }}
                        </span>
                        <div class='text-[10px] text-slate-400 font-mono mt-1'>{{ $partner->estd_year }}</div>
                    </td>
                    <td class='p-4 whitespace-nowrap text-xs font-mono font-bold text-slate-700'>
                        #{{ $partner->order }}
                    </td>
                    <td class='p-4 whitespace-nowrap'>
                        <span class='px-2.5 py-0.5 inline-flex text-xs font-semibold rounded-full {{ $partner->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}'>
                            {{ $partner->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td class='p-4 whitespace-nowrap text-right text-xs font-medium'>
                        <div class='flex items-center justify-end gap-2'>
                            <a href="{{ route('admin.partners.edit', $partner) }}" class='p-2 text-slate-500 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors' title='Edit Partner'>
                                <svg class='w-4 h-4' fill='none' stroke='currentColor' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z'></path></svg>
                            </a>
                            <form action="{{ route('admin.partners.destroy', $partner) }}" method='POST' class='inline-block m-0' onsubmit="return confirm('Are you sure you want to remove this partner?');">
                                @csrf @method('DELETE')
                                <button type='submit' class='p-2 text-slate-500 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors' title='Delete Partner'>
                                    <svg class='w-4 h-4' fill='none' stroke='currentColor' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16'></path></svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan='100%' class='p-12 text-center text-slate-500'>
                        <div class='flex flex-col items-center justify-center max-w-sm mx-auto'>
                            <div class="w-12 h-12 rounded-full bg-slate-100 flex items-center justify-center text-slate-400 mb-3">
                                <svg class='w-6 h-6' fill='none' stroke='currentColor' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9'></path></svg>
                            </div>
                            <p class='text-base font-bold text-slate-900'>No authorized partners yet</p>
                            <p class='text-xs text-slate-500 mt-1'>Add your partner organizations to feature them dynamically.</p>
                            <a href="{{ route('admin.partners.create') }}" class='mt-4 bg-brand-green text-white px-4 py-2 rounded-xl text-xs font-bold hover:bg-[#1b7430] transition-all'>Add First Partner</a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($partners->hasPages())
    <div class='p-4 border-t border-slate-100'>
        {{ $partners->links() }}
    </div>
    @endif
</div>

{{-- ── DRAG-AND-DROP REORDER PANEL ─────────────────────────────────── --}}
@if($partners->count() > 1)
<div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 overflow-hidden">
    <div class="px-6 py-4 border-b border-slate-100 bg-slate-50/60 flex items-center justify-between">
        <div class="flex items-center gap-2">
            <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
            <h3 class="text-sm font-bold text-slate-800">Display Sequence Reordering</h3>
        </div>
        <span class="text-xs text-slate-400 bg-slate-100 px-2.5 py-1 rounded-md">Drag rows → click Save</span>
    </div>

    <form id="reorderForm" action="{{ route('admin.partners.reorder') }}" method="POST" class="p-6">
        @csrf
        <ul id="sortable-partners" class="space-y-2.5">
            @foreach($partners->sortBy('order') as $partner)
            <li class="flex items-center gap-3 p-3.5 bg-slate-50 border border-slate-200 rounded-xl cursor-grab active:cursor-grabbing hover:bg-slate-100/80 transition-colors"
                data-id="{{ $partner->id }}">
                <input type="hidden" name="orders[{{ $partner->id }}]" value="{{ $partner->order }}" class="order-input">

                <span class="text-slate-400 shrink-0">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16"/>
                    </svg>
                </span>

                <div class="h-9 w-16 bg-white rounded-lg border border-slate-200 p-1 flex items-center justify-center shrink-0">
                    <img src="{{ $partner->logoUrl() }}" class="max-h-full max-w-full object-contain" alt="{{ $partner->name }}">
                </div>

                <div class="flex-1 min-w-0">
                    <span class="text-sm font-bold text-slate-800">{{ $partner->name }}</span>
                    <span class="ml-2 text-xs text-slate-400">(order: <span class="order-label font-mono font-bold text-slate-600">{{ $partner->order }}</span>)</span>
                </div>

                <span class="shrink-0 text-xs px-2.5 py-0.5 rounded-full font-semibold {{ $partner->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                    {{ $partner->is_active ? 'Active' : 'Inactive' }}
                </span>
            </li>
            @endforeach
        </ul>

        <div class="mt-5 flex items-center gap-3">
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs px-5 py-2.5 rounded-xl shadow-sm transition-colors flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Save Partner Display Order
            </button>
            <span class="text-xs text-slate-400">Updates the visual sequence on About & Contact pages instantly.</span>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.3/Sortable.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const list = document.getElementById('sortable-partners');
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
@endif
@endsection
